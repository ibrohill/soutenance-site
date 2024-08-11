<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Models\Bus;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/reservation', [HomeController::class, 'store'])->name('reservation.store');
Route::get('/reservation/{id}', [HomeController::class, 'show'])->name('reservation.show');

// Vous pouvez aussi définir les autres contrôleurs comme vous l'aviez mentionné
// Route::resource('about', AboutController::class);
// Route::resource('contact', ContactController::class);
// Route::resource('booking', BookingController::class);



Route::get('/add-bus', function () {
    Bus::create(['total_seats' => 56, 'available_seats' => 56]);
    return 'Bus ajouté';
});
