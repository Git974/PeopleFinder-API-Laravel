<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTblPersonLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tbl_person_location', function(Blueprint $table)
		{
			$table->foreign('location', 'detected_location_FK')->references('id')->on('tbl_location')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('missingPerson', 'detected_person_FK')->references('id')->on('tbl_missing_person')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbl_person_location', function(Blueprint $table)
		{
			$table->dropForeign('detected_location_FK');
			$table->dropForeign('detected_person_FK');
		});
	}

}
