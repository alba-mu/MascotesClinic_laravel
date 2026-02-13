<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Owner;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::factory()->create([
            'nom' => 'Joan Garcia',
            'email' => 'joan.garcia@email.com',
            'movil' => '600111222',
        ]);

        Owner::factory()->create([
            'nom' => 'Marta Rovira',
            'email' => 'marta.rovira@email.com',
            'movil' => '611222333',
        ]);
        
        Owner::factory()->create([
            'nom' => 'Pere Soler',
            'email' => 'pere.soler@email.com',
            'movil' => '622333444',
        ]);
    }
}
