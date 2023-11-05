<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Matiere ;
use App\Models\Niveau ;
use App\Models\Traveau ;
use App\Models\User ;

class Cours extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function matiere(){
      return $this->belongsTo(Matiere::class) ;
   }

    public function traveaus(){
      return $this->hasMany(Matiere::class) ;
   }

    public function niveau(){
      return $this->belongsTo(Niveau::class) ;
   }

    public function user(){
      return $this->belongsTo(User::class) ;
   }

    public static function search($search){
        if(empty($search)) { return static::query(); }
        else { return static::query()->where('name', 'like','%'.$search.'%'); }
     }
  
     public static function filter($columnName,$columnValue){
         return static::query()->where($columnName, 'like','%'.$columnValue.'%'); 
     }
}
