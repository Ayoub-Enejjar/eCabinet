@extends('layouts.doctor')

@section('content')
<div class="flex-1 flex overflow-hidden">
<!-- Patient Feed (Center) -->
<div class="flex-1 overflow-y-auto px-10 py-8 bg-background">
<!-- Patient Header Hero -->
<section class="mb-10 flex items-end justify-between">
<div class="flex items-center gap-6">
<div class="w-24 h-24 rounded-3xl overflow-hidden border-4 border-white shadow-xl rotate-3">
<img alt="Claire Marchand" class="w-full h-full object-cover" data-alt="Portrait of a sophisticated middle-aged woman with kind eyes and short brown hair, gentle natural lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDKLFexBXtTyQvq7weoIwunn7K6DukGCiTxuKY1ujq7PdqWutSL8csW4tNSBauKV_QcR6eNguv2a4RdxNgOEsh5JgWNHgua91U0zi8QEgBqzJW4-nfNZUzCXSA-YIf0VVNX8s0rKxkOgf9bmlVpUNUz0Zrb9QhheQVqIYg-Xp3OQZQWznrlIMd3htfXfmHDmFqx2aXTMq9kOips9msVLuNPROW3SX6t9kUvyltOghqRa3XmoNnFfqmOWJHdqBzDp1UqosiFIaPSGmXo">
</div>
<div>
<h1 class="text-4xl font-extrabold text-on-surface tracking-tight font-headline">Mme. Claire Marchand</h1>
<div class="flex gap-4 mt-2">
<span class="px-3 py-1 bg-primary-fixed text-on-primary-fixed rounded-full text-xs font-bold uppercase tracking-widest">ID: #CM-9821</span>
<span class="flex items-center gap-1 text-on-surface-variant text-sm font-medium">
<span class="material-symbols-outlined text-base">calendar_today</span>
                                    42 ans (12 Mars 1982)
                                </span>
</div>
</div>
</div>
<div class="flex gap-2">
<button class="px-4 py-2 bg-white text-on-surface text-sm font-semibold rounded-xl shadow-sm border border-slate-100 hover:bg-slate-50 active:scale-95 transition-all">Télécharger Dossier</button>
<button class="px-4 py-2 bg-primary text-on-primary text-sm font-semibold rounded-xl shadow-lg shadow-primary/20 hover:opacity-90 active:scale-95 transition-all">Modifier Fiche</button>
</div>
</section>
<!-- Navigation Tabs -->
<nav class="flex gap-8 mb-8 border-b-0">
<button class="pb-4 text-on-surface-variant font-medium text-sm hover:text-primary transition-colors relative">Chronologie</button>
<button class="pb-4 text-primary font-bold text-sm relative">
                        Analyses
                        <span class="absolute bottom-0 left-0 w-full h-1 bg-primary rounded-full"></span>
