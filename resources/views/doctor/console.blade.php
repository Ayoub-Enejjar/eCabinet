@extends('layouts.doctor')

@section('content')
<div class="p-8 space-y-8">
<section class="bg-surface-container-lowest rounded-xl p-6 shadow-sm flex flex-col md:flex-row gap-8 items-start md:items-center">
<div class="relative">
<img alt="Photo du patient" class="w-32 h-32 rounded-2xl object-cover ring-4 ring-surface-container-low shadow-md" data-alt="Close-up portrait of an elderly woman with gentle features and gray hair, soft natural lighting, peaceful expression" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBJy6QEClgX_mKCrz_Vb5i0LytS1irpMa6R0-1Hzxf1heE3WbVqT2vQttMEW7ypljInSX6T9A3Yv7h0aD5IG2nq1PUOlgFrwhs-qP5B984w1ip8YaS0CzkU9p-y_xaoGZJPTqSZcf8S1dKg1RgnV4vGFm0FcD2WrZBeDdAtsarDL8tZD_Mj094lyH5brZAKcYvzfTIHgK2m1I5mEFXe3zmLWFvfOThraWLp6Uam_C7669ZeGcGveZhR-WI1t0jon50EMjurbyof_M1B">
<span class="absolute -bottom-2 -right-2 bg-error text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase">Allergies</span>
</div>
<div class="flex-1 space-y-4">
<div class="flex flex-wrap items-end gap-4">
<h2 class="text-3xl font-headline font-extrabold text-on-surface">Mme. Claire Marchand</h2>
<span class="bg-secondary-fixed text-on-secondary-fixed text-xs font-bold px-3 py-1 rounded-full mb-1">ID: #PT-8829</span>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
<div>
<p class="text-label-sm text-on-surface-variant text-[10px] uppercase font-semibold tracking-wider">Âge / Sexe</p>
<p class="text-on-surface font-medium">68 ans, Femme</p>
</div>
<div>
<p class="text-label-sm text-on-surface-variant text-[10px] uppercase font-semibold tracking-wider">Groupe Sanguin</p>
<p class="text-error font-bold">O- (Négatif)</p>
</div>
<div>
<p class="text-label-sm text-on-surface-variant text-[10px] uppercase font-semibold tracking-wider">Taille / Poids</p>
<p class="text-on-surface font-medium">162 cm / 58 kg</p>
</div>
<div>
<p class="text-label-sm text-on-surface-variant text-[10px] uppercase font-semibold tracking-wider">Contact</p>
<p class="text-on-surface font-medium">06 12 34 56 78</p>
</div>
</div>
<div class="bg-error-container/30 border border-error/10 p-3 rounded-lg flex items-center gap-3">
<span class="material-symbols-outlined text-error" style="font-variation-settings: 'FILL' 1;">warning</span>
<p class="text-sm text-on-error-container font-semibold">Allergies connues : Pénicilline, Arachides</p>
</div>
</div>
<div class="flex flex-col gap-3 w-full md:w-auto">
<button class="flex items-center justify-center gap-2 px-6 py-3 bg-primary text-on-primary rounded-xl font-bold text-sm shadow-md hover:bg-primary-container transition-colors">
<span class="material-symbols-outlined">add_circle</span>
                        Nouvelle Consultation
                    </button>
<button class="flex items-center justify-center gap-2 px-6 py-3 bg-surface-container-high text-on-surface-variant rounded-xl font-bold text-sm hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined">print</span>
                        Imprimer Dossier
                    </button>
</div>
</section>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<div class="lg:col-span-2 space-y-8">
<section>
<h3 class="text-xl font-headline font-bold text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">timeline</span>
                            Chronologie des visites
                        </h3>
