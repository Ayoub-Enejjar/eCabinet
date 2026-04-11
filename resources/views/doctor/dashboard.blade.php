@extends('layouts.doctor')

@section('content')
<div class="p-8 mt-16 space-y-8">
<!-- Urgent Notifications Bar -->
<div class="flex items-center gap-4 p-4 bg-tertiary-fixed rounded-2xl border border-tertiary/10 shadow-sm">
<div class="w-10 h-10 rounded-full bg-tertiary/10 flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined" data-icon="warning" style="font-variation-settings: 'FILL' 1;">warning</span>
</div>
<div class="flex-1">
<p class="text-sm font-bold text-on-tertiary-fixed">Rappel de Sécurité Urgente</p>
<p class="text-xs text-on-tertiary-fixed-variant">Le stock d'Insuline Rapide (Lot B42) arrive à expiration dans 48 heures. 12 patients concernés.</p>
</div>
<button class="px-4 py-2 bg-tertiary text-on-tertiary text-xs font-bold rounded-lg hover:opacity-90 transition-opacity">
                Gérer le stock
            </button>
</div>
<!-- Header Section -->
<div class="flex justify-between items-end">
<div>
<h2 class="text-3xl font-extrabold font-headline text-on-surface tracking-tight">Bonjour, Dr. Lefebvre</h2>
<p class="text-on-surface-variant font-medium mt-1">Voici le résumé de votre activité pour ce mardi 24 octobre.</p>
</div>
<div class="flex gap-2">
<span class="px-3 py-1 bg-surface-container-low text-on-surface-variant text-xs font-semibold rounded-full flex items-center gap-2">
<span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                    En ligne
                </span>
</div>
</div>
<!-- Bento Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
<div class="md:col-span-1 bg-surface-container-lowest p-6 rounded-2xl shadow-sm shadow-teal-900/5 relative overflow-hidden group">
<div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-110 duration-500"></div>
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-4">RDV du jour</p>
<h3 class="text-5xl font-extrabold font-headline text-primary">14</h3>
<div class="mt-4 flex items-center gap-2 text-[10px] font-bold text-primary">
<span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span>
                    +12% vs hier
                </div>
</div>
<div class="md:col-span-1 bg-surface-container-lowest p-6 rounded-2xl shadow-sm shadow-teal-900/5 relative overflow-hidden group">
<div class="absolute top-0 right-0 w-32 h-32 bg-secondary/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-110 duration-500"></div>
<p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-4">Patients vus (Mois)</p>
<h3 class="text-5xl font-extrabold font-headline text-secondary">248</h3>
<div class="mt-4 flex items-center gap-2 text-[10px] font-bold text-on-surface-variant">
<span class="material-symbols-outlined text-xs" data-icon="check_circle">check_circle</span>
                    Objectif atteint à 82%
                </div>
