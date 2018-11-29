@extends('layout')

@section('content')
    <h1 class="title">Edit Project</h1>

    <form action="/projects/{{ $project->id }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="field">
            <label class="label" for="title">Title</label>
            
            <div class="control">
                <input type="text" class="input" name="title" placeholder="title" value="{{ $project->title }}" required>
            </div>
        </div>


        <div class="field">
            <label class="label" for="description">Description</label>

            <div class="control">
                <input class="textarea" name="description" value="{{ $project->description }}" required>
            </div>
        </div>


        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>
    </form>

    <br>
    <form action="/projects/{{ $project->id }}" method="POST">
        @method('DELETE')
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-danger">Delete Project</button>
            </div>
        </div>
    </form>
@endsection