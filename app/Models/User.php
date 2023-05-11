<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Laravel\Cashier\Billable;
// use Illuminate\Support\Facades\Input;


class User extends \TCG\Voyager\Models\User
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
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function user_memberships()
    {
        return $this->hasMany(UserMembership::class);
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
            'email' => $this->email   // you can search by email
        ];

    }
}
