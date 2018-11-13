@extends('layout')

@section('content')
    <a href="/projects">Go Back</a>

    <h1 class="title">{{ $project->title }}</h1>


    <div class="content"> <strong>Description: </strong> {{ $project->description }}</div>
@if ($project->tasks->count())
    <div>  
@foreach($project->tasks as $task)
<li>{{ $task->description }} </li>
@endforeach

    </div>
@endif
    <a href="/projects/{{$project->id}}/edit"><button class="button is-link">Edit</button></a>
    @endsection
