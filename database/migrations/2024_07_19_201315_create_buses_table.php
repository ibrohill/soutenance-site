<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('buses', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('total_seats')->default(56);
        $table->integer('available_seats')->default(56);
        $table->unsignedBigInteger('depart_city_id')->nullable();
        $table->unsignedBigInteger('arrivee_city_id')->nullable();
        $table->timestamps(); // Ceci ajoute 'created_at' et 'updated_at'
        $table->foreign('depart_city_id')->references('id')->on('cities')->onDelete('set null');
        $table->foreign('arrivee_city_id')->references('id')->on('cities')->onDelete('set null');
    });

    DB::table('buses')->insert([
        'name' => 'Bus Default',
        'total_seats' => 56,
        'available_seats' => 56,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
