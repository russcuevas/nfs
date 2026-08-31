<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TicketStatusUpdatedMail;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    /**
     * Display Admin Dashboard
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));
        $status = $request->input('status', '');
        $type = $request->input('type', '');

        // Summary Statistics
        $stats = [
            'total' => Registration::count(),
            'pending' => Registration::where('status', 'pending')->count(),
            'approved' => Registration::where('status', 'approved')->count(),
            'rejected' => Registration::where('status', 'rejected')->count(),
            'revenue' => Registration::where('status', 'approved')->sum('ticket_price'),
            'contestants' => Registration::where('registration_type', 'contestant')->count(),
            'guests' => Registration::where('registration_type', 'guest')->count(),
        ];

        // Query Registrations
        $query = Registration::latest();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('ticket_number', 'like', "%{$search}%")
                  ->orWhere('reference_number', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('school', 'like', "%{$search}%");
            });
        }

        if ($status !== '' && in_array($status, ['pending', 'approved', 'rejected'])) {
            $query->where('status', $status);
        }

        if ($type !== '' && in_array($type, ['contestant', 'guest'])) {
            $query->where('registration_type', $type);
        }

        $registrations = $query->paginate(12)->withQueryString();

        return view('admin.dashboard', compact('stats', 'registrations', 'search', 'status', 'type'));
    }

    /**
     * Update Registration Status (Approve / Reject / Set Pending)
     */
    public function updateStatus(Request $request, Registration $registration)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $oldStatus = $registration->status;
        $registration->update(['status' => $validated['status']]);

        // Send notification email if status changed
        if ($oldStatus !== $registration->status) {
            try {
                Mail::to($registration->email)->send(new TicketStatusUpdatedMail($registration));
            } catch (\Exception $e) {
                Log::error("Failed to send status update email to {$registration->email}: " . $e->getMessage());
            }
        }

        return back()->with('success', "Ticket {$registration->ticket_number} status updated to " . strtoupper($registration->status));
    }

    /**
     * Delete Registration Record
     */
    public function destroy(Registration $registration)
    {
        // Optionally remove payment screenshot file
        if ($registration->payment_screenshot && file_exists(public_path($registration->payment_screenshot))) {
            @unlink(public_path($registration->payment_screenshot));
        }

        $ticketNum = $registration->ticket_number;
        $registration->delete();

        return back()->with('success', "Registration {$ticketNum} deleted successfully.");
    }
}
