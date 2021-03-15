<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
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
