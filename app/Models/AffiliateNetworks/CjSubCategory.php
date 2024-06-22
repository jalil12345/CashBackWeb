<?php

namespace App\Models\AffiliateNetworks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CjSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'sub_name',
        'sub_rate'
    ];

    public function cj()
    {
        return $this->belongsTo(Cj::class, 'company_id');
    }
}
