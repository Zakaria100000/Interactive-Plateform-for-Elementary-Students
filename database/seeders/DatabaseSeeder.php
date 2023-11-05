<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User ;
use App\Models\Matiere ;
use App\Models\Niveau ;
use App\Models\Annee ;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(1)->create();
         
         \App\Models\User::factory(1)->create([
            'username' => "Khaldi.amine" ,
            'name' => "Khaldi Elamine",
            'email' => "prof@platform.com",
         ]);

         \App\Models\User::factory(1)->create([
            'username' => "Sofiane.brahimi" ,
            'name' => "Brahimi sofiane Elamine",
            'email' => "eleve@platform.com",
         ]);

         $this->call([
            PermissionsSeeder::class,
            RolesSeeder::class,
         ]);

         $user = User::find(1) ;
         $user2 = User::find(2) ;
         $user3 = User::find(3) ;

         $user->givePermissionTo('users.*');
         $user->givePermissionTo('messages.*');
         $user->givePermissionTo('matieres.*');
         $user->givePermissionTo('messages.open');
         $user->givePermissionTo('niveaux.*');
         $user->givePermissionTo('annee.*');
         $user->givePermissionTo('tp.list');
         $user->givePermissionTo('validate-tp');
         $user->givePermissionTo('cours.list');
         $user->givePermissionTo('validate-cours');
         $user->assignRole('Super Admin');
         
         $user2->givePermissionTo('tp.*');
         $user2->givePermissionTo('tp.list');
         $user2->givePermissionTo('cours.*');
         $user2->givePermissionTo('cours.list');
         $user2->givePermissionTo('question.create');
         $user2->assignRole('Enseignant');
         
         $user3->assignRole('Eleve');

         Matiere::create(['name' => 'Science naturel']) ;
         Matiere::create(['name' => 'Physique']) ;
         Matiere::create(['name' => 'Mathématique']) ;
         Matiere::create(['name' => 'Arab']) ;
         Matiere::create(['name' => 'Français']) ;
         Matiere::create(['name' => 'Anglais']) ;
         Matiere::create(['name' => 'Histoire']) ;

         Niveau::create(['name' => 'Première Année Moyenne (1AM)']);
         Niveau::create(['name' => 'Deuxième Année Moyenne (2AM)']);
         Niveau::create(['name' => 'Troisième Annéée Moyenne (3AM)']);
         Niveau::create(['name' => 'Quatrième Année Moyenne (4AM)']);

         Annee::create(['name' => '2019 - 2020']) ;
         Annee::create(['name' => '2020 - 2021']) ;
         Annee::create(['name' => '2021 - 2022']) ;
    }
}
