<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tasks';
    protected $fillable = ['id_tasks', 'title', 'description', 'milestone', 'finished', 'finish_in', 'status'];
}
