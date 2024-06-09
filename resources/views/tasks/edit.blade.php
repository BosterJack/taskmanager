@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Task</h1>
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Task Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
        </div>
        <div class="form-group">
            <label for="project_id">Project</label>
            <select class="form-control" id="project_id" name="project_id">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('projects.show', $task->project_id) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection
