@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Add Project</h1>
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Project Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Project</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
