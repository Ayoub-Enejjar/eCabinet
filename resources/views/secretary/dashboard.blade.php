@extends('secretary.layout')

@section('title', 'Secretary - Dashboard')

@section('content')
    @if(session('success'))
    <div class="px-6 py-4 bg-green-100 text-green-800 rounded-xl font-medium mb-6">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="px-6 py-4 bg-red-100 text-red-800 rounded-xl font-medium mb-6">
        {{ session('error') }}
    </div>
    @endif

<!-- Dashboard Header -->
<div class="mb-10">
    <h2 class="text-3xl font-extrabold font-headline tracking-tight text-on-surface">Dashboard</h2>
    <p class="text-on-surface-variant font-medium mt-1 flex items-center gap-2">
        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
        Real-time management of the medical office
    </p>
</div>

<!-- Bento Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <!-- Total Patients -->
    <div class="bg-surface-container-low p-6 rounded-xl hover:shadow-lg transition-all duration-300 group">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-secondary-fixed text-secondary rounded-lg group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined" data-icon="group">group</span>
            </div>
        </div>
        <h3 class="text-sm font-bold text-on-surface-variant mb-1 uppercase tracking-wider">Patients</h3>
        <p class="text-4xl font-extrabold font-headline text-on-surface">{{ $patientsCount }}</p>
    </div>

    <!-- Total Appointments -->
    <div class="bg-surface-container-low p-6 rounded-xl hover:shadow-lg transition-all duration-300 group">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-primary-fixed text-primary rounded-lg group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined" data-icon="calendar_today">calendar_today</span>
            </div>
        </div>
        <h3 class="text-sm font-bold text-on-surface-variant mb-1 uppercase tracking-wider">Total RDV</h3>
        <p class="text-4xl font-extrabold font-headline text-on-surface">{{ $rendezVousCount }}</p>
    </div>

    <!-- Pending Appointments -->
    <div class="bg-surface-container-low p-6 rounded-xl hover:shadow-lg transition-all duration-300 group">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-tertiary-fixed text-tertiary rounded-lg group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined" data-icon="pending_actions">pending_actions</span>
            </div>
        </div>
        <h3 class="text-sm font-bold text-on-surface-variant mb-1 uppercase tracking-wider">Pending</h3>
        <p class="text-4xl font-extrabold font-headline text-on-surface">{{ $pendingCount }}</p>
    </div>

    <!-- Confirmed Appointments -->
    <div class="bg-surface-container-low p-6 rounded-xl hover:shadow-lg transition-all duration-300 group">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-secondary-container text-on-secondary-container rounded-lg group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined" data-icon="event_available">event_available</span>
            </div>
        </div>
        <h3 class="text-sm font-bold text-on-surface-variant mb-1 uppercase tracking-wider">Confirmed</h3>
        <p class="text-4xl font-extrabold font-headline text-on-surface">{{ $confirmedCount }}</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">

    <div class="lg:col-span-2 bg-surface-container-lowest rounded-xl shadow-[0_10px_30px_-5px_rgba(0,106,97,0.08)] overflow-hidden">
        <div class="p-6 border-b border-outline-variant/10 flex justify-between items-center bg-surface-container-low/50">
            <h3 class="text-lg font-bold font-headline text-on-surface">Daily Tasks</h3>
            <span class="text-[10px] font-bold bg-primary-fixed text-on-primary-fixed px-2 py-1 rounded-full uppercase tracking-wider">To Handle</span>
        </div>

        <div class="divide-y divide-outline-variant/10">
            <div class="p-4 flex items-center justify-between hover:bg-surface-container-low/50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary">
                        <span class="material-symbols-outlined text-sm" data-icon="notification_important">notification_important</span>
                    </div>
                    <div>
                        <p class="font-medium font-bold text-on-surface">Confirm Pending Appointments</p>
                        <p class="text-xs text-on-surface-variant">High Priority</p>
                    </div>
                </div>
                <span class="text-[10px] font-bold bg-tertiary-fixed text-on-tertiary-fixed px-3 py-1 rounded-full uppercase">Pending</span>
            </div>

            <div class="p-4 flex items-center justify-between hover:bg-surface-container-low/50 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-secondary-fixed flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined text-sm" data-icon="phone_callback">phone_callback</span>
                    </div>
                    <div>
                        <p class="font-medium font-bold text-on-surface">Call Patients Who Are Late</p>
                        <p class="text-xs text-on-surface-variant">Phone Follow-up</p>
                    </div>
                </div>
                <span class="text-[10px] font-bold bg-secondary-fixed text-on-secondary-fixed px-3 py-1 rounded-full uppercase">In Progress</span>
            </div>
        </div>
    </div>

    <div class="bg-surface-container-lowest rounded-xl shadow-[0_10px_30px_-5px_rgba(0,106,97,0.08)] p-8">
        <h3 class="text-lg font-bold font-headline text-on-surface mb-6">Quick Summary</h3>

        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-primary"></div>
                    <span class="text-sm font-semibold text-on-surface-variant">Today's Appointments</span>
                </div>
                <b class="text-xl font-extrabold text-primary">{{ $todayRdv }}</b>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-secondary"></div>
                    <span class="text-sm font-semibold text-on-surface-variant">Tomorrow's Appointments</span>
                </div>
                <b class="text-xl font-extrabold text-secondary">{{ $tomorrowRdv }}</b>
            </div>
        </div>
    </div>
