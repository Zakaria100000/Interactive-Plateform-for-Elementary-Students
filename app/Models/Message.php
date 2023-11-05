<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function traveaux(){
      return $this->hasMany(Traveau::class) ;
   }
    public function cours(){
      return $this->hasMany(Cours::class) ;
   }

    public static function search($search){
        if(empty($search)) { return static::query(); }
        else { return static::query()->where('name', 'like','%'.$search.'%'); }
     }
  
     public static function filter($columnName,$columnValue){
         return static::query()->where($columnName, 'like','%'.$columnValue.'%'); 
     }
}
