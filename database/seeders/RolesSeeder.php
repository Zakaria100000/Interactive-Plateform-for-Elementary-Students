<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users Permissions
        Role::create(['name'=> 'Super Admin']);
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'Enseignant']);
        Role::create(['name'=> 'Eleve']);
        
    }
}
