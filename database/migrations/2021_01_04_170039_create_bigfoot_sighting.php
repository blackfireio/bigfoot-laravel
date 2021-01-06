<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBigfootSighting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('big_foot_sighting', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->index()->constrained('users');
            $table->string('title');
            $table->longText('description');
            $table->integer('confidence_index');
            $table->integer('score');
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);
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
        Schema::dropIfExists('big_foot_sighting');
    }
}
