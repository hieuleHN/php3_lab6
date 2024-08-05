<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::Create();

        for($i=0;$i<100;$i++){
            DB::table('posts')->insert([
                'tile'=> $faker->text(25),
                'images'=>"abcegrnjkdb.jcd",
                'description'=>$faker->text('50'),
                'content'=>$faker->text('50'),
                'view'=>rand(1,1000),
                'cate_id'=>rand(1,4)
            ]);
        }
        //DB::table('posts')->insert([]);
    }
}
