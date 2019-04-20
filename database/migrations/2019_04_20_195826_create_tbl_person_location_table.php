<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblPersonLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_person_location', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('location')->index('detected_location_FK');
			$table->integer('missingPerson')->index('detected_person_FK');
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
		Schema::drop('tbl_person_location');
	}

}
