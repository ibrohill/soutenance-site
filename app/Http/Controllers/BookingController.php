<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking');
    }

    // public function store(Request $request)
    // {
    //     // Logique pour enregistrer la réservation
    //     // Exemple : Reservation::create($request->all());

    //     return redirect()->route('home')->with('success', 'Réservation effectuée avec succès !');
    // }
}
