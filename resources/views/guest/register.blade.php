@extends('layouts.guest')

@section('title', 'Event Registration | National Food Showdown 2026')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 sm:py-12">

    <!-- Page Header -->
    <div class="text-center mb-10">
        <h1 class="font-heading text-3xl sm:text-5xl font-extrabold text-white mb-3">Event Registration</h1>
        <p class="text-slate-300 text-sm max-w-xl mx-auto">Fill in your details below to register and secure your official ticket for National Food Showdown 2026.</p>
    </div>

    <!-- Stepper Indicator -->
    <div class="mb-10 max-w-2xl mx-auto">
        <div class="flex items-center justify-between relative">
            <div class="w-full absolute top-1/2 left-0 h-1 bg-slate-800 -z-0"></div>
            <div id="step-line-progress" class="absolute top-1/2 left-0 h-1 bg-gradient-to-r from-brand-orange to-brand-cyan transition-all duration-500" style="width: 0%;"></div>

            <!-- Step 1 Circle -->
            <div id="step-badge-1" class="relative z-10 w-10 h-10 rounded-full bg-brand-orange text-white font-extrabold flex items-center justify-center text-sm shadow-lg ring-4 ring-brand-dark transition-all">
                1
            </div>

            <!-- Step 2 Circle -->
            <div id="step-badge-2" class="relative z-10 w-10 h-10 rounded-full bg-slate-800 text-slate-400 font-extrabold flex items-center justify-center text-sm ring-4 ring-brand-dark transition-all">
                2
            </div>

            <!-- Step 3 Circle -->
            <div id="step-badge-3" class="relative z-10 w-10 h-10 rounded-full bg-slate-800 text-slate-400 font-extrabold flex items-center justify-center text-sm ring-4 ring-brand-dark transition-all">
                3
            </div>
        </div>
        
        <div class="flex justify-between text-[11px] font-bold uppercase tracking-wider text-slate-400 mt-3 px-1">
            <span id="step-text-1" class="text-brand-orange">1. Details</span>
            <span id="step-text-2">2. Ticket Selection</span>
            <span id="step-text-3">3. Payment</span>
        </div>
    </div>

    <!-- Main Form Container -->
    <form id="registration-form" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" class="glass-card rounded-3xl p-6 sm:p-10">
        @csrf

        @if ($errors->any())
            <div class="mb-8 p-4 bg-rose-950/80 border border-rose-500/60 rounded-2xl text-rose-200 text-xs space-y-1">
                <div class="font-bold text-rose-300">Please correct the following errors:</div>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ==================== STEP 1: DETAILS ==================== -->
        <div id="step-1" class="step-container space-y-8">
            <div class="border-b border-white/10 pb-4">
                <h2 class="font-heading text-xl font-extrabold text-white flex items-center gap-2">
                    <span class="w-2 h-6 bg-brand-orange rounded-full"></span>
                    Step 1: Participant Details
                </h2>
                <p class="text-xs text-slate-400 mt-1">Select your registration category and provide basic information.</p>
            </div>

            <!-- Registration Type Selector Card -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-3">Registration Category *</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Contestant Option -->
                    <label id="card-type-contestant" class="cursor-pointer border-2 border-brand-orange bg-brand-orange/10 rounded-2xl p-5 flex items-start gap-4 transition-all">
                        <input type="radio" name="registration_type" value="contestant" class="mt-1 accent-brand-orange" {{ old('registration_type', $type) === 'contestant' ? 'checked' : '' }} onchange="switchRegistrationType('contestant')">
                        <div>
                            <span class="font-heading font-extrabold text-base text-white block">Contestant</span>
                            <span class="text-xs text-slate-300 leading-relaxed block mt-1">Participating in culinary competitions & judging rounds.</span>
                        </div>
                    </label>

                    <!-- Guest/Watcher Option -->
                    <label id="card-type-guest" class="cursor-pointer border-2 border-slate-700 bg-slate-900/50 rounded-2xl p-5 flex items-start gap-4 transition-all">
                        <input type="radio" name="registration_type" value="guest" class="mt-1 accent-brand-orange" {{ old('registration_type', $type) === 'guest' ? 'checked' : '' }} onchange="switchRegistrationType('guest')">
                        <div>
                            <span class="font-heading font-extrabold text-base text-white block">Guest / Watcher</span>
                            <span class="text-xs text-slate-300 leading-relaxed block mt-1">Attending as audience, spectator, or event visitor.</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Form Inputs -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div class="sm:col-span-2">
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Full Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Juan Dela Cruz" required class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
                </div>

                <!-- School / University Field with Integrated UBLC Checkbox -->
                <div class="sm:col-span-2 space-y-2">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <label for="school" class="block text-xs font-bold uppercase tracking-wider text-slate-300">
                            School / Institution *
                        </label>

                        <!-- UBLC Toggle Pill directly above field -->
                        <label class="inline-flex items-center gap-2 cursor-pointer bg-slate-900/90 border border-slate-700/80 hover:border-brand-orange/50 px-3.5 py-1.5 rounded-xl transition-all select-none self-start sm:self-auto">
                            <input type="checkbox" id="is_ublc" name="is_ublc" value="1" {{ old('is_ublc') ? 'checked' : '' }} onchange="onUblcCheckboxChange()" class="w-4 h-4 rounded accent-brand-orange">
                            <span class="text-xs font-bold text-brand-orange">From UB Lipa City (UBLC)?</span>
                        </label>
                    </div>

                    <div class="relative">
                        <input type="text" id="school" name="school" value="{{ old('school') }}" placeholder="e.g. University of Batangas Lipa City" required class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
                        <div id="ublc-badge" class="hidden absolute right-3 top-1/2 -translate-y-1/2 px-2.5 py-1 rounded-lg bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 text-[11px] font-extrabold flex items-center gap-1.5 pointer-events-none">
                            <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            UBLC Auto-filled
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400">Check the box above if you are a student or staff at University of Batangas Lipa City.</p>
                </div>

                <!-- Contest Category & Division (Contestant Only) -->
                <div id="field-contestant-category" class="sm:col-span-2 space-y-4">
                    <div>
                        <label for="contest_category" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Select Competition Category *</label>
                        <select id="contest_category" name="contest_category" onchange="onContestCategoryChange()" class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none focus:border-brand-orange transition-all">
                            <option value="">-- Choose Competition Category --</option>
                            <optgroup label="CATEGORY A: KULINARYA & COOKING SHOWDOWNS">
                                <option value="A.1">KLASIKA MODERNA KULINARYA</option>
                                <option value="A.2">BEST REGIONAL INGREDIENT</option>
                                <option value="A.3">BEST TRADITIONAL / MODERN RECIPE AND COOKING TECHNIQUE</option>
                                <option value="A.4">REGIONAL PICA-PICA</option>
                            </optgroup>
                            <optgroup label="CATEGORY B: BEVERAGE & BARTENDING">
                                <option value="B.1">REGIONAL BARTENDING / FLAIRTENDING COMPETITION</option>
                                <option value="B.2">REGIONAL COFFEE CONCOCTION</option>
                            </optgroup>
                            <optgroup label="CATEGORY C: JAMS, PRESERVES & FLAMBÉ">
                                <option value="C.1">REGIONAL JAMS AND PRESERVES</option>
                                <option value="C.2">REGIONAL FRUIT FLAMBÉ</option>
                            </optgroup>
                            <optgroup label="CATEGORY D: PASTRY, CAKES & TABLE PRESENTATION">
                                <option value="D.1">REGIONAL DESSERT/KAKANIN</option>
                                <option value="D.2">REGIONAL TABLE SETTING WITH CENTERPIECE</option>
                                <option value="D.3">WEDDING CAKE</option>
                                <option value="D.4">REGIONAL CREATIVE CAKE DISPLAY</option>
                            </optgroup>
                            <optgroup label="CATEGORY F: HOSPITALITY & MOCKTAILS">
                                <option value="F.1">NAPKIN FOLDING</option>
                                <option value="F.2">MOCKTAIL CONCOCTIONS</option>
                            </optgroup>
                            <optgroup label="CATEGORY I: ACADEMIC">
                                <option value="I.1">QUIZ-BEE</option>
                            </optgroup>
                            <optgroup label="CATEGORY T: TOURISM & SPECIALTY">
                                <option value="T.1">INFLIGHT SAFETY DEMONSTRATION AND EMERGENCY RESPONSE</option>
                                <option value="T.2">KASUOTANG REHIYONES</option>
                                <option value="T.3">TOURISM POSTER MAKING</option>
                            </optgroup>
                        </select>
                    </div>

                    <!-- Division Level Selector (Professional vs Student) -->
                    <div id="field-contestant-division" class="hidden">
                        <label for="contest_division" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Select Division Level *</label>
                        <select id="contest_division" name="contest_division" onchange="onContestDivisionChange()" class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none focus:border-brand-orange transition-all">
                            <option value="professional">Professional Division</option>
                            <option value="student" selected>Student / College / SHS Division</option>
                        </select>
                    </div>

                    <!-- Highlighted Contestant Fee Callout -->
                    <div id="contestant-price-callout" class="hidden p-4 rounded-2xl bg-brand-orange/15 border-2 border-brand-orange/50 flex items-center justify-between shadow-lg">
                        <div>
                            <span class="text-xs text-brand-orange font-extrabold uppercase tracking-wider block">Official Competition Entry Fee</span>
                            <span id="contestant-price-detail" class="text-xs text-slate-200 block mt-0.5 font-medium">Select category to view price</span>
                        </div>
                        <div class="text-right">
                            <span id="contestant-fee-display" class="font-heading text-3xl font-black text-white">₱0.00</span>
                            <span class="text-[10px] text-slate-400 block font-semibold">fixed rate</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Number (Guest Only) -->
                <div id="field-guest-contact" class="sm:col-span-2 hidden">
                    <label for="contact_number" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Contact Number *</label>
                    <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number') }}" placeholder="e.g. 0917 123 4567" class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="button" onclick="goToStep(2)" class="px-8 py-3.5 text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-brand-orange to-brand-fire hover:from-amber-500 hover:to-brand-orange rounded-xl shadow-lg transition-all flex items-center gap-2">
                    Proceed to Choose Ticket
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>
        </div>

        <!-- ==================== STEP 2: TICKET SELECTION ==================== -->
        <div id="step-2" class="step-container space-y-8 hidden">
            <div class="border-b border-white/10 pb-4">
                <h2 class="font-heading text-xl font-extrabold text-white flex items-center gap-2">
                    <span class="w-2 h-6 bg-brand-cyan rounded-full"></span>
                    Step 2: Choose Your Ticket Option
                </h2>
                <p class="text-xs text-slate-400 mt-1">Ticket pricing automatically adjusts based on your UBLC status.</p>
            </div>

            <!-- Price Callout Indicator -->
            <div id="ublc-status-banner" class="p-4 rounded-2xl bg-slate-900/80 border border-slate-700 flex items-center justify-between text-xs">
                <span class="text-slate-300">Selected Pricing Category:</span>
                <span id="ublc-status-text" class="font-extrabold text-brand-cyan uppercase">Outside UB Lipa City Rate</span>
            </div>

            <!-- Contestant Pass Card (Visible when registration_type is contestant) -->
            <div id="contestant-ticket-card" class="glass-card rounded-3xl p-6 sm:p-8 border-2 border-brand-orange bg-brand-orange/10 flex items-center justify-between">
                <div>
                    <div class="text-xs font-extrabold text-brand-orange uppercase tracking-wider mb-1">Official Contestant Access Pass</div>
                    <h3 id="contestant-summary-title" class="font-heading text-xl font-extrabold text-white">Competition Entry</h3>
                    <p id="contestant-summary-subtitle" class="text-xs text-slate-300 mt-1">Official contest registration fee from competition guidelines.</p>
                </div>
                <div class="text-right shrink-0">
                    <span id="contestant-summary-price" class="font-heading text-3xl font-black text-brand-orange">₱0.00</span>
                    <span class="text-[10px] text-slate-400 block font-semibold">fixed fee</span>
                </div>
            </div>

            <!-- Guest Ticket Options List (Visible when registration_type is guest) -->
            <div id="guest-ticket-options" class="space-y-4">
                <!-- Day 1 Option -->
                <label id="ticket-card-day1" class="cursor-pointer border-2 border-slate-700 bg-slate-900/50 hover:border-slate-500 rounded-2xl p-5 flex items-center justify-between transition-all">
                    <div class="flex items-center gap-4">
                        <input type="radio" name="ticket_type" value="day1" class="w-5 h-5 accent-brand-orange" {{ old('ticket_type', 'day1') === 'day1' ? 'checked' : '' }} onchange="selectTicketOption('day1')">
                        <div>
                            <span class="font-heading font-extrabold text-base text-white block">Day 1 Ticket</span>
                            <span class="text-xs text-slate-400 block mt-0.5">Access to Day 1 Exhibition & Judging competitions</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span id="price-display-day1" class="font-heading text-2xl font-black text-brand-orange">₱120</span>
                        <span class="text-[10px] text-slate-400 block font-semibold">per ticket</span>
                    </div>
                </label>

                <!-- Day 2 Option -->
                <label id="ticket-card-day2" class="cursor-pointer border-2 border-slate-700 bg-slate-900/50 hover:border-slate-500 rounded-2xl p-5 flex items-center justify-between transition-all">
                    <div class="flex items-center gap-4">
                        <input type="radio" name="ticket_type" value="day2" class="w-5 h-5 accent-brand-orange" {{ old('ticket_type') === 'day2' ? 'checked' : '' }} onchange="selectTicketOption('day2')">
                        <div>
                            <span class="font-heading font-extrabold text-base text-white block">Day 2 Ticket</span>
                            <span class="text-xs text-slate-400 block mt-0.5">Access to Day 2 Finals Showdown & Awarding Ceremony</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span id="price-display-day2" class="font-heading text-2xl font-black text-brand-cyan">₱120</span>
                        <span class="text-[10px] text-slate-400 block font-semibold">per ticket</span>
                    </div>
                </label>

                <!-- Both Days Option (Best Value) -->
                <label id="ticket-card-both" class="cursor-pointer border-2 border-brand-amber bg-brand-amber/10 rounded-2xl p-5 flex items-center justify-between transition-all relative">
                    <span class="absolute -top-3 right-6 bg-brand-amber text-slate-950 font-extrabold text-[9px] uppercase px-3 py-0.5 rounded-full shadow">BEST VALUE</span>
                    <div class="flex items-center gap-4">
                        <input type="radio" name="ticket_type" value="both" class="w-5 h-5 accent-brand-orange" {{ old('ticket_type') === 'both' ? 'checked' : '' }} onchange="selectTicketOption('both')">
                        <div>
                            <span class="font-heading font-extrabold text-base text-white block">Both Day 1 and Day 2 Pass</span>
                            <span class="text-xs text-slate-300 block mt-0.5">Full 2-Day Event Access Pass</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span id="price-display-both" class="font-heading text-3xl font-black text-emerald-400">₱170</span>
                        <span class="text-[10px] text-slate-300 block font-semibold">total 2 days</span>
                    </div>
                </label>
            </div>

            <!-- Stepper Actions -->
            <div class="flex items-center justify-between pt-4">
                <button type="button" onclick="goToStep(1)" class="px-6 py-3 text-xs font-bold text-slate-300 bg-slate-800 hover:bg-slate-700 rounded-xl transition-all">
                    &larr; Back to Details
                </button>
                <button type="button" onclick="goToStep(3)" class="px-8 py-3.5 text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-brand-orange to-brand-fire hover:from-amber-500 hover:to-brand-orange rounded-xl shadow-lg transition-all flex items-center gap-2">
                    PROCEED TO PAYMENT
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>
        </div>

        <!-- ==================== STEP 3: PAYMENT ==================== -->
        <div id="step-3" class="step-container space-y-8 hidden">
            <div class="border-b border-white/10 pb-4">
                <h2 class="font-heading text-xl font-extrabold text-white flex items-center gap-2">
                    <span class="w-2 h-6 bg-emerald-500 rounded-full"></span>
                    Step 3: GCash Payment Confirmation
                </h2>
                <p class="text-xs text-slate-400 mt-1">Scan the QR code below and input your transaction details.</p>
            </div>

            <!-- GCash QR Code Display Box -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center bg-slate-900/90 border border-slate-700 rounded-2xl p-6">
                <!-- QR Image -->
                <div class="md:col-span-5 text-center">
                    <div class="bg-white p-3 rounded-2xl inline-block shadow-xl border-4 border-blue-600 group relative cursor-pointer" onclick="openImageLightbox('{{ asset('images/gcash-qr.svg') }}', 'Official GCash QR Code')">
                        <img src="{{ asset('images/gcash-qr.svg') }}" alt="GCash QR Code" class="w-56 h-auto mx-auto rounded-lg transition-transform group-hover:scale-105">
                        <div class="mt-2 text-[10px] font-extrabold text-blue-600 flex items-center justify-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            Click to View Enlarged QR
                        </div>
                    </div>
                </div>

                <!-- Payment Details -->
                <div class="md:col-span-7 space-y-3 text-xs">
                    <div class="inline-block px-3 py-1 bg-blue-600/30 text-blue-400 border border-blue-500/50 rounded-lg font-extrabold uppercase tracking-widest text-[10px]">
                        OFFICIAL GCASH PAYMENT
                    </div>
                    <div class="text-sm font-bold text-white">National Food Showdown Committee</div>
                    <div class="text-slate-300">GCash Account Number: <span class="font-mono text-brand-orange font-bold text-sm">0917 123 4567</span></div>
                    <div class="text-slate-300">Account Name: <span class="font-mono text-white font-bold">NFS COMMITTEE</span></div>
                    
                    <!-- Selected Ticket Summary -->
                    <div class="mt-4 pt-4 border-t border-slate-800 flex items-center justify-between">
                        <span class="text-slate-400">Total Payable Amount:</span>
                        <span id="final-payable-price" class="font-heading text-2xl font-black text-emerald-400">₱120.00</span>
                    </div>
                </div>
            </div>

            <!-- Payment Input Fields -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Email (Required) -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Email Address * (required)</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="your-email@gmail.com" required class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
                </div>

                <!-- GCash Name (Required) -->
                <div>
                    <label for="gcash_name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">GCash Account Name * (required)</label>
                    <input type="text" id="gcash_name" name="gcash_name" value="{{ old('gcash_name') }}" placeholder="e.g. Juan D." required class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
                </div>

                <!-- GCash Number (Required) -->
                <div>
                    <label for="gcash_number" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">GCash Mobile Number * (required)</label>
                    <input type="text" id="gcash_number" name="gcash_number" value="{{ old('gcash_number') }}" placeholder="e.g. 09171234567" required class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
                </div>

                <!-- Reference Number (Required) -->
                <div>
                    <label for="reference_number" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">GCash Reference Number * (required)</label>
                    <input type="text" id="reference_number" name="reference_number" value="{{ old('reference_number') }}" placeholder="e.g. 100234567891" required class="w-full bg-slate-900/90 border border-slate-700 rounded-xl px-4 py-3.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
                </div>

                <!-- Payment Screenshot Upload with Preview & X Clear Button -->
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Payment Screenshot * (required)</label>
                    
                    <!-- File Input Box -->
                    <div id="file-dropzone" class="border-2 border-dashed border-slate-700 hover:border-brand-orange rounded-2xl p-6 text-center bg-slate-900/60 transition-all relative">
                        <input type="file" id="payment_screenshot" name="payment_screenshot" accept="image/*" required onchange="handleFilePreview(this)" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        
                        <div id="upload-prompt" class="space-y-2">
                            <svg class="w-10 h-10 text-slate-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <div class="text-sm font-semibold text-slate-200">Click or Drag to Upload Payment Screenshot</div>
                            <div class="text-xs text-slate-400">Supported formats: JPG, PNG, WEBP (Max 5MB)</div>
                        </div>

                        <!-- Image Preview Container (Clickable to enlarge & clickable 'X' button to remove) -->
                        <div id="image-preview-container" class="hidden relative inline-block max-w-xs mx-auto mt-2 z-20 pointer-events-auto">
                            <div class="relative group">
                                <img id="image-preview" src="" alt="Screenshot Preview" onclick="openImageLightbox(this.src, 'GCash Payment Screenshot')" class="max-h-64 rounded-xl border border-slate-600 shadow-2xl object-contain cursor-pointer transition-all hover:scale-[1.02] hover:border-brand-orange" title="Click to view enlarged image">
                                <div onclick="openImageLightbox(document.getElementById('image-preview').src, 'GCash Payment Screenshot')" class="absolute bottom-2 left-1/2 -translate-x-1/2 px-3 py-1 bg-slate-950/85 backdrop-blur-md rounded-full text-[10px] font-bold text-slate-200 border border-white/20 flex items-center gap-1.5 cursor-pointer hover:bg-brand-orange hover:text-white transition-all shadow-lg shrink-0 whitespace-nowrap">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    <span>Click to View Enlarged</span>
                                </div>
                            </div>

                            <!-- Clickable X button -->
                            <button type="button" onclick="clearFilePreview(event)" class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-rose-600 hover:bg-rose-500 text-white font-extrabold flex items-center justify-center shadow-lg cursor-pointer transition-all hover:scale-110 z-30" title="Remove Screenshot">
                                &times;
                            </button>
                            <div id="file-name-label" class="text-xs text-slate-300 font-mono mt-2 truncate max-w-xs"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Submit Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-white/10">
                <button type="button" onclick="goToStep(2)" class="px-6 py-3 text-xs font-bold text-slate-300 bg-slate-800 hover:bg-slate-700 rounded-xl transition-all">
                    &larr; Back to Ticket Selection
                </button>

                <button type="submit" id="btn-submit-registration" class="px-10 py-4 text-sm font-black uppercase tracking-wider text-white bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 rounded-2xl shadow-xl shadow-emerald-500/20 transition-all hover:scale-105 active:scale-95 flex items-center gap-2">
                    <svg id="submit-icon-check" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <svg id="submit-spinner-icon" class="w-5 h-5 animate-spin hidden" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span id="submit-btn-text">SUBMIT REGISTRATION</span>
                </button>
            </div>
        </div>
    </form>
