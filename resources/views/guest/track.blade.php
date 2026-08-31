@extends('layouts.guest')

@section('title', 'Track Ticket Status | National Food Showdown 2026')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12">

    <div class="text-center mb-10">
        <h1 class="font-heading text-3xl sm:text-4xl font-extrabold text-white mb-3">Track Ticket Status</h1>
        <p class="text-slate-300 text-sm max-w-md mx-auto">Enter your unique ticket code (e.g. <span class="font-mono text-brand-orange font-bold">#NFS_2026_001</span>), GCash Reference Number, or Email address to view your ticket approval status.</p>
    </div>

    <!-- Search Form Box -->
    <form action="{{ route('track') }}" method="GET" class="glass-card rounded-3xl p-6 sm:p-8 mb-10">
        <div class="flex flex-col sm:flex-row gap-3">
            <input type="text" name="query" value="{{ $query }}" placeholder="e.g. #NFS_2026_001 or 100234567891" required class="flex-grow bg-slate-900/90 border border-slate-700 rounded-2xl px-5 py-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
            <button type="submit" class="px-8 py-4 text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-brand-orange to-brand-fire hover:from-amber-500 hover:to-brand-orange rounded-2xl shadow-lg transition-all shrink-0">
                Search Ticket
            </button>
        </div>
    </form>

    <!-- Search Results Section -->
    @if($searched)
        @if($registration)
            <div class="glass-card rounded-3xl p-8 border border-white/10 relative overflow-hidden">
                <!-- Status Badge Banner -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pb-6 border-b border-white/10 mb-6">
                    <div>
                        <div class="text-xs text-slate-400 font-semibold uppercase">TICKET NUMBER</div>
                        <div class="font-heading text-3xl font-black text-white tracking-wider">{{ $registration->ticket_number }}</div>
                    </div>

                    <div>
                        @if($registration->status === 'approved')
                            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-emerald-950 border border-emerald-500 text-emerald-400 font-extrabold text-xs uppercase tracking-wider shadow-lg">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                ✔ APPROVED & VALIDATED
                            </span>
                        @elseif($registration->status === 'rejected')
                            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-rose-950 border border-rose-500 text-rose-400 font-extrabold text-xs uppercase tracking-wider shadow-lg">
                                ✖ REJECTED / INVALID PAYMENT
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-amber-950 border border-amber-500 text-amber-300 font-extrabold text-xs uppercase tracking-wider shadow-lg">
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-ping"></span>
                                ⏳ PENDING ADMIN APPROVAL
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Registration Details -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-xs mb-8">
                    <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800 space-y-1">
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">Participant Name</span>
                        <span class="text-sm font-bold text-white block">{{ $registration->name }}</span>
                    </div>

                    <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800 space-y-1">
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">Registration Category</span>
                        <span class="text-sm font-bold text-brand-orange uppercase block">{{ $registration->registration_type }}</span>
                    </div>

                    @if($registration->registration_type === 'contestant')
                    <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800 space-y-1 sm:col-span-2">
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">Contest Category</span>
                        <span class="text-sm font-bold text-white block">{{ $registration->contest_category }}</span>
                    </div>
                    @endif

                    <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800 space-y-1">
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">School / Institution</span>
                        <span class="text-sm font-bold text-white block">{{ $registration->school }} {{ $registration->is_ublc ? '(UB Lipa City)' : '(Outside UB)' }}</span>
                    </div>

                    <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800 space-y-1">
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">Selected Event Ticket</span>
                        <span class="text-sm font-bold text-brand-cyan block">{{ $registration->ticket_type_label }}</span>
                    </div>

                    <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800 space-y-1">
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">GCash Reference No</span>
                        <span class="text-sm font-bold text-white font-mono block">{{ $registration->reference_number }}</span>
                    </div>

                    <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-800 space-y-1">
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">Total Price</span>
                        <span class="text-sm font-extrabold text-emerald-400 block">{{ $registration->formatted_price }}</span>
                    </div>
                </div>

                <!-- Status Explanatory Note -->
                <div class="p-4 rounded-xl bg-slate-900/80 border border-slate-700 text-xs text-slate-300">
                    @if($registration->status === 'approved')
                        <p class="text-emerald-300">Your ticket registration is confirmed! Please present your ticket code <span class="font-mono font-bold">{{ $registration->ticket_number }}</span> at the venue entrance during event days.</p>
                    @elseif($registration->status === 'rejected')
                        <p class="text-rose-300">Your registration payment reference was rejected. If you believe this is an error, please re-submit your registration with a valid GCash payment receipt.</p>
                    @else
                        <p class="text-amber-200">Your registration is currently under review by our admin team. Payment verification usually takes 1-24 hours. Please check back later or refresh this page.</p>
                    @endif
                </div>
            </div>
        @else
            <!-- Not Found State -->
            <div class="glass-card rounded-3xl p-10 text-center text-slate-400">
                <svg class="w-12 h-12 text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <h3 class="font-heading text-lg font-bold text-white mb-1">No Registration Found</h3>
                <p class="text-xs text-slate-400 max-w-sm mx-auto">We couldn't find any ticket matching "<span class="text-slate-200 font-bold">{{ $query }}</span>". Please double-check your ticket code or reference number.</p>
            </div>
        @endif
    @endif

</div>
@endsection
