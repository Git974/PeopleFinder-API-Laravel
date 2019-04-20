<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('firstName', 20);
			$table->string('lastName', 20)->nullable();
			$table->string('email', 45)->unique('email_UNIQUE');
			$table->string('username', 30)->unique('username_UNIQUE');
			$table->string('phone', 15);
			$table->text('address', 16777215);
			$table->string('password', 60);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_user');
	}

}
