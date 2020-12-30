@extends('layouts.admin')
@section('content')

<div class="card">
	<div class="card-header">
		{{ 'Show Permission' }}
	</div>

	<div class="card-body">
		<div class="mb-2">
			<table class="table table-bordered table-striped">
				<tbody>
					<tr>
						<th>
							{{ 'ID' }}
						</th>
						<td>
							{{ $permission->id }}
						</td>
					</tr>
					<tr>
						<th>
							{{ 'Title' }}
						</th>
						<td>
							{{ $permission->name }}
						</td>
					</tr>
				</tbody>
			</table>
			<a class="btn btn-outline-success" href="{{ url()->previous() }}">
				{{ 'Back' }}
			</a>
		</div>

		<nav class="mb-3">
			<div class="nav nav-tabs">

			</div>
		</nav>
		<div class="tab-content">

		</div>
	</div>
</div>
@endsection
