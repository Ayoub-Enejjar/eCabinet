@extends('layouts.doctor')

@section('content')
<section class="p-8 max-w-[1600px] mx-auto">
<div class="flex flex-col gap-8">
<!-- Hero Header Area -->
<div class="flex justify-between items-end">
<div>
<h2 class="text-4xl font-extrabold font-headline text-on-surface tracking-tight mb-2">Inventaire Médical</h2>
<p class="text-on-surface-variant flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary-container"></span>
                            Statut système : Optimal • 4 alertes de stock bas
                        </p>
</div>
<div class="flex gap-3">
<button class="px-6 py-2.5 rounded-lg bg-white shadow-sm hover:shadow-md transition-all text-sm font-semibold text-on-surface-variant flex items-center gap-2">
<span class="material-symbols-outlined text-lg" data-icon="filter_list">filter_list</span>
                            Filtrer
                        </button>
<button class="px-6 py-2.5 rounded-lg bg-white shadow-sm hover:shadow-md transition-all text-sm font-semibold text-on-surface-variant flex items-center gap-2">
<span class="material-symbols-outlined text-lg" data-icon="download">download</span>
                            Exporter
                        </button>
</div>
</div>
<!-- Bento Grid -->
<div class="grid grid-cols-12 gap-6">
<!-- Main Inventory Table -->
<div class="col-span-12 xl:col-span-8 bg-surface-container-low rounded-xl p-6 shadow-sm shadow-teal-900/5">
<div class="flex justify-between items-center mb-8">
<h3 class="text-xl font-bold font-headline">Répertoire des Stocks</h3>
<div class="flex gap-4">
<span class="flex items-center gap-2 text-xs font-semibold text-teal-700 bg-teal-50 px-3 py-1.5 rounded-full">
<span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                                    Medicaments
                                </span>
<span class="flex items-center gap-2 text-xs font-semibold text-secondary bg-secondary-container/10 px-3 py-1.5 rounded-full">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                                    Fournitures
                                </span>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-separate border-spacing-y-4">
<thead>
<tr class="text-on-surface-variant text-xs uppercase tracking-widest font-label">
<th class="pb-2 px-4 font-semibold">Produit</th>
<th class="pb-2 px-4 font-semibold">Catégorie</th>
<th class="pb-2 px-4 font-semibold">Stock Actuel</th>
<th class="pb-2 px-4 font-semibold">Niveau d'Alerte</th>
<th class="pb-2 px-4 font-semibold text-right">Statut</th>
</tr>
</thead>
<tbody>
<!-- Table Row 1 -->
<tr class="bg-surface-container-lowest rounded-xl group hover:shadow-lg hover:shadow-teal-900/5 transition-all">
<td class="py-4 px-4 rounded-l-xl">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-lg bg-teal-50 flex items-center justify-center text-teal-600">
<span class="material-symbols-outlined" data-icon="pill">pill</span>
</div>
<div>
<p class="font-bold text-on-surface">Amoxicilline 500mg</p>
<p class="text-xs text-on-surface-variant">Batch #A234-X</p>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="text-xs font-semibold px-2 py-1 rounded bg-teal-50 text-teal-700">Médicaments</span>
</td>
<td class="py-4 px-4">
<p class="font-bold text-lg">120 <span class="text-xs font-normal text-on-surface-variant">unités</span></p>
</td>
<td class="py-4 px-4">
<p class="text-sm font-medium">50 unités</p>
</td>
<td class="py-4 px-4 text-right rounded-r-xl">
<span class="inline-flex items-center gap-1.5 text-xs font-bold text-teal-600">
<span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                                                Sain
                                            </span>
