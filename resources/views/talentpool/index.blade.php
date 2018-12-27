@extends('master')
@section('content')
<style type="text/css">
	.tal_name{
		margin-left: 25px;
		margin-top: 25px;
	}
	.tal_time{
		margin-left: 25px;
	}
	hr{
	  margin-top: 1rem;
	  margin-bottom: 1rem;
	  border: 0;
	  border-top: 1px solid rgba(0, 0, 0, 0.1);
	}
	.tal_count{
		margin-left: 25px;
	}
	.tal_edit{
		margin-top: 35px;
		margin-right: 25px;

	}
	.tal_edit1{
		padding-left: 5px;
		padding-right: 5px;

	}
</style>
	      
	<div class="container" ng-controller="talentpoolCntrl">
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<input type="search" class="form-control" placeholder="Search" ng-model="search">
				</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<div class="form-group">
					<a href="{{ URL::to('talentpool') }}" class="btn btn-success">New Talent Pool</a>
				</div>
			</div>
			<div class="col-md-2">
				<div class="col-md-12" style="float:right;">
			        <ul class="nav nav-tabs nav-tabs-fillup pull-right" data-init-reponsive-tabs="dropdownfx">
				       
				        <li class="nav-item">
				           <a href="#" class="active" data-toggle="tab" data-target="#slide1">&nbsp;&nbsp;<i class="fa fa-bars"></i></a>
				        </li>
				        <li class="nav-item">
				           <a href="#" data-toggle="tab" data-target="#slide2">&nbsp;&nbsp;<i class="fa fa-bars"></i></a>
				        </li>
				    </ul>
	            </div>
			</div>
		</div>

		<div class="row">
			<div class="tab-content" style="max-width: 100%">
	            <div class="tab-pane  active" id="slide1">
	                <div class="container">
				  		<div class="card bg-light text-dark" ng-repeat="data in record | filter : search">
						    <div class="card-body">
						    	<div class="row">
									<div class="col-md-10">
										<div class="row">
											<div class="col-md-12">
												<h3 class="tal_name">@{{ data.title }}</h3>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<p class="tal_time">Ago</p>
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="btn-group float-right tal_edit" role="group" aria-label="Basic example">
										    <a href="{{ URL::to('showTalent/') }}/@{{ data.id }}" value="@{{ data.id }}" type="button" class="btn btn-secondary tal_edit1"><i class="fa fa-cog"></i> Edit</a>
										    <div class="dropdown pull-right hidden-md-down">
									            <button class=" btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									             <i class="fa fa-chevron-down"></i>
									            </button>
									            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
									              <a href="{{ URL::to('duplicate/') }}/@{{ data.id }}" value="@{{ data.id }}" class="dropdown-item"><i class="fa fa-files-o"></i> Duplicate</a>
									              <div class="dropdown-divider"></div>
									              <a href="#" class="dropdown-item"><i class="fa fa-archive"></i> Archive</a>
									              <div class="dropdown-divider"></div>
									              <a href="Javascript:;" ng-click="destroyTalent($index)" class="dropdown-item" value="@{{ data.id }}"><i class="fa fa-archive"></i> Delete</a>
									            </div>
  											</div>
										</div>
									</div>
				                </div>
				                <hr>
				                <div class="row">
				                	<div class="col-md-6">
				                		<p class="tal_count"><span>23</span> Candidates</p>
				                	</div>
				                </div>
							</div>
					 	</div>
	                </div>
	            </div>
	            <div class="tab-pane slide-left" id="slide2">
				    <div class="row">
				        <div class="col-lg-12">
				            <div class="card card-transparent">
				                <div class="card-block">
				                    <table class="table table-striped">
				                        <thead>
				                            <tr>
				                                <th>Title</th>
				                                <th>Candidates</th>
				                                <th>Department</th>
				                                <th>Manage</th>
				                            </tr>
				                        </thead>
				                        <tbody>
				                            <tr ng-repeat="new in record | filter : search">
				                                <td>@{{ new.title }}</td>
				                                <td>0</td>
				                                <td>Marketing</td>
				                                <td><a href="{{ URL::to('showTalent/') }}/@{{ new.id }}">Edit</a></td>
				                            </tr>
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

@endsection

@section('scripts')
<script>

	app.controller('talentpoolCntrl', function($scope,$http){

		$scope.record = {!! json_encode($data) !!};
		// console.log($scope.record);
		$scope.form = {};
		// console.log($scope.form);

		$scope.saveData = function(){
			var s = {title:$scope.title,department:$scope.department};
			console.log(s);
			$http.post('addTalent',{title:$scope.title,department_id:$scope.department_id}).then(function success(e){
				console.log(e);
			},
			function error(error){
				console.log(error);
			});
		}

		$scope.destroyTalent = function(index){

			var s = $scope.record[index];
			console.log(s);
			$http.delete('deleteTalentpool',{params:s}).then(function success(e){
				console.log(e);
				$scope.record.splice(index, 1);

			},
			function error(error){
				console.log(error);
			});
		}
	})
</script>

@endsection