</button>
<button class="pb-4 text-on-surface-variant font-medium text-sm hover:text-primary transition-colors relative">Rapports</button>
</nav>
<!-- Analysis Dashboard (Bento Grid) -->
<div class="grid grid-cols-12 gap-6">
<!-- Main Results List -->
<div class="col-span-12 lg:col-span-12 space-y-6">
<div class="bg-surface-container-lowest rounded-3xl p-8 shadow-sm border border-outline-variant/10">
<div class="flex items-center justify-between mb-8">
<div>
<h3 class="text-xl font-bold text-on-surface font-headline">Résultats de Laboratoire</h3>
<p class="text-sm text-on-surface-variant">Dernier prélèvement : 24 Mai 2024</p>
</div>
<div class="bg-surface-container-high p-2 rounded-xl flex gap-2">
<button class="px-4 py-1.5 bg-white text-primary text-xs font-bold rounded-lg shadow-sm">Vue Table</button>
<button class="px-4 py-1.5 text-on-surface-variant text-xs font-bold hover:text-primary transition-colors">Graphiques</button>
</div>
</div>
<div class="space-y-4">
<!-- Glycémie -->
<div class="group flex items-center p-4 rounded-2xl hover:bg-surface-container-low transition-colors duration-200">
<div class="w-12 h-12 rounded-xl bg-primary-fixed flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined">water_drop</span>
</div>
<div class="ml-6 flex-1 grid grid-cols-4 items-center">
<div>
<p class="font-bold text-on-surface">Glycémie à jeun</p>
<p class="text-xs text-on-surface-variant">Biochimie sanguine</p>
</div>
<div class="text-center">
<span class="text-2xl font-black text-on-surface">1.02</span>
<span class="text-xs font-medium text-on-surface-variant ml-1">g/L</span>
</div>
<div class="text-center px-4">
<div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
<div class="h-full bg-primary w-[70%]"></div>
</div>
<p class="text-[10px] text-on-surface-variant mt-1">Ref: 0.70 - 1.10</p>
</div>
<div class="text-right">
<span class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full">Normal</span>
</div>
</div>
</div>
<!-- Cholestérol -->
<div class="group flex items-center p-4 rounded-2xl hover:bg-surface-container-low transition-colors duration-200">
<div class="w-12 h-12 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary shrink-0">
<span class="material-symbols-outlined">analytics</span>
</div>
<div class="ml-6 flex-1 grid grid-cols-4 items-center">
<div>
<p class="font-bold text-on-surface">Cholestérol LDL</p>
<p class="text-xs text-on-surface-variant">Profil lipidique</p>
</div>
<div class="text-center">
<span class="text-2xl font-black text-tertiary">1.75</span>
<span class="text-xs font-medium text-on-surface-variant ml-1">g/L</span>
</div>
<div class="text-center px-4">
<div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
<div class="h-full bg-tertiary w-[90%] shadow-[0_0_8px_rgba(146,70,40,0.4)]"></div>
</div>
<p class="text-[10px] text-on-surface-variant mt-1">Ref: &lt; 1.60</p>
</div>
<div class="text-right">
<span class="px-3 py-1 bg-tertiary-fixed text-on-tertiary-fixed-variant text-xs font-bold rounded-full">Élevé</span>
</div>
</div>
</div>
<!-- Hémoglobine -->
<div class="group flex items-center p-4 rounded-2xl hover:bg-surface-container-low transition-colors duration-200">
<div class="w-12 h-12 rounded-xl bg-primary-fixed flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined">rebase_edit</span>
</div>
<div class="ml-6 flex-1 grid grid-cols-4 items-center">
<div>
<p class="font-bold text-on-surface">Hémoglobine</p>
<p class="text-xs text-on-surface-variant">Numération (NFS)</p>
</div>
<div class="text-center">
<span class="text-2xl font-black text-on-surface">13.2</span>
<span class="text-xs font-medium text-on-surface-variant ml-1">g/dL</span>
</div>
<div class="text-center px-4">
<div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
<div class="h-full bg-primary w-[55%]"></div>
</div>
<p class="text-[10px] text-on-surface-variant mt-1">Ref: 12.0 - 16.0</p>
</div>
<div class="text-right">
<span class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full">Normal</span>
</div>
</div>
</div>
<!-- Vitamine D -->
<div class="group flex items-center p-4 rounded-2xl hover:bg-surface-container-low transition-colors duration-200">
<div class="w-12 h-12 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary shrink-0">
<span class="material-symbols-outlined">wb_sunny</span>
</div>
<div class="ml-6 flex-1 grid grid-cols-4 items-center">
<div>
<p class="font-bold text-on-surface">Vitamine D (25-OH)</p>
<p class="text-xs text-on-surface-variant">Métabolisme osseux</p>
</div>
<div class="text-center">
<span class="text-2xl font-black text-secondary">22</span>
<span class="text-xs font-medium text-on-surface-variant ml-1">ng/mL</span>
</div>
<div class="text-center px-4">
<div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
<div class="h-full bg-secondary w-[30%]"></div>
</div>
<p class="text-[10px] text-on-surface-variant mt-1">Ref: 30 - 100</p>
</div>
<div class="text-right">
<span class="px-3 py-1 bg-secondary-fixed text-on-secondary-fixed-variant text-xs font-bold rounded-full">Carence</span>
</div>
</div>
</div>
</div>
</div>
<!-- Historical Context (Visual) -->
<div class="grid grid-cols-3 gap-6">
<div class="bg-surface-container-low rounded-3xl p-6">
<h4 class="text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-4">Progression Lipides</h4>
<div class="h-24 flex items-end justify-between gap-1">
<div class="w-full bg-primary/20 rounded-t-lg h-[60%]"></div>
<div class="w-full bg-primary/30 rounded-t-lg h-[75%]"></div>
<div class="w-full bg-primary/40 rounded-t-lg h-[65%]"></div>
<div class="w-full bg-primary/60 rounded-t-lg h-[90%]"></div>
<div class="w-full bg-primary rounded-t-lg h-[80%]"></div>
</div>
<p class="text-xs text-on-surface-variant mt-4 font-medium">Tendance stable sur 6 mois</p>
</div>
<div class="bg-primary text-on-primary rounded-3xl p-6 flex flex-col justify-between">
<span class="material-symbols-outlined text-3xl opacity-50">tips_and_updates</span>
<div>
<p class="text-xs font-bold opacity-80 mb-1">Recommandation</p>
<p class="text-sm font-semibold leading-relaxed">Augmenter l'apport en Vitamine D3 (1000 UI/jour).</p>
</div>
</div>
<div class="bg-white rounded-3xl p-6 border border-outline-variant/20 shadow-sm overflow-hidden relative">
<div class="absolute -right-4 -top-4 w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-slate-200 text-5xl">biotech</span>
</div>
<p class="text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Prochain Examen</p>
<p class="text-xl font-black text-on-surface">15 Juin 2024</p>
<p class="text-xs text-primary font-bold mt-1">Bilan Hépatique complet</p>
</div>
</div>
</div>
</div>
</div>
<!-- Right Sidebar (Clinical Context) -->
<aside class="w-80 bg-surface-container-low overflow-y-auto px-6 py-8 flex flex-col gap-8">
<!-- Vital Constants -->
<section>
<div class="flex items-center justify-between mb-6">
<h3 class="font-bold text-on-surface font-headline">Constantes Vitales</h3>
<span class="material-symbols-outlined text-on-surface-variant">more_horiz</span>
</div>
<div class="space-y-4">
<div class="bg-surface-container-lowest p-5 rounded-3xl shadow-sm">
<div class="flex items-center justify-between mb-3">
<span class="text-xs font-bold uppercase tracking-wider text-on-surface-variant">Tension Art.</span>
<span class="material-symbols-outlined text-primary text-xl">favorite</span>
</div>
<div class="flex items-baseline gap-1">
<span class="text-2xl font-black text-on-surface tracking-tighter">12/8</span>
<span class="text-xs font-medium text-on-surface-variant">mmHg</span>
</div>
<p class="text-[10px] text-primary font-bold mt-2">Pris à 09:15 - Optimal</p>
</div>
<div class="bg-surface-container-lowest p-5 rounded-3xl shadow-sm">
<div class="flex items-center justify-between mb-3">
<span class="text-xs font-bold uppercase tracking-wider text-on-surface-variant">Freq. Cardiaque</span>
<span class="material-symbols-outlined text-tertiary text-xl">monitor_heart</span>
</div>
<div class="flex items-baseline gap-1">
<span class="text-2xl font-black text-on-surface tracking-tighter">68</span>
<span class="text-xs font-medium text-on-surface-variant">bpm</span>
</div>
</div>
<div class="bg-surface-container-lowest p-5 rounded-3xl shadow-sm">
<div class="flex items-center justify-between mb-3">
<span class="text-xs font-bold uppercase tracking-wider text-on-surface-variant">Poids</span>
<span class="material-symbols-outlined text-secondary text-xl">scale</span>
</div>
<div class="flex items-baseline gap-1">
<span class="text-2xl font-black text-on-surface tracking-tighter">64.5</span>
<span class="text-xs font-medium text-on-surface-variant">kg</span>
</div>
<p class="text-[10px] text-on-surface-variant font-medium mt-2">IMC: 21.8 - Normal</p>
</div>
</div>
</section>
<!-- Active Prescriptions -->
<section>
<h3 class="font-bold text-on-surface font-headline mb-6">Prescriptions Actives</h3>
<div class="space-y-3">
<div class="p-4 bg-white/60 rounded-2xl border border-outline-variant/10">
<div class="flex justify-between items-start mb-1">
<p class="font-bold text-sm text-on-surface">Lisinopril 10mg</p>
<span class="px-2 py-0.5 bg-primary/10 text-primary text-[10px] font-black rounded-full">MATIN</span>
</div>
<p class="text-xs text-on-surface-variant">1 comprimé par jour au petit-déjeuner</p>
<div class="mt-3 h-1 w-full bg-slate-100 rounded-full overflow-hidden">
<div class="h-full bg-primary w-[45%]"></div>
</div>
<p class="text-[10px] text-on-surface-variant mt-1">12/30 jours restants</p>
</div>
<div class="p-4 bg-white/60 rounded-2xl border border-outline-variant/10">
<div class="flex justify-between items-start mb-1">
<p class="font-bold text-sm text-on-surface">Vitamine D3 1000 UI</p>
<span class="px-2 py-0.5 bg-secondary/10 text-secondary text-[10px] font-black rounded-full">MATIN</span>
</div>
<p class="text-xs text-on-surface-variant">Complément quotidien</p>
</div>
<button class="w-full py-3 border-2 border-dashed border-outline-variant/30 rounded-2xl text-on-surface-variant text-xs font-bold hover:bg-white transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">add</span>
                            Ajouter Ordonnance
                        </button>
</div>
</section>
<!-- Patient Note (Small Widget) -->
<section class="mt-auto">
<div class="bg-primary-fixed/30 p-5 rounded-3xl">
<p class="text-xs font-bold text-on-primary-fixed-variant mb-2 flex items-center gap-1">
<span class="material-symbols-outlined text-sm">sticky_note_2</span>
                            Note du Praticien
                        </p>
<p class="text-xs italic text-on-primary-fixed-variant/80 leading-relaxed">
                            "Mme Marchand rapporte une fatigue persistante. Surveiller la Vitamine D lors du prochain contrôle."
                        </p>
</div>
</section>
</aside>
</div>

@endsection
