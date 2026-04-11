@extends('layouts.doctor')

@section('content')
<div class="p-8 max-w-7xl mx-auto w-full space-y-12">
<!-- Hero Section: Personal Information -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<!-- Profile Card -->
<div class="lg:col-span-4 bg-surface-container-lowest rounded-xl p-8 shadow-[0_10px_30px_-5px_rgba(0,106,97,0.05)] flex flex-col items-center text-center">
<div class="relative mb-6">
<div class="w-40 h-40 rounded-3xl overflow-hidden shadow-2xl ring-4 ring-primary-fixed">
<img alt="Photo de profil du médecin" class="w-full h-full object-cover" data-alt="Close up professional portrait of a doctor with glasses and a medical scrub, neutral clinical background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCP2I7tBaG0he_CImwh-RHkfNvADGA-1a0dBphPkNkaSq9rf2bhk6Izbx63GVAa7Aae3MBQDZdd2LfwIWI73yvxUVw6EuBysIqvlq4IOEHNWHiqRHxaZChyeANteAk8rtKEvv53s6uPPXfPs5pYJwDyJi0FvRSQC_U5DEEZ1ESau_RZRS1JbUHReXqK3-_Q96LtsveeVVPFU0jSZ5UMZCj5ruvccHfllO2Tc3rVqTp9z7SsHwrCxaZn2d9zMNTIegbum1IDtPIRa-VG">
</div>
<button class="absolute -bottom-2 -right-2 bg-primary text-on-primary p-2 rounded-full shadow-lg hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-sm">photo_camera</span>
</button>
</div>
<h3 class="text-2xl font-bold font-headline text-on-surface mb-1">Dr. Marc-Antoine Sanctuary</h3>
<p class="text-primary font-medium mb-6">Chirurgie Orthopédique &amp; Traumatologie</p>
<div class="w-full space-y-4 pt-6 border-t border-surface-container">
<div class="flex items-center gap-4 px-4 py-2">
<span class="material-symbols-outlined text-outline">mail</span>
<div class="text-left">
<p class="text-[10px] uppercase tracking-wider text-outline-variant font-bold">Email Professionnel</p>
<p class="text-sm font-medium">m.sanctuary@ecabinet.com</p>
</div>
</div>
<div class="flex items-center gap-4 px-4 py-2">
<span class="material-symbols-outlined text-outline">phone_iphone</span>
<div class="text-left">
<p class="text-[10px] uppercase tracking-wider text-outline-variant font-bold">Téléphone</p>
<p class="text-sm font-medium">+33 6 12 34 56 78</p>
</div>
</div>
</div>
<button class="mt-8 w-full py-3 bg-secondary-container/10 text-secondary rounded-lg font-semibold hover:bg-secondary-container/20 transition-colors">
                        Modifier les informations
                    </button>
</div>
<!-- Bento Grid Sections -->
<div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Specialities Card -->
<div class="bg-surface-container-low rounded-xl p-6 flex flex-col">
<div class="flex items-center justify-between mb-6">
<h4 class="text-lg font-bold font-headline flex items-center gap-2">
<span class="material-symbols-outlined text-primary">stethoscope</span>
                                Spécialités Médicales
                            </h4>
<span class="material-symbols-outlined text-outline-variant cursor-pointer hover:text-primary transition-colors">edit_note</span>
</div>
<div class="flex flex-wrap gap-2">
<span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full border border-primary/20">Chirurgie du Genou</span>
<span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full border border-primary/20">Médecine du Sport</span>
<span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full border border-primary/20">Arthroscopie</span>
<span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full border border-primary/20">Micro-chirurgie</span>
</div>
<div class="mt-6 flex-1 bg-surface-container-lowest/50 rounded-lg p-4 italic text-sm text-on-surface-variant leading-relaxed">
                            "Expert reconnu en reconstruction ligamentaire et prothèses assistées par robot."
                        </div>
</div>
<!-- Diplomas & Formations -->
<div class="bg-surface-container-low rounded-xl p-6">
<div class="flex items-center justify-between mb-6">
<h4 class="text-lg font-bold font-headline flex items-center gap-2">
<span class="material-symbols-outlined text-primary">school</span>
                                Diplômes et Formations
                            </h4>
