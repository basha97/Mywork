@extends('master')

@section('page-level-css')
    <link rel="stylesheet" type="text/css" href="assets/css/reports.css">
@endsection

@section('content')
	<div class="container" ng-controller="pipelineCntrl">
		<h1>Pipeline Details</h1>
		<div class="row">
			<div class="card card-borderless">
	            <ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
	                <li class="nav-item">
	                  <a class="active" data-toggle="tab" role="tab" data-target="#job" href="#">Job</a>
	                </li>
	                <li class="nav-item">
	                  <a href="#" data-toggle="tab" role="tab" data-target="#department">Department</a>
	                </li>
	                <li class="nav-item">
	                  <a href="#" data-toggle="tab" role="tab" data-target="#source">Source</a>
	                </li>
	                <li class="nav-item">
	                  <a href="#" data-toggle="tab" role="tab" data-target="#tag">Tag</a>
	                </li>
	                <li class="nav-item">
	                  <a href="#" data-toggle="tab" role="tab" data-target="#month">Month Created</a>
	                </li>
	            </ul>
				<div class="tab-content">
		        	<!---- 1st tab --->
		            <div class="tab-pane active" id="job">
		            	<div class="row justify-content-center">
	                        <div class="col-12 col-md-10 col-lg-8">
	                            <form class="">
	                                <div class="card-body row no-gutters align-items-center">
	                                    <div class="col">
	                                    	<span class="fa fa-align-center"></span>
	                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
	                                    </div>
	                                </div>
	                            </form>
	                        </div>
                    	</div>
		            	<br>
    					<br>
    					<div class="row">
    						<div class="table-responsive">
                      			<table class="table table-hover table-condensed table-detailed" id="detailedTable">
			                        <thead>
			                          <tr>
			                            <th>Job Title</th>
			                            <th>Candidates</th>
			                            <th>Proceeded</th>
			                            <th>Disqualified</th>
			                            <th>Intertview</th>
										<th>Offer</th>
										<th>Hire</th>
			                          </tr>
			                        </thead>
			                        <tbody>
				                        <tr ng-repeat="data in data.pipelinedetails">
					                        <td class="v-align-middle">@{{ data.job_title }}</td>
					                        <td class="v-align-middle">@{{ data.count }}</td>
					                        <td class="v-align-middle semi-bold">1</td>
					                        <td class="v-align-middle">0</td>
					                        <td class="v-align-middle">0</td>
					                        <td class="v-align-middle">0</td>
					                        <td class="v-align-middle">0</td>
				                        </tr>
			                        </tbody>
                      			</table>
                    		</div>
    					</div>
		            </div>
		            <!---- End of 1st tab --->
		            <!---- 2nd tab --->
		            <div class="tab-pane " id="department">
		                <div class="row justify-content-center">
	                        <div class="col-12 col-md-10 col-lg-8">
	                            <form class="">
	                                <div class="card-body row no-gutters align-items-center">
	                                    <div class="col">
	                                    	<span class="fa fa-align-center"></span>
	                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
	                                    </div>
	                                </div>
	                            </form>
	                        </div>
                    	</div>
		            	<br>
    					<div class="row">
    						<div class="table-responsive">
                      			<table class="table table-hover table-condensed table-detailed" id="detailedTable">
			                        <thead>
			                          <tr>
			                            <th>Department</th>
			                            <th>Candidates</th>
			                            <th>Proceeded</th>
			                            <th>Disqualified</th>
			                            <th>Intertview</th>
										<th>Offer</th>
										<th>Hire</th>
			                          </tr>
			                        </thead>
			                        <tbody>
				                        <tr ng-repeat="data in data.departmentCount">
					                        <td class="v-align-middle">@{{ data.name }}</td>
					                        <td class="v-align-middle">@{{ data.count }}</td>
					                        <td class="v-align-middle semi-bold">1</td>
					                        <td class="v-align-middle">0</td>
					                        <td class="v-align-middle">0</td>
					                        <td class="v-align-middle">0</td>
					                        <td class="v-align-middle">0</td>
				                        </tr>
			                        </tbody>
                      			</table>
                    		</div>
    					</div>
		            </div>
		            <!---- End Of 2nd tab --->
		            <!---- 3rd tab --->
		            <div class="tab-pane" id="source">
		                <div class="row">
		                    <div class="col">
		                    	<div class="card card-transparent ">
				                      <!-- Nav tabs -->
				                        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
					                        <li class="nav-item">
					                          <a href="#" class="active" data-toggle="tab" data-target="#tab-fillup1"><span>Completed</span></a>
					                        </li>
					                        <li class="nav-item">
					                          <a href="#" data-toggle="tab" data-target="#tab-fillup2"><span>Summary</span></a>
					                        </li>
					                        <li class="nav-item">
					                          <a href="#" data-toggle="tab" data-target="#tab-fillup3"><span>requested</span></a>
					                        </li>
				                        </ul>
				                      <!-- Tab panes -->
				                        <div class="tab-content">
					                        <div class="tab-pane active" id="tab-fillup1">
					                          <div class="row column-seperation">
					                            <div class="col-lg-6">
					                              <h3>
					                                  <span class="semi-bold">Sometimes</span> Small things in life means the most
					                              </h3>
					                            </div>
					                            <div class="col-lg-6">
					                              <h3 class="semi-bold">great tabs</h3>
					                              <p>Native boostrap tabs customized to Pages look and feel, simply changing class name you can change color as well as its animations</p>
					                            </div>
					                          </div>
					                        </div>
					                        <div class="tab-pane" id="tab-fillup2">
					                          <div class="row">
					                            <div class="col-lg-12">
					                              <h3>“ Nothing is
					                                <span class="semi-bold">impossible</span>, the word itself says 'I'm
					                                <span class="semi-bold">possible</span>'! ”
					                              </h3>
					                              <p>A style represents visual customizations on top of a layout. By editing a style, you can use Squarespace's visual interface to customize your...</p>
					                              <br>
					                              <p class="pull-right">
					                                <button type="button" class="btn btn-default btn-cons">White</button>
					                                <button type="button" class="btn btn-success btn-cons">Success</button>
					                              </p>
					                            </div>
					                          </div>
					                        </div>
					                        <div class="tab-pane" id="tab-fillup3">
					                          <div class="row">
					                            <div class="col-lg-12">
					                              <h3>Follow us &amp; get updated!</h3>
					                              <p>Instantly connect to what's most important to you. Follow your friends, experts, favorite celebrities, and breaking news.</p>
					                              <br>
					                            </div>
					                          </div>
					                        </div>
				                        </div>
				                </div>
								</div>
		                </div>
		            </div>
		            <!---- End of 3rd tab --->
		            <!---- 4th tab --->
		            <div class="tab-pane" id="tag">
		              <div class="container check">
		                	<div class="row">
		                		<i class="fa fa-cloud mail_font"></i>
		                	</div>
		                	<div class="row no_mail">
		                		<h4>No Files</h4>
		                	</div>
		                	<div class="row send_mail">
		                		<p>You can store candidate related documents here.</p>
		                	</div>
		                	<div class="row compose_mail">
		                		<button class="btn btn-complete"><i class="fa fa-upload"></i>
		                		 Upload File</button>
		                	</div>
		            	</div>
		            </div>
		            <!---- End of 4th tab --->
		            <!---- 5th tab --->
			        <div class="tab-pane" id="month">
		                <div class="row justify-content-center">
	                        <div class="col-12 col-md-10 col-lg-8">
	                            <form class="">
	                                <div class="card-body row no-gutters align-items-center">
	                                    <div class="col">
	                                    	<span class="fa fa-align-center"></span>
	                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
	                                    </div>
	                                </div>
	                            </form>
	                        </div>
                    	</div>
		            	<br>
    					<div class="row">
    						<div class="table-responsive">
                      			<table class="table table-hover table-condensed table-detailed" id="detailedTable">
			                        <thead>
			                          <tr>
			                            <th>Month Hired</th>
			                            <th>Candidates</th>
			                            <th>Proceeded</th>
			                            <th>Disqualified</th>
			                            <th>Intertview</th>
										<th>Offer</th>
										<th>Hire</th>
			                          </tr>
			                        </thead>
			                        <tbody>
				                        <tr>
					                        <td class="v-align-middle">Revolution Begins</td>
					                        <td class="v-align-middle">Active</td>
					                        <td class="v-align-middle semi-bold">40,000 USD</td>
					                        <td class="v-align-middle">April 13, 2014</td>
					                        <td class="v-align-middle">April 13, 2014</td>
					                        <td class="v-align-middle">April 13, 2014</td>
					                        <td class="v-align-middle">April 13, 2014</td>
				                        </tr>
				                        <tr>
			                             	<td class="v-align-middle">Revolution Begins</td>
					                        <td class="v-align-middle">Active</td>
					                        <td class="v-align-middle semi-bold">40,000 USD</td>
					                        <td class="v-align-middle">April 13, 2014</td>
					                        <td class="v-align-middle">April 13, 2014</td>
					                        <td class="v-align-middle">April 13, 2014</td>
					                        <td class="v-align-middle">April 13, 2014</td>
			                            </tr>
			                        </tbody>
                      			</table>
                    		</div>
    					</div>
			        </div>
		            <!---- end of 5th tab --->
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		app.controller('pipelineCntrl', function($scope,$http){
			$scope.data = {};
			$scope.data.pipelinedetails = {!! json_encode($pipelinedetails) !!};
			$scope.data.departmentCount = {!! json_encode($departmentCount) !!};
			$scope.data.job_application = {!! json_encode($job_application) !!};
		})
	</script>
@endsection