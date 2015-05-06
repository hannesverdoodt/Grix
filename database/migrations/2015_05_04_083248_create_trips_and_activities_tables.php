<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsAndActivitiesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trips', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->default(0);
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('title');
			$table->string('link');
			$table->string('location');
			$table->dateTime('start_trip');
			$table->dateTime('end_trip');
			$table->text('description')->default('');
			$table->dateTime('deadline');
			$table->integer('VoteToPass');
			$table->string('Imagepath');
			$table->timestamps();
		});

		Schema::create('activities', function(Blueprint $table) {

			$table->increments('id');
			$table->integer('trips_id')->unsigned()->default(0);
			$table->foreign('trips_id')->references('id')->on('trips')->onDelete('cascade');
			$table->string('title');
			$table->string('link');
			$table->string('location');
			$table->dateTime('start_activity');
			$table->dateTime('end_activity');
			$table->text('description')->default('');
			$table->string('imagepath');
			$table->integer('voteUp');
			$table->integer('voteDown');
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
		Schema::drop('trips');
		Schema::drop('activities');
	}

}