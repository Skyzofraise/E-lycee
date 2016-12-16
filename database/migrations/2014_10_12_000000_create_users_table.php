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
            $table->increments('id'); // PK
            $table->string('email')->unique();
            $table->string('username', 100)->unique(); // VARCHAR 100
            $table->string('password', 100); // VARCHAR 100
            $table->enum('role',['teacher','first_class','final_class']);
            $table->rememberToken();
            $table->timestamps(); // Eloquent
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
