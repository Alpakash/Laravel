@extends('layouts.app')
@section('content')

	<div class="container">

		<div class="card mb-4 mt-5">
			<div class="card-header">
				<strong>Generate knop</strong>
			</div>
			<div class="card-body ">
		<form action="/generateRound" method="post">
			@csrf
			<center><input onclick="return confirm('Wil je de eerste ronde genereren?');" class="btn btn-success" type="submit" value="Genereer de eerste ronde"></center>
		</form>
			</div>
		</div>


		<div class="card mb-4 mt-5">
			<div class="card-header">
				<strong>Countdown timer</strong>
			</div>
			<div class="card-body ">
		<!-- Countdown Timer JavaScript-->
		@include('layouts.cd-buttons')
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				<strong>Users</strong>
			</div>
			<div class="card-body">
				  	@foreach ($users as $user)
						<a href="{{route('judge.edit',$user->id)}}">
						{{$user->name}}<br>
						</a>
				  	@endforeach
				  	<a href="{{route('judge.create')}}" class="btn btn-primary">Create Judge</a>
			</div>
		</div>
	</div>

@endsection