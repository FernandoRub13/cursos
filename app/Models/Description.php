<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Descriptor\Descriptor;

class Description extends Model
{
    protected $guarded =['id'];
    use HasFactory;
    //Relacion uno a uno inversa
    public  function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
