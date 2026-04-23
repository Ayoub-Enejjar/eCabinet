@extends('secretary.layout')
@section('title', 'Secretary - Settings')

@section('content')
<!-- Hero Header -->
<div class="mb-12">
    <h2 class="text-3xl font-extrabold font-headline tracking-tight text-on-surface mb-1">Profile Management</h2>
    <p class="text-on-surface-variant font-body max-w-2xl leading-relaxed">Update your personal information to ensure precise communication and management.</p>
</div>

<form method="POST" action="{{ route('secretary.parametres') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <!-- Bento Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Left Column: Personal Info -->
        <div class="lg:col-span-3 space-y-8 w-full">
            <!-- Profile Card -->
            <div class="bg-surface-container-lowest rounded-xl p-8 shadow-[0_10px_30px_-5px_rgba(0,106,97,0.08)] border border-outline-variant/10">
                <div class="flex items-center gap-6 mb-8">
                    <div class="relative group">
                        <label for="profile_photo" class="cursor-pointer block relative">
                            <div class="w-32 h-32 rounded-2xl shadow-lg bg-primary-fixed flex items-center justify-center text-primary text-5xl font-bold overflow-hidden border-4 border-surface-container-low transition-all group-hover:border-primary/30">
                                <img id="avatar_preview" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover">

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="material-symbols-outlined text-white text-3xl">photo_camera</span>
                                </div>
                            </div>
                            <input type="file" name="profile_photo" id="profile_photo" class="hidden" accept="image/*" onchange="previewImage(this)">
                        </label>
                        @error('profile_photo') <span class="text-error text-xs absolute -bottom-6 left-0 w-max">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-on-surface">{{ auth()->user()->name }}</h3>
                        <p class="text-on-surface-variant font-medium">Registered since {{ optional(auth()->user()->created_at)->translatedFormat('d F Y') ?? 'N/A' }}</p>
                        <p class="text-xs text-primary font-bold mt-2 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">info</span>
                            Click on the image to modify it
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider ml-1">Full Name</label>
                        <input name="name" class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all outline-none text-on-surface font-medium" type="text" value="{{ old('name', auth()->user()->name) }}"/>
                        @error('name') <span class="text-error text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider ml-1">Email Address</label>
                        <input name="email" class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all outline-none text-on-surface font-medium" type="email" value="{{ old('email', auth()->user()->email) }}"/>
                        @error('email') <span class="text-error text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2 space-y-2">
                        <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider ml-1">New Password (Optional)</label>
                        <input name="password" class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all outline-none text-on-surface font-medium" type="password" placeholder="Leave empty to keep current password"/>
                        @error('password') <span class="text-error text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider ml-1">Confirm New Password</label>
                        <input name="password_confirmation" class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all outline-none text-on-surface font-medium" type="password" placeholder="Repeat new password"/>
                    </div>
                </div>
            </div>

            <!-- Security Card -->
            <div class="bg-primary-container text-on-primary-container rounded-xl p-8 relative overflow-hidden">
                <div class="relative z-10">
                    <span class="material-symbols-outlined text-3xl mb-4">security</span>
                    <h3 class="text-xl font-bold mb-2">Security & Confidentiality</h3>
                    <p class="text-sm text-on-primary-container/80 mb-6 leading-relaxed">Your data is encrypted and protected in accordance with current system standards.</p>
                </div>
                <!-- Background Decoration -->
                <div class="absolute -right-12 -bottom-12 w-48 h-48 bg-white/5 rounded-full blur-3xl"></div>
            </div>

            <!-- Sticky Action Box -->
            <div class="sticky top-24 space-y-4">
                <button type="submit" class="w-full py-4 bg-gradient-to-r from-primary to-primary-container text-on-primary font-bold rounded-xl shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-3">
                    <span class="material-symbols-outlined">save</span>
                    Save Changes
                </button>
            </div>

        </div>
    </div>
</form>

@section('scripts')
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatar_preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
@endsection
