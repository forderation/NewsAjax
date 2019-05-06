<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePencipta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencipta', function (Blueprint $table) {
            $table->unsignedBigInteger('id_berita');
            $table->string('nama_pencipta');
            $table->timestamps();
            $table->foreign('id_berita')->references('id')->on('post')
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
        Schema::dropIfExists('pencipta');
    }
}
