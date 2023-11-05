<?php

namespace App\Http\Livewire\Annees;

use Livewire\Component;

use App\Models\Annee ;

class Create extends Component
{
   public  $name ;

   protected $rules = [
      'name' => 'required|string|max:255',
  ];

   public function saveNewAnnee(){

      $this->validate();

      $annee = Annee::create([
         'name' => $this->name,
      ]);

      toast('Nouvelle année scolaire ajouté avec success','success');

      return redirect()->route('annee.index');
   }

   public function render()
   {
      return view('livewire.annees.create');
   }
}
