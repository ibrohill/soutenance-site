@extends('layouts.app')

@section('content')

<div class="hero hero-inner">

      <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="details-card p-4">
                    <h4 class="text-center mb-4">Détails de la Réservation</h4>
                    <div class="detail-item">
                        <span class="detail-label">Départ:</span>
                        <span class="detail-value">{{ $reservation->departCity->name }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Arrivée:</span>
                        <span class="detail-value">{{ $reservation->arriveeCity->name }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Dates de Voyage:</span>
                        <span class="detail-value">{{ $reservation->dates }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Nombre de Personnes:</span>
                        <span class="detail-value">{{ $reservation->personnes }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Numéros de Place:</span>
                        <span class="detail-value">
                            @foreach($reservation->seatNumbers as $seatNumber)
                                {{ $seatNumber }}@if (!$loop->last), @endif
                            @endforeach
                        </span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Nom du Bus:</span>
                        <span class="detail-value">{{ $bus->name }}</span>
                    </div>
                    @isset($bus)
                    <div class="detail-item">
                        <span class="detail-label">Places restantes:</span>
                        <span class="detail-value">{{ $bus->available_seats }}</span>
                    </div>
                    @endisset
                    <div class="text-center mt-4">
                        <a href="{{ route('home.index') }}" class="btn btn-primary">Retour à l'accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- </div>
  </div> --}}
@endsection
