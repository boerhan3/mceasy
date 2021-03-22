<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function(Blueprint $table){
            $table->increments('id_karyawan');             
            $table->string('no_induk', 100);               
            $table->string('nama', 100);       
            $table->text('alamat');         
            $table->date('tgl_lahir')->nullable();   
            $table->date('tgl_gabung')->nullable();  
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
        Schema::drop('karyawan');
    }
}
