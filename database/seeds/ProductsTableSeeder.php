<?php


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductsTableSeeder extends Seeder{


    public function run()
    {
        Model::unguard();
//        DB::table('jenis_product')->truncate();
//        DB::table('products')->truncate();
        $faker = Faker\Factory::create();


        foreach(range(1,30 )as $index)
        {

            Product::create([
                'code' => $faker->postcode,
                'user_id' => 1,
                'name'  => $faker->name,
                'price'  => $faker->randomFloat(null,0,null),
                'size'  => $faker->randomLetter,
                'colour'  => $faker->colorName,
                'keterangan'  => $faker->sentence(3),
                'image' => $faker->imageUrl(600,400),


                //'published_at' => $faker->dateTimeBetween('now', '+5 days')


            ]);
        }
    }
}