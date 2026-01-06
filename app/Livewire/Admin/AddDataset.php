<?php

namespace App\Livewire\Admin;

use App\Models\DataSet; // Fixed case: DataSet
use Livewire\Component;
use Livewire\Attributes\Layout;

class AddDataset extends Component
{
    public $product_id, $price, $profit, $product_desc, $product_image;

    // Rules defined as a property (Livewire 3 standard)
    protected $rules = [
        'product_id' => 'required|string|max:255',
        'price' => 'required|numeric',
        'profit' => 'required|numeric',
        'product_desc' => 'required|string|max:5000',
        'product_image' => 'required|url',
    ];
    // Add custom messages to show when the limit is hit
    protected $messages = [
          'product_desc.max' => 'The description is too long! Please keep it under 5000 characters.',
    ];

    public function save()
    {
        // 1. Validate
        $this->validate();

        // 2. Create in Database
        DataSet::create([
            'product_id'    => $this->product_id,
            'product_image' => $this->product_image,
            'product_desc'  => $this->product_desc, // Mapping to your DB column
            'price'         => $this->price,
            'profit'        => $this->profit,
        ]);

        // 3. Flash Message & Redirect
        session()->flash('success', 'Dataset added successfully!');
        
        return $this->redirect(route('admin.dashboard'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.add-dataset')
                ->layout('components.layouts.admin'); // Ensure this path is correct
    }
}
