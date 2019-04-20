<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_admin', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('firstName', 20);
			$table->string('lastName', 20)->nullable();
			$table->string('username', 30)->unique('username_UNIQUE');
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
		Schema::drop('tbl_admin');
	}

}
