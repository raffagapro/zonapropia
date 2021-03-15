<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function proyects()
    {
        return $this->hasMany(Proyecto::class);
    }

    public function provincias()
    {
        return $this->hasMany(Provincia::class);
    }

    public function getNameAttribute($name)
    {
      return ucwords($name);
    }
    public function setNameAttribute($name)
    {
      $this->attributes['name'] = mb_strtolower($name);
    }
    public function getComunas(){
      $comunas = [];
      foreach ($this->provincias as $provincia) {
        foreach ($provincia->comunas as $comuna) {
          array_push($comunas, $comuna);
        }
      }
      return $comunas;
    }
}
