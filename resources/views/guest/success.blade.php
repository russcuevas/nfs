@extends('layouts.guest')

@section('title', 'Registration Received | National Food Showdown 2026')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-12">
        <div class="glass-card rounded-3xl p-8 sm:p-12 text-center relative overflow-hidden border border-brand-orange/30">

            <!-- Success Icon Header -->
            <div
                class="w-20 h-20 bg-gradient-to-tr from-emerald-500 to-teal-400 rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl shadow-emerald-500/20">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h1 class="font-heading text-3xl sm:text-4xl font-extrabold text-white mb-2">Registration Submitted!</h1>
            <p class="text-xs font-semibold text-brand-orange uppercase tracking-widest mb-8">National Food Showdown 2026
            </p>

            <!-- Prompt exact message box -->
            <div
                class="bg-amber-950/40 border border-brand-orange/40 rounded-2xl p-5 mb-8 text-left max-w-xl mx-auto backdrop-blur-md">
                <p class="text-sm text-amber-200 leading-relaxed font-medium">
                    Please wait for the approval of the admin and you can check the status of your ticket by clicking here:
                    <a href="{{ route('track', ['query' => $registration->ticket_number]) }}"
                        class="font-extrabold text-brand-orange underline hover:text-white transition-colors">
                        Track My Ticket Status
                    </a>
                </p>
            </div>

            <!-- Generated Ticket Code Card -->
            <div class="bg-slate-900/90 border border-slate-700 rounded-2xl p-6 mb-8 max-w-md mx-auto">
                <div class="text-xs text-slate-400 uppercase tracking-widest font-semibold mb-2">YOUR UNIQUE TICKET CODE
                </div>
                <div class="font-heading text-3xl sm:text-4xl font-black text-gradient-fire tracking-wider select-all">
                    {{ $registration->ticket_number }}</div>
                <div class="text-[11px] text-slate-400 mt-2">Save this code to check your registration approval status</div>
            </div>

            <!-- Breakdown Table -->
            <div
                class="bg-slate-900/60 rounded-2xl border border-slate-800 p-6 text-left max-w-xl mx-auto mb-8 text-xs space-y-3">
                <div class="font-heading font-extrabold text-sm text-white border-b border-slate-800 pb-3">Ticket Purchase
                    Breakdown</div>

                <div class="flex justify-between py-1 border-b border-slate-800/50">
                    <span class="text-slate-400">Registrant Name:</span>
                    <span class="font-bold text-white">{{ $registration->name }}</span>
                </div>

                <div class="flex justify-between py-1 border-b border-slate-800/50">
                    <span class="text-slate-400">Registration Category:</span>
                    <span class="font-bold text-brand-orange uppercase">{{ $registration->registration_type }}</span>
                </div>

                @if ($registration->registration_type === 'contestant')
                    <div class="flex justify-between py-1 border-b border-slate-800/50">
                        <span class="text-slate-400">Contest Category:</span>
                        <span class="font-bold text-white">{{ $registration->contest_category }}</span>
                    </div>
                @endif

                <div class="flex justify-between py-1 border-b border-slate-800/50">
                    <span class="text-slate-400">School / Institution:</span>
                    <span class="font-bold text-white">{{ $registration->school }}
                        {{ $registration->is_ublc ? '(UB Lipa City)' : '(Outside UB)' }}</span>
                </div>

                <div class="flex justify-between py-1 border-b border-slate-800/50">
                    <span class="text-slate-400">{{ $registration->registration_type === 'contestant' ? 'Registration Type:' : 'Selected Ticket:' }}</span>
                    <span class="font-bold {{ $registration->registration_type === 'contestant' ? 'text-brand-orange' : 'text-brand-cyan' }}">{{ $registration->ticket_type_label }}</span>
                </div>

                <div class="flex justify-between py-1 border-b border-slate-800/50">
                    <span class="text-slate-400">GCash Reference No:</span>
                    <span class="font-bold text-white font-mono">{{ $registration->reference_number }}</span>
                </div>

                <div class="flex justify-between py-2 items-center">
                    <span class="text-slate-300 font-bold">Total Amount Paid:</span>
                    <span
                        class="font-heading text-xl font-black text-emerald-400">{{ $registration->formatted_price }}</span>
                </div>
            </div>

            <!-- Action Links -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('track', ['query' => $registration->ticket_number]) }}"
                    class="w-full sm:w-auto px-8 py-3.5 text-xs font-extrabold uppercase tracking-wider text-white bg-brand-cyan hover:bg-sky-500 rounded-xl shadow-lg transition-all">
                    Track Ticket Status Now
                </a>
                <a href="{{ route('landing') }}"
                    class="w-full sm:w-auto px-6 py-3.5 text-xs font-bold text-slate-300 bg-slate-800 hover:bg-slate-700 rounded-xl transition-all">
                    Back to Home
                </a>
            </div>

        </div>
    </div>
@endsection
