@extends('users.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('/user/' . $users->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" value="{{ $users->id }}" />
        <label>Name</label><br>
        <input type="text" name="name" value="{{ $users->name }}" class="form-control"><br>
        <label>Email</label><br>
        <input type="text" name="email" value="{{ $users->email }}" class="form-control"><br>
        <input type="submit" value="Update" class="btn btn-success"><br>
        <br>
        <a class="btn btn-secondary" href="{{ route('projects.index', $users->id) }}">Cancel</a>
    </form>
   
  </div>
</div>
 
@stop
