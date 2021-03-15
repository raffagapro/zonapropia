<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $fillable = [
      'modelo',
      'code',
      'orientacion',
      'piso',
      'dormitorios',
      'banos',
      'lote',
      'superficie_municipal',
      'superficie_total',
      'superficie_inferior',
      'superficie_terrazas',
      'superficie_loggia',
      'precio_lista',
      'precio_venta',
      'status',
      'vulnerable',
      'uf_m2',
      'tipologia',
    ];
    public function proyecto()
    {
      return $this->belongsTo(Proyecto::class);
    }
    public function tipologias()
    {
      return $this->belongsToMany(Tipologia::class);
    }
}
