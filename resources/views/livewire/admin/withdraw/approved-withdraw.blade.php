<div>
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Approved Withdrawals</h2>
        <p class="text-gray-500 text-sm">Historical record of all successfully paid requests.</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-400 text-[10px] uppercase tracking-widest border-b">
                        <th class="p-4 font-semibold">Serial/Date</th>
                        <th class="p-4 font-semibold">User/Account</th>
                        <th class="p-4 font-semibold">Crypto Details</th>
                        <th class="p-4 font-semibold text-right">Taka Paid</th>
                        <th class="p-4 font-semibold text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-gray-600 text-sm">
                    @forelse($withdrawals as $w)
                    <tr wire:key="approved-withdraw-{{ $w->id }}" class="hover:bg-gray-50 transition">
                        <td class="p-4">
                            <div class="font-bold text-gray-800">{{ $w->serial_no }}</div>
                            <div class="text-[10px] text-gray-400">{{ $w->updated_at->format('d M Y, h:i A') }}</div>
                        </td>
                        <td class="p-4">
                            <div class="font-semibold text-blue-600">{{ $w->username }}</div>
                            <div class="text-[10px] text-gray-500 font-mono">{{ $w->acct_no }}</div>
                        </td>
                        <td class="p-4">
                            <div class="text-xs">Paid: <span class="font-bold text-gray-700">{{ number_format($w->request_amount_coin, 4) }}</span></div>
                            <div class="text-[10px] text-gray-400">Wallet: {{ Str::limit($w->wallet_address, 15) }}</div>
                        </td>
                        <td class="p-4 text-right">
                            <div class="font-bold text-green-600">৳{{ number_format($w->amount_payable_taka, 2) }}</div>
                            <div class="text-[10px] text-gray-400">Rate: {{ $w->rate }}</div>
                        </td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase bg-green-100 text-green-700">
                                {{ $w->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-10 text-center text-gray-400 italic">No approved withdrawals yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
