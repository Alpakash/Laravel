@extends('layouts.app')
@section('content')

	<div class="container">
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