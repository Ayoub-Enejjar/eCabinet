@extends('admin.layout')

@section('title', 'Admin - Settings')

@section('content')
<div class="max-w-7xl mx-auto space-y-12">
<!-- Page Header -->
<header class="flex flex-col gap-2">
<h2 class="text-4xl font-extrabold font-headline tracking-tight text-on-surface">Configuration du Cabinet</h2>
<p class="text-on-surface-variant max-w-2xl font-body">Manage global clinic parameters, administrative controls, and system-wide notification protocols within the secure sanctuary of eCabinet.</p>
</header>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-12 gap-6">
<!-- Section: Clinic Protocols (Wide Card) -->
<section class="col-span-12 lg:col-span-8 bg-surface-container-low rounded-xl p-8 space-y-6">
<div class="flex justify-between items-end">
<div class="space-y-1">
<span class="text-[10px] uppercase font-bold tracking-[0.2em] text-primary">System Integrity</span>
<h3 class="text-2xl font-bold font-headline">Clinic-wide Notifications</h3>
</div>
<button class="px-6 py-2 bg-gradient-to-r from-primary to-primary-container text-on-primary rounded-lg text-sm font-semibold shadow-[0_10px_30px_-5px_rgba(0,106,97,0.15)] hover:scale-[1.02] transition-transform">
                            Add Alert Protocol
                        </button>
</div>
<!-- Notification Custom List -->
<div class="space-y-4">
@foreach($alertProtocols as $protocol)
<!-- Notification Item -->
<div class="flex items-center justify-between p-4 bg-surface-container-lowest rounded-xl hover:shadow-sm transition-shadow group">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-lg {{ $protocol->priority == 'Urgent' ? 'bg-primary-fixed text-on-primary-fixed' : ($protocol->priority == 'High' ? 'bg-tertiary-fixed text-on-tertiary-fixed' : 'bg-surface-container-high text-outline') }} flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="{{ $protocol->icon }}" style="font-variation-settings: 'FILL' 1;">{{ $protocol->icon }}</span>
</div>
<div>
<h4 class="font-bold text-on-surface">{{ $protocol->name }}</h4>
<p class="text-xs text-on-surface-variant">{{ $protocol->description }}</p>
</div>
</div>
<div class="flex items-center gap-6">
<div class="text-right">
<p class="text-[10px] font-bold text-outline uppercase tracking-wider">Priority</p>
<span class="px-2 py-0.5 {{ $protocol->priority == 'Urgent' ? 'bg-primary-fixed text-on-primary-fixed' : ($protocol->priority == 'High' ? 'bg-tertiary-fixed text-on-tertiary-fixed' : 'bg-secondary-fixed text-on-secondary-fixed') }} text-[10px] font-bold rounded-full">{{ $protocol->priority }}</span>
</div>
<form action="{{ route('admin.settings.alert.toggle', $protocol) }}" method="POST">
    @csrf
    <button type="submit" class="w-10 h-6 {{ $protocol->is_active ? 'bg-primary' : 'bg-outline-variant/30' }} rounded-full relative cursor-pointer border-0 p-0 transition-colors">
        <div class="absolute {{ $protocol->is_active ? 'right-1' : 'left-1' }} top-1 w-4 h-4 bg-white rounded-full transition-all"></div>
    </button>
</form>
</div>
</div>
@endforeach
</div>
</section>
<!-- Section: Quick Controls (Tall Card) -->
<section class="col-span-12 lg:col-span-4 bg-primary text-on-primary rounded-xl p-8 relative overflow-hidden flex flex-col justify-between">
<div class="relative z-10">
<span class="text-[10px] uppercase font-bold tracking-[0.2em] opacity-80">Security Shield</span>
<h3 class="text-2xl font-bold font-headline mt-2 mb-4">Privacy Lockdown</h3>
<p class="text-sm opacity-90 font-body">Temporarily restrict all non-admin access to patient records during system maintenance or emergency audit.</p>
</div>
<div class="mt-8 space-y-4 relative z-10">
<form action="{{ route('admin.settings.lockdown') }}" method="POST">
    @csrf
    <button type="submit" class="w-full py-4 bg-surface-container-lowest {{ $lockdownStatus ? 'text-red-600' : 'text-primary' }} rounded-lg font-bold flex items-center justify-center gap-2 hover:bg-surface-container-low transition-colors">
        <span class="material-symbols-outlined" data-icon="lock">{{ $lockdownStatus ? 'lock_open' : 'lock' }}</span>
        {{ $lockdownStatus ? 'Deactivate Lockdown' : 'Activate Lockdown' }}
    </button>
