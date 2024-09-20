<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Specify which attributes can be mass-assigned.
    protected $fillable = ['user_id', 'service_id', 'reservation_date', 'additional_notes'];

    // Define the relationship between a reservation and a service.
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Define the relationship between a reservation and a user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Example of an accessor to get full reservation details
    public function getDetailsAttribute()
    {
        return "{$this->user->name} reserved {$this->service->name} on {$this->reservation_date}";
    }
}
