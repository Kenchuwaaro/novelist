<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => '葉山祐介',
                'email' => 'hayama@gmail.com',
                'password' => '123456789'
            ],
            [
                'name' => '宇髄天元',
                'email' => 'uzui@gmail.com',
                'password' => 'qwert'
            ],
            [
                'name' => '富岡義勇',
                'email' => 'giyu@gmail.com',
                'password' => 'qwert'
            ]
        ];
        foreach ( $users as $user ){
            User::create( $user );
        }
    }
}
