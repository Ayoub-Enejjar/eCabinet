<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Téléconsultation - eCabinet</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://8x8.vc/vpaas-magic-cookie-9f640462003945ad8564fe19e47417d7/external_api.js"></script>
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
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const domain = '8x8.vc';
            const appId = 'vpaas-magic-cookie-9f640462003945ad8564fe19e47417d7';
            
            // For JaaS, the room name MUST be prefixed with the AppID
            const roomName = appId + '/eCabinet-Consultation-{{ env('APP_ENV', 'local') }}-{{ $rendezVous->id }}-{{ md5($rendezVous->created_at) }}';
            
            const options = {
                roomName: roomName,
                jwt: '{{ $jwt }}',
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
            
            // Redirect when hanging up
            api.addEventListener('readyToClose', () => {
                window.location.href = "{{ $user->role === 'DOCTOR' ? route('doctor.schedule') : route('patient.appointments') }}";
            });
        });
    </script>
</body>
</html>
