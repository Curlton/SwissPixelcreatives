<?php
namespace App\Livewire\Admin\Users;

use App\Models\User;
use App\Models\DataSet;
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

    // Fetch unique product names (stored in product_id column)
    // withoutGlobalScopes() ensures you see all entries despite any user-level filters
    $this->productList = \App\Models\DataSet::withoutGlobalScopes()
        ->whereNotNull('product_id')
        ->where('product_id', '!=', '') // Ensure empty strings are excluded
        ->distinct()
        ->pluck('product_id'); // Returns a simple array of strings: ['Laptop', 'Phone', etc.]
}



   public function updatedRows($value, $field)
{
    // $field looks like "rows.0.product_id"
    if (str_ends_with($field, '.product_id')) {
        // Extract the middle part which is the index
        $parts = explode('.', $field);
        $index = (int) $parts[1]; // Ensure this is an integer

        if ($value) {
            // Find the latest entry for this product string
            $existing = \App\Models\DataSet::withoutGlobalScopes()
                ->where('product_id', $value)
                ->latest()
                ->first();

            if ($existing) {
                // Update the EXACT row index that was changed
                $this->rows[$index]['price'] = $existing->price;
                $this->rows[$index]['profit'] = $existing->profit;
            }
        }
    }
}


    public function showForm($setNumber)
    {
        $this->selectedSet = $setNumber;
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
        // 1. Find the ORIGINAL item from the general pool
        $original = DataSet::withoutGlobalScopes()
            ->where('product_id', $row['product_id'])
            ->first();

        if ($original) {
            // 2. Create the CUSTOM item ONLY in the data_sets table
            // We do NOT create the UserDataset here.
            DataSet::create([
                'user_id'       => $this->user->id,
                'original_id'   => $original->id,
                'product_id'    => $row['product_id'],
                'price'         => $row['price'],
                'profit'        => $row['profit'],
                'product_desc'  => $original->product_desc,
                'product_image' => $original->product_image,
                'set_number'    => $this->selectedSet, // This acts as the trigger task number
                'status'        => 'pending',
                'is_custom'     => true,
            ]);
        }
    }

    session()->flash('message', "Custom items assigned. They will freeze when the user encounters them.");
    return redirect()->route('admin.users.dataset', $this->user->id);
}



    public function render()
    {
        return view('livewire.admin.users.custom-dataset-picker')
            ->layout('components.layouts.admin');
    }
}
