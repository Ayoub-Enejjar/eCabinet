<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'eCabinet - Espace Secrétaire')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Scripts -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .chart-gradient {
            background: linear-gradient(180deg, rgba(0, 106, 97, 0.1) 0%, rgba(0, 106, 97, 0) 100%);
        }
    </style>
    @yield('head')
</head>
<body class="bg-background font-body text-on-background selection:bg-primary-fixed selection:text-on-primary-fixed">

<!-- Sidebar Navigation -->
<nav class="h-screen w-64 fixed left-0 top-0 border-r-0 bg-slate-50/80 dark:bg-slate-900/80 backdrop-blur-xl shadow-[10px_0_30px_-5px_rgba(13,148,136,0.05)] flex flex-col p-4 gap-2 z-50">
    <div class="flex items-center gap-3 px-3 py-6 mb-4">
        <x-logo subtitle="Secretary Portal" />
    </div>

    <a href="{{ route('secretary.dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('secretary.dashboard') ? 'bg-teal-50 dark:bg-teal-900/20 text-teal-700 dark:text-teal-300' : 'text-slate-500 hover:text-teal-600 hover:bg-slate-200/50' }} font-semibold rounded-lg transition-all duration-300 scale-98 active:scale-95">
        <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
        <span class="font-manrope text-sm font-medium tracking-tight">Tableau de bord</span>
    </a>

    <a href="{{ route('secretary.patients') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('secretary.patients*') ? 'bg-teal-50 dark:bg-teal-900/20 text-teal-700 dark:text-teal-300' : 'text-slate-500 hover:text-teal-600 hover:bg-slate-200/50' }} font-semibold rounded-lg transition-all duration-300 scale-98 active:scale-95">
        <span class="material-symbols-outlined" data-icon="group">group</span>
        <span class="font-manrope text-sm font-medium tracking-tight">Patients</span>
    </a>

    <a href="{{ route('secretary.PendingrendezVous') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('secretary.PendingrendezVous') ? 'bg-teal-50 dark:bg-teal-900/20 text-teal-700 dark:text-teal-300' : 'text-slate-500 hover:text-teal-600 hover:bg-slate-200/50' }} font-semibold rounded-lg transition-all duration-300 scale-98 active:scale-95">
        <span class="material-symbols-outlined" data-icon="pending_actions">pending_actions</span>
        <span class="font-manrope text-sm font-medium tracking-tight">Pending RDV</span>
    </a>

    <a href="{{ route('secretary.ConfirmedrendezVous') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('secretary.ConfirmedrendezVous') ? 'bg-teal-50 dark:bg-teal-900/20 text-teal-700 dark:text-teal-300' : 'text-slate-500 hover:text-teal-600 hover:bg-slate-200/50' }} font-semibold rounded-lg transition-all duration-300 scale-98 active:scale-95">
        <span class="material-symbols-outlined" data-icon="event_available">event_available</span>
        <span class="font-manrope text-sm font-medium tracking-tight">Confirmed RDV</span>
    </a>

    <a href="{{ route('secretary.CancelledrendezVous') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('secretary.CancelledrendezVous') ? 'bg-teal-50 dark:bg-teal-900/20 text-teal-700 dark:text-teal-300' : 'text-slate-500 hover:text-teal-600 hover:bg-slate-200/50' }} font-semibold rounded-lg transition-all duration-300 scale-98 active:scale-95">
        <span class="material-symbols-outlined" data-icon="event_busy">event_busy</span>
        <span class="font-manrope text-sm font-medium tracking-tight">Cancelled RDV</span>
    </a>

    <div class="mt-auto">
        <a href="{{ route('secretary.parametres') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('secretary.parametres', 'secretary.settings') ? 'bg-teal-50 dark:bg-teal-900/20 text-teal-700 dark:text-teal-300' : 'text-slate-500 hover:text-teal-600 hover:bg-slate-200/50' }} font-semibold rounded-lg transition-all duration-300 scale-98 active:scale-95">
            <span class="material-symbols-outlined" data-icon="settings">settings</span>
            <span class="font-manrope text-sm font-medium tracking-tight">Settings</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="flex items-center gap-3 px-4 py-3 text-red-500 hover:text-red-600 hover:bg-red-50 transition-all duration-300 w-full rounded-lg">
                <span class="material-symbols-outlined" data-icon="logout">logout</span>
                <span class="font-manrope text-sm font-medium tracking-tight">Logout</span>
            </button>
        </form>
    </div>
</nav>

<!-- Top Navigation Bar -->
<header class="fixed top-0 right-0 w-[calc(100%-16rem)] h-16 bg-white/80 dark:bg-slate-950/80 backdrop-blur-md flex items-center px-8 z-40">
    <div class="ml-auto flex items-center gap-6">

        <!-- Divider -->
        <div class="h-8 w-[1px] bg-outline-variant/30"></div>

        <!-- User -->
        <div class="flex items-center gap-3">
            
            <div class="text-right">
                <p class="text-xs font-bold text-on-surface dark:text-white">
                    {{ auth()->user()->name ?? 'Secretary' }}
                </p>
                <p class="text-[10px] text-on-surface-variant dark:text-slate-400 font-medium tracking-wider uppercase">
                    Secretary
                </p>
            </div>

            @if(auth()->user() && auth()->user()->profile_photo_url)
            <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="w-10 h-10 rounded-full object-cover border-2 border-primary/10">
            @else
            <div class="w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center text-teal-700 font-bold border-2 border-primary/10">
                {{ substr(auth()->user()->name ?? 'S', 0, 1) }}
            </div>
            @endif

        </div>

    </div>
</header>

<!-- Main Content -->
<main class="ml-64 pt-24 px-8 pb-12 min-h-screen">
    @yield('content')
</main>

@yield('scripts')

</body>
</html>
