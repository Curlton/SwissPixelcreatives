<div>
    <div class="p-6 bg-white shadow-sm rounded-xl border border-slate-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-black text-slate-900 uppercase tracking-tight">Active Users</h2>
        
        <!-- Simplified Search Bar -->
        <div class="relative group max-w-sm w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                <span wire:ignore>
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 group-hover:text-blue-500 transition-colors"></i>
                </span>
            </div>
            <input 
                wire:model.live.debounce.300ms="search" 
                type="text" 
                placeholder="Search active users..." 
                class="block w-full pl-11 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm transition-all hover:bg-white hover:border-blue-300 hover:shadow-sm focus:ring-2 focus:ring-blue-100 focus:border-blue-500 focus:outline-none"
            >
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-900 text-white uppercase text-[10px] tracking-widest">
                <tr>
                    <th class="p-4">User Details</th>
                    <th class="p-4">Balance</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white">
                @forelse($users as $user)
                    <tr wire:key="active-user-{{ $user->id }}" class="hover:bg-slate-50 transition-colors">
                        <td class="p-4">
                            <div class="font-bold text-slate-900">{{ $user->username }}</div>
                            <div class="text-[10px] text-slate-400">ID: #{{ $user->id }}</div>
                        </td>
                        <td class="p-4 font-mono font-bold text-green-600">
                            ${{ number_format($user->balance, 2) }}
                        </td>
                        <td class="p-4 text-center">
                            <a href="{{ route('admin.users.edit', $user->id) }}" wire:navigate 
                               class="inline-flex items-center justify-center w-9 h-9 bg-blue-50 text-blue-600 rounded-lg border border-blue-100 hover:bg-blue-600 hover:text-white transition-all">
                                <span wire:ignore>
                                    <i data-lucide="edit-3" class="w-4 h-4" style="stroke-width: 2.5px;"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-8 text-center text-slate-400 italic">No active users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>

</div>
