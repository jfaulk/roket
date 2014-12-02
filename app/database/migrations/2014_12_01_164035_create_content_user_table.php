<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('content_user', function(Blueprint $table)
		{
            $table->increments('id');
			$table->unsignedInteger('content_id');
			$table->unsignedInteger('user_id');
            $table->foreign('content_id')->references('id')->on('content')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('content_user');
	}

}
