<?php

use Illuminate\Database\Seeder;
use App\Configuracion;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Configuracion::create([
        'inicio_clases' => now(),
        'inicio_periodo_academico' => 1,
        'fin_periodo_academico' => 4
      ]);

      $docente = factory('App\Dependencia',15)->create();
      $docente = factory('App\Asignatura',30)->create();
      $docente = factory('App\Programa',20)->create();

      $this->call(RolesSeeder::class);
      $this->call(DiasSemanasSeeder::class);
      $this->call(PermissionsSeeder::class);
      $this->call(MetodologiasSeeder::class);

    }
}