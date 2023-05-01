<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            ['post'=>'サンプル１','name'=>'だいすけ'],
            ['post'=>'サンプル2','name'=>'けいすけ']
        ]);
    }
}
