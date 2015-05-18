<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {

	protected $table = 'activities';

	protected $fillable = 
	[
			'title',
			'link',
			'location',
			'start_activity',
			'end_activity',
			'description',
			'imagepath'
	];

	protected $hidden = ['created_at', 'updated_at'];

	public function trip()
	{
		return $this->belongsTo('App\Trip');
	}
		public function Activity()
	{
		return $this->hasMany('App\Vote');
	}


}
