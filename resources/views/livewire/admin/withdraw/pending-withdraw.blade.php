<div>
    @if (session()->has('success'))
        <div class="mb-6 flex items-center gap-3 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 shadow-sm rounded-r-lg">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Pending Withdrawals</h2>
        <p class="text-gray-500 text-sm">Action required for these requests.</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-400 text-[10px] uppercase tracking-widest border-b">
                        <th class="p-4 font-semibold">Serial/Date</th>
                        <th class="p-4 font-semibold">User/Account</th>
                        <th class="p-4 font-semibold">Crypto Details</th>
                        <th class="p-4 font-semibold text-right">Taka Payable</th>
                        <th class="p-4 font-semibold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-gray-600 text-sm">
                    @forelse($withdrawals as $w)
                    <tr wire:key="pending-withdraw-{{ $w->id }}" class="hover:bg-gray-50 transition">
                        <td class="p-4">
                            <div class="font-bold text-gray-800">{{ $w->serial_no }}</div>
                            <div class="text-[10px] text-gray-400">{{ $w->created_at->format('d M Y') }}</div>
                        </td>
                        <td class="p-4">
                            <div class="font-semibold text-blue-600">{{ $w->username }}</div>
                            <div class="text-[10px] text-gray-500 font-mono">{{ $w->acct_no }}</div>
                        </td>
                        <td class="p-4">
                            <div class="text-xs">Req: <span class="font-bold text-gray-700">{{ number_format($w->request_amount_coin, 4) }}</span></div>
                            <div class="text-[10px] text-gray-400">Wallet: {{ Str::limit($w->wallet_address, 15) }}</div>
                        </td>
                        <td class="p-4 text-right">
                            <div class="font-bold text-gray-900">৳{{ number_format($w->amount_payable_taka, 2) }}</div>
                        </td>
                        <td class="p-4">
                            <div class="flex justify-center gap-2">
                                <button wire:click="approve({{ $w->id }})" wire:confirm="Approve this?" 
                                        class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition">
                                    <i data-lucide="check" class="w-4 h-4"></i>
                                </button>
                                <button wire:click="cancel({{ $w->id }})" wire:confirm="Cancel this?" 
                                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition">
                                    <i data-lucide="x" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-10 text-center text-gray-400 italic">No pending requests.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
