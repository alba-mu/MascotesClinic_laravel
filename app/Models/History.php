<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'data', 
        'motiu_visita',
        'descripcio',
        'mascota_id'
    ];

    // Define the relationship with pet
    public function pet() {
        return $this->belongsTo(Pet::class, 'mascota_id');
    }
}
