<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('subscription_id');
            $table->integer('rate_plan_id');
            $table->integer('user_id');
            $table->dateTime('activated_at')->nullable();
            $table->dateTime('billing_date')->nullable();
            $table->dateTime('suspended_date')->nullable();
            $table->dateTime('resuming_date')->nullable();
            $table->dateTime('temp_date')->nullable();           
            $table->string('current_balance')->nullable();
            $table->integer('payment_id')->nullable();
            $table->integer('time_unit_id')->nullable();           
            $table->string('status',30)->nullable();                         
            $table->text('description')->nullable();
            $table->timestamps();                
            $table->string('register_id',15)->nullable();             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
