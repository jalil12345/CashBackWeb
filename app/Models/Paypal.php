<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paypal extends Model
{
    use HasFactory;
    
    protected $table = 'paypal_accounts';

    protected $fillable = [
        'paypal_email',
        'paypal_name',
        'paypal_access_token',
        'paypal_expires_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

