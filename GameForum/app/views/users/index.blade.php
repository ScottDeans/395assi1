@extends('layouts.home')
@extends('layouts.user')
@section('main')
@section('content')
<h1>All Users</h1>
<link rel="stylesheet" href="css/homecss.css" type="text/css">
<p>{{ link_to_route('users.create', 'Add new user') }}</p>//routes to creaing user menu

@if ($users->count())

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)//prints off each users
                <tr>
                    <td>{{ $user->username }}</td>
          <td>{{ $user->password }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->phone }}</td>
          <td>{{ $user->name }}</td>
                    <td>{{ link_to_route('users.edit', 'Edit',
 array($user->id), array('class' => 'btn btn-info')) }}</td>   //links to editing information
                    <td>
          {{ Form::open(array('method' 
=> 'DELETE', 'route' => array('users.destroy', $user->id))) }}                       
                            {{ Form::submit('Delete', array('class' //deletes
 => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    There are no users
@endif

@stop
