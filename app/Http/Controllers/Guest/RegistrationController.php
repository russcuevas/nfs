<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\TicketSubmittedMail;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    /**
     * Display Landing Page
     */
    public function landing()
    {
        return view('landing');
    }

    /**
     * Display Registration Form
     */
    public function showRegister(Request $request)
    {
        $type = $request->query('type', 'contestant');
        if (!in_array($type, ['contestant', 'guest'])) {
            $type = 'contestant';
        }
        return view('guest.register', compact('type'));
    }

    /**
     * Process Registration Submission
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_type' => 'required|in:contestant,guest',
            'name' => 'required|string|max:255',
            'is_ublc' => 'nullable|boolean',
            'school' => 'required|string|max:255',
            'contest_category' => 'required_if:registration_type,contestant|nullable|string|max:255',
            'contest_division' => 'nullable|string|max:255',
            'contact_number' => 'required_if:registration_type,guest|nullable|string|max:255',
            'ticket_type' => 'nullable|in:day1,day2,both',
            'email' => 'required|email|max:255',
            'gcash_name' => 'required|string|max:255',
            'gcash_number' => 'required|string|max:255',
            'reference_number' => 'required|string|max:255',
            'payment_screenshot' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ], [
            'contest_category.required_if' => 'Please select the competition category you wish to join.',
            'contact_number.required_if' => 'Please enter your contact number.',
            'payment_screenshot.required' => 'Please upload your GCash payment screenshot.',
        ]);

        $isUblc = $request->boolean('is_ublc');
        $regType = $validated['registration_type'];
        $ticketType = $validated['ticket_type'] ?? 'both';

        $competitions = [
            'A.1' => ['name' => 'KLASIKA MODERNA KULINARYA', 'has_div' => true, 'fees' => ['professional' => 1500, 'student' => 1000]],
            'A.2' => ['name' => 'BEST REGIONAL INGREDIENT', 'has_div' => true, 'fees' => ['professional' => 1000, 'student' => 700]],
            'A.3' => ['name' => 'BEST TRADITIONAL / MODERN RECIPE AND COOKING TECHNIQUE', 'has_div' => true, 'fees' => ['professional' => 1000, 'student' => 700]],
            'A.4' => ['name' => 'REGIONAL PICA-PICA', 'has_div' => true, 'fees' => ['professional' => 1000, 'student' => 700]],
            'B.1' => ['name' => 'REGIONAL BARTENDING / FLAIRTENDING COMPETITION', 'has_div' => true, 'fees' => ['professional' => 1000, 'student' => 700]],
            'B.2' => ['name' => 'REGIONAL COFFEE CONCOCTION', 'has_div' => true, 'fees' => ['professional' => 1000, 'student' => 700]],
            'C.1' => ['name' => 'REGIONAL JAMS AND PRESERVES', 'has_div' => true, 'fees' => ['professional' => 1000, 'student' => 700]],
            'C.2' => ['name' => 'REGIONAL FRUIT FLAMBÉ', 'has_div' => true, 'fees' => ['professional' => 1000, 'student' => 700]],
            'D.1' => ['name' => 'REGIONAL DESSERT/KAKANIN', 'has_div' => true, 'fees' => ['professional' => 1000, 'student' => 700]],
            'D.2' => ['name' => 'REGIONAL TABLE SETTING WITH CENTERPIECE', 'has_div' => false, 'fee' => 500],
            'D.3' => ['name' => 'WEDDING CAKE', 'has_div' => true, 'fees' => ['professional' => 700, 'student' => 500]],
            'D.4' => ['name' => 'REGIONAL CREATIVE CAKE DISPLAY', 'has_div' => true, 'fees' => ['professional' => 1000, 'student' => 700]],
            'F.1' => ['name' => 'NAPKIN FOLDING', 'has_div' => false, 'fee' => 500],
            'F.2' => ['name' => 'MOCKTAIL CONCOCTIONS', 'has_div' => false, 'fee' => 700],
            'I.1' => ['name' => 'QUIZ-BEE', 'has_div' => false, 'fee' => 500],
            'T.1' => ['name' => 'INFLIGHT SAFETY DEMONSTRATION AND EMERGENCY RESPONSE', 'has_div' => false, 'fee' => 700],
            'T.2' => ['name' => 'KASUOTANG REHIYONES', 'has_div' => false, 'fee' => 700],
            'T.3' => ['name' => 'TOURISM POSTER MAKING', 'has_div' => false, 'fee' => 700],
        ];

        if ($regType === 'contestant') {
            $catCode = $validated['contest_category'];
            $division = $request->input('contest_division');
            $ticketType = 'both';

            if (isset($competitions[$catCode])) {
                $comp = $competitions[$catCode];
                if ($comp['has_div']) {
                    $divKey = ($division === 'professional') ? 'professional' : 'student';
                    $price = $comp['fees'][$divKey];
                    $divLabel = ($divKey === 'professional') ? 'Professional' : 'Student';
                    $savedCategory = "{$comp['name']} ({$divLabel})";
                } else {
                    $price = $comp['fee'];
                    $savedCategory = $comp['name'];
                }
            } else {
                $price = 1000;
                $savedCategory = $catCode;
            }
        } else {
            $price = match ($ticketType) {
                'day1', 'day2' => $isUblc ? 100 : 120,
                'both' => $isUblc ? 150 : 170,
                default => 120,
            };
            $savedCategory = null;
        }

        // Handle Payment Screenshot Upload directly to public/uploads/screenshots/
        $screenshotPath = '';
        if ($request->hasFile('payment_screenshot')) {
            $file = $request->file('payment_screenshot');
            $filename = 'nfs_payment_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/screenshots');
            
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $filename);
            $screenshotPath = 'uploads/screenshots/' . $filename;
        }

        // Generate Ticket Number
        $ticketNumber = Registration::generateTicketNumber();

        // Create Database Record
        $registration = Registration::create([
            'ticket_number' => $ticketNumber,
            'registration_type' => $regType,
            'name' => $validated['name'],
            'is_ublc' => $isUblc,
            'school' => $validated['school'],
            'contest_category' => $savedCategory,
            'contact_number' => $regType === 'guest' ? $validated['contact_number'] : null,
            'ticket_type' => $ticketType,
            'ticket_price' => $price,
            'email' => $validated['email'],
            'gcash_name' => $validated['gcash_name'],
            'gcash_number' => $validated['gcash_number'],
            'reference_number' => $validated['reference_number'],
            'payment_screenshot' => $screenshotPath,
            'status' => 'pending',
        ]);

        // Try sending notification email via SMTP
        try {
            Mail::to($registration->email)->send(new TicketSubmittedMail($registration));
        } catch (\Exception $e) {
            Log::error("Failed to send ticket email to {$registration->email}: " . $e->getMessage());
        }

        return redirect()->route('register.success', ['ticket' => $registration->ticket_number])
            ->with('success', 'Registration submitted successfully! Please wait for admin approval.');
    }

    /**
     * Display Success Confirmation View
     */
    public function success(Request $request)
    {
        $ticketNumber = $request->query('ticket');
        $registration = Registration::where('ticket_number', $ticketNumber)->firstOrFail();

        return view('guest.success', compact('registration'));
    }
}
