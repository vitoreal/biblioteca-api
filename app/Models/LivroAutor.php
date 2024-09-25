<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAutor extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'livro_autor';

    protected $fillable = [
        'autor_id',
        'livro_id',
    ];
}
