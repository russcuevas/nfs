<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'National Food Showdown 2026') | DALUYAB</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS CDN for rich utilities -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            maroon: '#752738',
                            'maroon-dark': '#5A1E2C',
                            'maroon-light': '#912B40',
                            gold: '#FEC452',
                            'gold-dark': '#D97706',
                            'gold-light': '#FFE59E',
                            // Mappings for UB Theme on White Background
                            orange: '#752738', // UB Maroon for prominent badges, borders, and accents
                            amber: '#D97706',  // Warm Gold/Amber
                            fire: '#5A1E2C',   // Deep UB Maroon
                            cyan: '#752738',   // Mapped to UB Maroon
                            blue: '#752738',   // Mapped to UB Maroon
                            dark: '#FFFFFF',   // Clean White Background
                            card: '#FFFFFF',   // White Cards
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #FFFFFF;
            color: #0F172A;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Ambient Glow Background - Subtle UB accents on White */
        .ambient-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .glow-orange,
        .glow-maroon {
            position: absolute;
            top: -10%;
            right: -10%;
            width: 55vw;
            height: 55vw;
            background: radial-gradient(circle, rgba(117, 39, 56, 0.05) 0%, rgba(255, 255, 255, 0) 70%);
            filter: blur(90px);
            animation: pulseGlow 8s ease-in-out infinite alternate;
        }

        .glow-cyan,
        .glow-gold {
            position: absolute;
            bottom: -10%;
            left: -10%;
            width: 55vw;
            height: 55vw;
            background: radial-gradient(circle, rgba(254, 196, 82, 0.08) 0%, rgba(255, 255, 255, 0) 70%);
            filter: blur(90px);
            animation: pulseGlow 10s ease-in-out infinite alternate-reverse;
        }

        @keyframes pulseGlow {
            0% { transform: scale(0.95) translate(0, 0); opacity: 0.8; }
            100% { transform: scale(1.1) translate(20px, 20px); opacity: 1; }
        }

        /* Glassmorphism Card on White */
        .glass-card {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            box-shadow: 0 10px 30px -5px rgba(117, 39, 56, 0.06), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            position: relative;
        }

        .glass-card:hover {
            border-color: rgba(117, 39, 56, 0.35);
            box-shadow: 0 20px 40px -10px rgba(117, 39, 56, 0.12);
        }

        .glass-card-hover:hover {
            border-color: rgba(117, 39, 56, 0.5);
            box-shadow: 0 15px 35px -5px rgba(117, 39, 56, 0.12);
        }

        /* Text Gradients */
        .text-gradient-fire {
            background: linear-gradient(135deg, #752738 0%, #B91C1C 40%, #D97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-cyan {
            background: linear-gradient(135deg, #752738 0%, #912B40 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-gold {
            background: linear-gradient(135deg, #B45309 0%, #D97706 50%, #752738 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-maroon {
            background: linear-gradient(135deg, #752738 0%, #912B40 50%, #B91C1C 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #F1F5F9;
        }

        ::-webkit-scrollbar-thumb {
            background: #752738;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #5A1E2C;
        }

        /* =========================================
           SOCIA.PH EXACT FLOATING LOGO PRELOADER
           ========================================= */
        #site-preloader {
            position: fixed;
            inset: 0;
            z-index: 99999;
            background: #FFFFFF;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            transition: opacity 0.65s cubic-bezier(0.16, 1, 0.3, 1), transform 0.65s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.65s;
        }

        #site-preloader.preloader-hidden {
            opacity: 0;
            transform: scale(1.04);
            pointer-events: none;
            visibility: hidden;
        }

        /* 4-Logo Float Animations (Gentle Wave) */
        .socia-logo-float-1 { animation: sociaFloat 2.8s ease-in-out infinite 0s; }
        .socia-logo-float-2 { animation: sociaFloat 2.8s ease-in-out infinite 0.15s; }
        .socia-logo-float-3 { animation: sociaFloat 2.8s ease-in-out infinite 0.3s; }
        .socia-logo-float-4 { animation: sociaFloat 2.8s ease-in-out infinite 0.45s; }

        @keyframes sociaFloat {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-14px);
            }
        }

        /* Pulsing Ground Shadow */
        .socia-shadow-pulse {
            animation: sociaShadow 2.8s ease-in-out infinite;
        }

        @keyframes sociaShadow {
            0%, 100% {
                transform: scaleX(1) scaleY(1);
                opacity: 0.25;
            }
            50% {
                transform: scaleX(0.7) scaleY(0.45);
                opacity: 0.08;
            }
        }

        /* Animated Loading Bar */
        .preloader-bar-anim {
            width: 40%;
            animation: preloaderBarSlide 1.4s ease-in-out infinite;
        }

        @keyframes preloaderBarSlide {
            0% { transform: translateX(-100%); width: 25%; }
            50% { transform: translateX(100%); width: 55%; }
            100% { transform: translateX(280%); width: 25%; }
        }

        /* Loading Dots Animation */
        @keyframes dotsPulse {
            0%, 20% { opacity: 0; }
            40% { opacity: 0.5; }
            60%, 100% { opacity: 1; }
        }
        .loading-dots {
            display: inline-block;
            animation: dotsPulse 1.4s infinite;
        }

        /* =========================================
           SCROLL REVEAL UTILITIES
           ========================================= */
        .reveal-item {
            opacity: 0;
            transform: translateY(35px);
            transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1), transform 0.85s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .reveal-item.reveal-scale {
            transform: scale(0.92) translateY(25px);
        }

        .reveal-item.reveal-left {
            transform: translateX(-35px);
        }

        .reveal-item.reveal-right {
            transform: translateX(35px);
        }

        .reveal-item.revealed {
            opacity: 1 !important;
            transform: translate(0, 0) scale(1) !important;
        }

        /* Stagger delays */
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }
        .delay-500 { transition-delay: 500ms; }
    </style>
    @yield('styles')
