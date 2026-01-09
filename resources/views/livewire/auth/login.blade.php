<div>
    <section class="page-title" style="background-image: url({{ asset('home/images/background/page-title.jpg') }}); padding: 100px 0;">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title" style="color: white;">Secure Login</h1>
            <ul class="page-breadcrumb">
                <li><a href="/">Home</a></li>
                <li style="color: rgba(255,255,255,0.7);">Portal Access</li>
            </ul>
        </div>
    </div>
</section>

<section class="ks-service-area" style="background: #f4f7f6; padding: 60px 0 100px;">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-sm-12">
                
                <div class="login-window">
                        
                        <div class="text-center mb-4">
                            <button type="button" id="langSwitcherBtn" style="background: #f9f9f9; border: 1px solid #e0e0e0; padding: 10px 20px; border-radius: 12px; cursor: pointer; color: #333; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; position: relative; z-index: 11;">
                                <i class="fas fa-globe"></i> 
                                <span id="currentLangText">Select Language</span>
                                <i class="fas fa-chevron-down" style="font-size: 10px;"></i>
                            </button>
                            
                            <div id="langDropdownContent" style="display: none; position: absolute; left: 50%; transform: translateX(-50%); top: 50px; background-color: #ffffff; min-width: 200px; box-shadow: 0px 10px 30px rgba(0,0,0,0.2); z-index: 9999; border-radius: 12px; padding: 10px; border: 1px solid #eee;">
                                <a href="javascript:void(0)" onclick="changeLanguage('en', 'English')" class="lang-item" style="display: flex; align-items: center; gap: 10px; padding: 10px; color: #333; text-decoration: none;">
                                    <img src="{{ asset('assets/images/flags/uk_flag.png') }}" width="20"> English
                                </a>
                                <a href="javascript:void(0)" onclick="changeLanguage('fr', 'French')" class="lang-item" style="display: flex; align-items: center; gap: 10px; padding: 10px; color: #333; text-decoration: none;">
                                    <img src="{{ asset('assets/images/flags/french_flag.jpg') }}" width="20"> France
                                </a>
                                <a href="javascript:void(0)" onclick="changeLanguage('it', 'Italian')" class="lang-item" style="display: flex; align-items: center; gap: 10px; padding: 10px; color: #333; text-decoration: none;">
                                    <img src="{{ asset('assets/images/flags/italy_flag.jpg') }}" width="20"> Italy
                                </a>
                            </div>
                        </div>

                        <h2 style="font-weight: 700; color: #1a1a1a; margin-bottom: 5px; text-align: center;">Welcome Back</h2>
                        <p class="text-center" style="color: #777777; margin-bottom: 30px; font-size: 14px;">Please enter your credentials to access your account.</p>
                        @if(session()->has('success'))
                           <div style="background: rgba(40, 167, 69, 0.15); border: 1px solid #28a745; color: #1e7e34; padding: 15px; border-radius: 12px; margin-bottom: 20px; font-size: 14px; text-align: center; font-weight: 600;">
                                <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                                {{ session('success') }}
                           </div>
                        @endif
                        <form wire:submit.prevent="login">
                            <div class="form-group mb-4">
                                <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #333;">Username</label>
                                <input type="text" wire:model="username" placeholder="Enter your username" 
                                       style="width: 100%; display: block; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 12px; padding: 15px; color: #333; outline: none; transition: 0.3s;">
                                @error('username') <div style="color: #e63946; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #333;">Password</label>
                                <input type="password" wire:model="password" placeholder="••••••••" 
                                       style="width: 100%; display: block; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 12px; padding: 15px; color: #333; outline: none;">
                                @error('password') <div style="color: #e63946; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-5">
                                <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #333;">Verification Code</label>
                                <div style="display:flex; gap:10px; align-items:center;">
                                    <div class="captcha-container" style="position: relative; overflow: hidden; background: #222; border-radius: 10px; padding: 10px 20px; min-width: 130px; height: 55px; display: flex; align-items: center; justify-content: center;">
                                        <div class="captcha-noise"></div>
                                        <div class="captcha-text" style="position: relative; z-index: 2; display: flex; gap: 5px;">
                                            @foreach(str_split($captcha_code) as $char)
                                                <span class="captcha-char" style="display: inline-block; color: #fff; font-family: 'Courier New', monospace; font-weight: 900; font-size: 24px; letter-spacing: 4px; text-shadow: 2px 2px 0px rgba(255,255,255,0.2); transform: rotate({{ rand(-30, 30) }}deg) translateY({{ rand(-5, 5) }}px) scale({{ rand(8, 12) / 10 }}); filter: blur(0.4px); user-select: none;">{{ $char }}</span>
                                            @endforeach
                                        </div>
                                        <div style="position: absolute; width: 100%; height: 1px; background: rgba(255,255,255,0.3); top: 50%; transform: rotate({{ rand(-10, 10) }}deg); z-index: 3;"></div>
                                        <div style="position: absolute; width: 100%; height: 1.5px; background: rgba(255,255,255,0.2); top: 40%; transform: rotate({{ rand(-5, 5) }}deg); z-index: 3;"></div>
                                    </div>

                                    <input type="text" wire:model="captcha_input" placeholder="Code" 
                                           style="flex-grow:1; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 15px; color: #333; height: 55px;">
                                    
                                    <button type="button" wire:click="generateCaptcha" style="background: none; border: none; color: #777; cursor: pointer;">
                                         <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>
                                @error('captcha_input') <div style="color: #e63946; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
                            </div>
                             <style>
                            /* Animated TV Static / Noise Effect */
                            .captcha-noise {
                                position: absolute;
                                top: 0; left: 0; width: 200%; height: 200%;
                                background-image: url('grainy-gradients.vercel.app'); /* Modern 2026 noise source */
                                opacity: 0.15;
                                animation: noise-shift 0.2s steps(2) infinite;
                                z-index: 1;
                                pointer-events: none;
                                     }

                                @keyframes noise-shift {
                                0% { transform: translate(0,0); }
                                100% { transform: translate(-5%, -5%); }
                                }

                            .captcha-char {
                                transition: transform 0.3s ease;
                                }
                        </style>
                            <button type="submit" class="theme-btn btn-style-one" style="width: 100%; border: none; border-radius: 12px; padding: 15px; font-weight: 700;">
                                <span class="btn-title">Login to Account</span>
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <p style="font-size: 14px; color: #777;">
                                Don’t have an account? <a href="{{ route('register') }}" style="color: #ffffff font-weight: 700; text-decoration: underline;">Register here</a>
                            </p>
                            <p style="font-size: 13px; color: #999;">
                                Forgotten your password? <a href="{{ route('user.service') }}" style="color: #ffffff; font-weight: 600; text-decoration: underline;">Contact Customer Service To Reset</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <style>
    /* 1. THE GLASSMORPHISM WINDOW (Natural Position) */
    .login-window {
        /* REMOVED: margin-top: -180px */
        margin-top: 0 !important; 
        
        /* Option 1: Dark Glass - Adjusted for solid backgrounds */
        background: rgba(20, 20, 20, 0.95) !important; 
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        
        /* Layout & Aesthetics */
        border-radius: 24px;
        padding: 40px;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3) !important;
        
        position: relative !important;
        z-index: 10 !important;
        overflow: visible !important;
    }

    /* 2. TEXT CONTRAST */
    .login-window h2, 
    .login-window p, 
    .login-window label {
        color: #ffffff !important;
    }

    /* 3. INPUT FIELD STYLING (Dark Theme) */
    .login-window input {
        background: rgba(255, 255, 255, 0.08) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        color: #ffffff !important;
        border-radius: 12px;
        padding: 15px;
        transition: all 0.3s ease;
    }

    .login-window input:focus {
        background: rgba(255, 255, 255, 0.12) !important;
        border-color: rgba(255, 255, 255, 0.5) !important;
        outline: none;
    }

    /* 4. LANGUAGE DROPDOWN RE-STYLE */
    #langSwitcherBtn {
        background: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        color: #fff !important;
        padding: 10px 20px;
        border-radius: 12px;
    }

    #langDropdownContent {
        display: none;
        flex-direction: column; 
        position: absolute; 
        left: 50%;
        top: 55px; /* Sits naturally below the button */
        transform: translateX(-50%);
        z-index: 99999 !important;
        background: #ffffff !important; 
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        padding: 10px 0;
        min-width: 180px;
    }

    .lang-item {
        color: #333 !important;
        padding: 12px 20px;
        display: flex !important;
        align-items: center;
        gap: 10px;
        text-decoration: none !important;
    }

    /* 5. CLEANUP GOOGLE UI */
    .goog-te-banner-frame, .goog-te-gadget, #goog-gt-tt, .skiptranslate { 
        display: none !important; 
    }
    body { top: 0px !important; position: static !important; }