<div class="space-y-6 relative before:absolute before:left-[11px] before:top-2 before:bottom-0 before:w-0.5 before:bg-outline-variant/30">
<div class="relative pl-10">
<div class="absolute left-0 top-1.5 w-6 h-6 rounded-full bg-primary-fixed flex items-center justify-center z-10">
<div class="w-2.5 h-2.5 rounded-full bg-primary"></div>
</div>
<div class="bg-surface-container-low rounded-xl p-5 hover:bg-surface-container transition-colors cursor-pointer group">
<div class="flex justify-between mb-2">
<span class="text-xs font-bold text-primary">12 Octobre 2023</span>
<span class="text-xs text-on-surface-variant italic">Suivi trimestriel</span>
</div>
<h4 class="font-bold text-on-surface group-hover:text-primary transition-colors">Hypertension Artérielle &amp; Rythme cardiaque</h4>
<p class="text-sm text-on-surface-variant mt-2 line-clamp-2">Patient rapporte des étourdissements légers le matin. Tension stable sous traitement actuel. Ajustement possible de l'Amlodipine...</p>
</div>
</div>
<div class="relative pl-10">
<div class="absolute left-0 top-1.5 w-6 h-6 rounded-full bg-surface-variant flex items-center justify-center z-10">
<div class="w-2.5 h-2.5 rounded-full bg-outline"></div>
</div>
<div class="bg-surface-container-low rounded-xl p-5 hover:bg-surface-container transition-colors cursor-pointer">
<div class="flex justify-between mb-2">
<span class="text-xs font-bold text-on-surface-variant">05 Juillet 2023</span>
<span class="text-xs text-on-surface-variant italic">Urgence - Douleur Thoracique</span>
</div>
<h4 class="font-bold text-on-surface">Examen Électrocardiogramme (ECG)</h4>
<p class="text-sm text-on-surface-variant mt-2">Rythme sinusal normal. Pas de signe d'ischémie aiguë. Stress émotionnel probable.</p>
</div>
</div>
</div>
</section>
<section>
<h3 class="text-xl font-headline font-bold text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">description</span>
                            Observations cliniques
                        </h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="bg-surface-container-low rounded-xl p-6 border-l-4 border-primary">
<p class="text-[10px] font-bold text-primary uppercase tracking-widest mb-3">Note de synthèse</p>
<p class="text-sm text-on-surface leading-relaxed italic">"État général satisfaisant. La patiente suit scrupuleusement son régime hygiéno-diététique. La perte de poids de 2kg est un signe encourageant pour sa tension."</p>
<div class="mt-4 pt-4 border-t border-outline-variant/20 flex items-center gap-2">
<img alt="Auteur note" class="w-6 h-6 rounded-full object-cover" data-alt="Close-up profile of a female doctor with glasses and medical attire" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuwrqoVmggNRCLYzOb--oszE7RsO7ZMuS2qrxPDXXdPm_AlLLPGVbF1ZO83jWftQp8gyIqiJUEpHdtEQLKV56ma8j664LLsDxvYdQDRFpVUi9WcO4sNzDA5pHTOsHSEs80XRZgkOysdveibXzfjSZuoW6ZOE_kqbTyXqGnJoQ4hGmJp6AiPSVK65CIQNCawHFCK1RKQLK95c8Tc2PYH65uCsHAcCbKqVOOX3mSXwVlBmnYOC9LwRnFU4T1xxc5z_VZF-9tGFquuPNs">
<span class="text-xs font-medium text-on-surface-variant">Dr. Sarah Khalifa, 14 Oct.</span>
</div>
</div>
<div class="bg-surface-container-low rounded-xl p-6 border-l-4 border-secondary">
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest mb-3">Conseil Lifestyle</p>
<p class="text-sm text-on-surface leading-relaxed italic">"Maintenir la marche quotidienne de 30 min. Surveillance accrue du sodium dans l'alimentation. Prochain contrôle biologique en Novembre."</p>
<div class="mt-4 pt-4 border-t border-outline-variant/20 flex items-center gap-2">
<img alt="Auteur note" class="w-6 h-6 rounded-full object-cover" data-alt="Professional headshot of a male doctor" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsqwV9Jz-T-CVRT-QdfsvQLJ4zUPgSyw7wzRYvmiiligYc-hy7ZhAcDULuSZIQdAkV6y1OZSPS6uoM9epuKV_z26azTis5qsFllU-IrkMhzK-7NKz9v-YcMtRFRECFiHTxJOtocaT7sTet26pLVW9SM9wUwJ1x495T-2zV46dWigddFv-dzb6cbVBngbBUfYWnRicW_I0T_F7rVPSOxOji4VJikwJoKrUQmbIM-nxaBc7SR6y1Lzf31i27KxK2jzsEP48lI7DEcCpD">
<span class="text-xs font-medium text-on-surface-variant">Dr. Jean Dupont, 12 Oct.</span>
</div>
</div>
</div>
</section>
</div>
<div class="space-y-8">
<section class="bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<h3 class="text-lg font-headline font-bold text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">monitoring</span>
                            Constantes Vitales
                        </h3>
