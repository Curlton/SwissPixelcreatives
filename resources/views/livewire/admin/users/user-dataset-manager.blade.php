<div>
<div class="p-6 bg-white shadow-sm rounded-xl border border-slate-200">
    
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg font-bold text-sm">
            {{ session('message') }}
        </div>
    @endif

    <!-- HEADER -->
    <div class="mb-2">
        <h2 class="text-3xl font-black text-slate-900 tracking-tighter uppercase">
            {{ $user->username ?? $user->name }}
        </h2>
        <div class="flex items-center gap-2 mt-1">
            <span class="px-2 py-0.5 bg-blue-600 text-white rounded text-[10px] font-black uppercase tracking-widest">
                {{ $user->membership_level ?? 'VIP 1 BRONZE' }}
            </span>
            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">
                User ID: #{{ $user->id }}
            </span>
        </div>
    </div>

    <!-- FINANCIALS TABLE -->
    <div class="mb-8 overflow-hidden rounded-xl border border-slate-200 shadow-sm mt-4">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-900 text-white uppercase text-[10px] tracking-widest">
                <tr>
                    <th class="p-4 border-r border-slate-700">Current Balance</th>
                    <th class="p-4 border-r border-slate-700">Today's Profit</th>
                    <th class="p-4 text-center border-r border-slate-700">Set Status</th>
                    <th class="p-4 text-center">Merged Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white">
                <tr>
                    <td class="p-4 font-mono font-bold text-green-600 text-lg border-r border-slate-100">
                        ${{ number_format($user->balance, 2) }}
                    </td>
                    <td class="p-4 border-r border-slate-100">
                        <span class="text-blue-600 font-bold text-md">${{ number_format($user->today_profit ?? 0, 2) }}</span>
                    </td>
                    <td class="p-4 text-center border-r border-slate-100">
                        <button wire:click="toggleCanPlay" 
                            class="px-4 py-2 rounded text-[10px] font-black tracking-tighter transition shadow-sm
                            {{ $user->is_set_locked ? 'bg-red-500 text-white' : 'bg-green-500 text-white' }}">
                            {{ $user->is_set_locked ? 'CLOSED' : 'OPEN' }}
                        </button>
                    </td>
                    <td class="p-4 text-center">
                        <button wire:click="toggleMerged" 
                            class="text-xs font-black transition-colors {{ $user->is_merged ? 'text-blue-600 underline' : 'text-slate-400' }}">
                            {{ $user->is_merged ? 'YES' : 'NO' }}
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- ACTIONS -->
    <div class="py-4 mb-8 flex items-center justify-between border-y border-slate-100 bg-slate-50/50 px-4 rounded-xl">
        <a href="{{ route('admin.users.dataset.create', $user->id) }}" 
           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white text-[11px] font-black rounded-lg">
            SET CUSTOM DATASET
        </a>

        <div class="flex flex-col">
            <select wire:model="selectedMembership" wire:change="updateMembership" class="px-4 py-2 bg-white border border-slate-200 text-[11px] font-black rounded-lg">
                <option value="VIP 1 BRONZE">VIP 1 BRONZE</option>
                <option value="VIP 2 SILVER">VIP 2 SILVER</option>
                <option value="VIP 3 GOLD">VIP 3 GOLD</option>
                <option value="VIP 4 PLATINUM">VIP 4 PLATINUM</option>
                <option value="VIP 5 DIAMOND">VIP 5 DIAMOND</option>
            </select>
        </div>
    </div>

    <!-- ACTIVITY HISTORY -->
    <div class="mt-8 overflow-hidden rounded-xl border border-slate-200 shadow-sm">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] tracking-widest sticky top-0">
                <tr>
                    <th class="p-4 w-20">Image</th>
                    <th class="p-4">Product Name</th>
                    <th class="p-4">Price</th>
                    <th class="p-4 text-center">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white">
                @forelse($userHistory as $record)
                    <tr wire:key="row-{{ $record->id }}-{{ $record->status }}" class="hover:bg-slate-50">
                        <td class="p-4">
                            <img src="{{ $record->product_image }}" class="w-12 h-12 rounded-lg object-contain border">
                        </td>
                        <td class="p-4 font-bold text-slate-900">{{ $record->product_id }}</td>
                        
                        <!-- PRICE PRIORITY LOGIC -->
                        <td class="p-4 font-mono font-bold text-slate-700">
                            ${{ number_format(optional($record->dataset)->is_custom ? $record->dataset->price : $record->price, 2) }}
                        </td>

                        <td class="p-4 text-center">
                            <span class="px-2 py-1 rounded text-[9px] font-black uppercase {{ $record->status === 'frozen' ? 'bg-amber-100 text-amber-700' : 'bg-green-100 text-green-700' }}">
                                {{ $record->status }}
                            </span>
                        </td>

                        <td class="p-4 text-right">
    @if($record->status === 'frozen')
        {{-- Added wire:loading.attr="disabled" to prevent double-click duplicates --}}
        <button wire:click="unfreezeTask({{ $record->id }})" 
                wire:loading.attr="disabled"
                wire:target="unfreezeTask({{ $record->id }})"
                class="bg-blue-600 text-white px-3 py-1 rounded text-[10px] font-black transition-opacity disabled:opacity-50">
            <span wire:loading.remove wire:target="unfreezeTask({{ $record->id }})">UNFREEZE</span>
            <span wire:loading wire:target="unfreezeTask({{ $record->id }})">PROCESSING...</span>
        </button>
    @elseif(optional($record->dataset)->is_custom)
        {{-- Delete button for completed custom items --}}
        <button wire:click="deleteActivity({{ $record->id }})" 
                wire:confirm="Delete history?" 
                wire:loading.attr="disabled"
                class="text-red-500 hover:text-red-700 transition-colors">
            <span wire:ignore><i data-lucide="trash-2" class="w-4 h-4"></i></span>
        </button>
    @else
        <span class="text-slate-300 italic text-[10px]">Processed</span>
    @endif
</td>

                    </tr>
                @empty
                    <tr><td colspan="5" class="p-10 text-center text-slate-400">No activity.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION FIX (Line 118) -->
    @if($userHistory && method_exists($userHistory, 'links'))
        <div class="mt-4">
            {{ $userHistory->links() }}
        </div>
    @endif
</div>
</div>
