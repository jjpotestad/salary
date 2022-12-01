<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Julio Potestad',
            'email' => 'julio.potestad@gmail.com',
            'password' => Hash::make('admin*123'),
        ]);
    }
}
