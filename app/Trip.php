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
			'description',
			'deadline',
			'VoteToPass',
			'Imagepath'
	];

	protected $hidden = ['created_at', 'updated_at'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function activities()
	{
		return $this->hasMany('App\Activity');
	}

}
