<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'depart',
        'arrivee',
        'dates',
        'personnes',
        'seat_number', 
        'remaining_seats',
        'bus_id',

    ];

    public function departCity()
    {
        return $this->belongsTo(City::class, 'depart');
    }

    public function arriveeCity()
    {
        return $this->belongsTo(City::class, 'arrivee');
    }

    public function getSeatNumbersAttribute()
    {
        return explode(',', $this->seat_number);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}



