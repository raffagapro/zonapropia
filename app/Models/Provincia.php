<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function comunas()
    {
        return $this->hasMany(Comuna::class);
    }
    public function proyects()
    {
        return $this->hasMany(Proyecto::class);
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
