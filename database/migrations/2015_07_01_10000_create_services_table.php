<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 * Username, Attribute, op, Value
	 * 
	 */
	public function up()
	{
		Schema::create('radcheck', function(Blueprint $table)
		{
			$table->increments('id')->unique;
			$table->string('Username')->unique;
			$table->string('Attribute');
			$table->string('op');
			$table->string('Value');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('radcheck');
	}

}
