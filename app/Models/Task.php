<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TaskList;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];       // everything is FILLABLE ! :)

    public function task_list(){
        return $this->belongsTo(TaskList::class);
    }



}
