@extends('layouts.guest')

@section('title', 'National Food Showdown 2026 | DALUYAB - University of Batangas')

@section('content')
    <div class="space-y-20 sm:space-y-28 pb-16">

        <!-- 1. PURE FULL-WIDTH CINEMATIC VIDEO BANNER HERO (Inspired by UB Layout) -->
        <section id="hero" class="relative w-full overflow-hidden bg-black shadow-2xl">
            <div
                class="relative w-full aspect-video min-h-[280px] sm:min-h-[420px] md:min-h-[540px] lg:min-h-[700px] max-h-[92vh] overflow-hidden flex items-center justify-center">
                <!-- Raw, Crisp & High-Definition Video Player (Perfect Fit & Proportion) -->
                <video id="hero-banner-video" autoplay loop muted playsinline class="w-full h-full object-cover">
                    <source src="{{ asset('banner.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <!-- Subtle bottom gradient fade for smooth transition -->
                <div
                    class="absolute inset-x-0 bottom-0 h-20 sm:h-28 bg-gradient-to-t from-brand-dark via-brand-dark/40 to-transparent pointer-events-none">
                </div>

                <!-- Floating Video Controls (Mute / Sound Toggle) -->
                <div class="absolute bottom-4 right-4 sm:bottom-6 sm:right-6 z-20 flex items-center gap-2">
                    <button id="video-sound-toggle" type="button" title="Toggle Sound"
                        class="p-2.5 sm:p-3 rounded-2xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold shadow-2xl backdrop-blur-md transition-all duration-300 hover:scale-110 active:scale-95 flex items-center justify-center">
                        <svg id="sound-off-icon" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
                        </svg>
                        <svg id="sound-on-icon" class="w-4 h-4 sm:w-5 sm:h-5 hidden" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        <!-- 2. GRAND HEADLINE & INTRODUCTION SECTION (Placed below video) -->
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-2 sm:pt-6">

            <!-- Floating Milestone & Event Badge -->
            <div
                class="reveal-item inline-flex flex-wrap items-center justify-center gap-2 px-4 py-2 sm:px-6 sm:py-2.5 rounded-full bg-slate-900/90 border border-brand-orange/40 text-brand-orange text-xs sm:text-sm font-extrabold uppercase tracking-widest mb-6 shadow-xl shadow-brand-orange/15 backdrop-blur-md">
                <span class="w-2.5 h-2.5 rounded-full bg-brand-orange animate-ping"></span>
                <span>17th National Food Showdown</span>
                <span class="text-slate-500">•</span>
                <span class="text-brand-amber">November 25 & 26, 2026</span>
                <span class="text-slate-500 hidden md:inline">•</span>
                <span class="text-brand-cyan hidden md:inline">UB Lipa City</span>
            </div>

            <!-- Theme Callout Pill -->
            <div class="block mb-6 reveal-item delay-100">
                <div
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500/20 via-brand-orange/25 to-cyan-500/20 border border-brand-orange/40 px-5 py-2 sm:px-7 sm:py-2.5 rounded-2xl text-xs sm:text-sm font-extrabold text-brand-amber uppercase tracking-widest backdrop-blur-md shadow-lg">
                    <svg class="w-4 h-4 text-brand-orange shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Official Theme: <span
                            class="text-white italic font-serif normal-case text-sm sm:text-base">"Kulinarya Rehiyones:
                            Lasap Pilipino"</span></span>
                </div>
            </div>

            <!-- Grand Headline -->
            <h1
                class="reveal-item delay-200 font-heading text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-black tracking-tight text-white mb-6 leading-[1.15] uppercase">
                CELEBRATING EXCELLENCE.<br>
                <span class="text-gradient-fire">SERVING A LEGACY</span> OF <span
                    class="text-gradient-cyan">GREATNESS</span>.
            </h1>

            <!-- Subtitle / Introduction -->
            <p class="reveal-item delay-300 max-w-3xl mx-auto text-sm sm:text-base md:text-lg text-slate-300 font-normal leading-relaxed mb-10">
                Organized by <strong class="text-white font-semibold">DALUYAB</strong> (Events Management Class of CMT,
                <strong class="text-brand-orange font-semibold">University of Batangas Lipa City</strong>). Join us on
                <strong class="text-brand-amber font-semibold">November 25 & 26, 2026</strong> for the premier national
                culinary showdown celebrating the richness, diversity, and heritage of regional Filipino gastronomy.
            </p>

        </section>

        <!-- 2. PARTNERS & AFFILIATED LOGOS STRIP (ROW OF 4 LOGOS) -->
        <section id="partners" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 reveal-item">
                <span
                    class="text-[11px] sm:text-xs font-extrabold uppercase tracking-widest text-brand-orange bg-brand-orange/10 border border-brand-orange/30 px-4 py-1.5 rounded-full">
                    Organized & Presented In Collaboration With
                </span>
                <h2 class="font-heading text-2xl sm:text-3xl font-extrabold text-white mt-3">
                    Institutional Partners & Leadership
                </h2>
            </div>

            <!-- 4-Logo Clean Display Grid (No outer boxes, border-radius on logos) -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 items-center justify-items-center">

                <!-- Logo 1: UB 80th Anniversary -->
                <div class="reveal-item reveal-scale delay-100 flex flex-col items-center text-center group">
                    <img src="{{ asset('images/ub-2-logo.jpg') }}" alt="UB 80th Anniversary Logo"
                        class="w-32 h-32 sm:w-40 sm:h-40 md:w-44 md:h-44 object-cover rounded-3xl border border-white/15 shadow-2xl group-hover:scale-105 group-hover:border-brand-amber/60 group-hover:shadow-brand-amber/20 transition-all duration-300">
                    <h3
                        class="font-heading font-extrabold text-sm sm:text-base text-white mt-3.5 group-hover:text-brand-amber transition-colors">
                        UB 80th Anniversary
                    </h3>
                </div>

                <!-- Logo 2: University of Batangas Official -->
                <div class="reveal-item reveal-scale delay-200 flex flex-col items-center text-center group">
                    <img src="{{ asset('images/ub-logo.jpg') }}" alt="University of Batangas Official Logo"
                        class="w-32 h-32 sm:w-40 sm:h-40 md:w-44 md:h-44 object-cover rounded-3xl border border-white/15 shadow-2xl group-hover:scale-105 group-hover:border-brand-orange/60 group-hover:shadow-brand-orange/20 transition-all duration-300">
                    <h3
                        class="font-heading font-extrabold text-sm sm:text-base text-white mt-3.5 group-hover:text-brand-orange transition-colors">
                        University of Batangas
                    </h3>
                </div>

                <!-- Logo 3: College of Management & Tourism (CMT) -->
                <div class="reveal-item reveal-scale delay-300 flex flex-col items-center text-center group">
                    <img src="{{ asset('images/cmt-logo-about.jpg') }}" alt="CMT College Logo"
                        class="w-32 h-32 sm:w-40 sm:h-40 md:w-44 md:h-44 object-cover rounded-3xl border border-white/15 shadow-2xl group-hover:scale-105 group-hover:border-brand-cyan/60 group-hover:shadow-brand-cyan/20 transition-all duration-300">
                    <h3
                        class="font-heading font-extrabold text-sm sm:text-base text-white mt-3.5 group-hover:text-brand-cyan transition-colors">
                        UBLC CMT
                    </h3>
                </div>

                <!-- Logo 4: Daluyab & NFS -->
                <div class="reveal-item reveal-scale delay-400 flex flex-col items-center text-center group">
                    <img src="{{ asset('images/nfs-logo-about.jpg') }}" alt="DALUYAB NFS Logo"
                        class="w-32 h-32 sm:w-40 sm:h-40 md:w-44 md:h-44 object-cover rounded-3xl border border-white/15 shadow-2xl group-hover:scale-105 group-hover:border-brand-fire/60 group-hover:shadow-brand-fire/20 transition-all duration-300">
                    <h3
                        class="font-heading font-extrabold text-sm sm:text-base text-white mt-3.5 group-hover:text-brand-orange transition-colors">
                        DALUYAB Events Class
                    </h3>
                </div>

            </div>
        </section>

        <!-- 3. DETAILED ABOUT SECTION (THE 3 PILLARS + 80TH ANNIVERSARY) -->
        <section id="about" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">

            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-14 reveal-item">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-cyan/10 border border-brand-cyan/30 text-brand-cyan text-xs font-extrabold uppercase tracking-widest mb-3">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>About The Vision & Heritage</span>
                </div>
                <h2 class="font-heading text-3xl sm:text-4xl md:text-5xl font-black text-white tracking-tight">
                    Shaping The Future of <span class="text-gradient-fire">Philippine Gastronomy</span>
                </h2>
                <p class="text-slate-300 text-sm sm:text-base mt-3 leading-relaxed">
                    Discover the synergy between the University of Batangas, the National Food Showdown, and DALUYAB Events Class.
                </p>
            </div>

            <!-- The 3 Pillars Cards Stack -->
            <div class="space-y-8">

                <!-- Pillar 1: UNIVERSITY OF BATANGAS (UB) & 80TH ANNIVERSARY -->
                <div
                    class="reveal-item glass-card rounded-3xl p-6 sm:p-10 border border-white/10 relative overflow-hidden transition-all duration-300 hover:border-brand-amber/40">
                    <div
                        class="absolute -right-16 -top-16 w-64 h-64 bg-brand-amber/10 rounded-full blur-3xl pointer-events-none">
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                        <div class="lg:col-span-4 flex flex-col items-start">
                            <span
                                class="px-3.5 py-1 rounded-xl bg-brand-amber/20 text-brand-amber text-[11px] font-extrabold uppercase tracking-widest mb-3 border border-brand-amber/30 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-amber"></span>
                                01 • 80 Years of Legacy (1946–2026)
                            </span>
                            <h3 class="font-heading text-2xl sm:text-3xl font-extrabold text-white">UNIVERSITY OF BATANGAS
                            </h3>
                            <div class="mt-3 p-3.5 rounded-2xl bg-slate-900/80 border border-white/10 w-full">
                                <p class="text-xs text-slate-300">
                                    <strong class="text-brand-amber">Pamantasan ng Batangas</strong> • Oldest University &
                                    2nd Oldest Educational Institution in Batangas
                                </p>
                            </div>
                        </div>
                        <div class="lg:col-span-8 space-y-3">
                            <p class="text-slate-200 text-sm sm:text-base leading-relaxed">
                                The <strong class="text-white font-semibold">University of Batangas (UB; Filipino:
                                    Pamantasan ng Batangas)</strong> is a premier private university and higher education
                                institution located in Batangas City and Lipa City, Philippines. Founded in
                                <strong>1946</strong> as Western Philippine College, it stands as a cornerstone of quality
                                education and community leadership.
                            </p>
                            <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                                As UB celebrates its monumental <strong>80th Anniversary</strong>, hosting the 17th National
                                Food Showdown is a testament to its enduring commitment to culinary arts, tourism
                                innovation, and national institutional excellence.
                            </p>
                            <!-- Feature Pills -->
                            <div class="flex flex-wrap gap-2.5 mt-2 pt-2">
                                <span
                                    class="px-3 py-1 rounded-xl bg-slate-800/80 border border-slate-700 text-slate-300 text-xs font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-amber"></span> 80 Years of Academic
                                    Excellence
                                </span>
                                <span
                                    class="px-3 py-1 rounded-xl bg-slate-800/80 border border-slate-700 text-slate-300 text-xs font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-orange"></span> Autonomous University
                                    Status
                                </span>
                                <span
                                    class="px-3 py-1 rounded-xl bg-slate-800/80 border border-slate-700 text-slate-300 text-xs font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-cyan"></span> Calabarzon Education
                                    Pioneer
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pillar 2: NATIONAL FOOD SHOWDOWN -->
                <div
                    class="reveal-item glass-card rounded-3xl p-6 sm:p-10 border border-white/10 relative overflow-hidden transition-all duration-300 hover:border-brand-cyan/40">
                    <div
                        class="absolute -right-16 -top-16 w-64 h-64 bg-brand-cyan/10 rounded-full blur-3xl pointer-events-none">
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                        <div class="lg:col-span-4 flex flex-col items-start">
                            <span
                                class="px-3.5 py-1 rounded-xl bg-brand-cyan/20 text-brand-cyan text-[11px] font-extrabold uppercase tracking-widest mb-3 border border-brand-cyan/30">
                                02 • Premier Culinary Competition
                            </span>
                            <h3 class="font-heading text-2xl sm:text-3xl font-extrabold text-white">17th NATIONAL FOOD
                                SHOWDOWN</h3>
                            <div class="mt-3 p-3.5 rounded-2xl bg-slate-900/80 border border-white/10 w-full">
                                <span class="text-[11px] font-bold text-slate-400 block uppercase tracking-wider">Official
                                    2026 Theme</span>
                                <p class="text-xs sm:text-sm font-serif italic text-brand-cyan font-bold mt-0.5">
                                    "Kulinarya Rehiyones: Lasap Pilipino"
                                </p>
                            </div>
                        </div>
                        <div class="lg:col-span-8 space-y-3">
                            <p class="text-slate-200 text-sm sm:text-base leading-relaxed">
                                The <strong class="text-white font-semibold">University of Batangas Lipa City</strong>, in
                                partnership with the <strong class="text-brand-cyan font-semibold">UBLC College of
                                    Management and Tourism (CMT)</strong> and <strong
                                    class="text-brand-orange font-semibold">Daluyab Events Class</strong>, is finally back
                                and proud to host the <strong>17th National Food Showdown</strong>.
                            </p>
                            <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                                This national event gathers the country’s culinary talents to showcase the richness,
                                diversity, and vibrant heritage of regional Filipino gastronomy. Join us as we celebrate
                                authentic flavors, creativity, and culinary excellence right here at UB Lipa City!
                            </p>
                            <!-- Feature Pills -->
                            <div class="flex flex-wrap gap-2.5 mt-2 pt-2">
                                <span
                                    class="px-3 py-1 rounded-xl bg-slate-800/80 border border-slate-700 text-slate-300 text-xs font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-cyan"></span> Regional Gastronomy
                                    Showcases
                                </span>
                                <span
                                    class="px-3 py-1 rounded-xl bg-slate-800/80 border border-slate-700 text-slate-300 text-xs font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-orange"></span> Student & Pro
                                    Competitions
                                </span>
                                <span
                                    class="px-3 py-1 rounded-xl bg-slate-800/80 border border-slate-700 text-slate-300 text-xs font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Live Industry Judging
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pillar 3: DALUYAB -->
                <div
                    class="reveal-item glass-card rounded-3xl p-6 sm:p-10 border border-white/10 relative overflow-hidden transition-all duration-300 hover:border-brand-orange/40">
                    <div
                        class="absolute -right-16 -top-16 w-64 h-64 bg-brand-orange/10 rounded-full blur-3xl pointer-events-none">
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                        <div class="lg:col-span-4 flex flex-col items-start">
                            <span
                                class="px-3.5 py-1 rounded-xl bg-brand-orange/20 text-brand-orange text-[11px] font-extrabold uppercase tracking-widest mb-3 border border-brand-orange/30">
                                03 • Events Management Body
                            </span>
                            <h3 class="font-heading text-3xl sm:text-4xl font-extrabold text-white">DALUYAB</h3>
                            <div class="mt-3 p-3.5 rounded-2xl bg-slate-900/80 border border-white/10 w-full">
                                <p class="text-xs sm:text-sm font-serif italic text-brand-amber font-medium">
                                    “Celebrating Excellence. Serving a Legacy of Greatness”
                                </p>
                            </div>
                        </div>
                        <div class="lg:col-span-8">
                            <p class="text-slate-200 text-sm sm:text-base leading-relaxed">
                                <strong class="text-white font-semibold">DALUYAB</strong> represents more than an events
                                class—it is a symbol of unity, innovation, and service. We aspire to create meaningful
                                experiences that honor our culinary heritage while inspiring future leaders in hospitality,
                                tourism, and the culinary arts.
                            </p>
                            <!-- Feature Pills -->
                            <div class="flex flex-wrap gap-2.5 mt-5">
                                <span
                                    class="px-3 py-1 rounded-xl bg-slate-800/80 border border-slate-700 text-slate-300 text-xs font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-orange"></span> Unity & Student
                                    Leadership
                                </span>
                                <span
                                    class="px-3 py-1 rounded-xl bg-slate-800/80 border border-slate-700 text-slate-300 text-xs font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-amber"></span> Hospitality & Tourism
                                    Mastery
                                </span>
                                <span
                                    class="px-3 py-1 rounded-xl bg-slate-800/80 border border-slate-700 text-slate-300 text-xs font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-cyan"></span> Preserving Heritage
                                    Flavors
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 4. EVENT HIGHLIGHTS GRID SECTION -->
        <section id="highlights" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">
            <div class="text-center mb-10 reveal-item">
                <span
                    class="text-xs font-extrabold uppercase tracking-widest text-brand-orange bg-brand-orange/10 border border-brand-orange/30 px-4 py-1.5 rounded-full">
                    What To Expect
                </span>
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-white mt-3">Event Highlights & Experience
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div
                    class="reveal-item reveal-scale delay-100 glass-card rounded-3xl p-7 border border-white/10 flex items-start gap-4 hover:border-brand-orange/40 transition-all duration-300 hover:-translate-y-1">
                    <div
                        class="w-12 h-12 rounded-2xl bg-brand-orange/20 text-brand-orange flex items-center justify-center shrink-0 shadow-lg shadow-brand-orange/10 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-heading font-extrabold text-lg text-white">Kulinarya Rehiyones</h3>
                        <p class="text-xs sm:text-sm text-slate-300 mt-2 leading-relaxed">
                            Celebrating authentic culinary traditions, secret indigenous recipes, and iconic regional
                            flavors from Luzon, Visayas, and Mindanao.
                        </p>
                    </div>
                </div>

                <div
                    class="reveal-item reveal-scale delay-200 glass-card rounded-3xl p-7 border border-white/10 flex items-start gap-4 hover:border-brand-cyan/40 transition-all duration-300 hover:-translate-y-1">
                    <div
                        class="w-12 h-12 rounded-2xl bg-brand-cyan/20 text-brand-cyan flex items-center justify-center shrink-0 shadow-lg shadow-brand-cyan/10 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-heading font-extrabold text-lg text-white">National Competitions</h3>
                        <p class="text-xs sm:text-sm text-slate-300 mt-2 leading-relaxed">
                            Live student and professional showdowns in culinary arts, baking & pastry, barista crafting,
                            cocktail mixing, and table presentations.
                        </p>
                    </div>
                </div>

                <div
                    class="reveal-item reveal-scale delay-300 glass-card rounded-3xl p-7 border border-white/10 flex items-start gap-4 hover:border-brand-amber/40 transition-all duration-300 hover:-translate-y-1">
                    <div
                        class="w-12 h-12 rounded-2xl bg-brand-amber/20 text-brand-amber flex items-center justify-center shrink-0 shadow-lg shadow-brand-amber/10 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m3 0h1m-1-4h.01M9 16h.01M9 12h.01M9 8h.01M15 16h.01M15 12h.01M15 8h.01" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-heading font-extrabold text-lg text-white">Hosted at UB Lipa City</h3>
                        <p class="text-xs sm:text-sm text-slate-300 mt-2 leading-relaxed">
                            Organized by CMT DALUYAB Events Management at the state-of-the-art University of Batangas Lipa
                            City Campus grounds.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. TICKET PRICING SECTION -->
        <section id="pricing" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">
            <div class="text-center mb-12 reveal-item">
                <span
                    class="text-xs font-extrabold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 px-4 py-1.5 rounded-full">
                    Official Event Passes
                </span>
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-white mt-3">Event Guest Ticket Pricing
                </h2>
                <p class="text-sm text-slate-400 mt-2">Affordable ticket rates for all attendees, students, guests, and
                    food enthusiasts.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Day 1 Card -->
                <div
                    class="reveal-item reveal-scale delay-100 glass-card rounded-3xl p-8 flex flex-col justify-between transition-all duration-300 hover:border-brand-orange/40 hover:-translate-y-1">
                    <div>
                        <div class="text-xs font-extrabold text-brand-orange uppercase tracking-wider mb-2">Single Pass •
                            Nov 25, 2026</div>
                        <h3 class="font-heading text-2xl font-extrabold text-white mb-4">Day 1 Pass</h3>
                        <p class="text-xs text-slate-400 mb-6">Full access to Day 1 competition, grand opening exhibit &
                            culinary judging rounds.</p>

                        <div class="my-6 py-6 border-y border-white/10 text-center">
                            <span class="text-xs font-semibold text-slate-400 block mb-1 uppercase tracking-wider">Ticket
                                Price Range</span>
                            <span class="font-heading text-3xl font-extrabold text-brand-orange">₱100 – ₱120</span>
                        </div>
                    </div>

                    <a href="{{ route('register') }}"
                        class="w-full text-center py-3.5 px-4 text-xs font-bold text-slate-200 bg-slate-800 hover:bg-brand-orange hover:text-white rounded-xl transition-all">
                        Select Day 1 Ticket
                    </a>
                </div>

                <!-- Both Days Card (Featured) -->
                <div
                    class="reveal-item reveal-scale delay-200 glass-card rounded-3xl p-8 flex flex-col justify-between relative border-2 border-brand-orange/60 bg-gradient-to-b from-brand-card to-slate-900 transition-all duration-300 hover:-translate-y-1 shadow-2xl shadow-brand-orange/10">
                    <div
                        class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-brand-orange to-amber-500 text-white font-extrabold text-[11px] uppercase tracking-widest px-4 py-1 rounded-full shadow-lg">
                        ★ Best Value Pass
                    </div>
                    <div>
                        <div class="text-xs font-extrabold text-brand-amber uppercase tracking-wider mb-2 mt-2">Full Access
                            • Nov 25 & 26</div>
                        <h3 class="font-heading text-2xl font-extrabold text-white mb-4">Both Days (Day 1 & Day 2)</h3>
                        <p class="text-xs text-slate-300 mb-6">Complete 2-day access pass to all events, showcases,
                            championships, and awarding.</p>

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
                    class="reveal-item reveal-scale delay-300 glass-card rounded-3xl p-8 flex flex-col justify-between transition-all duration-300 hover:border-brand-cyan/40 hover:-translate-y-1">
                    <div>
                        <div class="text-xs font-extrabold text-brand-cyan uppercase tracking-wider mb-2">Single Pass • Nov
                            26, 2026</div>
                        <h3 class="font-heading text-2xl font-extrabold text-white mb-4">Day 2 Pass</h3>
                        <p class="text-xs text-slate-400 mb-6">Full access to Day 2 championship showdown, live finals &
                            grand awarding ceremony.</p>

                        <div class="my-6 py-6 border-y border-white/10 text-center">
                            <span class="text-xs font-semibold text-slate-400 block mb-1 uppercase tracking-wider">Ticket
                                Price Range</span>
                            <span class="font-heading text-3xl font-extrabold text-brand-cyan">₱100 – ₱120</span>
                        </div>
                    </div>

                    <a href="{{ route('register') }}"
                        class="w-full text-center py-3.5 px-4 text-xs font-bold text-slate-200 bg-slate-800 hover:bg-brand-cyan hover:text-white rounded-xl transition-all">
                        Select Day 2 Ticket
                    </a>
                </div>
            </div>
        </section>

        <!-- 6. QUICK STATUS TRACKING SECTION -->
        <section class="max-w-4xl mx-auto px-4 reveal-item">
            <div class="glass-card rounded-3xl p-8 sm:p-12 relative overflow-hidden text-center border border-white/10">
                <div class="relative z-10">
                    <h2 class="font-heading text-2xl sm:text-3xl font-extrabold text-white mb-3">Already Registered?</h2>
                    <p class="text-sm text-slate-300 mb-8 max-w-xl mx-auto">
                        Track your ticket reservation and payment verification using your unique ticket code <br>
                        (e.g. <span class="font-mono text-brand-orange font-bold">#NFS_2026_001</span>) or GCash Reference
                        Number.
                    </p>

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

        <!-- 7. FULL-WIDTH SOCIAL MEDIA STRIP (System Palette) -->
        <section class="w-full py-12 sm:py-16 text-center reveal-item">
            <div class="max-w-4xl mx-auto px-4 flex flex-col items-center justify-center">
                <!-- Section Title -->
                <h2
                    class="font-heading text-xl sm:text-2xl font-black uppercase tracking-widest text-white mb-6 flex items-center justify-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-brand-orange"></span>
                    <span>SOCIAL MEDIA</span>
                    <span class="w-2 h-2 rounded-full bg-brand-cyan"></span>
                </h2>

                <!-- Circular Social Media Icons Row (System Theme) -->
                <div class="flex items-center justify-center gap-3 sm:gap-4">
                    <!-- Facebook -->
                    <a href="https://web.facebook.com/people/Daluyab/61591879472076/?_rdc=1&_rdr#" target="_blank"
                        rel="noopener noreferrer" title="Facebook"
                        class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-slate-800/90 hover:bg-brand-orange text-slate-200 hover:text-white border border-slate-700/80 hover:border-brand-orange flex items-center justify-center shadow-lg shadow-black/40 hover:shadow-brand-orange/30 transition-all duration-300 hover:scale-110 active:scale-95 group">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>

                    {{-- <!-- X (Twitter) -->
                    <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer" title="X (Twitter)"
                        class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-slate-800/90 hover:bg-brand-orange text-slate-200 hover:text-white border border-slate-700/80 hover:border-brand-orange flex items-center justify-center shadow-lg shadow-black/40 hover:shadow-brand-orange/30 transition-all duration-300 hover:scale-110 active:scale-95 group">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>

                    <!-- YouTube -->
                    <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" title="YouTube"
                        class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-slate-800/90 hover:bg-brand-orange text-slate-200 hover:text-white border border-slate-700/80 hover:border-brand-orange flex items-center justify-center shadow-lg shadow-black/40 hover:shadow-brand-orange/30 transition-all duration-300 hover:scale-110 active:scale-95 group">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" title="Instagram"
                        class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-slate-800/90 hover:bg-brand-orange text-slate-200 hover:text-white border border-slate-700/80 hover:border-brand-orange flex items-center justify-center shadow-lg shadow-black/40 hover:shadow-brand-orange/30 transition-all duration-300 hover:scale-110 active:scale-95 group">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer" title="LinkedIn"
                        class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-slate-800/90 hover:bg-brand-orange text-slate-200 hover:text-white border border-slate-700/80 hover:border-brand-orange flex items-center justify-center shadow-lg shadow-black/40 hover:shadow-brand-orange/30 transition-all duration-300 hover:scale-110 active:scale-95 group">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </a> --}}
                </div>
            </div>
        </section>

    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const video = document.getElementById('hero-banner-video');
            const soundBtn = document.getElementById('video-sound-toggle');
            const soundOff = document.getElementById('sound-off-icon');
            const soundOn = document.getElementById('sound-on-icon');

            if (video && soundBtn) {
                soundBtn.addEventListener('click', () => {
                    if (video.muted) {
                        video.muted = false;
                        soundOff.classList.add('hidden');
                        soundOn.classList.remove('hidden');
                    } else {
                        video.muted = true;
                        soundOff.classList.remove('hidden');
                        soundOn.classList.add('hidden');
                    }
                });
            }
        });
    </script>
@endsection
