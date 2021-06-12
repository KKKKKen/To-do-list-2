<?php

use Illuminate\Database\Seeder;
use Monolog\Processor\UidProcessor;
// use Illuminate\Support\Facades\DB;


use Carbon\Carbon;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // データ入れるために必要↓$user->idとするため
        $user = DB::table('users')->first();
        $titles = ['プログラミング', '英語', '国語', '読書', '教養'];

        foreach($titles as $title){
            DB::table('folders')->insert([
                'title' => $title,
                'user_id' =>$user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
