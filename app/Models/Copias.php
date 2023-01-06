<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libros;

class Copias extends Model
{
    use HasFactory;
    protected $fillable=[
        'libros_id','copia'
    ];
    public function libros(){
        return $this->hasMany(Libros::class);
    }
}
