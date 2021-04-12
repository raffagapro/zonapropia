<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'piso',
        'status',
    ];
    public function proyecto()
    {
      return $this->belongsTo(Proyecto::class);
    }
    public function unidad()
    {
      return $this->belongsTo(Unidad::class);
    }
}
