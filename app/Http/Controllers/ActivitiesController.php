<?php namespace App\Http\Controllers;

use App\Trip;
use App\Vote;
use App\Activity;
use App\Http\Requests;
use App\Http\Requests\CreateActivity;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ActivitiesController extends Controller {

		public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('createactivity')->with('trip_id', $id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreateActivity $request)
	{
		$input = $request->all();

		$trip_id = 1;

		$activity = new activity;

		$activity->trips_id = $trip_id;
		$activity->title = $input['title'];
		$activity->link = $input['link'];
		$activity->location = $input['location'];
		$activity->description = $input['discription'];
		$activity->start_activity = $input['startActivity'];
		$activity->end_activity = $input['endActivity'];

	
		/*$trip->Imagepath = $input['image'];*/
		
		$activity->save();

		/*votes op nul zetten */

		$recent_activity_id = $activity->id;
		$voter_id = \Auth::user()->id;

		$vote = new vote;
		$vote->user_id = $voter_id;
		$vote->activity_id= $recent_activity_id ;
		$vote->votesUp = 0;
		$vote->votesDown = 0;

		$vote->save();

		
		return redirect('trip/'. $id);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
