<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libros;

class AutoresLibros extends Model
{
    use HasFactory;
    protected $fillable=[
        'libros_id',
        'autores_id'
    ];

    public function libros(){
        return $this->belongsToMany(Libros::class);
    }
}
