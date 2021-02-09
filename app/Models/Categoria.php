<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'icono',
    ];
    public function proyects()
    {
        return $this->hasMany(Proyecto::class);
    }
    public function contactLeads()
    {
        return $this->hasMany(ContactLeads::class);
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
