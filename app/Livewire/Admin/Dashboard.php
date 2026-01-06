<?php

namespace App\Livewire\Admin;

use App\Models\Dataset;
use App\Models\Withdraw; 
use App\Models\Deposit;  
use Livewire\Component;

class Dashboard extends Component
{   
    public $withdrawData = [];
    public $pendingData = [];
    public $depositData = [];

    public function mount()
{
    // Use your local timezone (e.g., 'Africa/Kampala') to define today
    $startOfToday = now('Africa/Kampala')->startOfDay();
    $endOfToday = now('Africa/Kampala')->endOfDay();

    // 1. Withdrawals
    $this->withdrawData = Withdraw::whereBetween('created_at', [$startOfToday, $endOfToday])
        ->pluck('amount_payable_taka')
        ->map(fn($val) => (float)$val) // Ensure numeric values for JavaScript
        ->toArray();

    $this->pendingData = Withdraw::where('status', 'pending')
        ->pluck('amount_payable_taka')
        ->map(fn($val) => (float)$val)
        ->toArray();

    // 2. Deposits
    $this->depositData = Deposit::where('status', 'approved')
        ->whereBetween('created_at', [$startOfToday, $endOfToday])
        ->pluck('amount_usd_taka')
        ->map(fn($val) => (float)$val)
        ->toArray();

    // FALLBACKS: Pass [0] to ensure the chart has a point to render
    $this->withdrawData = !empty($this->withdrawData) ? $this->withdrawData : [0];
    $this->pendingData = !empty($this->pendingData) ? $this->pendingData : [0];
    $this->depositData = !empty($this->depositData) ? $this->depositData : [0];
}


    public function delete($id)
    {
        $dataset = Dataset::find($id);
        if ($dataset) {
            $dataset->delete();
            session()->flash('success', 'Deleted successfully.');
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'datasets' => Dataset::latest()->get()
        ])->layout('components.layouts.admin');
    }
}
