@extends('layouts.doctor')

@section('content')
<div class="px-8 space-y-12">
<!-- Grid Layout for Settings Sections -->
<div class="grid grid-cols-12 gap-8 items-start">
<!-- LEFT COLUMN: Horaires & Thème -->
<div class="col-span-12 lg:col-span-7 space-y-8">
<!-- Section: Configuration des Horaires -->
<section class="bg-surface-container-low p-8 rounded-xl space-y-6">
<div class="flex items-center justify-between">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">schedule</span>
</div>
<div>
<h3 class="text-xl font-bold font-headline">Configuration des Horaires</h3>
<p class="text-sm text-on-surface-variant">Définissez vos créneaux de consultation standard</p>
</div>
</div>
</div>
<div class="grid gap-4">
<!-- Day Row -->
<div class="flex items-center justify-between p-4 bg-surface-container-lowest rounded-xl">
<div class="flex items-center gap-3 w-32">
<input checked="" class="rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
<span class="font-semibold">Lundi</span>
</div>
<div class="flex items-center gap-4">
<input class="bg-surface-container px-3 py-2 rounded-lg border-none text-sm font-medium" type="time" value="09:00">
<span class="text-outline-variant">—</span>
<input class="bg-surface-container px-3 py-2 rounded-lg border-none text-sm font-medium" type="time" value="18:30">
</div>
<button class="text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined text-xl">more_vert</span>
</button>
</div>
<!-- Day Row -->
<div class="flex items-center justify-between p-4 bg-surface-container-lowest rounded-xl">
<div class="flex items-center gap-3 w-32">
<input checked="" class="rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
<span class="font-semibold">Mardi</span>
</div>
<div class="flex items-center gap-4">
<input class="bg-surface-container px-3 py-2 rounded-lg border-none text-sm font-medium" type="time" value="09:00">
<span class="text-outline-variant">—</span>
<input class="bg-surface-container px-3 py-2 rounded-lg border-none text-sm font-medium" type="time" value="18:30">
</div>
<button class="text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined text-xl">more_vert</span>
</button>
</div>
<!-- Day Row with Pause -->
<div class="flex flex-col gap-3 p-4 bg-surface-container-lowest rounded-xl border-l-4 border-primary/20">
<div class="flex items-center justify-between">
<div class="flex items-center gap-3 w-32">
<input checked="" class="rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
<span class="font-semibold">Mercredi</span>
</div>
<div class="flex items-center gap-4">
<input class="bg-surface-container px-3 py-2 rounded-lg border-none text-sm font-medium" type="time" value="09:00">
<span class="text-outline-variant">—</span>
<input class="bg-surface-container px-3 py-2 rounded-lg border-none text-sm font-medium" type="time" value="12:00">
</div>
<span class="text-[10px] font-bold text-primary uppercase tracking-tighter bg-primary/10 px-2 py-1 rounded">Mi-temps</span>
</div>
</div>
</div>
<div class="pt-4 border-t border-outline-variant/10">
<h4 class="text-sm font-bold mb-3 uppercase tracking-widest text-on-surface-variant">Pauses récurrentes</h4>
<div class="flex flex-wrap gap-3">
<div class="flex items-center gap-2 bg-secondary-fixed/30 text-on-secondary-fixed px-3 py-2 rounded-full text-xs font-medium">
<span class="material-symbols-outlined text-sm">lunch_dining</span>
<span>Déjeuner (12:30 - 13:30)</span>
<button class="hover:text-error transition-colors"><span class="material-symbols-outlined text-xs">close</span></button>
</div>
<button class="flex items-center gap-2 border-2 border-dashed border-outline-variant/30 text-outline-variant px-3 py-2 rounded-full text-xs font-medium hover:border-primary hover:text-primary transition-all">
<span class="material-symbols-outlined text-sm">add</span>
<span>Ajouter une pause</span>
</button>
</div>
</div>
</section>
<!-- Section: Thème -->
<section class="bg-surface-container-low p-8 rounded-xl space-y-6">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary">
<span class="material-symbols-outlined">palette</span>
</div>
<div>
<h3 class="text-xl font-bold font-headline">Apparence du cabinet</h3>
<p class="text-sm text-on-surface-variant">Personnalisez votre interface de travail</p>
</div>
</div>
<div class="grid grid-cols-2 gap-4">
<label class="cursor-pointer group relative">
<input checked="" class="peer sr-only" name="theme" type="radio">
<div class="border-2 border-transparent peer-checked:border-primary bg-surface-container-lowest p-4 rounded-xl transition-all hover:bg-white flex flex-col gap-4">
<div class="w-full h-24 rounded-lg bg-slate-50 overflow-hidden relative border border-slate-100">
<div class="absolute top-2 left-2 right-2 h-3 bg-slate-200 rounded"></div>
<div class="absolute top-7 left-2 w-1/2 h-2 bg-slate-200 rounded"></div>
<div class="absolute bottom-2 left-2 right-2 h-10 bg-white rounded-md shadow-sm border border-slate-100"></div>
</div>
<div class="flex items-center justify-between">
<span class="font-semibold text-sm">Mode Clair</span>
<span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100">check_circle</span>
</div>
</div>
</label>
<label class="cursor-pointer group relative">
<input class="peer sr-only" name="theme" type="radio">
<div class="border-2 border-transparent peer-checked:border-primary bg-surface-container-lowest p-4 rounded-xl transition-all hover:bg-white flex flex-col gap-4">
<div class="w-full h-24 rounded-lg bg-slate-900 overflow-hidden relative border border-slate-800">
<div class="absolute top-2 left-2 right-2 h-3 bg-slate-800 rounded"></div>
<div class="absolute top-7 left-2 w-1/2 h-2 bg-slate-800 rounded"></div>
<div class="absolute bottom-2 left-2 right-2 h-10 bg-slate-800 rounded-md shadow-sm border border-slate-700"></div>
</div>
<div class="flex items-center justify-between">
<span class="font-semibold text-sm">Mode Sombre</span>
<span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100">check_circle</span>
</div>
</div>
</label>
</div>
</section>
</div>
<!-- RIGHT COLUMN: Sécurité & Notifications -->
<div class="col-span-12 lg:col-span-5 space-y-8">
<!-- Section: Sécurité -->
<section class="bg-surface-container-low p-8 rounded-xl space-y-6">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-xl bg-tertiary/10 flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined">security</span>
</div>
<div>
<h3 class="text-xl font-bold font-headline">Sécurité</h3>
<p class="text-sm text-on-surface-variant">Protégez l'accès à vos données patients</p>
</div>
</div>
<div class="space-y-4">
<button class="w-full flex items-center justify-between p-4 bg-surface-container-lowest rounded-xl hover:bg-white transition-all group">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">lock_reset</span>
<span class="text-sm font-semibold">Changer le mot de passe</span>
</div>
<span class="material-symbols-outlined text-on-surface-variant">chevron_right</span>
</button>
<div class="p-4 bg-surface-container-lowest rounded-xl flex items-start gap-3">
<div class="flex-1">
<div class="flex items-center justify-between mb-1">
<span class="text-sm font-semibold">Double authentification (2FA)</span>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox">
<div class="w-11 h-6 bg-surface-container-highest rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
</label>
</div>
<p class="text-xs text-on-surface-variant">Sécurisez votre compte avec une application d'authentification.</p>
</div>
</div>
<div class="p-4 bg-error-container/20 rounded-xl flex items-center justify-between">
<div class="flex flex-col">
<span class="text-sm font-bold text-on-error-container">Sessions actives</span>
<span class="text-xs text-on-error-container/60">Connecté sur 2 appareils</span>
</div>
<button class="text-xs font-bold text-error uppercase hover:underline">Tout déconnecter</button>
</div>
</div>
</section>
<!-- Section: Notifications -->
<section class="bg-surface-container-low p-8 rounded-xl space-y-6">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">notifications_active</span>
</div>
<div>
<h3 class="text-xl font-bold font-headline">Préférences de Notification</h3>
<p class="text-sm text-on-surface-variant">Gérez comment nous vous contactons</p>
</div>
</div>
<div class="space-y-6">
<div class="space-y-3">
<h4 class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">Rappels de rendez-vous</h4>
<div class="flex items-center justify-between">
<span class="text-sm">Notifications Push</span>
<input checked="" class="w-5 h-5 text-primary bg-surface-container-highest border-none rounded focus:ring-primary" type="checkbox">
</div>
<div class="flex items-center justify-between">
<span class="text-sm">Email quotidien</span>
<input checked="" class="w-5 h-5 text-primary bg-surface-container-highest border-none rounded focus:ring-primary" type="checkbox">
</div>
</div>
<div class="space-y-3 pt-4 border-t border-outline-variant/10">
<h4 class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">Alertes Inventaire</h4>
<div class="flex items-center justify-between">
<span class="text-sm">Stock critique</span>
<input checked="" class="w-5 h-5 text-primary bg-surface-container-highest border-none rounded focus:ring-primary" type="checkbox">
</div>
<div class="flex items-center justify-between">
<span class="text-sm">Expiration proche</span>
<input class="w-5 h-5 text-primary bg-surface-container-highest border-none rounded focus:ring-primary" type="checkbox">
</div>
</div>
</div>
</section>
<!-- Final Action Bento -->
<div class="bg-gradient-to-br from-teal-800 to-teal-900 rounded-2xl p-6 text-white shadow-xl shadow-teal-900/20 relative overflow-hidden">
<div class="relative z-10">
<p class="text-xs font-bold uppercase tracking-widest text-teal-300/80 mb-2">Centre de contrôle</p>
<h4 class="text-lg font-bold mb-4">Besoin d'aide pour configurer votre cabinet ?</h4>
<button class="w-full bg-white text-teal-900 py-3 rounded-xl font-bold text-sm shadow-lg hover:scale-[1.02] active:scale-95 transition-all">
                                    Consulter le guide pratique
                                </button>
</div>
<div class="absolute -right-4 -bottom-4 opacity-10">
<span class="material-symbols-outlined text-[120px]" style="font-variation-settings: 'FILL' 1;">medical_services</span>
</div>
</div>
</div>
</div>
<!-- Sticky Footer Save -->
<div class="sticky bottom-8 flex justify-end gap-4">
<button class="px-8 py-4 text-on-surface-variant font-bold hover:text-on-surface transition-colors">Réinitialiser</button>
<button class="px-10 py-4 bg-gradient-to-r from-primary to-primary-container text-white rounded-xl font-bold shadow-xl shadow-primary/20 hover:shadow-primary/30 active:scale-95 transition-all flex items-center gap-2">
<span class="material-symbols-outlined text-xl">save</span>
                        Enregistrer les modifications
                    </button>
</div>
</div>

@endsection
