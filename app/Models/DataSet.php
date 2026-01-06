<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class DataSet extends Model
{
    use HasFactory;

    protected $table = 'data_sets';

    protected $fillable = [
        'user_id', 
        'product_id', 
        'product_image', 
        'product_desc', 
        'price', 
        'profit',
        'set_number',
        'is_custom',
        // 'status' removed as it was moved to UserDataset
        'original_id'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'profit' => 'decimal:2',
        'is_custom' => 'boolean',
    ];

    /**
     * GLOBAL SCOPE: Enforce exclusivity of custom items.
     * Standard items (is_custom: 0) are visible to everyone.
     * Custom items (is_custom: 1) are ONLY visible to the assigned user_id.
     */
    protected static function booted()
    {
        static::addGlobalScope('user_exclusivity', function (Builder $builder) {
            if (Auth::check()) {
                $builder->where(function ($query) {
                    $query->where('is_custom', false)
                          ->orWhere(function ($sub) {
                              $sub->where('is_custom', true)
                                  ->where('user_id', Auth::id());
                          });
                });
            } else {
                // If guest, only show standard products
                $builder->where('is_custom', false);
            }
        });
    }

    /**
     * Relationship: A dataset might belong to a specific user (for merged products).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Local Scope: Helpful for admin panels to find specifically custom items.
     */
    public function scopeCustomOnly($query)
    {
        return $query->where('is_custom', true);
    }
}
