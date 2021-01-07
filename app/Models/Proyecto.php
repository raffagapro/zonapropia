<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'direccion',
        'comuna',
        'ciudad',
        'region',
        'descripcion',
        'latitud',
        'longitud',
        'destacado',
        'texto_destacado',
        'activo',
        'bono_pie',
        'bono_pie_monto',
        'cuota_pie',
        'cuota_monto',
        'cuota_pie_fecha_limite',
        'ver_bono_pie',
        'ver_cuota_mensual',
        'ver_dividendo',
        'ver_precio',
        'ver_metrajes',
        'terminos',
        'texto_proyecto',
        'estado_id',
        'inmobiliaria_id',
        'categoria_id',
        'taggable_id',
    ];

    // public function estado()
    // {
    //   return $this->hasOne(Estado::class);
    // }
    public function categoria()
    {
      return $this->belongsTo(Categoria::class);
    }
    public function tags()
    {
      return $this->belongsToMany(Taggable::class);
    }
    public function inmobiliaria()
    {
      return $this->belongsTo(Inmobiliaria::class);
    }
    public function region()
    {
      return $this->belongsTo(Region::class);
    }
}
