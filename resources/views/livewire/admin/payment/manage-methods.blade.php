<div>
    @if (session()->has('success'))
        <div class="mb-6 flex items-center gap-3 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 shadow-sm rounded-r-lg">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Manage Payment Methods</h2>
        <a href="{{ route('admin.payment.add') }}" wire:navigate class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition shadow-sm">
            <i data-lucide="plus-circle" class="w-4 h-4"></i>
            Add New Method
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-400 text-xs uppercase tracking-wider border-b">
                    <th class="p-4 font-medium text-center">SNo</th>
                    <th class="p-4 font-medium">Method Name</th>
                    <th class="p-4 font-medium">Wallet Address</th>
                    <th class="p-4 font-medium text-center">Status</th>
                    <th class="p-4 font-medium text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y text-gray-600">
                @forelse($methods as $index => $method)
                <tr wire:key="method-{{ $method->id }}" class="hover:bg-gray-50 transition">
                    <td class="p-4 text-center font-bold text-gray-400">{{ $index + 1 }}</td>
                    <td class="p-4">
                        <div class="font-bold text-gray-800 uppercase">{{ $method->method_name }}</div>
                    </td>
                    <td class="p-4 font-mono text-xs text-gray-500">{{ $method->wallet_address }}</td>
                    <td class="p-4 text-center">
                        <button wire:click="toggleStatus({{ $method->id }})" 
                                class="px-3 py-1 rounded-full text-[10px] font-bold uppercase transition
                                {{ $method->status === 'active' ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-red-100 text-red-700 hover:bg-red-200' }}">
                            {{ $method->status }}
                        </button>
                    </td>
                    <td class="p-4">
                        <div class="flex justify-center gap-3">
                            <a href="#" class="text-blue-500 hover:bg-blue-50 p-2 rounded-full transition">
                                <i data-lucide="edit-3" class="w-5 h-5"></i>
                            </a>
                            <button wire:click="delete({{ $method->id }})" 
                                    wire:confirm="Are you sure you want to delete this method?"
                                    class="text-red-500 hover:bg-red-50 p-2 rounded-full transition">
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-10 text-center text-gray-400 italic">No payment methods found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