<div class="space-y-6">
<div class="flex items-end justify-between gap-1 h-32 px-2">
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary-fixed rounded-t-sm relative group" style="height: 65%;">
<div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold opacity-0 group-hover:opacity-100 transition-opacity">13.8</div>
</div>
<span class="text-[8px] uppercase font-bold text-on-surface-variant">Lun</span>
</div>
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary-fixed rounded-t-sm relative group" style="height: 72%;">
<div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold opacity-0 group-hover:opacity-100 transition-opacity">14.2</div>
</div>
<span class="text-[8px] uppercase font-bold text-on-surface-variant">Mar</span>
</div>
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary rounded-t-sm relative group" style="height: 85%;">
<div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold opacity-0 group-hover:opacity-100 transition-opacity">15.5</div>
</div>
<span class="text-[8px] uppercase font-bold text-on-surface-variant">Mer</span>
</div>
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary-fixed rounded-t-sm relative group" style="height: 60%;">
<div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold opacity-0 group-hover:opacity-100 transition-opacity">12.5</div>
</div>
<span class="text-[8px] uppercase font-bold text-on-surface-variant">Jeu</span>
</div>
<div class="flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-primary-fixed rounded-t-sm relative group" style="height: 68%;">
<div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold opacity-0 group-hover:opacity-100 transition-opacity">13.9</div>
</div>
<span class="text-[8px] uppercase font-bold text-on-surface-variant">Ven</span>
</div>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="bg-surface-container-low p-3 rounded-lg text-center">
<p class="text-[10px] uppercase font-bold text-on-surface-variant">Tension Moy.</p>
<p class="text-xl font-black text-primary">13.8<span class="text-[10px] font-normal ml-1">cmHg</span></p>
</div>
<div class="bg-surface-container-low p-3 rounded-lg text-center">
<p class="text-[10px] uppercase font-bold text-on-surface-variant">Poids</p>
<p class="text-xl font-black text-secondary">58.4<span class="text-[10px] font-normal ml-1">kg</span></p>
</div>
</div>
</div>
</section>
<section class="bg-surface-container-lowest rounded-xl p-6 shadow-sm border border-outline-variant/10">
<div class="flex justify-between items-center mb-6">
<h3 class="text-lg font-headline font-bold text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined text-primary">medication</span>
                                Prescriptions actives
                            </h3>
<span class="text-[10px] font-bold bg-secondary-fixed text-on-secondary-fixed px-2 py-0.5 rounded-full">3 TRAITEMENTS</span>
</div>
<div class="space-y-4">
<div class="flex gap-4 items-start p-3 rounded-lg hover:bg-surface-container-low transition-colors">
<div class="w-10 h-10 rounded-lg bg-primary-fixed flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary">pill</span>
</div>
<div class="flex-1">
<p class="text-sm font-bold text-on-surface">Lisinopril 10mg</p>
<p class="text-[11px] text-on-surface-variant mt-0.5">1 comprimé le matin - Hypertension</p>
<div class="mt-2 w-full h-1 bg-primary-fixed rounded-full overflow-hidden">
<div class="h-full bg-primary w-3/4"></div>
</div>
<p class="text-[9px] text-right mt-1 font-bold text-primary">Reste 8 jours</p>
</div>
</div>
<div class="flex gap-4 items-start p-3 rounded-lg hover:bg-surface-container-low transition-colors">
<div class="w-10 h-10 rounded-lg bg-secondary-fixed flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-secondary">pill</span>
</div>
<div class="flex-1">
<p class="text-sm font-bold text-on-surface">Atorvastatine 20mg</p>
<p class="text-[11px] text-on-surface-variant mt-0.5">1 comprimé au coucher - Cholestérol</p>
<div class="mt-2 w-full h-1 bg-secondary-fixed rounded-full overflow-hidden">
<div class="h-full bg-secondary w-1/2"></div>
</div>
<p class="text-[9px] text-right mt-1 font-bold text-secondary">Reste 14 jours</p>
</div>
</div>
<div class="flex gap-4 items-start p-3 rounded-lg hover:bg-surface-container-low transition-colors opacity-60">
<div class="w-10 h-10 rounded-lg bg-outline-variant/30 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-outline">pill</span>
</div>
<div class="flex-1">
<p class="text-sm font-bold text-on-surface">Paracétamol 500mg</p>
<p class="text-[11px] text-on-surface-variant mt-0.5">Si douleur uniquement</p>
<p class="text-[9px] mt-1 font-bold text-outline uppercase tracking-widest">Ponctuel</p>
</div>
</div>
</div>
<button class="w-full mt-6 py-3 border-2 border-dashed border-outline-variant text-on-surface-variant text-xs font-bold rounded-xl hover:bg-surface-container-low transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">add</span>
                            Ajouter une ordonnance
                        </button>
</section>
</div>
</div>
</div>

@endsection
