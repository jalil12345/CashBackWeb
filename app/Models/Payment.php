<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\PaymentCreated;


class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'payment_method',
        'account_info',
        'status',
        'payment_amount',
        'payment_date',
        'payout_batch_id',
    ];
    // protected static function booted()
    // {
    //     static::created(function ($payment) {
    //         PaymentCreated::dispatch($payment);
    //     });
    // }
}






