<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wall_id')->unsigned();
            $table->foreign('wall_id')->references('id')->on('walls')->onDelete('cascade');
            $table->text('message')->nullable();
            $table->string('image')->nullable();
            $table->integer('like')->unsigned()->default(0);
            $table->dateTime('published');
            $table->enum('is_public', ['SI', 'NO'])->default('SI')->nullable();
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
        Schema::dropIfExists('publications');
    }
}
