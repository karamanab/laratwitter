@extends('layouts.layout')

@section('content')

<div class="title">
	<label class="label" for="title">Editing "{{ $user->name }}"</label>
</div>

<p class="lead">Edit and save this user below, or <a href="/admin/users">go back to all users.</a></p>

<form method="POST" action="/admin/users/{{ $user->id }}/edit" style="margin-bottom: 1em">
	
	{{ method_field('PATCH') }}
	{{ csrf_field() }}

	<div class="field">
			<label class="label" for="title">Username </label>
			<div>
				<input type="text" class="input" name="name" placeholder="Username" value="{{ $user->name }}">
			</div>
	</div>

	<div class="field">
		<label class="label" for="email">E-mail Address</label>
		<div class="control">
			<textarea name="email" class="textarea">{{ $user->email }}</textarea>
		</div>
	</div>

	<div class="field">
		<div>
			<button type="submit" class="button is-link">Update User</button>
		</div>
	</div>

</form>

<form method="POST" action="/admin/users/{{ $user->id }}">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}

	<div class="field">
		<div>
			<button type="submit" class="btn btn-danger">Delete User</button>
		</div>
	</div>

</form>

<hr>


@endsection