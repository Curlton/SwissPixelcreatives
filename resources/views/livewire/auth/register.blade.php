<div>
    <section class="page-title pt-5" style="background-image: url({{ asset('home/images/background/page-title.jpg') }}); padding: 80px 0;">
        <div class="auto-container">
            <div class="title-outer text-center">
                <h1 class="title" style="color: white; font-weight: 800;">Join Our Community</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li style="color: rgba(255,255,255,0.7);">Create Account</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="ks-service-area" style="background: #f4f7f6; padding: 60px 0 100px;">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 col-sm-12">
                    
                    <div class="login-window anim-fade-move" style="background: #ffffff; border: 1px solid #eeeeee; border-radius: 20px; padding: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.06); position: relative; z-index: 10;">
                        
                        <div class="text-center mb-4">
                            <button type="button" id="langSwitcherBtn" style="background: #f9f9f9; border: 1px solid #e0e0e0; padding: 10px 20px; border-radius: 12px; cursor: pointer; color: #333; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; position: relative; z-index: 100001;">
                                <i class="fas fa-globe"></i> 
                                <span id="currentLangText">Select Language</span>
                                <i class="fas fa-chevron-down" style="font-size: 10px;"></i>
                            </button>
                            
                            <div id="langDropdownContent" style="display: none; position: fixed; background-color: #ffffff; min-width: 200px; box-shadow: 0px 10px 30px rgba(0,0,0,0.2); z-index: 2147483647; border-radius: 12px; padding: 8px 0; border: 1px solid #eee;">
                                <a href="javascript:void(0)" onclick="changeLanguage('en', 'English')" class="lang-item" style="display: flex; align-items: center; gap: 10px; padding: 10px 20px; color: #333; text-decoration: none;">
                                    <img src="{{ asset('assets/images/flags/uk_flag.png') }}" width="20"> <span>English</span>
                                </a>
                                <a href="javascript:void(0)" onclick="changeLanguage('fr', 'French')" class="lang-item" style="display: flex; align-items: center; gap: 10px; padding: 10px 20px; color: #333; text-decoration: none;">
                                    <img src="{{ asset('assets/images/flags/french_flag.jpg') }}" width="20"> <span>French</span>
                                </a>
                                <a href="javascript:void(0)" onclick="changeLanguage('it', 'Italian')" class="lang-item" style="display: flex; align-items: center; gap: 10px; padding: 10px 20px; color: #333; text-decoration: none;">
                                    <img src="{{ asset('assets/images/flags/italy_flag.jpg') }}" width="20"> <span>Italian</span>
                                </a>
                            </div>
                        </div>

                        <div class="sec-title text-center mb-4">
                            <h2 style="font-weight: 700; color: #1a1a1a;">Create Account</h2>
                            <div class="text" style="color: #777;">Enter your details below to register.</div>
                        </div>

                        @if(session()->has('success'))
                            <div style="background: rgba(40, 167, 69, 0.1); border: 1px solid #28a745; color: #28a745; padding: 12px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; text-align: center;">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form wire:submit.prevent="register">
                            <div class="row clearfix">
                                <div class="form-group col-md-6 mb-3">
                                    <label style="font-weight: 600; color: #333; font-size: 14px;">Username</label>
                                    <input type="text" wire:model="username" placeholder="Username" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333; outline: none;">
                                    @error('username') <div style="color: #e63946; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label style="font-weight: 600; color: #333; font-size: 14px;">Phone Number</label>
                                    <input type="text" wire:model="phone_no" placeholder="Phone" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333;">
                                    @error('phone_no') <div style="color: #e63946; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label style="font-weight: 600; color: #333; font-size: 14px;">Email Address</label>
                                    <input type="email" wire:model="email" placeholder="email@example.com" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333;">
                                    @error('email') <div style="color: #e63946; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="form-group col-md-6 mb-3">
                                    <label style="font-weight: 600; color: #333; font-size: 14px;">Password</label>
                                    <input type="password" wire:model="password" placeholder="••••••••" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333;">
                                </div>
                                
                                <div class="form-group col-md-6 mb-3">
                                    <label style="font-weight: 600; color: #333; font-size: 14px;">Confirm Password</label>
                                    <input type="password" wire:model="password_confirmation" placeholder="••••••••" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333;">
                                </div>
                                @error('password') <div class="col-md-12" style="color: #e63946; font-size: 12px; margin-bottom: 10px;">{{ $message }}</div> @enderror

                                <div class="form-group col-md-12 mb-3">
                                    <label style="font-weight: 600; color: #333; font-size: 14px;">Referral Code (optional)</label>
                                    <input type="text" wire:model="referral_code" placeholder="Optional" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333;">
                                </div>

                                <div class="form-group col-md-12 mb-5">
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

                                        <input type="text" wire:model="captcha_input" placeholder="Code" style="flex-grow:1; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 15px; color: #333; height: 55px;">
                                        
                                        <button type="button" wire:click="generateCaptcha" style="background: none; border: none; color: #777; cursor: pointer;">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </div>
                                    @error('captcha_input') <div style="color: #e63946; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="theme-btn btn-style-one w-100" style="width: 100%; border: none; border-radius: 10px; padding: 15px;">
                                        <span class="btn-title" style="color: #fff; font-weight: 700;">Register Account</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p style="font-size: 14px; color: #777;">
                                Already have an account? <a href="{{ route('login') }}" style="color: #1a1a1a; font-weight: 700; text-decoration: underline;">Login here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <style>
    /* 1. LAYOUT & INTERACTION */
    /* We keep this simple so standard browser behavior handles the clicks */
    .login-window {
        position: relative;
        z-index: 10;
        pointer-events: auto !important;
    }

    /* 2. DROPDOWN STYLING */
    #langDropdownContent { 
        flex-direction: column; 
        overflow: hidden; 
        border: 1px solid #eeeeee;
        box-shadow: 0px 10px 30px rgba(0,0,0,0.1);
    }
    
    .lang-item {
        display: flex !important;
        align-items: center;
        gap: 12px;
        padding: 12px 20px;
        color: #333333 !important;
        text-decoration: none !important;
        cursor: pointer !important;
        border-bottom: 1px solid #f8f9fa;
        width: 100%;
        transition: background 0.2s ease;
    }
    
    .lang-item:hover { 
        background-color: #f1f3f5; 
        color: #000 !important; 
    }
    
    .lang-item:last-child { 
        border-bottom: none; 
    }

    /* 3. CAPTCHA STYLES */
    .captcha-noise {
        position: absolute; 
        top: 0; 
        left: 0; 
        width: 200%; 
        height: 200%;
        background-image: url('https://grainy-gradients.vercel.app/noise.svg'); 
        opacity: 0.15; 
        animation: noise-shift 0.2s steps(2) infinite; 
        z-index: 1;
        pointer-events: none;
    }
    
    @keyframes noise-shift { 
        0% { transform: translate(0,0); } 
        100% { transform: translate(-5%, -5%); } 
    }

    /* 4. GOOGLE TRANSLATE CLEANUP */
    /* This ensures the Google bar never pushes your header down */
    iframe.goog-te-banner-frame, 
    .goog-te-gadget, 
    #goog-gt-tt, 
    .skiptranslate, 
    #google_translate_element2 { 
        display: none !important; 
        visibility: hidden !important; 
    }
    
    body { 
        top: 0px !important; 
        position: static !important; 
    }
    
    .translated-ltr, .translated-rtl { 
        margin-top: 0px !important; 
    }

    /* 5. INPUT ENHANCEMENTS */
    /* Adding a subtle focus effect to match the professional card style */
    .login-window input:focus {
        border-color: #3498db !important;
        background-color: #ffffff !important;
        box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
        outline: none;
    }
    /* Ensure the page title section expands with long text */
