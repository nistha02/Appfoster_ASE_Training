@extends('projects.layout')

@section('content')
<div class="card">
    <div class="card-header">Create New Project</div>
    <div class="card-body">
        <form action="{{ route('projects.store', ['userId' => $userId]) }}" method="POST">
            @csrf
            <input type="hidden" name="userId" value="{{ $userId }}">
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" id="Title" name="Title">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="mb-3 d-inline-block" style="text-align: center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('projects.index',['userId' => $userId]) }}">Back</a>
            </div>

        </form>
    </div>
</div>
@endsection