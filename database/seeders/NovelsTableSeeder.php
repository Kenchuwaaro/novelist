<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NovelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $novels = [
            [
                'title' => '天使の囀り',
                'user_id' => 2,
            ],
            [
                'title' => 'ノルウェイの森',
                'user_id' => 3,
            ],
            [
                'title' => '黒い家',
                'user_id' => 4,
            ]
        ];
        
        foreach($novels as $novel){
            \App\Models\Novel::create($novel);
        }
    }
}
