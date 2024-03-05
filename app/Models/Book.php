<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'author', 'created_by'];

    public function users(){
        return $this->belongsTO(User::class,'created_by','id');
    }

    

}


