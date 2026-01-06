<div>
    @if (session()->has('success'))
        <div class="mb-6 bg-green-100 p-4 rounded-lg">{{ session('success') }}</div>
    @endif
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Pending Deposits</h2>
    @include('livewire.admin.deposit.deposit-table', ['deposits' => $deposits, 'actions' => true])
</div>
