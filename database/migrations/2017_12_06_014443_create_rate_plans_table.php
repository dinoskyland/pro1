<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_plans', function (Blueprint $table) {
            $table->increments('rate_plan_id');
            $table->string('rate_plan_name');
            $table->string('type');
            $table->integer('selected_id');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->string('register_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_plans');
    }
}
