<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starships', function (Blueprint $table) {
            $table->increments('starship_id');
            $table->string('name', 255);
            $table->string('model', 255);
            $table->string('manufacturer', 255);
            $table->integer('cost_in_credits');
            $table->integer('length');
            $table->string('max_atmosphering_speed', 255);
            $table->string('crew', 255);
            $table->integer('passengers');
            $table->integer('cargo_capacity');
            $table->string('consumables', 255);
            $table->string('hyperdrive_rating', 255);
            $table->string('MGLT', 255);
            $table->string('starship_class', 255);
            $table->integer('total_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('starships');
    }
}
