<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'name', 'total_seats', 'available_seats', 'depart_city_id', 'arrivee_city_id'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
}

