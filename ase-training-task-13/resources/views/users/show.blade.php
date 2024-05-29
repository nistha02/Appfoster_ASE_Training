@extends('users.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">User Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $users->name }}</h5>
        <p class="card-text">Email : {{ $users->email }}</p>
  </div>
       
    </hr>
  
  </div>
</div>