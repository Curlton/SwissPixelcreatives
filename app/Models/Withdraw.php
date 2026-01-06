<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str; 

class Withdraw extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * All calculation fields are included to allow the component to pass them.
     */
    protected $fillable = [
        'serial_no',
        'user_id',
        'username',
        'acct_no',
        'wallet_address',
        'request_amount_coin',
        'pondage_percent',
        'charge_coin',
        'rate',
        'amount_payable_taka',
        'note',
        'status',
    ];
    protected $attributes = [
    'pondage_percent' => 6.00,
    'status' => 'pending',
    'rate' => 1, // Added default rate
];


    /**
     * The attributes that should be cast.
     * Ensures high precision for cryptocurrency and financial values in 2025.
     */
    protected $casts = [
        'request_amount_coin' => 'decimal:8',
        'pondage_percent' => 'decimal:2',
        'charge_coin' => 'decimal:8',
        'rate' => 'decimal:8',
        'amount_payable_taka' => 'decimal:2',
        'status' => 'string',
    ];

    /**
     * Perform actions during the model lifecycle.
     */
    protected static function booted()
    {
        static::creating(function ($withdraw) {
            /**
             * Automatically generate a unique serial number for tracking.
             * This ensures every withdrawal has a reference ID even if not
             * provided by the frontend.
             */
            if (empty($withdraw->serial_no)) {
                $withdraw->serial_no = 'WID-' . strtoupper(Str::random(10));
            }
        });
    }

    /**
     * Define the relationship back to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
