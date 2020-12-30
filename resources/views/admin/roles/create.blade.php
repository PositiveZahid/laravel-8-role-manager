@extends('layouts.admin')
@section('content')

<div class="card">
	<div class="card-header">
		{{ 'Create New Role' }}
	</div>

	<div class="card-body">
		<form action="{{ route("admin.roles.store") }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="name">{{ 'Title' }}*</label>
				<input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($role) ? $role->name : '') }}" required>
				@if($errors->has('name'))
				<em class="invalid-feedback">
					{{ $errors->first('name') }}
				</em>
				@endif
			</div>
			<div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
				<label for="permission">{{ 'Permissions' }}*
					<span class="btn btn-outline-success btn-xs select-all">{{ 'Select All' }}</span>
					<span class="btn btn-outline-success btn-xs deselect-all">{{ 'Deselect All' }}</span>
				</label>
				<select name="permission[]" id="permission" class="form-control select2" multiple="multiple" required>
					@foreach($permissions as $id => $permissions)
					<option value="{{ $id }}" {{ (in_array($id, old('permission', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
					@endforeach
				</select>
				@if($errors->has('permission'))
				<em class="invalid-feedback">
					{{ $errors->first('permission') }}
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
