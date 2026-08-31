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
                            orange: '#FF6B00',
                            amber: '#F59E0B',
                            fire: '#E65100',
                            cyan: '#00B4D8',
                            blue: '#0284C7',
                            dark: '#0B0F19',
                            card: '#151C2C',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #0B0F19;
            color: #F8FAFC;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Ambient Glow Background */
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

        .glow-orange {
            position: absolute;
            top: -10%;
            right: -10%;
            width: 50vw;
            height: 50vw;
            background: radial-gradient(circle, rgba(255, 107, 0, 0.15) 0%, rgba(11, 15, 25, 0) 70%);
            filter: blur(80px);
        }

        .glow-cyan {
            position: absolute;
            bottom: -10%;
            left: -10%;
            width: 50vw;
            height: 50vw;
            background: radial-gradient(circle, rgba(0, 180, 216, 0.15) 0%, rgba(11, 15, 25, 0) 70%);
            filter: blur(80px);
        }

        /* Glassmorphism Card */
        .glass-card {
            background: rgba(21, 28, 44, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        }

        .glass-card-hover:hover {
            border-color: rgba(255, 107, 0, 0.4);
            box-shadow: 0 10px 30px rgba(255, 107, 0, 0.15);
        }

        /* Text Gradients */
        .text-gradient-fire {
            background: linear-gradient(135deg, #FF6B00 0%, #FF9E00 50%, #FFC107 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-cyan {
            background: linear-gradient(135deg, #38BDF8 0%, #00B4D8 50%, #0284C7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-gold {
            background: linear-gradient(135deg, #FDE047 0%, #EAB308 50%, #CA8A04 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0B0F19;
        }

        ::-webkit-scrollbar-thumb {
            background: #1E293B;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #FF6B00;
        }
    </style>
    @yield('styles')
</head>

<body class="min-h-screen flex flex-col relative antialiased selection:bg-brand-orange selection:text-white">
    <!-- Ambient Glow background -->
    <div class="ambient-bg">
        <div class="glow-orange"></div>
        <div class="glow-cyan"></div>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 bg-brand-dark/90 backdrop-blur-xl border-b border-white/10 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 gap-2 sm:gap-4">
                <!-- Logo & Brand -->
                <a href="{{ route('landing') }}" class="flex items-center gap-2.5 sm:gap-3 group shrink min-w-0">
                    <img src="{{ asset('images/logo-top-left.jpg') }}" alt="NFS 2026 Logo"
                        class="h-10 sm:h-12 w-auto max-h-12 rounded-xl shadow-md border border-white/20 object-contain shrink-0 group-hover:scale-105 transition-transform duration-300">
                    <div class="min-w-0 flex flex-col justify-center">
                        <span
                            class="font-heading font-extrabold text-xs min-[400px]:text-sm sm:text-base md:text-lg tracking-wider text-white leading-tight truncate">17th
                            NATIONAL FOOD SHOWDOWN</span>
                        <span
                            class="text-[10px] sm:text-xs font-semibold text-brand-orange tracking-widest leading-none mt-0.5 truncate">DALUYAB
                            2026 • UBLC</span>
                    </div>
                </a>

                <!-- Action Buttons: Track Status & Get Ticket -->
                <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                    <a href="{{ route('track') }}"
                        class="inline-flex items-center gap-1.5 px-2.5 py-2 sm:px-4 sm:py-2 text-[11px] sm:text-xs font-bold text-slate-200 bg-slate-800/80 hover:bg-slate-700 border border-slate-700 rounded-xl transition-all whitespace-nowrap">
                        <svg class="w-3.5 h-3.5 text-brand-cyan shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span>Track Status</span>
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-3 py-2 sm:px-5 sm:py-2 text-[11px] sm:text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-brand-orange to-brand-fire hover:from-amber-500 hover:to-brand-orange rounded-xl shadow-lg shadow-brand-orange/20 transition-all hover:scale-105 active:scale-95 whitespace-nowrap">
                        Get Ticket
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
                class="toast-item pointer-events-auto bg-slate-900/95 border-l-4 border-emerald-500 text-white p-4 rounded-2xl shadow-2xl backdrop-blur-xl border border-slate-700/80 transform transition-all duration-500 translate-x-0 flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-emerald-400 uppercase tracking-wider">Success</div>
                        <div class="text-xs text-slate-200 mt-0.5 leading-relaxed font-medium">{{ session('success') }}
                        </div>
                    </div>
                </div>
                <button onclick="dismissToast(this.parentElement)"
                    class="text-slate-400 hover:text-white text-lg font-bold shrink-0 leading-none">&times;</button>
            </div>
        @endif

        @if (session('error'))
            <div
                class="toast-item pointer-events-auto bg-slate-900/95 border-l-4 border-rose-500 text-white p-4 rounded-2xl shadow-2xl backdrop-blur-xl border border-slate-700/80 transform transition-all duration-500 translate-x-0 flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-rose-500/20 text-rose-400 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-rose-400 uppercase tracking-wider">Notice</div>
                        <div class="text-xs text-slate-200 mt-0.5 leading-relaxed font-medium">{{ session('error') }}
                        </div>
                    </div>
                </div>
                <button onclick="dismissToast(this.parentElement)"
                    class="text-slate-400 hover:text-white text-lg font-bold shrink-0 leading-none">&times;</button>
            </div>
        @endif

        @if (session('info'))
            <div
                class="toast-item pointer-events-auto bg-slate-900/95 border-l-4 border-brand-cyan text-white p-4 rounded-2xl shadow-2xl backdrop-blur-xl border border-slate-700/80 transform transition-all duration-500 translate-x-0 flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-brand-cyan/20 text-brand-cyan flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-brand-cyan uppercase tracking-wider">Information</div>
                        <div class="text-xs text-slate-200 mt-0.5 leading-relaxed font-medium">{{ session('info') }}
                        </div>
                    </div>
                </div>
                <button onclick="dismissToast(this.parentElement)"
                    class="text-slate-400 hover:text-white text-lg font-bold shrink-0 leading-none">&times;</button>
            </div>
        @endif
    </div>

    <!-- Main Content Container -->
    <main class="flex-grow relative z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative z-10 border-t border-white/10 bg-brand-dark/90 mt-20">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6 text-center sm:text-left">
                <div class="flex items-center justify-center sm:justify-start gap-4">
                    <img src="{{ asset('images/logo-top-left.jpg') }}" alt="Logo"
                        class="h-10 w-auto max-h-10 rounded-lg border border-white/10 object-contain">
                    <div>
                        <div class="font-heading font-extrabold text-sm text-white">NATIONAL FOOD SHOWDOWN 2026</div>
                        <div class="text-xs text-slate-400">University of Batangas Lipa City</div>
                    </div>
                </div>
                <div class="text-center sm:text-right text-xs text-slate-400">
                    &copy; 2026 National Food Showdown. All Rights Reserved.<br>
                    College of Management and Technology
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
                info: 'border-brand-cyan',
                warning: 'border-amber-500'
            };

            const textColors = {
                success: 'text-emerald-400',
                error: 'text-rose-400',
                info: 'text-brand-cyan',
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

        // Auto disappear any initial session toasts after 4 seconds & Mobile menu toggle
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

            if (menuBtn && menu) {
                menuBtn.addEventListener('click', () => {
                    const isHidden = menu.classList.contains('hidden');
                    if (isHidden) {
                        menu.classList.remove('hidden');
                        hamburgerIcon.classList.remove('block');
                        hamburgerIcon.classList.add('hidden');
                        closeIcon.classList.remove('hidden');
                        closeIcon.classList.add('block');
                    } else {
                        menu.classList.add('hidden');
                        hamburgerIcon.classList.remove('hidden');
                        hamburgerIcon.classList.add('block');
                        closeIcon.classList.remove('block');
                        closeIcon.classList.add('hidden');
                    }
                });
            }
        });
    </script>

    @yield('scripts')
</body>

</html>
