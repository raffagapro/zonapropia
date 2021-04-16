<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'rut',
        'phone',
        'status',
        'email',
        'name',
    ];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function proyecto()
    {
      return $this->belongsTo(Proyecto::class);
    }
    public function unidad()
    {
      return $this->belongsTo(Unidad::class);
    }
    public function estacionamiento()
    {
      return $this->belongsTo(Estacionamiento::class);
    }
}
