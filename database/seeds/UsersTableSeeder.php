<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

// DB読み込まないとどうなるか実験
// use Illuminate\Support\Facades\DB;

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
        DB::table('users')->insert([
            'name'=> 'test',
            'email'=> 'dummy@email.com',
            'password'=> bcrypt('test1234'),
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
