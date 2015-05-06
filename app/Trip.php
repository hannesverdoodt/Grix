<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model {

	protected $table = 'Trips';

	protected $fillable = 
	[
			'title',
			'link',
			'location',
			'start_trip',
			'end_trip',
			'desscription',
			'deadline',
			'VoteToPass',
			'Imagepath'
	];

	protected $hidden = ['created_at', 'updated_at'];

}
