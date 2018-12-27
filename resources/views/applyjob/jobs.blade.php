@extends('master')
@section('content')
<div ng-controller="applyJob">
	<div class="container" >
			<div class="row">
				<div class="col-md-12">
					<h2 style="text-align:center">Join Us</h2>
					<p style="text-align:center">current Opening</p><hr>

					<div class="container">
	              		<div class="card bg-light text-dark" ng-repeat="data in JobCountry  track by $index ">
						    <div class="card-body">
						    	<div class="row">
						    		<div class="col-lg-10 pl-4">
						    			<h4><strong>@{{data.job_title}}</strong> </h4>
						    		 	
						    		 	<p>
						    		 		<span class="btn btn-tag"style="background-color: gray;color: white;">@{{data.job_title}},</span> @{{ data.city }},@{{ data.country }}
						    		 		
						    		    </p>

						    		 	
						            </div>

						            <div class="col-lg-2 col-lg-2 d-flex align-items-center justify-content-center">
						              <button class="btn btn-default" ><a href="/applyJobSecond/@{{ data.id }}"><i class="fa fa-cog" aria-hidden="true"></i> view job</a></button>
					                </div>
				                </div>
							</div>
					 	</div>
					 	{{-- @endforeach --}}
				
	             </div>
				</div>
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
app.controller('applyJob',function($scope,$http) {
	
	$http.get('Joblist').then(function(f){
	$scope.jobs = f.data;
	$scope.JobCountry = f.data.JobDate;
    $scope.Jobdata = f.data.JobDate;
	 console.log($scope.Jobdata); 
	 console.log($scope.JobCountry);
	 console.log($scope.jobs);

 }
 );

}
);

	</script>
@endsection