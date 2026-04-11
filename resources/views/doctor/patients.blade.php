@extends('layouts.doctor')

@section('content')
<div class="p-8 pt-24 max-w-7xl mx-auto">
<!-- Page Header -->
<div class="flex justify-between items-end mb-10">
<div>
<h2 class="text-3xl font-extrabold text-on-surface tracking-tight mb-2">Répertoire des Patients</h2>
<p class="text-on-surface-variant flex items-center gap-2">
<span class="material-symbols-outlined text-teal-600" data-icon="analytics">analytics</span>
                        142 patients actifs sous votre supervision
                    </p>
</div>
<div class="flex gap-3">
<button class="px-5 py-2.5 rounded-lg bg-surface-container-low text-secondary font-semibold text-sm hover:bg-surface-container transition-colors">
                        Exporter (.CSV)
                    </button>
<button class="px-5 py-2.5 rounded-lg bg-primary text-on-primary font-semibold text-sm flex items-center gap-2 shadow-lg shadow-primary/10">
<span class="material-symbols-outlined text-sm" data-icon="person_add">person_add</span>
                        Nouvelle Fiche
                    </button>
</div>
</div>
<!-- Bento Grid Stats Section -->
<div class="grid grid-cols-4 gap-6 mb-8">
<div class="col-span-1 bg-surface-container-lowest p-6 rounded-xl shadow-sm shadow-teal-900/5">
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-4">Urgences</p>
<div class="flex items-end justify-between">
<span class="text-4xl font-bold text-tertiary">03</span>
<div class="h-10 w-10 rounded-full bg-tertiary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-tertiary" data-icon="priority_high">priority_high</span>
</div>
</div>
</div>
<div class="col-span-1 bg-surface-container-lowest p-6 rounded-xl shadow-sm shadow-teal-900/5">
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-4">Visites ce jour</p>
<div class="flex items-end justify-between">
<span class="text-4xl font-bold text-primary">12</span>
<div class="h-10 w-10 rounded-full bg-primary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-primary" data-icon="event_available">event_available</span>
</div>
</div>
</div>
<div class="col-span-2 bg-gradient-to-br from-secondary/10 to-primary/5 p-6 rounded-xl border border-primary/5 relative overflow-hidden">
<div class="relative z-10">
<p class="text-xs font-bold text-secondary uppercase tracking-wider mb-4">Taux de Satisfaction</p>
<div class="flex items-center gap-4">
<span class="text-4xl font-bold text-on-surface">98%</span>
<div class="flex-1 h-2 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary w-[98%] shadow-[0_0_8px_rgba(0,104,95,0.4)]"></div>
</div>
</div>
</div>
<span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl text-primary/5 opacity-20" data-icon="medical_services">medical_services</span>
</div>
</div>
<!-- Patient Table Section -->
<div class="bg-surface-container-low rounded-xl overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-high/50">
<th class="px-6 py-4 text-xs font-bold text-on-surface-variant uppercase tracking-widest">Nom</th>
<th class="px-6 py-4 text-xs font-bold text-on-surface-variant uppercase tracking-widest">Date de Naissance</th>
<th class="px-6 py-4 text-xs font-bold text-on-surface-variant uppercase tracking-widest text-center">Gr. Sanguin</th>
<th class="px-6 py-4 text-xs font-bold text-on-surface-variant uppercase tracking-widest">Dernière Visite</th>
<th class="px-6 py-4 text-xs font-bold text-on-surface-variant uppercase tracking-widest">Statut</th>
<th class="px-6 py-4 text-xs font-bold text-on-surface-variant uppercase tracking-widest text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container-high/30">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed font-bold">JD</div>
<div>
<p class="font-bold text-on-surface leading-tight">Julien Dupont</p>
<p class="text-[10px] text-slate-400">ID: #CS-8892</p>
</div>
</div>
</td>
<td class="px-6 py-5 text-sm text-on-surface-variant">14 Mai 1985</td>
<td class="px-6 py-5 text-center">
<span class="px-3 py-1 rounded-full text-xs font-bold bg-error-container text-on-error-container">O-</span>
</td>
<td class="px-6 py-5 text-sm text-on-surface-variant">Hier, 14:20</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-primary-fixed/50 text-on-primary-fixed-variant">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Suivi Régulier
                                    </span>
</td>
<td class="px-6 py-5 text-right">
<button class="text-secondary font-bold text-sm px-4 py-2 rounded-lg group-hover:bg-secondary-container/10 transition-all">Voir Dossier</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed font-bold">SM</div>
<div>
<p class="font-bold text-on-surface leading-tight">Sophie Martin</p>
<p class="text-[10px] text-slate-400">ID: #CS-1240</p>
</div>
</div>
</td>
<td class="px-6 py-5 text-sm text-on-surface-variant">22 Nov 1992</td>
<td class="px-6 py-5 text-center">
<span class="px-3 py-1 rounded-full text-xs font-bold bg-secondary-fixed text-on-secondary-fixed">A+</span>
</td>
<td class="px-6 py-5 text-sm text-on-surface-variant">12 Oct 2023</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-error-container/30 text-on-error-container">
<span class="w-1.5 h-1.5 rounded-full bg-error"></span> Urgent
                                    </span>
