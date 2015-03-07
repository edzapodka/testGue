<?php


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Gallery;

class GalleryTableSeeder extends Seeder{


    public function run()
    {
        Model::unguard();

        $faker = Faker\Factory::create();


        foreach(range(1,30 )as $index)
        {

            Gallery::create([
                'user_id' => 1,
                'name'  => $faker->imageUrl(600,400)
            ]);
        }
    }
}