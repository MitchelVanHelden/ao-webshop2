<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table('categories')->insert([
            array('name' => 'Rum'),
            array('name' => 'Vodka'),
            array('name' => 'Whiskey'),
            array('name' => 'Cognac'),
            array('name' => 'Wine'),
        ]);
    }
}
