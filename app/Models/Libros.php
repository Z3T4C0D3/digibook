<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Autores;
use App\Models\images;
use App\Models\Editoriales;
use App\Models\Prestamos;
use App\Models\Devoluciones;
use App\Models\Copias;

class Libros extends Model
{
    use HasFactory;
    protected $fillable=[
        'titulo',
        'codigo',
        'anio_publicacion',
        'descripcion',
        'editoriales_id',
    ];

    public function autores(){
        return $this->belongsToMany(Autores::class);
    }
    public function categorias(){
        return $this->belongsToMany(Categorias::class);
    }
    public function image(){
        return $this->morphOne(images::class,'imageable');
    }

    public function editoriales(){
        return $this->belongsTo(Editoriales::class);
    }

    public function prestamos(){
        return $this->belongsToMany(Prestamos::class);
    }

    public function devoluciones(){
        return $this->belongsToMany(Devoluciones::class);
    }
    public function copias(){
        return $this->belongsTo(Copias::class);
    }
}
