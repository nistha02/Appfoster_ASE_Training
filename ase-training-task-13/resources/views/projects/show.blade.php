@extends('projects.layout')

@section('content')
<div class="card">
    <div class="card-header">Project Details</div>
    <div class="card-body">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('projects.index') }}">Back</a>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Name:</th>
                    <td>{{ $project->title }}</td>
                </tr>
                <tr>
                    <th scope="row">Description:</th>
                    <td>{{ $project->description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection