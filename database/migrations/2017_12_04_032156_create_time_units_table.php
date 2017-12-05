<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_units', function (Blueprint $table) {
            $table->increments('time_unit_id');
            $table->string('kind');
            $table->text('description')->nullable();
            $table->timestamps();                                    
            $table->string('register_id',15)->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_units');
    }
}
