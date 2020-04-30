<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Users
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'remember_token' => str_random(10),
            ]
        ); 
        User::create(
            [
                'name' => 'alex',
                'email' => 'alex@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'redac',               
                'remember_token' => str_random(10),
            ]
        ); 
        User::create(
            [
                'name' => 'serg',
                'email' => 'serg@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',                
                'remember_token' => str_random(10),
            ]
        ); 
        User::create(
            [
                'name' => 'helen',
                'email' => 'helen@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',                
                'remember_token' => str_random(10),
            ]
        ); 
    }
}
