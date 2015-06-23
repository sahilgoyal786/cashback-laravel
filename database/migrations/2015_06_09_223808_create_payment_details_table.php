<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('payment_settings', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('address');
            $table->string('bank_name');
            $table->string('account_no')->unique();
            $table->string('ifsc_code');
            $table->string('branch_name');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//

        Schema::drop('payment_settings');

	}

}
