<?php

namespace App\Http\Livewire\Niveaux;

use Livewire\Component;

class Edit extends Component
{
   public $niveauCompnent,$name ;

   public function mount($niveau) {
      $this->niveauCompnent = $niveau ;
      $this->name = $this->niveauCompnent->name ;
   }

   public function updateNiveau(){
      $this->niveauCompnent->update([
         'name' => $this->name ,
      ]);

      toast('Niveau scolaire mettre à jours avec success','success');

      return redirect()->route('niveau.index');
   }
    public function render()
    {
        return view('livewire.niveaux.edit');
    }
}
