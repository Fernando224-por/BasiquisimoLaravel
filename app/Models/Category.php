<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarea;

class Category extends Model
{
    use HasFactory;

    public function todos(){
        return  $this->hasMany(Tarea::class);
    }
}
