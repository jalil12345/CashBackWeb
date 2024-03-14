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
        'store',
        'type',
        'c_desc',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
