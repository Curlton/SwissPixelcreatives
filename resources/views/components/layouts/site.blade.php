<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SwissPixel' }}</title>
    <!-- 1. CORRECTED CDNs - MUST BE IN THIS ORDER -->
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Remix Icon 4.5.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Font Awesome 6.x CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="image/x-icon" />

    

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
<!-- Inside the <body> of your main layout file -->
<audio id="globalNotificationSound" src="{{ asset('assets/notify.mp3') }}" preload="auto"></audio>

    <!-- DARK HEADER -->
<header class="bg-slate-900 text-white shadow-lg" style="min-height: 100px; display: flex; align-items: center; padding: 0;">
    <div class="container-fluid d-flex justify-content-between align-items-center px-4">
        
        <a href="/" class="d-flex align-items-center" style="text-decoration: none; padding: 0; margin-left: -10px;">
            <img src="{{ asset('assets/images/company-logos/Click_vision.png') }}" 
                 alt="Click Vision Logo" 
                 style="height: 60px; width: auto; object-fit: contain; display: block; transform: scale(1.1); transform-origin: left center;">
        </a>
    <!-- CRITICAL: The hidden Google Translate engine placeholder -->
    <div id="google_translate_element" style="display:none"></div>

    <!-- Your Custom Professional Dropdown -->
    <div class="language-dropdown">
        <button class="globe-btn" aria-label="Change Language">
            <i class="fas fa-globe "></i>
        </button>
        <div class="dropdown-content">
    <a href="javascript:void(0)" onclick="changeLanguage('en')">
        <img src="{{ asset('assets/images/flags/uk_flag.png') }}" alt="UK"> UK (Default)
    </a>
    <a href="javascript:void(0)" onclick="changeLanguage('fr')">
        <img src="{{ asset('assets/images/flags/french_flag.jpg') }}" alt="France"> France
    </a>
    <a href="javascript:void(0)" onclick="changeLanguage('it')">
        <img src="{{ asset('assets/images/flags/italy_flag.jpg') }}" alt="Italy"> Italy
    </a>
    <a href="javascript:void(0)" onclick="changeLanguage('es')">
        <img src="{{ asset('assets/images/flags/spain_flag.jpg') }}" alt="Spain"> Spanish
    </a>
    <a href="javascript:void(0)" onclick="changeLanguage('da')">
        <img src="{{ asset('assets/images/flags/denmark_flag.png') }}" alt="Denmark"> Denmark
    </a>
    <a href="javascript:void(0)" onclick="changeLanguage('pl')">
        <img src="{{ asset('assets/images/flags/poland_flag.png') }}" alt="Poland"> Poland
    </a>
    <a href="javascript:void(0)" onclick="changeLanguage('cs')">
        <img src="{{ asset('assets/images/flags/czech_flag.png') }}" alt="Czech"> Czech
    </a>
    <a href="javascript:void(0)" onclick="changeLanguage('de')">
        <img src="{{ asset('assets/images/flags/germany_flag.jpg') }}" alt="Germany"> Germany
    </a>
    <a href="javascript:void(0)" onclick="changeLanguage('tr')">
        <img src="{{ asset('assets/images/flags/turkey_flag.png') }}" alt="Turkey"> Turkey
    </a>
    <a href="javascript:void(0)" onclick="changeLanguage('pt')">
        <img src="{{ asset('assets/images/flags/portugal_flag.png') }}" alt="Portugal"> Portuguese
    </a>
    <a href="javascript:void(0)" onclick="changeLanguage('ar')">
        <img src="{{ asset('assets/images/flags/uae_flag.jpg') }}" alt="UAE"> UAE
    </a>
</div>

    </div>
</div>

    

    </div>
</header>
<!-- Rest of the app.blade.php content... -->


    <!-- FLOATING PILL NAVIGATION -->
<nav class="sticky-nav">
    <div class="nav-pill-box">
        <ul class="force-nav-center w-full flex justify-between px-2">
            <li>
                <a href="{{ route('dashboard') }}" wire:navigate class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="ri-home-4-fill"></i>
                    <span class="nav-label">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.drive') }}" wire:navigate class="nav-link {{ request()->routeIs('user.drive') ? 'active' : '' }}">
                    <i class="ri-steering-2-fill"></i>
                    <span class="nav-label">Drive</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.events') }}" wire:navigate class="nav-link {{ request()->routeIs('user.events') ? 'active' : '' }}">
                    <i class="ri-shining-2-fill"></i>
                    <span class="nav-label">Events</span>
                </a>
            </li>
            <li>
                <a href="/profile" wire:navigate class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                    <i class="ri-user-smile-fill"></i>
                    <span class="nav-label">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</nav>


    <!-- CONTENT AREA -->
    <main class="container mx-auto py-8 px-4">
        {{ $slot }}
    </main>

    

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    /**
     * 0. Sound Helper
     */
    function playNotificationSound() {
        const sound = document.getElementById('notificationSound');
        if (sound) {
            sound.currentTime = 0; 
            sound.play().catch(e => console.warn("Audio blocked."));
        }
    }

    /**
     * 1. Updated Toast Helper
     * Added 'withSound' parameter to prevent duplicate sounds on Submit.
     */
    function fireToast(type, message, withSound = true) {
        // Only play if withSound is true
        if (withSound) {
            playNotificationSound();
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            background: '#ffffff',
            color: '#1e293b',
            iconColor: type === 'success' ? '#10b981' : (type === 'warning' ? '#f59e0b' : '#ef4444'),
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: type,
            title: message
        });
    }

    window.addEventListener('alert', event => {
    /**
     * EXTRACT DATA SAFELY
     * Livewire 3 often wraps data in event.detail[0] if dispatched with an array, 
     * or event.detail if dispatched with named parameters.
     */
    let data = event.detail;
    if (Array.isArray(data)) {
        data = data[0];
    }

    // Now data.type and data.message will have the correct words
    const type = data.type || 'info';
    const message = data.message || '';

    // Play sound unless explicitly told to be silent
    // This allows your "Welcome" alert to play sound automatically
    const shouldPlay = (data.silent === undefined || data.silent === false);

    fireToast(type, message, shouldPlay);
});

    /**
     * 3. Session Flash Listener
     */
    document.addEventListener('DOMContentLoaded', () => {
        @if(session()->has('success'))
            fireToast('success', "{{ session('success') }}");
        @endif
        @if(session()->has('error'))
            fireToast('error', "{{ session('error') }}");
        @endif
    });

    // Existing Loader Control...
    window.addEventListener('show-loader', () => {
        const alpineEl = document.querySelector('[x-data]');
        if (alpineEl) Alpine.$data(alpineEl).loadingSet = true;
    });
    window.addEventListener('hide-loader', () => {
        const alpineEl = document.querySelector('[x-data]');
        if (alpineEl) Alpine.$data(alpineEl).loadingSet = false;
    });
    /**
 * 5. Swat-Toast Listener
 * specifically for the 'swal-toast' event dispatched in submittask
 */
window.addEventListener('swal-toast', event => {
    // Livewire 3 detail extraction
    const data = Array.isArray(event.detail) ? event.detail[0] : event.detail; 
    
    /**
     * We pass 'false' for the 3rd parameter (withSound) 
     * because your Submit button is already playing a sound.
     */
    fireToast(data.icon, data.title, shouldPlay); 
});

</script>



<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    @livewireScripts
</body>
</html>
