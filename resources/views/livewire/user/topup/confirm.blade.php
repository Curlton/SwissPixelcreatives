<div>
<div class="max-w-lg mx-auto mt-10">
    <div class="bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden">
        
        <!-- Card Header -->
        <div class="bg-slate-900 p-8 text-center">
            <h2 class="text-white text-2xl font-black uppercase tracking-tight">Complete Payment</h2>
            <p class="text-slate-400 text-sm mt-1">Send funds to the address below</p>
        </div>

        <div class="p-8">
            <!-- Payment Summary -->
            <div class="flex justify-between items-center bg-slate-50 p-4 rounded-2xl mb-6">
                <span class="text-slate-500 font-bold">Amount to Pay:</span>
                <span class="text-2xl font-black text-blue-600">{{ number_format($amount, 2) }} <span class="text-sm">USDT</span></span>
            </div>

            <!-- Wallet Address Section -->
<div class="mb-8" x-data="{ 
    address: '{{ $walletAddress }}', 
    copied: false,
    copyText() {
        if (!this.address || this.address.includes('not found')) return;
        navigator.clipboard.writeText(this.address);
        this.copied = true;
        setTimeout(() => this.copied = false, 2000);
    }
}">
    <label class="text-xs font-black text-slate-400 uppercase block mb-2">
        {{ $method }} Wallet Address
    </label>
    
    <div class="flex items-center gap-3 p-4 bg-slate-50 border border-slate-200 rounded-2xl relative transition-all"
         :class="copied ? 'border-green-500 bg-green-50' : ''">
        
        <!-- The Actual Address -->
        <span class="text-sm font-mono font-bold text-slate-700 break-all select-all" 
              x-text="address"></span>
        
        <!-- Copy Button -->
        <button @click="copyText" 
                type="button"
                class="shrink-0 p-2.5 rounded-xl shadow-sm transition-all duration-200"
                :class="copied ? 'bg-green-500 text-white' : 'bg-white text-slate-600 hover:bg-slate-100 border'">
            
            <!-- Standard Copy Icon -->
            <svg x-show="!copied" xmlns="www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy">
                <rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/>
            </svg>

            <!-- Success/Check Icon -->
            <svg x-show="copied" xmlns="www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check">
                <path d="M20 6 9 17l-5-5"/>
            </svg>
        </button>

        <!-- Tooltip Label -->
        <span x-show="copied" 
              x-transition 
              class="absolute -top-8 right-0 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded">
            COPIED!
        </span>
    </div>
</div>


            <!-- Transaction Form -->
            <form wire:submit.prevent="confirmPayment" class="space-y-6">
                <div>
                    <label class="text-xs font-black text-slate-400 uppercase block mb-2">Provide Transaction ID</label>
                    <input type="text" 
                           wire:model="trxID" 
                           placeholder="TrxID" 
                           class="w-full p-4 bg-slate-50 border-none rounded-2xl font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 @error('trxID') ring-2 ring-red-500 @enderror">
                    @error('trxID') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                </div>

                <button type="submit" 
                        class="w-full py-5 bg-teal-500 hover:bg-teal-600 text-white rounded-2xl font-black text-lg shadow-xl shadow-teal-100 transition-all active:scale-95 flex items-center justify-center gap-3">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                    CONFIRM PAYMENT
                </button>
            </form>
            
            <p class="text-center text-[10px] text-slate-400 mt-6 uppercase font-bold tracking-widest">
                Admin will verify your transaction within 30 minutes
            </p>
        </div>
    </div>
</div>
</div>