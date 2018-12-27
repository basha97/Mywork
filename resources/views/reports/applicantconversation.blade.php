@extends('master')

@section('page-level-css')
    <link rel="stylesheet" type="text/css" href="assets/css/reports.css">
@endsection

@section('content')
	<div class="container">
		<h1>Applicant Conversation</h1>
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
		            	<div class="row">
        					<div class="col-md-4">
						        <div class="widget-9 card no-border bg-primary no-margin widget-loader-bar">
						            <div class="full-height d-flex flex-column">
							            <div class="card-header ">
							                <div class="card-title text-black">
							                <span class="font-montserrat fs-11 all-caps">Views <i
							            class="fa fa-chevron-right"></i>
							                </span>
							                </div>
							                <div class="card-controls">
							                <ul>
							                  <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
												class="card-icon card-icon-refresh"></i></a>
							                  </li>
							                </ul>
							                </div>
							            </div>
							            <div class="p-l-20">
							                <h3 class="no-margin p-b-5 text-white">84</h3>
							            </div>
						            </div>
						        </div>
        					</div>

        					<div class="col-md-4">
						        <div class="widget-9 card no-border bg-primary no-margin widget-loader-bar">
						            <div class="full-height d-flex flex-column">
							            <div class="card-header ">
							                <div class="card-title text-black">
							                <span class="font-montserrat fs-11 all-caps">Applied <i
							            class="fa fa-chevron-right"></i>
							                </span>
							                </div>
							                <div class="card-controls">
							                <ul>
							                  <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
												class="card-icon card-icon-refresh"></i></a>
							                  </li>
							                </ul>
							                </div>
							            </div>
							            <div class="p-l-20">
							                <h3 class="no-margin p-b-5 text-white">84</h3> 
							            </div>   
						            </div>
						        </div>
        					</div>

        					<div class="col-md-4">
						        <div class="widget-9 card no-border bg-primary no-margin widget-loader-bar">
						            <div class="full-height d-flex flex-column">
							            <div class="card-header ">
							                <div class="card-title text-black">
							                <span class="font-montserrat fs-11 all-caps">Conversion <i
							            class="fa fa-chevron-right"></i>
							                </span>
							                </div>
							                <div class="card-controls">
							                <ul>
							                  <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
												class="card-icon card-icon-refresh"></i></a>
							                  </li>
							                </ul>
							                </div>
							            </div>
							            <div class="p-l-20">
							                <h3 class="no-margin p-b-5 text-white">84</h3>
							            </div>
						            </div>
						        </div>
        					</div>

    					</div>
    					<br>
    					<div class="row">
    						<div class="table-responsive">
                      			<table class="table table-hover table-condensed table-detailed" id="detailedTable">
			                        <thead>
			                          <tr>
			                            <th>Job Title</th>
			                            <th>Views</th>
			                            <th>Applied</th>
			                            <th>Conversion</th>
			                          </tr>
			                        </thead>
			                        <tbody>
				                        <tr>
					                        <td class="v-align-middle">Revolution Begins</td>
					                        <td class="v-align-middle">Active</td>
					                        <td class="v-align-middle semi-bold">40,000 USD</td>
					                        <td class="v-align-middle">April 13, 2014</td>
				                        </tr>
				                        <tr>
			                             	<td class="v-align-middle">Revolution Begins</td>
					                        <td class="v-align-middle">Active</td>
					                        <td class="v-align-middle semi-bold">40,000 USD</td>
					                        <td class="v-align-middle">April 13, 2014</td>
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
        					<div class="col-md-4">
						        <div class="widget-9 card no-border bg-primary no-margin widget-loader-bar">
						            <div class="full-height d-flex flex-column">
							            <div class="card-header ">
							                <div class="card-title text-black">
							                <span class="font-montserrat fs-11 all-caps">Views <i
							            class="fa fa-chevron-right"></i>
							                </span>
							                </div>
							                <div class="card-controls">
							                <ul>
							                  <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
												class="card-icon card-icon-refresh"></i></a>
							                  </li>
							                </ul>
							                </div>
							            </div>
							            <div class="p-l-20">
							                <h3 class="no-margin p-b-5 text-white">84</h3>
							            </div>
						            </div>
						        </div>
        					</div>

        					<div class="col-md-4">
						        <div class="widget-9 card no-border bg-primary no-margin widget-loader-bar">
						            <div class="full-height d-flex flex-column">
							            <div class="card-header ">
							                <div class="card-title text-black">
							                <span class="font-montserrat fs-11 all-caps">Applied <i
							            class="fa fa-chevron-right"></i>
							                </span>
							                </div>
							                <div class="card-controls">
							                <ul>
							                  <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
												class="card-icon card-icon-refresh"></i></a>
							                  </li>
							                </ul>
							                </div>
							            </div>
							            <div class="p-l-20">
							                <h3 class="no-margin p-b-5 text-white">84</h3> 
							            </div>   
						            </div>
						        </div>
        					</div>

        					<div class="col-md-4">
						        <div class="widget-9 card no-border bg-primary no-margin widget-loader-bar">
						            <div class="full-height d-flex flex-column">
							            <div class="card-header ">
							                <div class="card-title text-black">
							                <span class="font-montserrat fs-11 all-caps">Conversion <i
							            class="fa fa-chevron-right"></i>
							                </span>
							                </div>
							                <div class="card-controls">
							                <ul>
							                  <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
												class="card-icon card-icon-refresh"></i></a>
							                  </li>
							                </ul>
							                </div>
							            </div>
							            <div class="p-l-20">
							                <h3 class="no-margin p-b-5 text-white">84</h3>
							            </div>
						            </div>
						        </div>
        					</div>

    					</div>
    					<br>
    					<div class="row">
    						<div class="table-responsive">
                      			<table class="table table-hover table-condensed table-detailed" id="detailedTable">
			                        <thead>
			                          <tr>
			                            <th>Department</th>
			                            <th>Views</th>
			                            <th>Applied</th>
			                            <th>Conversion</th>
			                          </tr>
			                        </thead>
			                        <tbody>
				                        <tr>
					                        <td class="v-align-middle">Revolution Begins</td>
					                        <td class="v-align-middle">Active</td>
					                        <td class="v-align-middle semi-bold">40,000 USD</td>
					                        <td class="v-align-middle">April 13, 2014</td>
				                        </tr>
				                        <tr>
			                             	<td class="v-align-middle">Revolution Begins</td>
					                        <td class="v-align-middle">Active</td>
					                        <td class="v-align-middle semi-bold">40,000 USD</td>
					                        <td class="v-align-middle">April 13, 2014</td>
			                            </tr>
			                        </tbody>
                      			</table>
                    		</div>
    					</div>
		            </div>
		            <!---- End Of 2nd tab --->
		            <!---- 3rd tab --->
		            <div class="tab-pane" id="source">
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
        					<div class="col-md-4">
						        <div class="widget-9 card no-border bg-primary no-margin widget-loader-bar">
						            <div class="full-height d-flex flex-column">
							            <div class="card-header ">
							                <div class="card-title text-black">
							                <span class="font-montserrat fs-11 all-caps">Views <i
							            class="fa fa-chevron-right"></i>
							                </span>
							                </div>
							                <div class="card-controls">
							                <ul>
							                  <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
												class="card-icon card-icon-refresh"></i></a>
							                  </li>
							                </ul>
							                </div>
							            </div>
							            <div class="p-l-20">
							                <h3 class="no-margin p-b-5 text-white">84</h3>
							            </div>
						            </div>
						        </div>
        					</div>

        					<div class="col-md-4">
						        <div class="widget-9 card no-border bg-primary no-margin widget-loader-bar">
						            <div class="full-height d-flex flex-column">
							            <div class="card-header ">
							                <div class="card-title text-black">
							                <span class="font-montserrat fs-11 all-caps">Applied <i
							            class="fa fa-chevron-right"></i>
							                </span>
							                </div>
							                <div class="card-controls">
							                <ul>
							                  <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
												class="card-icon card-icon-refresh"></i></a>
							                  </li>
							                </ul>
							                </div>
							            </div>
							            <div class="p-l-20">
							                <h3 class="no-margin p-b-5 text-white">84</h3> 
							            </div>   
						            </div>
						        </div>
        					</div>

        					<div class="col-md-4">
						        <div class="widget-9 card no-border bg-primary no-margin widget-loader-bar">
						            <div class="full-height d-flex flex-column">
							            <div class="card-header ">
							                <div class="card-title text-black">
							                <span class="font-montserrat fs-11 all-caps">Conversion <i
							            class="fa fa-chevron-right"></i>
							                </span>
							                </div>
							                <div class="card-controls">
							                <ul>
							                  <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
												class="card-icon card-icon-refresh"></i></a>
							                  </li>
							                </ul>
							                </div>
							            </div>
							            <div class="p-l-20">
							                <h3 class="no-margin p-b-5 text-white">84</h3>
							            </div>
						            </div>
						        </div>
        					</div>

    					</div>
    					<br>
    					<div class="row">
    						<div class="table-responsive">
                      			<table class="table table-hover table-condensed table-detailed" id="detailedTable">
			                        <thead>
			                          <tr>
			                            <th>Source Name</th>
			                            <th>Views</th>
			                            <th>Applied</th>
			                            <th>Conversion</th>
			                          </tr>
			                        </thead>
			                        <tbody>
				                        <tr>
					                        <td class="v-align-middle">Revolution Begins</td>
					                        <td class="v-align-middle">Active</td>
					                        <td class="v-align-middle semi-bold">40,000 USD</td>
					                        <td class="v-align-middle">April 13, 2014</td>
				                        </tr>
				                        <tr>
			                             	<td class="v-align-middle">Revolution Begins</td>
					                        <td class="v-align-middle">Active</td>
					                        <td class="v-align-middle semi-bold">40,000 USD</td>
					                        <td class="v-align-middle">April 13, 2014</td>
			                            </tr>
			                        </tbody>
                      			</table>
                    		</div>
    					</div>
		            </div>
		            <!---- End of 3rd tab --->
		            <!---- 5th tab --->
			        <div class="tab-pane" id="month">
		                
			        </div>
		            <!---- end of 5th tab --->
				</div>
			</div>
		</div>
	</div>
@endsection