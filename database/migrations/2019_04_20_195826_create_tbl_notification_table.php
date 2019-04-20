<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblNotificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_notification', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user')->index('notified_user_FK');
			$table->string('subject', 45);
			$table->text('message', 16777215)->nullable();
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
		Schema::drop('tbl_notification');
	}

}
