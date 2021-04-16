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
        'minRooms',
        'maxRooms',
        'minBathrooms',
        'maxBathrooms',
        'minMC',
        'maxMC',
        'seguridad',
        'etapa_venta',
        'fecha_entrega',
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
    public function users()
    {
      return $this->belongsToMany(User::class);
    }
    public function caracteristicas()
    {
      return $this->belongsToMany(Caracteristica::class);
    }
    public function inmobiliaria()
    {
      return $this->belongsTo(Inmobiliaria::class);
    }
    public function region()
    {
      return $this->belongsTo(Region::class);
    }
    public function provincia()
    {
      return $this->belongsTo(Provincia::class);
    }
    public function comuna()
    {
      return $this->belongsTo(Comuna::class);
    }
    public function proyects()
    {
        return $this->hasMany(Proyecto::class);
    }
    public function media()
    {
      return $this->hasMany(Media::class);
    }
    public function proyectHasMedia($media_name)
    {
      foreach ($this->media as $mediaa) {
        if ($media_name === $mediaa->name) {
          return true;
        }
      }
      return false;
    }
    public function media_cara()
    {
      return $this->hasMany(Media_Cara::class);
    }
    public function getMediaCara($car_id)
    {
      $mc = Media_Cara::where('proyecto_id', $this->id)->where('caracteristica_id', $car_id)->get();
      return $mc;
    }
    public function getAllMediaCara()
    {
      $mc = Media_Cara::where('proyecto_id', $this->id)->get();
      return $mc;
    }
    public function destacado()
    {
        return $this->hasOne(Destacado::class);
    }
    public function unidades()
    {
        return $this->hasMany(Unidad::class);
    }
    public function contactLeads()
    {
        return $this->hasMany(ContactLeads::class);
    }
    public function getUF()
    {
      $unidades = $this->unidades;
      $unidades = $unidades->sortBy('precio_venta');
      if (count($unidades) > 0) {
        $unidades = $unidades->first();
        return "UF ".$unidades->precio_venta;
      }else {
        return false;
      }
    }
    public function getPrecioPromedio()
    {
      $unidades = $this->unidades;
      if (count($unidades) > 0) {
        $total = 0;
        foreach ($unidades as $unidad) {
          $total += $unidad->precio_venta;
        }
        $total = $total / count($unidades);
        return $total ;
      }else {
        return false;
      }
    }

    public function getUF_M2()
    {
      $unidades = $this->unidades;
      if (count($unidades) > 0) {
        $total = 0;
        foreach ($unidades as $unidad) {
          $total += $unidad->uf_m2;
        }
        $total = $total / count($unidades);
        return $total ;
      }else {
        return false;
      }
    }

    public function getTipologias(){
      $models = [];
      foreach ($this->unidades as $unidad) {
        foreach ($unidad->tipologias as $tipo) {
          if ($tipo->media !== null) {
            array_push($models, $tipo);
          }
        }
      }
      return $models;
    }

    public function getPisos(){
      $pisos = [];
      $go = true;
      foreach ($this->unidades as $unidad) {
        foreach ($pisos as $p) {
          if ($unidad->piso === $p) {
            $go = false;
          }
        }
        if ($go) {
          array_push($pisos, $unidad->piso);
          $go = true;
        }
      }
      return $pisos;
    }

    public function getTipologias2(){
      $tipos = [];
      foreach ($this->unidades as $unidad) {
        $construtedTipo = '';
        if ($unidad->dormitorios === 1) {
          $construtedTipo = $unidad->dormitorios.' Dorm ';
        }else{
          $construtedTipo = $unidad->dormitorios.' Dorms ';
        }
        if ($unidad->banos === 1) {
          $construtedTipo .= $unidad->banos.' Baño';
        } else {
          $construtedTipo .= $unidad->banos.' Baños';
        }
        $goT = true;
        foreach ($tipos as $t) {
          if ($t === $construtedTipo) {
            $goT = false;
            break;
          }
        }
        if ($goT) {
          array_push($tipos, [$construtedTipo, [$unidad->dormitorios, $unidad->banos]]);
        }
      }
      return $tipos;
    }
    public function estacionamientos()
    {
        return $this->hasMany(Estacionamiento::class);
    }
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }

}
