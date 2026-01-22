<?php

namespace App\Livewire\Admin;

use App\Models\Dataset; 
use Livewire\Component;
use Livewire\Attributes\Title;

class AddDataset extends Component
{
    #[Title('Add Dataset')]
    public $product_id, $price, $product_desc, $product_image;

    protected $rules = [
        'product_id' => 'required|string|max:255',
        'price' => 'required|numeric',
        'product_desc' => 'required|string|max:5000',
        'product_image' => 'required|url',
    ];

    public function save()
    {
        $this->validate();

        // 1. AUTO-ASSIGN SET NUMBER (1, 2, or 3)
        // Counts existing standard items to determine the set
        $currentCount = Dataset::where('is_custom', false)->count();
        
        // 0-39 -> Set 1 | 40-79 -> Set 2 | 80-119 -> Set 3
        $assignedSet = floor($currentCount / 40) + 1;

        // 2. CREATE STANDARD PRODUCT
        Dataset::create([
            'product_id'    => $this->product_id,
            'product_image' => $this->product_image,
            'product_desc'  => $this->product_desc,
            'price'         => $this->price,
            'set_number'    => $assignedSet, 
            'is_custom'     => false,
            'profit'        => 0, // Profit is 0 because it's calculated dynamically for standard items
        ]);

        session()->flash('success', "Item added to Set $assignedSet successfully!");
        
        return $this->redirect(route('admin.dashboard'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.add-dataset')
                ->layout('components.layouts.admin');
    }
}
