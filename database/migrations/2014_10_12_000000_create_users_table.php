<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Stellar Blog Migrations.
     *
     * - Create  'user'  table
     * - Create  'post'  table
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 32);
			$table->string('email', 32)->unique();
			$table->string('password', 64);
            $table->rememberToken();    // remember_token VARCHAR(100)
            $table->timestamps();       // created_at  &  updated_at
            $table->softDeletes();      // deleted_at
		});

		Schema::create('post', function(Blueprint $table)
        {
            $table->increments('id');
            $table->foreign('user_id')->references('id')->on('user');
            $table->boolean('active')->default(true);
            $table->string('title', 64);
            $table->longText('body');
            $table->dateTime('published_at');   // published_at
            $table->timestamps();               // created_at  &  updated_at
            $table->softDeletes();              // deleted_at
        });
	}

	/**
	 * Drop table.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
		Schema::drop('post');
	}

}
