<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->integer('ChainID')->nullable();
            $table->string('ChainName')->nullable();
            $table->string('CountryCode')->nullable();
            $table->string('CountryFileName')->nullable();
            $table->string('CountryName')->nullable();
            $table->string('CurrencyCode')->nullable();
            $table->text('Facilities')->nullable();
            $table->string('HotelAddress')->nullable();
            $table->string('HotelFileName')->nullable();
            $table->integer('HotelID')->nullable();
            $table->string('HotelName')->nullable();
            $table->string('HotelPostcode')->nullable();
            $table->unsignedBigInteger('ImageID')->nullable();
            $table->text('Images')->nullable();
            $table->decimal('Latitude', 15,6)->nullable();
            $table->decimal('Longitude', 15,6)->nullable();
            $table->decimal('MinRate', 15,4)->nullable();
            $table->string('PlaceFileName')->nullable();
            $table->integer('PlaceID')->nullable();
            $table->string('PlaceName')->nullable();
            $table->string('PlaceType')->nullable();
            $table->integer('Popularity')->nullable();
            $table->string('PropertyType')->nullable();
            $table->integer('PropertyTypeID')->nullable();
            $table->integer('StarRating')->nullable();
            $table->string('StateName')->nullable();
            $table->string('StatePlacefilename')->nullable();
            $table->integer('StatePlaceID')->nullable();
            $table->text('Themes')->nullable();
            $table->string('Trademarked')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
