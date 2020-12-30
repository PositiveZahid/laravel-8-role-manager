@extends('layouts.admin')
@section('content')

<div class="card">
	<div class="card-header">
		{{ 'Create New Permission' }}
	</div>

	<div class="card-body">
		<form action="{{ route("admin.permissions.store") }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="name">{{ 'Title' }}*</label>
				<input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
				@if($errors->has('name'))
				<em class="invalid-feedback">
					{{ $errors->first('name') }}
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
