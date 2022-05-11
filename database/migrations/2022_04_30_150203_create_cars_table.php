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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_type_id')->constrained('car_types');
            $table->string('model');
            $table->string('plate_number');
            $table->foreignId('color_id')->constrained();
            $table->string('car_image_front');
            $table->string('car_image_back');
            $table->string('car_image_left');
            $table->string('car_image_right');
            $table->string('car_insurance_image');
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
        Schema::dropIfExists('cars');
    }
};
