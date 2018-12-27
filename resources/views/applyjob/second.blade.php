@extends('master')
@section('content')
<div ng-controller="ApplySecond">
	<div class="container" >
		<div class="col-lg-12x">
			<div class="card card-default">
				<div class="card-header ">
					<div class="card-title"><span><a href="/applyjobs">Job openings</span></a> | <span> @{{ Applysecond.job_title }}</span><hr/>
					</div>
					<div class="card-controls">
						<ul>
							<li><a data-toggle="close" class="card-close" href="#"><i
								class="card-icon card-icon-close"></i></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="card-block">
					<h3>
						<h3><strong>@{{ Applysecond.job_title }}</strong></h3>
						<p><strong>Requirements</strong></p>
						<p><span>@{{ Applysecond.requirement | htmlToPlaintext }}</span></p>

						<p><strong>Description</strong></p>
						<p><span>@{{ Applysecond.description | htmlToPlaintext }}</span></p>

						<p><strong>Required Skills</strong></p>
						<p><span><a href="#" style="background-color: #48b0f7;color: white;"class="btn btn-tag   btn-tag-light btn-tag-rounded " ng-repeat=" taskk  in Applysecond.task.split(',')">@{{ taskk }}</span></a></p>
						

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<a href="/applicationform/@{{Applysecond.id}}" class="btn btn-success btn-block">APPLY JOB</a>
				</div>
				<div class="col-md-2"></div>
			</div>
		
		                      
	</div>



</div>


@endsection

@section('page-level-css')



@endsection

@section('page-level-scripts')

@endsection

@section('scripts')
<script type="text/javascript">

 var s =  {!! $records!!} 
    console.log(s);
app.controller('ApplySecond',function($scope,$http) {


$scope.Applysecond = s;
console.log($scope.Applysecond);
}
);
app.filter('htmlToPlaintext', function() {
    return function(text) {
      return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
    };
  }
  );
</script>
@endsection