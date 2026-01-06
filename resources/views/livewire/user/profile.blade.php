<div>
    <div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Account Stats -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h3 class="text-lg font-bold mb-4 text-gray-700">Account Overview</h3>
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-500">A/C Balance</span>
                    <span class="font-bold text-blue-600">${{ number_format($user->balance, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">All Profits</span>
                    <span class="font-bold text-green-600">${{ number_format($user->total_profits, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">My Team</span>
                    <span class="font-bold text-purple-600">{{ $teamCount }} Members</span>
                </div>
            </div>
        </div>

        <!-- Referral Section -->
        <!-- Referral Section with Alpine.js logic -->
<div class="bg-white p-6 rounded-xl shadow-md border border-gray-100" 
     x-data="{ 
        referralCode: '{{ $user->referral_code }}', 
        copied: false,
        copyToClipboard() {
            navigator.clipboard.writeText(this.referralCode);
            this.copied = true;
            setTimeout(() => { this.copied = false }, 2000);
        }
     }">
    
    <h3 class="text-lg font-bold text-gray-700 mb-2">Referral Program</h3>
    <p class="text-sm text-gray-500 mb-4">Invite your friends and earn commissions.</p>

    <div class="flex items-center gap-2 p-3 bg-blue-50 border border-blue-100 rounded-lg">
        <!-- The Code -->
        <span class="font-mono font-bold text-blue-700 text-lg" x-text="referralCode"></span>
        
        <!-- Copy Button -->
        <button @click="copyToClipboard" 
                type="button"
                class="ml-auto flex items-center gap-2 px-3 py-1.5 rounded-md transition-all duration-200"
                :class="copied ? 'bg-green-500 text-white' : 'bg-blue-600 text-white hover:bg-blue-700'">
            
            <!-- Change icon based on status -->
            <template x-if="!copied">
                <div class="flex items-center gap-2">
                    <svg xmlns="www.w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                    <span class="text-sm font-medium">Copy</span>
                </div>
            </template>

            <template x-if="copied">
                <div class="flex items-center gap-2">
                    <svg xmlns="www.w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    <span class="text-sm font-medium">Copied!</span>
                </div>
            </template>
        </button>
    </div>
</div>


        <!-- Change Password -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h3 class="text-lg font-bold mb-4 text-gray-700">Security</h3>
            <form wire:submit.prevent="changePassword" class="space-y-4">
                <input type="password" wire:model="current_password" placeholder="Current Password" class="w-full border rounded-lg p-2">
                <input type="password" wire:model="new_password" placeholder="New Password" class="w-full border rounded-lg p-2">
                <input type="password" wire:model="new_password_confirmation" placeholder="Confirm New Password" class="w-full border rounded-lg p-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Update Password
                </button>
            </form>
        </div>

        <!-- Actions -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-center">
            <button wire:click="logout" class="flex items-center justify-center gap-2 p-4 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition font-bold">
                <i data-lucide="log-out" class="w-5 h-5"></i>
                Logout from Account
            </button>
        </div>
    </div>
</div>

</div>
