<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destacado extends Model
{
    use HasFactory;
    protected $fillable = [
        'orden',
    ];
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
