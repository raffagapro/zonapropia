<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipologia extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'media',
      ];

    public function unidades()
    {
    return $this->belongsToMany(Unidad::class);
    }
}
