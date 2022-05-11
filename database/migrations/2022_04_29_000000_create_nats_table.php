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
        Schema::create('nats', function (Blueprint $table) {
            $table->string('country_code');
            $table->string('country_en');
            $table->string('country_ar');
            $table->string('nationality_en');
            $table->string('nationality_ar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nats');
    }
};
