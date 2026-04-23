@extends('layouts.doctor')

@section('page-title', 'Mon Profil Professionnel')

@section('content')
<div class="p-8 max-w-4xl mx-auto space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-on-surface dark:text-white">Paramètres du profil</h2>
            <p class="text-sm text-on-surface-variant dark:text-slate-400">Gérez vos informations professionnelles et votre identité publique.</p>
        </div>
        @if(session('success'))
        <div class="bg-teal-100 border border-teal-200 text-teal-700 px-4 py-2 rounded-lg text-sm animate-pulse">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <form action="{{ route('doctor.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Profile Header Card -->
        <div class="bg-surface-container-lowest dark:bg-slate-900 rounded-3xl p-8 border border-slate-200 dark:border-slate-800 shadow-sm">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="relative group">
                    <img id="preview-image" src="{{ $user->profile_photo_url }}" class="w-32 h-32 rounded-3xl object-cover border-4 border-white dark:border-slate-800 shadow-xl group-hover:opacity-75 transition-all">
                    <label for="photo-upload" class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 cursor-pointer transition-all">
                        <span class="bg-black/50 text-white rounded-full p-2">
                            <span class="material-symbols-outlined">photo_camera</span>
                        </span>
                    </label>
                    <input id="photo-upload" name="photo" type="file" class="hidden" onchange="previewFile()">
                </div>
                <div class="flex-1 text-center md:text-left space-y-2">
                    <h3 class="text-xl font-bold text-on-surface dark:text-white">{{ $user->name }}</h3>
                    <div class="flex flex-wrap gap-2 justify-center md:justify-start">
                        <span class="px-3 py-1 bg-primary/10 text-primary dark:text-teal-400 text-[10px] font-bold rounded-full uppercase">{{ $user->specialiste ?? 'Spécialité non définie' }}</span>
                        <span class="px-3 py-1 bg-secondary/10 text-secondary dark:text-blue-400 text-[10px] font-bold rounded-full uppercase">Membre depuis {{ $user->created_at->format('M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Information Sections -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Basic Info -->
            <div class="bg-surface-container-lowest dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 space-y-4">
                <h4 class="text-sm font-bold uppercase tracking-widest text-on-surface-variant dark:text-slate-500 mb-4">Informations de base</h4>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant dark:text-slate-400">Nom complet</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-surface-container-low dark:bg-slate-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary dark:text-white" required>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant dark:text-slate-400">Email professionnel</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-surface-container-low dark:bg-slate-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary dark:text-white" required>
                </div>
            </div>

            <!-- Professional Info -->
            <div class="bg-surface-container-lowest dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 space-y-4">
                <h4 class="text-sm font-bold uppercase tracking-widest text-on-surface-variant dark:text-slate-500 mb-4">Expertise & Contact</h4>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant dark:text-slate-400">Spécialité</label>
                    <input type="text" name="specialiste" value="{{ old('specialiste', $user->specialiste) }}" placeholder="Ex: Cardiologie, Pédiatrie..." class="w-full bg-surface-container-low dark:bg-slate-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary dark:text-white">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant dark:text-slate-400">Diplômes / Titres</label>
                    <input type="text" name="diplome" value="{{ old('diplome', $user->diplome) }}" placeholder="Ex: Docteur en Médecine, PhD..." class="w-full bg-surface-container-low dark:bg-slate-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary dark:text-white">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-on-surface-variant dark:text-slate-400">Téléphone professionnel</label>
                    <input type="text" name="telephone_pro" value="{{ old('telephone_pro', $user->telephone_pro) }}" placeholder="+33 6..." class="w-full bg-surface-container-low dark:bg-slate-800 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary dark:text-white">
                </div>
            </div>
        </div>

        <!-- Signature Section -->
        <div class="bg-surface-container-lowest dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 space-y-4">
            <h4 class="text-sm font-bold uppercase tracking-widest text-on-surface-variant dark:text-slate-500 mb-4">Signature Virtuelle</h4>
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="w-full md:w-1/2 space-y-4">
                    <p class="text-xs text-on-surface-variant dark:text-slate-400 italic">Dessinez votre signature directement ci-dessous ou importez une image PNG.</p>
                    
                    <!-- Drawing Canvas -->
                    <div class="border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-2xl overflow-hidden bg-white dark:bg-slate-800 relative h-40 group">
                        <canvas id="signature-pad" class="w-full h-full cursor-crosshair touch-none"></canvas>
                        <button type="button" id="clear-signature" class="absolute top-2 right-2 text-xs bg-slate-100 hover:bg-slate-200 text-slate-600 px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity flex items-center gap-1 shadow-sm border border-slate-200">
                            <span class="material-symbols-outlined text-[14px]">cleaning_services</span>
                            Effacer
                        </button>
                    </div>

                    <div class="flex items-center gap-4">
                        <label class="cursor-pointer bg-secondary/5 text-secondary dark:text-blue-400 px-6 py-3 rounded-xl border border-secondary/20 hover:bg-secondary/10 font-bold text-xs transition-all w-full text-center flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">upload_file</span>
                            Importer une image
                            <input name="signature" id="signature-file" type="file" class="hidden" onchange="previewSignature(this)">
                        </label>
                    </div>
                </div>

                <div class="w-full md:w-1/2 h-40 bg-slate-50 dark:bg-slate-800/50 rounded-2xl border-2 border-dashed border-slate-200 dark:border-slate-700 flex items-center justify-center overflow-hidden relative">
                    <img id="signature-preview" src="{{ $user->signature_path ? asset('storage/'.$user->signature_path) : '' }}" class="{{ $user->signature_path ? 'max-h-32' : 'hidden' }} object-contain relative z-10 drop-shadow-md">
                    <div id="signature-placeholder" class="{{ $user->signature_path ? 'hidden' : '' }} text-slate-300 dark:text-slate-600 flex flex-col items-center absolute inset-0 justify-center">
                        <span class="material-symbols-outlined text-4xl mb-1">signature</span>
                        <p class="text-[10px] font-bold uppercase tracking-widest mt-1">Aperçu de la signature</p>
                    </div>
                </div>
            </div>
            <input type="hidden" name="signature_base64" id="signature_base64">
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/20 hover:bg-primary-container transition-all active:scale-95">
                Enregistrer les modifications
            </button>
        </div>
    </form>
</div>

<!-- Signature Pad Library -->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>

<script>
function previewFile() {
    const preview = document.getElementById('preview-image');
    const file = document.getElementById('photo-upload').files[0];
    const reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    }
}

// Signature Pad Implementation
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('signature-pad');
    const clearButton = document.getElementById('clear-signature');
    const signatureBase64Input = document.getElementById('signature_base64');
    const preview = document.getElementById('signature-preview');
    const placeholder = document.getElementById('signature-placeholder');
    const fileInput = document.getElementById('signature-file');

    // Initialize SignaturePad
    const signaturePad = new SignaturePad(canvas, {
        penColor: document.documentElement.classList.contains('dark') ? "white" : "black",
        backgroundColor: "rgba(255, 255, 255, 0)" // transparent background
    });

    // Resize canvas to true dimensions
    function resizeCanvas() {
        const ratio =  Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
        signaturePad.clear(); // otherwise it might be stretched
    }
    window.addEventListener("resize", resizeCanvas);
    resizeCanvas();

    // Update preview & hidden input when drawing ends
    signaturePad.addEventListener("endStroke", () => {
        if (!signaturePad.isEmpty()) {
            const dataUrl = signaturePad.toDataURL("image/png");
            signatureBase64Input.value = dataUrl;
            
            // Show in preview
            preview.src = dataUrl;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
            
            // Clear file input to avoid conflicts
            fileInput.value = '';
        }
    });

    // Clear Button
    clearButton.addEventListener('click', () => {
        signaturePad.clear();
        signatureBase64Input.value = '';
        fileInput.value = '';
        
        // Reset preview
        preview.src = '';
        preview.classList.add('hidden');
        placeholder.classList.remove('hidden');
    });

    // Global exposed for the file input onchange
    window.previewSignature = function(input) {
        if (input.files && input.files[0]) {
            // Clear pad when uploading file
            signaturePad.clear();
            signatureBase64Input.value = '';

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    };
});
</script>
@endsection
