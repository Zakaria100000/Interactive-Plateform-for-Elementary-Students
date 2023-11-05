<?php

namespace App\Http\Livewire\Cours;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Cours ;
use App\Models\Matiere ;
use App\Models\Niveau ;

class Create extends Component
{
   use WithFileUploads, AuthorizesRequests;

   public  $name , $matiere_id ,$niveau_id, $fileSave ,$f, $resume;

   public function saveNewCours(){
      
      $this->f = $this->fileSave->store('cours','public') ;

      $cours = Cours::create([
         'name' => $this->name,
         'resume' => $this->resume,
         'file' => $this->f ,
         'matiere_id' => $this->matiere_id ,
         'niveau_id' => $this->niveau_id ,
         'user_id' => auth()->user()->id,
      ]);

      toast('Nouveau cours ajouté avec success','success');

      return redirect()->route('cours.index');
   }

   public function render()
   {
      $matieres = Matiere::all(); 
      $niveaux = Niveau::all(); 
      return view('livewire.cours.create',compact(['matieres','niveaux']));
   }
}
