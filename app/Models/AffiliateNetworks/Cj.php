<?php

namespace App\Models\AffiliateNetworks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cj extends Model
{
    use HasFactory;
    protected $fillable = ['cj_sub_category','cj_rate', 'cj_terms_exclutions','cj_account-status',
    'cj_relationship-status','cj_c_id', 'cj_c_name', 'cj_url', 'cj_category', 'cj_fix_amount' ,'cj_image'];
    public function subCategories(): HasMany
    {
        return $this->hasMany(CjSubCategory::class );
    }
}
