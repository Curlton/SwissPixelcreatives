<div class="auto-container">
    <div class="row clearfix justify-content-center">
        <div class="col-lg-6 col-md-10 col-sm-12">
            
            <!-- Professional Card Container -->
            <div class="login-window anim-fade-move" style="background: #ffffff; border: 1px solid #eeeeee; border-radius: 20px; padding: 40px; margin: 60px 0; box-shadow: 0 20px 40px rgba(0,0,0,0.06); position: relative; z-index: 10;">
                
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
                        <!-- Column 1: Username -->
                        <div class="form-group col-md-6 mb-3">
                            <label style="font-weight: 600; color: #333; font-size: 14px;">Username</label>
                            <input type="text" wire:model="username" placeholder="Username" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333; outline: none;">
                            @error('username') <div style="color: #e63946; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
                        </div>

                        <!-- Column 1: Phone -->
                        <div class="form-group col-md-6 mb-3">
                            <label style="font-weight: 600; color: #333; font-size: 14px;">Phone Number</label>
                            <input type="text" wire:model="phone_no" placeholder="Phone" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333;">
                            @error('phone_no') <div style="color: #e63946; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group col-md-12 mb-3">
                            <label style="font-weight: 600; color: #333; font-size: 14px;">Email Address</label>
                            <input type="email" wire:model="email" placeholder="email@example.com" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333;">
                            @error('email') <div style="color: #e63946; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
                        </div>
                        
                        <!-- Password -->
                        <div class="form-group col-md-6 mb-3">
                            <label style="font-weight: 600; color: #333; font-size: 14px;">Password</label>
                            <input type="password" wire:model="password" placeholder="••••••••" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333;">
                        </div>
                        
                        <!-- Confirm Password -->
                        <div class="form-group col-md-6 mb-3">
                            <label style="font-weight: 600; color: #333; font-size: 14px;">Confirm Password</label>
                            <input type="password" wire:model="password_confirmation" placeholder="••••••••" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333;">
                        </div>
                        @error('password') <div class="col-md-12" style="color: #e63946; font-size: 12px; margin-bottom: 10px;">{{ $message }}</div> @enderror

                        <!-- Referral -->
                        <div class="form-group col-md-12 mb-3">
                            <label style="font-weight: 600; color: #333; font-size: 14px;">Referral Code (optional)</label>
                            <input type="text" wire:model="referral_code" placeholder="Optional" style="width: 100%; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 12px; color: #333;">
                        </div>

                        
                    <div class="form-group mb-5">
    <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #333;">Verification Code</label>
    <div style="display:flex; gap:10px; align-items:center;">
        
        <!-- Distorted Captcha Box -->
        <div class="captcha-container" style="position: relative; overflow: hidden; background: #222; border-radius: 10px; padding: 10px 20px; min-width: 130px; height: 55px; display: flex; align-items: center; justify-content: center;">
            
            <!-- Animated Noise Overlay -->
            <div class="captcha-noise"></div>
            
            <!-- Distorted Characters -->
            <div class="captcha-text" style="position: relative; z-index: 2; display: flex; gap: 5px;">
                @foreach(str_split($captcha_code) as $char)
                    <span class="captcha-char" style="
                        display: inline-block;
                        color: #fff;
                        font-family: 'Courier New', monospace;
                        font-weight: 900;
                        font-size: 24px;
                        letter-spacing: 4px;
                        text-shadow: 2px 2px 0px rgba(255,255,255,0.2);
                        transform: rotate({{ rand(-30, 30) }}deg) translateY({{ rand(-5, 5) }}px) scale({{ rand(8, 12) / 10 }});
                        filter: blur(0.4px);
                        user-select: none;
                    ">{{ $char }}</span>
                @endforeach
            </div>

            <!-- Fake Distraction Lines -->
            <div style="position: absolute; width: 100%; height: 1px; background: rgba(255,255,255,0.3); top: 50%; transform: rotate({{ rand(-10, 10) }}deg); z-index: 3;"></div>
            <div style="position: absolute; width: 100%; height: 1.5px; background: rgba(255,255,255,0.2); top: 40%; transform: rotate({{ rand(-5, 5) }}deg); z-index: 3;"></div>
        </div>

        <input type="text" wire:model="captcha_input" placeholder="Code" 
               style="flex-grow:1; background: #f9f9f9; border: 1px solid #e0e0e0; border-radius: 10px; padding: 15px; color: #333; height: 55px;">
        
        <button type="button" wire:click="generateCaptcha" style="background: none; border: none; color: #777; cursor: pointer;">
            <i class="fal fa-sync"></i>
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

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <button type="submit" class="theme-btn btn-style-one w-100" style="width: 100%; border: none;">
                                <span class="btn-title">Register Account</span>
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
