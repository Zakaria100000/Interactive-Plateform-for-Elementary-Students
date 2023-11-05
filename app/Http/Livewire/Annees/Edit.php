<?php

namespace App\Http\Livewire\Annees;

use Livewire\Component;

class Edit extends Component
{
   public $anneeCompnent,$name ;

   public function mount($annee) {
      $this->anneeCompnent = $annee ;
      $this->name = $this->anneeCompnent->name ;
   }

   public function updateAnnee(){
      $this->anneeCompnent->update([
         'name' => $this->name ,
      ]);

      toast('success','success');

      return redirect()->route('annee.index');
   }
    public function render()
    {
        return view('livewire.annees.edit');
    }
}
