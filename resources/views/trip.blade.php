@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">trips</div>

				<div class="panel-body">
					@foreach ($trips as $trip)
					<li>
					<a href=" {{ url('/trip', $trip->id) }}">{{ $trip->title }}</a>
					</li>
					@endforeach
					<a href="{{ url('/trip/create') }}" class="btn btn-info" role="button">Maak trip aan</a>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
