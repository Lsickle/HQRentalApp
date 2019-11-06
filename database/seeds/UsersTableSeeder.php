<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Emili Natera',
            'email' => 'recruitment@hqrentalsoftware.com',
            'password' => bcrypt('1234'),
        ]);

        DB::table('users')->insert([
            'name' => 'Luis De la hoz',
            'email' => 'luisdelahoz0@gmail.com',
            'password' => bcrypt('1234'),
        ]);
    }
}
