<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'icono',
        'descripcion',
    ];
    public function proyects()
    {
      return $this->belongsToMany(Proyecto::class);
    }
    public function media_cara()
    {
      return $this->hasMany(Media_Cara::class);
    }
    public function getNameAttribute($name)
    {
      return ucwords($name);
    }
    public function setNameAttribute($name)
    {
      $this->attributes['name'] = mb_strtolower($name);
    }
}
