<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'status',
    ];
    public function proyecto()
    {
      return $this->belongsTo(Proyecto::class);
    }
    public function tipografia()
    {
      return $this->belongsTo(Tipografia::class);
    }
}
