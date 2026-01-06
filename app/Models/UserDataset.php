<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDataset extends Model
{
    protected $table = 'user_datasets';

    protected $fillable = [
        'user_id',
        'current_set_id',
        'product_id',
        'product_image',
        'product_desc',
        'price',
        'profit',
        'task_number',
        'status', // should be 'pending', 'completed', or 'frozen'
    ];

    public function dataset()
    {
        return $this->belongsTo(Dataset::class, 'product_id', 'id')->withoutGlobalScopes();
    }

    protected static function booted()
    {
        // 1. Ensure new records are NOT frozen by default unless specified
        static::creating(function ($userDataset) {
            if (!$userDataset->status) {
                $userDataset->status = 'pending';
            }
        });

        // 2. Cleanup source data when history is deleted
        static::deleting(function ($userDataset) {
            if ($userDataset->dataset && $userDataset->dataset->is_custom) {
                $userDataset->dataset->delete();
            }
        });
    }

    /**
     * Helper to check if this is a "Trap" item (Custom)
     */
    public function isTrap()
    {
        return $this->dataset && $this->dataset->is_custom;
    }
}
