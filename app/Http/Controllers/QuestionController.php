<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

use App\Models\Traveau ;

class QuestionController extends Controller
{
    
    public function destroy(Question $question)
    {
        $question->delete() ;
        toast('Question supprimé avec success','success') ;
        return redirect()->back() ;
    }

    public function addQuestion(Traveau $tp){

      $this->authorize('question.create');

      return view('admin.question.create',compact('tp')) ;

    }
}
