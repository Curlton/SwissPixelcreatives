<div>
<div class="max-w-4xl mx-auto my-8 px-4">
    <!-- Header Section -->
    <div class="mb-8 text-center">
        <h4 class="text-orange-600 font-bold uppercase tracking-wider text-sm mb-2">Support Center</h4>
        <h1 class="text-3xl font-extrabold text-gray-900">Frequently Asked Questions</h1>
    </div>

    <!-- FAQ Accordion Container -->
    <div class="space-y-4" x-data="{ active: null }">
        
        <!-- Q1 -->
        <div class="bg-white rounded-2xl shadow-sm border border-orange-100 overflow-hidden">
            <button @click="active !== 1 ? active = 1 : active = null" class="w-full flex justify-between items-center p-5 text-left transition hover:bg-orange-50">
                <span class="font-bold text-gray-800">1. How many datasets can I drive per day?</span>
                <i class="ri-arrow-down-s-line text-xl transition-transform" :class="active === 1 ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="active === 1" x-collapse class="p-5 pt-0 text-gray-600 leading-relaxed border-t border-orange-50">
                You can complete **2 datasets per day**. Each dataset must be fully finished before the system allows you to start the next one.
            </div>
        </div>

        <!-- Q2 -->
        <div class="bg-white rounded-2xl shadow-sm border border-orange-100 overflow-hidden">
            <button @click="active !== 2 ? active = 2 : active = null" class="w-full flex justify-between items-center p-5 text-left transition hover:bg-orange-50">
                <span class="font-bold text-gray-800">2. Can you explain the Merge Data process?</span>
                <i class="ri-arrow-down-s-line text-xl transition-transform" :class="active === 2 ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="active === 2" x-collapse class="p-5 pt-0 text-gray-600 leading-relaxed border-t border-orange-50">
                Merge data includes 1-3 high-value product entries which must be submitted together in a single batch. Each set can contain a maximum of **3 merge data entries**, which are randomly assigned by the system to ensure platform fairness.
            </div>
        </div>

        <!-- Q3 -->
        <div class="bg-white rounded-2xl shadow-sm border border-orange-100 overflow-hidden">
            <button @click="active !== 3 ? active = 3 : active = null" class="w-full flex justify-between items-center p-5 text-left transition hover:bg-orange-50">
                <span class="font-bold text-gray-800">3. When can I withdraw my funds?</span>
                <i class="ri-arrow-down-s-line text-xl transition-transform" :class="active === 3 ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="active === 3" x-collapse class="p-5 pt-0 text-gray-600 leading-relaxed border-t border-orange-50">
                Withdrawals are enabled immediately **after completing a full set of data**. Once finished, you can withdraw your initial capital plus all earned commissions directly to your wallet.
            </div>
        </div>

        <!-- Q4 -->
        <div class="bg-white rounded-2xl shadow-sm border border-orange-100 overflow-hidden">
            <button @click="active !== 4 ? active = 4 : active = null" class="w-full flex justify-between items-center p-5 text-left transition hover:bg-orange-50">
                <span class="font-bold text-gray-800">4. What are the Platform Operating Hours?</span>
                <i class="ri-arrow-down-s-line text-xl transition-transform" :class="active === 4 ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="active === 4" x-collapse class="p-5 pt-0 text-gray-600 leading-relaxed border-t border-orange-50">
                The platform operates **24 hours daily**. Users can drive product data and access support at any time.
            </div>
        </div>

        <!-- Q5 & Q6 Agent Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-orange-100 overflow-hidden">
            <button @click="active !== 5 ? active = 5 : active = null" class="w-full flex justify-between items-center p-5 text-left transition hover:bg-orange-50">
                <span class="font-bold text-gray-800">5. Agent Program & Rewards</span>
                <i class="ri-arrow-down-s-line text-xl transition-transform" :class="active === 5 ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="active === 5" x-collapse class="p-5 pt-0 text-gray-600 leading-relaxed border-t border-orange-50">
                <p class="mb-3">You can become a platform agent by referring others using your invitation code. You will earn a **25% subordinate dividend** based on the daily commission earned from your direct first-level users.</p>
                <div class="bg-orange-50 p-4 rounded-xl border border-orange-100 text-sm">
                    <strong>Agent Requirements:</strong> Agents must complete at least 10 working days of training to be eligible for a base salary and additional performance commissions.
                </div>
            </div>
        </div>

    </div>

    <!-- Contact CTA -->
    <div class="mt-10 p-6 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl text-center text-white shadow-lg">
        <h5 class="font-bold mb-2">Still have questions?</h5>
        <p class="text-sm opacity-90 mb-4">Our customer service team is available 24/7 to assist you.</p>
        <a href="{{ route('user.service') }}" wire:navigate class="inline-block bg-white text-orange-600 px-6 py-2 rounded-full font-bold hover:bg-gray-100 transition">
            Contact Support
        </a>
    </div>
</div>
</div>
