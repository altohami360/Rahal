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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();

            $table->string('pickup_address');
            $table->string('pickup_latitude');
            $table->string('pickup_longitude');
            
            $table->string('dropoff_address');
            $table->string('dropoff_latitude');
            $table->string('dropoff_longitude');

            $table->longText('note');
            $table->double('distance');
            $table->double('cost');
            
            $table->foreignId('service_id')->constrained();
            $table->foreignId('driver_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('status_id')->constrained();
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
        Schema::dropIfExists('trips');
    }
};
