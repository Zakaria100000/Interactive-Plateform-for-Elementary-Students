<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\AnneeController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\TPController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MessageController;

Route::get('lang/{locale}', LocalizationController::class)->name('lang');


Route::get('/', [FrontController::class,'index'])->name('welcome');
Route::get('/matiere',[FrontController::class,'matiere'])->name('matiere');
Route::get('/traveaux_pratiques',[FrontController::class,'traveaux_matiere'])->name('traveaux_pratqiues');
Route::get('/matiere/{matiere}/annee',[FrontController::class,'annee'])->name('annee');
Route::get('/traveau_pratique/matiere/{matiere}/annee',[FrontController::class,'traveau_annee'])->name('tp.annee');
Route::get('/matiere/{matiere}/annee/{niveau}/cours',[FrontController::class,'cours'])->name('cours');
Route::get('/traveaux_pratique/matiere/{matiere}/annee/{niveau}/tp',[FrontController::class,'traveau_tp'])->name('traveau.tp');
Route::get('/about',[FrontController::class,'about'])->name('about');
Route::get('/contact',[FrontController::class,'contact'])->name('contact');

Route::post('/recherche' , [FrontController::class,'recherche'])->name('recherche') ;
Route::post('/message' , [MessageController::class,'send'])->name('sendMessage') ;

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('users', UserController::class);
    Route::post('users/permission',[UserController::class,'assignPermission'])->name('users.assignPermission');
    Route::get('users/permission/remove/{user}/{permission}',[UserController::class,'unsignPermission'])->name('users.unsignPermission');
    Route::post('users/suspend',[UserController::class,'suspend'])->name('users.suspend');
    Route::resource('permissions', PermissionsController::class);

    //-------------------------------------------------------------------------
    
    Route::resource('matieres', MatiereController::class);
    Route::resource('annee', AnneeController::class);
    Route::resource('niveau', NiveauController::class);
    Route::resource('tp', TPController::class);
    Route::post('tp/{tp}/validateTp',[TPController::class,'validateTp'])->name('tp.validateTp') ;
    Route::get('tp/{tp}/addQuestion', [QuestionController::class,'addQuestion'])->name('question.addQuestion');
    Route::get('tp/{tp}/download',[TPController::class,'download'])->name('tp.download');
    
    Route::resource('question', QuestionController::class);
    
    Route::resource('cours', CoursController::class);
    Route::resource('/messages', MessageController::class);
    Route::get('/messages/{message}', [MessageController::class,'open'])->name('messages.open');
    Route::post('cours/{cour}/validation',[CoursController::class,'validateCours'])->name('cours.validateCours') ;
    Route::get('/cours/{cour}/download',[CoursController::class,'downloadCours'])->name('downloadCours');
    Route::get('/traveaux_pratique/{tp}',[FrontController::class,'simulation'])->name('tp.simulation');

});

require __DIR__.'/auth.php';
