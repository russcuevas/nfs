@extends('layouts.guest')

@section('title', 'Admin Portal Login | 17th National Food Showdown 2026')

@section('content')
    <div class="min-h-[calc(100vh-160px)] flex flex-col justify-center items-center px-4 py-12 relative z-10">

        <!-- Decorative Ambient Subtle Maroon & Gold Rings in Background -->
        <div class="absolute top-1/4 -right-16 w-96 h-96 bg-[#752738]/5 rounded-full blur-3xl pointer-events-none -z-10"></div>
        <div class="absolute bottom-1/4 -left-16 w-96 h-96 bg-[#FEC452]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

        <div class="w-full max-w-md">

            <!-- Card Container -->
            <div class="glass-card rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-2xl relative overflow-hidden bg-white/95 backdrop-blur-xl">

                <!-- Top Accent Line in UB Maroon & Gold Gradient -->
                <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-[#752738] via-[#FEC452] to-[#752738]"></div>

                <!-- Header / Security & Brand Identity -->
                <div class="text-center mb-8">
                    <!-- Security Pill Badge -->
                    <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#752738]/10 border border-[#752738]/20 text-[#752738] text-[10px] font-extrabold uppercase tracking-widest mb-5 shadow-xs">
                        <svg class="w-3.5 h-3.5 text-[#752738]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span>Official Admin Gateway</span>
                    </div>

                    <!-- Dual Emblem Showcase (NFS + UB) -->
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <div class="w-14 h-14 rounded-2xl bg-white p-1 border-2 border-slate-200 shadow-md flex items-center justify-center">
                            <img src="{{ asset('images/logo-top-left.jpg') }}" alt="DALUYAB Logo"
                                class="w-full h-full object-contain rounded-xl">
                        </div>
                        <span class="text-slate-300 font-bold text-lg">•</span>
                        <div class="w-14 h-14 rounded-2xl bg-white p-1 border-2 border-slate-200 shadow-md flex items-center justify-center">
                            <img src="{{ asset('images/ub-logo.jpg') }}" alt="UB Logo"
                                class="w-full h-full object-cover rounded-xl">
                        </div>
                    </div>

                    <h1 class="font-heading text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        Admin Portal Access
                    </h1>
                    <p class="text-xs text-slate-500 mt-1.5 font-medium">
                        17th National Food Showdown Management Console
                    </p>
                </div>

                <!-- Error Alert Box -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-2xl text-rose-800 text-xs flex items-start gap-3 shadow-xs">
                        <svg class="w-4 h-4 text-rose-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="font-medium leading-relaxed">
                            {{ $errors->first() }}
                        </div>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Admin Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="admin@ub.edu.ph" required autofocus
                                class="w-full bg-slate-50 border border-slate-300 rounded-xl pl-10 pr-4 py-3.5 text-sm text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-[#752738] focus:ring-2 focus:ring-[#752738]/15 transition-all">
                        </div>
                    </div>

                    <!-- Password Input with Toggle Visibility Button -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Password
                            </label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" placeholder="••••••••••••" required
                                class="w-full bg-slate-50 border border-slate-300 rounded-xl pl-10 pr-11 py-3.5 text-sm text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-[#752738] focus:ring-2 focus:ring-[#752738]/15 transition-all">
                            
                            <!-- Toggle Password Visibility -->
                            <button type="button" id="toggle-password-btn" aria-label="Toggle Password Visibility"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors focus:outline-none">
                                <svg id="eye-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="eye-slash-icon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Device Option -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="inline-flex items-center gap-2 cursor-pointer select-none">
                            <input type="checkbox" name="remember" value="1"
                                class="w-4 h-4 rounded text-[#752738] accent-[#752738] border-slate-300 focus:ring-[#752738]">
                            <span class="text-xs font-semibold text-slate-600">Remember this device</span>
                        </label>
                        <span class="text-[11px] text-slate-400 font-medium">Secured Session</span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-4 text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-[#752738] to-[#5A1E2C] hover:from-[#912B40] hover:to-[#752738] border border-[#FEC452]/40 rounded-xl shadow-lg shadow-[#752738]/25 transition-all duration-300 hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 text-[#FEC452]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>Login to Admin Dashboard</span>
                    </button>
                </form>

                <!-- Bottom Security Info & Return Link -->
                <div class="mt-8 pt-6 border-t border-slate-200 text-center space-y-3">
                    <a href="{{ route('landing') }}"
                        class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-[#752738] transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Return to Main Website</span>
                    </a>

                    <div class="flex items-center justify-center gap-1.5 text-[11px] text-slate-400">
                        <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <span>256-Bit SSL Encrypted Access • Authorized Personnel Only</span>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('toggle-password-btn');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeSlashIcon = document.getElementById('eye-slash-icon');

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', () => {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    
                    if (isPassword) {
                        eyeIcon.classList.add('hidden');
                        eyeSlashIcon.classList.remove('hidden');
                    } else {
                        eyeIcon.classList.remove('hidden');
                        eyeSlashIcon.classList.add('hidden');
                    }
                });
            }
        });
    </script>
@endsection
