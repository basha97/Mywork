@extends('master')
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12 well">
				<h3 style="text-align: center">EZRECRUIT</h3>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<a href="{{ URL::to('candidate') }}" class="btn btn-default btn-block"><i class="fa fa-user"></i> Candidates  <span>{{ $data1->count }}</span></a>
			</div>
			<div class="col-md-4">
				<a href="{{ URL::to('applyjobs') }}" class="btn btn-default btn-block"><i class="fa fa-suitcase"></i> Job <span>{{ $data2->count }}</span></a>
			</div>
			<div class="col-md-4">
				<a href="{{ URL::to('talentpoolindex') }}" class="btn btn-default btn-block"><i class="fa fa-sitemap"></i> Talent Pool <span>{{ $data3->count }}</span></a>
			</div>
		</div>
	</div>

@endsection