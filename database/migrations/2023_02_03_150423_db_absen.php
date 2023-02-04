<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa',function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string('name');
            $table->string('kelas');
            $table->integer('sakit')->default(0);
            $table->integer('ijin')->default(0);
            $table->integer('absen');
            $table->integer('alpha')->default(9);
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('db_absen');
    }
};
