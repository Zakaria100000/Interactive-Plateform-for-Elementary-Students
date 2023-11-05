<?php

namespace App\Http\Livewire\Tps;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Matiere ;
use App\Models\Niveau ;

class Edit extends Component
{
   use WithFileUploads ;

   public $tpCompnent ;
   public $name , $body, $numero_partie ,$user_id ,$matiere_id ,$niveau_id, $simulation ;
   public $cours ,$cour_id ;
   public $image ,$image_show , $image_check;

   protected $listeners = ['render'=>'render'];

   public function mount($tp) {

      $this->tpCompnent = $tp ;
      $this->name = $this->tpCompnent->name ;
      $this->body = $this->tpCompnent->body ;
      $this->simulation = $this->tpCompnent->simulation ;
      $this->numero_partie =  $this->tpCompnent->numero_partie ;
      $this->matiere_id =  $this->tpCompnent->matiere_id ;
      $this->niveau_id =  $this->tpCompnent->niveau_id ;
      $this->image_check = !is_null($this->tpCompnent->image ) ? true : false ;
      $this->image_show = $this->tpCompnent->image ;
     
   }

   public function updatedImage(){
      
      $this->validate([
         'image' => 'image|max:2048', // 2MB Max
      ]);
   
      $this->image_show = $this->image->store('tp','public');
   
      $this->tpCompnent->update([
         'image' => $this->image_show ,
      ]);

      $this->emit('render') ;
   }

   public function updateTP(){
      $this->tpCompnent->update([
         'name' => $this->name,
         'body' => $this->body,
         'simulation' => $this->simulation,
         'numero_partie' => $this->numero_partie,
         'user_id' => auth()->user()->id,
         'matiere_id' => $this->matiere_id,
         'niveau_id' => $this->niveau_id,

      ]);
      return redirect()->route('tp.index');
   }
    public function render()
    {
      $matieres = Matiere::all();
      $niveaux = Niveau::all() ;
      return view('livewire.tps.edit', compact(['matieres','niveaux']));
    }
}
