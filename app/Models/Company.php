<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
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
            'category' => $this->category   // you can search by email
        ];

    }
}