</form>
<p class="text-[10px] text-center opacity-60 font-bold tracking-widest uppercase">Status: {{ $lockdownStatus ? 'System Locked Down' : 'System Unrestricted' }}</p>
</div>
<!-- Decorative Background Element -->
<div class="absolute -right-16 -bottom-16 w-64 h-64 bg-primary-container rounded-full opacity-20"></div>
</section>
<!-- Section: Audit Logs (Timeline Layout) -->
<section class="col-span-12 grid grid-cols-1 lg:grid-cols-3 gap-6">
<div class="lg:col-span-2 bg-surface-container-lowest rounded-xl p-8 shadow-sm">
<div class="flex items-center justify-between mb-8">
<div>
<h3 class="text-2xl font-bold font-headline">Audit Logs</h3>
<p class="text-sm text-on-surface-variant font-body">Real-time chronicle of system modifications and access.</p>
</div>
<div class="flex gap-2">
<button class="p-2 rounded-lg bg-surface-container-low text-outline hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="filter_list">filter_list</span>
</button>
<button class="p-2 rounded-lg bg-surface-container-low text-outline hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="download">download</span>
</button>
</div>
</div>
<div class="space-y-0 relative before:absolute before:left-[1.65rem] before:top-4 before:bottom-4 before:w-[2px] before:bg-surface-container-high">
@forelse($auditLogs as $log)
    @php
        $icon = 'info';
        $iconColor = 'text-primary';
        $title = 'System Activity';
        
        switch($log->type) {
            case 'login':
                $icon = 'login';
                $iconColor = 'text-secondary';
                $title = 'User Login';
                break;
            case 'logout':
                $icon = 'logout';
                $iconColor = 'text-outline';
                $title = 'User Logout';
                break;
            case 'registered':
                $icon = 'person_add';
                $iconColor = 'text-primary';
                $title = 'New Account Created';
                break;
            case 'created_user_account':
                $icon = 'manage_accounts';
                $iconColor = 'text-tertiary';
                $title = 'Account Provisioned';
                break;
            case 'booked_appointment':
                $icon = 'event_available';
                $iconColor = 'text-primary';
                $title = 'Appointment Booked';
                break;
            case 'created_consultation':
                $icon = 'medical_services';
                $iconColor = 'text-secondary';
                $title = 'Consultation Started';
                break;
        }
    @endphp
    <!-- Timeline Entry -->
    <div class="flex gap-6 pb-8 relative group">
        <div class="w-14 h-14 rounded-full bg-surface-container-low flex items-center justify-center z-10 border-4 border-surface-container-lowest">
            <span class="material-symbols-outlined {{ $iconColor }} text-xl" data-icon="{{ $icon }}">{{ $icon }}</span>
        </div>
        <div class="flex-1 pt-1">
            <div class="flex items-center justify-between mb-1">
                <h5 class="font-bold text-on-surface">{{ $title }}</h5>
                <span class="text-[10px] font-medium text-outline bg-surface-container-low px-2 py-1 rounded">{{ $log->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-sm text-on-surface-variant">
                @if($log->user)
                    <span class="text-primary font-semibold">{{ $log->user->name }}</span> ({{ $log->user->role }}) a effectué l'action: <span class="font-medium">{{ $log->type }}</span>.
                @else
                    System performed an action: <span class="font-medium">{{ $log->type }}</span>.
                @endif
            </p>
            <div class="mt-2 flex gap-4 text-[10px] text-outline-variant font-bold uppercase tracking-widest">
                <span>LOG ID: #{{ $log->id }}</span>
                <span>IP: {{ $log->ip_address ?? 'Unknown' }}</span>
            </div>
        </div>
    </div>
@empty
    <div class="py-8 text-center text-sm text-on-surface-variant font-medium">
        Aucune activité récente trouvée.
    </div>
@endforelse
</div>
</div>
<!-- Side Stats / Info -->
<div class="space-y-6">
<div class="bg-surface-container-low rounded-xl p-6">
<h4 class="text-sm font-bold mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-lg" data-icon="analytics">analytics</span>
                                System Health
                            </h4>
<div class="space-y-4">
<div>
<div class="flex justify-between text-[10px] font-bold uppercase mb-1">
<span>Storage (Cloud)</span>
<span>{{ $cloudStorage }}%</span>
</div>
<div class="h-1.5 w-full bg-outline-variant/20 rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: {{ $cloudStorage }}%"></div>
</div>
</div>
<div>
<div class="flex justify-between text-[10px] font-bold uppercase mb-1">
<span>Server Uptime</span>
<span>{{ $serverUptime }}%</span>
</div>
<div class="h-1.5 w-full bg-outline-variant/20 rounded-full overflow-hidden">
<div class="h-full bg-secondary" style="width: {{ $serverUptime }}%"></div>
</div>
</div>
</div>
</div>
<div class="bg-tertiary-fixed rounded-xl p-6 text-on-tertiary-fixed">
<h4 class="font-bold mb-2">Expiring Licenses</h4>
@forelse($licenses as $license)
    @php
        $daysLeft = now()->diffInDays($license->expiration_date, false);
    @endphp
    @if($daysLeft <= 30 && $daysLeft >= 0)
        <p class="text-xs mb-4 opacity-80">The clinic's <span class="font-bold">{{ $license->name }}</span> will expire in {{ ceil($daysLeft) }} days.</p>
        <button class="w-full py-2 bg-on-tertiary-fixed text-tertiary-fixed rounded-lg text-xs font-bold uppercase tracking-widest mt-2 hover:opacity-90">Renew Now</button>
    @elseif($daysLeft < 0)
        <p class="text-xs mb-4 opacity-80 text-red-700">The clinic's <span class="font-bold">{{ $license->name }}</span> has expired.</p>
    @endif
@empty
    <p class="text-xs mb-4 opacity-80">All licenses are up to date.</p>
@endforelse
</div>
<!-- Clinic Capacity Heatmap Placeholder -->
<div class="bg-surface-container-low rounded-xl p-6 overflow-hidden relative min-h-[160px] flex flex-col justify-end">
<img class="absolute inset-0 w-full h-full object-cover opacity-20 grayscale brightness-150" data-alt="abstract data visualization with soft teal and orange curves representing clinic efficiency and patient flow" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCndin5YqHTuVXjxnDmVHSSLrQCZGPBzKD729xmxodW0azEiO6v16n8jHfvgurAUkOQM7ZqOUOZ_RXb3_iwObgIkcYqSBzJ5Pt0q2Ha5jaReevSBFaAkA2mwJr_8bKFlWumsirycIp_jFMiRxOmP90yZWH1-36-FY9pENrxohipJS7LAWVqCXjR2Aow3stqpoM2UzlInyv_3QJvspk_qyt2BweNLeIAWT_l9zgXfx8lQ-M9QPElxPvzndFYNWZIZ2O5iEvSe1NWxLeM"/>
<div class="relative z-10">
<h4 class="text-sm font-bold text-on-surface">Data Efficiency</h4>
<p class="text-xs text-on-surface-variant">Weekly performance index is up <span class="text-primary font-bold">{{ $dataEfficiency }}%</span>.</p>
</div>
</div>
</div>
</section>
</div>
</div>
@endsection
