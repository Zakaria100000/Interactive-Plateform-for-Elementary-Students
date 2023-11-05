<?php

namespace App\Http\Livewire\Tps;

use Livewire\Component;

use App\Models\Traveau ;
use App\Models\Question ;

class Show extends Component
{
   public $tp ;

   public function mount($tp) {
      $this->tp = $tp ;
      
   }

    public function render()
    {
        $questions = Question::where('traveau_id',$this->tp->id)->get()->groupBy('partie') ;
        return view('livewire.tps.show', compact('questions'));
    }
}
