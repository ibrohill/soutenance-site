@extends('layouts.app')

@section('title', 'Réservation')

@section('content')
    <div class="booking-form">
        <h2>Réservez votre voyage</h2>
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" name="destination" id="destination" required>
            </div>
            <div class="form-group">
                <label for="date_depart">Date de départ</label>
                <input type="date" name="date_depart" id="date_depart" required>
            </div>
            <button type="submit" class="btn">Réserver</button>
        </form>
    </div>
@endsection
