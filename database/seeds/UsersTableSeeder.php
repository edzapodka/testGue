<?php


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder{


    /**
     *
     */
    public function run()
    {
        Model::unguard();

        //$faker = Faker\Factory::create();

        DB::table('users')->truncate();

        User::create([
            'username' => 'edzapodka',
            'email' => 'edzapodka@gmail.com',
            'password' => Hash::make('1234')
            ]);

         User::create([
            'username' => 'maryani',
            'email' => 'maryani@gmail.com',
            'password' => Hash::make('1234')
            ]);

        // foreach(range(1,20 )as $index)
        // {
        //     User::create([
        //         'username' => $faker->userName,
        //         'email' => $faker->email,
        //         'password' => Hash::make('1234'),
        //         'created_at' => \Carbon\Carbon::now(),


        //     ]);
        // }
    }
}