<div>
    <div class="p-6 bg-white shadow-sm rounded-xl border border-slate-200">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-black text-slate-900 uppercase tracking-tight">Blocked Users</h2>
            <p class="text-[10px] text-red-500 font-black uppercase tracking-widest mt-1">Accounts Restricted</p>
        </div>
        
        <!-- Simplified Search Bar with Hover Effect -->
        <div class="relative group max-w-sm w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                <span wire:ignore>
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 group-hover:text-red-500 transition-colors"></i>
                </span>
            </div>
            <input 
                wire:model.live.debounce.300ms="search" 
                type="text" 
                placeholder="Search blocked users..." 
                class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm transition-all duration-200
                       hover:bg-white hover:border-red-300 hover:shadow-md hover:shadow-red-50
                       focus:bg-white focus:ring-2 focus:ring-red-100 focus:border-red-500 focus:outline-none"
            >
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 shadow-sm">
        <table class="w-full text-sm text-left">
            <thead class="bg-red-900 text-white uppercase text-[10px] tracking-widest">
                <tr>
                    <th class="p-4">User</th>
                    <th class="p-4">Balance</th>
                    <th class="p-4 text-center">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white">
                @forelse($users as $user)
                    <tr wire:key="blocked-user-row-{{ $user->id }}" class="hover:bg-red-50/30 transition-colors">
                        <td class="p-4 font-bold text-slate-900">
                            {{ $user->username }}
                        </td>
                        <td class="p-4 font-mono font-bold text-slate-600">
                            ${{ number_format($user->balance, 2) }}
                        </td>
                        <td class="p-4 text-center">
                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-[9px] font-black uppercase ring-1 ring-red-200">
                                BLOCKED
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            <a href="{{ route('admin.users.edit', $user->id) }}" wire:navigate 
                               class="inline-flex items-center justify-center w-9 h-9 bg-red-50 text-red-600 rounded-lg border border-red-100 hover:bg-red-600 hover:text-white transition-all shadow-sm">
                                <span wire:ignore>
                                    <i data-lucide="edit-3" class="w-4 h-4" style="stroke-width: 2.5px;"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-12 text-center text-slate-400 italic">
                            No blocked users found.
                        </td>
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
