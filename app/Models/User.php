<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Laravel\Cashier\Billable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'deleted_at',
        'token_delete',
        'referral_code',
        'referrer_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Get the comments for the blog post.
     */
    public function histories()
    {
        return $this->hasMany(History::class);
    }
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function user_memberships()
    {
        return $this->hasOne(UserMembership::class);
    }
    public function paymentMethod()
    {
        return $this->hasMany(PaymentMethod::class);
    }
    public function paypalAccount()
    {
        return $this->hasOne(Paypal::class);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        // $array = $this->toArray();
 
        // Customize the data array...
 
        // return $array;
        return [
            
            'name' => $this->name,  // you can search by name
            'email' => $this->email,   // you can search by email
            'id' => $this->id
        ];

    }
    // app/Models/User.php

    public function isAdmin()
    {
        return $this->userRoles->where('role', 'admin')->isNotEmpty();
    }

    public function userRoles()
    {
        return $this->hasMany(UserRoles::class);
    }

    

}
