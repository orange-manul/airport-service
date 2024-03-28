<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('city_en');
            $table->string('city_ru');
            $table->string('airportName_en')->nullable(); // Название аэропорта на английском
            $table->string('airportName_ru')->nullable();
            $table->string('area')->nullable();
            $table->string('country')->nullable();
            $table->string('timezone');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
