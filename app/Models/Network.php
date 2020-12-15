<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    protected $fillable = [
        'user_id',
        'networker_id',
        'level'
    ];
    public function netWorker() // get current netWorker data from users table
    {
        return $this->belongsTo(User::class,'networker_id','id');
    }
    public function parent() // parent user for this networker
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function finance()
    {
        return $this->hasOne(Finance::class , 'network_id','id');
    }
}
