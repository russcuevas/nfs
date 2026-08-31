<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
    /**
     * Display or search ticket status
     */
    public function index(Request $request)
    {
        $query = trim($request->input('query', ''));
        $registration = null;
        $searched = false;

        if ($query !== '') {
            $searched = true;
            $registration = Registration::where('ticket_number', $query)
                ->orWhere('reference_number', $query)
                ->orWhere('email', $query)
                ->latest()
                ->first();
        }

        return view('guest.track', compact('registration', 'query', 'searched'));
    }
}
