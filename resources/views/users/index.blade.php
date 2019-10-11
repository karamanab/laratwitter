@extends('layouts.app')


@section('content')
<h3>Users List</h3>

@foreach($users as $user)

	<h5>{{ $user->name }}</h5>

	<p>
		<a href="/admin/users/{{ $user->id }}" class="btn btn-info">Show User</a>
		<a href="/admin/users/{{ $user->id }}/edit" class="btn btn-primary">Edit User</a>
	</p>

	<hr>

@endforeach

@endsection