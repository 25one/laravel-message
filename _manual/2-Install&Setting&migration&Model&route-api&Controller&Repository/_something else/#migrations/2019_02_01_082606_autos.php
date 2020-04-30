<?php

//use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Autos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->index();
            $table->string('name');            
            $table->string('image', 500);    
            $table->integer('active');                    
        }); 
        DB::table('autos')->insert(
           array(
             ['country_id' => 1, 'name' => 'Ford', 'image' => 'ford.jpg', 'active' => 1],    
             ['country_id' => 1, 'name' => 'Chevrolet', 'image' => 'chevrolet.jpg', 'active' => 1],   
             ['country_id' => 2, 'name' => 'VW', 'image' => 'vw.jpg', 'active' => 1],    
             ['country_id' => 2, 'name' => 'Opel', 'image' => 'opel.jpg', 'active' => 0],  
             ['country_id' => 3, 'name' => 'Renault', 'image' => 'renault.jpg', 'active' => 1],    
             ['country_id' => 3, 'name' => 'Peugeot', 'image' => 'peugeot.jpg', 'active' => 0],                             
           )               
        );
         

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('autos');        
    }
}
