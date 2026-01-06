<div class="max-w-3xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Add Payment Method</h2>
            <p class="text-gray-500 text-sm">Configure a new gateway for user deposits and withdrawals.</p>
        </div>
        <a href="{{ route('admin.payment.manage') }}" wire:navigate class="text-gray-600 hover:text-purple-600 flex items-center gap-2 transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Back to List
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <form wire:submit="save" class="p-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Method Name -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Method Name</label>
                    <input type="text" wire:model="method_name" 
                           placeholder="e.g. Binance Pay, USDT (TRC20)"
                           class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">
                    @error('method_name') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
                </div>

                <!-- Initial Status -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Initial Status</label>
                    <select wire:model="status" 
                            class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 outline-none transition">
                        <option value="active">Active (Visible to users)</option>
                        <option value="inactive">Inactive (Hidden)</option>
                    </select>
                    @error('status') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Wallet Address -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">Wallet Address / ID</label>
                <div class="relative">
                    <i data-lucide="hash" class="absolute left-3 top-3.5 w-4 h-4 text-gray-400"></i>
                    <input type="text" wire:model="wallet_address" 
                           placeholder="Paste address or account ID here..."
                           class="w-full p-3 pl-10 rounded-xl border border-gray-200 focus:ring-2 focus:ring-purple-500 outline-none transition font-mono text-sm">
                </div>
                @error('wallet_address') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end items-center gap-4 pt-6 border-t border-gray-50">
                <button type="button" onclick="history.back()" class="text-gray-400 hover:text-gray-600 font-medium px-4">Cancel</button>
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-purple-200 transition transform active:scale-95 flex items-center gap-2">
                    <span wire:loading.remove wire:target="save">Save Payment Method</span>
                    <span wire:loading wire:target="save">Processing...</span>
                    <i data-lucide="save" class="w-4 h-4" wire:loading.remove wire:target="save"></i>
                </button>
            </div>
        </form>
    </div>
</div>
