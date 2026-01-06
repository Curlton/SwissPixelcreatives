<?php

namespace App\Livewire\Admin\Withdraw;

use App\Models\Withdraw;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class ApprovedWithdraw extends Component
{
    public function render()
    {
        return view('livewire.admin.withdraw.approved-withdraw', [
            // Filter by 'approved' status
            'withdrawals' => Withdraw::where('status', 'approved')->latest()->get()
        ]);
    }
}

