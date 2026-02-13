<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\History;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        History::factory()->create([
            'data' => '2024-01-10',
            'motiu_visita' => 'Vacunació',
            'descripcio' => 'Vacuna anual contra la ràbia.',
            'mascota_id' => 1,
        ]);

        History::factory()->create([
            'data' => '2024-02-15',
            'motiu_visita' => 'Revisió',
            'descripcio' => 'Control de pes i dieta.',
            'mascota_id' => 1,
        ]);

        History::factory()->create([
            'data' => '2024-03-05',
            'motiu_visita' => 'Ferida',
            'descripcio' => 'Cura d`una petita ferida a la pota dreta.',
            'mascota_id' => 2,
        ]);

        History::factory()->create([
            'data' => '2024-03-12',
            'motiu_visita' => 'Desparasitació',
            'descripcio' => 'Aplicació de pipeta interna i externa.',
            'mascota_id' => 3,
        ]);

        History::factory()->create([
            'data' => '2024-04-01',
            'motiu_visita' => 'Urgència',
            'descripcio' => 'Ingesta d`un objecte estrany. Sota observació.',
            'mascota_id' => 4,
        ]);

        History::factory()->create([
            'data' => '2024-04-10',
            'motiu_visita' => 'Control',
            'descripcio' => 'Revisió post-operatòria satisfactòria.',
            'mascota_id' => 4,
        ]);

        History::factory()->create([
            'data' => '2024-05-20',
            'motiu_visita' => 'Vacunació',
            'descripcio' => 'Vacuna trivalent felina.',
            'mascota_id' => 5,
        ]);
    }
}
