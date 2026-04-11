@extends('layouts.doctor')

@section('page-title', 'Planning & Agenda')

@section('content')
<div class="p-8 space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-headline font-extrabold text-on-surface">Planning Hebdomadaire</h2>
            <p class="text-sm text-on-surface-variant mt-1">Semaine du {{ now()->startOfWeek()->format('d') }} au {{ now()->endOfWeek()->format('d M Y') }}</p>
        </div>
        <div class="flex gap-3">
            <button class="flex items-center gap-2 px-4 py-2 border border-outline-variant text-on-surface-variant text-sm rounded-lg hover:bg-surface-container transition-colors">
                <span class="material-symbols-outlined text-sm">chevron_left</span>
                Semaine précédente
            </button>
            <button class="flex items-center gap-2 px-4 py-2 bg-primary text-on-primary text-sm font-semibold rounded-lg hover:bg-primary-container transition-colors">
                Aujourd'hui
            </button>
            <button class="flex items-center gap-2 px-4 py-2 border border-outline-variant text-on-surface-variant text-sm rounded-lg hover:bg-surface-container transition-colors">
                Semaine suivante
                <span class="material-symbols-outlined text-sm">chevron_right</span>
            </button>
        </div>
    </div>

    {{-- Week Stats Strip --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm border border-outline-variant/10">
            <p class="text-[10px] uppercase font-bold text-on-surface-variant tracking-wider">RDV cette semaine</p>
            <p class="text-3xl font-black text-primary mt-1">{{ \App\Models\RendezVous::where('medecin_id', auth()->id())->whereBetween('date_heure', [now()->startOfWeek(), now()->endOfWeek()])->count() }}</p>
        </div>
        <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm border border-outline-variant/10">
            <p class="text-[10px] uppercase font-bold text-on-surface-variant tracking-wider">Confirmés</p>
            <p class="text-3xl font-black text-green-600 mt-1">{{ \App\Models\RendezVous::where('medecin_id', auth()->id())->where('statut', 'CONFIRME')->whereBetween('date_heure', [now()->startOfWeek(), now()->endOfWeek()])->count() }}</p>
        </div>
        <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm border border-outline-variant/10">
            <p class="text-[10px] uppercase font-bold text-on-surface-variant tracking-wider">En attente</p>
            <p class="text-3xl font-black text-amber-500 mt-1">{{ \App\Models\RendezVous::where('medecin_id', auth()->id())->where('statut', 'EN_ATTENTE')->whereBetween('date_heure', [now()->startOfWeek(), now()->endOfWeek()])->count() }}</p>
        </div>
        <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm border border-outline-variant/10">
            <p class="text-[10px] uppercase font-bold text-on-surface-variant tracking-wider">Aujourd'hui</p>
            <p class="text-3xl font-black text-secondary mt-1">{{ \App\Models\RendezVous::where('medecin_id', auth()->id())->whereDate('date_heure', today())->count() }}</p>
        </div>
    </div>

    {{-- Weekly Calendar Grid --}}
    <div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden border border-outline-variant/10">
        {{-- Day Headers --}}
        @php
            $days = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
            $dayDates = [];
            for ($i = 0; $i < 6; $i++) {
                $dayDates[] = now()->startOfWeek()->addDays($i);
            }
        @endphp
        <div class="grid grid-cols-7 border-b border-outline-variant/20">
            <div class="py-3 px-4 text-[10px] font-bold text-on-surface-variant uppercase tracking-wider bg-surface-container text-center">Heure</div>
            @foreach($dayDates as $day)
            <div class="py-3 px-2 text-center bg-surface-container {{ $day->isToday() ? 'border-b-2 border-primary' : '' }}">
                <p class="text-[10px] font-bold uppercase tracking-wider {{ $day->isToday() ? 'text-primary' : 'text-on-surface-variant' }}">{{ $day->format('D') }}</p>
                <p class="text-lg font-black {{ $day->isToday() ? 'text-primary' : 'text-on-surface' }}">{{ $day->format('d') }}</p>
            </div>
            @endforeach
        </div>

        {{-- Time Slots --}}
        @php
            $hours = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
            $rdvs = \App\Models\RendezVous::where('medecin_id', auth()->id())
                ->whereBetween('date_heure', [now()->startOfWeek(), now()->endOfWeek()])
                ->with('patient')
                ->get();
        @endphp
        @foreach($hours as $hour)
        <div class="grid grid-cols-7 border-b border-outline-variant/10 min-h-[60px]">
            <div class="py-3 px-4 text-xs font-semibold text-on-surface-variant border-r border-outline-variant/20 flex items-start">
                {{ $hour }}
            </div>
            @foreach($dayDates as $day)
            @php
                $rdv = $rdvs->first(function($r) use ($day, $hour) {
                    return $r->date_heure->format('Y-m-d') === $day->format('Y-m-d')
                        && $r->date_heure->format('H:i') === $hour;
                });
            @endphp
            <div class="border-r border-outline-variant/10 p-1 {{ $day->isToday() ? 'bg-primary/5' : '' }}">
                @if($rdv)
                <div class="rounded-lg p-2 text-[11px] font-semibold leading-snug cursor-pointer hover:opacity-90 transition-opacity
                    {{ $rdv->statut === 'CONFIRME' ? 'bg-teal-100 text-teal-800 border-l-2 border-teal-500' : '' }}
                    {{ $rdv->statut === 'EN_ATTENTE' ? 'bg-amber-100 text-amber-800 border-l-2 border-amber-500' : '' }}
                    {{ $rdv->statut === 'ANNULE' ? 'bg-red-100 text-red-800 border-l-2 border-red-400 opacity-60' : '' }}
                    {{ !in_array($rdv->statut, ['CONFIRME','EN_ATTENTE','ANNULE']) ? 'bg-secondary-fixed text-on-secondary-fixed border-l-2 border-secondary' : '' }}
                ">
                    <p class="truncate">{{ $rdv->patient->name ?? 'Patient' }}</p>
                    <p class="font-normal opacity-70 truncate">{{ $rdv->motif ?? 'Consultation' }}</p>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endforeach
    </div>

    {{-- Upcoming Appointments List --}}
    @php
        $upcoming = \App\Models\RendezVous::where('medecin_id', auth()->id())
            ->where('date_heure', '>=', now())
            ->orderBy('date_heure')
            ->with('patient')
            ->limit(5)
            ->get();
    @endphp

    @if($upcoming->isNotEmpty())
    <div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm border border-outline-variant/10">
        <h3 class="text-lg font-headline font-bold text-on-surface mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">upcoming</span>
            Prochains rendez-vous
        </h3>
        <div class="space-y-3">
            @foreach($upcoming as $rdv)
            <div class="flex items-center gap-4 p-4 rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors">
                <div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center font-black text-primary text-lg shrink-0">
                    {{ substr($rdv->patient->name ?? 'P', 0, 1) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-bold text-on-surface truncate">{{ $rdv->patient->name ?? 'Patient inconnu' }}</p>
                    <p class="text-sm text-on-surface-variant truncate">{{ $rdv->motif ?? 'Consultation générale' }}</p>
                </div>
                <div class="text-right shrink-0">
                    <p class="text-sm font-bold text-primary">{{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}</p>
                    <p class="text-xs text-on-surface-variant">{{ \Carbon\Carbon::parse($rdv->date_heure)->format('d M') }}</p>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-bold
                    {{ $rdv->statut === 'CONFIRME' ? 'bg-teal-100 text-teal-700' : '' }}
                    {{ $rdv->statut === 'EN_ATTENTE' ? 'bg-amber-100 text-amber-700' : '' }}
                    {{ $rdv->statut === 'ANNULE' ? 'bg-red-100 text-red-700' : '' }}
                    {{ !in_array($rdv->statut ?? '', ['CONFIRME','EN_ATTENTE','ANNULE']) ? 'bg-surface-container text-on-surface-variant' : '' }}
                ">
                    {{ $rdv->statut ?? 'N/A' }}
                </span>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="bg-surface-container-lowest rounded-xl p-12 text-center shadow-sm border border-outline-variant/10">
        <span class="material-symbols-outlined text-5xl text-on-surface-variant/40">event_available</span>
        <p class="mt-4 text-on-surface-variant font-medium">Aucun rendez-vous à venir cette semaine.</p>
        <p class="text-sm text-on-surface-variant/60 mt-1">Votre agenda est libre pour cette période.</p>
    </div>
    @endif

</div>
@endsection
