<?php

//use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Messagesarchives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagesarchives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();            
            $table->string('title');            
            $table->string('message', 500);  
            $table->date('datevisit');                       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('messagesarchives');        
    }
}