</div>

<!-- SUBMISSION LOADING OVERLAY MODAL -->
<div id="submission-loading-overlay" class="fixed inset-0 z-[999999] hidden bg-slate-950/90 backdrop-blur-md flex flex-col items-center justify-center p-4 select-none">
    <div class="glass-card rounded-3xl p-8 sm:p-10 max-w-md w-full text-center border border-brand-orange/30 shadow-2xl space-y-6">
        <!-- Glowing Spinner Container -->
        <div class="relative w-24 h-24 mx-auto flex items-center justify-center">
            <div class="absolute inset-0 rounded-full border-4 border-brand-orange/20 animate-pulse"></div>
            <div class="absolute inset-0 rounded-full border-4 border-brand-orange border-t-transparent animate-spin"></div>
            <img src="{{ asset('images/logo-top-left.jpg') }}" alt="Logo" class="w-12 h-12 rounded-xl object-cover shadow-lg border border-white/20">
        </div>

        <div class="space-y-2">
            <h3 class="font-heading text-xl font-black text-white tracking-wide">Submitting Your Ticket...</h3>
            <p class="text-xs text-slate-300 leading-relaxed">We are uploading your proof of payment and generating your official ticket number.</p>
        </div>

        <!-- Prominent Warning Badge -->
        <div class="p-3.5 rounded-2xl bg-amber-500/10 border border-amber-500/30 text-amber-300 text-xs font-bold flex items-center justify-center gap-2 shadow-inner">
            <svg class="w-4 h-4 text-amber-400 shrink-0 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <span>Please wait. Do not close or refresh this tab.</span>
        </div>

        <div class="inline-flex items-center gap-2 px-4 py-2 bg-brand-orange/15 text-brand-orange text-xs font-extrabold rounded-full border border-brand-orange/30">
            <svg class="w-4 h-4 animate-spin text-brand-orange" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Processing Order... Please Wait</span>
        </div>
    </div>
