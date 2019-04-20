<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_image', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('folder', 45)->unique('folder_UNIQUE');
			$table->integer('count');
			$table->integer('person')->index('person_FK');
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
		Schema::drop('tbl_image');
	}

}
