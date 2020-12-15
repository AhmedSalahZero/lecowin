<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable =[
        'name' , 'description' ,'created_by' , 'image' , 'pdf'
    ];
    protected $casts = [
      'name'=>'array' ,
      'description'=>'array'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class , 'created_by' , 'id');
    }
}
