<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Favorite extends Model
{
    use HasFactory,Searchable;
    protected $fillable = ['company_id','user_id',];
    protected $table = 'favorites'; // Specify the table name
    protected $connection = 'mysql'; // Specify the database connection

    public function users()
        {
            return $this->belongsToMany(User::class, 'user_id');
        }
    public function company()
        {
            return $this->belongsTo(Company::class);
        }
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
            
            'company_id' => $this->company_id
        ];

    }
    
}
