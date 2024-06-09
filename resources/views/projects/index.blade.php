@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Add Project
    </a>
    <ul class="list-group">
        @foreach($projects as $project)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a>
                <div>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
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
