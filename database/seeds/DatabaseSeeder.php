<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'admin',
        	'email' => 'vuthithuy@gmail.com',
        	'password' => Hash::make('thuyvu1997'),
        	'adress' => 'Nguyen Trai Ha Dong',
        	'phone'=>'01653351209',
            'grade'=> 'customer',
        	'status'=>'1',

        ]
    );
    }
}


// class ProductSeeder extends Seeder
// {
//     public function run()
//     {
//         DB:table('products')->insert(
//             ['name' => 'samsung','']
//         );
//     }
// }