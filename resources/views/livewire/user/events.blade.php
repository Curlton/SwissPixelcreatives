<div>
<div class="min-h-screen bg-gray-50">
    <div class="p-4 md:p-8 max-w-7xl mx-auto">
        
        <!-- HEADER SECTION -->
        <div class="mb-8">
            <h2 class="text-2xl font-black text-slate-900 uppercase tracking-tighter">Asset Events</h2>
            <p class="text-slate-500 text-sm">Review your task history and merged product status.</p>
        </div>

        <!-- TAB NAVIGATION -->
        <div class="flex space-x-1 bg-slate-200 p-1 rounded-xl w-full md:w-max mb-8">
            @foreach(['all' => 'All', 'completed' => 'Completed', 'frozen' => 'Frozen'] as $key => $label)
                <button wire:click="setTab('{{ $key }}')" 
                    class="flex-1 md:flex-none px-8 py-2.5 rounded-lg text-xs font-black uppercase transition-all duration-200 
                    {{ $activeTab === $key ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        <!-- EVENTS TABLE -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-slate-50 border-b border-slate-100">
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            <th class="p-5">Product Details</th>
                            <th class="p-5">Description</th>
                            <th class="p-5">Price</th>
                            <th class="p-5">Profit</th>
                            <th class="p-5 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($records as $record)
                            <tr wire:key="event-{{ $record->id }}-{{ $record->status }}" class="hover:bg-blue-50/20 transition-colors">
                                <!-- Image & Name -->
                                <td class="p-5">
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-16 rounded-xl border border-slate-100 overflow-hidden bg-slate-50 flex-shrink-0">
                                            @if($record->product_image)
                                                <img src="{{ $record->product_image }}" 
                                                     class="w-full h-full object-cover" 
                                                     onerror="this.src='placehold.co'">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-slate-300">
                                                    <span wire:ignore><i data-lucide="image" class="w-6 h-6"></i></span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-bold text-slate-800 leading-tight">{{ $record->product_id }}</span>
                                            @if(optional($record->dataset)->is_custom == 1)
                                                <span class="text-[9px] font-black text-amber-600 uppercase tracking-widest mt-1">Merged Product</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <!-- Description -->
                                <td class="p-5">
                                    <p class="text-xs text-slate-500 line-clamp-2 max-w-xs">
                                        {{ $record->product_desc ?? 'No description available.' }}
                                    </p>
                                </td>

                                <!-- Price (Priority Logic applied for 2025) -->
                                <td class="p-5">
                                    <span class="font-mono font-bold text-slate-700">
                                        ${{ number_format(
                                            (optional($record->dataset)->is_custom == 1) 
                                                ? $record->dataset->price 
                                                : $record->price, 
                                            2) 
                                        }}
                                    </span>
                                </td>

                                <!-- Profit (Priority Logic applied for 2025) -->
                                <td class="p-5">
                                    <span class="font-mono font-bold {{ $record->status === 'frozen' ? 'text-amber-600' : 'text-green-600' }}">
                                        +${{ number_format(
                                            (optional($record->dataset)->is_custom == 1) 
                                                ? $record->dataset->profit 
                                                : $record->profit, 
                                            2) 
                                        }}
                                    </span>
                                </td>

                                <!-- Status Label -->
                                <td class="p-5 text-center">
                                    @if($record->status === 'frozen')
                                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 rounded-lg text-[10px] font-black uppercase ring-1 ring-amber-200">
                                            Frozen
                                        </span>
                                    @else
                                        <span class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded-lg text-[10px] font-black uppercase ring-1 ring-green-200">
                                            Completed
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-20 text-center">
                                    <div class="text-slate-200 mb-2 font-black text-5xl uppercase tracking-tighter opacity-50">No Records</div>
                                    <p class="text-slate-400 text-xs uppercase font-bold tracking-widest">No activities found in this category.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- PAGINATION -->
        <div class="mt-6">
            {{ $records->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Ensure icons re-render on Livewire pagination/tab navigation
    document.addEventListener('livewire:navigated', () => {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>
@endpush
<div>
