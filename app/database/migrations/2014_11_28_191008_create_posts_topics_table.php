<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTopicsTable extends Migration {
	
	public function up()
	{
		Schema::create('posts_topics', function(Blueprint $table)
		{
			$table->integer('post_id');
			$table->integer('topic_id');
		});
	}
	
	public function down()
	{
		Schema::drop('posts_topics');
	}
}