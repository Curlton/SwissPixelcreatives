<?php

namespace App\Livewire\Admin\Payment;

use App\Models\PaymentMethod; // Ensure you have this model
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.admin')]
class ManageMethods extends Component
{
    #[Title('ManageMethods')]
    public function toggleStatus($id)
    {
        $method = PaymentMethod::find($id);
        if ($method) {
            $method->update([
                'status' => $method->status === 'active' ? 'inactive' : 'active'
            ]);
            session()->flash('success', 'Status updated successfully.');
        }
    }

    public function delete($id)
    {
        $method = PaymentMethod::find($id);
        if ($method) {
            $method->delete();
            session()->flash('success', 'Payment method deleted.');
        }
    }

    public function render()
    {
        return view('livewire.admin.payment.manage-methods', [
            'methods' => PaymentMethod::latest()->get()
        ]);
    }
}
