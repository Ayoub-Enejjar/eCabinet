<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'eCabinet') }} - Confirmation</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body min-h-screen antialiased">
    <main class="flex min-h-screen w-full">
        <!-- Left Side: Visual Anchor -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden items-center justify-center bg-primary">
            <div class="absolute inset-0 z-0">
                <img alt="Medical precision" class="w-full h-full object-cover opacity-60 mix-blend-overlay" src="{{ asset('images/doctor-bg.jpg') }}">
            </div>
            <div class="relative z-10 px-16 text-on-primary max-w-xl">
                <div class="mb-8">
                    <span class="text-3xl font-headline font-black tracking-tight text-primary-fixed uppercase">eCabinet</span>
                </div>
                <h2 class="text-4xl font-headline font-bold leading-tight mb-4">Zone sécurisée.</h2>
                <p class="text-lg text-primary-fixed/80 font-body leading-relaxed">Il s'agit d'une zone sécurisée de l'application. Veuillez confirmer votre mot de passe avant de continuer.</p>
            </div>
        </div>

        <!-- Right Side: Confirmation Form -->
        <div class="w-full lg:w-1/2 flex flex-col bg-surface-container-lowest relative">
            <div class="flex-grow flex items-center justify-center px-8 lg:px-24">
                <div class="w-full max-w-md">
                    <div class="mb-10 text-center lg:text-left">
                        <h1 class="text-3xl font-headline font-bold text-on-surface mb-3 tracking-tight">Confirmation</h1>
                        <p class="text-on-surface-variant font-body leading-relaxed">Veuillez saisir votre mot de passe.</p>
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                        @csrf

                        <!-- Password -->
                        <div class="space-y-2">
                            <label class="block text-xs font-label font-semibold text-on-surface-variant uppercase tracking-wider ml-1" for="password">Mot de passe</label>
                            <div class="relative group">
                                <input class="w-full px-5 py-4 bg-surface-container-high border-none rounded-lg text-on-surface placeholder:text-outline-variant focus:ring-0 focus:bg-surface-container-lowest focus:shadow-[0_0_0_1px_rgba(0,104,95,0.2)] transition-all duration-200" id="password" name="password" required autocomplete="current-password" placeholder="••••••••" type="password"/>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-outline-variant group-focus-within:text-primary">
                                    <span class="material-symbols-outlined">lock</span>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="pt-2">
                            <button class="w-full py-4 px-6 bg-gradient-to-r from-primary to-primary-container text-on-primary font-headline font-bold rounded-lg shadow-lg hover:shadow-xl hover:scale-[1.01] active:scale-95 transition-all duration-200" type="submit">
                                Confirmer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
