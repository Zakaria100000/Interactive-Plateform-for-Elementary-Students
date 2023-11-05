<?php

namespace App\Http\Livewire\Questions;

use Livewire\Component;

use App\Models\Question ; 

class Create extends Component
{

   public $tp ;
   public $name , $partie, $traveau_id;

   public function mount($tp){
      $this->tp = $tp ;
   }

   public function saveNewQuestion(){
      Question::create([

         'name' => $this->name ,
         'partie' => $this->partie ,
         'traveau_id' => $this->tp->id ,
      ]);

      $this->reset(['name','partie']) ;

      toast('Question ajouté avec success ','success');

      $this->emit('render') ;
   }

   public function render()
   {
      return view('livewire.questions.create');
   }
}
