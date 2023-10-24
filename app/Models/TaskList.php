<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Task;


class TaskList extends Model
{
    use HasFactory;

    protected $guarded = [];       // everything is FILLABLE ! :)

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public function tasks(){
        return $this->hasMany(Task::class);
    }



}
