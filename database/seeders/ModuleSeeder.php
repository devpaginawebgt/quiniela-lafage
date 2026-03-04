<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [ 'name' => 'App - Próximos Partidos', 'code' => 'app-proximos-partidos' ],
            [ 'name' => 'App - Mis Pronósticos',   'code' => 'app-mis-pronosticos' ],
        ]; 

        foreach($modules as $module) {
            Module::create($module);
        }
    }
}
