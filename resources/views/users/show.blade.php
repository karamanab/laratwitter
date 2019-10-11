@extends('layouts.app')

@section('content')

<h1>{{ $user->name }}</h1>

<p class="lead">{{ $user->email }}</p>

<a href="/admin/users" class="btn btn-info">Back to All Users</a>
<a href="/admin/users/{{ $user->id }}/edit" class="btn btn-primary">Edit User</a>



@endsection

