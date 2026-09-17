@extends('layouts.guest')

@section('title', 'Registration Received | National Food Showdown 2026')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-12">
        <div class="glass-card rounded-3xl p-8 sm:p-12 text-center relative overflow-hidden border border-slate-200 shadow-lg">

            <!-- Success Icon Header -->
            <div
                class="w-20 h-20 bg-gradient-to-tr from-emerald-500 to-teal-400 rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl shadow-emerald-500/20">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h1 class="font-heading text-3xl sm:text-4xl font-extrabold text-slate-900 mb-2">Registration Submitted!</h1>
            <p class="text-xs font-bold text-[#752738] uppercase tracking-widest mb-8">National Food Showdown 2026
            </p>

            <!-- Prompt exact message box in UB Theme -->
            <div
                class="bg-[#752738]/5 border border-[#752738]/20 rounded-2xl p-5 mb-8 text-left max-w-xl mx-auto shadow-sm">
                <p class="text-sm text-slate-700 leading-relaxed font-medium">
                    Please wait for the approval of the admin and you can check the status of your ticket by clicking here:
                    <a href="{{ route('track', ['query' => $registration->ticket_number]) }}"
                        class="font-extrabold text-[#752738] underline hover:text-[#5A1E2C] transition-colors">
                        Track My Ticket Status
                    </a>
                </p>
            </div>

            <!-- Generated Ticket Code Card -->
            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 mb-8 max-w-md mx-auto shadow-sm">
                <div class="text-xs text-slate-500 uppercase tracking-widest font-semibold mb-2">YOUR UNIQUE TICKET CODE
                </div>
                <div class="font-heading text-3xl sm:text-4xl font-black text-gradient-fire tracking-wider select-all">
                    {{ $registration->ticket_number }}</div>
                <div class="text-[11px] text-slate-500 mt-2">Save this code to check your registration approval status</div>
            </div>

            <!-- Breakdown Table -->
            <div
                class="bg-slate-50 rounded-2xl border border-slate-200 p-6 text-left max-w-xl mx-auto mb-8 text-xs space-y-3">
                <div class="font-heading font-extrabold text-sm text-slate-900 border-b border-slate-200 pb-3">Ticket Purchase
                    Breakdown</div>

                <div class="flex justify-between py-1 border-b border-slate-200/80">
                    <span class="text-slate-500">Registrant Name:</span>
                    <span class="font-bold text-slate-800">{{ $registration->name }}</span>
                </div>

                <div class="flex justify-between py-1 border-b border-slate-200/80">
                    <span class="text-slate-500">Registration Category:</span>
                    <span class="font-bold text-[#752738] uppercase">{{ $registration->registration_type }}</span>
                </div>

                @if ($registration->registration_type === 'contestant')
                    <div class="py-2 border-b border-slate-200/80">
                        <span class="text-slate-500 block mb-1.5 font-bold uppercase text-[10px] tracking-wider">Availed Competition Entries ({{ count($registration->categories_list) }}):</span>
                        <div class="space-y-1.5">
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

                <div class="flex justify-between py-1 border-b border-slate-200/80">
                    <span class="text-slate-500">School / Institution:</span>
                    <span class="font-bold text-slate-800">{{ $registration->school }}
                        {{ $registration->is_ublc ? '(UB Lipa City)' : '(Outside UB)' }}</span>
                </div>

                <div class="flex justify-between py-1 border-b border-slate-200/80">
                    <span class="text-slate-500">{{ $registration->registration_type === 'contestant' ? 'Registration Type:' : 'Selected Ticket:' }}</span>
                    <span class="font-bold text-[#752738]">{{ $registration->ticket_type_label }}</span>
                </div>

                <div class="flex justify-between py-1 border-b border-slate-200/80">
                    <span class="text-slate-500">GCash Reference No:</span>
                    <span class="font-bold text-slate-800 font-mono">{{ $registration->reference_number }}</span>
                </div>

                <div class="flex justify-between py-2 items-center">
                    <span class="text-slate-700 font-bold">Total Amount Paid:</span>
                    <span
                        class="font-heading text-xl font-black text-[#752738]">{{ $registration->formatted_price }}</span>
                </div>
            </div>

            <!-- Action Links -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('track', ['query' => $registration->ticket_number]) }}"
                    class="w-full sm:w-auto px-8 py-3.5 text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-[#752738] to-[#5A1E2C] hover:from-[#912B40] hover:to-[#752738] border border-[#FEC452]/40 rounded-xl shadow-md shadow-[#752738]/20 transition-all">
                    Track Ticket Status Now
                </a>
                <a href="{{ route('landing') }}"
                    class="w-full sm:w-auto px-6 py-3.5 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 rounded-xl transition-all">
                    Back to Home
                </a>
            </div>

        </div>
    </div>
@endsection
