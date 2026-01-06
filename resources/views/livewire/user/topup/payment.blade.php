<div>
    <div class="max-w-2xl mx-auto mt-10 p-4">
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
        <!-- Header with USDT Icon -->
        <div class="bg-slate-900 p-6 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <img src="{{ asset('assets/images/crypto/usdt.svg') }}" class="w-10 h-10" alt="USDT">
                <h2 class="text-white text-xl font-bold uppercase">{{ $method }} Payment</h2>
            </div>
            <span class="bg-teal-500/20 text-teal-400 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest">TRC20 Network</span>
        </div>

        <div class="p-8">
            <!-- Total Coins Display -->
            <div class="text-center mb-8">
                <h3 class="text-slate-400 font-semibold uppercase text-xs tracking-widest">Total coins</h3>
                <div class="flex items-center justify-center gap-2 mt-1">
                    <span class="text-5xl font-black text-slate-900" x-data="{ amount: @entangle('selectedAmount') }" x-text="amount">0</span>
                    <span class="text-slate-400 font-bold text-xl">USDT</span>
                </div>
            </div>

            <!-- Amount Selection Buttons -->
            <div class="grid grid-cols-4 gap-3 mb-8">
                @php
                    $amounts = [
                        500 => '500', 
                        1000 => '1K', 
                        2000 => '2K', 
                        3000 => '3K', 
                        5000 => '5K', 
                        10000 => '10K', 
                        15000 => '15K', 
                        20000 => '20K'
                    ];
                @endphp

                @foreach($amounts as $value => $label)
                    <button 
                        wire:click="selectAmount({{ $value }})"
                        type="button"
                        class="py-3 px-2 rounded-xl font-bold transition-all border-2 {{ $selectedAmount == $value ? 'bg-blue-600 border-blue-600 text-white shadow-lg' : 'bg-white border-slate-100 text-slate-600 hover:border-blue-200' }}">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <!-- Custom Input for other amounts -->
            <div class="mb-8">
                <label class="text-xs font-bold text-slate-400 uppercase block mb-2">Or enter custom amount</label>
                <input type="number" wire:model.live="selectedAmount" class="w-full p-4 bg-slate-50 border-none rounded-2xl text-lg font-bold text-slate-700 focus:ring-2 focus:ring-blue-500" placeholder="Minimum 10">
            </div>

            <!-- Error Message -->
            @if (session()->has('error'))
                <div class="p-4 mb-6 bg-red-50 text-red-500 rounded-2xl text-sm font-bold border border-red-100">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Submit Button -->
            <button 
                wire:click="proceedToConfirmation"
                class="w-full py-5 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-black text-lg shadow-xl shadow-blue-200 transition-all active:scale-95">
                PROCEED TO PAYMENT
            </button>
        </div>
    </div>
</div>

