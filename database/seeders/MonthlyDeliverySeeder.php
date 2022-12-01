<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MonthlyDelivery;

class MonthlyDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Entregas de Paco Medina
        MonthlyDelivery::create([
            'count_delivery' => 90,
            'hours_worked' => 192,
            'date_delivery' => '2022-09-01',
            'worker_id' => 1,
            'role_id' => 1
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 110,
            'hours_worked' => 192,
            'date_delivery' => '2022-10-01',
            'worker_id' => 1,
            'role_id' => 1
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 80,
            'hours_worked' => 186,
            'date_delivery' => '2022-11-01',
            'worker_id' => 1,
            'role_id' => 1
        ]);

        // Entregas de Carlos Torres
        MonthlyDelivery::create([
            'count_delivery' => 90,
            'hours_worked' => 192,
            'date_delivery' => '2022-09-01',
            'worker_id' => 2,
            'role_id' => 2
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 110,
            'hours_worked' => 192,
            'date_delivery' => '2022-10-01',
            'worker_id' => 2,
            'role_id' => 2
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 80,
            'hours_worked' => 186,
            'date_delivery' => '2022-11-01',
            'worker_id' => 2,
            'role_id' => 2
        ]);

        // Entregas de Maria Morales
        MonthlyDelivery::create([
            'count_delivery' => 90,
            'hours_worked' => 192,
            'date_delivery' => '2022-09-01',
            'worker_id' => 3,
            'role_id' => 3
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 110,
            'hours_worked' => 192,
            'date_delivery' => '2022-10-01',
            'worker_id' => 3,
            'role_id' => 3
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 120,
            'hours_worked' => 192,
            'date_delivery' => '2022-11-01',
            'worker_id' => 3,
            'role_id' => 3
        ]);

        // Entregas de Claudia Trujillo
        MonthlyDelivery::create([
            'count_delivery' => 90,
            'hours_worked' => 192,
            'date_delivery' => '2022-09-01',
            'worker_id' => 4,
            'role_id' => 1
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 110,
            'hours_worked' => 192,
            'date_delivery' => '2022-10-01',
            'worker_id' => 4,
            'role_id' => 1
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 120,
            'hours_worked' => 192,
            'date_delivery' => '2022-11-01',
            'worker_id' => 4,
            'role_id' => 1
        ]);

        // Entregas de Juan Lopez
        MonthlyDelivery::create([
            'count_delivery' => 90,
            'hours_worked' => 192,
            'date_delivery' => '2022-09-01',
            'worker_id' => 5,
            'role_id' => 2
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 110,
            'hours_worked' => 192,
            'date_delivery' => '2022-10-01',
            'worker_id' => 5,
            'role_id' => 2
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 80,
            'hours_worked' => 186,
            'date_delivery' => '2022-11-01',
            'worker_id' => 5,
            'role_id' => 2
        ]);

        // Entregas de Lucia Carmona
        MonthlyDelivery::create([
            'count_delivery' => 90,
            'hours_worked' => 192,
            'date_delivery' => '2022-09-01',
            'worker_id' => 6,
            'role_id' => 3
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 110,
            'hours_worked' => 192,
            'date_delivery' => '2022-10-01',
            'worker_id' => 6,
            'role_id' => 3
        ]);

        MonthlyDelivery::create([
            'count_delivery' => 120,
            'hours_worked' => 192,
            'date_delivery' => '2022-11-01',
            'worker_id' => 6,
            'role_id' => 3
        ]);
    }
}