</style>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('langSwitcherBtn');
        const dropdown = document.getElementById('langDropdownContent');

        if (!btn || !dropdown) return;

        // 1. Toggle Dropdown
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            const isVisible = dropdown.style.display === 'flex';
            dropdown.style.display = isVisible ? 'none' : 'flex';
        });

        // 2. Close on outside click
        document.addEventListener('click', (e) => {
            if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });

        // 3. Persistent UI Cleanup (Google Translate Guard)
        const cleanupGoogleUI = () => {
            document.body.style.top = "0px";
            document.documentElement.style.marginTop = "0px";
            
            const googleElements = document.querySelectorAll('.goog-te-banner-frame, .skiptranslate, #goog-gt-tt, .goog-te-balloon-frame');
            googleElements.forEach(el => {
                if (!el.contains(btn)) el.style.setProperty('display', 'none', 'important');
            });
        };

        // Initialize Observer to keep Google UI hidden
        new MutationObserver(cleanupGoogleUI).observe(document.documentElement, { 
            attributes: true, 
            childList: true, 
            subtree: true 
        });
    });

    /**
     * Change Language Function
     * Triggered by the custom dropdown items
     */
    function changeLanguage(langCode, langName) {
        const googleSelect = document.querySelector('select.goog-te-combo');
        const dropdown = document.getElementById('langDropdownContent');
        const currentText = document.getElementById('currentLangText');

        if (googleSelect) {
            googleSelect.value = langCode;
            googleSelect.dispatchEvent(new Event('change'));
            
            if (currentText) currentText.innerText = langName;
            if (dropdown) dropdown.style.display = 'none';

            // Catch any delayed Google UI shifts
            setTimeout(() => {
                document.body.style.top = "0px";
            }, 500);
        } else {
            // Retry if Google Translate isn't fully loaded yet
            setTimeout(() => changeLanguage(langCode, langName), 500);
        }
    }
</script>
   
</div>