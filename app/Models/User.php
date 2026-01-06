<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{    
    protected $guard = 'web';
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'phone_no', 
        'email',
        'password',
        'referral_code',
        'membership_level',
        'balance',
        'today_profit',
        'referred_by',
        'membership_level_id',
        'current_set_id', // Must be here
        'is_set_locked',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //define relationship to deposits
    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
    //define relationship to withdraws
    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function completedDatasets()
    {
        // Replace 'user_id' if your foreign key in UserDataset is different
        return $this->hasMany(UserDataset::class, 'user_id');
    }

 

}
