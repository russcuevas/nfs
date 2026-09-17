@extends('layouts.guest')

@section('title', 'Event Registration | National Food Showdown 2026')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8 sm:py-12">

        <!-- Page Header -->
        <div class="text-center mb-10">
            <h1 class="font-heading text-3xl sm:text-5xl font-extrabold text-slate-900 mb-3">Event Registration</h1>
            <p class="text-slate-600 text-sm max-w-xl mx-auto">Fill in your details below to register and secure your
                official ticket for National Food Showdown 2026.</p>
        </div>

        <!-- Stepper Indicator in UB Maroon & Gold -->
        <div class="mb-10 max-w-2xl mx-auto">
            <div class="flex items-center justify-between relative">
                <div class="w-full absolute top-1/2 left-0 h-1 bg-slate-200 -z-0"></div>
                <div id="step-line-progress"
                    class="absolute top-1/2 left-0 h-1 bg-gradient-to-r from-[#752738] via-[#FEC452] to-[#752738] transition-all duration-500"
                    style="width: 0%;"></div>

                <!-- Step 1 Circle -->
                <div id="step-badge-1"
                    class="relative z-10 w-10 h-10 rounded-full bg-[#752738] text-white border-2 border-[#FEC452] font-extrabold flex items-center justify-center text-sm shadow-md ring-4 ring-white transition-all">
                    1
                </div>

                <!-- Step 2 Circle -->
                <div id="step-badge-2"
                    class="relative z-10 w-10 h-10 rounded-full bg-slate-200 text-slate-500 font-extrabold flex items-center justify-center text-sm ring-4 ring-white transition-all">
                    2
                </div>

                <!-- Step 3 Circle -->
                <div id="step-badge-3"
                    class="relative z-10 w-10 h-10 rounded-full bg-slate-200 text-slate-500 font-extrabold flex items-center justify-center text-sm ring-4 ring-white transition-all">
                    3
                </div>
            </div>

            <div class="flex justify-between text-[11px] font-bold uppercase tracking-wider text-slate-500 mt-3 px-1">
                <span id="step-text-1" class="text-[#752738] font-extrabold">1. Details</span>
                <span id="step-text-2">2. Ticket Selection</span>
                <span id="step-text-3">3. Payment</span>
            </div>
        </div>

        <!-- Main Form Container -->
        <form id="registration-form" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data"
            class="glass-card rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-xl">
            @csrf

            @if ($errors->any())
                <div class="mb-8 p-4 bg-rose-50 border border-rose-200 rounded-2xl text-rose-800 text-xs space-y-1">
                    <div class="font-bold text-rose-900">Please correct the following errors:</div>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- ==================== STEP 1: DETAILS ==================== -->
            <div id="step-1" class="step-container space-y-8">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="font-heading text-xl font-extrabold text-slate-900 flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#752738] rounded-full"></span>
                        Step 1: Participant Details
                    </h2>
                    <p class="text-xs text-slate-500 mt-1">Select your registration category and provide basic information.
                    </p>
                </div>

                <!-- Registration Type Selector Card -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-3">Registration
                        Category *</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Contestant Option -->
                        <label id="card-type-contestant"
                            class="cursor-pointer border-2 border-[#752738] bg-[#752738]/5 rounded-2xl p-5 flex items-start gap-4 transition-all shadow-sm">
                            <input type="radio" name="registration_type" value="contestant" class="mt-1 accent-[#752738]"
                                {{ old('registration_type', $type) === 'contestant' ? 'checked' : '' }}
                                onchange="switchRegistrationType('contestant')">
                            <div>
                                <span class="font-heading font-extrabold text-base text-slate-900 block">Contestant</span>
                                <span class="text-xs text-slate-600 leading-relaxed block mt-1">Participating in culinary
                                    competitions & judging rounds.</span>
                            </div>
                        </label>

                        <!-- Guest/Watcher Option -->
                        <label id="card-type-guest"
                            class="cursor-pointer border-2 border-slate-200 bg-slate-50 hover:bg-slate-100 rounded-2xl p-5 flex items-start gap-4 transition-all">
                            <input type="radio" name="registration_type" value="guest" class="mt-1 accent-[#752738]"
                                {{ old('registration_type', $type) === 'guest' ? 'checked' : '' }}
                                onchange="switchRegistrationType('guest')">
                            <div>
                                <span class="font-heading font-extrabold text-base text-slate-800 block">Guest /
                                    Watcher</span>
                                <span class="text-xs text-slate-600 leading-relaxed block mt-1">Attending as audience,
                                    spectator, or event visitor.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Form Inputs -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div class="sm:col-span-2">
                        <label for="name"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Full Name *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="e.g. Juan Dela Cruz" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#752738] focus:ring-2 focus:ring-[#752738]/10 transition-all">
                    </div>

                    <!-- School / University Field with Integrated UBLC Checkbox -->
                    <div class="sm:col-span-2 space-y-2">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                            <label for="school" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                                School / Institution *
                            </label>

                            <!-- UBLC Toggle Pill directly above field -->
                            <label
                                class="inline-flex items-center gap-2 cursor-pointer bg-slate-50 border border-slate-300 hover:border-[#752738] px-3.5 py-1.5 rounded-xl transition-all select-none self-start sm:self-auto shadow-sm">
                                <input type="checkbox" id="is_ublc" name="is_ublc" value="1"
                                    {{ old('is_ublc') ? 'checked' : '' }} onchange="onUblcCheckboxChange()"
                                    class="w-4 h-4 rounded accent-[#752738]">
                                <span class="text-xs font-bold text-[#752738]">From UB Lipa City (UBLC)?</span>
                            </label>
                        </div>

                        <div class="relative">
                            <input type="text" id="school" name="school" value="{{ old('school') }}"
                                placeholder="e.g. University of Batangas Lipa City" required
                                class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#752738] focus:ring-2 focus:ring-[#752738]/10 transition-all">
                            <div id="ublc-badge"
                                class="hidden absolute right-3 top-1/2 -translate-y-1/2 px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-300 text-[11px] font-extrabold flex items-center gap-1.5 pointer-events-none">
                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                UBLC Auto-filled
                            </div>
                        </div>
                        <p class="text-[11px] text-slate-500">Check the box above if you are a student or staff at
                            University of Batangas Lipa City.</p>
                    </div>

                    <!-- Contest Categories Checklist (Contestant Only) -->
                    <div id="field-contestant-category" class="sm:col-span-2 space-y-4">

                        <!-- Division Level Dropdown -->
                        <div
                            class="bg-gradient-to-r from-amber-50/70 via-white to-amber-50/70 border-2 border-[#752738]/30 rounded-2xl p-4 sm:p-5 shadow-sm space-y-3">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                                <div>
                                    <label for="contest_division"
                                        class="block text-xs font-black uppercase tracking-wider text-slate-900 flex items-center gap-2">
                                        <span class="w-2 h-4 bg-[#752738] rounded-full"></span>
                                        Select Contestant Division Level *
                                    </label>
                                    <p class="text-[11px] text-slate-600 mt-0.5">Choose your division to automatically show
                                        and apply College & SHS or professional rates for all competitions.</p>
                                </div>
                                <span id="active-division-badge"
                                    class="px-3 py-1 bg-[#752738] text-[#FEC452] font-black text-xs rounded-xl shadow-sm self-start sm:self-auto shrink-0 border border-[#FEC452]/40">
                                    🎓 College and SHS Division Active
                                </span>
                            </div>

                            <div class="relative">
                                <select id="contest_division" name="contest_division" onchange="onGlobalDivisionChange()"
                                    class="w-full bg-white border-2 border-[#752738]/40 hover:border-[#752738] focus:border-[#752738] focus:ring-2 focus:ring-[#752738]/20 rounded-xl px-4 py-3 text-sm font-black text-slate-900 cursor-pointer transition-all shadow-sm">
                                    <option value="student"
                                        {{ old('contest_division', 'student') === 'student' ? 'selected' : '' }}>
                                        🎓 College and SHS Division
                                    </option>
                                    <option value="professional"
                                        {{ old('contest_division') === 'professional' ? 'selected' : '' }}>
                                        👨‍🍳 Professional Division
                                    </option>
                                </select>
                            </div>
                            <p class="text-[11px] text-slate-500 font-medium">
                                💡 <strong class="text-slate-700">Notice:</strong> Changing the division updates all
                                category price tags below instantly.
                            </p>
                        </div>

                        <div
                            class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-200 pb-3">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-wider text-slate-800">
                                    Select Competition Categories * <span class="text-[#752738] font-extrabold">(Choose one
                                        or more)</span>
                                </label>
                                <p class="text-[11px] text-slate-500 mt-0.5">Check all the competitions you wish to
                                    participate in. Registration fees are automatically calculated.</p>
                            </div>
                            <div class="flex items-center gap-2 self-start sm:self-auto shrink-0">
                                <button type="button" onclick="selectAllCategories(true)"
                                    class="px-3 py-1 text-[11px] font-extrabold text-[#752738] bg-[#752738]/10 hover:bg-[#752738] hover:text-white rounded-lg border border-[#752738]/30 transition-all cursor-pointer">
                                    Select All
                                </button>
                                <button type="button" onclick="selectAllCategories(false)"
                                    class="px-3 py-1 text-[11px] font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg border border-slate-300 transition-all cursor-pointer">
                                    Clear All
                                </button>
                            </div>
                        </div>

                        <!-- Categories Grouped by Official Headers -->
                        <div class="space-y-4 max-h-[520px] overflow-y-auto pr-1 select-none">

                            <!-- GROUP A: KULINARYA & COOKING SHOWDOWNS -->
                            <div class="border border-slate-200 rounded-2xl p-4 bg-slate-50/50">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="w-2 h-4 bg-[#752738] rounded-full"></span>
                                    <h4 class="font-heading font-black text-xs uppercase tracking-wider text-slate-900">
                                        Category A: Kulinarya & Cooking Showdowns</h4>
                                </div>
                                <div class="grid grid-cols-1 gap-2.5">
                                    <!-- A.1 -->
                                    <div id="card-cat-A_1"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="A.1"
                                                    id="cb-A_1"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('A.1')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">A.1</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">KLASIKA
                                                            MODERNA KULINARYA</span>
                                                    </div>
                                                    <div class="flex items-center gap-2 mt-1">
                                                        <span id="div-badge-A_1"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                        <span class="text-[11px] text-slate-500 font-medium">Modern
                                                            Philippine culinary showdown</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-A_1"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱1,000</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- A.2 -->
                                    <div id="card-cat-A_2"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="A.2"
                                                    id="cb-A_2"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('A.2')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">A.2</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">BEST
                                                            REGIONAL INGREDIENT</span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="div-badge-A_2"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-A_2"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- A.3 -->
                                    <div id="card-cat-A_3"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="A.3"
                                                    id="cb-A_3"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('A.3')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">A.3</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">BEST
                                                            TRADITIONAL / MODERN RECIPE AND COOKING TECHNIQUE</span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="div-badge-A_3"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-A_3"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- A.4 -->
                                    <div id="card-cat-A_4"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="A.4"
                                                    id="cb-A_4"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('A.4')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">A.4</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">REGIONAL
                                                            PICA-PICA</span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="div-badge-A_4"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-A_4"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- GROUP B: BEVERAGE & BARTENDING -->
                            <div class="border border-slate-200 rounded-2xl p-4 bg-slate-50/50">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="w-2 h-4 bg-[#752738] rounded-full"></span>
                                    <h4 class="font-heading font-black text-xs uppercase tracking-wider text-slate-900">
                                        Category B: Beverage & Bartending</h4>
                                </div>
                                <div class="grid grid-cols-1 gap-2.5">
                                    <!-- B.1 -->
                                    <div id="card-cat-B_1"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="B.1"
                                                    id="cb-B_1"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('B.1')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">B.1</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">REGIONAL
                                                            BARTENDING / FLAIRTENDING COMPETITION</span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="div-badge-B_1"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-B_1"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- B.2 -->
                                    <div id="card-cat-B_2"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="B.2"
                                                    id="cb-B_2"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('B.2')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">B.2</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">REGIONAL
                                                            COFFEE CONCOCTION</span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="div-badge-B_2"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-B_2"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- GROUP C: JAMS, PRESERVES & FLAMBÉ -->
                            <div class="border border-slate-200 rounded-2xl p-4 bg-slate-50/50">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="w-2 h-4 bg-[#752738] rounded-full"></span>
                                    <h4 class="font-heading font-black text-xs uppercase tracking-wider text-slate-900">
                                        Category C: Jams, Preserves & Flambé</h4>
                                </div>
                                <div class="grid grid-cols-1 gap-2.5">
                                    <!-- C.1 -->
                                    <div id="card-cat-C_1"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="C.1"
                                                    id="cb-C_1"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('C.1')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">C.1</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">REGIONAL
                                                            JAMS AND PRESERVES</span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="div-badge-C_1"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-C_1"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- C.2 -->
                                    <div id="card-cat-C_2"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="C.2"
                                                    id="cb-C_2"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('C.2')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">C.2</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">REGIONAL
                                                            FRUIT FLAMBÉ</span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="div-badge-C_2"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-C_2"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- GROUP D: PASTRY, CAKES & TABLE PRESENTATION -->
                            <div class="border border-slate-200 rounded-2xl p-4 bg-slate-50/50">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="w-2 h-4 bg-[#752738] rounded-full"></span>
                                    <h4 class="font-heading font-black text-xs uppercase tracking-wider text-slate-900">
                                        Category D: Pastry, Cakes & Table Presentation</h4>
                                </div>
                                <div class="grid grid-cols-1 gap-2.5">
                                    <!-- D.1 -->
                                    <div id="card-cat-D_1"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="D.1"
                                                    id="cb-D_1"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('D.1')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">D.1</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">REGIONAL
                                                            DESSERT/KAKANIN</span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="div-badge-D_1"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-D_1"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- D.2 (College Only - Team of 3) -->
                                    <div id="card-cat-D_2"
                                        class="cat-item-card college-shs-only-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="D.2"
                                                    id="cb-D_2"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('D.2')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">D.2</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">REGIONAL
                                                            TABLE SETTING WITH CENTERPIECE</span>
                                                    </div>
                                                    <div class="mt-1 flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-200 text-[10px] font-extrabold">College Only • Team of 3</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-D_2"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱500</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- D.3 -->
                                    <div id="card-cat-D_3"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="D.3"
                                                    id="cb-D_3"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('D.3')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">D.3</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">WEDDING
                                                            CAKE</span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="div-badge-D_3"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-D_3"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱500</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- D.4 -->
                                    <div id="card-cat-D_4"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="D.4"
                                                    id="cb-D_4"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('D.4')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">D.4</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">REGIONAL
                                                            CREATIVE CAKE DISPLAY</span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="div-badge-D_4"
                                                            class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold">College & SHS Rate</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-D_4"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- GROUP F: HOSPITALITY & MOCKTAILS (College & SHS Only) -->
                            <div id="group-cat-F" class="college-shs-only-group border border-slate-200 rounded-2xl p-4 bg-slate-50/50">
                                <div class="flex items-center justify-between gap-2 mb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-4 bg-[#752738] rounded-full"></span>
                                        <h4 class="font-heading font-black text-xs uppercase tracking-wider text-slate-900">
                                            Category F: Hospitality & Mocktails</h4>
                                    </div>
                                    <span class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-200 text-[10px] font-extrabold">College & SHS Only</span>
                                </div>
                                <div class="grid grid-cols-1 gap-2.5">
                                    <!-- F.1 -->
                                    <div id="card-cat-F_1"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="F.1"
                                                    id="cb-F_1"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('F.1')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">F.1</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">NAPKIN
                                                            FOLDING</span>
                                                    </div>
                                                    <div class="mt-1 flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-200 text-[10px] font-extrabold">College and SHS • Individual</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-F_1"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱500</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- F.2 -->
                                    <div id="card-cat-F_2"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="F.2"
                                                    id="cb-F_2"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('F.2')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">F.2</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">MOCKTAIL
                                                            CONCOCTIONS</span>
                                                    </div>
                                                    <div class="mt-1 flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-200 text-[10px] font-extrabold">College and SHS • Individual</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-F_2"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- GROUP I: ACADEMIC (College & SHS Only) -->
                            <div id="group-cat-I" class="college-shs-only-group border border-slate-200 rounded-2xl p-4 bg-slate-50/50">
                                <div class="flex items-center justify-between gap-2 mb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-4 bg-[#752738] rounded-full"></span>
                                        <h4 class="font-heading font-black text-xs uppercase tracking-wider text-slate-900">
                                            Category I: Academic</h4>
                                    </div>
                                    <span class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-200 text-[10px] font-extrabold">College & SHS Only</span>
                                </div>
                                <div class="grid grid-cols-1 gap-2.5">
                                    <!-- I.1 -->
                                    <div id="card-cat-I_1"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="I.1"
                                                    id="cb-I_1"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('I.1')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">I.1</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">QUIZ-BEE</span>
                                                    </div>
                                                    <div class="mt-1 flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-200 text-[10px] font-extrabold">College and SHS • Team of 3</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-I_1"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱500</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- GROUP T: TOURISM & SPECIALTY (College & SHS Only) -->
                            <div id="group-cat-T" class="college-shs-only-group border border-slate-200 rounded-2xl p-4 bg-slate-50/50">
                                <div class="flex items-center justify-between gap-2 mb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-4 bg-[#752738] rounded-full"></span>
                                        <h4 class="font-heading font-black text-xs uppercase tracking-wider text-slate-900">
                                            Category T: Tourism & Specialty</h4>
                                    </div>
                                    <span class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-200 text-[10px] font-extrabold">College & SHS Only</span>
                                </div>
                                <div class="grid grid-cols-1 gap-2.5">
                                    <!-- T.1 -->
                                    <div id="card-cat-T_1"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="T.1"
                                                    id="cb-T_1"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('T.1')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">T.1</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">INFLIGHT
                                                            SAFETY DEMONSTRATION AND EMERGENCY RESPONSE</span>
                                                    </div>
                                                    <div class="mt-1 flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-200 text-[10px] font-extrabold">College Only • Team of 2</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-T_1"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- T.2 -->
                                    <div id="card-cat-T_2"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="T.2"
                                                    id="cb-T_2"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('T.2')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">T.2</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">KASUOTANG
                                                            REHIYONES</span>
                                                    </div>
                                                    <div class="mt-1 flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-200 text-[10px] font-extrabold">College and SHS • 1 Male & 1 Female</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-T_2"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- T.3 -->
                                    <div id="card-cat-T_3"
                                        class="cat-item-card border-2 border-slate-200 bg-white hover:border-slate-300 rounded-xl p-3.5 transition-all">
                                        <div class="flex items-start justify-between gap-3">
                                            <label class="flex items-start gap-3 cursor-pointer flex-grow">
                                                <input type="checkbox" name="contest_categories[]" value="T.3"
                                                    id="cb-T_3"
                                                    class="mt-1 w-4 h-4 rounded accent-[#752738] cursor-pointer"
                                                    onchange="onCategoryToggle('T.3')">
                                                <div>
                                                    <div class="flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">T.3</span>
                                                        <span
                                                            class="font-heading font-extrabold text-xs sm:text-sm text-slate-900">TOURISM
                                                            POSTER MAKING</span>
                                                    </div>
                                                    <div class="mt-1 flex items-center gap-2 flex-wrap">
                                                        <span
                                                            class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-200 text-[10px] font-extrabold">College and SHS • Individual</span>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="text-right shrink-0">
                                                <span id="price-tag-T_3"
                                                    class="font-heading font-black text-xs sm:text-sm text-[#752738]">₱700</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Highlighted Contestant Fee Callout & Running Total -->
                        <div id="contestant-price-callout"
                            class="p-4 rounded-2xl bg-gradient-to-r from-[#752738]/10 via-[#FEC452]/10 to-[#752738]/10 border-2 border-[#752738]/40 flex flex-col sm:flex-row sm:items-center justify-between gap-3 shadow-md">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs text-[#752738] font-black uppercase tracking-wider">Total
                                        Contestant Registration</span>
                                    <span id="contestant-selected-badge"
                                        class="px-2.5 py-0.5 rounded-full bg-[#752738] text-white text-[10px] font-black">0
                                        Categories</span>
                                </div>
                                <span id="contestant-price-detail"
                                    class="text-xs text-slate-700 block mt-1 font-bold">Please select at least one
                                    competition above</span>
                            </div>
                            <div class="text-left sm:text-right shrink-0">
                                <span id="contestant-fee-display"
                                    class="font-heading text-3xl font-black text-[#752738]">₱0.00</span>
                                <span class="text-[10px] text-slate-500 block font-bold uppercase tracking-wider">Total
                                    Entry Fee</span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Number (Guest Only) -->
                    <div id="field-guest-contact" class="sm:col-span-2 hidden">
                        <label for="contact_number"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Contact Number
                            *</label>
                        <input type="text" id="contact_number" name="contact_number"
                            value="{{ old('contact_number') }}" placeholder="e.g. 0917 123 4567"
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#752738] focus:ring-2 focus:ring-[#752738]/10 transition-all">
                    </div>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="button" onclick="goToStep(2)"
                        class="px-8 py-3.5 text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-[#752738] to-[#5A1E2C] hover:from-[#912B40] hover:to-[#752738] border border-[#FEC452]/40 rounded-xl shadow-md shadow-[#752738]/20 transition-all flex items-center gap-2">
                        Proceed to Choose Ticket
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- ==================== STEP 2: TICKET SELECTION ==================== -->
            <div id="step-2" class="step-container space-y-8 hidden">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="font-heading text-xl font-extrabold text-slate-900 flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#752738] rounded-full"></span>
                        Step 2: Choose Your Ticket Option
                    </h2>
                    <p class="text-xs text-slate-500 mt-1">Review your chosen competition passes or choose spectator event
                        tickets.</p>
                </div>

                <!-- Price Callout Indicator (for guests) -->
                <div id="ublc-status-banner"
                    class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-between text-xs">
                    <span class="text-slate-600">Selected Pricing Category:</span>
                    <span id="ublc-status-text" class="font-extrabold text-[#752738] uppercase">Outside UB Lipa City
                        Rate</span>
                </div>

                <!-- Contestant Passes Summary Card (Visible when registration_type is contestant) -->
                <div id="contestant-ticket-card"
                    class="glass-card rounded-3xl p-6 sm:p-8 border-2 border-[#752738] bg-[#752738]/5 shadow-sm space-y-5">
                    <div class="flex items-center justify-between border-b border-[#752738]/20 pb-3">
                        <div>
                            <div class="text-xs font-extrabold text-[#752738] uppercase tracking-wider">Official Contestant
                                Access Pass</div>
                            <h3 class="font-heading text-xl font-extrabold text-slate-900">Selected Competition Entries
                            </h3>
                        </div>
                        <div id="contestant-summary-badge"
                            class="px-3 py-1 bg-[#752738] text-[#FEC452] font-black text-xs rounded-xl shadow-sm">
                            0 Categories Selected
                        </div>
                    </div>

                    <!-- Dynamic Item Breakdown List -->
                    <div id="contestant-breakdown-list" class="space-y-2.5">
                        <!-- Populated dynamically via JS -->
                    </div>

                    <div class="pt-4 border-t border-[#752738]/20 flex items-center justify-between">
                        <div>
                            <span class="font-black text-slate-800 text-sm block">Total Contestant Registration:</span>
                            <span class="text-[11px] text-slate-500 font-medium">Sum of all official competition category
                                entry fees</span>
                        </div>
                        <div class="text-right">
                            <span id="contestant-summary-price"
                                class="font-heading text-3xl font-black text-[#752738]">₱0.00</span>
                        </div>
                    </div>
                </div>

                <!-- Guest Ticket Options List (Visible when registration_type is guest) -->
                <div id="guest-ticket-options" class="space-y-4">
                    <!-- Day 1 Option -->
                    <label id="ticket-card-day1"
                        class="cursor-pointer border-2 border-slate-200 bg-slate-50 hover:bg-slate-100 hover:border-slate-300 rounded-2xl p-5 flex items-center justify-between transition-all">
                        <div class="flex items-center gap-4">
                            <input type="radio" name="ticket_type" value="day1" class="w-5 h-5 accent-[#752738]"
                                {{ old('ticket_type', 'day1') === 'day1' ? 'checked' : '' }}
                                onchange="selectTicketOption('day1')">
                            <div>
                                <span class="font-heading font-extrabold text-base text-slate-900 block">Day 1
                                    Ticket</span>
                                <span class="text-xs text-slate-500 block mt-0.5">Access to Day 1 Exhibition & Judging
                                    competitions</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span id="price-display-day1"
                                class="font-heading text-2xl font-black text-[#752738]">₱120</span>
                            <span class="text-[10px] text-slate-500 block font-semibold">per ticket</span>
                        </div>
                    </label>

                    <!-- Day 2 Option -->
                    <label id="ticket-card-day2"
                        class="cursor-pointer border-2 border-slate-200 bg-slate-50 hover:bg-slate-100 hover:border-slate-300 rounded-2xl p-5 flex items-center justify-between transition-all">
                        <div class="flex items-center gap-4">
                            <input type="radio" name="ticket_type" value="day2" class="w-5 h-5 accent-[#752738]"
                                {{ old('ticket_type') === 'day2' ? 'checked' : '' }}
                                onchange="selectTicketOption('day2')">
                            <div>
                                <span class="font-heading font-extrabold text-base text-slate-900 block">Day 2
                                    Ticket</span>
                                <span class="text-xs text-slate-500 block mt-0.5">Access to Day 2 Finals Showdown &
                                    Awarding Ceremony</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span id="price-display-day2"
                                class="font-heading text-2xl font-black text-[#752738]">₱120</span>
                            <span class="text-[10px] text-slate-500 block font-semibold">per ticket</span>
                        </div>
                    </label>

                    <!-- Both Days Option (Best Value) -->
                    <label id="ticket-card-both"
                        class="cursor-pointer border-2 border-[#752738] bg-[#752738]/5 rounded-2xl p-5 flex items-center justify-between transition-all relative shadow-sm">
                        <span
                            class="absolute -top-3 right-6 bg-gradient-to-r from-[#752738] to-[#5A1E2C] text-white font-extrabold text-[9px] uppercase px-3 py-0.5 rounded-full shadow">BEST
                            VALUE</span>
                        <div class="flex items-center gap-4">
                            <input type="radio" name="ticket_type" value="both" class="w-5 h-5 accent-[#752738]"
                                {{ old('ticket_type') === 'both' ? 'checked' : '' }}
                                onchange="selectTicketOption('both')">
                            <div>
                                <span class="font-heading font-extrabold text-base text-slate-900 block">Both Day 1 and Day
                                    2 Pass</span>
                                <span class="text-xs text-slate-600 block mt-0.5">Full 2-Day Event Access Pass</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span id="price-display-both"
                                class="font-heading text-3xl font-black text-[#752738]">₱170</span>
                            <span class="text-[10px] text-slate-500 block font-semibold">total 2 days</span>
                        </div>
                    </label>
                </div>

                <!-- Stepper Actions -->
                <div class="flex items-center justify-between pt-4">
                    <button type="button" onclick="goToStep(1)"
                        class="px-6 py-3 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 rounded-xl transition-all">
                        &larr; Back to Details
                    </button>
                    <button type="button" onclick="goToStep(3)"
                        class="px-8 py-3.5 text-xs font-extrabold uppercase tracking-wider text-white bg-gradient-to-r from-[#752738] to-[#5A1E2C] hover:from-[#912B40] hover:to-[#752738] border border-[#FEC452]/40 rounded-xl shadow-md shadow-[#752738]/20 transition-all flex items-center gap-2">
                        PROCEED TO PAYMENT
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- ==================== STEP 3: PAYMENT ==================== -->
            <div id="step-3" class="step-container space-y-8 hidden">
                <div class="border-b border-slate-200 pb-4">
                    <h2 class="font-heading text-xl font-extrabold text-slate-900 flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#752738] rounded-full"></span>
                        Step 3: Bank Transfer Payment Confirmation
                    </h2>
                    <p class="text-xs text-slate-500 mt-1">Scan the QR code below or transfer directly to the official bank
                        account, then upload your deposit slip or transaction receipt.</p>
                </div>

                <!-- Bank Transfer Details & QR Code Display Box -->
                <div
                    class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center bg-slate-50 border border-slate-200 rounded-2xl p-6 sm:p-7 shadow-sm">
                    <!-- Left: Official UnionBank QR Code -->
                    <div class="md:col-span-5 text-center flex flex-col items-center justify-center">
                        <div class="bg-white p-3.5 rounded-2xl inline-block shadow-md border-2 border-slate-200 group relative cursor-pointer hover:border-[#752738] transition-all"
                            onclick="openImageLightbox('{{ asset('images/bank-qr.png') }}', 'Official UnionBank QR Code')">
                            <img src="{{ asset('images/bank-qr.png') }}" alt="UnionBank QR Code"
                                class="w-48 sm:w-52 h-auto mx-auto rounded-xl transition-transform group-hover:scale-[1.02]">
                            <div
                                class="mt-2 text-[10px] font-extrabold text-[#752738] flex items-center justify-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Click to View Enlarged QR
                            </div>
                        </div>
                        <p class="text-[11px] text-slate-500 mt-2.5 font-medium">Scan via UnionBank or any QRPh banking app
                        </p>
                    </div>

                    <!-- Right: Detailed Bank Information & Payable Amount -->
                    <div class="md:col-span-7 space-y-4">
                        <div class="flex items-center justify-between">
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1 bg-[#752738]/10 text-[#752738] border border-[#752738]/30 rounded-lg font-extrabold uppercase tracking-wider text-[10px]">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                OFFICIAL UNIONBANK ACCOUNT
                            </div>
                            <img src="{{ asset('images/ub-logo-plain.png') }}" alt="University of Batangas Logo"
                                class="h-8 w-auto object-contain bg-white p-1 rounded-lg border border-slate-200">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                            <div class="p-3 bg-white rounded-xl border border-slate-200">
                                <span
                                    class="text-slate-500 block text-[10px] uppercase font-bold tracking-wider">Bank</span>
                                <span class="font-bold text-slate-900 text-sm">UnionBank</span>
                            </div>

                            <div class="p-3 bg-white rounded-xl border border-slate-200">
                                <span
                                    class="text-slate-500 block text-[10px] uppercase font-bold tracking-wider">Branch</span>
                                <span class="font-bold text-slate-900 text-sm">UnionBank Batangas Branch</span>
                            </div>

                            <div class="p-3 bg-white rounded-xl border border-slate-200 sm:col-span-2">
                                <span class="text-slate-500 block text-[10px] uppercase font-bold tracking-wider">Account
                                    Name</span>
                                <span class="font-bold text-slate-900 text-sm">University of Batangas, Inc.</span>
                            </div>

                            <div
                                class="p-3 bg-white rounded-xl border border-[#752738]/40 sm:col-span-2 flex items-center justify-between">
                                <div>
                                    <span
                                        class="text-slate-500 block text-[10px] uppercase font-bold tracking-wider">Account
                                        Number</span>
                                    <span id="bank-acc-no"
                                        class="font-mono font-bold text-[#752738] text-base select-all">CA# 0027 2000
                                        9538</span>
                                </div>
                                <button type="button" onclick="copyAccountNumber()"
                                    class="px-3 py-1.5 text-[11px] font-bold bg-slate-100 hover:bg-[#752738] text-slate-700 hover:text-white rounded-lg border border-slate-300 transition-all flex items-center gap-1.5 cursor-pointer"
                                    title="Copy Account Number">
                                    <svg class="w-3.5 h-3.5 text-[#752738]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                    <span id="copy-btn-label">Copy</span>
                                </button>
                            </div>
                        </div>

                        <!-- Selected Ticket Summary -->
                        <div class="pt-3 border-t border-slate-200 flex items-center justify-between">
                            <span class="text-slate-600 text-xs">Total Payable Amount:</span>
                            <span id="final-payable-price"
                                class="font-heading text-2xl font-black text-[#752738]">₱120.00</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Input Fields -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Email (Required) -->
                    <div>
                        <label for="email"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Email Address *
                            (required)</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="your-email@gmail.com" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#752738] focus:ring-2 focus:ring-[#752738]/10 transition-all">
                    </div>

                    <!-- Account / Depositor Name (Required) -->
                    <div>
                        <label for="gcash_name"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Account Name /
                            Depositor Name * (required)</label>
                        <input type="text" id="gcash_name" name="gcash_name" value="{{ old('gcash_name') }}"
                            placeholder="e.g. Juan Dela Cruz" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#752738] focus:ring-2 focus:ring-[#752738]/10 transition-all">
                    </div>

                    <!-- Account / Contact Number (Required) -->
                    <div>
                        <label for="gcash_number"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Sender Account No.
                            / Contact No. * (required)</label>
                        <input type="text" id="gcash_number" name="gcash_number" value="{{ old('gcash_number') }}"
                            placeholder="e.g. Account Number or Contact Number" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#752738] focus:ring-2 focus:ring-[#752738]/10 transition-all">
                    </div>

                    <!-- Reference Number (Required) -->
                    <div>
                        <label for="reference_number"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Bank Reference /
                            Transaction Number * (required)</label>
                        <input type="text" id="reference_number" name="reference_number"
                            value="{{ old('reference_number') }}" placeholder="e.g. Ref # / Transaction ID" required
                            class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#752738] focus:ring-2 focus:ring-[#752738]/10 transition-all">
                    </div>

                    <!-- Payment Screenshot Upload with Preview & X Clear Button -->
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Proof of
                            Payment (Deposit Slip / Transfer Receipt) * (required)</label>

                        <!-- File Input Box -->
                        <div id="file-dropzone"
                            class="border-2 border-dashed border-slate-300 hover:border-[#752738] rounded-2xl p-6 text-center bg-slate-50 transition-all relative">
                            <input type="file" id="payment_screenshot" name="payment_screenshot" accept="image/*"
                                required onchange="handleFilePreview(this)"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                            <div id="upload-prompt" class="space-y-2">
                                <svg class="w-10 h-10 text-slate-400 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                                <div class="text-sm font-semibold text-slate-700">Click or Drag to Upload Proof of Payment
                                </div>
                                <div class="text-xs text-slate-500">Deposit slip, online bank transfer screenshot, etc.
                                    (JPG, PNG, WEBP - Max 5MB)</div>
                            </div>

                            <!-- Image Preview Container -->
                            <div id="image-preview-container"
                                class="hidden relative inline-block max-w-xs mx-auto mt-2 z-20 pointer-events-auto">
                                <div class="relative group">
                                    <img id="image-preview" src="" alt="Proof of Payment Preview"
                                        onclick="openImageLightbox(this.src, 'Proof of Payment')"
                                        class="max-h-64 rounded-xl border border-slate-300 shadow-md object-contain cursor-pointer transition-all hover:scale-[1.02] hover:border-[#752738]"
                                        title="Click to view enlarged image">
                                    <div onclick="openImageLightbox(document.getElementById('image-preview').src, 'Proof of Payment')"
                                        class="absolute bottom-2 left-1/2 -translate-x-1/2 px-3 py-1 bg-slate-900/85 backdrop-blur-md rounded-full text-[10px] font-bold text-white border border-slate-700 flex items-center gap-1.5 cursor-pointer hover:bg-[#752738] transition-all shadow-lg shrink-0 whitespace-nowrap">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        <span>Click to View Enlarged</span>
                                    </div>
                                </div>

                                <!-- Clickable X button -->
                                <button type="button" onclick="clearFilePreview(event)"
                                    class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-rose-600 hover:bg-rose-500 text-white font-extrabold flex items-center justify-center shadow-md cursor-pointer transition-all hover:scale-110 z-30"
                                    title="Remove Screenshot">
                                    &times;
                                </button>
                                <div id="file-name-label" class="text-xs text-slate-600 font-mono mt-2 truncate max-w-xs">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Submit Buttons -->
                <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                    <button type="button" onclick="goToStep(2)"
                        class="px-6 py-3 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-300 rounded-xl transition-all">
                        &larr; Back to Ticket Selection
                    </button>

                    <button type="submit" id="btn-submit-registration"
                        class="px-10 py-4 text-sm font-black uppercase tracking-wider text-white bg-gradient-to-r from-[#752738] to-[#5A1E2C] hover:from-[#912B40] hover:to-[#752738] rounded-2xl shadow-lg shadow-[#752738]/30 transition-all hover:scale-105 active:scale-95 flex items-center gap-2">
                        <svg id="submit-icon-check" class="w-5 h-5 text-[#FEC452]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                        <svg id="submit-spinner-icon" class="w-5 h-5 animate-spin hidden" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span id="submit-btn-text">SUBMIT REGISTRATION</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- SUBMISSION LOADING OVERLAY MODAL -->
    <div id="submission-loading-overlay"
        class="fixed inset-0 z-[999999] hidden bg-slate-900/80 backdrop-blur-md flex flex-col items-center justify-center p-4 select-none">
        <div
            class="glass-card rounded-3xl p-8 sm:p-10 max-w-md w-full text-center border border-slate-200 shadow-2xl space-y-6">
            <!-- Glowing Spinner Container -->
            <div class="relative w-24 h-24 mx-auto flex items-center justify-center">
                <div class="absolute inset-0 rounded-full border-4 border-[#752738]/20 animate-pulse"></div>
                <div class="absolute inset-0 rounded-full border-4 border-[#752738] border-t-transparent animate-spin">
                </div>
                <img src="{{ asset('images/logo-top-left.jpg') }}" alt="Logo"
                    class="w-12 h-12 rounded-xl object-cover shadow-md border border-slate-200">
            </div>

            <div class="space-y-2">
                <h3 class="font-heading text-xl font-black text-slate-900 tracking-wide">Submitting Your Ticket...</h3>
                <p class="text-xs text-slate-600 leading-relaxed">We are uploading your proof of payment and generating
                    your official ticket number.</p>
            </div>

            <!-- Prominent Warning Badge -->
            <div
                class="p-3.5 rounded-2xl bg-amber-50 border border-amber-200 text-amber-800 text-xs font-bold flex items-center justify-center gap-2 shadow-inner">
                <svg class="w-4 h-4 text-amber-600 shrink-0 animate-bounce" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>Please wait. Do not close or refresh this tab.</span>
            </div>

            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-[#752738]/10 text-[#752738] text-xs font-extrabold rounded-full border border-[#752738]/30">
                <svg class="w-4 h-4 animate-spin text-[#752738]" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span>Processing Order... Please Wait</span>
            </div>
        </div>
    </div>

    <!-- ENLARGED IMAGE LIGHTBOX MODAL -->
    <div id="image-lightbox-modal"
        class="fixed inset-0 z-[99999] hidden bg-black/85 backdrop-blur-md flex flex-col items-center justify-center p-4"
        onclick="closeImageLightbox()">
        <div class="relative max-w-4xl w-full max-h-[90vh] flex flex-col items-center justify-center p-2"
            onclick="event.stopPropagation()">
            <!-- Close Button -->
            <button type="button" onclick="closeImageLightbox()"
                class="absolute -top-12 right-0 text-white/80 hover:text-white font-extrabold text-3xl leading-none transition-colors"
                title="Close">
                &times;
            </button>
            <div id="lightbox-title" class="text-xs font-extrabold text-[#FEC452] mb-3 uppercase tracking-wider">Enlarged
                Image Preview</div>
            <div
                class="bg-white rounded-2xl p-2 border border-slate-300 shadow-2xl max-h-[80vh] overflow-auto flex items-center justify-center">
                <img id="lightbox-img" src="" alt="Enlarged Image"
                    class="max-w-full max-h-[75vh] object-contain rounded-xl">
            </div>
            <div class="mt-4 flex items-center gap-3">
                <a id="lightbox-download-link" href="#" target="_blank" download
                    class="px-5 py-2 text-xs font-bold text-white bg-[#752738] hover:bg-[#5A1E2C] rounded-xl transition-all flex items-center gap-2 shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Open Full Image
                </a>
                <button type="button" onclick="closeImageLightbox()"
                    class="px-6 py-2 text-xs font-bold text-slate-700 bg-white hover:bg-slate-100 rounded-xl transition-all border border-slate-300">
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
            'A.1': {
                name: 'KLASIKA MODERNA KULINARYA',
                has_div: true,
                fees: {
                    professional: 1500,
                    student: 1000
                }
            },
            'A.2': {
                name: 'BEST REGIONAL INGREDIENT',
                has_div: true,
                fees: {
                    professional: 1000,
                    student: 700
                }
            },
            'A.3': {
                name: 'BEST TRADITIONAL / MODERN RECIPE AND COOKING TECHNIQUE',
                has_div: true,
                fees: {
                    professional: 1000,
                    student: 700
                }
            },
            'A.4': {
                name: 'REGIONAL PICA-PICA',
                has_div: true,
                fees: {
                    professional: 1000,
                    student: 700
                }
            },
            'B.1': {
                name: 'REGIONAL BARTENDING / FLAIRTENDING COMPETITION',
                has_div: true,
                fees: {
                    professional: 1000,
                    student: 700
                }
            },
            'B.2': {
                name: 'REGIONAL COFFEE CONCOCTION',
                has_div: true,
                fees: {
                    professional: 1000,
                    student: 700
                }
            },
            'C.1': {
                name: 'REGIONAL JAMS AND PRESERVES',
                has_div: true,
                fees: {
                    professional: 1000,
                    student: 700
                }
            },
            'C.2': {
                name: 'REGIONAL FRUIT FLAMBÉ',
                has_div: true,
                fees: {
                    professional: 1000,
                    student: 700
                }
            },
            'D.1': {
                name: 'REGIONAL DESSERT/KAKANIN',
                has_div: true,
                fees: {
                    professional: 1000,
                    student: 700
                }
            },
            'D.2': {
                name: 'REGIONAL TABLE SETTING WITH CENTERPIECE',
                has_div: false,
                fee: 500
            },
            'D.3': {
                name: 'WEDDING CAKE',
                has_div: true,
                fees: {
                    professional: 700,
                    student: 500
                }
            },
            'D.4': {
                name: 'REGIONAL CREATIVE CAKE DISPLAY',
                has_div: true,
                fees: {
                    professional: 1000,
                    student: 700
                }
            },
            'F.1': {
                name: 'NAPKIN FOLDING',
                has_div: false,
                fee: 500
            },
            'F.2': {
                name: 'MOCKTAIL CONCOCTIONS',
                has_div: false,
                fee: 700
            },
            'I.1': {
                name: 'QUIZ-BEE',
                has_div: false,
                fee: 500
            },
            'T.1': {
                name: 'INFLIGHT SAFETY DEMONSTRATION AND EMERGENCY RESPONSE',
                has_div: false,
                fee: 700
            },
            'T.2': {
                name: 'KASUOTANG REHIYONES',
                has_div: false,
                fee: 700
            },
            'T.3': {
                name: 'TOURISM POSTER MAKING',
                has_div: false,
                fee: 700
            }
        };

        const COLLEGE_SHS_ONLY_CODES = ['D.2', 'F.1', 'F.2', 'I.1', 'T.1', 'T.2', 'T.3'];

        function onGlobalDivisionChange() {
            const divSelect = document.getElementById('contest_division');
            const currentDiv = divSelect ? divSelect.value : 'student';
            const badge = document.getElementById('active-division-badge');

            const collegeGroups = document.querySelectorAll('.college-shs-only-group');
            const collegeCards = document.querySelectorAll('.college-shs-only-card');

            if (currentDiv === 'professional') {
                if (badge) {
                    badge.textContent = "👨‍🍳 Professional Division Active";
                    badge.className =
                        "px-3 py-1 bg-gradient-to-r from-amber-600 to-amber-700 text-white font-black text-xs rounded-xl shadow-sm self-start sm:self-auto shrink-0 border border-amber-400";
                }
                // Hide College & SHS only groups and cards
                collegeGroups.forEach(el => el.classList.add('hidden'));
                collegeCards.forEach(el => el.classList.add('hidden'));

                // Deselect any College & SHS only checkboxes
                COLLEGE_SHS_ONLY_CODES.forEach(code => {
                    const safeId = code.replace('.', '_');
                    const cb = document.getElementById(`cb-${safeId}`);
                    const card = document.getElementById(`card-cat-${safeId}`);
                    if (cb && cb.checked) {
                        cb.checked = false;
                        if (card) {
                            card.classList.remove('border-[#752738]', 'bg-[#752738]/5', 'ring-2', 'ring-[#752738]/15',
                                'shadow-sm');
                            card.classList.add('border-slate-200', 'bg-white');
                        }
                    }
                });
            } else {
                if (badge) {
                    badge.textContent = "🎓 College and SHS Division Active";
                    badge.className =
                        "px-3 py-1 bg-[#752738] text-[#FEC452] font-black text-xs rounded-xl shadow-sm self-start sm:self-auto shrink-0 border border-[#FEC452]/40";
                }
                // Show College & SHS only groups and cards
                collegeGroups.forEach(el => el.classList.remove('hidden'));
                collegeCards.forEach(el => el.classList.remove('hidden'));
            }

            updateAllItemPrices();
            updateTicketPrices();
        }

        function updateAllItemPrices() {
            const divSelect = document.getElementById('contest_division');
            const currentDiv = divSelect ? divSelect.value : 'student';

            for (const code in COMPETITION_DATA) {
                const data = COMPETITION_DATA[code];
                const safeId = code.replace('.', '_');
                const priceTag = document.getElementById(`price-tag-${safeId}`);
                const divBadge = document.getElementById(`div-badge-${safeId}`);

                if (data.has_div) {
                    const price = data.fees[currentDiv] || data.fees.student;
                    if (priceTag) {
                        priceTag.textContent = `₱${price.toLocaleString('en-US')}`;
                    }
                    if (divBadge) {
                        if (currentDiv === 'professional') {
                            divBadge.textContent = "Professional Rate";
                            divBadge.className =
                                "px-2 py-0.5 rounded-md bg-amber-100 text-amber-900 border border-amber-300 text-[10px] font-black";
                        } else {
                            divBadge.textContent = "College & SHS Rate";
                            divBadge.className =
                                "px-2 py-0.5 rounded-md bg-amber-50 text-amber-900 border border-amber-200 text-[10px] font-extrabold";
                        }
                    }
                } else {
                    if (priceTag) {
                        priceTag.textContent = `₱${data.fee.toLocaleString('en-US')}`;
                    }
                }
            }
        }

        function onCategoryToggle(code) {
            const safeId = code.replace('.', '_');
            const checkbox = document.getElementById(`cb-${safeId}`);
            const card = document.getElementById(`card-cat-${safeId}`);

            if (checkbox && card) {
                if (checkbox.checked) {
                    card.classList.add('border-[#752738]', 'bg-[#752738]/5', 'ring-2', 'ring-[#752738]/15', 'shadow-sm');
                    card.classList.remove('border-slate-200', 'bg-white');
                } else {
                    card.classList.remove('border-[#752738]', 'bg-[#752738]/5', 'ring-2', 'ring-[#752738]/15', 'shadow-sm');
                    card.classList.add('border-slate-200', 'bg-white');
                }
            }

            updateTicketPrices();
        }

        function selectAllCategories(select) {
            const checkboxes = document.querySelectorAll('input[name="contest_categories[]"]');
            checkboxes.forEach(cb => {
                const code = cb.value;
                const safeId = code.replace('.', '_');
                const card = document.getElementById(`card-cat-${safeId}`);
                const isHidden = card && (card.classList.contains('hidden') || card.closest('.hidden'));

                if (select) {
                    if (!isHidden) {
                        cb.checked = true;
                        if (card) {
                            card.classList.add('border-[#752738]', 'bg-[#752738]/5', 'ring-2', 'ring-[#752738]/15',
                                'shadow-sm');
                            card.classList.remove('border-slate-200', 'bg-white');
                        }
                    }
                } else {
                    cb.checked = false;
                    if (card) {
                        card.classList.remove('border-[#752738]', 'bg-[#752738]/5', 'ring-2', 'ring-[#752738]/15',
                            'shadow-sm');
                        card.classList.add('border-slate-200', 'bg-white');
                    }
                }
            });
            updateTicketPrices();
        }

        function getSelectedContestCategories() {
            const checkedBoxes = document.querySelectorAll('input[name="contest_categories[]"]:checked');
            const divSelect = document.getElementById('contest_division');
            const currentDiv = divSelect ? divSelect.value : 'student';
            const selected = [];
            let total = 0;

            checkedBoxes.forEach(cb => {
                const code = cb.value;
                const data = COMPETITION_DATA[code];
                if (data) {
                    let price = 0;
                    let divLabel = null;
                    if (data.has_div) {
                        price = data.fees[currentDiv] || data.fees.student;
                        divLabel = currentDiv === 'professional' ? 'Professional Division' : 'College and SHS Division';
                    } else {
                        price = data.fee;
                    }
                    total += price;
                    selected.push({
                        code: code,
                        name: data.name,
                        has_div: data.has_div,
                        division: divLabel,
                        price: price
                    });
                }
            });

            return {
                items: selected,
                total: total,
                count: selected.length
            };
        }

        function updateContestantFeeDisplay() {
            const {
                items,
                total,
                count
            } = getSelectedContestCategories();
            const badge = document.getElementById('contestant-selected-badge');
            const detail = document.getElementById('contestant-price-detail');
            const feeDisplay = document.getElementById('contestant-fee-display');
            const step2Badge = document.getElementById('contestant-summary-badge');
            const step2Price = document.getElementById('contestant-summary-price');
            const breakdownList = document.getElementById('contestant-breakdown-list');

            if (badge) badge.textContent = `${count} ${count === 1 ? 'Category' : 'Categories'} Selected`;
            if (detail) {
                if (count === 0) {
                    detail.textContent = 'Please select at least one competition above';
                    detail.className = 'text-xs text-rose-600 block mt-1 font-bold';
                } else {
                    detail.textContent = items.map(i => i.code).join(', ') +
                        ` (${count} ${count === 1 ? 'item' : 'items'} selected)`;
                    detail.className = 'text-xs text-slate-700 block mt-1 font-bold';
                }
            }
            if (feeDisplay) feeDisplay.textContent = `₱${total.toLocaleString('en-US')}.00`;

            // Step 2 Summary
            if (step2Badge) step2Badge.textContent = `${count} ${count === 1 ? 'Category' : 'Categories'} Selected`;
            if (step2Price) step2Price.textContent = `₱${total.toLocaleString('en-US')}.00`;

            if (breakdownList) {
                if (count === 0) {
                    breakdownList.innerHTML = `
                    <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-800 text-xs font-bold text-center">
                        No competition categories selected yet. Please return to Step 1 and select at least one category.
                    </div>
                `;
                } else {
                    breakdownList.innerHTML = items.map((item, index) => `
                    <div class="flex items-center justify-between p-3.5 bg-white rounded-xl border border-slate-200 shadow-sm">
                        <div class="flex items-center gap-3">
                            <span class="w-6 h-6 rounded-lg bg-[#752738] text-white font-extrabold text-xs flex items-center justify-center shrink-0">
                                ${index + 1}
                            </span>
                            <div>
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="font-heading font-black text-slate-900 text-xs sm:text-sm">${item.name}</span>
                                    <span class="px-1.5 py-0.5 rounded bg-[#752738]/10 text-[#752738] font-black text-[10px] border border-[#752738]/20">[${item.code}]</span>
                                </div>
                                ${item.division ? `<span class="text-[11px] text-[#752738] font-extrabold block mt-0.5">${item.division}</span>` : `<span class="text-[10px] text-slate-400 font-bold block mt-0.5">Fixed Entry Fee</span>`}
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="font-heading font-black text-slate-900 text-sm">₱${item.price.toLocaleString('en-US')}.00</span>
                        </div>
                    </div>
                `).join('');
                }
            }
        }

        function goToStep(step) {
            if (step > currentStep) {
                if (currentStep === 1) {
                    const name = document.getElementById('name').value.trim();
                    const school = document.getElementById('school').value.trim();
                    const type = document.querySelector('input[name="registration_type"]:checked').value;
                    const contact = document.getElementById('contact_number').value.trim();

                    if (!name || !school) {
                        alert('Please fill in your Full Name and School before proceeding.');
                        return;
                    }

                    if (type === 'contestant') {
                        const {
                            count
                        } = getSelectedContestCategories();
                        if (count === 0) {
                            alert('Please select at least one competition category before proceeding to the next step.');
                            return;
                        }
                    }

                    if (type === 'guest' && !contact) {
                        alert('Please enter your contact number.');
                        return;
                    }
                }
            }

            currentStep = step;

            document.querySelectorAll('.step-container').forEach(el => el.classList.add('hidden'));
            document.getElementById(`step-${step}`).classList.remove('hidden');

            const progressPercent = step === 1 ? '0%' : (step === 2 ? '50%' : '100%');
            document.getElementById('step-line-progress').style.width = progressPercent;

            for (let i = 1; i <= 3; i++) {
                const badge = document.getElementById(`step-badge-${i}`);
                const text = document.getElementById(`step-text-${i}`);

                if (i <= step) {
                    badge.className =
                        "relative z-10 w-10 h-10 rounded-full bg-[#752738] text-white border-2 border-[#FEC452] font-extrabold flex items-center justify-center text-sm shadow-md ring-4 ring-white transition-all";
                    text.className = "text-[#752738] font-extrabold";
                } else {
                    badge.className =
                        "relative z-10 w-10 h-10 rounded-full bg-slate-200 text-slate-500 font-extrabold flex items-center justify-center text-sm ring-4 ring-white transition-all";
                    text.className = "text-slate-500 font-normal";
                }
            }

            window.scrollTo({
                top: 150,
                behavior: 'smooth'
            });
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
                contestantCard.className =
                    "cursor-pointer border-2 border-[#752738] bg-[#752738]/5 rounded-2xl p-5 flex items-start gap-4 transition-all shadow-sm";
                guestCard.className =
                    "cursor-pointer border-2 border-slate-200 bg-slate-50 rounded-2xl p-5 flex items-start gap-4 transition-all";
                contestantField.classList.remove('hidden');
                guestField.classList.add('hidden');
                if (contestantTicketCard) contestantTicketCard.classList.remove('hidden');
                if (guestTicketOptions) guestTicketOptions.classList.add('hidden');
                if (ublcStatusBanner) ublcStatusBanner.classList.add('hidden');
            } else {
                guestCard.className =
                    "cursor-pointer border-2 border-[#752738] bg-[#752738]/5 rounded-2xl p-5 flex items-start gap-4 transition-all shadow-sm";
                contestantCard.className =
                    "cursor-pointer border-2 border-slate-200 bg-slate-50 rounded-2xl p-5 flex items-start gap-4 transition-all";
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
                schoolInput.classList.add('bg-slate-100', 'border-emerald-500/50', 'text-slate-700', 'cursor-not-allowed',
                    'pr-32');
                if (ublcBadge) ublcBadge.classList.remove('hidden');
            } else {
                schoolInput.readOnly = false;
                schoolInput.classList.remove('bg-slate-100', 'border-emerald-500/50', 'text-slate-700',
                    'cursor-not-allowed', 'pr-32');
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
                if (bannerText) bannerText.className = "font-extrabold text-emerald-600 uppercase";
                document.getElementById('price-display-day1').textContent = "₱100";
                document.getElementById('price-display-day2').textContent = "₱100";
                document.getElementById('price-display-both').textContent = "₱150";
            } else {
                if (bannerText) bannerText.textContent = "Standard Rate";
                if (bannerText) bannerText.className = "font-extrabold text-[#752738] uppercase";
                document.getElementById('price-display-day1').textContent = "₱120";
                document.getElementById('price-display-day2').textContent = "₱120";
                document.getElementById('price-display-both').textContent = "₱170";
            }

            if (regType === 'contestant') {
                updateContestantFeeDisplay();
                const {
                    total
                } = getSelectedContestCategories();
                document.getElementById('final-payable-price').textContent = `₱${total.toLocaleString('en-US')}.00`;
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
                const {
                    total
                } = getSelectedContestCategories();
                document.getElementById('final-payable-price').textContent = `₱${total.toLocaleString('en-US')}.00`;
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

        // Copy Account Number Helper
        function copyAccountNumber() {
            const textToCopy = "0027 2000 9538";
            navigator.clipboard.writeText(textToCopy).then(() => {
                const btnLabel = document.getElementById('copy-btn-label');
                if (btnLabel) {
                    const originalText = btnLabel.textContent;
                    btnLabel.textContent = "Copied!";
                    setTimeout(() => {
                        btnLabel.textContent = originalText;
                    }, 2000);
                }
            }).catch(() => {
                const tempInput = document.createElement('input');
                tempInput.value = textToCopy;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                const btnLabel = document.getElementById('copy-btn-label');
                if (btnLabel) {
                    btnLabel.textContent = "Copied!";
                    setTimeout(() => {
                        btnLabel.textContent = "Copy";
                    }, 2000);
                }
            });
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
            input.value = '';
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

            onGlobalDivisionChange();
            updateTicketPrices();
        });
    </script>
@endsection
