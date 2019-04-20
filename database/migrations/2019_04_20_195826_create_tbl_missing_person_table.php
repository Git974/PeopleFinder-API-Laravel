<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblMissingPersonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_missing_person', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('firstName', 20);
			$table->string('lastName', 20)->nullable();
			$table->integer('age');
			$table->string('cnic', 13)->unique('cnic_UNIQUE');
			$table->string('phone', 15);
			$table->text('address', 16777215)->nullable();
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
		Schema::drop('tbl_missing_person');
	}

}
