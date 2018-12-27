@extends('master')
<?php
use App\Country;
    ?>
@section('content')
<style>
.nav-tabs > li > a {
    display: block;
    border-radius: 0;
    padding: 5px 0px;
    margin-right: 0;
    font-family: 'Montserrat';
    font-weight: 500;
    letter-spacing: 0.06em;
    color: rgba(98, 98, 98, 0.7);
    font-size: 10.5px;
    min-width: 41px;
    text-transform: uppercase;
    border-color: transparent;
    position: relative;
    line-height: 1.7em;
}
.nav-tabs .nav-item {
    margin-bottom: 7px;
}

.card {
    -webkit-box-shadow: none;
    box-shadow: none;
    border-radius: 1px;
    -webkit-border-radius: 1px;
    -moz-border-radius: 1px;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
    position: relative;
    background-color: #e8e8e8;
    margin-bottom: 20px;
    width: 100%;
    COLOR: black;
}
</style>
	<div class="card card-transparent" ng-controller="JobList">
       <div class="row">
          <div class="col-md-12" style="float:right;">
		        <ul class="nav nav-tabs nav-tabs-fillup pull-right" data-init-reponsive-tabs="dropdownfx">
			       <li>
			        <button class="btn btn-complete btn-cons"><a href="/jobAdd"><i class="fa fa-plus" aria-hidden="true"></i> Add jobs</a></button>
			        </li>
			        <li class="nav-item">
			           <a href="#" class="active" data-toggle="tab" data-target="#slide1">&nbsp;&nbsp;<i class="fa fa-bars"></i></a>
			        </li>
			        <li class="nav-item">
			           <a href="#" data-toggle="tab" data-target="#slide2">&nbsp;&nbsp;<i class="fa fa-bars"></i></a>
			        </li>
			    </ul>
	       </div>
            <div class="tab-content" style="max-width: 100%">
	             <div class="tab-pane  active" id="slide1">
	                <div class="container">
	                {{-- 	@foreach($records as $record) --}}
				  		<div class="card bg-light text-dark" ng-repeat="data in JobCountry  track by $index">
						    <div class="card-body">
						    	<div class="row">
						    		<div class="col-lg-10 pl-4">
						    			<h4>@{{data.job_title}}   </h4>
						    		 	
						    		 	<p>
						    		 		@{{ data.data.job_department }},@{{ data.country }},@{{ data.state }}
						    		 		<span></span>
						    		    </p>

						    		 	<p>
						    		 		6 Candidates
						    		 	</p>
						   
						            </div>

						            <div class="col-lg-2 col-lg-2 d-flex align-items-center justify-content-center">
						              <button class="btn btn-default"><a href="/editJobs"><i class="fa fa-cog" aria-hidden="true"></i> edit</a></button>
					                </div>
				                </div>
							</div>
					 	</div>
					 	{{-- @endforeach --}}
				
	             </div>
	         </div>
	             <div class="tab-pane slide-left" id="slide2">
				    <div class="row">
				        <div class="col-lg-12">
				            <div class="card card-transparent">
				                <div class="card-header ">
				                    <div class="card-title">Pages Default Tables Style
				                    </div>
				                    <div class="pull-right">
				                        <div class="col-xs-12">
				                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
				                        </div>
				                    </div>
				                    <div class="clearfix"></div>
				                </div>
				                <div class="card-block">
				                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
				                        <thead>
				                            <tr>
				                                <th>Title</th>
				                                <th>Tags</th>
				                                <th>Department</th>
				                                <th>Location</th>
				                                <th>Candidates</th>
				                                <th>Status</th>
				                                
				                            </tr>
				                        </thead>
				                        <tbody>@foreach($records as $record)

				                            <tr>
				                                <td class="v-align-middle semi-bold">
				                                   {{ $record->job_title }}
				                                </td>
				                                <td class="v-align-middle">
				                                	<?php
				                                		$explode = explode(',', $record->task);
				                                	?>
				                                	@foreach($explode as $ex)
				                                		<a href="#" class="btn btn-tag">{{ $ex }}</a>
				                                	@endforeach
				                                </td>
				                                <td class="v-align-middle">
				                                   {{ $record->job_department }}
				                                </td>
				                                <td class="v-align-middle">
				                                	{{ $record->city }}, {{ $countryList[$record->country] }}
				                             	</td>
				                                <td class="v-align-middle">
				                                   
				                                </td>
				                                <td class="v-align-middle">
				                                    <a href="/editJobs" ng-click="EditJob(a)"><i class="fa fa-cog" aria-hidden="true"></i> Edit</a>
				                                </td>
				                            </tr>
				                            
				                            @endforeach
				                        </tbody>
				                    </table>
				                </div>
				            </div>
				        </div>
				    </div>
				 </div>
              
			</div>
		</div>
	</div>

            
                 
<!-- START card -->
            
@endsection

@section('page-level-css')

    <link href="assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
    
    <link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />

@endsection

@section('page-level-scripts')

   
   
   
   
    <script src="assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
   
   
   
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
   
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/js/datatables.js" type="text/javascript"></script>
@endsection

@section('scripts')

<script type="text/javascript">
app.controller('JobList',function($scope,$http) {
	
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