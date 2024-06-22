<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Company extends Model
{
    use HasFactory,Searchable;

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
            'category' => $this->category   // you can search by category
        ];

    }
    protected $fillable = ['sub_category', 'affiliate_networks', 'rate', 
                           'name', 'url', 'category', 'fix_amount' ,'image',
                           'terms_exclutions', 'account_status','relationship_status',
                           'affiliate_url','advertiser_id' ];
    public function highestSubRate()
    {
        return $this->subCategories()->max('sub_rate');
    }
    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
