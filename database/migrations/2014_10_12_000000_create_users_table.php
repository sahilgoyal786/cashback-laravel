<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('mobile_no')->unique();
			$table->string('password', 60);
			$table->string('user_type');
			$table->rememberToken();
			$table->timestamps();
		});

        DB::table('users')->insert(
            array(
                'name' => 'Sahil Goyal',
                'email' => 'sahilgoyal1@gmail.com',
                'mobile_no' => '9569330830',
                'password' => bcrypt('password'),
                'user_type' => 'admin'
            )
        );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
