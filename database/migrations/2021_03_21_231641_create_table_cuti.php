<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti', function(Blueprint $table){
            $table->increments('id_cuti');   
            $table->integer('id_karyawan')->unsigned();                
            $table->string('no_induk', 100);               
            $table->date('tgl_cuti')->nullable();       
            $table->integer('lama_cuti');         
            $table->text('keterangan');    
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
        Schema::drop('cuti');
    }
}
