@extends('secretary.layout')

@section('content')

<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
    <div>
        <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">dashboard</h2>
        <p class="text-slate-500 mt-1 flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
            Real-time management of the medical office
        </p>
    </div>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white border border-slate-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all group">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Patients</h3>
                <p class="text-4xl font-black text-slate-800 mt-2">{{ $patientsCount }}</p>
            </div>
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>


        </div>
    </div>
</div>

    <div class="bg-white border border-slate-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all group">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Total RDV</h3>
                <p class="text-4xl font-black text-slate-800 mt-2">{{ $rendezVousCount }}</p>
            </div>
            <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white border border-slate-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all group">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Pending</h3>
                <p class="text-4xl font-black text-amber-500 mt-2">{{ $pendingCount }}</p>
            </div>
            <div class="p-3 bg-amber-50 text-amber-600 rounded-xl group-hover:bg-amber-600 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white border border-slate-100 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all group">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Confirmed</h3>
                <p class="text-4xl font-black text-emerald-600 mt-2">{{ $confirmedCount }}</p>
            </div>
            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-50 flex justify-between items-center bg-slate-50/50">
            <h3 class="text-lg font-bold text-slate-800">Daily Tasks</h3>
            <span class="text-xs font-bold text-blue-600 bg-blue-100 px-2 py-1 rounded-full uppercase">to handle</span>
        </div>

        <div class="divide-y divide-slate-100">
            <div class="p-4 flex items-center justify-between hover:bg-slate-50 transition">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-slate-700">Confirm Pending Appointments</p>
                        <p class="text-xs text-slate-400">High Priority</p>
                    </div>
                </div>
                <span class="text-xs font-semibold bg-amber-100 text-amber-700 px-3 py-1 rounded-full">Pending</span>
            </div>

            <div class="p-4 flex items-center justify-between hover:bg-slate-50 transition">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-slate-700">Call Patients Who Are Late</p>
                        <p class="text-xs text-slate-400">Phone Follow-up</p>
                    </div>
                </div>
                <span class="text-xs font-semibold bg-blue-100 text-blue-700 px-3 py-1 rounded-full">In Progress</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <h3 class="text-lg font-bold text-slate-800 mb-6">Quick summary of appointments</h3>

        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-blue-600"></div>
                    <span class="text-slate-600">Today</span>
                </div>
                <b class="text-xl text-blue-600">{{ $todayRdv }}</b>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-green-500"></div>
                    <span class="text-slate-600">Tomorrow</span>
                </div>
                <b class="text-xl text-green-600">{{ $tomorrowRdv }}</b>
            </div>



        </div>


    </div>

</div>

<div class="mt-10 bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">

    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h3 class="text-lg font-bold text-slate-800">Today's Appointments</h3>

    </div>

    @if($todayAppointments->isEmpty())
        <div class="p-12 text-center">
            <div class="bg-slate-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <p class="text-slate-500">No appointments scheduled for today.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4 font-bold">Patient</th>
                        <th class="px-6 py-4 font-bold">doctor</th>
                        <th class="px-6 py-4 font-bold text-center">hour</th>
                        <th class="px-6 py-4 font-bold text-center">Statut</th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @foreach($todayAppointments as $rv)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-xs uppercase">
                                    {{ substr($rv->patient->name, 0, 2) }}
                                </div>
                                <span class="font-bold text-slate-700">{{ $rv->patient->name }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-slate-600 italic">
                            Dr. {{ $rv->medecin->name }}
                        </td>

                        <td class="px-6 py-4 text-center font-semibold text-slate-700">
                            {{ \Carbon\Carbon::parse($rv->date_heure)->format('H:i') }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            @php
                                $statusClasses = [
                                    'PENDING' => 'bg-amber-50 text-amber-700 border-amber-100',
                                    'CONFIRMED' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                                    'CANCELLED' => 'bg-rose-50 text-rose-700 border-rose-100'
                                ];
                                $class = $statusClasses[$rv->statut] ?? 'bg-slate-50 text-slate-700 border-slate-100';
                            @endphp
                            <span class="px-3 py-1 text-xs font-bold rounded-full border {{ $class }}">
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
