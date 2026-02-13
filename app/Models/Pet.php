<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'nom',
        'propietari_id',
    ];

    // Define the relationship with owner
    public function owner()
    {
        return $this->belongsTo(Owner::class, 'propietari_id');
    }

    public function history() {
        return $this->hasMany(History::class, 'mascota_id');
    }
}
