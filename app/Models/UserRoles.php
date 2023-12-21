<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    use HasFactory;

    protected $table = 'user_roles'; // Specify the table name

    protected $fillable = ['user_id', 'role']; // Define the fillable columns

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
