<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Prestataire extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'situation_geographique', 'numero_mobile', 'secteur_activite', 'email', 'password', 'latitude', 'longitude', 'plage_horaire', 'ville',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'user_id');
    }
}
