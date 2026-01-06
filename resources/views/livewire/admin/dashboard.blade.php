<div>
    <!-- FLASH MESSAGES (Ensure this is at the top) -->
    @if (session()->has('success'))
        <div id="flash-message" class="mb-6 flex items-center gap-3 bg-green-50 border-l-4 border-green-500 p-4 text-green-700 shadow-sm rounded-r-lg transition-all">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Today's Withdrawals -->
<div wire:key="chart-withdraw-{{ count($withdrawData) }}" 
     class="bg-white p-6 rounded-xl shadow-sm border border-gray-100" 
     x-data="{
        chart: null,
        init() {
            // Destroy existing chart if it exists to prevent memory leaks
            if (this.chart) this.chart.destroy();

            this.chart = new ApexCharts(this.$refs.withdrawChart, {
                chart: { 
                    type: 'line', 
                    height: 150, 
                    sparkline: { enabled: true },
                    animations: { enabled: true } 
                },
                series: [{ name: 'Withdrawals', data: @json($withdrawData) }],
                stroke: { curve: 'smooth', width: 3 },
                colors: ['#22c55e'],
                tooltip: { theme: 'dark' }
            });
            this.chart.render();
        }
     }">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-gray-500 font-medium">Today's Withdrawals</h3>
        <span class="text-green-500 bg-green-50 px-2 py-1 rounded text-xs italic font-bold">Real-time</span>
    </div>
    <!-- wire:ignore is essential here -->
    <div wire:ignore x-ref="withdrawChart"></div>
</div>


    <!-- Pending Approvals -->
    <div wire:key="chart-pending-{{ count($pendingData) }}" 
         class="bg-white p-6 rounded-xl shadow-sm border border-gray-100"
         x-data="{
            init() {
                new ApexCharts(this.$refs.pendingChart, {
                    chart: { type: 'bar', height: 150, sparkline: { enabled: true } },
                    series: [{ name: 'Pending', data: @json($pendingData) }], 
                    colors: ['#f97316']
                }).render();
            }
         }" x-init="init()">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-gray-500 font-medium">Pending Approvals</h3>
            <span class="text-orange-500 bg-orange-50 px-2 py-1 rounded text-xs italic font-bold">Waiting</span>
        </div>
        <div wire:ignore x-ref="pendingChart"></div>
    </div>

    <!-- Deposits Approved Today -->
    <div wire:key="chart-deposit-{{ count($depositData) }}" 
         class="bg-white p-6 rounded-xl shadow-sm border border-gray-100"
         x-data="{
            init() {
                new ApexCharts(this.$refs.depositChart, {
                    chart: { type: 'area', height: 150, sparkline: { enabled: true } },
                    series: [{ name: 'Deposits', data: @json($depositData) }],
                    colors: ['#3b82f6']
                }).render();
            }
         }" x-init="init()">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-gray-500 font-medium">Deposits Approved</h3>
            <span class="text-blue-500 bg-blue-50 px-2 py-1 rounded text-xs italic font-bold">Today</span>
        </div>
        <div wire:ignore x-ref="depositChart"></div>
    </div>
</div>


    <!-- DATASET TABLE -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b flex justify-between items-center bg-gray-50">
            <h3 class="font-bold text-gray-700 text-lg">Product Datasets</h3>
            <a href="{{ route('admin.datasets.add') }}" 
               wire:navigate 
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg flex items-center gap-2 transition shadow-md">
                <i data-lucide="plus-circle" class="w-5 h-5"></i>
                <span class="font-bold">Add Dataset</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-400 text-sm uppercase tracking-wider border-b bg-gray-50/50">
                        <th class="p-4 font-medium">SNo</th>
                        <th class="p-4 font-medium">Image</th>
                        <th class="p-4 font-medium">Product Details</th>
                        <th class="p-4 font-medium">Price</th>
                        <th class="p-4 font-medium">Profit</th>
                        <th class="p-4 font-medium text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-gray-600">
                    @forelse($datasets as $index => $data)
                    <tr wire:key="dataset-{{ $data->id }}" class="hover:bg-gray-50/80 transition group">
                        <td class="p-4 font-semibold text-gray-400">#{{ $index + 1 }}</td>
                        <td class="p-4">
                            <img src="{{ $data->product_image }}" 
                                 class="w-20 h-20 rounded-lg object-cover border border-gray-200 shadow-sm"
                                 alt="Product"
                                 onerror="this.src='ui-avatars.com'">
                        </td>
                        <td class="p-4">
                            <div class="w-80">
                                <details class="group/desc cursor-pointer">
                                    <summary class="list-none">
                                        <div class="text-sm font-semibold text-gray-700 leading-snug line-clamp-2 group-open/desc:hidden">
                                            {{ $data->product_desc }}
                                        </div>
                                        <div class="text-[10px] text-blue-500 font-bold mt-1 group-open/desc:hidden flex items-center gap-1">
                                            <i data-lucide="eye" class="w-3 h-3"></i> VIEW FULL DESCRIPTION
                                        </div>
                                    </summary>
                                    <div class="text-sm text-gray-600 leading-relaxed bg-gray-50 p-3 rounded-lg border border-gray-100 mt-2">
                                        {{ $data->product_desc }}
                                    </div>
                                </details>
                                <div class="text-[10px] uppercase tracking-wider text-gray-400 mt-1.5 font-medium">
                                    ID: <span class="text-gray-500">{{ $data->product_id }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-4 text-blue-600 font-bold text-base">${{ number_format($data->price, 2) }}</td>
                        <td class="p-4 text-green-600 font-bold text-base">${{ number_format($data->profit, 2) }}</td>
                        <td class="p-4 text-center">
                            <button wire:click="delete({{ $data->id }})" 
                                wire:confirm="Are you sure?" 
                                class="flex items-center justify-center gap-2 px-3 py-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-all border border-red-200">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                <span class="text-xs font-bold uppercase">Delete</span>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="p-10 text-center text-gray-400 italic">No datasets found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Chart & Icon Scripts -->
<script>
    /**
     * This script handles global UI logic that must persist 
     * or re-initialize across Livewire navigation.
     */
    document.addEventListener('livewire:navigated', () => {
        
        // 1. RE-INITIALIZE ICONS
        // Essential for 2025: Ensures icons show up on every page load
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // 2. AUTO-HIDE FLASH MESSAGES
        // Finds any success/error messages and fades them out after 3 seconds
        const flashMsg = document.getElementById('flash-message');
        if (flashMsg) {
            setTimeout(() => {
                flashMsg.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                flashMsg.style.opacity = '0';
                flashMsg.style.transform = 'translateY(-10px)';
                setTimeout(() => flashMsg.remove(), 500);
            }, 3000);
        }

        // Note: Charts are now handled by Alpine.js x-init inside 
        // the dashboard view, so they are automatically re-rendered there.
    });
</script>


</div>
