<?php

namespace App\Http\Livewire\Cours;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Cours ;
use App\Models\Matiere ;
use App\Models\Niveau ;

class Edit extends Component
{
   use WithFileUploads ;

   public $coursCompnent, $n ,$m ;
   public  $name , $resume, $matiere_id ,$niveau_id, $fileSave,$f ;

   public function mount($cours) {

      $this->coursCompnent = $cours ;
      
      $this->name = $this->coursCompnent->name ;
      $this->resume = $this->coursCompnent->resume ;
      $this->niveau_id = $this->coursCompnent->niveau_id ;
      $this->matiere_id = $this->coursCompnent->matiere_id ;
     
   }

   public function updatedFileSave(){
      $this->f = $this->fileSave->store('cours','public') ;
      $this->coursCompnent->update([
         'file' => $this->f ,
      ]);
        
   }

   public function updateCours(){
      $this->coursCompnent->update([
         'name' => $this->name ,
         'resume' => $this->resume ,
         'matiere_id' => $this->matiere_id ,
         'niveau_id' => $this->niveau_id ,
         'user_id' => auth()->user()->id,
      ]);

      toast('Mise à jours avec success','success');

      return redirect()->route('cours.index');
   }
    public function render()
    {
      $matieres = Matiere::all(); 
      $niveaux = Niveau::all(); 
      return view('livewire.cours.edit',compact(['matieres','niveaux']));
    }
}
