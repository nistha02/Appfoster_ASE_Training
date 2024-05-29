@extends('projects.layout')
@section('content')
<div class="card">
    <div class="card-header">Edit Project</div>
    <div class="card-body">
        <form action="{{ route('projects.update', ['userId' => $user->id, 'projectId' => $project->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $project->Title }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $project->description }}</textarea>
            </div>

            <div class="modal-footer" style="background-color:#a0a6a6;">
                <div class="mb-3 d-inline-block" style="text-align: center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-secondary" href="{{ route('projects.index', $user->id) }}">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