</td>
<td class="px-6 py-5 text-right">
<button class="text-secondary font-bold text-sm px-4 py-2 rounded-lg group-hover:bg-secondary-container/10 transition-all">Voir Dossier</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary-fixed-dim flex items-center justify-center text-on-primary-fixed font-bold">AL</div>
<div>
<p class="font-bold text-on-surface leading-tight">André Lefebvre</p>
<p class="text-[10px] text-slate-400">ID: #CS-0043</p>
</div>
</div>
</td>
<td class="px-6 py-5 text-sm text-on-surface-variant">02 Fév 1954</td>
<td class="px-6 py-5 text-center">
<span class="px-3 py-1 rounded-full text-xs font-bold bg-secondary-fixed text-on-secondary-fixed">B+</span>
</td>
<td class="px-6 py-5 text-sm text-on-surface-variant">Ce matin, 09:00</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-surface-container-highest text-on-surface-variant">
<span class="w-1.5 h-1.5 rounded-full bg-outline"></span> Sortie
                                    </span>
</td>
<td class="px-6 py-5 text-right">
<button class="text-secondary font-bold text-sm px-4 py-2 rounded-lg group-hover:bg-secondary-container/10 transition-all">Voir Dossier</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-orange-800 font-bold">EB</div>
<div>
<p class="font-bold text-on-surface leading-tight">Emma Bernard</p>
<p class="text-[10px] text-slate-400">ID: #CS-9912</p>
</div>
</div>
</td>
<td class="px-6 py-5 text-sm text-on-surface-variant">30 Juil 2010</td>
<td class="px-6 py-5 text-center">
<span class="px-3 py-1 rounded-full text-xs font-bold bg-secondary-fixed text-on-secondary-fixed">AB+</span>
</td>
<td class="px-6 py-5 text-sm text-on-surface-variant">05 Jan 2024</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-primary-fixed/50 text-on-primary-fixed-variant">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> En Traitement
                                    </span>
</td>
<td class="px-6 py-5 text-right">
<button class="text-secondary font-bold text-sm px-4 py-2 rounded-lg group-hover:bg-secondary-container/10 transition-all">Voir Dossier</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination Footer -->
<div class="px-8 py-4 bg-surface-container flex justify-between items-center">
<p class="text-xs text-on-surface-variant font-medium">Affichage de 1-4 sur 142 patients</p>
<div class="flex gap-2">
<button class="p-2 rounded-md hover:bg-surface-container-highest transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-md bg-primary text-on-primary text-xs font-bold">1</button>
<button class="w-8 h-8 rounded-md hover:bg-surface-container-highest text-xs font-bold">2</button>
<button class="w-8 h-8 rounded-md hover:bg-surface-container-highest text-xs font-bold">3</button>
<button class="p-2 rounded-md hover:bg-surface-container-highest transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Secondary Insight: Recent Files -->
<div class="mt-12">
<h3 class="text-xl font-bold mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-secondary" data-icon="history">history</span>
                    Dossiers récemment consultés
                </h3>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-white/40 backdrop-blur-md border border-white/20 p-5 rounded-2xl flex items-center gap-4 hover:bg-white/60 transition-all cursor-pointer">
<div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-primary" data-icon="description">description</span>
</div>
<div>
<p class="font-bold text-sm">Bilan Sanguin - J. Dupont</p>
<p class="text-[10px] text-slate-500 uppercase font-medium">Modifié il y a 2h</p>
</div>
</div>
<div class="bg-white/40 backdrop-blur-md border border-white/20 p-5 rounded-2xl flex items-center gap-4 hover:bg-white/60 transition-all cursor-pointer">
<div class="w-12 h-12 rounded-xl bg-tertiary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-tertiary" data-icon="radiology">radiology</span>
</div>
<div>
<p class="font-bold text-sm">Scanner Pulmonaire - S. Martin</p>
<p class="text-[10px] text-slate-500 uppercase font-medium">Modifié il y a 5h</p>
</div>
</div>
<div class="bg-white/40 backdrop-blur-md border border-white/20 p-5 rounded-2xl flex items-center gap-4 hover:bg-white/60 transition-all cursor-pointer">
<div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-secondary" data-icon="medication">medication</span>
</div>
<div>
<p class="font-bold text-sm">Ordonnance - A. Lefebvre</p>
<p class="text-[10px] text-slate-500 uppercase font-medium">Modifié hier</p>
</div>
</div>
</div>
</div>
</div>

@endsection
