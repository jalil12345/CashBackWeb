<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMembership extends Model
{
    use HasFactory;
    protected $fillable = ['membership_name',
                           'user_id'];
    protected $table = 'user_memberships'; // Specify the table name
    protected $connection = 'mysql'; // Specify the database connection


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
