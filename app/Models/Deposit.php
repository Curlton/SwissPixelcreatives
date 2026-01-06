<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'serial_no',
        'order_id',
        'trans_id',
        'type',
        'wallet_address',
        'acct_no',
        'amount_coins',
        'rate',
        'amount_usd_taka',
        'status',
    ];
    
    // Cast financial fields for safety in PHP
    protected $casts = [
        'amount_coins' => 'decimal:8',
        'rate' => 'decimal:8',
        'amount_usd_taka' => 'decimal:2',
        'status' => 'string',
    ];

    /**
     * Define the relationship back to the User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

