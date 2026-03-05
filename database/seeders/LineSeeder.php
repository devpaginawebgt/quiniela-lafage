<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lineas = [
            ['name' => 'Línea Dolor'],
            ['name' => 'Línea Salud Integral'],
            ['name' => 'Línea Salud Femenina'], 
        ];

        foreach($lineas as $linea) {
            Line::create($linea);
        }
    }
}
