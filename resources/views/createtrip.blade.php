@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

				<h1>Create a new trip</h1>

				{!! Form::open(['url' => 'trip']) !!}

					<div class="form-group @if ($errors->has('title')) has-error @endif">
						{!! Form::label('title', 'Title') !!}
						{!! Form::text('title', null, ['class' => 'form-control']) !!}
						@if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
					</div>

					<div class="form-group @if ($errors->has('link')) has-error @endif">
						{!! Form::label('link', 'link') !!}
						{!! Form::url('link', null, ['class' => 'form-control']) !!}
						@if ($errors->has('link')) <p class="help-block">{{ $errors->first('link') }}</p> @endif
					</div>

					<div class="form-group @if ($errors->has('location')) has-error @endif">
						{!! Form::label('location', 'location') !!}
						{!! Form::text('location', null, ['class' => 'form-control']) !!}
						@if ($errors->has('location')) <p class="help-block">{{ $errors->first('location') }}</p> @endif
					</div>

					<div class="form-group @if ($errors->has('discription')) has-error @endif">
						{!! Form::label('discription', 'discription') !!}
						{!! Form::textarea('discription', null, ['class' => 'form-control']) !!}
						@if ($errors->has('discription')) <p class="help-block">{{ $errors->first('discription') }}</p> @endif
					</div>

					<div class="form-group @if ($errors->has('startTrip')) has-error @endif">
						{!! Form::label('startTrip', 'startTrip') !!}
						{!! Form:: input('datetime-local', 'startTrip', null, ['class' => 'form-control']) !!}
						@if ($errors->has('startTrip')) <p class="help-block">{{ $errors->first('startTrip') }}</p> @endif
					</div>

					<div class="form-group @if ($errors->has('endTrip')) has-error @endif">
						{!! Form::label('endTrip', 'endTrip') !!}
						{!! Form:: input('datetime-local', 'endTrip', date('Y-m-d'), ['class' => 'form-control']) !!}
						@if ($errors->has('endTrip')) <p class="help-block">{{ $errors->first('endTrip') }}</p> @endif
					</div>
					<!--
					<div class="form-group @if ($errors->has('title')) has-error @endif">
						{!! Form::label('image', 'image') !!}
						{!! Form::file('image', null, ['class' => 'form-control']) !!}
					</div>
					-->
				<h2>Settings</h2>

					<div class="form-group @if ($errors->has('deadline')) has-error @endif">
						{!! Form::label('deadline', 'deadline') !!}
						{!! Form::text('deadline', null, ['class' => 'form-control']) !!}
						@if ($errors->has('deadline')) <p class="help-block">{{ $errors->first('deadline') }}</p> @endif
					</div>

					<div class="form-group @if ($errors->has('voteToPass')) has-error @endif">
						{!! Form::label('voteToPass', 'voteToPass') !!}
						{!! Form::text('voteToPass', null, ['class' => 'form-control']) !!}
						@if ($errors->has('voteToPass')) <p class="help-block">{{ $errors->first('voteToPass') }}</p> @endif
					</div>	

					<div class="form-group">
						{!! Form::submit('Add Trip', null, ['class' => 'btn btn-success']) !!}
					</div>													
				{!! Form::close() !!}
			
		</div>
	</div>
</div>
@endsection
