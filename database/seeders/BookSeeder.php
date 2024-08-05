<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::Create();

        for($i=0;$i<100;$i++){
        DB::table('books')->insert([
                'title'=> $faker->text(25),
                'thumbnail'=>"abcegrnjkdb.jcd",
                'author'=>$faker->text('50'),
                'publisher'=>$faker->text('50'),
                'Publication'=>$faker->date("2024-08-13"),
                'Price'=>rand(1,10000),
                'Quantity'=>rand(1,1000),
                'Category_id'=>rand(1,4)
            ]);
        }
    }
}
