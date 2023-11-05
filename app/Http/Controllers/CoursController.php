<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Http\Requests\StoreCoursRequest;
use App\Http\Requests\UpdateCoursRequest;
use Storage ;
class CoursController extends Controller
{
    
   public function index()
   {
       return view('admin.cours.index');
   }

   public function create()
   {
      $this->authorize('cours.create');
       return view('admin.cours.create');
   }

   public function edit(Cours $cour)
   {
        $this->authorize('cours.edit');
        return view('admin.cours.create')->with('cours',$cour);
   }
   
   public function destroy(Cours $cour)
   {
       $cour->delete() ;
       toast('Le cours à été supprime avec success','success') ;
       return redirect()->back();
   }

   public function validateCours(Cours $cour)
   {
       $cour->update(['validated'=>true]) ;
       toast('Succés','success') ;
       return redirect()->back();
   }

   public function downloadCours(Cours $cour)
   {         
        $myFile = public_path('storage/' . $cour->file) ;
        $headers = ['Content-Type: application/pdf'];
        $newName = $cour->name . '.pdf';

        return response()->download($myFile, $newName, $headers);
   }
}
