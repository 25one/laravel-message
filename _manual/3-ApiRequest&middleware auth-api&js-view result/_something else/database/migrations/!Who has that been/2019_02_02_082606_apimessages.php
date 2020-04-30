<?php

//use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Apimessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimessages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();        
            $table->string('title');
            $table->string('message');
            $table->date('datevisit')->nullable();            
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('apimessages');        
    }
}
