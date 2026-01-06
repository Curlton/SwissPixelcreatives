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
        <!-- Icon background set to a slightly darker blue to pop against the pale blue -->
        <div class="d-inline-block p-3 rounded-circle bg-blue-100 mb-3 shadow-sm" style="border: 1px solid #d4af37;">
            <i class="ri-user-smile-line fs-1 text-primary"></i>
        </div>
        <h2 class="fw-bold text-dark mb-0">{{ auth()->user()->username ?? 'Guest' }}</h2>
       <span class="badge px-3 rounded-pill shadow-md" 
      style="background-color: #1e293b; /* Dark Navy for high contrast */
             color: #ffffff; 
             border: 1px solid #d4af37; /* Gold border to match the card */
             font-weight: 600;
             letter-spacing: 0.5px;">
    {{ auth()->user()->membership_level ?? 'VIP 1 Bronze' }}
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
            <i class="ri-hand-coin-line text-danger"></i>
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
        <a href="/certificates" wire:navigate class="menu-item">
            <i class="ri-award-line text-indigo"></i>
            <span>Certificates</span>
        </a>
    </div>
</div>

</div>
    
   <!-- SUB-DIV 2: MEMBERSHIP LEVELS -->
<div class="card border-0 shadow-lg overflow-hidden mt-4" 
     style="border-radius: 2rem; border: 2px solid #d4af37; background-color: #f0f7ff;">
    
    <div class="card-header border-0 py-4 px-4 d-flex justify-content-between align-items-center" style="background: transparent;">
        <h6 class="fw-black mb-0 text-dark uppercase tracking-wider" style="font-size: 0.9rem;">
            <i class="ri-vip-crown-line me-2 text-warning fs-5"></i>Membership Levels
        </h6>
        <span class="badge rounded-pill px-3 py-2 shadow-sm" 
              style="background-color: #1e293b; color: #ffffff; font-size: 0.7rem;">
            EXCLUSIVE BENEFITS
        </span>
    </div>

    <div class="card-body p-3">
        <div class="list-group list-group-flush gap-3">
            @php
                $levels = [
                    ['id' => 1, 'name' => 'VIP 1 BRONZE', 'pct' => '0.8%', 'bg' => 'linear-gradient(135deg, #ffffff 0%, #fff4ed 100%)', 'border' => '#cd7f32', 'text' => '#5c2d13'],
                    ['id' => 2, 'name' => 'VIP 2 SILVER', 'pct' => '3.0%', 'bg' => 'linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%)', 'border' => '#475569', 'text' => '#1e293b'],
                    ['id' => 3, 'name' => 'VIP 3 GOLD', 'pct' => '4.5%', 'bg' => 'linear-gradient(135deg, #ffffff 0%, #fffbeb 100%)', 'border' => '#b45309', 'text' => '#78350f'],
                    ['id' => 4, 'name' => 'VIP 4 PLATINUM', 'pct' => '6.0%', 'bg' => 'linear-gradient(135deg, #ffffff 0%, #f8fafc 100%)', 'border' => '#0f172a', 'text' => '#020617'],
                    ['id' => 5, 'name' => 'VIP 5 DIAMOND', 'pct' => '8.5%', 'bg' => 'linear-gradient(135deg, #ffffff 0%, #f5f3ff 100%)', 'border' => '#5b21b6', 'text' => '#2e1065'],
                ];
                
                // Get user rank (e.g., 'VIP 1 BRONZE' -> 1)
                $currentUserLevelName = strtoupper(auth()->user()->membership_level ?? 'VIP 1 BRONZE');
                $currentUserRank = 1; // Default
                foreach($levels as $l) { if($l['name'] === $currentUserLevelName) $currentUserRank = $l['id']; }
            @endphp

            @foreach($levels as $level)
                @php 
                    $isActive = ($currentUserLevelName === $level['name']);
                    $isLocked = ($level['id'] > $currentUserRank);
                @endphp

                @if($isLocked)
                    <!-- LOCKED TIER STYLE -->
                    <div class="list-group-item p-4 rounded-4 border-0 shadow-sm opacity-50" 
                         style="background: #e2e8f0; border: 1px dashed #94a3b8 !important; cursor: not-allowed;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-white" 
                                 style="width: 54px; height: 54px; border: 2px solid #94a3b8;">
                                <i class="ri-lock-password-line fs-3 text-muted"></i>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-bold d-block text-muted mb-0">{{ $level['name'] }}</span>
                                <span class="badge bg-slate-200 text-slate-600 rounded-pill px-2 py-1" style="font-size: 0.6rem;">LOCKED</span>
                            </div>
                            <div class="text-end text-muted">
                                <span class="d-block fw-bold fs-3">{{ $level['pct'] }}</span>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- UNLOCKED/ACTIVE TIER STYLE -->
                    <a href="{{ route('user.drive') }}" wire:navigate 
                       class="list-group-item list-group-item-action p-4 rounded-4 border-0 shadow-sm transition-all"
                       style="background: {{ $level['bg'] }}; border: 2px solid {{ $isActive ? '#d4af37' : $level['border'] }} !important;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-white shadow-sm" 
                                 style="width: 54px; height: 54px; border: 2.5px solid {{ $level['border'] }};">
                                <i class="{{ $isActive ? 'ri-vip-crown-fill' : 'ri-lock-unlock-line' }} fs-3" style="color: {{ $level['border'] }};"></i>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-black d-block mb-0" style="color: {{ $level['text'] }}; font-size: 1.1rem;">{{ $level['name'] }}</span>
                                @if($isActive)
                                    <span class="badge rounded-pill px-2 py-1 mt-1" style="background: #d4af37; color: #1e293b; font-weight: 800; font-size: 0.65rem;">ACTIVE PLAN</span>
                                @else
                                    <span class="text-success small fw-black">UNLOCKED <i class="ri-checkbox-circle-fill"></i></span>
                                @endif
                            </div>
                            <div class="text-end">
                                <span class="d-block fw-black text-primary fs-3">{{ $level['pct'] }}</span>
                                <span class="text-dark small fw-bold">Daily Profit</span>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
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
