@extends('layouts.app')

@section('content')
    <h1 class="mb-4">{{ $project->name }}</h1>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
    <a href="{{ route('tasks.create', ['project_id' => $project->id]) }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Add Task
    </a>
    <ul class="list-group sortable">
        @foreach($tasks as $task)
            <li class="list-group-item draggable d-flex justify-content-between align-items-center" id="{{ $task->id }}">
                {{ $task->name }}
                <div>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