</div>

<!-- ENLARGED IMAGE LIGHTBOX MODAL -->
<div id="image-lightbox-modal" class="fixed inset-0 z-[99999] hidden bg-black/90 backdrop-blur-md flex flex-col items-center justify-center p-4" onclick="closeImageLightbox()">
    <div class="relative max-w-4xl w-full max-h-[90vh] flex flex-col items-center justify-center p-2" onclick="event.stopPropagation()">
        <!-- Close Button -->
        <button type="button" onclick="closeImageLightbox()" class="absolute -top-12 right-0 text-white/80 hover:text-white font-extrabold text-3xl leading-none transition-colors" title="Close">
            &times;
        </button>
        <div id="lightbox-title" class="text-xs font-extrabold text-brand-orange mb-3 uppercase tracking-wider">Enlarged Image Preview</div>
        <div class="bg-slate-950 rounded-2xl p-2 border border-slate-700 shadow-2xl max-h-[80vh] overflow-auto flex items-center justify-center">
            <img id="lightbox-img" src="" alt="Enlarged Image" class="max-w-full max-h-[75vh] object-contain rounded-xl shadow-2xl">
        </div>
        <div class="mt-4 flex items-center gap-3">
            <a id="lightbox-download-link" href="#" target="_blank" download class="px-5 py-2 text-xs font-bold text-white bg-brand-orange hover:bg-amber-500 rounded-xl transition-all flex items-center gap-2 shadow-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Open Full Image
            </a>
            <button type="button" onclick="closeImageLightbox()" class="px-6 py-2 text-xs font-bold text-slate-300 bg-slate-800 hover:bg-slate-700 rounded-xl transition-all">
                Close Preview
            </button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let currentStep = 1;

    const COMPETITION_DATA = {
        'A.1': { name: 'KLASIKA MODERNA KULINARYA', has_div: true, fees: { professional: 1500, student: 1000 } },
        'A.2': { name: 'BEST REGIONAL INGREDIENT', has_div: true, fees: { professional: 1000, student: 700 } },
        'A.3': { name: 'BEST TRADITIONAL / MODERN RECIPE AND COOKING TECHNIQUE', has_div: true, fees: { professional: 1000, student: 700 } },
        'A.4': { name: 'REGIONAL PICA-PICA', has_div: true, fees: { professional: 1000, student: 700 } },
        'B.1': { name: 'REGIONAL BARTENDING / FLAIRTENDING COMPETITION', has_div: true, fees: { professional: 1000, student: 700 } },
        'B.2': { name: 'REGIONAL COFFEE CONCOCTION', has_div: true, fees: { professional: 1000, student: 700 } },
        'C.1': { name: 'REGIONAL JAMS AND PRESERVES', has_div: true, fees: { professional: 1000, student: 700 } },
        'C.2': { name: 'REGIONAL FRUIT FLAMBÉ', has_div: true, fees: { professional: 1000, student: 700 } },
        'D.1': { name: 'REGIONAL DESSERT/KAKANIN', has_div: true, fees: { professional: 1000, student: 700 } },
        'D.2': { name: 'REGIONAL TABLE SETTING WITH CENTERPIECE', has_div: false, fee: 500 },
        'D.3': { name: 'WEDDING CAKE', has_div: true, fees: { professional: 700, student: 500 } },
        'D.4': { name: 'REGIONAL CREATIVE CAKE DISPLAY', has_div: true, fees: { professional: 1000, student: 700 } },
        'F.1': { name: 'NAPKIN FOLDING', has_div: false, fee: 500 },
        'F.2': { name: 'MOCKTAIL CONCOCTIONS', has_div: false, fee: 700 },
        'I.1': { name: 'QUIZ-BEE', has_div: false, fee: 500 },
        'T.1': { name: 'INFLIGHT SAFETY DEMONSTRATION AND EMERGENCY RESPONSE', has_div: false, fee: 700 },
        'T.2': { name: 'KASUOTANG REHIYONES', has_div: false, fee: 700 },
        'T.3': { name: 'TOURISM POSTER MAKING', has_div: false, fee: 700 }
    };

    function onContestCategoryChange() {
        const catSelect = document.getElementById('contest_category');
        const divContainer = document.getElementById('field-contestant-division');
        const divSelect = document.getElementById('contest_division');
        const priceCallout = document.getElementById('contestant-price-callout');
        const catCode = catSelect.value;

        if (!catCode || !COMPETITION_DATA[catCode]) {
            divContainer.classList.add('hidden');
            priceCallout.classList.add('hidden');
            updateTicketPrices();
            return;
        }

        const data = COMPETITION_DATA[catCode];
        if (data.has_div) {
            divContainer.classList.remove('hidden');
            if (!divSelect.value) {
                divSelect.value = 'student';
            }
        } else {
            divContainer.classList.add('hidden');
            divSelect.value = '';
        }

        updateContestantFeeDisplay();
        updateTicketPrices();
    }

    function onContestDivisionChange() {
        updateContestantFeeDisplay();
        updateTicketPrices();
    }

    function updateContestantFeeDisplay() {
        const catSelect = document.getElementById('contest_category');
        const divSelect = document.getElementById('contest_division');
        const priceCallout = document.getElementById('contestant-price-callout');
        const feeDisplay = document.getElementById('contestant-fee-display');
        const detailDisplay = document.getElementById('contestant-price-detail');
        const catCode = catSelect.value;

        if (!catCode || !COMPETITION_DATA[catCode]) {
            priceCallout.classList.add('hidden');
            return;
        }

        const data = COMPETITION_DATA[catCode];
        let price = 0;
        let detailText = "";

        if (data.has_div) {
            const divValue = divSelect.value || 'student';
            price = data.fees[divValue] || data.fees.student;
            const divLabel = divValue === 'professional' ? 'Professional' : 'Student / College / SHS';
            detailText = `${data.name} • ${divLabel} Division`;
        } else {
            price = data.fee;
            detailText = `${data.name} • Fixed Entry Fee`;
        }

        feeDisplay.textContent = `₱${price.toLocaleString('en-US')}.00`;
        detailDisplay.textContent = detailText;
        priceCallout.classList.remove('hidden');

        // Update contestant summary in step 2
        const summaryTitle = document.getElementById('contestant-summary-title');
        const summarySub = document.getElementById('contestant-summary-subtitle');
        const summaryPrice = document.getElementById('contestant-summary-price');
        if (summaryTitle) summaryTitle.textContent = data.name;
        if (summarySub) summarySub.textContent = detailText;
        if (summaryPrice) summaryPrice.textContent = `₱${price.toLocaleString('en-US')}`;
    }

    function goToStep(step) {
        // Simple front-end validation check when moving forward
        if (step > currentStep) {
            if (currentStep === 1) {
                const name = document.getElementById('name').value.trim();
                const school = document.getElementById('school').value.trim();
                const type = document.querySelector('input[name="registration_type"]:checked').value;
                const contestCat = document.getElementById('contest_category').value;
                const contact = document.getElementById('contact_number').value.trim();

                if (!name || !school) {
                    alert('Please fill in your Full Name and School before proceeding.');
                    return;
                }
                if (type === 'contestant') {
                    if (!contestCat) {
                        alert('Please select a competition category.');
                        return;
                    }
                    if (COMPETITION_DATA[contestCat] && COMPETITION_DATA[contestCat].has_div) {
                        const divVal = document.getElementById('contest_division').value;
                        if (!divVal) {
                            alert('Please select a division level (Professional or Student).');
                            return;
                        }
                    }
                }
                if (type === 'guest' && !contact) {
                    alert('Please enter your contact number.');
                    return;
                }
            }
        }

        currentStep = step;

        // Hide all steps
        document.querySelectorAll('.step-container').forEach(el => el.classList.add('hidden'));
        document.getElementById(`step-${step}`).classList.remove('hidden');

        // Update Stepper Badges & Line
        const progressPercent = step === 1 ? '0%' : (step === 2 ? '50%' : '100%');
        document.getElementById('step-line-progress').style.width = progressPercent;

        for (let i = 1; i <= 3; i++) {
            const badge = document.getElementById(`step-badge-${i}`);
            const text = document.getElementById(`step-text-${i}`);

            if (i <= step) {
                badge.className = "relative z-10 w-10 h-10 rounded-full bg-brand-orange text-white font-extrabold flex items-center justify-center text-sm shadow-lg ring-4 ring-brand-dark transition-all";
                text.className = "text-brand-orange font-extrabold";
            } else {
                badge.className = "relative z-10 w-10 h-10 rounded-full bg-slate-800 text-slate-400 font-extrabold flex items-center justify-center text-sm ring-4 ring-brand-dark transition-all";
                text.className = "text-slate-400 font-normal";
            }
        }

        window.scrollTo({ top: 150, behavior: 'smooth' });
    }

    function switchRegistrationType(type) {
        const contestantCard = document.getElementById('card-type-contestant');
        const guestCard = document.getElementById('card-type-guest');
        const contestantField = document.getElementById('field-contestant-category');
        const guestField = document.getElementById('field-guest-contact');
        const contestantTicketCard = document.getElementById('contestant-ticket-card');
        const guestTicketOptions = document.getElementById('guest-ticket-options');
        const ublcStatusBanner = document.getElementById('ublc-status-banner');

        if (type === 'contestant') {
            contestantCard.className = "cursor-pointer border-2 border-brand-orange bg-brand-orange/10 rounded-2xl p-5 flex items-start gap-4 transition-all";
            guestCard.className = "cursor-pointer border-2 border-slate-700 bg-slate-900/50 rounded-2xl p-5 flex items-start gap-4 transition-all";
            contestantField.classList.remove('hidden');
            guestField.classList.add('hidden');
            if (contestantTicketCard) contestantTicketCard.classList.remove('hidden');
            if (guestTicketOptions) guestTicketOptions.classList.add('hidden');
            if (ublcStatusBanner) ublcStatusBanner.classList.add('hidden');
        } else {
            guestCard.className = "cursor-pointer border-2 border-brand-orange bg-brand-orange/10 rounded-2xl p-5 flex items-start gap-4 transition-all";
            contestantCard.className = "cursor-pointer border-2 border-slate-700 bg-slate-900/50 rounded-2xl p-5 flex items-start gap-4 transition-all";
            guestField.classList.remove('hidden');
            contestantField.classList.add('hidden');
            if (contestantTicketCard) contestantTicketCard.classList.add('hidden');
            if (guestTicketOptions) guestTicketOptions.classList.remove('hidden');
            if (ublcStatusBanner) ublcStatusBanner.classList.remove('hidden');
        }

        updateTicketPrices();
    }

    const UBLC_SCHOOL_NAME = "University of Batangas Lipa City";

    function onUblcCheckboxChange() {
        const isUblcCheckbox = document.getElementById('is_ublc');
        const schoolInput = document.getElementById('school');
        const ublcBadge = document.getElementById('ublc-badge');

        if (isUblcCheckbox.checked) {
            schoolInput.value = UBLC_SCHOOL_NAME;
            schoolInput.readOnly = true;
            schoolInput.classList.add('bg-slate-950/90', 'border-emerald-500/50', 'text-slate-300', 'cursor-not-allowed', 'pr-32');
            if (ublcBadge) ublcBadge.classList.remove('hidden');
        } else {
            schoolInput.readOnly = false;
            schoolInput.classList.remove('bg-slate-950/90', 'border-emerald-500/50', 'text-slate-300', 'cursor-not-allowed', 'pr-32');
            if (ublcBadge) ublcBadge.classList.add('hidden');
            if (schoolInput.value === UBLC_SCHOOL_NAME) {
                schoolInput.value = "";
            }
        }

        updateTicketPrices();
    }

    function updateTicketPrices() {
        const isUblc = document.getElementById('is_ublc').checked;
        const bannerText = document.getElementById('ublc-status-text');
        const regTypeRadio = document.querySelector('input[name="registration_type"]:checked');
        const regType = regTypeRadio ? regTypeRadio.value : 'contestant';

        if (isUblc) {
            if (bannerText) bannerText.textContent = "University of Batangas Lipa City (UBLC) Rate";
            if (bannerText) bannerText.className = "font-extrabold text-emerald-400 uppercase";
            document.getElementById('price-display-day1').textContent = "₱100";
            document.getElementById('price-display-day2').textContent = "₱100";
            document.getElementById('price-display-both').textContent = "₱150";
        } else {
            if (bannerText) bannerText.textContent = "Standard Rate";
            if (bannerText) bannerText.className = "font-extrabold text-brand-cyan uppercase";
            document.getElementById('price-display-day1').textContent = "₱120";
            document.getElementById('price-display-day2').textContent = "₱120";
            document.getElementById('price-display-both').textContent = "₱170";
        }

        if (regType === 'contestant') {
            updateContestantFeeDisplay();
            const catCode = document.getElementById('contest_category').value;
            let price = 0;
            if (catCode && COMPETITION_DATA[catCode]) {
                const data = COMPETITION_DATA[catCode];
                if (data.has_div) {
                    const divVal = document.getElementById('contest_division').value || 'student';
                    price = data.fees[divVal] || data.fees.student;
                } else {
                    price = data.fee;
                }
            }
            document.getElementById('final-payable-price').textContent = price > 0 ? `₱${price.toLocaleString('en-US')}.00` : '₱0.00';
        } else {
            const selectedTicketRadio = document.querySelector('input[name="ticket_type"]:checked');
            const selectedTicket = selectedTicketRadio ? selectedTicketRadio.value : 'day1';
            selectTicketOption(selectedTicket);
        }
    }

    function selectTicketOption(ticketType) {
        const isUblc = document.getElementById('is_ublc').checked;
        const regTypeRadio = document.querySelector('input[name="registration_type"]:checked');
        const regType = regTypeRadio ? regTypeRadio.value : 'guest';

        if (regType === 'contestant') {
            const catCode = document.getElementById('contest_category').value;
            let price = 0;
            if (catCode && COMPETITION_DATA[catCode]) {
                const data = COMPETITION_DATA[catCode];
                if (data.has_div) {
                    const divVal = document.getElementById('contest_division').value || 'student';
                    price = data.fees[divVal] || data.fees.student;
                } else {
                    price = data.fee;
                }
            }
            document.getElementById('final-payable-price').textContent = price > 0 ? `₱${price.toLocaleString('en-US')}.00` : '₱0.00';
            return;
        }

        let price = 120;
        if (ticketType === 'day1' || ticketType === 'day2') {
            price = isUblc ? 100 : 120;
        } else if (ticketType === 'both') {
            price = isUblc ? 150 : 170;
        }

        document.getElementById('final-payable-price').textContent = `₱${price}.00`;
    }

    // Handle File Preview
    function handleFilePreview(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
                document.getElementById('file-name-label').textContent = file.name;
                document.getElementById('upload-prompt').classList.add('hidden');
                document.getElementById('image-preview-container').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    // Clear File Preview via Clickable 'X' Button
    function clearFilePreview(e) {
        if (e) e.preventDefault();
        const input = document.getElementById('payment_screenshot');
        input.value = ''; // clear file input
        document.getElementById('image-preview').src = '';
        document.getElementById('file-name-label').textContent = '';
        document.getElementById('image-preview-container').classList.add('hidden');
        document.getElementById('upload-prompt').classList.remove('hidden');
    }

    // Image Lightbox Functions for Zoomed View
    function openImageLightbox(imgSrc, title = 'Enlarged Image Preview') {
        if (!imgSrc) return;
        const modal = document.getElementById('image-lightbox-modal');
        const img = document.getElementById('lightbox-img');
        const titleEl = document.getElementById('lightbox-title');
        const link = document.getElementById('lightbox-download-link');

        img.src = imgSrc;
        titleEl.textContent = title;
        if (link) link.href = imgSrc;

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeImageLightbox() {
        const modal = document.getElementById('image-lightbox-modal');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Close Lightbox on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeImageLightbox();
    });

    // Handle Form Submit Loading State & Overlay
    document.getElementById('registration-form').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('btn-submit-registration');
        const submitText = document.getElementById('submit-btn-text');
        const checkIcon = document.getElementById('submit-icon-check');
        const spinnerIcon = document.getElementById('submit-spinner-icon');
        const loadingOverlay = document.getElementById('submission-loading-overlay');

        if (submitBtn) {
            submitBtn.classList.add('opacity-75', 'pointer-events-none');
            if (checkIcon) checkIcon.classList.add('hidden');
            if (spinnerIcon) spinnerIcon.classList.remove('hidden');
            if (submitText) submitText.textContent = 'SUBMITTING...';
        }

        if (loadingOverlay) {
            loadingOverlay.classList.remove('hidden');
        }
    });

    // Initialize state on load
    document.addEventListener('DOMContentLoaded', () => {
        const checkedType = document.querySelector('input[name="registration_type"]:checked').value;
        switchRegistrationType(checkedType);

        const isUblcCheckbox = document.getElementById('is_ublc');
        const schoolInput = document.getElementById('school');
        if (isUblcCheckbox.checked && !schoolInput.value) {
            schoolInput.value = UBLC_SCHOOL_NAME;
        }

        updateTicketPrices();
    });
</script>
@endsection
