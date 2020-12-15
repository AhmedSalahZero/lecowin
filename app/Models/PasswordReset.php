<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable =[
        'token' , 'email' , 'created_at'
    ];
    public $timestamps =false ;

    protected $table ='password_resets';

    use HasFactory;
}
