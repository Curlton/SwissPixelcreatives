<div> <!-- ROOT DIV -->
    <div class="max-w-4xl mx-auto mt-10 px-4">
        
        <!-- SECTION 1: METHOD SELECTION -->
        <section class="mb-12">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-extrabold text-slate-900">Choose Withdrawal Method</h2>
                <p class="text-slate-500 mt-2">Select your preferred cryptocurrency to withdraw</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- USDT CARD -->
                <a href="{{ route('user.withdraw.usdt') }}" wire:navigate class="group">
                    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 hover:border-teal-500 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center gap-6">
                            <div class="w-20 h-20 bg-teal-50 rounded-2xl flex items-center justify-center group-hover:bg-teal-500 transition-colors">
                                <img src="{{ asset('assets/images/crypto/usdt.svg') }}" class="w-12 h-12" alt="USDT">
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-800">USD (TRC20)</h3>
                                <p class="text-teal-600 font-semibold text-sm mt-1">Minimum transaction of $10</p>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-between text-slate-400 group-hover:text-teal-600">
                            <span class="text-sm font-medium">Click to proceed with withdrawal</span>
                            <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <!-- SECTION 2: TRANSACTION HISTORY -->
        <section class="mb-20">
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-slate-900">Withdrawal History</h3>
                <p class="text-slate-500 text-sm">Track your recent payout requests and their status</p>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-0">
                        <thead>
                            <tr class="bg-slate-50">
                                <th class="p-5 text-sm font-semibold text-slate-600 border-b">Date & Time</th>
                                <th class="p-5 text-sm font-semibold text-slate-600 border-b">Method</th>
                                <th class="p-5 text-sm font-semibold text-slate-600 border-b">Amount</th>
                                <th class="p-5 text-sm font-semibold text-slate-600 border-b text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
    @forelse($history as $item)
        <tr class="hover:bg-slate-50 transition-colors">
            <td class="p-5 text-sm text-slate-600">
                <div class="font-medium text-slate-900">{{ $item->created_at->format('d M, Y H:i') }}</div>
                <div class="text-xs text-slate-400">ID: #{{ $item->serial_no ?? $item->id }}</div>
            </td>
            <td class="p-5">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-slate-800">USD (TRC20)</span>
                    <span class="text-xs text-slate-400 truncate w-32" title="{{ $item->wallet_address }}">
                        {{ Str::limit($item->wallet_address, 15) }}
                    </span>
                </div>
            </td>
            <td class="p-5">
                <div class="text-m font-normal text-slate-900">${{ number_format($item->request_amount_coin, 2) }}</div>
                
            </td>
            <td class="p-5 text-center">
                @if($item->status === 'pending')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700">
                        Pending
                    </span>
                @elseif($item->status === 'approved')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">
                        Approved
                    </span>
                @elseif($item->status === 'canceled')
                    <!-- Matches your Admin cancel() method -->
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-rose-100 text-rose-700">
                        Canceled
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                        {{ ucfirst($item->status) }}
                    </span>
                @endif
            </td>
        </tr>
    @empty
        <!-- Empty state code... -->
    @endforelse
</tbody>

                    </table>
                </div>
                
                @if($history->hasPages())
                    <div class="p-5 border-t border-slate-50">
                        {{ $history->links() }}
                    </div>
                @endif
            </div>
        </section>
    </div>
</div>
