<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libros;

class Prestamos extends Model
{
    use HasFactory;
    protected $fillable=[
        'users_id',
        'copias_id'
    ];

    public  function libros()
    {
        return $this->belongsToMany(Libros::class());
    }
}
  