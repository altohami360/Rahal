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
        Schema::create('daily_trips', function (Blueprint $table) {
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
            $table->double('total_cost');
            $table->double('round_trip');
            $table->time('time_go');
            $table->time('time_back')->nullable();
            $table->json('week_days');

            $table->foreignId('driver_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('daily_trips');
    }
};