</div>

<div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_10px_30px_-5px_rgba(0,106,97,0.08)]">
    <div class="p-6 border-b border-outline-variant/10 flex justify-between items-center">
        <h3 class="text-lg font-bold font-headline text-on-surface">Today's Appointments List</h3>
    </div>

    @if($todayAppointments->isEmpty())
        <div class="p-12 text-center">
            <div class="w-16 h-16 rounded-full bg-surface-container-low flex items-center justify-center mx-auto mb-4 text-outline">
                <span class="material-symbols-outlined text-3xl" data-icon="event_busy">event_busy</span>
            </div>
            <p class="text-on-surface-variant font-medium">No appointments scheduled for today.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-surface-container-low text-[10px] font-bold uppercase tracking-widest text-outline">
                    <tr>
                        <th class="px-8 py-4">Patient</th>
                        <th class="px-8 py-4">Doctor</th>
                        <th class="px-8 py-4 text-center">Time</th>
                        <th class="px-8 py-4 text-center">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-outline-variant/10">
                    @foreach($todayAppointments as $rv)
                    <tr class="hover:bg-surface-container-low/50 transition-colors group">
                        <td class="px-8 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-bold text-xs uppercase">
                                    {{ substr($rv->patient->name, 0, 2) }}
                                </div>
                                <span class="font-bold text-sm text-on-surface">{{ $rv->patient->name }}</span>
                            </div>
                        </td>

                        <td class="px-8 py-4 text-sm font-semibold text-on-surface-variant italic">
                            Dr. {{ $rv->medecin->name }}
                        </td>

                        <td class="px-8 py-4 text-center text-sm font-bold text-on-surface">
                            {{ \Carbon\Carbon::parse($rv->date_heure)->format('H:i') }}
                        </td>

                        <td class="px-8 py-4 text-center">
                            @php
                                $statusClasses = [
                                    'PENDING' => 'bg-tertiary-fixed/30 text-tertiary',
                                    'CONFIRMED' => 'bg-primary-fixed/30 text-primary-container',
                                    'CANCELLED' => 'bg-error-container text-on-error-container'
                                ];
                                $class = $statusClasses[$rv->statut] ?? 'bg-surface-variant text-on-surface';
                            @endphp
                            <span class="px-3 py-1 text-[10px] font-bold rounded-full uppercase tracking-wider {{ $class }}">
                                {{ $rv->statut }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
