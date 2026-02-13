<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Pet;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pet::factory()->create([
            'nom' => 'Buddy',
            'propietari_id' => 1,
        ]);

        Pet::factory()->create([
            'nom' => 'Luna',
            'propietari_id' => 1, 
        ]);

        Pet::factory()->create([
            'nom' => 'Rex',
            'propietari_id' => 2, 
        ]);

        Pet::factory()->create([
            'nom' => 'Miau',
            'propietari_id' => 3, 
        ]);

        Pet::factory()->create([
            'nom' => 'Nala',
            'propietari_id' => 3,   
        ]);
    }
}
