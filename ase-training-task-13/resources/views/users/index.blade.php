@extends('users.layout')
@section('content')
    <div class="outer-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2>User Table</h2>
                        </div>
                        <div class="card-body">
                            <a href="{{ url('/user/create') }}" class="btn btn-success btn-sm" title="Add New User">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New User
                            </a>
                            <br/>
                            <br/>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <!-- <td>{{ $item->mobile }}</td> -->
                                            <td>
                                                <a href="{{ url('/user/' . $item->id) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/user/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                <form method="POST" action="{{ url('/user/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                   
                                                </form>
                                                <a class="btn btn-warning btn-sm" href="{{ route('projects.index', $item->id) }}">Projects</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
