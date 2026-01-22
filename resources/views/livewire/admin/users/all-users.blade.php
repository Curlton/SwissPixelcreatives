<div> <!-- THE SINGLE ROOT ELEMENT -->
    <div class="p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manage User Information</h2>
            
        </div>
        <!-- Simplified Search Bar -->
<div class="mb-6">
    <div class="relative group max-w-sm">
        <!-- Icon -->
        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
            <span wire:ignore>
                <i data-lucide="search" class="w-4 h-4 text-slate-400 group-hover:text-blue-500 transition-colors"></i>
            </span>
        </div>

        <!-- Input Field -->
        <input 
            wire:model.live.debounce.300ms="search" 
            type="text" 
            placeholder="Search users..." 
            class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm transition-all duration-200
                   hover:bg-white hover:border-blue-300 hover:shadow-md hover:shadow-blue-50
                   focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 focus:outline-none"
        >
        
        <!-- Loading Spinner (Shows only when Livewire is fetching) -->
        <div wire:loading wire:target="search" class="absolute inset-y-0 right-3 flex items-center">
            <div class="w-4 h-4 border-2 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
        </div>
    </div>
</div>

        

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse table-auto">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase tracking-wider border-b bg-gray-50/50">
                            <th class="p-4 font-medium">SNo.</th>
                            <th class="p-4 font-medium">Created At</th>
                            <th class="p-4 font-medium">Username</th>
                            <th class="p-4 font-medium">Password</th>
                            <th class="p-4 font-medium">Phone</th>
                            <th class="p-4 font-medium text-center">Balance</th>
                            <th class="p-4 font-medium text-center">Progress</th>
                            <th class="p-4 font-medium text-center">Sets Driven</th>
                            <th class="p-4 font-medium text-center">Status</th>
                            <th class="p-4 font-medium text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-gray-600 text-sm">
                        @forelse($users as $index => $user)
                        <tr wire:key="user-row-{{ $user->id }}" class="hover:bg-gray-50/80 transition">
                            <td class="p-4">{{ $users->firstItem() + $index }}</td>
                            <td class="p-4">{{ $user->created_at->format('d M, Y H:i') }}</td>
                            <td class="p-4 font-bold text-gray-800">{{ $user->username }}</td>
                            <!-- Password column in your AllUsers table -->
<td class="p-4">
    <div class="flex items-center gap-2 group/pass">
        <code class="bg-gray-100 px-2 py-1 rounded text-gray-400 font-mono text-xs">
            ********
        </code>
        <span class="text-[10px] text-gray-400 italic">Hashed</span>
    </div>
</td>

                            <td class="p-4">{{ $user->phone_no }}</td>
                            <td class="p-4 text-center font-bold text-blue-600">${{ number_format($user->balance, 2) }}</td>
                            <td class="p-4 text-center">
    <div class="flex flex-col items-center gap-2">
        <!-- Display Current Set Number -->
        <span class="bg-purple-50 text-purple-600 px-2 py-1 rounded text-xs font-bold">
            Set #{{ $user->current_set_id ?? '1' }}
        </span>

        @if($user->is_set_locked)
            <!-- Show Unlock Button if Set is Locked -->
            <button wire:click="unlockUser({{ $user->id }})" 
                    wire:loading.attr="disabled"
                    class="flex items-center gap-1 bg-amber-100 text-amber-700 px-2 py-1 rounded text-[10px] font-black uppercase tracking-tighter border border-amber-200 hover:bg-amber-600 hover:text-white transition-all">
                <i data-lucide="unlock" class="w-3 h-3"></i>
                Unlock Set
            </button>
        @else
            <!-- Show Active Status if not locked -->
            <span class="text-[10px] text-green-500 font-bold uppercase italic">Processing...</span>
        @endif
    </div>
</td>

                            <td class="p-4 text-center">
    <div class="flex flex-col items-center gap-2">
        <!-- Current Count Display -->
        <span class="bg-blue-50 text-blue-600 px-2 py-1 rounded text-xs font-medium">
            {{ $user->completed_datasets_count ?? 0 }} Items
        </span>

        <!-- New Dataset Management Link -->
        <a href="{{ route('admin.users.dataset', ['user' => $user->id]) }}" 
           class="text-blue-500 hover:text-blue-700 text-xs font-semibold flex items-center transition-colors duration-200">
            <svg xmlns="www.w3.org" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            Dataset
        </a>
    </div>
</td>

                            <td class="p-4 text-center">
    @if(trim(strtolower($user->status)) === 'active')
        <!-- Explicit Green Status -->
        <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider border border-green-200">
            Active
        </span>
    @else
        <!-- Explicit Red Status -->
        <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider border border-red-200">
            Blocked
        </span>
    @endif
</td>

                            
<td class="p-4 text-center">
    <a href="{{ route('admin.users.edit', $user->id) }}" wire:navigate 
       class="inline-flex items-center justify-center w-10 h-10 bg-blue-50 text-blue-600 rounded-lg border border-blue-100 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
        
        <!-- Use wire:ignore so Livewire doesn't delete the Lucide SVG during search -->
        <span wire:ignore>
            <i data-lucide="edit-3" class="w-5 h-5 block" style="stroke-width: 2.5px;"></i>
        </span>
        
    </a>
</td>



                        </tr>
                        @empty
                        <tr><td colspan="9" class="p-10 text-center text-gray-400">No users found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
