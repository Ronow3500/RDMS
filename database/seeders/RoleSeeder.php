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

        // Manages RDMS
        DB::table('roles')->insert([
            'name' => 'System Developer'
        ]);
        // Manages RDMS
        DB::table('roles')->insert([
            'name' => 'System Admin'
        ]);
        // Manages FTP
        DB::table('roles')->insert([
            'name' => 'File Manager'
        ]);
        DB::table('roles')->insert([
            'name' => 'Manager'
        ]);
        DB::table('roles')->insert([
            'name' => 'Staff'
        ]);
    }
}
