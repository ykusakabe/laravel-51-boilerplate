<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_users', function(Blueprint $table)
		{
			$table->bigIncrements('id');

			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);

            $table->string('api_access_token')->default('');

            $table->unsignedBigInteger('profile_image_id')->default(0);

			$table->rememberToken();
            $table->softDeletes();
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
		Schema::drop('admin_users');
	}

}
