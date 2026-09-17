@extends('layouts.guest')

@section('title', 'Track Ticket Status | National Food Showdown 2026')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12">

    <div class="text-center mb-10">
        <h1 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900 mb-3">Track Ticket Status</h1>
        <p class="text-slate-600 text-sm max-w-md mx-auto">Enter your unique ticket code (e.g. <span class="font-mono text-[#752738] font-bold">#NFS_2026_001</span>), GCash Reference Number, or Email address to view your ticket approval status.</p>
    </div>

    <!-- Search Form Box -->
    <form action="{{ route('track') }}" method="GET" class="glass-card rounded-3xl p-6 sm:p-8 mb-10 border border-slate-200 shadow-sm">
        <div class="flex flex-col sm:flex-row gap-3">
            <input type="text" name="query" value="{{ $query }}" placeholder="e.g. #NFS_2026_001 or 100234567891" required class="flex-grow bg-white border border-slate-300 rounded-2xl px-5 py-4 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#752738] transition-all">
            <button type="submit" class="px-8 py-4 text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-[#752738] to-[#5A1E2C] hover:from-[#912B40] hover:to-[#752738] border border-[#FEC452]/40 rounded-2xl shadow-md shadow-[#752738]/20 transition-all shrink-0">
                Search Ticket
            </button>
        </div>
    </form>

    <!-- Search Results Section -->
    @if($searched)
        @if($registration)
            <div class="glass-card rounded-3xl p-8 border border-slate-200 relative overflow-hidden shadow-md">
                <!-- Status Badge Banner -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pb-6 border-b border-slate-200 mb-6">
                    <div>
                        <div class="text-xs text-slate-500 font-bold uppercase tracking-wider">TICKET NUMBER</div>
                        <div class="font-heading text-3xl font-black text-slate-900 tracking-wider">{{ $registration->ticket_number }}</div>
                    </div>

                    <div>
                        @if($registration->status === 'approved')
                            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-emerald-50 border border-emerald-300 text-emerald-700 font-extrabold text-xs uppercase tracking-wider shadow-sm">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                ✔ APPROVED & VALIDATED
                            </span>
                        @elseif($registration->status === 'rejected')
                            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-rose-50 border border-rose-300 text-rose-700 font-extrabold text-xs uppercase tracking-wider shadow-sm">
                                ✖ REJECTED / INVALID PAYMENT
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-amber-50 border border-amber-300 text-amber-800 font-extrabold text-xs uppercase tracking-wider shadow-sm">
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-ping"></span>
                                ⏳ PENDING ADMIN APPROVAL
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Registration Details -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-xs mb-8">
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-1">
                        <span class="text-slate-500 uppercase text-[10px] font-bold block">Participant Name</span>
                        <span class="text-sm font-bold text-slate-800 block">{{ $registration->name }}</span>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-1">
                        <span class="text-slate-500 uppercase text-[10px] font-bold block">Registration Category</span>
                        <span class="text-sm font-bold text-[#752738] uppercase block">{{ $registration->registration_type }}</span>
                    </div>

                    @if($registration->registration_type === 'contestant')
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-2 sm:col-span-2">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 uppercase text-[10px] font-bold block">Availed Competition Entries ({{ count($registration->categories_list) }})</span>
                            <span class="text-[10px] font-black text-[#752738] uppercase">Contestant Pass</span>
                        </div>
                        <div class="space-y-1.5 pt-1">
                            @foreach($registration->categories_list as $item)
                                <div class="flex items-center justify-between p-2.5 bg-white rounded-xl border border-slate-200 shadow-2xs">
                                    <div>
                                        <div class="font-extrabold text-slate-900 text-xs flex items-center gap-1.5">
                                            @if(!empty($item['code']))
                                                <span class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px]">{{ $item['code'] }}</span>
                                            @endif
                                            <span>{{ $item['name'] }}</span>
                                        </div>
                                        @if(!empty($item['division']))
                                            <span class="text-[10px] text-[#752738] font-extrabold block mt-0.5">{{ $item['division'] }}</span>
                                        @endif
                                    </div>
                                    @if(!empty($item['fee']))
                                        <span class="font-heading font-black text-emerald-700 text-xs">₱{{ number_format($item['fee'], 2) }}</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-1">
                        <span class="text-slate-500 uppercase text-[10px] font-bold block">School / Institution</span>
                        <span class="text-sm font-bold text-slate-800 block">{{ $registration->school }} {{ $registration->is_ublc ? '(UB Lipa City)' : '(Outside UB)' }}</span>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-1">
                        <span class="text-slate-500 uppercase text-[10px] font-bold block">{{ $registration->registration_type === 'contestant' ? 'Registration Type' : 'Selected Event Ticket' }}</span>
                        <span class="text-sm font-bold text-[#752738] block">{{ $registration->ticket_type_label }}</span>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-1">
                        <span class="text-slate-500 uppercase text-[10px] font-bold block">GCash Reference No</span>
                        <span class="text-sm font-bold text-slate-800 font-mono block">{{ $registration->reference_number }}</span>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-1">
                        <span class="text-slate-500 uppercase text-[10px] font-bold block">Total Price</span>
                        <span class="text-sm font-extrabold text-[#752738] block">{{ $registration->formatted_price }}</span>
                    </div>
                </div>

                <!-- Status Explanatory Note -->
                <div class="p-4 rounded-2xl border text-xs">
                    @if($registration->status === 'approved')
                        <div class="bg-emerald-50 border border-emerald-200 p-4 rounded-xl text-emerald-800">
                            Your ticket registration is confirmed! Please present your ticket code <span class="font-mono font-bold">{{ $registration->ticket_number }}</span> at the venue entrance during event days.
                        </div>
                    @elseif($registration->status === 'rejected')
                        <div class="bg-rose-50 border border-rose-200 p-4 rounded-xl text-rose-800">
                            Your registration payment reference was rejected. If you believe this is an error, please re-submit your registration with a valid GCash payment receipt.
                        </div>
                    @else
                        <div class="bg-amber-50 border border-amber-200 p-4 rounded-xl text-amber-800">
                            Your registration is currently under review by our admin team. Payment verification usually takes 1-24 hours. Please check back later or refresh this page.
                        </div>
                    @endif
                </div>
            </div>
        @else
            <!-- Not Found State -->
            <div class="glass-card rounded-3xl p-10 text-center border border-slate-200 text-slate-600 shadow-sm">
                <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <h3 class="font-heading text-lg font-bold text-slate-800 mb-1">No Registration Found</h3>
                <p class="text-xs text-slate-500 max-w-sm mx-auto">We couldn't find any ticket matching "<span class="text-slate-800 font-bold">{{ $query }}</span>". Please double-check your ticket code or reference number.</p>
            </div>
        @endif
    @endif

</div>
@endsection
