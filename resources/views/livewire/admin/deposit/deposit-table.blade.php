<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <!-- ... (Table Head omitted for brevity - use your Withdraw HEAD layout) ... -->
        <tbody class="divide-y text-gray-600 text-sm">
            @forelse($deposits as $deposit)
            <tr wire:key="deposit-{{ $deposit->id }}" class="hover:bg-gray-50 transition">
                <!-- Replace with your actual fields -->
                <td class="p-4">{{ $deposit->id }}</td>
                <td class="p-4">{{ $deposit->user_id }}</td>
                <td class="p-4">{{ $deposit->username}}</td>
                <td class="p-4">{{ $deposit->trans_id}}</td>
                <td class="p-4">${{ number_format($deposit->amount_coins, 2) }}</td>
                <td class="p-4">
                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase 
                        {{ $deposit->status == 'approved' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $deposit->status == 'pending' ? 'bg-orange-100 text-orange-700' : '' }}
                        {{ $deposit->status == 'canceled' ? 'bg-red-100 text-red-700' : '' }}">
                        {{ $deposit->status }}
                    </span>
                </td>
                
                <!-- Actions appear only for Pending View -->
                @if(isset($actions) && $actions)
                <td class="p-4">
                    <button wire:click="approve({{ $deposit->id }})">Approve</button>
                    <button wire:click="cancel({{ $deposit->id }})">Cancel</button>
                </td>
                @endif
            </tr>
            @empty
            <tr><td colspan="5" class="p-10 text-center text-gray-400">No records found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
