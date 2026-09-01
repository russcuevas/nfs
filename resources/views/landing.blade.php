@extends('layouts.guest')

@section('title', 'National Food Showdown 2026 | DALUYAB')

@section('content')
    <div class="space-y-24 py-8 sm:py-16">

        <!-- HERO SECTION -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <!-- Floating badge -->
            <div
                class="inline-flex flex-wrap items-center justify-center gap-2 px-5 py-2.5 rounded-full bg-slate-900/90 border border-brand-orange/40 text-brand-orange text-xs font-extrabold uppercase tracking-widest mb-8 shadow-xl shadow-brand-orange/10 backdrop-blur-md">
                <span class="w-2.5 h-2.5 rounded-full bg-brand-orange animate-ping"></span>
                <span>17th National Food Showdown 2026</span>
                <span class="text-slate-500">•</span>
                <span class="text-brand-amber">November 25 & 26, 2026</span>
            </div>

            <!-- Main Banner Logo Display -->
            <div class="relative max-w-4xl mx-auto mb-10 group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-brand-orange via-brand-cyan to-brand-amber rounded-3xl blur-xl opacity-35 group-hover:opacity-65 transition duration-700">
                </div>
                <div class="relative rounded-2xl overflow-hidden border border-white/20 shadow-2xl bg-brand-dark">
                    <img src="{{ asset('images/nfs-logo.jpg') }}" alt="DALUYAB National Food Showdown Logo"
                        class="w-full h-auto object-cover transform transition-transform duration-700 hover:scale-102">
                </div>
            </div>

            <!-- Theme Callout Badge -->
            <div
                class="inline-block bg-gradient-to-r from-amber-500/20 via-brand-orange/20 to-cyan-500/20 border border-brand-orange/30 px-6 py-2 rounded-2xl text-xs font-extrabold text-brand-amber uppercase tracking-widest mb-6">
                Official Theme: <span class="text-white italic font-serif text-sm">"Kulinarya Rehiyones: Lasap
                    Pilipino"</span>
            </div>

            <!-- Headline & Subtitle -->
            <h1 class="font-heading text-4xl sm:text-6xl font-extrabold tracking-tight text-white mb-6 leading-tight">
                CELEBRATING EXCELLENCE.<br>
                <span class="text-gradient-fire">SERVING A LEGACY</span> OF <span
                    class="text-gradient-cyan">GREATNESS</span>.
            </h1>

            <p class="max-w-3xl mx-auto text-base sm:text-lg text-slate-300 font-normal leading-relaxed mb-10">
                Organized by <strong class="text-white">DALUYAB</strong> (Events Management Class of CMT, University of
                Batangas Lipa Campus). Join us on <strong class="text-brand-orange">November 25 & 26, 2026</strong> for the
                premier national culinary showdown celebrating the richness and diversity of regional Filipino gastronomy.
            </p>

        </section>

        <!-- EVENT HIGHLIGHTS GRID SECTION -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="glass-card rounded-3xl p-6 border border-white/10 flex items-start gap-4">
                    <div
                        class="w-12 h-12 rounded-2xl bg-brand-orange/20 text-brand-orange flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-heading font-extrabold text-base text-white">Kulinarya Rehiyones</h3>
                        <p class="text-xs text-slate-400 mt-1 leading-relaxed">Celebrating authentic culinary traditions and
                            regional flavors from Luzon, Visayas, and Mindanao.</p>
                    </div>
                </div>

                <div class="glass-card rounded-3xl p-6 border border-white/10 flex items-start gap-4">
                    <div
                        class="w-12 h-12 rounded-2xl bg-brand-cyan/20 text-brand-cyan flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-heading font-extrabold text-base text-white">National Competitions</h3>
                        <p class="text-xs text-slate-400 mt-1 leading-relaxed">Live student and professional showdowns in
                            culinary arts, baking, barista, and table presentation.</p>
                    </div>
                </div>

                <div class="glass-card rounded-3xl p-6 border border-white/10 flex items-start gap-4">
                    <div
                        class="w-12 h-12 rounded-2xl bg-brand-amber/20 text-brand-amber flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m3 0h1m-1-4h.01M9 16h.01M9 12h.01M9 8h.01M15 16h.01M15 12h.01M15 8h.01" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-heading font-extrabold text-base text-white">Hosted at UB Lipa City</h3>
                        <p class="text-xs text-slate-400 mt-1 leading-relaxed">Organized by CMT DALUYAB Events Management at
                            the University of Batangas Lipa City Campus.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- TICKET PRICING SECTION -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-white">Event Guest Ticket Pricing</h2>
                <p class="text-sm text-slate-400 mt-2">Affordable ticket rates for all attendees, guests, and contestants.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Day 1 Card -->
                <div
                    class="glass-card rounded-3xl p-8 flex flex-col justify-between transition-all duration-300 hover:border-brand-orange/40 hover:-translate-y-1">
                    <div>
                        <div class="text-xs font-extrabold text-brand-orange uppercase tracking-wider mb-2">Single Pass •
                            Nov 25, 2026</div>
                        <h3 class="font-heading text-2xl font-extrabold text-white mb-4">Day 1 Pass</h3>
                        <p class="text-xs text-slate-400 mb-6">Full access to Day 1 competition, opening exhibit & judging
                            rounds.</p>

                        <div class="my-6 py-6 border-y border-white/10 text-center">
                            <span class="text-xs font-semibold text-slate-400 block mb-1 uppercase tracking-wider">Ticket
                                Price Range</span>
                            <span class="font-heading text-3xl font-extrabold text-brand-orange">₱100 – ₱120</span>
                        </div>
                    </div>

                    <a href="{{ route('register') }}"
                        class="w-full text-center py-3 px-4 text-xs font-bold text-slate-200 bg-slate-800 hover:bg-brand-orange hover:text-white rounded-xl transition-all">
                        Select Day 1 Ticket
                    </a>
                </div>

                <!-- Both Days Card (Featured) -->
                <div
                    class="glass-card rounded-3xl p-8 flex flex-col justify-between relative border-2 border-brand-orange/60 bg-gradient-to-b from-brand-card to-slate-900 transition-all duration-300 hover:-translate-y-1 shadow-2xl shadow-brand-orange/10">
                    <div
                        class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-brand-orange to-amber-500 text-white font-extrabold text-[11px] uppercase tracking-widest px-4 py-1 rounded-full shadow-lg">
                        ★ Best Value Pass
                    </div>
                    <div>
                        <div class="text-xs font-extrabold text-brand-amber uppercase tracking-wider mb-2 mt-2">Full Access
                            • Nov 25 & 26</div>
                        <h3 class="font-heading text-2xl font-extrabold text-white mb-4">Both Days (Day 1 & Day 2)</h3>
                        <p class="text-xs text-slate-300 mb-6">Complete 2-day access pass to all events, awardings, and food
                            showcases.</p>

                        <div class="my-6 py-6 border-y border-white/10 text-center">
                            <span class="text-xs font-semibold text-slate-300 block mb-1 uppercase tracking-wider">Ticket
                                Price Range</span>
                            <span class="font-heading text-4xl font-black text-emerald-400">₱150 – ₱170</span>
                        </div>
                    </div>

                    <a href="{{ route('register') }}"
                        class="w-full text-center py-3.5 px-4 text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-brand-orange to-brand-fire hover:from-amber-500 hover:to-brand-orange rounded-xl shadow-lg transition-all">
                        Get Both Days Pass
                    </a>
                </div>

                <!-- Day 2 Card -->
                <div
                    class="glass-card rounded-3xl p-8 flex flex-col justify-between transition-all duration-300 hover:border-brand-cyan/40 hover:-translate-y-1">
                    <div>
                        <div class="text-xs font-extrabold text-brand-cyan uppercase tracking-wider mb-2">Single Pass • Nov
                            26, 2026</div>
                        <h3 class="font-heading text-2xl font-extrabold text-white mb-4">Day 2 Pass</h3>
                        <p class="text-xs text-slate-400 mb-6">Full access to Day 2 championship showdown & grand awarding
                            ceremony.</p>

                        <div class="my-6 py-6 border-y border-white/10 text-center">
                            <span class="text-xs font-semibold text-slate-400 block mb-1 uppercase tracking-wider">Ticket
                                Price Range</span>
                            <span class="font-heading text-3xl font-extrabold text-brand-cyan">₱100 – ₱120</span>
                        </div>
                    </div>

                    <a href="{{ route('register') }}"
                        class="w-full text-center py-3 px-4 text-xs font-bold text-slate-200 bg-slate-800 hover:bg-brand-cyan hover:text-white rounded-xl transition-all">
                        Select Day 2 Ticket
                    </a>
                </div>
            </div>
        </section>

        <!-- QUICK STATUS TRACKING SECTION -->
        <section class="max-w-4xl mx-auto px-4">
            <div class="glass-card rounded-3xl p-8 sm:p-12 relative overflow-hidden text-center">
                <div class="relative z-10">
                    <h2 class="font-heading text-2xl sm:text-3xl font-extrabold text-white mb-3">Already Registered?</h2>
                    <p class="text-sm text-slate-300 mb-8 max-w-xl mx-auto">Track your ticket status using your unique
                        ticket code <br> (e.g. <span class="font-mono text-brand-orange font-bold">#NFS_2026_001</span>) or
                        GCash Reference Number.</p>

                    <form action="{{ route('track') }}" method="GET"
                        class="flex flex-col sm:flex-row gap-3 max-w-xl mx-auto">
                        <input type="text" name="query" placeholder="Enter Ticket Code or GCash Reference No..."
                            required
                            class="flex-grow bg-slate-900/90 border border-slate-700 rounded-2xl px-5 py-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-cyan transition-all">
                        <button type="submit"
                            class="px-8 py-4 text-xs font-extrabold uppercase tracking-wider text-white bg-brand-cyan hover:bg-sky-500 rounded-2xl transition-all shrink-0 shadow-lg shadow-brand-cyan/20">
                            Check Status
                        </button>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection
