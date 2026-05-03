<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Téléconsultation - eCabinet</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://meet.jit.si/external_api.js"></script>
</head>
<body class="bg-gray-100 h-screen flex flex-col">

    <!-- Top Navigation Bar -->
    <header class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-4">
            <x-logo class="h-8 text-blue-600" />
            <span class="text-xl font-semibold text-gray-800">Téléconsultation en direct</span>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-sm text-gray-600">
                <span class="font-medium">Patient:</span> {{ $rendezVous->patient->name }} | 
                <span class="font-medium">Médecin:</span> Dr. {{ $rendezVous->medecin->name }}
            </div>
            <a href="{{ $user->role === 'DOCTOR' ? route('doctor.schedule') : route('patient.appointments') }}" class="px-4 py-2 bg-red-50 text-red-600 rounded-lg font-medium hover:bg-red-100 transition">
                Quitter l'appel
            </a>
        </div>
    </header>

    <!-- Jitsi Container -->
    <main class="flex-grow bg-black relative" id="jitsi-container">
        <!-- The Jitsi Meet IFrame will be injected here -->
        <div id="loading-overlay" class="absolute inset-0 flex items-center justify-center bg-gray-900 z-10">
            <div class="text-center">
                <svg class="animate-spin h-10 w-10 text-white mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <p class="text-white text-lg font-medium">Connexion sécurisée en cours...</p>
                <p class="text-gray-400 text-sm mt-2">Veuillez autoriser l'accès à votre caméra et votre microphone.</p>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const domain = 'meet.jit.si';
            // Create a unique but consistent room name based on the appointment ID
            const roomName = 'eCabinet-Consultation-{{ env('APP_ENV', 'local') }}-{{ $rendezVous->id }}-{{ md5($rendezVous->created_at) }}';
            
            const options = {
                roomName: roomName,
                width: '100%',
                height: '100%',
                parentNode: document.querySelector('#jitsi-container'),
                userInfo: {
                    displayName: '{{ $user->role === 'DOCTOR' ? "Dr. " : "" }}{{ $user->name }}',
                },
                configOverwrite: {
                    startWithAudioMuted: false,
                    startWithVideoMuted: false,
                    prejoinPageEnabled: false, // Skip prejoin page to jump right in
                    disableDeepLinking: true,
                },
                interfaceConfigOverwrite: {
                    SHOW_JITSI_WATERMARK: false,
                    SHOW_WATERMARK_FOR_GUESTS: false,
                    TOOLBAR_BUTTONS: [
                        'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
                        'fodeviceselection', 'hangup', 'profile', 'chat', 'recording',
                        'settings', 'raisehand', 'videoquality', 'filmstrip', 'tileview'
                    ],
                }
            };
            
            const api = new JitsiMeetExternalAPI(domain, options);
            
            // Hide loading overlay once video joins
            api.addEventListener('videoConferenceJoined', () => {
                document.getElementById('loading-overlay').style.display = 'none';
            });
            
            // Redirect when hanging up
            api.addEventListener('readyToClose', () => {
                window.location.href = "{{ $user->role === 'DOCTOR' ? route('doctor.schedule') : route('patient.appointments') }}";
            });
        });
    </script>
</body>
</html>
