<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTblImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tbl_image', function(Blueprint $table)
		{
			$table->foreign('person', 'person_FK')->references('id')->on('tbl_missing_person')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbl_image', function(Blueprint $table)
		{
			$table->dropForeign('person_FK');
		});
	}

}
