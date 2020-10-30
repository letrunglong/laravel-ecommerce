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
        $data = [
            [
                'name'=>'Lê Trung Long',
                'email'=>'letrunglong07@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=> 1
            ],
            [
                'name'=>'A đờ min',
                'email'=>'admin07@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=> 1
            ],
        ];
        DB::table('vp_users')->insert($data);
    }
}
