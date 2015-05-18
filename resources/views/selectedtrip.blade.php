@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $select_trip->title }}</div>

				<div class="panel-body">
				@if ($activities->count())
					
					@foreach ($activities as $activity)

						<p>{{ $activity->title }}</p>
						
					@endforeach

				@else

							<p>create new activities</p>
							
				@endif	



					<a href="{{ url('/activity', $select_trip->id ) }}" class="btn btn-info" role="button">add activity</a>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">friends in {{ $select_trip->title }} </div>

				<div class="panel-body">
				@if ($friends->count())
					
					@foreach ($friends as $friend)

						<p>{{ $friend->name }}</p>
						
					@endforeach

				@else

							<p>add friend to trip</p>
							
				@endif	
				<div class="button-wrap"><button data-dialog="somedialog" class="trigger">Open Dialog</button></div>




					
				</div>
			</div>
		</div>

	</div>
	<div id="somedialog" class="dialog">
					<div class="dialog__overlay"></div>
					<div class="dialog__content">
						<h2>add friend to trip</h2>
						{!! Form::open(array('url' => 'friend/'. $select_trip->id , 'method' => 'PUT', 'class'=>'col-md-12')) !!}

					<div class="form-group @if ($errors->has('name')) has-error @endif">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
						@if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
					</div>

					<div class="form-group @if ($errors->has('email')) has-error @endif">
						{!! Form::label('email', 'Email') !!}
						{!! Form::text('email', null, ['class' => 'form-control']) !!}
						@if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
					</div>

					<a class="action" data-dialog-close>Close</a>
					<div class="form-group">
						{!! Form::submit('Add Friend', null, ['class' => 'btn btn-success']) !!}
					</div>													
				{!! Form::close() !!}
					</div>
				</div>
</div>
@endsection