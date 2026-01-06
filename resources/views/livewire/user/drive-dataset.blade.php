<!-- SINGLE ROOT DIV -->
<div x-data="{ loadingSet: false }">
    
    <!-- CSS ANIMATIONS -->
<style>
    /* 1. Progress Bar Animation */
    @keyframes fillProgress {
        from { width: 0%; }
        to { width: 100%; }
    }

    /* 2. Spinner Rotation Animation */
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* 3. Apply the spin to the class */
    .animate-spin {
        display: inline-block; /* Critical for icons to rotate */
        animation: spin 1s linear infinite !important;
    }

    /* 4. Utility to hide uninitialized Alpine elements */
    [x-cloak] { display: none !important; }
</style>


    <div class="p-6" wire:poll.10s>
        
        <!-- 1. REALTIME STATS BAR -->
        <div class="row g-4 mb-6">
            <div class="col-6">
                <div class="p-4 bg-white rounded-2xl shadow-md text-center" style="border: 2px solid var(--color-gold-primary);">
                    <small class="text-muted text-uppercase fw-bold d-block mb-1" style="font-size: 0.65rem; letter-spacing: 1px;">Total Balance</small>
                    <p class="font-black text-blue-600 mb-0" style="font-size: 1rem;">${{ number_format(auth()->user()->balance ?? 0, 2) }}</p>
                </div>
            </div>
            <div class="col-6">
                <div class="p-4 bg-white rounded-2xl shadow-md text-center" style="border: 2px solid var(--color-gold-primary);">
                    <small class="text-muted text-uppercase fw-bold d-block mb-1" style="font-size: 0.65rem; letter-spacing: 1px;">Today's Profit</small>
                    <p class="font-black text-brand-secondary mb-0" style="font-size: 1rem;">+${{ number_format(auth()->user()->today_profit ?? 0, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- MAIN DRIVE ACTION CARD -->
 <!-- MAIN DRIVE ACTION CARD -->
    <div class="bg-white rounded-[2.5rem] shadow-xl p-6 text-center mb-8 mx-auto" style="border: 2px solid #d4af37; max-width: 500px;">
        <div class="mb-6">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-50 rounded-full mb-4 border-4 border-white shadow-sm">
                <i data-lucide="play-circle" class="w-10 h-10 text-blue-600"></i>
            </div>
            <h2 class="text-xl font-black text-slate-800 uppercase tracking-tight">Dataset Processing</h2>
        </div>

        <!-- ACTION BUTTON: Instant Alpine trigger + Livewire call -->
        <button 
            x-on:click="loadingSet = true; $wire.driveNow()" 
            class="w-full px-6 py-3 rounded-pill font-black text-base bg-slate-800 hover:bg-slate-900 text-white shadow-xl active:scale-95 group">
            <span class="flex items-center justify-center gap-3">
                Drive now ({{ $currentTask }} / {{ $maxTasks }}) Set {{ $setNumber }} 
                <i data-lucide="chevron-right" class="w-5 h-5 transition-transform group-hover:translate-x-1"></i>
            </span>
        </button>
    </div>

   <!-- LOADING GIF OVERLAY -->
<div x-show="loadingSet" x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/60"></div>
    <div class="relative bg-white w-full max-w-xs rounded-[2rem] shadow-2xl p-6 flex flex-col items-center justify-center">
        
        <img src="{{ asset('assets/images/bb.gif') }}" class="w-48 h-48 object-contain" alt="Loading">
        
        <p class="text-slate-800 font-black uppercase tracking-widest mt-2 mb-4 animate-pulse" style="font-size: 0.65rem;">
            Searching for Tasks...
        </p>

        <!-- PROGRESS BAR CONTAINER -->
        <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
            <!-- Using x-if ensures this element is NEW every time loadingSet is true -->
            <template x-if="loadingSet">
                <div class="bg-blue-600 h-full rounded-full" 
                     style="width: 0%; animation: fillProgress 2s linear forwards;">
                </div>
            </template>
        </div>
    </div>
</div>



<!-- 2. MINI-WINDOW TASK MODAL -->
<div x-data="{ open: @entangle('showTaskModal'), isSubmitting: false }" 
     x-show="open" 
     x-cloak 
     @click.away="if(!isSubmitting) open = false"
     class="fixed inset-0 z-[9998] flex items-center justify-center p-4">
    
    <!-- Dimmer Backdrop (No Blur) -->
    <div class="absolute inset-0 bg-slate-900/60" @click="if(!isSubmitting) open = false"></div>
    
    <!-- Mini Window Container -->
    <div class="relative bg-white w-full max-w-md rounded-[2.5rem] shadow-2xl overflow-hidden animate-in zoom-in duration-300">
        @if($product)
            <!-- Image Area (Shortened h-40) -->
            <div class="h-65 bg-slate-50 flex items-center justify-center p-6 border-b border-slate-100">
                <img src="{{ $product->product_image }}" 
                     class="max-h-full w-auto object-contain drop-shadow-xl transform hover:scale-105 transition-transform duration-500" 
                     alt="Product">
            </div>

            <!-- Details Area -->
            <div class="p-4 text-center">
                <h3 class="text-base font-black text-slate-900 uppercase tracking-tight mb-1">{{ $product->product_id }}</h3>
                <p class="text-slate-400 text-[10px] mb-4 line-clamp-1 px-8">{{ $product->product_desc }}</p>

                <!-- Slimmed Price/Profit Grid -->
                <div class="flex gap-2 mb-2">
                    <div class="flex-1 bg-slate-50 py-1 px-2 rounded-xl border border-slate-100">
                        <span class="text-[8px] font-black text-slate-400 uppercase tracking-tighter block">Price</span>
                        <p class="text-sm font-bold text-slate-800">${{ number_format($product->price, 2) }}</p>
                    </div>
                    <div class="flex-1 bg-green-50 py-1 px-2 rounded-xl border border-green-100">
                        <span class="text-[8px] font-black text-green-500 uppercase tracking-tighter block">Profit</span>
                        <p class="text-sm font-bold text-green-600">+${{ number_format($product->profit, 2) }}</p>
                    </div>
                </div>

                <!-- Dual Action Buttons -->
                <div class="flex gap-3 mt-4">
                    <!-- Cancel Button -->
                    <button type="button"
                            @click="open = false" 
                            :disabled="isSubmitting"
                            class="flex-1 py-2 px-2 rounded-pill font-bold text-[10px] uppercase tracking-widest transition-all hover:bg-slate-50 disabled:opacity-30"
                            style="border: 2px solid #d4af37; color: #475569; background: white;">
                        Cancel
                    </button>

                    <!-- Submit Button -->
                    <button type="button"
                            x-on:click="isSubmitting = true; setTimeout(() => { $wire.submitTask().then(() => { isSubmitting = false; open = false; }) }, 2000)" 
                            :disabled="isSubmitting"
                            class="flex-1 py-2 px-2 rounded-pill font-black text-[10px] uppercase tracking-[0.2em] transition-all active:scale-95 disabled:opacity-50"
                            style="border: 2px solid #d4af37; background-color: #1e293b; color: white;">
                        <span>Submit</span>
                    </button>
                </div>
            </div>
        @endif
    </div>

    <!-- SUBMISSION PROCESSING OVERLAY (Nested inside x-data to share isSubmitting) -->
    <div x-show="isSubmitting" 
         x-cloak 
         class="fixed inset-0 z-[9999] flex items-center justify-center p-4">
        
        <!-- Darker Backdrop to hide the mini-window behind -->
        <div class="absolute inset-0 bg-slate-900/90"></div>
        
        <div class="relative bg-white w-full max-w-xs rounded-[2rem] shadow-2xl p-10 flex flex-col items-center justify-center animate-in zoom-in duration-300"
             style="border: 2px solid #d4af37;">
            
            <div class="mb-6">
                <i class="ri-loader-4-line animate-spin text-6xl" style="color: #d4af37;"></i>
            </div>
                 
            <p class="text-slate-800 font-black uppercase tracking-[0.2em] text-center mb-4" style="font-size: 0.75rem;">
                Finalizing Task...
            </p>

            <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden border border-slate-100">
                <!-- Bar animation triggered by isSubmitting -->
                <div x-show="isSubmitting" 
                     class="bg-blue-600 h-full rounded-full" 
                     style="width: 0%; animation: fillProgress 5s linear forwards;">
                </div>
            </div>
            
            <span class="text-slate-400 font-bold normal-case mt-3 block" style="font-size: 0.6rem;">Uploading to secure server...</span>
        </div>
    </div>
</div>





        <!-- 5. NOTICE FOOTER -->
        <div class="bg-slate-900 text-white p-8 rounded-[2rem] shadow-lg mt-4">
            <div class="flex flex-col md:flex-row gap-6 items-start">
                <div class="p-4 bg-white/10 rounded-2xl"><i data-lucide="info" class="w-8 h-8 text-blue-400"></i></div>
                <div class="flex-1">
                    <h4 class="font-black text-blue-400 uppercase text-xs tracking-[0.2em] mb-3">System Notice</h4>
                    <p class="text-slate-300 text-sm">Working time: <span class="text-white font-bold">11:00-23:00</span>. For merged products, clear the balance to continue.</p>
                </div>
            </div>
        </div>

    </div> <!-- End p-6 -->
</div> <!-- END ROOT -->
