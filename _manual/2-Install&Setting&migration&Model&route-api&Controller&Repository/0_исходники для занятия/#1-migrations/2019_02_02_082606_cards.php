<?php

//use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned()->index();
            $table->string('name');            
            $table->string('title', 500);            
        }); 

        /*
        DB::table('cards')->insert(
           array(
             ['type_id' => 1, 'name' => 'Debit-UAH', 'title' => 'The Banana Republic Visa® Debit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.'],    
             ['type_id' => 1, 'name' => 'Debit-USD', 'title' => 'The Banana Republic Visa® Debit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.'],                   
             ['type_id' => 1, 'name' => 'Debit-EUR', 'title' => 'The Banana Republic Visa® Debit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.'],    
             ['type_id' => 2, 'name' => 'Deposit-UAH', 'title' => 'The Banana Republic Visa® Deposit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.'],
             ['type_id' => 2, 'name' => 'Deposit-USD', 'title' => 'The Banana Republic Visa® Deposit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.'],
             ['type_id' => 2, 'name' => 'Deposit-EUR', 'title' => 'The Banana Republic Visa® Deposit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.'],             
             ['type_id' => 3, 'name' => 'Credit-UAH', 'title' => 'The Banana Republic Visa® Credit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.'],      
             ['type_id' => 3, 'name' => 'Credit-USD', 'title' => 'The Banana Republic Visa® Credit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.'],    
             ['type_id' => 3, 'name' => 'Credit-EUR', 'title' => 'The Banana Republic Visa® Credit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.'],
           )               
        );
        */ 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('cards');        
    }
}
