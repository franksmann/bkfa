<?php

class Add_Participants_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('participants', function($table) {
			$table->increments('id');
			$table->string('external_id', 250)->unique();
			$table->string('salutation', 25);
			$table->string('firstname', 250)->nullable();
			$table->string('lastname', 250)->nullable();
			$table->string('birthname', 250)->nullable();
			$table->string('birthcity', 250)->nullable();
			$table->string('birthcountry', 250)->nullable();
			$table->string('mail', 250)->nullable()->unique();
			$table->string('tel1', 250)->nullable();
			$table->string('tel2', 250)->nullable();
			$table->date('date_of_expiry_class_c', 250)->nullable();
			$table->date('date_of_expiry_class_ce', 250)->nullable();
			$table->string('street', 250)->nullable();
			$table->string('postal_code', 5)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('country', 50)->default('Germany');
//                        $table->foreign('firm')->references('id')->on('firms');
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
		Schema::drop('participants');
	}

}