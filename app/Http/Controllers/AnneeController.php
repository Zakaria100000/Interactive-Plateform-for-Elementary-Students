<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Http\Requests\StoreMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;

class AnneeController extends Controller
{
    public function index()
    {
      $this->authorize('annee.index');

        return view('admin.annee.index');
    }

    public function create()
    {
      $this->authorize('annee.create');
        return view('admin.annee.create');
    }

   
    public function edit(Annee $annee)
    {
      $this->authorize('annee.edit');
         return view('admin.annee.create')->with('annee',$annee);
    }

   
    public function destroy(Annee $annee)
    {
        $annee->delete() ;
        toast('Année scolaire supprime avec success','success') ;
        return redirect()->back();
    }
}
