<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use App\Events\SubCategoryCreated;
use App\Events\SubCategoryUpdated;
use App\Events\SubCategoryDeleted;

class SubCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sub_name', 'sub_rate', 'company_id',
    ];
    protected $dispatchesEvents = [
        'created' => SubCategoryCreated::class,
        'updated' => SubCategoryUpdated::class,
        'deleted' => SubCategoryDeleted::class,
    ];
    
    /**
     * Get the company that owns the subcategory.
     * 
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
