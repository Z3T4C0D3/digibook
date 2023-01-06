<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libros;
class Categorias extends Model
{
    use HasFactory;
    protected $fillable=['descripcion',];
    public  function libros()
    {
        return $this->belongsToMany(Libros::class());
    }
}
