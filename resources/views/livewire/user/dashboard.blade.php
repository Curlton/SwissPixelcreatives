<!-- SINGLE MAIN ROOT DIV -->
<div class="dashboard-wrapper">
    <div class="container py-4">
        
        <!-- SUB-DIV 1: USER INFO, STATS, AND MENUS -->
<div class="card border-0 shadow-lg p-4 p-md-5 mb-4" 
     style="background-color: #f0f7ff; /* Pale Blue */
            border: 2px solid; 
            border-image: linear-gradient(45deg, #d4af37, #f9e29c, #b8860b) 1; /* Golden Gradient Border */
            border-radius: 2rem;
            overflow: hidden; /* Ensures background stays inside the radius */">
    
    <!-- Centered Username -->
<div class="text-center mb-5">
    <div class="d-inline-block p-3 rounded-circle bg-blue-100 mb-3 shadow-sm" style="border: 1px solid #d4af37;">
        <i class="ri-user-smile-line fs-1 text-primary"></i>
    </div>
    <h2 class="fw-bold text-dark mb-0">{{ auth()->user()->username ?? 'Guest' }}</h2>
    
    <!-- Dynamic Level Badge -->
    <span class="badge px-3 rounded-pill shadow-md" 
          style="background-color: #1e293b; color: #ffffff; border: 1px solid #d4af37; font-weight: 600; letter-spacing: 0.5px;">
        {{ auth()->user()->level->level_name ?? 'VIP 1 Bronze' }}
    </span>
    
</div>


    <!-- Stats: Balance & Profit -->
    <div class="row g-3 mb-5 justify-content-center">
    <!-- Balance Card -->
    <div class="col-10 col-md-5">
        <div class="p-3 shadow-sm text-center"
             style="background-color: #ffffff; 
                    border: 2px solid #d4af37; /* Solid Metallic Gold */
                    border-radius: 1.5rem; 
                    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.1); /* Subtle Gold Glow */">
            <small class="text-muted text-uppercase fw-bold d-block mb-1" 
                   style="font-size: 0.7rem; letter-spacing: 1px; font-family: 'Inter', sans-serif;">
                Balance
            </small>
            <h3 class="fw-black text-primary mb-0" 
                style="font-family: 'Segoe UI', Roboto, sans-serif; font-size: 1rem; font-weight: 500;">
                ${{ number_format(auth()->user()->balance ?? 0, 2) }}
            </h3>
        </div>
    </div>

    <!-- Today's Profit Card -->
    <div class="col-10 col-md-5">
        <div class="p-3 shadow-sm text-center"
             style="background-color: #ffffff; 
                    border: 2px solid #d4af37; /* Solid Metallic Gold */
                    border-radius: 1.5rem;
                    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.1); /* Subtle Gold Glow */">
            <small class="text-muted text-uppercase fw-bold d-block mb-1" 
                   style="font-size: 0.7rem; letter-spacing: 1px; font-family: 'Inter', sans-serif;">
                Today's Profit
            </small>
            <h3 class="fw-black text-success mb-0" 
                style="font-family: 'Segoe UI', Roboto, sans-serif; font-size: 1rem; font-weight: 500;">
                +${{ number_format(auth()->user()->today_profit ?? 0, 2) }}
            </h3>
        </div>
    </div>
</div>



           <!-- 8 Menu Grid -->
<div class="row g-3 row-cols-2 row-cols-md-4">
    <div class="col">
        <a href="{{ route('user.events') }}" wire:navigate class="menu-item">
            <i class="ri-calendar-todo-line text-primary"></i>
            <span>Events</span>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('user.recharge') }}" wire:navigate class="menu-item">
            <i class="ri-wallet-3-line text-success"></i>
            <span>Top Up</span>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('user.withdraw.methods') }}" wire:external class="menu-item">
            <i class="ri-hand-coin-line text-success"></i>
            <span>Withdraw</span>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('user.service') }}" wire:navigate class="menu-item">
            <i class="ri-customer-service-line text-warning"></i>
            <span>Service</span>
        </a>
    </div>
    <div class="col">
    <a href="{{ route('about') }}" class="menu-item"> <!-- wire:navigate removed -->
        <i class="ri-government-line text-info"></i>
        <span>Company</span>
    </a>
</div>

    <div class="col">
        <a href="{{ route('terms') }}" wire:navigate class="menu-item">
            <i class="ri-shield-check-line text-secondary"></i>
            <span>T&Cs</span>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('faqs') }}" wire:navigate class="menu-item">
            <i class="ri-questionnaire-line text-info"></i>
            <span>FAQs</span>
        </a>
    </div>
    <div class="col">
        <a href="{{ route('certificate-viewer') }}" wire:navigate class="menu-item">
            <i class="ri-award-line text-indigo"></i>
            <span>Certificates</span>
        </a>
    </div>
</div>

</div>
    
