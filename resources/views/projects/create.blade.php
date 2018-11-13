@extends('layout')

@section('content')
  
  <h1 class="title">Create a new Project</h1>

<form action="/projects" method="POST">

    {{ csrf_field() }}
  <div>
    <label class="label" for="title">Title</label>

    <div class="control">
    <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : ''}}" name="title" placeholder="Title.." value="{{ old('title') }}" required>
    </div>
  </div>


  <div class="field">
    <label class="label" for="description">Description</label>

    <div class="control">
    <input class="textarea {{ $errors->has('description') ? 'is-danger' : ''}}" name="description" placeholder="Description..." value="{{ old('description') }}" required>
    </div>
  </div>

  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">Update Project</button>
    </div>
  </div>

   @if ($errors->any())
  <div class="notification is-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
  @endif
</form>


@endsection
