<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('posts', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id')->nullable();
          $table->string('title', 100);
          $table->text('abstract'); // résumé
          $table->text('content');
          $table->string('url_thumbnail', 100)->default('');
          $table->dateTime('date')->default(\Carbon\Carbon::now());
          $table->enum('status',['published','unpublished']);
          $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
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
       Schema::dropIfExists('posts');
   }
}