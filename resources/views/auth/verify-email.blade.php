<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'eCabinet') }} - Vérification</title>

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
                    <x-logo size="large" iconColor="text-white" textColor="text-white" />
                </div>
                <h2 class="text-4xl font-headline font-bold leading-tight mb-4">Une dernière étape.</h2>
                <p class="text-lg text-primary-fixed/80 font-body leading-relaxed">Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer ?</p>
            </div>
        </div>

        <!-- Right Side: Content -->
        <div class="w-full lg:w-1/2 flex flex-col bg-surface-container-lowest relative">
            <div class="flex-grow flex items-center justify-center px-8 lg:px-24">
                <div class="w-full max-w-md">
                    <div class="mb-10 text-center lg:text-left">
                        <h1 class="text-3xl font-headline font-bold text-on-surface mb-3 tracking-tight">Vérification de l'email</h1>
                        <p class="text-on-surface-variant font-body leading-relaxed">Si vous n'avez pas reçu l'email, nous vous en enverrons un autre avec plaisir.</p>
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-6 p-4 bg-primary/10 border border-primary/20 rounded-lg text-primary text-sm font-medium">
                            {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse e-mail que vous avez fournie lors de l\'inscription.') }}
                        </div>
                    @endif

                    <div class="space-y-6">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button class="w-full py-4 px-6 bg-gradient-to-r from-primary to-primary-container text-on-primary font-headline font-bold rounded-lg shadow-lg hover:shadow-xl hover:scale-[1.01] active:scale-95 transition-all duration-200" type="submit">
                                Renvoyer l'email de vérification
                            </button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}" class="text-center">
                            @csrf
                            <button type="submit" class="text-sm font-bold text-secondary hover:text-primary transition-colors underline underline-offset-4">
                                {{ __('Se déconnecter') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
