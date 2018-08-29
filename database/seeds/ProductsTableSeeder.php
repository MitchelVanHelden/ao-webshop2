<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('products')->insert([
            array('name' => 'Bacardi Lemon','price' => '17.99', 'volume' => '70CL'),
            array('name' => 'Hennessy','price' => '30.99', 'volume' => '70CL'),
            array('name' => 'Grey goose','price' => '39.99', 'volume' => '70CL'),
            array('name' => 'Belverdere','price' => '36.99', 'volume' => '70CL'),
            array('name' => 'Ciroc','price' => '31.99', 'volume' => '70CL'),
            array('name' => 'Jack daniel\'s','price' => '24.99', 'volume' => '70CL'),
            array('name' => 'Bernardus Chardonnay','price' => '22.99', 'volume' => '75CL'),
            ]);
    }
}
