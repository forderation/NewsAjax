<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->text('content');
            $table->enum('published',	['yes',	'no']);
            $table->timestamps();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->foreign('id_kategori')->references('id')->on('kategori')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
