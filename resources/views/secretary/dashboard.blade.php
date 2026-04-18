@extends('secretary.layout')

@section('content')


<div class="mb-10">
    <h2 class="text-3xl font-extrabold">Tableau de Bord Secrétaire</h2>
    <p class="text-gray-500 mt-1">Gestion quotidienne du cabinet médical</p>
</div>

<!-- STATS -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    <!-- Patients -->
    <div class="bg-surface-container-low p-6 rounded-xl hover:shadow-lg transition">
        <h3 class="text-sm text-gray-500">Patients</h3>
        <p class="text-4xl font-bold text-blue-600">{{ $patientsCount }}</p>
    </div>

    <!-- Rendez-vous -->
    <div class="bg-surface-container-low p-6 rounded-xl hover:shadow-lg transition">
        <h3 class="text-sm text-gray-500">Rendez-vous</h3>
        <p class="text-4xl font-bold text-green-600">{{ $rendezVousCount }}</p>
    </div>

    <!-- Pending -->
    <div class="bg-surface-container-low p-6 rounded-xl hover:shadow-lg transition">
        <h3 class="text-sm text-gray-500">En attente</h3>
        <p class="text-4xl font-bold text-yellow-500">{{ $pendingCount }}</p>
    </div>

    <!-- Confirmed -->
    <div class="bg-surface-container-low p-6 rounded-xl hover:shadow-lg transition">
        <h3 class="text-sm text-gray-500">Confirmés</h3>
        <p class="text-4xl font-bold text-emerald-600">{{ $confirmedCount }}</p>
    </div>

</div>

<!-- MAIN GRID -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- TASKS -->
    <div class="lg:col-span-2 bg-surface-container-lowest p-6 rounded-xl shadow">
        <h3 class="text-lg font-bold mb-4">Tâches du jour</h3>

        <ul class="space-y-3">

            <li class="p-3 bg-gray-50 rounded-lg flex justify-between">
                <span>Confirmer les rendez-vous du matin</span>
                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Pending</span>
            </li>

            <li class="p-3 bg-gray-50 rounded-lg flex justify-between">
                <span>Appeler les patients en retard</span>
                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">In progress</span>
            </li>

            <li class="p-3 bg-gray-50 rounded-lg flex justify-between">
                <span>Mettre à jour dossiers patients</span>
                <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">Done</span>
            </li>

        </ul>
    </div>

    <!-- QUICK INFO -->
    <div class="bg-surface-container-lowest p-6 rounded-xl shadow">
        <h3 class="text-lg font-bold mb-4">Résumé rapide</h3>

        <div class="space-y-4">

            <div class="flex justify-between">
                <span>RDV aujourd'hui</span>
                <b class="text-blue-600">{{ $todayRdv }}</b>
            </div>

            <div class="flex justify-between">
                <span>RDV demain</span>
                <b class="text-green-600">{{ $tomorrowRdv }}</b>
            </div>

            <div class="flex justify-between">
                <span>Annulés</span>
                <b class="text-red-500">{{ $cancelledCount }}</b>
            </div>

        </div>
    </div>

</div>

<!-- TODAY APPOINTMENTS TABLE -->
<div class="mt-10 bg-white rounded-xl shadow overflow-hidden">

    <div class="p-4 border-b">
        <h3 class="text-lg font-bold">Rendez-vous du jour</h3>
    </div>

    @if($todayAppointments->isEmpty())
        <div class="p-6 text-center text-gray-500">
            Aucun rendez-vous aujourd'hui
        </div>
    @else
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left">Patient</th>
                    <th class="p-3 text-left">Médecin</th>
                    <th class="p-3 text-left">Heure</th>
                    <th class="p-3 text-left">Statut</th>
                </tr>
            </thead>

            <tbody>
                @foreach($todayAppointments as $rv)
                <tr class="border-b hover:bg-gray-50">

                    <td class="p-3 font-medium">
                        {{ $rv->patient->name }}
                    </td>

                    <td class="p-3">
                        {{ $rv->medecin->name }}
                    </td>

                    <td class="p-3">
                        {{ $rv->date_heure }}
                    </td>

                    <td class="p-3">
                        <span class="px-2 py-1 text-xs rounded
                            @if($rv->statut == 'PENDING') bg-yellow-100 text-yellow-700
                            @elseif($rv->statut == 'CONFIRMED') bg-green-100 text-green-700
                            @else bg-red-100 text-red-700
                            @endif">
                            {{ $rv->statut }}
                        </span>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    @endif

</div>

@endsection