</td>
</tr>
<!-- Table Row 2 (Low Stock Alert) -->
<tr class="bg-surface-container-lowest rounded-xl group hover:shadow-lg hover:shadow-teal-900/5 transition-all">
<td class="py-4 px-4 rounded-l-xl">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-lg bg-tertiary-fixed flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined" data-icon="medical_services">medical_services</span>
</div>
<div>
<p class="font-bold text-on-surface">Gants Stériles (M)</p>
<p class="text-xs text-on-surface-variant">Boîte de 50</p>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="text-xs font-semibold px-2 py-1 rounded bg-secondary-container/10 text-secondary">Fournitures</span>
</td>
<td class="py-4 px-4">
<p class="font-bold text-lg text-tertiary">8 <span class="text-xs font-normal text-on-surface-variant">boîtes</span></p>
</td>
<td class="py-4 px-4">
<p class="text-sm font-medium">15 boîtes</p>
</td>
<td class="py-4 px-4 text-right rounded-r-xl">
<span class="inline-flex items-center gap-1.5 text-xs font-bold text-tertiary">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-pulse"></span>
                                                Critique
                                            </span>
</td>
</tr>
<!-- Table Row 3 -->
<tr class="bg-surface-container-lowest rounded-xl group hover:shadow-lg hover:shadow-teal-900/5 transition-all">
<td class="py-4 px-4 rounded-l-xl">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-lg bg-teal-50 flex items-center justify-center text-teal-600">
<span class="material-symbols-outlined" data-icon="vaccines">vaccines</span>
</div>
<div>
<p class="font-bold text-on-surface">Insuline Rapide</p>
<p class="text-xs text-on-surface-variant">Conservation 4°C</p>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="text-xs font-semibold px-2 py-1 rounded bg-teal-50 text-teal-700">Médicaments</span>
</td>
<td class="py-4 px-4">
<p class="font-bold text-lg">45 <span class="text-xs font-normal text-on-surface-variant">flacons</span></p>
</td>
<td class="py-4 px-4">
<p class="text-sm font-medium">10 flacons</p>
</td>
<td class="py-4 px-4 text-right rounded-r-xl">
<span class="inline-flex items-center gap-1.5 text-xs font-bold text-teal-600">
<span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                                                Sain
                                            </span>
</td>
</tr>
<!-- Table Row 4 (Warning Alert) -->
<tr class="bg-surface-container-lowest rounded-xl group hover:shadow-lg hover:shadow-teal-900/5 transition-all">
<td class="py-4 px-4 rounded-l-xl">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-orange-600">
<span class="material-symbols-outlined" data-icon="fluid_med">fluid_med</span>
</div>
<div>
<p class="font-bold text-on-surface">Sérum Physiologique</p>
<p class="text-xs text-on-surface-variant">Poches de 500ml</p>
</div>
</div>
</td>
<td class="py-4 px-4">
<span class="text-xs font-semibold px-2 py-1 rounded bg-secondary-container/10 text-secondary">Fournitures</span>
</td>
<td class="py-4 px-4">
<p class="font-bold text-lg text-orange-600">22 <span class="text-xs font-normal text-on-surface-variant">poches</span></p>
</td>
<td class="py-4 px-4">
<p class="text-sm font-medium">25 poches</p>
</td>
<td class="py-4 px-4 text-right rounded-r-xl">
<span class="inline-flex items-center gap-1.5 text-xs font-bold text-orange-600">
<span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                                                À Surveiller
                                            </span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Sidebar Stats & Insights -->
