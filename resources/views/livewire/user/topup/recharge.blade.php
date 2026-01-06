<div>
    <div class="max-w-4xl mx-auto mt-10">
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-extrabold text-slate-900">Choose Deposit Method</h2>
        <p class="text-slate-500 mt-2">Select your preferred cryptocurrency to continue</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- USDT CARD -->
        <a href="{{ route('user.topup.payment', ['method' => 'ETH']) }}" wire:navigate class="group">
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 hover:border-teal-500 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 bg-teal-50 rounded-2xl flex items-center justify-center group-hover:bg-teal-500 transition-colors">
                        <img src="{{ asset('assets/images/crypto/usdt.svg') }}" class="w-12 h-12 group-hover:brightness-200" alt="USDT">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800">USDT (TRC20)</h3>
                        <p class="text-teal-600 font-semibold text-sm mt-1">A single transaction minimum of 10</p>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-between text-slate-400 group-hover:text-teal-600">
                    <span class="text-sm font-medium">Click to proceed with payment</span>
                    <svg xmlns="www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </div>
            </div>
        </a>

        <!-- Placeholder for Bank Transfer or others later -->
        <div class="bg-slate-50 rounded-3xl p-8 border border-dashed border-slate-200 flex flex-col items-center justify-center opacity-60">
            <div class="w-12 h-12 bg-slate-200 rounded-full mb-3"></div>
            <p class="text-slate-400 font-medium italic">More methods coming soon</p>
        </div>
    </div>
</div>

