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

    public function unidad()
    {
    return $this->belongsTo(Unidad::class);
    }
}
