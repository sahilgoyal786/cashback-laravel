<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++)
        {
            $user = User::create(array(
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt($faker->password(10,12)),
                'mobile_no' => ''.$faker->numberBetween(1234567890,2134567890),
                'user_type' => 'normal'
            ));
        }



    }

}
