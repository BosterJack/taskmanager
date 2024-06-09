@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Add Task</h1>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <input type="hidden" name="project_id" value="{{ request('project_id') }}">
        <div class="form-group">
            <label for="name">Task Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
        <a href="{{ route('projects.show', request('project_id')) }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
