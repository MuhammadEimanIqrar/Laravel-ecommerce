<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'OPPO Mobile',
                'price' => '300',
                'description' => 'A samrtphone with 8gb ram and much more features ',
                'Category' => 'Mobile',
                'gallery' => 'https://www.whatmobile.com.pk/admin/images/Oppo/OppoA93s5G-b.jpg',
            ],
            [
                'name' => 'Panasonic TV',
                'price' => '400',
                'description' => 'A samrt TV with 4gb ram and much more features ',
                'Category' => 'TV',
                'gallery' => 'https://cdn.tgdd.vn/Products/Images/1942/68122/tivi-led-panasonic-th-60as700v-1-org-1.jpg',
            ],
            [
                'name' => 'Sony TV',
                'price' => '500',
                'description' => 'A TV with 4gb ram and much more features ',
                'Category' => 'TV',
                'gallery' => 'https://images-na.ssl-images-amazon.com/images/I/81FFhq8sErL._AC_SY355_.jpg',
            ],
            [
                'name' => 'LG Fridge',
                'price' => '5000',
                'description' => 'A samrt fridge with 4gb ram and much more features ',
                'Category' => 'Refridgertors',
                'gallery' => 'https://image.isu.pub/150401071904-e42d0273d3af17599c78cb98818fdd85/jpg/page_1.jpg',
            ]
        ]);
    }
}
