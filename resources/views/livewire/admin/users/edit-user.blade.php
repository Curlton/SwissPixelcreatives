<div class="max-w-3xl mx-auto p-6">
    <div class="mb-6 flex items-center gap-4">
        <a href="{{ route('admin.users.all') }}" wire:navigate class="p-2 bg-gray-100 hover:bg-gray-200 rounded-full transition">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <h2 class="text-2xl font-bold text-gray-800">Edit User: {{ $user->username }}</h2>
    </div>

    <form wire:submit="update" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Username -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Username</label>
                <input type="text" wire:model="username" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none">
                @error('username') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Phone Number</label>
                <input type="text" wire:model="phone" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 transition outline-none">
                @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Balance -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Account Balance ($)</label>
                <input type="number" step="0.01" wire:model="balance" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 transition outline-none">
                @error('balance') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Account Status</label>
                <select wire:model="status" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 transition outline-none">
                    <option value="active">Active</option>
                    <option value="blocked">Blocked</option>
                </select>
                @error('status') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Password (Optional) -->
        <div class="pt-4 border-t border-gray-50">
            <label class="block text-sm font-bold text-gray-700 mb-1">Update Password</label>
            <p class="text-xs text-gray-400 mb-3 italic">Leave blank to keep the current password.</p>
            <div class="relative">
                <input type="password" wire:model="password" placeholder="Enter new password" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 transition outline-none">
                <i data-lucide="lock" class="absolute right-3 top-3 w-5 h-5 text-gray-300"></i>
            </div>
            @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-8 rounded-lg transition shadow-md flex items-center gap-2">
                <i data-lucide="save" class="w-5 h-5"></i>
                Save Changes
            </button>
        </div>
    </form>
</div>
