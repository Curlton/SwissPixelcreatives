<div>
    <div>
    <div class="max-w-md mx-auto mt-10 p-4">
        <div class="bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden">
            
            <!-- Header -->
            <div class="bg-slate-900 p-6 text-center">
                <div class="flex justify-center mb-2">
                    <img src="{{ asset('assets/images/crypto/usdt.svg') }}" class="w-12 h-12" alt="USDT">
                </div>
                <h2 class="text-white text-xl font-black uppercase tracking-widest">Withdraw</h2>
            </div>

            <div class="p-8">
                <!-- Balance Card -->
                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 mb-6 text-center">
                    <p class="text-xs font-bold text-blue-400 uppercase tracking-widest">Balance in USD</p>
                    <p class="text-lg font-normal text-dark-600 mb-0">
                          ${{ number_format($balance, 2) }}
                    </p>

                </div>

                <form wire:submit.prevent="withdraw" class="space-y-6">
                    <!-- Payment Account -->
                    <div>
                        <label class="text-xs font-black text-slate-400 uppercase block mb-2">Payment Account</label>
                        <input type="text" 
                               wire:model="wallet_address" 
                               placeholder="A/C / wallet to withdraw" 
                               class="w-full p-4 bg-slate-50 border-none rounded-2xl font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                        @error('wallet_address') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                    </div>

                    <!-- Amount -->
                    <div>
                        <label class="text-xs font-black text-slate-400 uppercase block mb-2">Amount ($)</label>
                        <input type="number" 
                               wire:model="amount" 
                               class="w-full p-4 bg-slate-50 border-none rounded-2xl font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                        @error('amount') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror
                        <p class="text-[10px] text-slate-400 mt-2 font-bold italic uppercase">Minimum transaction of $10</p>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full py-5 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-black text-lg shadow-xl shadow-blue-100 transition-all active:scale-95 flex items-center justify-center gap-2">
                        <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                        SUBMIT WITHDRAWAL
                    </button>
                </form>

                <p class="text-center text-[10px] text-slate-400 mt-6 uppercase font-bold tracking-widest">
                    Processing time: 1-24 hours
                </p>
            </div>
        </div>
    </div>
</div>
