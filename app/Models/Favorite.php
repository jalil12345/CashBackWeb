<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = ['company_id','user_id','affiliate_networks_id','companies_click_id',
                            'name','url','category','image','rate','duration'];
    protected $table = 'favorites'; // Specify the table name
    protected $connection = 'mysql'; // Specify the database connection

    public function users()
{
    return $this->belongsToMany(User::class, 'user_id');
}

    
}
