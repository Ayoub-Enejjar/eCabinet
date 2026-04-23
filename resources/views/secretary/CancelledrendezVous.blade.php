@extends('secretary.layout')
@section('title', 'Secretary - Cancelled Appointments')

@section('content')

<?php
use App\Models\User;
?>

<div class="max-w-7xl mx-auto space-y-8">
    <!-- Page Header -->
    <div class="flex items-end justify-between gap-4 mb-4">
        <div>
            <h2 class="text-3xl font-extrabold font-headline tracking-tight text-on-surface mb-1">Cancelled Appointments</h2>
            <p class="text-on-surface-variant font-body">Database of cancelled appointments.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm font-bold bg-error-container text-on-error-container px-3 py-1 rounded-full">{{ $rendezVous->total() }} cancelled</span>
        </div>
    </div>
    
    <section class="space-y-6">
        <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_10px_30px_-5px_rgba(0,106,97,0.08)] border border-outline-variant/10">
            @if($rendezVous->count() == 0)
                <div class="p-10 text-center text-on-surface-variant font-medium">No cancelled appointments found.</div>
            @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-surface-container-low text-[10px] font-bold uppercase tracking-widest text-outline">
                        <tr>
                            <th class="px-8 py-4">Patient</th>
                            <th class="px-8 py-4">Doctor</th>
                            <th class="px-8 py-4 text-center">Date & Time</th>
                            <th class="px-8 py-4">Reason</th>
                            <th class="px-8 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/10">
                        @foreach($rendezVous as $rv)
                        <tr class="hover:bg-surface-container-low/50 transition-colors group">
                            <td class="px-8 py-4">
                                @php $rv_patient = User::find($rv->patient_id); @endphp
                                <div class="flex items-center gap-3">
                                    @if($rv_patient && $rv_patient->profile_photo_url)
                                        <img src="{{ $rv_patient->profile_photo_url }}" alt="{{ $rv_patient->name }}" class="w-8 h-8 rounded-full object-cover border-2 border-primary/10">
                                    @else
                                        <div class="w-8 h-8 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-bold text-xs uppercase">
                                            {{ substr($rv_patient->name ?? '?', 0, 2) }}
                                        </div>
                                    @endif
                                    <span class="font-bold text-sm text-on-surface">{{ $rv_patient->name ?? 'Unknown' }}</span>
                                </div>
                            </td>

                            <td class="px-8 py-4 text-sm font-semibold text-on-surface-variant italic">
                                Dr. {{ User::where('id', $rv->medecin_id)->value('name') }}
                            </td>
                            
                            <td class="px-8 py-4 text-center">
                                <span class="text-sm font-bold text-on-surface">{{ \Carbon\Carbon::parse($rv->date_heure)->format('M d, Y - H:i') }}</span>
                            </td>
                            
                            <td class="px-8 py-4">
                                <span class="text-sm font-medium text-on-surface-variant line-clamp-1">{{ $rv->motif }}</span>
                            </td>
                            
                            <td class="px-8 py-4 text-center">
                                <span class="px-3 py-1 text-[10px] font-bold rounded-full uppercase tracking-wider bg-error-container text-on-error-container">
                                    {{ $rv->statut }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($rendezVous->hasPages())
            <div class="p-4 border-t border-outline-variant/10 flex justify-center">
                {{ $rendezVous->links() }}
            </div>
            @endif
            @endif
        </div>
    </section>
</div>
@endsection
