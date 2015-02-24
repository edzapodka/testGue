<?php


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Article;

class ArticlesTableSeeder extends Seeder{


	public function run()
    {
        Model::unguard();
        DB::table('articles')->truncate();
        $faker = Faker\Factory::create();


        foreach(range(1,20 )as $index)
        {
            $title = $faker->sentence(5);
            $slug  = Str::slug($title, '-');
            Article::create([
                'user_id' => 1,
                'title' => $title,
                'seo_title' => Str::slug($slug,'-'),
                'body' => $faker->paragraph(5),
                //'published_at' => $faker->dateTimeBetween('now', '+5 days')


            ]);
        }
    }
}