</head>

<body class="min-h-screen flex flex-col relative antialiased selection:bg-[#752738] selection:text-[#FEC452]">
    <!-- Top Scroll Progress Indicator Bar in UB Maroon & Gold -->
    <div id="scroll-progress-bar"
        class="fixed top-0 left-0 h-[3.5px] bg-gradient-to-r from-[#752738] via-[#FEC452] to-[#752738] z-[99990] transition-all duration-150 shadow-[0_0_12px_rgba(254,196,82,0.6)]"
        style="width: 0%;"></div>

    <!-- 4-LOGO INSTITUTIONAL DALUYAB PRELOADER -->
    <div id="site-preloader">
        <div class="flex flex-col items-center justify-center w-full h-full min-h-[320px] px-4 py-8">
            <div class="relative flex flex-col items-center max-w-xl w-full">
                
                <!-- 4 Partner Logos Row with Floating Animation Wave -->
                <div class="relative z-10 flex items-center justify-center gap-2.5 sm:gap-4 md:gap-5 mb-3">
                    <!-- Logo 1: University of Batangas Official -->
                    <div class="socia-logo-float-1 flex flex-col items-center">
                        <div class="w-14 h-14 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-2xl sm:rounded-3xl bg-white p-2 sm:p-2.5 border-2 border-slate-200 shadow-xl shadow-[#752738]/10 flex items-center justify-center">
                            <img src="{{ asset('images/ub-logo-plain.png') }}" alt="University of Batangas"
                                class="max-w-full max-h-full object-contain filter drop-shadow-sm">
                        </div>
                    </div>

                    <!-- Logo 2: Daluyab Events Class -->
                    <div class="socia-logo-float-2 flex flex-col items-center">
                        <div class="w-14 h-14 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-2xl sm:rounded-3xl bg-white p-2 sm:p-2.5 border-2 border-slate-200 shadow-xl shadow-[#752738]/10 flex items-center justify-center">
                            <img src="{{ asset('images/daluyab-plain.png') }}" alt="DALUYAB Events Class"
                                class="max-w-full max-h-full object-contain filter drop-shadow-sm">
                        </div>
                    </div>

                    <!-- Logo 3: College of Management and Tourism (CMT) -->
                    <div class="socia-logo-float-3 flex flex-col items-center">
                        <div class="w-14 h-14 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-2xl sm:rounded-3xl bg-white p-2 sm:p-2.5 border-2 border-slate-200 shadow-xl shadow-[#752738]/10 flex items-center justify-center">
                            <img src="{{ asset('images/cmt-plain.png') }}" alt="UBLC CMT"
                                class="max-w-full max-h-full object-contain filter drop-shadow-sm">
                        </div>
                    </div>

                    <!-- Logo 4: UB 80th Anniversary -->
                    <div class="socia-logo-float-4 flex flex-col items-center">
                        <div class="w-14 h-14 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-2xl sm:rounded-3xl bg-white p-2 sm:p-2.5 border-2 border-slate-200 shadow-xl shadow-[#752738]/10 flex items-center justify-center">
                            <img src="{{ asset('images/80th-plain.png') }}" alt="UB 80th Anniversary"
                                class="max-w-full max-h-full object-contain filter drop-shadow-sm">
                        </div>
                    </div>
                </div>

                <!-- Ground Shadow Pulse underneath the 4 logos -->
                <div class="socia-shadow-pulse h-4 w-60 sm:w-80 md:w-96 rounded-[100%] blur-md bg-[#752738]/20 mb-6"></div>

                <!-- Title & Event Branding -->
                <div class="text-center space-y-1 mb-5">
                    <div class="font-heading font-extrabold text-xs sm:text-sm md:text-base tracking-wider text-slate-900 uppercase">
                        17th National Food Showdown
                    </div>
                    <div class="text-[10px] sm:text-xs font-bold text-[#752738] tracking-widest uppercase">
                        DALUYAB 2026 • UNIVERSITY OF BATANGAS LIPA CITY
                    </div>
                </div>

                <!-- High-Contrast Highly Visible Loading Text & Bar -->
                <div class="flex flex-col items-center gap-2.5">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#752738] animate-ping"></span>
                        <span class="text-xs sm:text-sm font-black tracking-[0.25em] uppercase text-[#752738] font-mono">
                            LOADING<span class="loading-dots">...</span>
                        </span>
                    </div>

                    <!-- Animated Loading Bar in UB Maroon & Gold -->
                    <div class="w-44 sm:w-60 h-2 bg-slate-100 rounded-full overflow-hidden border border-slate-200 shadow-inner">
                        <div class="h-full bg-gradient-to-r from-[#752738] via-[#FEC452] to-[#752738] rounded-full preloader-bar-anim"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Ambient Glow background -->
    <div class="ambient-bg" id="ambient-container">
        <div class="glow-maroon"></div>
        <div class="glow-gold"></div>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-xl border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 gap-2 sm:gap-4">
                <!-- Logo & Brand -->
                <a href="{{ route('landing') }}" class="flex items-center gap-2.5 sm:gap-3 group shrink min-w-0">
                    <img src="{{ asset('images/logo-top-left.jpg') }}" alt="NFS 2026 Logo"
                        class="h-10 sm:h-12 w-auto max-h-12 rounded-xl shadow-sm border border-slate-200 object-contain shrink-0 group-hover:scale-105 transition-transform duration-300">
                    <div class="min-w-0 flex flex-col justify-center">
                        <span
                            class="font-heading font-extrabold text-xs min-[400px]:text-sm sm:text-base md:text-lg tracking-wider text-slate-900 leading-tight truncate">17th
                            NATIONAL FOOD SHOWDOWN</span>
                        <span
                            class="text-[10px] sm:text-xs font-bold text-[#752738] tracking-widest leading-none mt-0.5 truncate">DALUYAB
                            2026 • UBLC</span>
                    </div>
                </a>

                <!-- Desktop Nav Links -->
                <nav id="desktop-nav"
                    class="hidden lg:flex items-center gap-7 text-xs font-bold tracking-wider uppercase">
                    <a href="{{ route('landing') }}#hero" data-section="hero"
                        class="nav-link text-slate-600 hover:text-[#752738] transition-all py-1.5 border-b-2 border-transparent">Home</a>
                    <a href="{{ route('landing') }}#partners" data-section="partners"
                        class="nav-link text-slate-600 hover:text-[#752738] transition-all py-1.5 border-b-2 border-transparent">Partners</a>
                    <a href="{{ route('landing') }}#about" data-section="about"
                        class="nav-link text-slate-600 hover:text-[#752738] transition-all py-1.5 border-b-2 border-transparent">About</a>
                    <a href="{{ route('landing') }}#highlights" data-section="highlights"
                        class="nav-link text-slate-600 hover:text-[#752738] transition-all py-1.5 border-b-2 border-transparent">Highlights</a>
                    <a href="{{ route('landing') }}#pricing" data-section="pricing"
                        class="nav-link text-slate-600 hover:text-[#752738] transition-all py-1.5 border-b-2 border-transparent">Pricing</a>
                </nav>

                <!-- Action Buttons: Track Status & Get Ticket + Mobile Hamburger Button -->
                <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                    <a href="{{ route('track') }}"
                        class="hidden sm:inline-flex items-center gap-1.5 px-2.5 py-2 sm:px-4 sm:py-2 text-[11px] sm:text-xs font-bold text-slate-700 bg-slate-100 hover:bg-[#752738]/10 border border-slate-200 hover:border-[#752738]/40 rounded-xl transition-all whitespace-nowrap">
                        <svg class="w-3.5 h-3.5 text-[#752738] shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span>Track Status</span>
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-3 py-2 sm:px-5 sm:py-2 text-[11px] sm:text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-[#752738] to-[#5A1E2C] hover:from-[#912B40] hover:to-[#752738] border border-[#FEC452]/40 rounded-xl shadow-md shadow-[#752738]/20 transition-all hover:scale-105 active:scale-95 whitespace-nowrap">
                        Get Ticket
                    </a>

                    <!-- Mobile Menu Toggle Button -->
                    <button id="mobile-menu-btn" type="button" aria-label="Toggle Navigation Menu"
                        class="lg:hidden p-2 sm:p-2.5 rounded-xl bg-slate-100 border border-slate-200 text-slate-700 hover:text-[#752738] hover:border-[#752738] transition-all">
                        <svg id="hamburger-icon" class="w-5 h-5 block" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="close-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Responsive Dropdown Menu -->
        <div id="mobile-menu"
            class="hidden lg:hidden bg-white/95 border-t border-slate-200 backdrop-blur-2xl shadow-xl transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 py-4 space-y-1.5">
                <a href="{{ route('landing') }}#hero" data-section="hero"
                    class="mobile-nav-link flex items-center justify-between px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider text-slate-700 hover:text-[#752738] hover:bg-slate-50 transition-all">
                    <span>Home</span>
                    <span class="active-dot w-2 h-2 rounded-full bg-[#752738] hidden"></span>
                </a>
                <a href="{{ route('landing') }}#partners" data-section="partners"
                    class="mobile-nav-link flex items-center justify-between px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider text-slate-700 hover:text-[#752738] hover:bg-slate-50 transition-all">
                    <span>Partners</span>
                    <span class="active-dot w-2 h-2 rounded-full bg-[#752738] hidden"></span>
                </a>
                <a href="{{ route('landing') }}#about" data-section="about"
                    class="mobile-nav-link flex items-center justify-between px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider text-slate-700 hover:text-[#752738] hover:bg-slate-50 transition-all">
                    <span>About</span>
                    <span class="active-dot w-2 h-2 rounded-full bg-[#752738] hidden"></span>
                </a>
                <a href="{{ route('landing') }}#highlights" data-section="highlights"
                    class="mobile-nav-link flex items-center justify-between px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider text-slate-700 hover:text-[#752738] hover:bg-slate-50 transition-all">
                    <span>Highlights</span>
                    <span class="active-dot w-2 h-2 rounded-full bg-[#752738] hidden"></span>
                </a>
                <a href="{{ route('landing') }}#pricing" data-section="pricing"
                    class="mobile-nav-link flex items-center justify-between px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider text-slate-700 hover:text-[#752738] hover:bg-slate-50 transition-all">
                    <span>Pricing</span>
                    <span class="active-dot w-2 h-2 rounded-full bg-[#752738] hidden"></span>
                </a>

                <!-- Mobile Action Links -->
                <div class="pt-3 mt-3 border-t border-slate-200 flex flex-col gap-2.5">
                    <a href="{{ route('track') }}"
                        class="w-full flex items-center justify-center gap-2 py-3 px-4 text-xs font-bold text-slate-700 bg-slate-100 border border-slate-200 rounded-xl hover:bg-slate-200 transition-all">
                        <svg class="w-3.5 h-3.5 text-[#752738]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span>Track Status</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Top-Right Floating Toast Notification Container -->
    <div id="toast-container"
        class="fixed top-5 right-5 z-[9999] flex flex-col gap-3 max-w-sm w-full pointer-events-none px-4 sm:px-0">
        @if (session('success'))
            <div
                class="toast-item pointer-events-auto bg-white border-l-4 border-emerald-500 text-slate-800 p-4 rounded-2xl shadow-2xl backdrop-blur-xl border border-slate-200 transform transition-all duration-500 translate-x-0 flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Success</div>
                        <div class="text-xs text-slate-700 mt-0.5 leading-relaxed font-medium">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
                <button onclick="dismissToast(this.parentElement)"
                    class="text-slate-400 hover:text-slate-700 text-lg font-bold shrink-0 leading-none">&times;</button>
            </div>
        @endif

        @if (session('error'))
            <div
                class="toast-item pointer-events-auto bg-white border-l-4 border-rose-500 text-slate-800 p-4 rounded-2xl shadow-2xl backdrop-blur-xl border border-slate-200 transform transition-all duration-500 translate-x-0 flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-rose-600 uppercase tracking-wider">Notice</div>
                        <div class="text-xs text-slate-700 mt-0.5 leading-relaxed font-medium">{{ session('error') }}
                        </div>
                    </div>
                </div>
                <button onclick="dismissToast(this.parentElement)"
                    class="text-slate-400 hover:text-slate-700 text-lg font-bold shrink-0 leading-none">&times;</button>
            </div>
        @endif

        @if (session('info'))
            <div
                class="toast-item pointer-events-auto bg-white border-l-4 border-[#752738] text-slate-800 p-4 rounded-2xl shadow-2xl backdrop-blur-xl border border-slate-200 transform transition-all duration-500 translate-x-0 flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-[#752738]/10 text-[#752738] flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-[#752738] uppercase tracking-wider">Information</div>
                        <div class="text-xs text-slate-700 mt-0.5 leading-relaxed font-medium">{{ session('info') }}
                        </div>
                    </div>
                </div>
                <button onclick="dismissToast(this.parentElement)"
                    class="text-slate-400 hover:text-slate-700 text-lg font-bold shrink-0 leading-none">&times;</button>
            </div>
        @endif
    </div>

    <!-- Main Content Container -->
    <main class="flex-grow relative z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative z-10 border-t border-slate-200 bg-slate-50 mt-20">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
                <!-- Brand & Subtitle -->
                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                    <img src="{{ asset('images/logo-top-left.jpg') }}" alt="NFS Logo"
                        class="h-12 w-auto max-h-12 rounded-xl border border-slate-200 object-contain shadow-sm">
                    <div>
                        <div class="font-heading font-extrabold text-sm sm:text-base text-slate-900 tracking-wide">
                            17th NATIONAL FOOD SHOWDOWN 2026
                        </div>
                        <div class="text-xs text-[#752738] font-bold">
                            DALUYAB • UNIVERSITY OF BATANGAS LIPA CITY
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="text-center md:text-right text-xs text-slate-500">
                    &copy; 2026 National Food Showdown. All Rights Reserved.<br>
                </div>
            </div>
        </div>
    </footer>

    <!-- Auto-disappearing Toast Alert Script -->
    <script>
        function dismissToast(el) {
            if (!el) return;
            el.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => {
                if (el.parentNode) el.parentNode.removeChild(el);
            }, 500);
        }

        function showToast(message, type = 'success', duration = 4000) {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const borderColors = {
                success: 'border-emerald-500',
                error: 'border-rose-500',
                info: 'border-[#FEC452]',
                warning: 'border-amber-500'
            };

            const textColors = {
                success: 'text-emerald-400',
                error: 'text-rose-400',
                info: 'text-[#FEC452]',
                warning: 'text-amber-400'
            };

            const icons = {
                success: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>',
                error: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                info: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                warning: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>'
            };

            const toast = document.createElement('div');
            toast.className =
                `toast-item pointer-events-auto bg-slate-900/95 border-l-4 ${borderColors[type] || borderColors.info} text-white p-4 rounded-2xl shadow-2xl backdrop-blur-xl border border-slate-700/80 transform transition-all duration-500 translate-x-full opacity-0 flex items-start justify-between gap-3`;
            toast.innerHTML = `
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-slate-800 ${textColors[type] || textColors.info} flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">${icons[type] || icons.info}</svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold ${textColors[type] || textColors.info} uppercase tracking-wider">${type.toUpperCase()}</div>
                        <div class="text-xs text-slate-200 mt-0.5 leading-relaxed font-medium">${message}</div>
                    </div>
                </div>
                <button onclick="dismissToast(this.parentElement)" class="text-slate-400 hover:text-white text-lg font-bold shrink-0 leading-none">&times;</button>
            `;

            container.appendChild(toast);

            // Animate in
            setTimeout(() => {
                toast.classList.remove('translate-x-full', 'opacity-0');
                toast.classList.add('translate-x-0', 'opacity-100');
            }, 50);

            // Auto disappear after duration
            setTimeout(() => {
                dismissToast(toast);
            }, duration);
        }

        // Auto disappear session toasts, Mobile menu toggle & Active ScrollSpy Logic
        document.addEventListener('DOMContentLoaded', () => {
            const toasts = document.querySelectorAll('#toast-container .toast-item');
            toasts.forEach(t => {
                setTimeout(() => {
                    dismissToast(t);
                }, 4000);
            });

            // Mobile menu toggle logic
            const menuBtn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const hamburgerIcon = document.getElementById('hamburger-icon');
            const closeIcon = document.getElementById('close-icon');
            const mobileLinks = document.querySelectorAll('.mobile-nav-link');

            function toggleMobileMenu(show) {
                if (show) {
                    menu.classList.remove('hidden');
                    hamburgerIcon.classList.add('hidden');
                    hamburgerIcon.classList.remove('block');
                    closeIcon.classList.remove('hidden');
                    closeIcon.classList.add('block');
                } else {
                    menu.classList.add('hidden');
                    hamburgerIcon.classList.remove('hidden');
                    hamburgerIcon.classList.add('block');
                    closeIcon.classList.add('hidden');
                    closeIcon.classList.remove('block');
                }
            }

            if (menuBtn && menu) {
                menuBtn.addEventListener('click', () => {
                    const isHidden = menu.classList.contains('hidden');
                    toggleMobileMenu(isHidden);
                });

                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        toggleMobileMenu(false);
                    });
                });
            }

            // =========================================
            // 4-LOGO PRELOADER CONTROLLER
            // =========================================
            const preloader = document.getElementById('site-preloader');
            if (preloader) {
                const minDisplayTime = 1800; // Guaranteed minimum display time for smooth experience
                const startTime = Date.now();

                function hidePreloader() {
                    const elapsed = Date.now() - startTime;
                    const remaining = Math.max(0, minDisplayTime - elapsed);

                    setTimeout(() => {
                        preloader.classList.add('preloader-hidden');
                        setTimeout(() => {
                            if (preloader.parentNode) preloader.parentNode.removeChild(preloader);
                        }, 700);
                    }, remaining);
                }

                if (document.readyState === 'complete') {
                    hidePreloader();
                } else {
                    window.addEventListener('load', hidePreloader);
                    // Guaranteed fallback timeout
                    setTimeout(hidePreloader, 3500);
                }
            }

            // =========================================
            // SCROLL PROGRESS BAR
            // =========================================
            const scrollProgressBar = document.getElementById('scroll-progress-bar');
            function updateScrollProgress() {
                if (!scrollProgressBar) return;
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                scrollProgressBar.style.width = (scrolled || 0) + '%';
            }
            window.addEventListener('scroll', updateScrollProgress, { passive: true });

            // =========================================
            // INTERSECTION OBSERVER (SCROLL REVEALS)
            // =========================================
            const revealElements = document.querySelectorAll('.reveal-item');
            if ('IntersectionObserver' in window) {
                const revealObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('revealed');
                            // Trigger number counter if present inside this element
                            const counters = entry.target.querySelectorAll('[data-counter]');
                            counters.forEach(counter => animateCounter(counter));
                            if (entry.target.hasAttribute('data-counter')) {
                                animateCounter(entry.target);
                            }
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    root: null,
                    threshold: 0.12,
                    rootMargin: '0px 0px -40px 0px'
                });

                revealElements.forEach(el => revealObserver.observe(el));
            } else {
                // Fallback for older browsers
                revealElements.forEach(el => el.classList.add('revealed'));
            }

            // =========================================
            // ANIMATED COUNTERS
            // =========================================
            function animateCounter(el) {
                if (el.dataset.counted === 'true') return;
                el.dataset.counted = 'true';
                const target = parseInt(el.getAttribute('data-counter'), 10);
                if (isNaN(target)) return;
                const duration = 1800;
                const start = 0;
                const startTime = performance.now();

                function updateCount(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    // Ease out expo
                    const ease = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                    const current = Math.floor(ease * (target - start) + start);
                    el.textContent = current.toLocaleString();

                    if (progress < 1) {
                        requestAnimationFrame(updateCount);
                    } else {
                        el.textContent = target.toLocaleString();
                    }
                }
                requestAnimationFrame(updateCount);
            }

            // =========================================
            // DYNAMIC CARD SPOTLIGHT (MOUSEMOVE EFFECT)
            // =========================================
            const glassCards = document.querySelectorAll('.glass-card');
            glassCards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    card.style.setProperty('--mouse-x', `${x}px`);
                    card.style.setProperty('--mouse-y', `${y}px`);
                });
            });

            // =========================================
            // FLOATING EMBERS GENERATOR
            // =========================================
            const ambientContainer = document.getElementById('ambient-container');
            if (ambientContainer && window.innerWidth > 640) {
                for (let i = 0; i < 14; i++) {
                    const ember = document.createElement('div');
                    ember.className = 'ember';
                    const size = Math.random() * 4 + 2;
                    ember.style.width = `${size}px`;
                    ember.style.height = `${size}px`;
                    ember.style.left = `${Math.random() * 100}vw`;
                    ember.style.animationDuration = `${Math.random() * 10 + 8}s`;
                    ember.style.animationDelay = `${Math.random() * 8}s`;
                    ambientContainer.appendChild(ember);
                }
            }

            // ScrollSpy: Active Navigation Indicator (Desktop & Mobile)
            const sections = document.querySelectorAll('section[id]');
            const desktopLinks = document.querySelectorAll('#desktop-nav .nav-link');

            function updateActiveNav() {
                const scrollY = window.pageYOffset || document.documentElement.scrollTop;

                sections.forEach(section => {
                    const sectionHeight = section.offsetHeight;
                    const sectionTop = section.offsetTop - 120;
                    const sectionId = section.getAttribute('id');

                    if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                        // Desktop Links
                        desktopLinks.forEach(link => {
                            if (link.getAttribute('data-section') === sectionId) {
                                link.classList.add('text-brand-orange', 'border-brand-orange');
                                link.classList.remove('text-slate-300', 'border-transparent');
                            } else {
                                link.classList.remove('text-brand-orange', 'border-brand-orange');
                                link.classList.add('text-slate-300', 'border-transparent');
                            }
                        });

                        // Mobile Links
                        mobileLinks.forEach(link => {
                            const dot = link.querySelector('.active-dot');
                            if (link.getAttribute('data-section') === sectionId) {
                                link.classList.add('text-brand-orange', 'bg-brand-orange/15',
                                    'border-l-4', 'border-brand-orange');
                                link.classList.remove('text-slate-300');
                                if (dot) dot.classList.remove('hidden');
                            } else {
                                link.classList.remove('text-brand-orange', 'bg-brand-orange/15',
                                    'border-l-4', 'border-brand-orange');
                                link.classList.add('text-slate-300');
                                if (dot) dot.classList.add('hidden');
                            }
                        });
                    }
                });
            }

            window.addEventListener('scroll', updateActiveNav, {
                passive: true
            });
            updateActiveNav(); // Run on initial load
        });
    </script>

    @yield('scripts')
</body>

</html>
