<div>
    <!-- Breadcrumb/Header inside Main Slot -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Create New Dataset</h2>
        <a href="{{ route('admin.dashboard') }}" wire:navigate class="flex items-center gap-2 text-blue-600 hover:text-blue-800 transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Back to List
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form wire:submit="save" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Product Name/ID -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Product Name / ID</label>
                    <input type="text" wire:model="product_id" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                    @error('product_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Product Image URL -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">External Image URL</label>
                    <input type="url" wire:model="product_image" placeholder="https://example.com/image.jpg" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                    @error('product_image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Price -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Price (৳)</label>
                    <input type="number" step="0.01" wire:model="price" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                    @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Profit -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Profit (৳)</label>
                    <input type="number" step="0.01" wire:model="profit" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                    @error('profit') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label class="text-sm font-semibold text-gray-600">Product Description</label>
                <textarea wire:model="product_desc" rows="4" class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition"></textarea>
                @error('product_desc') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-end border-t pt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-10 rounded-lg transition shadow-md flex items-center gap-2">
                    <span wire:loading.remove wire:target="save">Submit Dataset</span>
                    <span wire:loading wire:target="save">Processing...</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        @this.on('datasetSaved', () => {
            alert('Dataset saved successfully!');
            @this.call('resetForm');
        });
    });
</script>