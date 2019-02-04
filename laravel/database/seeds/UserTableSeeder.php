<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
'name'=>'toumal',
'email'=>'toumal@gmail.com',
'password'=>bcrypt('123123')
        ]);
    }
}
