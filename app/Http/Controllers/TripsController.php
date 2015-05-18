<?php namespace App\Http\Controllers;

use App\Trip;
use App\Vote;
use App\User;
use App\Friend;
use App\Activity;
use App\Tripfriends;
use App\Http\Requests;
use App\Http\Requests\CreateTrip;
use App\Http\Controllers\Controller;


class TripsController extends Controller {

	
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
			$planner_id = \Auth::user()->id;
			$trips = Trip::latest('start_trip')->where('user_id', $planner_id)->get();
         	return view('home')->with('trips', $trips);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('createtrip');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateTrip $request)
	{
		$input = $request->all();

		$planner_id = \Auth::user()->id;

		$trip = new trip;
		$trip->user_id = $planner_id;
		$trip->title = $input['title'];
		$trip->link = $input['link'];
		$trip->location = $input['location'];
		$trip->description = $input['discription'];
		$trip->start_trip = $input['startTrip'];
		$trip->end_trip = $input['endTrip'];
		/*$trip->Imagepath = $input['image'];*/
		$trip->deadline = $input['deadline'];
		$trip->VoteToPass = $input['voteToPass'];
		
		$trip->save();

		return redirect('trip');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$select_trip = trip::find($id);
		$activities = Activity::where('trips_id', $id)->get();


		/*friends of trip */
		$listfriends = Tripfriends::select('friends_id')->where('trip_id', $id)->get();
		$listfriends = $listfriends->lists('friends_id');
		$friendsoftrip = friend::select('user_id')->whereIn('id', $listfriends)->get();
		$friendsoftrip = $friendsoftrip->lists('user_id');
		$tripfriends = user::whereIn('id', $friendsoftrip)->get(); 

		/*vote of activities*/

		/*votes up &  down*/



		/*tonen van votes*/



		/* return to view */

		return view('selectedtrip')
					->with('activities', $activities)
					->with('select_trip', $select_trip)
					->with('friends', $tripfriends);

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
	public function update($id)
	{
		//
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
