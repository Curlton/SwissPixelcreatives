<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Dataset extends Model
{
    use HasFactory;

    protected $table = 'data_sets';

    protected $fillable = [
        'user_id', 
        'product_id', 
        'product_image', 
        'product_desc', 
        'price', 
        'profit', // RESTORED for Merged/Custom products
        'set_number',
        'is_custom',
        'original_id'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'profit' => 'decimal:2', // RESTORED
        'is_custom' => 'boolean',
    ];

    /**
     * DYNAMIC PROFIT CALCULATION
     * Handles 2026 dynamic logic for standard items while 
     * returning the fixed DB profit for custom/merged items.
     */
    public function getProfitForUser(User $user)
    {
        // 1. If it's a Merged Product (Custom), use the Admin-defined profit from DB
        if ($this->is_custom) {
            return $this->profit;
        }

        // 2. Otherwise, calculate dynamic profit for Standard Items
        // We calculate based on the first 40 standard products to keep the ratio consistent
        $totalSetPrice = self::where('is_custom', false)
                             ->orderBy('id', 'asc')
                             ->take(40) 
                             ->sum('price');

        if ($totalSetPrice <= 0) return 0;

        // Get target profit from user's level relationship (14, 28, 42, etc.)
        $targetProfit = $user->level->target_set_profit ?? 14.00;

        return ($this->price / $totalSetPrice) * $targetProfit;
    }

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
                $builder->where('is_custom', false);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCustomOnly($query)
    {
        return $query->where('is_custom', true);
    }
}
