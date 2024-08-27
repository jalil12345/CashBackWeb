<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Coupon extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'company_id',
        'added_by',
        'c_title',
        'c_url',
        'store',
        'type',
        'code',
        'c_status',
        'expire',
        'used',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
