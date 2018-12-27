@extends('master')
@section('content')

	<div class="container">
		<div class="row">
			
			<div class="col-md-12">
				{{-- 
				<p>@{{ new.job_title }}</p>
				 --}}
				<table>
					<thead>
						<tr>
							<td>Jobs</td>
							<td>Apply</td>
						</tr>
					</thead>
					<tbody>
						@foreach($new as $news)	
						<tr>
							<td>{{ $news['job_title'] }}</td>
							<td><a href="javascript:;">View job</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			
		</div>
	</div>

@endsection