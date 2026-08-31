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
            'contact_number' => 'required_if:registration_type,guest|nullable|string|max:255',
            'ticket_type' => 'required|in:day1,day2,both',
            'email' => 'required|email|max:255',
            'gcash_name' => 'required|string|max:255',
            'gcash_number' => 'required|string|max:255',
            'reference_number' => 'required|string|max:255',
            'payment_screenshot' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ], [
            'contest_category.required_if' => 'Please enter the contest you wish to join.',
            'contact_number.required_if' => 'Please enter your contact number.',
            'payment_screenshot.required' => 'Please upload your GCash payment screenshot.',
        ]);

        $isUblc = $request->boolean('is_ublc');
        $ticketType = $validated['ticket_type'];

        // Compute Price
        $price = match ($ticketType) {
            'day1', 'day2' => $isUblc ? 70 : 80,
            'both' => $isUblc ? 100 : 120,
            default => 80,
        };

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
            'registration_type' => $validated['registration_type'],
            'name' => $validated['name'],
            'is_ublc' => $isUblc,
            'school' => $validated['school'],
            'contest_category' => $validated['registration_type'] === 'contestant' ? $validated['contest_category'] : null,
            'contact_number' => $validated['registration_type'] === 'guest' ? $validated['contact_number'] : null,
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
