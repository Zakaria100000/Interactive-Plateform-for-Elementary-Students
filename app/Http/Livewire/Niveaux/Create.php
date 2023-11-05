<?php

namespace App\Http\Livewire\Niveaux;

use Livewire\Component;

use App\Models\Niveau ;

class Create extends Component
{
   public  $name ;

   protected $rules = [
      'name' => 'required|string|max:255',
  ];

   public function saveNewNiveau(){

      $this->validate();

      Niveau::create([
         'name' => $this->name,
      ]);

      toast('Nouvelle année scolaire ajouté avec success','success');

      return redirect()->route('niveau.index');
   }

   public function render()
   {
      return view('livewire.niveaux.create');
   }
}
