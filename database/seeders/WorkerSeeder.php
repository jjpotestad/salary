<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Worker;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        $chofer = 1;
        $cargador = 2;
        $auxiliar = 3;

        //Insertar datos
        Worker::create([
            'full_name' => 'Paco Medina',
            'ref_number' => 12,
            'role_id' => $chofer,
        ]);
        
        Worker::create([
            'full_name' => 'Carlos Torres',
            'ref_number' => 15,
            'role_id' => $cargador,
        ]);

        Worker::create([
            'full_name' => 'Maria Morales',
            'ref_number' => 20,
            'role_id' => $auxiliar,
        ]);

        Worker::create([
            'full_name' => 'Claudia Trujillo',
            'ref_number' => 22,
            'role_id' => $chofer,
        ]);

        Worker::create([
            'full_name' => 'Juan Lopez',
            'ref_number' => 32,
            'role_id' => $cargador,
        ]);

        Worker::create([
            'full_name' => 'Lucia Carmona',
            'ref_number' => 35,
            'role_id' => $auxiliar,
        ]);
    }
}
