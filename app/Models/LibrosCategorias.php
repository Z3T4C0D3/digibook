<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libros;

class LibrosCategorias extends Model
{
    use HasFactory;
    protected $fillable=['libros_id','categorias_id',];
}
