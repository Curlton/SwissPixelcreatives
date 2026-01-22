<div>
    <!-- Breadcrumb/Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800 uppercase tracking-tight">Create New Dataset</h2>
        <a href="{{ route('admin.dashboard') }}" wire:navigate class="flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Back to List
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <!-- wire:submit="save" is correct for Livewire 3 -->
        <form wire:submit="save" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Product Name/ID -->
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-600 uppercase">Product Name / ID</label>
                    <input type="text" wire:model="product_id" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition @error('product_id') border-red-500 @enderror">
                    @error('product_id') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- Product Image URL -->
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-600 uppercase">External Image URL</label>
                    <input type="url" wire:model="product_image" placeholder="https://example.com/image.jpg" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition @error('product_image') border-red-500 @enderror">
                    @error('product_image') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- Price -->
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-600 uppercase">Price (USD)</label>
                    <input type="number" step="0.01" wire:model="price" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition @error('price') border-red-500 @enderror">
                    @error('price') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-600 uppercase">Product Description</label>
                <textarea wire:model="product_desc" rows="4" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition @error('product_desc') border-red-500 @enderror"></textarea>
                @error('product_desc') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-end border-t pt-6">
                <button type="submit" 
                        wire:loading.attr="disabled"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-black py-3 px-10 rounded-lg transition shadow-md flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                    
                    <span wire:loading.remove wire:target="save">Submit Dataset</span>
                    
                    <!-- Improved Loading State for 2026 -->
                    <span wire:loading wire:target="save" class="flex items-center gap-2">
                        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing...
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
