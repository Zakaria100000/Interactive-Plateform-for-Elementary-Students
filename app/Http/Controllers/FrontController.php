<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere ;
use App\Models\Niveau ;
use App\Models\Annee ;
use App\Models\Traveau ;
use App\Models\Question ;
use App\Models\Cours ;

class FrontController extends Controller
{
    public function index(){
       $matieres = Matiere::all(); 
       $recentTP = Traveau::with(['matiere','niveau','cour','user'])->orderBy('created_at','DESC')->limit(3)->get();
       return view('welcome')->with('matieres',$matieres)->with('recentTP',$recentTP) ;
    }
    
    public function matiere(){
      $matieres = Matiere::all() ; 
      return view('front.matiere' , compact('matieres')) ;
    }

    public function annee(Matiere $matiere){
      $niveaux = Niveau::all() ; 
      return view('front.annee' , compact(['matiere','niveaux'])) ;
    }

    public function  cours(Matiere $matiere,Niveau $niveau){

      $cours = Cours::where('validated',true)->where('matiere_id',$matiere->id)->where('niveau_id',$niveau->id)->get() ;
      return view('front.cours',compact('cours')) ;
   }

    public function  traveaux_matiere(){

      $matieres = Matiere::where('id',1)->orWhere('id',2)->get() ; 
      
      return view('front.traveau_matiere' , compact('matieres')) ;
      
    }
    
    public function  traveau_annee(Matiere $matiere){
      $niveaux = Niveau::all() ; 
      return view('front.traveau_annee' , compact(['matiere','niveaux'])) ;
    }

    public function  traveau_tp(Matiere $matiere,Niveau $niveau){
      $tps = Traveau::where('validated',true)
                     ->where('matiere_id',$matiere->id)
                     ->where('niveau_id',$niveau->id)
                     ->with(['matiere','niveau','cour','user'])
                     ->get() ;
      return view('front.tp' , compact('tps')) ;
    }

    public function  simulation(Traveau $tp){
      
      $questions = Question::where('traveau_id',$tp->id)->get()->groupBy('partie') ;

      return view('front.showTp' , compact(['tp','questions'])) ;

    }

    public function  recherche(Request $request){

      $tps = $request->matiere_id == 'all' ? Traveau::where('name', 'like','%'.$request->recherche.'%')
                                                   ->orWhere('body', 'like','%'.$request->recherche.'%')->get()
                                           : Traveau::whereHas('matiere', function ($q) use ($request){
                                                         $q->where('id',$request->matiere_id) ;
                                                      })->Where('name', 'like','%'.$request->recherche.'%')
                                                      ->orWhere('body', 'like','%'.$request->recherche.'%')
                                                      ->with(['matiere','niveau','cour','user'])->get() ;
                             
      return view('front.tp' , compact('tps')) ;

    }
    
    public function  about(){
      return view('about');
    }
    
    public function contact() {
      return view('contact');

    }
}
