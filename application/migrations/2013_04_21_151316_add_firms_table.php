<?php

class Add_Firms_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('firms', function($table) {
			$table->increments('id');
			$table->string('name1', 250)->unique();
			$table->string('name2', 250)->nullable();
			$table->string('contact_salutation', 20)->nullable();
			$table->string('contact_name', 250)->nullable();
			$table->string('contact_mail', 250)->nullable()->unique();
			$table->string('contact_tel1', 250)->nullable();
			$table->string('contact_tel2', 250)->nullable();
			$table->string('homepage', 50)->nullable();
			$table->string('street', 250)->nullable();
			$table->string('postal_code', 5)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('country', 50)->default('Germany');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('firms');
	}

}