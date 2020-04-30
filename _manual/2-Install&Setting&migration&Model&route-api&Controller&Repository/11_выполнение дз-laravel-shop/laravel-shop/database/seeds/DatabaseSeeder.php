<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
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

        //Products        
        Product::create(
            [
                'name' => 'Modern Chair',
                'price' => '180$',
                'image' => 'bg-img/1.jpg',
                'top9' => 1,
            ]
        ); 
        Product::create(
            [
                'name' => 'Minimalistic Plant Pot',
                'price' => '180$',
                'image' => 'bg-img/2.jpg',
                'top9' => 1,
            ]
        );  
        Product::create(
            [
                'name' => 'Modern Chair',
                'price' => '180$',
                'image' => 'bg-img/3.jpg',
                'top9' => 1,
            ]
        );   
        Product::create(
            [
                'name' => 'Night Stand',
                'price' => '180$',
                'image' => 'bg-img/4.jpg',
                'top9' => 1,
            ]
        ); 
        Product::create(
            [
                'name' => 'Plant Pot',
                'price' => '18$',
                'image' => 'bg-img/5.jpg',
                'top9' => 1,
            ]
        );  
        Product::create(
            [
                'name' => 'Small Table',
                'price' => '320$',
                'image' => 'bg-img/6.jpg',
                'top9' => 1,
            ]
        );          
        Product::create(
            [
                'name' => 'Metallic Chair',
                'price' => '318$',
                'image' => 'bg-img/7.jpg',
                'top9' => 1,
            ]
        ); 
        Product::create(
            [
                'name' => 'Modern Rocking Chair',
                'price' => '318$',
                'image' => 'bg-img/8.jpg',
                'top9' => 1,
            ]
        );  
        Product::create(
            [
                'name' => 'Home Deco',
                'price' => '318$',
                'image' => 'bg-img/9.jpg',
                'top9' => 1,
            ]
        );                                 
    }
}
