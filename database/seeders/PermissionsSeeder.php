<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users Permissions
        Permission::create(['name'=>'users.*']);
        Permission::create(['name'=>'users.list']);

        Permission::create(['name'=>'tp.*']);
        Permission::create(['name'=>'tp.list']);
        Permission::create(['name'=>'validate-tp']);

        Permission::create(['name'=>'cours.*']);
        Permission::create(['name'=>'cours.list']);
        Permission::create(['name'=>'validate-cours']);
        
        Permission::create(['name'=>'niveaux.*']);

        Permission::create(['name'=>'annee.*']);

        Permission::create(['name'=>'matieres.*']);

        Permission::create(['name'=>'messages.*']);
        Permission::create(['name'=>'messages.open']);

        Permission::create(['name'=>'question.create']);
    }
}
