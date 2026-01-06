<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optimize 2025</title>

    <!-- 1. CORRECTED CDNs - MUST BE IN THIS ORDER -->
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Remix Icon 4.5.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Font Awesome 6.x CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>

    <!-- DARK HEADER -->
<header class="bg-slate-900 text-white py-2 shadow-lg">
    <div class="container d-flex justify-content-between align-items-center px-4">
        <!-- Replace the text div with this anchor and image -->
        <a href="/" class="d-block">
            <img src="/assets/images/company-logos/Click_vision.png" alt="Company Logo" class="h-20 w-auto">
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
     * 1. Loader Control
     * Toggles the searching GIF and resets progress bar animations.
     */
    window.addEventListener('show-loader', () => {
        const alpineEl = document.querySelector('[x-data]');
        if (alpineEl) Alpine.$data(alpineEl).loadingSet = true;
    });

    window.addEventListener('hide-loader', () => {
        const alpineEl = document.querySelector('[x-data]');
        if (alpineEl) Alpine.$data(alpineEl).loadingSet = false;
    });

    /**
     * 2. Toast Helper Function
     * Keeps code clean and reusable for both Events and Session Flashes.
     */
    function fireToast(type, message) {
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

    /**
     * 3. Livewire Alert Listener
     * Handles instant notifications (Frozen account, Locked set, etc.)
     */
    window.addEventListener('alert', event => {
        const data = Array.isArray(event.detail) ? event.detail[0] : event.detail; 
        fireToast(data.type, data.message);
    });

    /**
     * 4. Session Flash Listener (The "Redirect" Fix)
     * This checks for Laravel session messages when a new page loads.
     */
    document.addEventListener('DOMContentLoaded', () => {
        @if(session()->has('success'))
            fireToast('success', "{{ session('success') }}");
        @endif

        @if(session()->has('error'))
            fireToast('error', "{{ session('error') }}");
        @endif
        
        @if(session()->has('warning'))
            fireToast('warning', "{{ session('warning') }}");
        @endif
    });
</script>


<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    @livewireScripts
</body>
</html>
