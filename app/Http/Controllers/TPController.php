<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use PDF;

use App\Models\Traveau;
use App\Models\Question;

class TPController extends Controller
{
   public function index()
   {
      $this->authorize('tp.list');
       return view('admin.tp.index');
   }

   public function create()
   {
      $this->authorize('tp.create');
       return view('admin.tp.create');
   }

   public function edit(Traveau $tp)
   {
      $this->authorize('tp.edit');
        return view('admin.tp.create')->with('tp',$tp);
   }

   public function show(Traveau $tp)
   {
        return view('admin.tp.show')->with('tp',$tp);
   }
   
   public function destroy(Traveau $tp)
   {
       $tp->delete() ;
       toast('TP supprime avec success','success') ;
       return redirect()->back();
   }

    public function validateTp(Traveau $tp)
    {
        $tp->update(['validated'=>true]) ;
        toast('TP validé avec success','success') ;
        return redirect()->back();
    }

    public function download($id){
      set_time_limit(300);
      $tp = Traveau::where('id',$id)->with(['matiere','niveau'])->first();
      $questions = Question::where('traveau_id',$tp->id)->get()->groupBy('partie') ;
      
      $pdf = PDF::loadView('pdf', compact(['tp','questions']));
      // $pdf = PDF::loadView('pdf');
      return $pdf->download('tp.pdf');
    }
}
