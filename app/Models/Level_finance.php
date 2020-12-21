<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Level_finance extends Model
{
 //   use HasFactory;
   protected $fillable = [
       'level', 'assign_cost','forth_cost'
   ];
   public function users()
   {
       return $this->belongsToMany(User::class,'level_user','level','user_id','level','id');
   }
   public function finances()
   {
       return $this->hasMany(Finance::class , 'level_id','id');
   }
   public function networks()
   {
       return $this->hasMany(Network::class , 'level' , 'id');
   }
   public static function countAllNetWorkers():Collection
   {
       return Level_finance::all()->load('users')->keyBy('level')->map(function($level){
           return $level->users->count();
       });
   }


}
