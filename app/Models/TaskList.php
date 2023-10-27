<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Task;


class TaskList extends Model
{
    use HasFactory;

    protected $guarded = [];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    

    public function tasks(){
        return $this->hasMany(Task::class);
    }



}
