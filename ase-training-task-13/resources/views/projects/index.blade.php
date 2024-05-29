@extends('projects.layout')

@section('content')
<div class="card">
    <div class="card-header text-center" style="font-weight: bold !important;">Projects</div>
    <div class="card-body">

        <div class="mb-3 d-inline-block" >
            <a class="btn btn-success ml-2" style="margin-left:5px" href="{{ route('projects.create', ['userId' => $user->id]) }}">Create New Project</a>
            <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td>{{ $project->Title }}</td>
                        <td>{{ $project->description }}</td>
                        <td style="display: flex; gap: 5px;">
                        <a class="btn btn-warning" href="{{ route('projects.edit', ['userId' => $user->id, 'projectId' => $project->id]) }}">Edit</a>
                        <form action="{{ route('projects.delete', ['userId' => $user->id, 'projectId' => $project->id]) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                            </form>
                            <div id="editProjectModal_{{ $project->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel" aria-hidden="true">

</div>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
