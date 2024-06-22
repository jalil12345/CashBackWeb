<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'p_name',
        'p_store',
        'trip_cashback',
        'trip_id',
        'trip_status',
        'verified',
        'pending',
        'payable',
        'p_price',
        'paid_amount',

    ];
    public function user()
        {
            return $this->belongsToMany(User::class);
        }
}
