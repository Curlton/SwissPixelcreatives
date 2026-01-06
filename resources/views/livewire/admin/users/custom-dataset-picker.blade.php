<div>
<div class="p-6">
    <!-- Header Area -->
    <div class="mb-8 flex items-center justify-between">
        <h2 class="text-2xl font-black text-slate-900 uppercase tracking-tighter">Set Custom Dataset</h2>
        <a href="{{ route('admin.users.dataset', $user->id) }}" class="text-xs font-bold text-slate-400 hover:text-slate-900 transition underline uppercase">Cancel</a>
    </div>

    @if(!$selectedSet)
        <!-- Phase 1: Set Choice -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach(range(1, 4) as $num)
                <div class="bg-white border p-6 rounded-2xl text-center shadow-sm hover:border-blue-500 transition">
                    <h3 class="font-bold text-slate-800">Dataset {{ $num }}</h3>
                    <button wire:click="showForm({{ $num }})" class="mt-4 w-full bg-slate-900 text-white py-2 rounded-lg font-black text-[10px] uppercase">Configure</button>
                </div>
            @endforeach
        </div>
    @else
        <!-- Phase 2: Selection Form -->
        <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-xl">
            <h3 class="text-lg font-black mb-6">Configuring Set {{ $selectedSet }} for {{ $user->name }}</h3>

            <div class="space-y-4">
                @foreach($rows as $index => $row)
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-4 bg-slate-50 border border-slate-200 rounded-xl" wire:key="row-{{ $index }}">
                        
                        <!-- Product Selection Dropdown (Forced Selection) -->
                        <div>
                            <label class="text-[10px] font-black text-slate-400 uppercase">Select Product ID</label>
                            <select wire:model.live="rows.{{ $index }}.product_id" 
        class="w-full mt-1 border-slate-200 rounded text-sm font-bold p-2 focus:ring-blue-500">
    <option value="">-- Select Product --</option>
    @forelse($productList as $productName)
        {{-- Since the name is the ID, both the value and display text are the same --}}
        <option value="{{ $productName }}">{{ $productName }}</option>
    @empty
        <option disabled>No products found in database</option>
    @endforelse
</select>

                        </div>

                        <!-- Price (Auto-filled but editable) -->
                        <div>
                            <label class="text-[10px] font-black text-slate-400 uppercase">Custom Price ($)</label>
                            <input type="number" step="0.01" wire:model="rows.{{ $index }}.price" 
                                   class="w-full mt-1 border-slate-200 rounded-lg text-sm font-bold p-2 text-green-600">
                        </div>

                        <!-- Profit (Auto-filled but editable) -->
                        <div>
                            <label class="text-[10px] font-black text-slate-400 uppercase">Custom Profit ($)</label>
                            <input type="number" step="0.01" wire:model="rows.{{ $index }}.profit" 
                                   class="w-full mt-1 border-slate-200 rounded-lg text-sm font-bold p-2 text-blue-600">
                        </div>

                        <!-- Remove Action -->
                        <div class="flex items-end justify-center">
                            @if(count($rows) > 1)
                                <button wire:click="removeRow({{ $index }})" class="text-red-500 hover:text-red-700 text-[10px] font-black uppercase mb-2">Remove</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Footer Actions -->
            <div class="mt-8 flex justify-between items-center">
                @if(count($rows) < 5)
                    <button wire:click="addRow" class="text-blue-600 text-xs font-black uppercase tracking-widest">+ Add Item ({{ count($rows) }}/5)</button>
                @else
                    <span class="text-slate-400 text-[10px] font-bold uppercase italic">Maximum reached</span>
                @endif

                <button wire:click="saveDataset" class="px-10 py-3 bg-slate-900 hover:bg-blue-600 text-white font-black text-xs rounded-xl transition-all shadow-xl uppercase">
                    Save Complete Set
                </button>
            </div>
        </div>
    @endif
</div>
</div>