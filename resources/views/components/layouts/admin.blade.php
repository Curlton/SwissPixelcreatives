<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    
    
    
    <!-- FIXED: Complete Lucide, ApexCharts, and Alpine CDNs -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Vite Compiled Assets -->
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])

    

    @livewireStyles
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        @persist('sidebar')
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 hidden md:flex flex-col h-screen overflow-hidden">
            <!-- FIXED HEADER -->
            <div class="p-6 text-center border-b border-slate-800 flex-shrink-0">
                <div class="w-20 h-20 mx-auto rounded-full bg-slate-700 border-2 border-blue-500 mb-3 flex items-center justify-center overflow-hidden">
                    @if(auth()->guard('admin')->check() && auth()->guard('admin')->user()->user_image)
                        <img src="{{ asset('storage/' . auth()->guard('admin')->user()->user_image) }}" class="w-full h-full object-cover">
                    @else
                        <i data-lucide="user" class="w-10 h-10 text-slate-400"></i>
                    @endif
                </div>
                <h2 class="text-lg font-bold truncate">{{ auth()->guard('admin')->user()->username ?? 'Admin' }}</h2>
                <span class="text-xs text-green-400 flex items-center justify-center gap-1">
                    <span class="w-2 h-2 bg-green-400 rounded-full"></span> Online
                </span>
            </div>

            <!-- SCROLLABLE NAVIGATION -->
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto sidebar-scroll" x-data="{ openWithdraw: false, openDeposit: false, openPayment: false, openUsers: false }">
                <a href="{{ route('admin.dashboard') }}" wire:navigate class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600' : '' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('admin.dashboard') }}" wire:navigate class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-800 transition">
                    <i data-lucide="database" class="w-5 h-5"></i>
                    <span>Datasets</span>
                </a>

                <!-- Withdraw Menu -->
                <div class="space-y-1">
                    <button @click="openWithdraw = !openWithdraw" class="w-full flex items-center justify-between gap-3 p-3 rounded-lg hover:bg-slate-800 transition text-white group">
                        <div class="flex items-center gap-3">
                            <i data-lucide="wallet" class="w-5 h-5 text-slate-400 group-hover:text-blue-400"></i>
                            <span>Withdraw</span>
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="openWithdraw ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="openWithdraw" x-cloak class="pl-11 space-y-1">
                        <a href="{{ route('admin.withdraw.all') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.withdraw.all') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-white transition">All Withdraw</a>
                        <a href="{{ route('admin.withdraw.pending') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.withdraw.pending') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-white transition">Pending Withdraw</a>
                        <a href="{{ route('admin.withdraw.approved') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.withdraw.approved') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-white transition">Approved Withdraw</a>
                        <a href="{{ route('admin.withdraw.canceled') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.withdraw.canceled') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-red-400 transition">Canceled Withdraw</a>
                    </div>
                </div>

                <!-- Deposit Menu -->
                <div class="space-y-1">
                    <button @click="openDeposit = !openDeposit" class="w-full flex items-center justify-between gap-3 p-3 rounded-lg hover:bg-slate-800 transition text-white group">
                        <div class="flex items-center gap-3">
                            <i data-lucide="hand-coins" class="w-5 h-5 text-slate-400 group-hover:text-green-400"></i>
                            <span>Deposit</span>
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="openDeposit ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="openDeposit" x-cloak class="pl-11 space-y-1">
                        <a href="{{ route('admin.deposit.all') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.deposit.all') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-white transition">All Deposit</a>
                        <a href="{{ route('admin.deposit.pending') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.deposit.pending') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-white transition">Pending Deposit</a>
                        <a href="{{ route('admin.deposit.approved') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.deposit.approved') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-white transition">Approved Deposit</a>
                        <a href="{{ route('admin.deposit.canceled') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.deposit.canceled') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-red-400 transition">Canceled Deposit</a>
                    </div>
                </div>

                <!-- USER MANAGEMENT MENU -->
                <div class="space-y-1">
                    <button @click="openUsers = !openUsers" class="w-full flex items-center justify-between gap-3 p-3 rounded-lg hover:bg-slate-800 transition text-white group">
                        <div class="flex items-center gap-3">
                            <i data-lucide="users" class="w-5 h-5 text-slate-400 group-hover:text-blue-400"></i>
                            <span>User Management</span>
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="openUsers ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="openUsers" x-cloak class="pl-11 space-y-1">
                        <a href="{{ route('admin.users.all') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.users.all') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-white transition">All Users</a>
                        <a href="{{ route('admin.users.active') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.users.active') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-white transition">Active Users</a>
                        <a href="{{ route('admin.users.blocked') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.users.blocked') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-red-400 transition">Blocked Users</a>
                    </div>
                </div>

                <!-- Payment Method Menu -->
                <div class="space-y-1">
                    <button @click="openPayment = !openPayment" class="w-full flex items-center justify-between gap-3 p-3 rounded-lg hover:bg-slate-800 transition text-white group">
                        <div class="flex items-center gap-3">
                            <i data-lucide="credit-card" class="w-5 h-5 text-slate-400 group-hover:text-purple-400"></i>
                            <span>Payment Method</span>
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-200" :class="openPayment ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="openPayment" x-cloak class="pl-11 space-y-1">
                        <a href="{{ route('admin.payment.add') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.payment.add') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-white transition">Add Method</a>
                        <a href="{{ route('admin.payment.manage') }}" wire:navigate class="block py-2 text-sm {{ request()->routeIs('admin.payment.manage') ? 'text-white font-bold' : 'text-slate-400' }} hover:text-white transition">Manage Methods</a>
                    </div>
                </div>

                <!-- Logout -->
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-800 transition text-red-400 mt-10">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </aside>
        @endpersist

        <!-- MAIN CONTENT AREA -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-white border-b flex items-center justify-between px-8 shadow-sm flex-shrink-0">
                <h1 class="text-xl font-semibold text-gray-800">Admin Control Center</h1>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500">{{ now()->format('D, M d, Y') }}</span>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8 sidebar-scroll">
                {{ $slot }}
            </main>
        </div>
       

    </div>
    <!-- FLOATING COMPACT FOOTER (Higher Visibility) -->
