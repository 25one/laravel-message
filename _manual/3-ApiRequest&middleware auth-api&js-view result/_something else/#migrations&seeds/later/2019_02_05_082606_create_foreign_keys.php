<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
 		Schema::table('cards', function(Blueprint $table) {
			$table->foreign('type_id')->references('id')->on('types')
						->onDelete('cascade')
						->onUpdate('cascade');
		});		
 		Schema::table('joineds', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
 		Schema::table('joineds', function(Blueprint $table) {
			$table->foreign('card_id')->references('id')->on('cards')
						->onDelete('cascade')
						->onUpdate('cascade');
		});		
	}

	public function down()
	{
		Schema::table('cards', function(Blueprint $table) {
			$table->dropForeign('types_type_id_foreign');
		});		
		Schema::table('joineds', function(Blueprint $table) {
			$table->dropForeign('users_user_id_foreign');
		});
		Schema::table('joineds', function(Blueprint $table) {
			$table->dropForeign('cards_card_id_foreign');
		});
	}
}
