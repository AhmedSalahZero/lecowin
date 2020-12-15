<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'name' ,'note' ,'user_id' , 'due_date','status'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function completedTask():void
    {
        $this->update([
            'status'=>'completed'
        ]);
    }
    public function archivedTask()
    {
        $this->update([
            'status'=>'archived'
        ]);
    }

}
