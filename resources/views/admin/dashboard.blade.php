@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="space-y-8">

    <!-- Dashboard Title & Overview -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="font-heading text-2xl sm:text-3xl font-extrabold text-white">Event Registrations Dashboard</h1>
            <p class="text-xs text-slate-400 mt-1">Review ticket requests, inspect GCash payment screenshots, and manage ticket approvals.</p>
        </div>
    </div>

    <!-- METRICS CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Total Registrations -->
        <div class="glass-panel rounded-2xl p-5 border-l-4 border-brand-orange">
            <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Registrations</div>
            <div class="font-heading text-3xl font-black text-white mt-2">{{ number_format($stats['total']) }}</div>
            <div class="text-[11px] text-slate-400 mt-1 flex gap-2">
                <span class="text-brand-orange font-bold">{{ $stats['contestants'] }} Contestants</span> • 
                <span class="text-brand-cyan font-bold">{{ $stats['guests'] }} Guests</span>
            </div>
        </div>

        <!-- Pending Approvals -->
        <div class="glass-panel rounded-2xl p-5 border-l-4 border-amber-500">
            <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pending Approval</div>
            <div class="font-heading text-3xl font-black text-amber-400 mt-2">{{ number_format($stats['pending']) }}</div>
            <div class="text-[11px] text-amber-200/80 mt-1">Awaiting admin payment verification</div>
        </div>

        <!-- Approved Registrations -->
        <div class="glass-panel rounded-2xl p-5 border-l-4 border-emerald-500">
            <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Approved Tickets</div>
            <div class="font-heading text-3xl font-black text-emerald-400 mt-2">{{ number_format($stats['approved']) }}</div>
            <div class="text-[11px] text-emerald-200/80 mt-1">Confirmed & email notified</div>
        </div>

        <!-- Total Revenue -->
        <div class="glass-panel rounded-2xl p-5 border-l-4 border-brand-cyan">
            <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Approved Revenue</div>
            <div class="font-heading text-3xl font-black text-brand-cyan mt-2">₱{{ number_format($stats['revenue'], 2) }}</div>
            <div class="text-[11px] text-slate-400 mt-1">From validated payments</div>
        </div>
    </div>

    <!-- DATA TABLE CONTAINER -->
    <div class="glass-panel rounded-3xl overflow-hidden border border-slate-800 shadow-2xl">
        
        <!-- Table Control Toolbar -->
        <div class="p-5 sm:p-6 border-b border-slate-800/80 bg-slate-900/60">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-brand-orange/15 text-brand-orange border border-brand-orange/30 flex items-center justify-center font-bold shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-heading font-extrabold text-base text-white">Registrations Data Table</h3>
                        <p class="text-xs text-slate-400">Showing {{ $registrations->count() }} of {{ $registrations->total() }} entries</p>
                    </div>
                </div>

                <!-- Quick Filter Badges -->
                <div class="flex flex-wrap items-center gap-2 text-xs">
                    <a href="{{ route('admin.dashboard') }}" class="px-3 py-1.5 rounded-xl font-bold transition-all {{ !$status && !$type ? 'bg-brand-orange text-white shadow-lg shadow-brand-orange/20' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                        All ({{ $stats['total'] }})
                    </a>
                    <a href="{{ route('admin.dashboard', ['status' => 'pending']) }}" class="px-3 py-1.5 rounded-xl font-bold transition-all {{ $status === 'pending' ? 'bg-amber-500 text-slate-950 font-extrabold shadow-lg shadow-amber-500/20' : 'bg-slate-800 text-amber-400 hover:bg-slate-700' }}">
                        Pending ({{ $stats['pending'] }})
                    </a>
                    <a href="{{ route('admin.dashboard', ['status' => 'approved']) }}" class="px-3 py-1.5 rounded-xl font-bold transition-all {{ $status === 'approved' ? 'bg-emerald-500 text-slate-950 font-extrabold shadow-lg shadow-emerald-500/20' : 'bg-slate-800 text-emerald-400 hover:bg-slate-700' }}">
                        Approved ({{ $stats['approved'] }})
                    </a>
                </div>
            </div>

            <!-- Search & Dropdown Filter Form -->
            <form action="{{ route('admin.dashboard') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center pt-2">
                
                <!-- Search Input -->
                <div class="sm:col-span-6 relative">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Search by name, ticket #, ref #, school, email..." class="w-full bg-slate-950/80 border border-slate-700/80 rounded-2xl pl-10 pr-4 py-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange transition-all">
                    <svg class="w-4 h-4 text-slate-500 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Status Filter Dropdown -->
                <div class="sm:col-span-3">
                    <select name="status" onchange="this.form.submit()" class="w-full bg-slate-950/80 border border-slate-700/80 rounded-2xl px-4 py-3 text-xs text-white focus:outline-none focus:border-brand-orange transition-all">
                        <option value="">All Statuses</option>
                        <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending Only</option>
                        <option value="approved" {{ $status === 'approved' ? 'selected' : '' }}>Approved Only</option>
                        <option value="rejected" {{ $status === 'rejected' ? 'selected' : '' }}>Rejected Only</option>
                    </select>
                </div>

                <!-- Type Filter Dropdown -->
                <div class="sm:col-span-3 flex gap-2">
                    <select name="type" onchange="this.form.submit()" class="w-full bg-slate-950/80 border border-slate-700/80 rounded-2xl px-4 py-3 text-xs text-white focus:outline-none focus:border-brand-orange transition-all">
                        <option value="">All Types</option>
                        <option value="contestant" {{ $type === 'contestant' ? 'selected' : '' }}>Contestant</option>
                        <option value="guest" {{ $type === 'guest' ? 'selected' : '' }}>Guest / Watcher</option>
                    </select>
                    @if($search || $status || $type)
                        <a href="{{ route('admin.dashboard') }}" class="py-3 px-4 text-xs font-bold text-slate-400 hover:text-white bg-slate-800 hover:bg-slate-700 rounded-2xl transition-all shrink-0 flex items-center justify-center">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- DESKTOP DATA TABLE (hidden on mobile, visible md and up) -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300">
                <thead class="bg-slate-950/90 text-slate-400 uppercase tracking-wider font-extrabold text-[10px] border-b border-slate-800/80">
                    <tr>
                        <th class="py-4 px-5">Ticket #</th>
                        <th class="py-4 px-5">Participant Details</th>
                        <th class="py-4 px-5">Category / Contest</th>
                        <th class="py-4 px-5">School Institution</th>
                        <th class="py-4 px-5">Pass Type</th>
                        <th class="py-4 px-5">Price</th>
                        <th class="py-4 px-5">GCash Proof</th>
                        <th class="py-4 px-5 text-center">Status</th>
                        <th class="py-4 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 font-medium">
                    @forelse($registrations as $reg)
                        <tr class="hover:bg-slate-800/40 transition-colors group">
                            <!-- Ticket Code -->
                            <td class="py-4 px-5 font-mono font-extrabold text-brand-orange text-xs whitespace-nowrap">
                                {{ $reg->ticket_number }}
                            </td>

                            <!-- Participant Details -->
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-xl bg-slate-800 text-slate-300 font-extrabold text-xs flex items-center justify-center shrink-0 border border-slate-700">
                                        {{ strtoupper(substr($reg->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-white text-sm group-hover:text-brand-orange transition-colors">{{ $reg->name }}</div>
                                        <div class="text-[11px] text-slate-400">{{ $reg->email }}</div>
                                        @if($reg->contact_number)
                                            <div class="text-[10px] text-slate-500 font-mono">{{ $reg->contact_number }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Category -->
                            <td class="py-4 px-5">
                                <span class="inline-block px-2.5 py-1 rounded-lg text-[10px] font-extrabold uppercase tracking-wider {{ $reg->registration_type === 'contestant' ? 'bg-orange-950/80 text-orange-400 border border-orange-800/80' : 'bg-sky-950/80 text-sky-400 border border-sky-800/80' }}">
                                    {{ $reg->registration_type }}
                                </span>
                                @if($reg->contest_category)
                                    <div class="text-[11px] text-slate-300 font-semibold mt-1">{{ $reg->contest_category }}</div>
                                @endif
                            </td>

                            <!-- School -->
                            <td class="py-4 px-5">
                                <div class="text-slate-200 font-medium">{{ $reg->school }}</div>
                                <span class="inline-block text-[10px] font-bold mt-0.5 {{ $reg->is_ublc ? 'text-emerald-400' : 'text-slate-400' }}">
                                    {{ $reg->is_ublc ? '● UB Lipa City' : '○ Outside UB' }}
                                </span>
                            </td>

                            <!-- Pass Type -->
                            <td class="py-4 px-5">
                                <span class="inline-block px-2.5 py-1 rounded-lg bg-slate-800/80 text-slate-200 border border-slate-700/80 text-[11px] font-bold">
                                    {{ $reg->ticket_type_label }}
                                </span>
                            </td>

                            <!-- Price -->
                            <td class="py-4 px-5 font-black text-emerald-400 text-sm whitespace-nowrap">
                                {{ $reg->formatted_price }}
                            </td>

                            <!-- GCash Ref & Proof Button -->
                            <td class="py-4 px-5">
                                <div class="font-mono text-slate-200 font-extrabold text-[11px]">{{ $reg->reference_number }}</div>
                                <div class="text-[10px] text-slate-400 truncate max-w-[130px]">{{ $reg->gcash_name }} ({{ $reg->gcash_number }})</div>
                                @if($reg->payment_screenshot)
                                    <button type="button" onclick="openProofModal('{{ asset($reg->payment_screenshot) }}', '{{ $reg->ticket_number }}', '{{ $reg->name }}', '{{ $reg->reference_number }}')" class="inline-flex items-center gap-1.5 text-[10px] font-extrabold text-brand-cyan hover:underline mt-1 bg-cyan-950/60 border border-cyan-800/80 px-2 py-0.5 rounded-md transition-all">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        View Proof
                                    </button>
                                @endif
                            </td>

                            <!-- Status Badge -->
                            <td class="py-4 px-5 text-center whitespace-nowrap">
                                @if($reg->status === 'approved')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-950 text-emerald-400 border border-emerald-700 text-[10px] font-extrabold uppercase shadow-lg shadow-emerald-950/50">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Approved
                                    </span>
                                @elseif($reg->status === 'rejected')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-950 text-rose-400 border border-rose-700 text-[10px] font-extrabold uppercase">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>
                                        Rejected
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-950 text-amber-300 border border-amber-700 text-[10px] font-extrabold uppercase animate-pulse">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                        Pending
                                    </span>
                                @endif
                            </td>

                            <!-- Action Buttons -->
                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    @if($reg->status !== 'approved')
                                        <form action="{{ route('admin.registrations.status', $reg) }}" method="POST" onsubmit="return confirmApprove(this, '{{ $reg->ticket_number }}', '{{ addslashes($reg->name) }}')">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" title="Approve Ticket" class="px-3 py-1.5 text-[11px] font-extrabold text-emerald-300 bg-emerald-950 hover:bg-emerald-800 border border-emerald-700 rounded-xl transition-all shadow-md">
                                                Approve
                                            </button>
                                        </form>
                                    @endif

                                    @if($reg->status !== 'rejected')
                                        <form action="{{ route('admin.registrations.status', $reg) }}" method="POST" onsubmit="return confirmReject(this, '{{ $reg->ticket_number }}', '{{ addslashes($reg->name) }}')">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" title="Reject Ticket" class="px-3 py-1.5 text-[11px] font-extrabold text-rose-300 bg-rose-950 hover:bg-rose-800 border border-rose-700 rounded-xl transition-all shadow-md">
                                                Reject
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.registrations.destroy', $reg) }}" method="POST" onsubmit="return confirmDelete(this, '{{ $reg->ticket_number }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Delete Registration" class="p-1.5 text-slate-400 hover:text-rose-400 bg-slate-800 hover:bg-slate-700 rounded-xl transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-12 text-center text-slate-500 font-medium text-xs">
                                No registrations found matching your filter criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- MOBILE RESPONSIVE CARDS VIEW (visible on small screens < md) -->
        <div class="block md:hidden p-4 space-y-4">
            @forelse($registrations as $reg)
                <div class="bg-slate-900/90 border border-slate-800 rounded-2xl p-5 space-y-4 shadow-lg">
                    <!-- Top Info Header -->
                    <div class="flex items-center justify-between gap-2 border-b border-slate-800 pb-3">
                        <div>
                            <span class="font-mono font-extrabold text-brand-orange text-xs block">{{ $reg->ticket_number }}</span>
                            <span class="text-[10px] font-extrabold uppercase tracking-wider {{ $reg->registration_type === 'contestant' ? 'text-orange-400' : 'text-sky-400' }}">
                                {{ $reg->registration_type }}
                            </span>
                        </div>
                        <div>
                            @if($reg->status === 'approved')
                                <span class="px-2.5 py-1 rounded-full bg-emerald-950 text-emerald-400 border border-emerald-700 text-[10px] font-extrabold uppercase">Approved</span>
                            @elseif($reg->status === 'rejected')
                                <span class="px-2.5 py-1 rounded-full bg-rose-950 text-rose-400 border border-rose-700 text-[10px] font-extrabold uppercase">Rejected</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full bg-amber-950 text-amber-300 border border-amber-700 text-[10px] font-extrabold uppercase animate-pulse">Pending</span>
                            @endif
                        </div>
                    </div>

                    <!-- Participant & Ticket Info -->
                    <div class="space-y-2 text-xs">
                        <div>
                            <div class="font-bold text-white text-sm">{{ $reg->name }}</div>
                            <div class="text-[11px] text-slate-400">{{ $reg->email }}</div>
                            @if($reg->contact_number)
                                <div class="text-[10px] text-slate-500 font-mono">{{ $reg->contact_number }}</div>
                            @endif
                        </div>

                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-800/60 text-[11px]">
                            <div>
                                <span class="text-slate-500 block text-[10px]">School</span>
                                <span class="text-slate-200 font-medium">{{ $reg->school }}</span>
                            </div>
                            <div>
                                <span class="text-slate-500 block text-[10px]">Ticket Pass</span>
                                <span class="text-slate-200 font-bold">{{ $reg->ticket_type_label }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-800/60 text-[11px]">
                            <div>
                                <span class="text-slate-500 block text-[10px]">Price Paid</span>
                                <span class="text-emerald-400 font-black text-sm">{{ $reg->formatted_price }}</span>
                            </div>
                            <div>
                                <span class="text-slate-500 block text-[10px]">GCash Ref #</span>
                                <span class="font-mono text-slate-200 font-bold">{{ $reg->reference_number }}</span>
                            </div>
                        </div>

                        @if($reg->payment_screenshot)
                            <div class="pt-2">
                                <button type="button" onclick="openProofModal('{{ asset($reg->payment_screenshot) }}', '{{ $reg->ticket_number }}', '{{ $reg->name }}', '{{ $reg->reference_number }}')" class="w-full text-center py-2 text-xs font-bold text-brand-cyan bg-cyan-950/60 border border-cyan-800/80 rounded-xl transition-all">
                                    🔍 View GCash Payment Screenshot
                                </button>
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-3 border-t border-slate-800 flex items-center justify-end gap-2">
                        @if($reg->status !== 'approved')
                            <form action="{{ route('admin.registrations.status', $reg) }}" method="POST" class="flex-grow" onsubmit="return handleStatusSubmit(this, 'approved')">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="w-full py-2 text-xs font-extrabold text-emerald-300 bg-emerald-950 hover:bg-emerald-800 border border-emerald-700 rounded-xl transition-all">
                                    Approve
                                </button>
                            </form>
                        @endif

                        @if($reg->status !== 'rejected')
                            <form action="{{ route('admin.registrations.status', $reg) }}" method="POST" class="flex-grow" onsubmit="return handleStatusSubmit(this, 'rejected')">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="w-full py-2 text-xs font-extrabold text-rose-300 bg-rose-950 hover:bg-rose-800 border border-rose-700 rounded-xl transition-all">
                                    Reject
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('admin.registrations.destroy', $reg) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this registration?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-slate-400 hover:text-rose-400 bg-slate-800 hover:bg-slate-700 rounded-xl transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="py-12 text-center text-slate-500 font-medium text-xs">
                    No registrations found matching your query criteria.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($registrations->hasPages())
            <div class="p-5 border-t border-slate-800/80 bg-slate-950/60 flex items-center justify-between">
                {{ $registrations->links() }}
            </div>
        @endif
    </div>
</div>

<!-- PAYMENT SCREENSHOT PREVIEW MODAL -->
<div id="proof-modal" class="fixed inset-0 z-[9999] hidden bg-black/85 backdrop-blur-md flex items-center justify-center p-4">
    <div class="glass-panel rounded-3xl max-w-xl w-full p-6 border border-slate-700 shadow-2xl relative">
        <button onclick="closeProofModal()" class="absolute top-4 right-4 text-slate-400 hover:text-white font-extrabold text-2xl leading-none">&times;</button>
        
        <h3 id="modal-ticket-code" class="font-heading font-extrabold text-lg text-brand-orange mb-1">Payment Proof</h3>
        <p id="modal-meta" class="text-xs text-slate-300 mb-4 leading-relaxed"></p>

        <div class="bg-slate-950 rounded-2xl p-2 text-center max-h-[70vh] overflow-auto border border-slate-800">
            <img id="modal-img" src="" alt="Proof Screenshot" class="max-w-full h-auto mx-auto rounded-xl shadow-2xl">
        </div>

        <div class="mt-5 flex items-center justify-between">
            <a id="modal-download" href="#" target="_blank" download class="px-4 py-2 text-xs font-bold text-brand-cyan bg-cyan-950/80 hover:bg-cyan-900 border border-cyan-800 rounded-xl transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Open Full Image
            </a>
            <button onclick="closeProofModal()" class="px-5 py-2 text-xs font-bold text-slate-300 bg-slate-800 hover:bg-slate-700 rounded-xl transition-all">
                Close Preview
            </button>
        </div>
    </div>
<!-- GLOBAL ADMIN ACTION LOADING OVERLAY MODAL -->
<div id="admin-action-loading-overlay" class="fixed inset-0 z-[999999] hidden bg-slate-950/90 backdrop-blur-md flex flex-col items-center justify-center p-4 select-none">
    <div class="glass-panel rounded-3xl p-8 sm:p-10 max-w-md w-full text-center border border-brand-orange/30 shadow-2xl space-y-6">
        <!-- Glowing Spinner Container -->
        <div class="relative w-24 h-24 mx-auto flex items-center justify-center">
            <div class="absolute inset-0 rounded-full border-4 border-brand-orange/20 animate-pulse"></div>
            <div class="absolute inset-0 rounded-full border-4 border-brand-orange border-t-transparent animate-spin"></div>
            <img src="{{ asset('images/logo-top-left.jpg') }}" alt="Logo" class="w-12 h-12 rounded-xl object-cover shadow-lg border border-white/20">
        </div>

        <div class="space-y-2">
            <h3 id="admin-loading-title" class="font-heading text-xl font-black text-white tracking-wide">Updating Ticket Status...</h3>
            <p class="text-xs text-slate-300 leading-relaxed">Updating record in database and dispatching status notification email to the participant.</p>
        </div>

        <!-- Prominent Warning Badge -->
        <div class="p-3.5 rounded-2xl bg-amber-500/10 border border-amber-500/30 text-amber-300 text-xs font-bold flex items-center justify-center gap-2 shadow-inner">
            <svg class="w-4 h-4 text-amber-400 shrink-0 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <span>Sending Email... Do not refresh or close page.</span>
        </div>

        <div class="inline-flex items-center gap-2 px-4 py-2 bg-brand-orange/15 text-brand-orange text-xs font-extrabold rounded-full border border-brand-orange/30">
            <svg class="w-4 h-4 animate-spin text-brand-orange" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Sending Email Notification...</span>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function openProofModal(imgSrc, ticketCode, name, refNo) {
        document.getElementById('modal-img').src = imgSrc;
        document.getElementById('modal-download').href = imgSrc;
        document.getElementById('modal-ticket-code').textContent = `GCash Payment Proof • ${ticketCode}`;
        document.getElementById('modal-meta').textContent = `Participant: ${name} | GCash Ref: ${refNo}`;
        document.getElementById('proof-modal').classList.remove('hidden');
    }

    function closeProofModal() {
        document.getElementById('proof-modal').classList.add('hidden');
    }

    function confirmApprove(form, ticketCode, name) {
        Swal.fire({
            title: 'Approve Ticket Registration?',
            html: `Are you sure you want to approve ticket <strong style="color: #f97316;">${ticketCode}</strong> for <strong>${name}</strong>?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Approve Ticket',
            cancelButtonText: 'Cancel',
            background: '#0f172a',
            color: '#f8fafc',
            customClass: {
                popup: 'border border-slate-700 rounded-2xl shadow-2xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                executeFormSubmit(form, 'approved');
            }
        });
        return false;
    }

    function confirmReject(form, ticketCode, name) {
        Swal.fire({
            title: 'Reject Ticket Registration?',
            html: `Are you sure you want to reject ticket <strong style="color: #f43f5e;">${ticketCode}</strong> for <strong>${name}</strong>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Reject Ticket',
            cancelButtonText: 'Cancel',
            background: '#0f172a',
            color: '#f8fafc',
            customClass: {
                popup: 'border border-slate-700 rounded-2xl shadow-2xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                executeFormSubmit(form, 'rejected');
            }
        });
        return false;
    }

    function confirmDelete(form, ticketCode) {
        Swal.fire({
            title: 'Delete Registration Record?',
            html: `Are you sure you want to delete record <strong style="color: #f43f5e;">${ticketCode}</strong>? This action cannot be undone.`,
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, Delete Record',
            cancelButtonText: 'Cancel',
            background: '#0f172a',
            color: '#f8fafc',
            customClass: {
                popup: 'border border-slate-700 rounded-2xl shadow-2xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
        return false;
    }

    function executeFormSubmit(form, status) {
        const btn = form.querySelector('button[type="submit"]');
        if (btn) {
            btn.classList.add('opacity-75', 'pointer-events-none');
            const textLabel = status === 'approved' ? 'Approving...' : 'Rejecting...';
            btn.innerHTML = `
                <span class="inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>${textLabel}</span>
                </span>
            `;
        }

        const overlay = document.getElementById('admin-action-loading-overlay');
        const title = document.getElementById('admin-loading-title');
        if (title) {
            title.textContent = status === 'approved' ? 'Approving Ticket...' : 'Rejecting Ticket...';
        }
        if (overlay) {
            overlay.classList.remove('hidden');
        }

        form.submit();
    }
</script>
@endsection
