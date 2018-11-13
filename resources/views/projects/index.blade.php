@extends('layout')

@section('content')
  <h1 class="title">Projects</h1>
<ul>
@foreach ($projects as $project)
<a href="/projects/{{$project->id}}"><li> {{ $project->id  }} // {{ $project->title }} - {{ $project->description }}</li></a>
@endforeach
</ul>
  <br/>

<p><a href="/projects/create"><button class="button is-link">Create Project</button></a></p>
@endsection