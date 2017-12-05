<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('first_name',30)->nullable();
            $table->string('last_name',15)->nullable();
            $table->string('phone_no',15)->nullable();           
            $table->string('email')->unique();
            $table->string('address',30)->nullable();
            $table->string('suburb',20)->nullable();
            $table->string('description',20)->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
