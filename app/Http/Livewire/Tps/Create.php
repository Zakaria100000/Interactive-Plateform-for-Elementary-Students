<?php

namespace App\Http\Livewire\Tps;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Traveau ;
use App\Models\Matiere ;
use App\Models\Niveau ;
use App\Models\Cours ;

class Create extends Component
{
   use WithFileUploads, AuthorizesRequests;

   public  $name,$body ,$numero_partie ,$user_id ,$matier ,$niveau_id ,$image ,$image_show = null, $simulation ;
   public $cours ,$cour_id ;

  public function mount(){
     
  }

  public function updatedMatier(){
     $this->cours = Cours::where('niveau_id',$this->niveau_id)->where('matiere_id',$this->matier)->get();
  }

  public function updatedImage(){
      
   $this->validate([
      'image' => 'image|max:2048', // 2MB Max
   ]);

   $this->image_show = $this->image->store('tp','public');

   }

   public function saveNewTP(){


      // $this->validate();

      $tp = Traveau::create([
         'name' => $this->name,
         'body' => $this->body,
         'image' => $this->image_show ,
         'numero_partie' => $this->numero_partie,
         'user_id' => auth()->user()->id,
         'matiere_id' => $this->matier,
         'niveau_id' => $this->niveau_id,
         'cour_id' => $this->cour_id,
         'simulation' => $this->simulation ,
      ]);

      return redirect()->route('question.addQuestion',compact('tp'));
   }

   public function render()
   {
      $matieres = Matiere::all();
      $niveaux = Niveau::all() ;
      return view('livewire.tps.create', compact(['matieres','niveaux']));
   }
}