<div class="py-6 flex justify-center"> <!-- Reduced padding to pull it up -->
    
    <footer class="max-w-max px-5 py-2.5 rounded-2xl border border-amber-200 bg-gradient-to-b from-yellow-50 to-amber-100 shadow-xl shadow-amber-200/30 flex flex-col sm:flex-row items-center gap-4">
        
        <!-- Copyright Info -->
        <div class="flex items-center gap-2 sm:border-r sm:border-amber-200 sm:pr-4">
            <span class="text-[10px] text-amber-900 font-bold tracking-tight">
                &copy; {{ date('Y') }} 
                <span class="uppercase font-black text-amber-950">CURLTECH™</span>
            </span>
        </div>

        <!-- Developer Badge -->
        <div class="flex items-center gap-2.5">
            <span class="text-[8px] font-black text-amber-700/60 uppercase tracking-widest">Engineered by</span>
            <a href="#" class="group flex items-center gap-2 px-2.5 py-1 bg-slate-900 rounded-lg transition-all hover:bg-black shadow-md">
                <span class="text-[10px] font-black text-amber-400 uppercase tracking-tighter">Curlton</span>
                <span wire:ignore>
                    <i data-lucide="zap" class="w-3 h-3 text-amber-400 fill-amber-400"></i>
                </span>
            </a>
        </div>

    </footer>
</div>

    
    @livewireScripts
    <script>
         

         
        /**
         * Global Initialization Function
         */
        function initAdminUI() {
            // 1. Initialize Lucide Icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // 2. Auto-hide Flash Messages
            const flashMsg = document.getElementById('flash-message');
            if (flashMsg) {
                setTimeout(() => {
                    flashMsg.style.transition = 'opacity 0.5s ease';
                    flashMsg.style.opacity = '0';
                    setTimeout(() => flashMsg.remove(), 500);
                }, 3000);
            }

            // 3. Setup Submit Button Loaders
            document.querySelectorAll('button[type="submit"]').forEach(button => {
                button.addEventListener('click', function(e) {
                    // Prevent double loading
                    if (this.classList.contains('btn-loading')) return;
                    
                    this.classList.add('btn-loading');
                    const loader = document.createElement('span');
                    loader.className = 'loader';
                    this.appendChild(loader);
                });
            });
        }

        // Run on initial load
        document.addEventListener('DOMContentLoaded', initAdminUI);
        // Run after Livewire 3 navigation
        document.addEventListener('livewire:navigated', initAdminUI);
    </script>
</body>
</html>
