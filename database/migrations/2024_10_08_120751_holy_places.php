<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holy_places', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('discription');
            $table->text('image')->default(null);
            $table->text('latitude');
            $table->string('longitude');
            $table->string('location');
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
        Schema::dropIfExists('holy_places');
    }
};
