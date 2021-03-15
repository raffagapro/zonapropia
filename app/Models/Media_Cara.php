<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media_Cara extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'loc',
    ];
    public function proyect()
    {
        return $this->belongsTo(Proyecto::class);
    }
    public function caracteristica()
    {
        return $this->belongsTo(Caracteristica::class);
    }
}
