<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTblNotificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tbl_notification', function(Blueprint $table)
		{
			$table->foreign('user', 'notified_user_FK')->references('id')->on('tbl_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbl_notification', function(Blueprint $table)
		{
			$table->dropForeign('notified_user_FK');
		});
	}

}
