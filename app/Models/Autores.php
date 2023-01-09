<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libros;

class Autores extends Model
{ 
    use HasFactory;
    protected $fillable = [
        'nombre',
    ];
    public function libros(){
        return $this->belongsToMany(libros::class);
    }
}
