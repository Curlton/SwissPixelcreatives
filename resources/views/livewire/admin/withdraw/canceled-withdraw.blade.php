<div>
    <div class="mb-8 border-l-4 border-red-500 pl-4">
        <h2 class="text-2xl font-bold text-gray-800">Canceled Withdrawals</h2>
        <p class="text-gray-500 text-sm">Reviewing all rejected or invalid withdrawal requests.</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-400 text-[10px] uppercase tracking-widest border-b">
                        <th class="p-4 font-semibold">Serial/Date</th>
                        <th class="p-4 font-semibold">User Details</th>
                        <th class="p-4 font-semibold">Crypto Requested</th>
                        <th class="p-4 font-semibold">Note/Reason</th>
                        <th class="p-4 font-semibold text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-gray-600 text-sm">
                    @forelse($withdrawals as $w)
                    <tr wire:key="canceled-withdraw-{{ $w->id }}" class="hover:bg-red-50/30 transition">
                        <td class="p-4">
                            <div class="font-bold text-gray-800">{{ $w->serial_no }}</div>
                            <div class="text-[10px] text-gray-400 uppercase">{{ $w->updated_at->format('d M Y') }}</div>
                        </td>
                        <td class="p-4">
                            <div class="font-semibold text-gray-700">{{ $w->username }}</div>
                            <div class="text-[10px] text-gray-400 font-mono italic">{{ $w->acct_no }}</div>
                        </td>
                        <td class="p-4">
                            <div class="font-bold text-gray-600">{{ number_format($w->request_amount_coin, 4) }}</div>
                            <div class="text-[10px] text-gray-400">Rate: {{ $w->rate }}</div>
                        </td>
                        <td class="p-4">
                            <!-- Display the note/reason if provided in 2025 -->
                            <div class="text-xs text-red-500 italic max-w-xs truncate" title="{{ $w->note }}">
                                {{ $w->note ?? 'No reason provided' }}
                            </div>
                        </td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase bg-red-100 text-red-700 border border-red-200">
                                {{ $w->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-10 text-center text-gray-400 italic">No canceled withdrawals found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
