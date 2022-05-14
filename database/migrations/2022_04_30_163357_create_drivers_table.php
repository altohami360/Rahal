<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('personal_ID')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('password')->default(Hash::make('password'));
            $table->date('birthday');
            $table->double('current_balance', 8, 2)->default(9.99);
            $table->string('image');
            $table->string('identification_card_image');
            $table->foreignId('gender_id')->constrained()->onDelete('cascade');
            $table->foreignId('nationality_id')->constrained()->onDelete('cascade');
            $table->foreignId('car_id')->constrained()->onDelete('cascade');
            // $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('drivers');
    }
};
