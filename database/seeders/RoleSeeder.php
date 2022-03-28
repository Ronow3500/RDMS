<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::factory()->times(10)->create();

        DB::table('roles')->insert([
            'name' => 'System Admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'Manager'
        ]);
        DB::table('roles')->insert([
            'name' => 'Staff'
        ]);
    }
}
