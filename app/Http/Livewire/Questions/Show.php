<?php

namespace App\Http\Livewire\Questions;

use Livewire\Component;

use App\Models\Question ;

class Show extends Component
{
   public $tp, $question ;
   public $edit = false,$name, $c,$partie,$p ;

   protected $listeners = ['render'=>"render"];

   public function mount($tp) {
      $this->tp = $tp ;
   }

   public function editQUestion($q){
      $this->c = $q;
      $this->question = Question::find($q) ;
      $this->edit = true ;
      $this->name = $this->question->name ;
      $this->partie = $this->question->partie ;
      $this->p = $q ;
   }

   public function updateQuestion($id){
      
      Question::find($id)->update([
         'name' => $this->name ,
         'partie' => $this->partie ,
      ]) ;

      $this->edit = false ;

   }


    public function render()
    {
        $questions = Question::where('traveau_id',$this->tp->id)->get()->groupBy('partie') ;
        return view('livewire.questions.show',compact('questions'));
    }
}
