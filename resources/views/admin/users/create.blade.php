@extends('layouts.admin')
@section('content')

<div class="card">
	<div class="card-header">
		{{ 'Create User' }}
	</div>

	<div class="card-body">
		<form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="name">{{ 'Name' }}*</label>
				<input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
				@if($errors->has('name'))
				<em class="invalid-feedback">
					{{ $errors->first('name') }}
				</em>
				@endif
			</div>
			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
				<label for="email">{{ 'Email' }}*</label>
				<input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
				@if($errors->has('email'))
				<em class="invalid-feedback">
					{{ $errors->first('email') }}
				</em>
				@endif
			</div>
			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				<label for="password">{{ 'Password' }}</label>
				<input type="password" id="password" name="password" class="form-control" required>
				@if($errors->has('password'))
				<em class="invalid-feedback">
					{{ $errors->first('password') }}
				</em>
				@endif
			</div>
			<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
				<label for="roles">{{ 'Roles' }}*
					<span class="btn btn-outline-success btn-xs select-all">{{ 'Select All' }}</span>
					<span class="btn btn-outline-success btn-xs deselect-all">{{ 'Deselect All' }}</span>
				</label>
				<select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
					@foreach($roles as $id => $roles)
					<option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
					@endforeach
				</select>
				@if($errors->has('roles'))
				<em class="invalid-feedback">
					{{ $errors->first('roles') }}
				</em>
				@endif
			</div>
			<div>
				<input class="btn btn-success" type="submit" value="{{ 'Save' }}">
			</div>
		</form>


	</div>
</div>
@endsection
