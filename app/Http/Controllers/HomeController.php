<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Reservation;
use App\Models\Bus;

class HomeController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('home', compact('cities'));
    }

    public function create()
    {
        $cities = City::all();
        return view('home', compact('cities'));
    }

    public function store(Request $request)
{
    $request->validate([
        'depart' => 'required|exists:cities,id',
        'arrivee' => 'required|exists:cities,id',
        'dates' => 'required|date',
        'personnes' => 'required|integer|min:1',
    ]);

    // Récupérer tous les bus disponibles triés par leurs ID
    $buses = Bus::orderBy('id')->get();
    $remainingPersons = $request->personnes;
    $reservations = [];

    foreach ($buses as $bus) {
        if ($remainingPersons <= 0) {
            break;
        }

        // Calculer le nombre de sièges disponibles et nécessaires pour ce bus
        $startSeatNumber = $bus->total_seats - $bus->available_seats + 1;
        $availableSeats = $bus->available_seats;
        $seatsToReserve = min($remainingPersons, $availableSeats);

        // Créer les réservations pour ce bus
        for ($seatNumber = $startSeatNumber; $seatNumber < $startSeatNumber + $seatsToReserve; $seatNumber++) {
            $reservations[] = Reservation::create([
                'depart' => $request->depart,
                'arrivee' => $request->arrivee,
                'dates' => $request->dates,
                'personnes' => 1, // Chaque réservation est pour une personne
                'seat_number' => $seatNumber,
                'bus_id' => $bus->id,
            ]);
        }

        // Mettre à jour les sièges disponibles dans ce bus
        $bus->available_seats -= $seatsToReserve;
        $bus->save();

        // Réduire le nombre de personnes restantes à réserver
        $remainingPersons -= $seatsToReserve;
    }

    if ($remainingPersons > 0) {
        return redirect()->back()->with('error', 'Pas assez de places disponibles dans tous les bus.');
    }

    // Rediriger vers la vue de détails de la réservation avec l'ID de la première réservation créée
    $firstReservation = $reservations[0];

    return redirect()->route('reservation.show', ['id' => $firstReservation->id])->with('success', 'Réservation effectuée avec succès!');
}


    public function show($id)
    {
        $reservation = Reservation::with('departCity', 'arriveeCity', 'bus')->findOrFail($id);
        $bus = Bus::findOrFail($reservation->bus_id); // Récupérer le bus associé à la réservation
        return view('reservation', compact('reservation', 'bus')); // Passer 'reservation' et 'bus' à la vue
    }
}
