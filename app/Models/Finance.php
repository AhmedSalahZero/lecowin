<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable = [
        'user_id',
        'network_id',
        'level_id' ,
        'amount',
        'reason'
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function networks()
    {
        return $this->hasMany(Network::class,'network_id','id');
    }
    public function level()
    {
        return $this->belongsTo(Level_finance::class,'level_id','id');
    }
}
