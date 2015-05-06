<?php namespace App\Http\Controllers;

use App\Trip;
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
			$trips = Trip::latest('start_trip')->get();
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

		$trip = new trip;
		$trip->user_id = '2';
		$trip->title = $input['title'];
		$trip->link = $input['link'];
		$trip->location = $input['location'];
		$trip->description = $input['discription'];
		$trip->start_trip = $input['startTrip'];
		$trip->end_trip = $input['endTrip'];
		$trip->Imagepath = $input['image'];
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
		return view('selectedtrip')->with('select_trip', $select_trip);
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
