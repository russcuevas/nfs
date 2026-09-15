<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | National Food Showdown 2026</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@500;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS CDN -->
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
                            orange: '#752738',
                            amber: '#D97706',
                            cyan: '#752738',
                            dark: '#FFFFFF',
                            card: '#FFFFFF',
                            border: '#E2E8F0'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #F8FAFC;
            color: #0F172A;
            font-family: 'Inter', sans-serif;
        }

        .glass-panel {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
        }
    </style>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('styles')
</head>

<body
    class="min-h-screen bg-slate-50 text-slate-800 font-sans antialiased selection:bg-[#752738] selection:text-white">

    <!-- Mobile Overlay Backdrop -->
    <div id="sidebar-backdrop"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-40 hidden md:hidden transition-opacity"></div>

    <!-- LEFT SIDEBAR -->
    <aside id="admin-sidebar"
        class="fixed top-0 left-0 bottom-0 w-64 bg-white border-r border-slate-200 z-50 flex flex-col justify-between transform -translate-x-full md:translate-x-0 transition-transform duration-300 shadow-xl md:shadow-sm">
        <!-- Top Section: Brand Header -->
        <div class="p-5 border-b border-slate-200">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/ub-logo-plain.png') }}" alt="UB Logo"
                    class="h-10 w-auto object-contain drop-shadow-sm group-hover:scale-105 transition-transform duration-300">
                <div class="min-w-0">
                    <span
                        class="font-heading font-extrabold text-sm text-slate-900 tracking-wider block leading-tight truncate">NFS
                        2026</span>
                    <span class="text-[10px] text-[#752738] font-black uppercase tracking-widest block mt-0.5">Admin
                        Portal</span>
                </div>
            </a>
        </div>

        <!-- Middle Section: Navigation Menu -->
        <div class="flex-grow py-6 px-4 space-y-6 overflow-y-auto">
            <!-- Main Navigation -->
            <div>
                <div class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-slate-400 mb-3">Main Menu</div>
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-3.5 py-2.5 text-xs font-bold rounded-xl transition-all bg-[#752738]/10 text-[#752738] border border-[#752738]/30 shadow-sm">
                        <svg class="w-4 h-4 text-[#752738]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Bottom User Card & Logout -->
        <div class="p-4 border-t border-slate-200 bg-slate-50/80">
            <div class="flex items-center justify-between gap-3 mb-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div
                        class="w-9 h-9 rounded-xl bg-gradient-to-tr from-[#752738] to-[#912B40] text-white font-extrabold flex items-center justify-center text-xs shrink-0 shadow-md">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}
                    </div>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-slate-800 truncate">
                            {{ auth()->user()->name ?? 'Admin User' }}</div>
                        <div class="text-[10px] text-slate-500 truncate">
                            {{ auth()->user()->email ?? 'admin@ublc.edu.ph' }}</div>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full py-2 px-3 text-xs font-extrabold text-rose-700 hover:text-white bg-rose-50 hover:bg-rose-600 border border-rose-200 rounded-xl transition-all flex items-center justify-center gap-2 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout Session
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <div class="md:ml-64 flex flex-col min-h-screen">

        <!-- Top Header for Main Area -->
        <header
            class="sticky top-0 z-30 bg-white/95 backdrop-blur-xl border-b border-slate-200 px-4 sm:px-8 py-4 flex items-center justify-between shadow-xs">
            <div class="flex items-center gap-4">
                <!-- Mobile Sidebar Toggle -->
                <button id="sidebar-toggle-btn" type="button"
                    class="md:hidden p-2 text-slate-600 hover:text-slate-900 bg-slate-100 rounded-xl border border-slate-200 transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div>
                    <h2 class="font-heading font-extrabold text-lg text-slate-900 leading-tight">Admin Control Panel</h2>
                    <span class="text-[11px] text-slate-500 hidden sm:inline">17th National Food Showdown • DALUYAB
                        2026</span>
                </div>
            </div>

            <!-- Right Status Badge -->
            <div class="flex items-center gap-3">
                <div
                    class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-bold">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>System Active</span>
                </div>
            </div>
        </header>

        <!-- Top-Right Floating Toast Notification Container -->
        <div id="toast-container"
            class="fixed top-5 right-5 z-[9999] flex flex-col gap-3 max-w-sm w-full pointer-events-none px-4 sm:px-0">
            @if (session('success'))
                <div
                    class="toast-item pointer-events-auto bg-white border-l-4 border-emerald-500 text-slate-800 p-4 rounded-2xl shadow-2xl border border-slate-200 transform transition-all duration-500 translate-x-0 flex items-start justify-between gap-3">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-emerald-700 uppercase tracking-wider">Success</div>
                            <div class="text-xs text-slate-600 mt-0.5 leading-relaxed font-medium">
                                {{ session('success') }}</div>
                        </div>
                    </div>
                    <button onclick="dismissToast(this.parentElement)"
                        class="text-slate-400 hover:text-slate-600 text-lg font-bold shrink-0 leading-none">&times;</button>
                </div>
            @endif

            @if (session('error'))
                <div
                    class="toast-item pointer-events-auto bg-white border-l-4 border-rose-500 text-slate-800 p-4 rounded-2xl shadow-2xl border border-slate-200 transform transition-all duration-500 translate-x-0 flex items-start justify-between gap-3">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-rose-700 uppercase tracking-wider">Error</div>
                            <div class="text-xs text-slate-600 mt-0.5 leading-relaxed font-medium">
                                {{ session('error') }}</div>
                        </div>
                    </div>
                    <button onclick="dismissToast(this.parentElement)"
                        class="text-slate-400 hover:text-slate-600 text-lg font-bold shrink-0 leading-none">&times;</button>
                </div>
            @endif

            @if (session('info'))
                <div
                    class="toast-item pointer-events-auto bg-white border-l-4 border-[#752738] text-slate-800 p-4 rounded-2xl shadow-2xl border border-slate-200 transform transition-all duration-500 translate-x-0 flex items-start justify-between gap-3">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-[#752738]/10 text-[#752738] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-[#752738] uppercase tracking-wider">Notice</div>
                            <div class="text-xs text-slate-600 mt-0.5 leading-relaxed font-medium">
                                {{ session('info') }}</div>
                        </div>
                    </div>
                    <button onclick="dismissToast(this.parentElement)"
                        class="text-slate-400 hover:text-slate-600 text-lg font-bold shrink-0 leading-none">&times;</button>
                </div>
            @endif
        </div>

        <!-- Main Body Content -->
        <main class="flex-grow p-4 sm:p-8">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="border-t border-slate-200 py-5 px-8 text-center text-xs text-slate-500 bg-white/50">
            &copy; 2026 National Food Showdown Admin System. Built for UBLC.
        </footer>
    </div>

    <!-- Scripts -->
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
                info: 'border-brand-orange'
            };

            const textColors = {
                success: 'text-emerald-400',
                error: 'text-rose-400',
                info: 'text-brand-orange'
            };

            const toast = document.createElement('div');
            toast.className =
                `toast-item pointer-events-auto bg-slate-900/95 border-l-4 ${borderColors[type] || borderColors.info} text-white p-4 rounded-2xl shadow-2xl backdrop-blur-xl border border-slate-700/80 transform transition-all duration-500 translate-x-full opacity-0 flex items-start justify-between gap-3`;
            toast.innerHTML = `
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-slate-800 ${textColors[type] || textColors.info} flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold ${textColors[type] || textColors.info} uppercase tracking-wider">${type.toUpperCase()}</div>
                        <div class="text-xs text-slate-200 mt-0.5 leading-relaxed font-medium">${message}</div>
                    </div>
                </div>
                <button onclick="dismissToast(this.parentElement)" class="text-slate-400 hover:text-white text-lg font-bold shrink-0 leading-none">&times;</button>
            `;

            container.appendChild(toast);

            setTimeout(() => {
                toast.classList.remove('translate-x-full', 'opacity-0');
                toast.classList.add('translate-x-0', 'opacity-100');
            }, 50);

            setTimeout(() => {
                dismissToast(toast);
            }, duration);
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Toast auto dismiss
            const toasts = document.querySelectorAll('#toast-container .toast-item');
            toasts.forEach(t => {
                setTimeout(() => {
                    dismissToast(t);
                }, 4000);
            });

            // Mobile Sidebar toggle logic
            const toggleBtn = document.getElementById('sidebar-toggle-btn');
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');

            if (toggleBtn && sidebar && backdrop) {
                toggleBtn.addEventListener('click', () => {
                    sidebar.classList.toggle('-translate-x-full');
                    backdrop.classList.toggle('hidden');
                });

                backdrop.addEventListener('click', () => {
                    sidebar.classList.add('-translate-x-full');
                    backdrop.classList.add('hidden');
                });
            }
        });
    </script>

    @yield('scripts')
</body>

</html>
