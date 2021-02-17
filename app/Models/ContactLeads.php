<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactLeads extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'last_name',
        'mail',
        'phone',
        'priceRange',
        'message',
        'status',
    ];
    public function categoria()
    {
      return $this->belongsTo(Categoria::class);
    }
    public function proyecto()
    {
      return $this->belongsTo(Proyecto::class);
    }
}