<!-- SUB-DIV 2: MEMBERSHIP LEVELS -->
<div class="card-body p-3">
    <div class="list-group list-group-flush gap-3">
        @php
            // Your exact hardcoded array for visual formality
            $levels = [
                ['id' => 1, 'name' => 'VIP 1 BRONZE > $100',   'pct' => '0.8%', 'bg' => 'linear-gradient(135deg, #ffffff 0%, #fff4ed 100%)', 'border' => '#cd7f32', 'text' => '#5c2d13', 'icon' => 'ri-medal-line'],
                ['id' => 2, 'name' => 'VIP 2 SILVER > $500',   'pct' => '3.0%', 'bg' => 'linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%)', 'border' => '#475569', 'text' => '#1e293b', 'icon' => 'ri-medal-fill'],
                ['id' => 3, 'name' => 'VIP 3 GOLD > $1000',     'pct' => '4.5%', 'bg' => 'linear-gradient(135deg, #ffffff 0%, #fffbeb 100%)', 'border' => '#b45309', 'text' => '#78350f', 'icon' => 'ri-vip-crown-2-line'],
                ['id' => 4, 'name' => 'VIP 4 PLATINUM > $3000', 'pct' => '6.0%', 'bg' => 'linear-gradient(135deg, #ffffff 0%, #f8fafc 100%)', 'border' => '#0f172a', 'text' => '#020617', 'icon' => 'ri-vip-crown-fill'],
                ['id' => 5, 'name' => 'VIP 5 DIAMOND > $6000',  'pct' => '8.5%', 'bg' => 'linear-gradient(135deg, #ffffff 0%, #f5f3ff 100%)', 'border' => '#5b21b6', 'text' => '#2e1065', 'icon' => 'ri-vip-diamond-line'],
            ];
            
            $currentUserRank = auth()->user()->membership_id ?? 1;
        @endphp

        @foreach($levels as $level)
            @php 
                $isActive = ($currentUserRank == $level['id']);
                $isLocked = ($level['id'] > $currentUserRank);
                // Define icon fallback if not provided in original array
                $icon = $level['icon'] ?? 'ri-vip-crown-line'; 
            @endphp

            @if($isLocked)
                <!-- LOCKED TIER STYLE -->
                <div class="list-group-item p-4 rounded-4 border-0 shadow-sm opacity-50" 
                     style="background: #e2e8f0; border: 1px dashed #94a3b8 !important; cursor: not-allowed;">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-white" 
                                 style="width: 54px; height: 54px; border: 2px solid #94a3b8;">
                                <i class="ri-lock-password-line fs-3 text-muted"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-muted">{{ $level['name'] }}</h6>
                                <small class="text-muted">Locked - Upgrade required</small>
                            </div>
                        </div>
                        <!-- Hardcoded commission figure at extreme right (muted) -->
                        <span class="badge bg-light text-muted border shadow-sm" style="font-size: 0.7rem;">
                            Comm: {{ $level['pct'] }}
                        </span>
                    </div>
                </div>
            @else
                <!-- ACTIVE/UNLOCKED TIER STYLE (Added shadow-lg) -->
                <div class="list-group-item p-4 rounded-4 border-0 shadow-lg position-relative overflow-hidden mb-2" 
                     style="background: {{ $level['bg'] }}; border: 2px solid {{ $level['border'] }} !important;">
                    
                    @if($isActive)
    <!-- Premium Purple Active Plan Badge -->
    <div class="position-absolute top-0 end-0 px-3 py-1 rounded-bl-4 shadow-sm" 
         style="background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); /* Indigo to Purple Gradient */
                color: #ffffff; 
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
                font-size: 0.6rem; 
                font-weight: 800; 
                letter-spacing: 0.8px; 
                text-transform: uppercase;
                border-left: 1px solid rgba(255,255,255,0.2);
                border-bottom: 1px solid rgba(255,255,255,0.2);
                z-index: 10;">
        <i class="ri-checkbox-circle-fill me-1" style="font-size: 0.7rem;"></i> ACTIVE PLAN
    </div>
@endif


                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 54px; height: 54px; background: {{ $level['border'] }}; color: white;">
                                <i class="{{ $icon }} fs-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold" style="color: {{ $level['text'] }};">{{ $level['name'] }}</h6>
                                <small style="color: {{ $level['text'] }}; opacity: 0.8;">
                                    {{ $isActive ? 'Your current earning tier' : 'Unlocked benefits' }}
                                </small>
                            </div>
                        </div>

                        <!-- Hardcoded commission figure at extreme right -->
                        <span class="badge bg-white text-dark border shadow-sm" style="font-size: 0.7rem;">
                            Comm: {{ $level['pct'] }}
                        </span>

                        @if(!$isActive)
                             <!-- Removed extra check icon -->
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

    <!--FOOTER-->
    <div class="card-footer bg-white border-0 text-center py-4">
        <a href="javascript:void(0);" 
           class="text-decoration-none small fw-black uppercase tracking-widest"
           style="color: var(--color-gold-dark); border-bottom: 2px solid var(--color-gold-primary); padding-bottom: 4px;">
            View Upgrade Requirements
        </a>
    </div>

    
</div> <!-- END OF SINGLE MAIN ROOT DIV -->
