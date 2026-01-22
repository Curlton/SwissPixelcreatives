<?php
namespace App\Livewire\Admin\Users;

use App\Models\User;
use App\Models\Dataset;
use Livewire\Component;
use Livewire\Attributes\Title;
class CustomDatasetPicker extends Component
{
    #[Title('CustomDatasetPicker')]
    public User $user;
    public $productList = []; 
    public $rows = []; 
    public $selectedSet = null;
// app/Livewire/Admin/Users/CustomDatasetPicker.php

public function mount(User $user)
{
    $this->user = $user;
    // Do not load products yet; wait for a set to be selected
    $this->productList = [];
}



  public function updatedRows($value, $field)
{
    if (str_ends_with($field, '.product_id')) {
        $parts = explode('.', $field);
        $index = (int) $parts[1];

        if ($value) {
            $existing = \App\Models\Dataset::withoutGlobalScopes()
                ->where('product_id', $value)
                ->where('is_custom', false) // Always pull from standard pool
                ->first();

            if ($existing) {
                $this->rows[$index]['price'] = $existing->price;
                // Standard items have 0 profit in DB, Admin must enter custom profit here
                $this->rows[$index]['profit'] = 0; 
            }
        }
    }
}



    public function showForm($setNumber)
{
    $this->selectedSet = $setNumber;

    // 2026 FILTER LOGIC: Fetch only standard products matching this set number
    $this->productList = \App\Models\Dataset::withoutGlobalScopes()
        ->where('is_custom', false)
        ->where('set_number', $setNumber)
        ->whereNotNull('product_id')
        ->where('product_id', '!=', '')
        ->distinct()
        ->pluck('product_id');

    // Initialize rows with an empty entry
    $this->rows = [['product_id' => '', 'price' => 0, 'profit' => 0]];
}

    public function addRow()
    {
        if (count($this->rows) < 5) {
            $this->rows[] = ['product_id' => '', 'price' => 0, 'profit' => 0];
        }
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows);
    }
public function saveDataset()
{
    $this->validate([
        'rows.*.product_id' => 'required',
        'rows.*.price' => 'required|numeric',
        'rows.*.profit' => 'required|numeric',
    ]);

    foreach ($this->rows as $row) {
        // 1. Find the ORIGINAL item to copy its description and image
        $original = Dataset::withoutGlobalScopes()
            ->where('product_id', $row['product_id'])
            ->where('is_custom', false) // Ensure we copy a standard item
            ->first();

        if ($original) {
            // 2. Create the CUSTOM override
            Dataset::create([
                'user_id'       => $this->user->id,
                'original_id'   => $original->id, // This links it to the position
                'product_id'    => $row['product_id'],
                'price'         => $row['price'],   // Admin's manual price
                'profit'        => $row['profit'],  // Admin's manual profit
                'product_desc'  => $original->product_desc,
                'product_image' => $original->product_image,
                // CRITICAL: set_number must be the CYCLE (1, 2, or 3) 
                // to match the user's current_set_id
                'set_number'    => $original->set_number, 
                'is_custom'     => true,
            ]);
        }
    }

    session()->flash('message', "Custom items assigned to Set " . $original->set_number);
    return redirect()->route('admin.users.dataset', $this->user->id);
}



    public function render()
    {
        return view('livewire.admin.users.custom-dataset-picker')
            ->layout('components.layouts.admin');
    }
}