<span class="material-symbols-outlined text-outline-variant cursor-pointer hover:text-primary transition-colors">add_circle</span>
</div>
<ul class="space-y-4">
<li class="flex gap-4">
<div class="w-1 h-12 bg-primary/30 rounded-full mt-1"></div>
<div>
<p class="text-sm font-bold">Doctorat d'État en Médecine</p>
<p class="text-xs text-outline">Faculté de Médecine de Paris • 2012</p>
</div>
</li>
<li class="flex gap-4">
<div class="w-1 h-12 bg-primary/30 rounded-full mt-1"></div>
<div>
<p class="text-sm font-bold">D.E.S.C Chirurgie Orthopédique</p>
<p class="text-xs text-outline">Hôpital de la Pitié-Salpêtrière • 2015</p>
</div>
</li>
<li class="flex gap-4">
<div class="w-1 h-12 bg-primary/30 rounded-full mt-1"></div>
<div>
<p class="text-sm font-bold">Spécialisation Robotique Mako</p>
<p class="text-xs text-outline">London Medical Institute • 2021</p>
</div>
</li>
</ul>
</div>
<!-- Digital Signature -->
<div class="md:col-span-2 bg-surface-container-low rounded-xl p-6">
<div class="flex items-center justify-between mb-6">
<h4 class="text-lg font-bold font-headline flex items-center gap-2">
<span class="material-symbols-outlined text-primary">draw</span>
                                Signature Numérique
                            </h4>
<div class="flex gap-2">
<button class="text-xs font-bold text-primary flex items-center gap-1 hover:underline">
<span class="material-symbols-outlined text-sm">refresh</span>
                                    Réinitialiser
                                </button>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
<div class="md:col-span-2 h-40 bg-white rounded-lg border-2 border-dashed border-outline-variant/30 flex items-center justify-center relative overflow-hidden group">
<img alt="Signature numérique du médecin" class="max-h-24 object-contain opacity-80 mix-blend-multiply" data-alt="Elegant handwritten script signature in dark blue ink on white paper, minimalist and professional" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBocTgqLVkqda_WbpwId5PZhBayFY9iYWzIWx9Ad8Sld2ahBjhkMCIRfXbIZFZTfY1l8L5HG0K6qRTL2FZ8fLmvOd9j1En_Jg9aLRYbSn2h_lDPtNQw9l0X5kTcmbXN3YKHnfx47plYHbxRqrdoq_cDU1lUCksbreTdb0DTjbuomRa0simsgde8mwOsM4QNbzB-zefVdg0BmtlEMLPCQuc1K_BLwj_Xb8TBwUHH2bt62B9lGbRyGJ8InRjIQjuiIm4n3riYOFfudMGV">
<div class="absolute inset-0 bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
<span class="bg-white/90 px-4 py-2 rounded-full text-xs font-bold text-primary shadow-sm cursor-pointer">Cliquer pour signer de nouveau</span>
</div>
</div>
<div class="space-y-4">
<div class="bg-surface-container-highest/50 p-4 rounded-lg">
<div class="flex items-center gap-2 mb-2">
<span class="material-symbols-outlined text-teal-600 text-sm" style="font-variation-settings: 'FILL' 1;">verified</span>
<p class="text-[10px] uppercase tracking-wider font-bold text-teal-800">Status : Certifiée</p>
</div>
<p class="text-[11px] text-on-surface-variant leading-relaxed">
                                        Signature sécurisée et conforme aux normes européennes de prescription électronique (eIDAS).
                                    </p>
</div>
<div class="flex items-center gap-2 text-outline text-[11px]">
<span class="material-symbols-outlined text-sm">event_available</span>
                                    Dernière mise à jour : 14 Sept 2023
                                </div>
</div>
</div>
</div>
</div>
</section>
<!-- Footer Section / Quick Actions -->
<footer class="flex flex-col md:flex-row items-center justify-between gap-6 pt-12 border-t border-surface-container">
<div class="flex items-center gap-4">
<div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
<span class="material-symbols-outlined">security</span>
</div>
<div>
<p class="text-sm font-bold">Sécurité du Compte</p>
<p class="text-xs text-outline">Authentification à deux facteurs activée</p>
</div>
</div>
<div class="flex gap-4">
<button class="px-6 py-3 rounded-lg border border-outline-variant text-outline text-sm font-semibold hover:bg-surface-container-high transition-colors">
                        Journal d'activité
                    </button>
<button class="px-8 py-3 bg-gradient-to-r from-primary to-primary-container text-on-primary rounded-lg font-bold shadow-[0_4px_15px_-3px_rgba(0,106,97,0.4)] hover:scale-[1.02] active:scale-95 transition-all">
                        Enregistrer les modifications
                    </button>
</div>
</footer>
</div>

@endsection