.page-title {
    padding: 120px 0 60px !important; /* Increased top padding to clear the header */
    height: auto !important;         /* Allow height to grow with content */
    min-height: 250px;               /* Ensures a consistent look */
    display: flex;
    align-items: center;
}

.title-outer {
    position: relative;
    z-index: 1;
    width: 100%;
}

/* Make the text responsive so it shrinks on small screens instead of overlapping */
.title-outer .title {
    font-size: clamp(28px, 5vw, 48px) !important; 
    line-height: 1.2em !important;
    margin-bottom: 10px;
    word-wrap: break-word; /* Prevents long words from breaking layout */
}
</style>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('langSwitcherBtn');
        const dropdown = document.getElementById('langDropdownContent');

        if (!btn || !dropdown) return;

        // 1. Toggle Dropdown (Relative to parent now)
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const isVisible = dropdown.style.display === 'flex';
            dropdown.style.display = isVisible ? 'none' : 'flex';
        });

        // 2. Close on outside click
        document.addEventListener('click', () => {
            dropdown.style.display = 'none';
        });

        // 3. Prevent clicks inside dropdown from closing it
        dropdown.addEventListener('click', (e) => e.stopPropagation());

        // 4. Google Translate UI Guard
        const observer = new MutationObserver(cleanupGoogleUI);
        observer.observe(document.documentElement, { 
            attributes: true, 
            childList: true, 
            subtree: true 
        });
    });

    function changeLanguage(langCode, langName) {
        const googleSelect = document.querySelector('select.goog-te-combo');
        if (googleSelect) {
            googleSelect.value = langCode;
            googleSelect.dispatchEvent(new Event('change'));
            
            // Update visual UI
            const label = document.getElementById('currentLangText');
            if (label) label.innerText = langName;
            
            document.getElementById('langDropdownContent').style.display = 'none';
            setTimeout(cleanupGoogleUI, 300);
        } else {
            // Re-try if Google script is still loading
            setTimeout(() => changeLanguage(langCode, langName), 500);
        }
    }

    function cleanupGoogleUI() {
        document.body.style.top = "0px";
        document.documentElement.style.marginTop = "0px";
        // Nuclear hide for the Google Top Bar
        const googleBars = document.querySelectorAll('.goog-te-banner-frame, .skiptranslate, #goog-gt-tt');
        googleBars.forEach(bar => {
            if (!bar.contains(document.getElementById('langSwitcherBtn'))) {
                bar.style.setProperty('display', 'none', 'important');
            }
        });
    }
</script>
</div>
