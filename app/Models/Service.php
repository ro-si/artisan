<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'image', 'user_id',
    ];

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class, 'user_id');
    }
}
