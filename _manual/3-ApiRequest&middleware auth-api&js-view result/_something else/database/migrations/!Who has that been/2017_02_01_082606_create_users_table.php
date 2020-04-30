<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	public function boot()
	{
	    Schema::defaultStringLength(191);
	}

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->rememberToken();
			$table->enum('role', array('user', 'admin'))->default('user');
			$table->string('api_token')->unique();			
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
