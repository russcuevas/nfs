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
                            orange: '#FF6B00',
                            amber: '#F59E0B',
                            dark: '#0B0F19',
                            card: '#151C2C',
                            border: '#1E293B',
                            cyan: '#00B4D8'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #090D16;
            color: #F8FAFC;
            font-family: 'Inter', sans-serif;
        }

        .glass-panel {
            background: rgba(21, 28, 44, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
    @yield('styles')
</head>

<body
    class="min-h-screen bg-[#090D16] text-slate-100 font-sans antialiased selection:bg-brand-orange selection:text-white">

    <!-- Mobile Overlay Backdrop -->
    <div id="sidebar-backdrop"
        class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-40 hidden md:hidden transition-opacity"></div>

    <!-- LEFT SIDEBAR -->
    <aside id="admin-sidebar"
        class="fixed top-0 left-0 bottom-0 w-64 bg-[#0D1322] border-r border-slate-800/80 z-50 flex flex-col justify-between transform -translate-x-full md:translate-x-0 transition-transform duration-300 shadow-2xl">
        <!-- Top Section: Brand Header -->
        <div class="p-5 border-b border-slate-800/80">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo-top-left.jpg') }}" alt="NFS Logo"
                    class="h-10 w-auto rounded-xl border border-white/10 object-contain shadow-md group-hover:scale-105 transition-transform duration-300">
                <div class="min-w-0">
                    <span
                        class="font-heading font-extrabold text-sm text-white tracking-wider block leading-tight truncate">NFS
                        2026</span>
                    <span class="text-[10px] text-brand-orange font-bold uppercase tracking-widest block mt-0.5">Admin
                        Portal</span>
                </div>
            </a>
        </div>

        <!-- Middle Section: Navigation Menu -->
        <div class="flex-grow py-6 px-4 space-y-6 overflow-y-auto">
            <!-- Main Navigation -->
            <div>
                <div class="px-3 text-[10px] font-extrabold uppercase tracking-widest text-slate-500 mb-3">Main Menu</div>
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-3.5 py-2.5 text-xs font-bold rounded-xl transition-all bg-gradient-to-r from-brand-orange/20 to-amber-500/10 text-brand-orange border border-brand-orange/30 shadow-lg shadow-brand-orange/5">
                        <svg class="w-4 h-4 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Bottom User Card & Logout -->
        <div class="p-4 border-t border-slate-800/80 bg-slate-900/40">
            <div class="flex items-center justify-between gap-3 mb-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div
                        class="w-9 h-9 rounded-xl bg-gradient-to-tr from-brand-orange to-amber-500 text-white font-extrabold flex items-center justify-center text-xs shrink-0 shadow-lg">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}
                    </div>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-slate-200 truncate">
                            {{ auth()->user()->name ?? 'Admin User' }}</div>
                        <div class="text-[10px] text-slate-400 truncate">
                            {{ auth()->user()->email ?? 'admin@ublc.edu.ph' }}</div>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full py-2 px-3 text-xs font-extrabold text-rose-400 hover:text-white bg-rose-950/40 hover:bg-rose-900/80 border border-rose-800/50 rounded-xl transition-all flex items-center justify-center gap-2">
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
            class="sticky top-0 z-30 bg-[#090D16]/90 backdrop-blur-xl border-b border-slate-800/80 px-4 sm:px-8 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Mobile Sidebar Toggle -->
                <button id="sidebar-toggle-btn" type="button"
                    class="md:hidden p-2 text-slate-400 hover:text-white bg-slate-800/80 rounded-xl border border-slate-700/60 transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div>
                    <h2 class="font-heading font-extrabold text-lg text-white leading-tight">Admin Control Panel</h2>
                    <span class="text-[11px] text-slate-400 hidden sm:inline">17th National Food Showdown • DALUYAB
                        2026</span>
                </div>
            </div>

            <!-- Right Status Badge -->
            <div class="flex items-center gap-3">
                <div
                    class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-bold">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>System Active</span>
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
                            <div class="text-xs text-slate-200 mt-0.5 leading-relaxed font-medium">
                                {{ session('success') }}</div>
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
                            <div class="text-xs font-bold text-rose-400 uppercase tracking-wider">Error</div>
                            <div class="text-xs text-slate-200 mt-0.5 leading-relaxed font-medium">
                                {{ session('error') }}</div>
                        </div>
                    </div>
                    <button onclick="dismissToast(this.parentElement)"
                        class="text-slate-400 hover:text-white text-lg font-bold shrink-0 leading-none">&times;</button>
                </div>
            @endif

            @if (session('info'))
                <div
                    class="toast-item pointer-events-auto bg-slate-900/95 border-l-4 border-brand-orange text-white p-4 rounded-2xl shadow-2xl backdrop-blur-xl border border-slate-700/80 transform transition-all duration-500 translate-x-0 flex items-start justify-between gap-3">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-brand-orange/20 text-brand-orange flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-brand-orange uppercase tracking-wider">Notice</div>
                            <div class="text-xs text-slate-200 mt-0.5 leading-relaxed font-medium">
                                {{ session('info') }}</div>
                        </div>
                    </div>
                    <button onclick="dismissToast(this.parentElement)"
                        class="text-slate-400 hover:text-white text-lg font-bold shrink-0 leading-none">&times;</button>
                </div>
            @endif
        </div>

        <!-- Main Body Content -->
        <main class="flex-grow p-4 sm:p-8">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="border-t border-slate-800/60 py-5 px-8 text-center text-xs text-slate-500">
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
