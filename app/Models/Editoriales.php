<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libros;

class Editoriales extends Model
{
    use HasFactory;
    protected $fillable=['descripcion'];
    public function libros(){
        return $this->hasMany(Libros::class);
    }
}
