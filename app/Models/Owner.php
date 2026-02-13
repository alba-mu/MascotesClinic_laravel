<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Owner extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'nom', 
        'email',
        'movil'
    ];

    // Define the relationship with products
    public function pets() {
        return $this->hasMany(Pet::class);
    }
}