</div>
<div class="md:col-span-2 bg-gradient-to-br from-primary to-primary-container p-6 rounded-2xl shadow-xl shadow-primary/20 text-on-primary flex flex-col justify-between">
<div>
<p class="text-xs font-bold text-primary-fixed/60 uppercase tracking-widest mb-2">Taux d'occupation</p>
<h3 class="text-4xl font-extrabold font-headline">94%</h3>
</div>
<div class="space-y-3">
<div class="flex justify-between text-xs font-medium">
<span>Capacité de consultation</span>
<span>Optimal</span>
</div>
<div class="h-2 bg-white/20 rounded-full overflow-hidden">
<div class="h-full bg-primary-fixed w-[94%] rounded-full shadow-[0_0_10px_rgba(137,245,231,0.5)]"></div>
</div>
</div>
</div>
</div>
<!-- Main Content Area: Appointments & Activity -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Appointments Section -->
<div class="lg:col-span-2 space-y-6">
<div class="flex items-center justify-between">
<h4 class="text-xl font-bold font-headline text-on-surface">Prochains Rendez-vous</h4>
<button class="text-sm font-semibold text-primary hover:underline">Voir tout le planning</button>
</div>
<div class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-sm shadow-teal-900/5">
<div class="divide-y divide-surface-container">
<!-- Appointment Row -->
<div class="p-5 flex items-center gap-6 hover:bg-surface-container-low transition-colors group">
<div class="text-center min-w-[60px]">
<p class="text-lg font-extrabold font-headline text-primary">09:30</p>
<p class="text-[10px] font-bold text-on-surface-variant uppercase">AM</p>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container-high overflow-hidden">
<img alt="Patient profile" class="w-full h-full object-cover" data-alt="Soft lighting portrait of an elderly woman with silver hair and gentle expression, blurred garden background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBqsCteYd-iYqmzwrdf1dWPl3Glb5mdg1jUv8oF4J0P2DJ3RNCIScG0Sc1_iuKOfMEhqaZpbMS4WJXHSJAj68VHhRovRNV4sL3IEhiNYH5DJ5p5c9MoesygrNvPsSkwOcR6HlZ_ZLzjPChlJJwKmC7Ilv-nPVrO9PL-NWS8odWKaevO7a5tFpxBGzg_srN3qNGifPnvLG9RJgu3BEQ5N4-EYzydstFiD8QUpH_ho8PdgCaflUg3z0AJH7EqhtxsLudsRxwaOkKLh4Ka">
</div>
<div class="flex-1">
<p class="font-bold text-on-surface">Mme. Sophie Bernard</p>
<p class="text-xs text-on-surface-variant">Suivi post-opératoire (Cardiologie)</p>
</div>
<div class="flex items-center gap-2">
<span class="px-3 py-1 bg-secondary-fixed text-on-secondary-fixed text-[10px] font-bold rounded-full uppercase tracking-tighter">En attente</span>
<button class="p-2 text-slate-300 hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</div>
</div>
<!-- Appointment Row -->
<div class="p-5 flex items-center gap-6 hover:bg-surface-container-low transition-colors group">
<div class="text-center min-w-[60px]">
<p class="text-lg font-extrabold font-headline text-on-surface-variant">10:15</p>
<p class="text-[10px] font-bold text-on-surface-variant uppercase">AM</p>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container-high overflow-hidden">
<img alt="Patient profile" class="w-full h-full object-cover" data-alt="Young man with glasses looking thoughtful in a professional portrait, warm neutral background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6JlAOU-Ib77L7Jegaq8piISU2tEee0WfWzle5oRr04LgVpQ6ZM3FhFJ1g8RKCkkC8oXpm1cwxTISb9jv2h5GymLC_CZQ56ZC2X9dpHNSOhBNaffIW21wOjZa4cyyZL2sPSmH0rDA2TDcfBL4_9Fik-15OhnokD4PGQp3uwWBYXNj4npfauOKfjPYkh51PilxU3lp6G_p77UaE6xYjTC6PTv55-3j9vG0BVzWAe_Y87yChD72jinwcBkg8-wkChzL_1jYE7Noeno8R">
</div>
<div class="flex-1">
<p class="font-bold text-on-surface">Mr. Lucas Petit</p>
<p class="text-xs text-on-surface-variant">Consultation annuelle de routine</p>
</div>
<div class="flex items-center gap-2">
<span class="px-3 py-1 bg-surface-container text-on-surface-variant text-[10px] font-bold rounded-full uppercase tracking-tighter">Programmé</span>
<button class="p-2 text-slate-300 hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</div>
</div>
<!-- Appointment Row -->
<div class="p-5 flex items-center gap-6 hover:bg-surface-container-low transition-colors group">
<div class="text-center min-w-[60px]">
<p class="text-lg font-extrabold font-headline text-on-surface-variant">11:00</p>
<p class="text-[10px] font-bold text-on-surface-variant uppercase">AM</p>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container-high overflow-hidden">
<div class="w-full h-full flex items-center justify-center bg-teal-100 text-teal-700 font-bold">EM</div>
</div>
<div class="flex-1">
<p class="font-bold text-on-surface">Emma Martin</p>
<p class="text-xs text-on-surface-variant">Vaccination pédiatrique</p>
</div>
<div class="flex items-center gap-2">
<span class="px-3 py-1 bg-surface-container text-on-surface-variant text-[10px] font-bold rounded-full uppercase tracking-tighter">Programmé</span>
<button class="p-2 text-slate-300 hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</div>
</div>
</div>
</div>
</div>
<!-- Activity Feed Section -->
<div class="space-y-6">
<div class="flex items-center justify-between">
<h4 class="text-xl font-bold font-headline text-on-surface">Activité Récente</h4>
</div>
<div class="bg-surface-container-low p-6 rounded-3xl space-y-6">
<!-- Activity Item -->
<div class="flex gap-4 relative">
<div class="absolute left-4 top-10 bottom-0 w-[1px] bg-outline-variant/30"></div>
<div class="z-10 w-8 h-8 rounded-full bg-primary-fixed flex items-center justify-center text-primary text-sm shadow-sm">
<span class="material-symbols-outlined scale-75" data-icon="description">description</span>
</div>
<div class="flex-1">
<p class="text-xs font-bold text-on-surface">Rapport Labo complété</p>
<p class="text-[11px] text-on-surface-variant mt-1 leading-relaxed">Résultats sanguins pour Jean Dupont disponibles. Taux de glycémie stabilisé.</p>
<span class="text-[10px] font-medium text-slate-400 mt-2 block">Il y a 15 min</span>
</div>
</div>
<!-- Activity Item -->
<div class="flex gap-4 relative">
<div class="absolute left-4 top-10 bottom-0 w-[1px] bg-outline-variant/30"></div>
<div class="z-10 w-8 h-8 rounded-full bg-secondary-fixed flex items-center justify-center text-secondary text-sm shadow-sm">
<span class="material-symbols-outlined scale-75" data-icon="medication">medication</span>
</div>
<div class="flex-1">
<p class="text-xs font-bold text-on-surface">Ordonnance renouvelée</p>
<p class="text-[11px] text-on-surface-variant mt-1 leading-relaxed">Traitement HTA renouvelé pour Marie Claire via portail patient.</p>
<span class="text-[10px] font-medium text-slate-400 mt-2 block">Il y a 1 heure</span>
</div>
</div>
<!-- Activity Item -->
<div class="flex gap-4">
<div class="z-10 w-8 h-8 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary text-sm shadow-sm">
<span class="material-symbols-outlined scale-75" data-icon="mail">mail</span>
</div>
<div class="flex-1">
<p class="text-xs font-bold text-on-surface">Nouveau Message</p>
<p class="text-[11px] text-on-surface-variant mt-1 leading-relaxed">Dr. Simon a envoyé un avis de transfert pour le patient Lambert.</p>
<span class="text-[10px] font-medium text-slate-400 mt-2 block">Il y a 3 heures</span>
</div>
</div>
</div>
<!-- Small Inventory Card -->
<div class="bg-surface-container-highest p-5 rounded-2xl">
<div class="flex items-center justify-between mb-4">
<p class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Stock Critique</p>
<span class="material-symbols-outlined text-tertiary text-sm" data-icon="inventory_2">inventory_2</span>
</div>
<div class="space-y-3">
<div class="flex justify-between items-center text-xs">
<span class="font-medium">Masques FFP2</span>
<span class="text-tertiary font-bold">12 unités</span>
</div>
<div class="h-1 bg-white/50 rounded-full overflow-hidden">
<div class="h-full bg-tertiary w-1/5 rounded-full"></div>
</div>
<button class="w-full mt-2 py-2 text-[10px] font-bold text-primary border border-primary/20 rounded-lg hover:bg-primary/5 transition-colors">
                            Passer commande
                        </button>
</div>
</div>
</div>
</div>
</div>

@endsection
