<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PaymentMethod extends Model
{
    use HasFactory;
    protected $fillable = ['email_associated'];
    protected $table = 'payment_methods'; // Specify the table name
    protected $connection = 'mysql'; // Specify the database connection

    // Other model code...

    public function payments()
    {

        return $this->hasMany(Payment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
