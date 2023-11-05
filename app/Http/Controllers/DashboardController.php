<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traveau ; 
use App\Models\Cours;
use App\Models\Matiere;
use App\Models\Niveau; 
use App\Models\Annee; 
use App\Models\Message; 
use App\Models\User; 
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index(){

      $tpCount = Traveau::count() ;
      $tpNonValide = Traveau::where('validated',false)->count() ;
      $coursCount = Cours::count() ;
      $coursNonValide = Cours::where('validated',false)->count() ;
      $MatiereCount = Matiere::count() ;
      $AnneeCount = Niveau::count() ;
      $messageCount = Message::count() ;
      $messageNonLu = Message::where('read',false)->count() ;
      $enseignant = User::role('Enseignant')->count();
      $eleves = User::role('Eleve')->count();
      $data = [
         'tpCount' => $tpCount ,
         'tpNonValide' => $tpNonValide ,
         'coursCount' => $coursCount ,
         'coursNonValide' => $coursNonValide ,
         'MatiereCount' => $MatiereCount ,
         'AnneeCount' => $AnneeCount ,
         'messageCount' => $messageCount ,
         'messageNonLu' => $messageNonLu ,
         'enseignant' => $enseignant ,
         'eleves' => $eleves ,
      ] ;

      $tpProfCount = Traveau::where('user_id', auth()->user()->id )->count() ;
      $tpProfNonValide = Traveau::where('user_id', auth()->user()->id )->where('validated',false)->count() ;
      $coursProfCount = Cours::where('user_id', auth()->user()->id )->count() ;
      $coursProfNonValide = Cours::where('user_id', auth()->user()->id )->where('validated',false)->count() ;
      
      $dataProf = [
         'tpProfCount' => $tpProfCount ,
         'tpProfNonValide' => $tpProfNonValide ,
         'coursProfCount' => $coursProfCount ,
         'coursProfNonValide' => $coursProfNonValide ,
      ] ;

      switch (auth()->user()->getRoleNames()[0]) {
               case 'Super Admin':
                  return view('admin.dashboard.index' , compact('data') );
                  break;
               case 'Enseignant':
                  return view('admin.dashboard.index' , compact('dataProf'));
                  break;
               case 'Eleve':
                  return redirect(url('/'));
                  break;
               default:
                  return view('welcome' );
                  break;
            }
       
    }
}
