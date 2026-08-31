@extends('layouts.guest')

@section('title', 'Admin Login | National Food Showdown 2026')

@section('content')
    <div class="max-w-md mx-auto px-4 py-16">
        <div class="glass-card rounded-3xl p-8 sm:p-10 border border-slate-700 shadow-2xl">

            <!-- Header -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo-top-left.jpg') }}" alt="Logo"
                    class="h-14 w-auto mx-auto rounded-xl mb-4 border border-white/20 object-contain shadow-lg">
                <h1 class="font-heading text-2xl font-extrabold text-white">Admin Portal Access</h1>
                <p class="text-xs text-slate-400 mt-1">National Food Showdown 2026 Management</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-rose-950/80 border border-rose-500/60 rounded-xl text-rose-200 text-xs">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Admin
                        Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Enter admin email address..." required
                        class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
                </div>

                <div>
                    <label for="password"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password..." required
                        class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
                </div>

                <button type="submit"
                    class="w-full py-4 text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-brand-orange to-brand-fire hover:from-amber-500 hover:to-brand-orange rounded-xl shadow-lg transition-all">
                    Login to Admin Dashboard
                </button>
            </form>
        </div>
    </div>
@endsection