<div class="col-span-12 xl:col-span-4 space-y-6">
<!-- Consommation Graph (Simplified visual) -->
<div class="bg-white rounded-xl p-6 shadow-sm border border-surface-container-high/50">
<div class="flex justify-between items-center mb-6">
<h3 class="text-lg font-bold font-headline">Consommation (7j)</h3>
<span class="text-xs text-teal-600 font-bold bg-teal-50 px-2 py-1 rounded">+12% vs sem. dernière</span>
</div>
<div class="h-48 flex items-end justify-between gap-2 px-2">
<div class="w-full bg-surface-container-high rounded-t-lg transition-all hover:bg-teal-200" style="height: 40%"></div>
<div class="w-full bg-surface-container-high rounded-t-lg transition-all hover:bg-teal-200" style="height: 65%"></div>
<div class="w-full bg-surface-container-high rounded-t-lg transition-all hover:bg-teal-200" style="height: 50%"></div>
<div class="w-full bg-primary rounded-t-lg" style="height: 85%"></div>
<div class="w-full bg-surface-container-high rounded-t-lg transition-all hover:bg-teal-200" style="height: 60%"></div>
<div class="w-full bg-surface-container-high rounded-t-lg transition-all hover:bg-teal-200" style="height: 75%"></div>
<div class="w-full bg-surface-container-high rounded-t-lg transition-all hover:bg-teal-200" style="height: 55%"></div>
</div>
<div class="flex justify-between mt-4 text-[10px] text-on-surface-variant font-medium uppercase tracking-widest">
<span>Lun</span>
<span>Mar</span>
<span>Mer</span>
<span class="text-primary font-bold">Jeu</span>
<span>Ven</span>
<span>Sam</span>
<span>Dim</span>
</div>
</div>
<!-- Alerts Summary -->
<div class="bg-surface-container-highest/30 rounded-xl p-6 border border-surface-container-high">
<h3 class="text-lg font-bold font-headline mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-tertiary" data-icon="report_problem">report_problem</span>
                                Alertes de Stock
                            </h3>
<div class="space-y-4">
<div class="flex items-center justify-between p-3 bg-white/50 rounded-lg border border-tertiary/10">
<div class="flex items-center gap-3">
<div class="w-2 h-2 rounded-full bg-tertiary"></div>
<span class="text-sm font-medium">Gants Stériles (M)</span>
</div>
<span class="text-xs font-bold text-tertiary">-46% sous seuil</span>
</div>
<div class="flex items-center justify-between p-3 bg-white/50 rounded-lg border border-orange-500/10">
<div class="flex items-center gap-3">
<div class="w-2 h-2 rounded-full bg-orange-500"></div>
<span class="text-sm font-medium">Sérum Physiologique</span>
</div>
<span class="text-xs font-bold text-orange-600">-12% sous seuil</span>
</div>
<div class="flex items-center justify-between p-3 bg-white/50 rounded-lg border border-orange-500/10">
<div class="flex items-center gap-3">
<div class="w-2 h-2 rounded-full bg-orange-500"></div>
<span class="text-sm font-medium">Cathéters 22G</span>
</div>
<span class="text-xs font-bold text-orange-600">-5% sous seuil</span>
</div>
</div>
<button class="w-full mt-6 py-2.5 rounded-lg border border-primary text-primary text-xs font-bold uppercase tracking-widest hover:bg-primary/5 transition-all">
                                Consulter le plan de commande
                            </button>
</div>
<!-- Mini Heatmap Inventory -->
<div class="bg-gradient-to-br from-teal-900 to-teal-950 rounded-xl p-6 text-white overflow-hidden relative group">
<div class="absolute -right-12 -bottom-12 w-48 h-48 bg-teal-500/10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
<h3 class="text-lg font-bold font-headline mb-4 relative z-10">Optimisation IA</h3>
<p class="text-teal-100/70 text-sm mb-6 relative z-10">Sur la base de vos rendez-vous de la semaine prochaine, nous recommandons d'augmenter le stock de seringues 2ml.</p>
<div class="grid grid-cols-4 gap-2 relative z-10">
<div class="h-8 rounded bg-teal-400/20"></div>
<div class="h-8 rounded bg-teal-400/40"></div>
<div class="h-8 rounded bg-teal-400/20"></div>
<div class="h-8 rounded bg-teal-400/60"></div>
<div class="h-8 rounded bg-teal-400/80"></div>
<div class="h-8 rounded bg-teal-400/20"></div>
<div class="h-8 rounded bg-teal-400/40"></div>
<div class="h-8 rounded bg-primary-fixed"></div>
</div>
<button class="mt-6 text-xs font-bold text-primary-fixed hover:underline flex items-center gap-2">
                                Voir les prédictions
                                <span class="material-symbols-outlined text-sm" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
</section>

@endsection
