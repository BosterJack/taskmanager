@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Project</h1>
    <form method="POST" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Project Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Project</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
