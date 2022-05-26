<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kenneth Kipchumba',
            'email' => 'kenneth.kipchumba@tifaresearch.com',
            'password' => Hash::make('Arsenal3500')
        ]);
        User::create([
            'name' => 'Kelvin Masika',
            'email' => 'kelvin.masika@tifaresearch.com',
            'password' => Hash::make('password')
        ]);
    }
}
