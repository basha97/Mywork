@extends('master')

@section('page-level-css')

	<link href="assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/adil.css">

@endsection

@section('content')

	<div class=" container-fluid   container-fixed-lg bg-white" ng-controller="candidateCtrl">
		{{-- Success Message --}}
		<div class="position pull-right" data-placement="bottom-right">
			<div class=" alert alert-success" ng-show="successMessagebool " role="alert" >
	            <button class="close" data-dismiss="alert"></button>
	            <strong>@{{successMessage }}</strong>
	        </div>
	    </div>
        {{-- <div class="position pull-right active" data-placement="top-right"> --}}
		{{-- Update Message --}}
 		<div class="position pull-right" data-placement="bottom-left">
			<div class=" alert alert-info" ng-show="updateMessagebool " role="alert" >
	            <button class="close" data-dismiss="alert"></button>
	            <strong>@{{updateMessage }}</strong>
	        </div>
	    </div>

	    <div class="position pull-right" data-placement="bottom-right">
			<div class=" alert alert-danger" ng-show="deleteMessagebool " role="alert" >
	            <button class="close" data-dismiss="alert"></button>
	            <strong>@{{deleteMessage }}</strong>
	        </div>
	    </div>
        

            
	    <div class="card card-transparent">
	        <div class="card-header ">
		        <div class="card-title">Table Title</div>
		        <div class="row">
                    <div class="col-md-6">
	                    <div class="btn-group ">
						    <div class="dropdown pull-right hidden-md-down ">
					            <button class=" btn btn-complete btn-cons btn-block" id="bt_grp" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					             <i data-toggle="tooltip" title="Add Candidates" class="fa fa-plus tip m-b-5 m-r-5"></i>  Add Candidates
					            </button>
					            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
					              <a href="#" class="dropdown-item"><i class="fa fa-chevron-right"></i> Upload CV & Resumes</a>
					              <div class="dropdown-divider"></div>
					              <a href="#" data-toggle="modal" data-target="#ManuallyModal" class="dropdown-item"><i class="fa fa fa-plus"></i> Add Manually</a>
					            </div>
							</div>
						</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="form-group">
                    		<input type="search" ng-model='searchTxt' class="form-control" placeholder="Search">
                    	</div>
                    </div>
		        </div>
			</div>
		</div>	
					
	    <div class="card-block">
	        <table class="table table-hover table-condensed table-detailed" id="tableWithSearch">
	            <thead>
		            <tr>
		            	<th><a href="javascript:;" ng-click="deleteData($index)">Delete</a></th>
			            <th>Name</th>
			            <th>Job</th>
			            <th>Stage</th>
			            <th>Date</th>
			            <th>Talent Pool</th>
			            {{-- <th><button class="btn btn-link"><i class="pg-trash"></i></button></th> --}}
			           
		            </tr>
	            </thead>
	            <tbody>
	            	<tr ng-repeat="data in records | filter : searchTxt" ng-if="!data.deleted">
	            		<td class="v-align-middle"><input type="checkbox" name="delete" ng-model="data.checked"></td>
		                <td class="v-align-middle ">
			              	<div class="row">
			              		<div class="col-md-4">
			              			<img ng-src="@{{ data.candidate['profile_path'] }}" id="tble_img" /> 
			               		</div>
			               		<div class="col-md-8">
			               			<a href="javascript:;" ng-click="showEditForm(data)"  data-toggle="modal" class="particularModal">@{{ data.candidate['name'] }}</a>
			               		</div>
			                </div>
		                </td>
		                <td class="v-align-middle"><p>@{{ data.job['job_title'] }}</p></td>
		                <td class="v-align-middle"><p>Applied</p></td>
		                <td class="v-align-middle"><p>@{{ data.ago }}</p></td>
		                <td class="v-align-middle"><p>Test</p></td>
		                
		            </tr>
	            </tbody>
	        </table>
	    </div>

	    <!-- Manually Modal -->
        <div class="modal fade ManuallyModal" id="ManuallyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
	    		<div class="modal-content">
	    			<form ng-submit="addCandidate()" role="form" id="can_form" method="post">
	    				{{ csrf_field() }}
		    			<div class="modal-header"><h1 id="mod_title">Add New candidate</h1></div>
		    			<div class="modal-body candidateModal">
		    				<div class="row">
		    					<div class="col-md-3">    					
		 							{{-- <img src="assets/img/profiles/avatar.jpg" id="in_img" />
		   							<input type="file" class="form-control" id="myfile" /> --}}
		   							{{-- fa fa-picture-o --}}
		   							<img src="assets/img/profiles/b.jpg" id="in_img" width="50" height="50" />
										<input type="file" class="form-control" id="profileimage" name="files" style="display:none"/>
										<input type="hidden" ng-model="profileimage_path" name="profileimage_path" id="profileimage_path" value="">
		    					</div>
		    					<div class="col-md-9">
		    						<input type="text" ng-model="name" class="form-control can_name" placeholder="name" name="name">
		    					</div>
		    				</div>

		    				<div><h4 id="job_head">JOBS & TALENT POOL</h4></div>

			    			<div class="upload-btn-wrapper">
								  <button class="btn"><i class="fa fa-plus"></i> Assign</button>
								  <input type="file" class="form-control" id="myfile" name="myfile" />
							</div>

		    				<hr>
						{{-- Tag Div in modal --}}
							<div>
								<div class="row">
									<div class="col-md-3">
										<h3>Tags</h3>
									</div>
									<div class="col-md-3">
										<button><i class="fa fa-plus"></i></button>
									</div>
								</div>
							</div>

							<hr>
						{{-- Email row --}}
		    				<div class="row">
		    					<div class="col-md-4">
		    						<span id="can_email"><i class="fa fa-envelope"></i> Email</span>
		    					</div>
			    				<div class="col-md-8">
			    					<div class="form-group" >
				                        <input type="email" name="email" ng-model="email" class="form-control" placeholder="email" required>
			                        </div>
			                        <div>
			                        	<button ng-click="addEmail()"><i class="fa fa-plus"></i>Add</button>
			                        </div>
			                    </div>    
		                	</div>

		                	<hr>
		                	{{-- Phone row --}}
		    				<div class="row">
		    					<div class="col-md-4">
		    						<span id="can_email"><i class="fa fa-phone"></i> Phone</span>
		    					</div>
			    				<div class="col-md-8">
			    					<div class="form-group" >
				                        <input type="text" name="number" ng-model="number" class="form-control" placeholder="number" required>
			                        </div>
			                        <div>
			                        	<button ng-click="addNumber()"><i class="fa fa-plus"></i>Add</button>
			                        </div>
			                    </div>    
		                	</div>

		                	<hr>
		                	{{-- Social row --}}
		    				<div class="row">
		    					<div class="col-md-4">
		    						<span id="can_email"><i class="fa fa-share-square-o"></i> Social</span>
		    					</div>
			    				<div class="col-md-8">
			    					<div class="md-form">
				                        <input type="text" id="materialRegisterFormFirstName" class="form-control">
				                        <label for="materialRegisterFormFirstName">First name</label>
			                        </div>
			                        <hr>
			                        <div>
			                        	<button><i class="fa fa-plus"></i>Add</button>
			                        </div>
			                    </div>    
		                	</div>

		                	<hr>
		                	{{-- Link row --}}
		    				<div class="row">
		    					<div class="col-md-4">
		    						<span id="can_email"><i class="fa fa-link"></i> Links</span>
		    					</div>
			    				<div class="col-md-8">
			    					<div class="form-group" ng-repeat="link in form.linkList">
				                        <input type="text" ng-model="link.link" class="form-control" placeholder="number" required>
			                        </div>
			                        <div>
			                        	<button ng-click="addLink()"><i class="fa fa-plus"></i>Add</button>
			                        </div>
			                    </div>    
		                	</div>

		                	<hr>
		                	{{-- Show less --}}
		                	<div class="row">
		                		<div class="col-md-4">
									<button id="show_less"><i class="fa fa-arrow-down"></i>Show Less</button>
		                		</div>
		                		<div class="col-md-8"></div>
		                	</div>

		                	<hr>
						{{-- Tag Div in modal --}}
							<div>
								<div class="row">
									<div class="col-md-3">
										<h3>Source</h3>
									</div>
									<div class="col-md-3">
										<button><i class="fa fa-plus"></i></button>
									</div>
								</div>
							</div>

							<hr>
							{{-- cv resume --}}
							<div class="row">
								<div class="col">
									<h4>CV Resume</h4>
								</div>
							</div>
							<div class="upload-btn-wrapper">
								  <button class="btn" id="in_resume"><i class="fa fa-plus"></i> Assign</button>
								  <input type="file" id="resume" class="resume"  style="display:none" />
								  <input type="hidden" ng-model="resume_path" name="resume_path" class="resume_path" id="resume_path">
							</div>
							<div class="row">
								<div class="col">
									<h4>Cover Letter</h4>
								</div>
							</div>
							<div class="row">
								<div>
									<textarea id="text_area"></textarea>
								</div>
							</div>
		    			</div>

		    			<div class="modal-footer" style="background-color: #e5ebef;">
		    				<a data-dismiss="modal" class="btn btn-default cancel_btn">Cancel</a>
		    				<a href="javascript:;" id="save" ng-click="saveData()"  class="btn btn-complete add_btn">Add</a> 
		    				{{-- <input type="submit" class="btn btn-complete add_btn" value="Save"> --}}
		    			</div>
	    			</form>
	    		</div>
    		</div>
        </div>

        <!---- Singe Candidates Module --->
        <div class="modal fade modal-fluid particularModal"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="particularModal" class="
        	SingeCandidateModal" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="row">
						<!---- First Section --->
						<div class="col col-md-7" >
							<div class="container">
								<!---- First row --->
								<div class="row">
									<div class="col col-md-2">
										<img ng-src="@{{ editForm.candidate['profile_path'] }}" id="single_img" />
									</div>
									<div class="col col-md-7">
										<h3 id="edit_name">@{{  editForm.candidate['name'] }}</h3>
										<p class="small no-margin pull-left sm-pull-reset">
											<i class="fa fa-plus"></i><span class="hint-text"> Applied Via </span>
											<span class="font-montserrat">Indeed</span>
											<span class="hint-text">@{{  editForm.ago }} </span>
										</p>
									</div>
									<div class="col col-md-3">
										<p>Follow</p>
									</div>
								</div>
								<!---- End Of First row --->
								<!---- Start of tab --->
						    	<div class="row">
						            <div class="card card-borderless">
					                    <ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
						                    <li class="nav-item">
						                      <a class="active" data-toggle="tab" role="tab" data-target="#tab_overview" href="#">Overview</a>
						                    </li>
						                    <li class="nav-item">
						                      <a href="#" data-toggle="tab" role="tab" data-target="#tab_email">Email</a>
						                    </li>
						                    <li class="nav-item">
						                      <a href="#" data-toggle="tab" role="tab" data-target="#tab_evaluation">Evaluation</a>
						                    </li>
						                    <li class="nav-item">
						                      <a href="#" data-toggle="tab" role="tab" data-target="#tab_file">File</a>
						                    </li>
						                    <li class="nav-item">
						                      <a href="#" data-toggle="tab" role="tab" data-target="#tab_activity">Activity</a>
						                    </li>
					                    </ul> 
							            <div class="tab-content">
							            	<!---- 1st tab --->
						                    <div class="tab-pane active" id="tab_overview">
						                    	<div class="row">
										    		<div class="col-md-3">
										    			<div class="row">
										    				<div class="col col-md-3">
										    					<span>Tag</span>		
										    				</div>
										    				<div class="col col-md-2">
										    					<button><i class="fa fa-plus"></i></button>
										    				</div>
										    			</div>
										    		</div>
												</div>
												<br>
						                        <div class="card bg-light text-dark">
												    <div class="card-header">
												    	<div class="row">
												    		<div class="col-lg-12 pb-3">
												    			<h4 class="d-inline">Information</h4>

												    			<div class="btn-group float-right" role="group" aria-label="Basic example">
																    <button ng-click="data.showInformation=true" class="btn btn-info btn-cons m-b-10" type="button"><i class="fa fa-paste"></i> <span class="bold">Edit</span>
                   													</button>
																    <button ng-click="data.showInformation=false" class="btn btn-danger btn-cons m-b-10" type="button"><i class="fa fa-warning"></i>
												                      <span class="bold">Cancel</span>
												                    </button>
																</div>
												    		</div>
												    	</div>
												    </div> 
												    <!-- Orginal -->
												    <div class="card-footer fade_box_org" ng-if="data.showInformation">
												    	<div class="row">
												    		<div class="col-md-3">
												    			<span><i class="fa fa-envelope"></i> Email</span>
												    		</div>
												    		<div class="col">
												    			<div class="row" >
												    				<div class="col-md-12 form-group">
												    					<input type="email" class="form-control" ng-model="editForm.candidate['email']">
												    				</div>
												    			</div>
												    		</div>
												    	</div>
												    	<hr>
												    	<div class="row">
												    		<div class="col-md-3">
												    			<span><i class="fa fa-phone"></i> phone</span>
												    		</div>
												    		<div class="col">
												    			<div class="row">
												    				<div class="col-md-12">
												    					<input type="text" class="form-control" name="" ng-model="editForm.candidate['number']">
												    				</div>
												    			</div>
												    							
												    		</div>
												    	</div>
												    	<hr>
												    	<div class="row">
												    		<div class="col-md-3"></div>
												    		<div>
												    			<input type="submit" class="btn btn-primary" value="save" ng-click="updateData()">
												    		</div>
												    		
												    	</div>
												    </div>
												</div>
												<br>
												<div class="row">
										    		<div class="col-md-3">
										    			<div class="row">
										    				<div class="col col-md-3">
										    					<span>Tag</span>		
										    				</div>
										    				<div class="col col-md-2">
										    					<button><i class="fa fa-plus"></i></button>
										    				</div>
										    			</div>
										    		</div>
												</div>
												<br>
												<div class="card">
													<div class="card-header">
														Recent Activities
													</div>	
												  	<div class="card-footer">
												    	This is some activities come here.
												  	</div>
												</div>
												<br>
												<div class="card">
													<div class="card-footer">
														<div class="row">
															<div class="col col-md-2">
																Cover Letter	
															</div>
															<div class="col col-md-8">
																
															</div>
															<div class="col col-md-2">
																<button>Add</button>
															</div>
														</div>
													</div>
												</div>
												<br>
												<div class="card">
													<div class="card-footer">
														<div class="row">
															<div class="col col-md-6">
																Cv / Resume	
															</div>
															<div class="col col-md-4">
																
															</div>
															<div class="col col-md-2">
																<button>Add</button>
															</div>
														</div>
													</div>
												</div>
						                    </div>
						                    <!---- End of 1st tab --->
						                    <!---- 2nd tab --->
						                    <div class="tab-pane " id="tab_email">
						                        <div class="container check">
						                        	<div class="row">
						                        		<i class="fa fa-envelope mail_font"></i>
						                        	</div>
						                        	<div class="row no_mail">
						                        		<h4>No Email yet</h4>
						                        	</div>
						                        	<div class="row send_mail">
						                        		<p>Send your first email to candidate</p>
						                        	</div>
						                        	<div class="row compose_mail">
						                        		<button class="btn btn-complete"><i class="fa fa-chevron-right"></i>
						                        		 Compose</button>
						                        	</div>
						                    	</div>
						                    </div>
						                    <!---- End Of 2nd tab --->
						                    <!---- 3rd tab --->
						                    <div class="tab-pane" id="tab_evaluation">
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
						                    <div class="tab-pane" id="tab_file">
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
									        <div class="tab-pane" id="tab_activity">
							                    <div class="container ">
											        <div class="container-fluid sm-p-l-5 bg-master-lighter ">
											            <div class="timeline-container top-circle">
											                <section class="timeline">
												                <div class="timeline-block">
												                    <div class="timeline-point success">
												                    	<i class="pg-map"></i>
												                    </div>
												                  <!-- timeline-point -->
													                  <div class="timeline-content">
													                    <div class="card social-card share full-width">
													                      <div class="circle" data-toggle="tooltip" title="Label" data-container="body">
													                      </div>
													                      <div class="card-header clearfix">
													                        <div class="user-pic">
													                          <img alt="Profile Image" width="33" height="33" data-src-retina="assets/img/profiles/8x.jpg" data-src="assets/img/profiles/8.jpg" src="assets/img/profiles/8x.jpg">
													                        </div>
													                        <h5>Jeff Curtis</h5>
													                        <h6>Shared a Tweet
													                              <span class="location semi-bold"><i class="fa fa-map-marker"></i> SF, California</span>
													                          </h6>
													                      </div>
													                      <div class="card-description">
													                        <p>What you think, you become. What you feel, you attract. What you imagine, you create - Buddha. <a href="#">#quote</a> </p>
													                        <div class="via">via Twitter</div>
													                      </div>
													                    </div>
													                    <div class="event-date">
													                      <h6 class="font-montserrat all-caps hint-text m-t-0">Apple Inc</h6>
													                      <small class="fs-12 hint-text">15 January 2015, 06:50 PM</small>
													                    </div>
													                  </div>
												                  <!-- timeline-content -->
												                </div>
												                <!-- timeline-block -->
												                <div class="timeline-block">
												                  <div class="timeline-point small">
												                  </div>
												                  <!-- timeline-point -->
												                  <div class="timeline-content">
												                    <div class="card  social-card share full-width">
												                      <div class="circle" data-toggle="tooltip" title="Label" data-container="body">
												                      </div>
												                      <div class="card-header clearfix">
												                        <div class="user-pic">
												                          <img alt="Profile Image" width="33" height="33" data-src-retina="assets/img/profiles/5x.jpg" data-src="assets/img/profiles/5.jpg" src="assets/img/profiles/5x.jpg">
												                        </div>
												                        <h5>Shannon Williams</h5>
												                        <h6>Shared a photo
												                              <span class="location semi-bold"><i class="fa fa-map-marker"></i> NYC, New York</span>
												                          </h6>
												                      </div>
												                      <div class="card-description">
												                        <p>Inspired by : good design is obvious, great design is transparent</p>
												                        <div class="via">via themeforest</div>
												                      </div>
												                      <div class="card-content">
												                        <ul class="buttons ">
												                          <li>
												                            <a href="#"><i class="fa fa-expand"></i>
												                                  </a>
												                          </li>
												                          <li>
												                            <a href="#"><i class="fa fa-heart-o"></i>
												                                  </a>
												                          </li>
												                        </ul>
												                        <img alt="Social post" src="assets/img/social-post-image.png">
												                      </div>
												                      <div class="card-footer clearfix">
												                        <div class="time">few seconds ago</div>
												                        <ul class="reactions">
												                          <li><a href="#">5,345 <i class="fa fa-comment-o"></i></a>
												                          </li>
												                          <li><a href="#">23K <i class="fa fa-heart-o"></i></a>
												                          </li>
												                        </ul>
												                      </div>
												                    </div>
												                    <div class="event-date">
												                      <small class="fs-12 hint-text">15 January 2015, 06:50 PM</small>
												                    </div>
												                  </div>
												                  <!-- timeline-content -->
												                </div>
												                <!-- timeline-block -->
												                <div class="timeline-block">
												                  <div class="timeline-point warning">
												                    <i class="pg-social"></i>
												                  </div>
												                  <!-- timeline-point -->
												                  <div class="timeline-content">
												                    <div class="card social-card share full-width ">
												                      <div class="card-header clearfix">
												                        <h5 class="text-warning-dark pull-left fs-12">Stock Market <i class="fa fa-circle text-warning-dark fs-11"></i></h5>
												                        <div class="pull-right small hint-text">
												                          5,345 <i class="fa fa-comment-o"></i>
												                        </div>
												                        <div class="clearfix"></div>
												                      </div>
												                      <div class="card-description">
												                        <h5 class='hint-text no-margin'>Apple Inc.</h5>
												                        <h5 class="small hint-text no-margin">NASDAQ: AAPL - Nov 13 8:37 AM ET</h5>
												                        <h3>111.25 <span class="text-warning-dark"><i class="fa fa-sort-up small text-warning-dark"></i> 0.15 (0.13%)</span></h3>
												                      </div>
												                      <div class="card-footer clearfix">
												                        <div class="pull-left">by <span class="text-warning-dark">John Smith</span></div>
												                        <div class="pull-right hint-text">
												                          Apr 23
												                        </div>
												                        <div class="clearfix"></div>
												                      </div>
												                    </div>
												                    <div class="event-date">
												                      <h6 class="font-montserrat all-caps hint-text m-t-0">Shared</h6>
												                      <small class="fs-12 hint-text">15 January 2015, 06:50 PM</small>
												                    </div>
												                  </div>
												                  <!-- timeline-content -->
												                </div>
												                <!-- timeline-block -->
												                <div class="timeline-block">
												                  <div class="timeline-point small">
												                  </div>
												                  <!-- timeline-point -->
												                  <div class="timeline-content">
												                    <div class="card social-card share full-width ">
												                      <div class="circle" data-toggle="tooltip" title="Label" data-container="body">
												                      </div>
												                      <div class="card-header clearfix">
												                        <div class="user-pic">
												                          <img alt="Profile Image" width="33" height="33" data-src-retina="assets/img/profiles/6x.jpg" data-src="assets/img/profiles/6.jpg" src="assets/img/profiles/6x.jpg">
												                        </div>
												                        <h5>Nathaniel Hamilton</h5>
												                        <h6>Shared a Tweet
												                              <span class="location semi-bold"><i class="icon-map"></i>  NYC, New York</span>
												                          </h6>
												                      </div>
												                      <div class="card-description">
												                        <p>Testing can show the presense of bugs, but not their absence.</p>
												                        <div class="via">via Twitter</div>
												                      </div>
												                    </div>
												                    <div class="event-date">
												                      <small class="fs-12 hint-text">15 January 2015, 06:50 PM</small>
												                    </div>
												                  </div>
												                  <!-- timeline-content -->
												                </div>
												                <!-- timeline-block -->
												                <div class="timeline-block">
												                  <div class="timeline-point small">
												                  </div>
												                  <!-- timeline-point -->
												                  <div class="timeline-content">
												                    <div class="card social-card share full-width">
												                      <div class="circle" data-toggle="tooltip" title="Label" data-container="body">
												                      </div>
												                      <div class="card-header clearfix">
												                        <div class="user-pic">
												                          <img alt="Profile Image" width="33" height="33" data-src-retina="assets/img/profiles/4x.jpg" data-src="assets/img/profiles/4.jpg" src="assets/img/profiles/4x.jpg">
												                        </div>
												                        <h5>Andy Young</h5>
												                        <h6>Updated his status
												                              <span class="location semi-bold"><i class="icon-map"></i> NYC, New York</span>
												                          </h6>
												                      </div>
												                      <div class="card-description">
												                        <p>What a lovely day! I think I should go and play outside.</p>
												                      </div>
												                    </div>
												                    <div class="event-date">
												                      <small class="fs-12 hint-text">15 January 2015, 06:50 PM</small>
												                    </div>
												                  </div>
												                  <!-- timeline-content -->
												                </div>
											                <!-- timeline-block -->
											                </section>
											              <!-- timeline -->
											            </div>
											            <!-- -->
											        </div>
											          <!-- END CONTAINER FLUID -->
											    </div>
									        </div>
						                    <!---- end of 5th tab --->
							            </div>
						            </div>
						        </div>
                                   <!---- End of  tab --->
     						</div><!---- End of Container --->
						</div><!---- End of Col 7 --->
						<!----End of First Section --->
						<!---- Second Section --->
						<div class="col col-md-5 ">
							<div class="container">
								<div class="d-flex flex-row ">
									<div class="p-4">
										<span><i class="fa fa-thumbs-up"></i> Not Evaluated</span>
									</div>
									<div class="p-4">
										<i class="fa fa-envelope fa_mail"></i>
									</div>
									<div class="p-4">
										<i class="fa fa-calendar-plus-o fa_cal"></i>
									</div>
									<div class="p-4">
										<i class="fa fa-share-alt fa_share"></i>
									</div>
									<div class="p-3">
									    <div class="dropdown pull-right hidden-md-down">
								            <button class=" btn btn-primary btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								            more  
								            </button>
								            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
								              <a href="#" data-toggle="modal" data-target="#assignMore" class="dropdown-item"><i class="fa fa-plus"></i> Assign</a>
								              <div class="dropdown-divider"></div>
								              <a href="#" class="dropdown-item"><i class="fa fa fa-clone"></i> Copy to company</a>
								              <div class="dropdown-divider"></div>
								              <a href="#" class="dropdown-item"><i class="fa fa-trash"></i> Delete Candidate </a>
								            </div>
  										</div>
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col col-md-6">
										<h3><a href="{{ URL::to('sortable') }}/@{{ editForm.job['id'] }}" value="@{{ editForm.job['id'] }}">@{{ editForm.job['job_title'] }}</a></h3>
									</div>
									<div class="col col-md-2">
										<div class="btn-group">
										    <div class="dropdown pull-right hidden-md-down">
									            <button class=" btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									             <i class="fa fa-arrow-right"></i>
									            </button>
									            <div class="dropdown-menu dropdown-menu-right profile-dropdown"  role="menu">
									              <a href="#" class="dropdown-item" ng-repeat="pipeline in pipelines"><i class="fa fa-chevron-left"></i> @{{ pipeline.pipe_name }}</a>
									              <div class="dropdown-divider"></div>
									              
									            </div>
  											</div>
										    <button type="button" class="btn btn-default"><i class="fa fa-ban"></i></button>
										    <div class="dropdown pull-right hidden-md-down">
									            <button class=" btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									             <i class="fa fa-chevron-down"></i>
									            </button>
									            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
									              <a href="#" class="dropdown-item"><i class="fa fa-chevron-right"></i> Go to job</a>
									              <div class="dropdown-divider"></div>
									              <a href="#" class="dropdown-item"><i class="fa fa fa-minus"></i> Remove Job</a>
									            </div>
  											</div>
										</div>
									</div>
								</div>
								<hr>

								<div class="row">
									<div class="col-lg-2">
										<button class="btn btn-default" data-toggle="modal" data-target="#assignModal"><span><i class="fa fa-plus"></i> Assign</span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
		</div>
			
			{{--  Assign Modal		 --}}
		<div class="modal fade" id="assignModal">
        	<div class="modal-dialog modal-dialog-centered">
	      		<div class="modal-content">
	      
	        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">Assign Jobs/Talent Pools to candidate</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        <br>
		        
		        <!-- Modal body -->
			        <div class="modal-body">
				        <div class="container">
				          	<div class="row">
				          		<div class="col-md-12">
					          		<div class="form-group">
						          		<input type="search" class="form-control" ng-model="searchTxt" placeholder="Search">
						          	</div>
				          		</div>
				          	</div>
				          	<div class="row">
				          		<div class="col-md-12">
				          			<label>Jobs</label>
				          			<div class="form-group" ng-repeat="department in departments | filter : searchTxt">
										<div class="checkbox check-primary checkbox-circle">
					                        <input type="checkbox" checked="checked" ng-model="department.id" id="department-@{{ $index }}">
					                        <label for="department-@{{ $index }}">@{{ department.name }}</label>
					                    </div>
									</div>
				          		</div>
				          	</div>
				          	<div class="row">
				          		<div class="col-md-12">
									<label>Talent Pool</label>
				          			<div class="form-group" ng-repeat="talntpoolData in talentpool | filter : searchTxt">
										<div class="checkbox check-primary checkbox-circle">
					                        <input type="checkbox" checked="checked" ng-model="talntpoolData.id" id="talntpoolData-@{{ $index }}">
					                        <label for="talntpoolData-@{{ $index }}">@{{ talntpoolData.title }}</label>
					                    </div>
									</div>
				          		</div>
				          	</div>
				        </div>
			        </div>
		        
		        <!-- Modal footer -->
			        <div class="modal-footer">
			          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        </div>
	        
	            </div>
            </div>
        </div>

        <div class="modal fade" id="assignMore">
        	<div class="modal-dialog modal-dialog-centered">
	      		<div class="modal-content">
	      
	        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">Assign Jobs/Talent Pools to candidate</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        <br>
		        
		        <!-- Modal body -->
			        <div class="modal-body">
				        <div class="container">
				          	<div class="row">
				          		<div class="col-md-12">
					          		<div class="form-group">
						          		<input type="search" class="form-control" ng-model="searchTxt" placeholder="Search">
						          	</div>
				          		</div>
				          	</div>
				          	<div class="row">
				          		<div class="col-md-12">
				          			<label>Jobs</label>
				          			<div class="form-group" ng-repeat="department in departments | filter : searchTxt">
										<div class="checkbox check-primary checkbox-circle">
					                        <input type="checkbox" checked="checked" ng-model="department.id" id="department-@{{ $index }}">
					                        <label for="department-@{{ $index }}">@{{ department.name }}</label>
					                    </div>
									</div>
				          		</div>
				          	</div>
				          	<div class="row">
				          		<div class="col-md-12">
									<label>Talent Pool</label>
				          			<div class="form-group" ng-repeat="talntpoolData in talentpool | filter : searchTxt">
										<div class="checkbox check-primary checkbox-circle">
					                        <input type="checkbox" checked="checked" ng-model="talntpoolData.id" id="talntpoolData-@{{ $index }}">
					                        <label for="talntpoolData-@{{ $index }}">@{{ talntpoolData.title }}</label>
					                    </div>
									</div>
				          		</div>
				          	</div>
				        </div>
			        </div>
		        
		        <!-- Modal footer -->
			        <div class="modal-footer">
			          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        </div>
	        
	            </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ URL::asset('assets/js/fileupload.js') }}"></script>
<script>
$(document).ready(function() {
});

app.controller('candidateCtrl', function($scope,$http,$timeout) {

	$('#in_img').click(function(){
		$('#profileimage').click()
	 })
		$('#in_resume').click(function(){
			$('.resume').click()
	});

	//start file upload1
	$('#profileimage').fileupload({
	    url: '/fileupload_ajax',
	    dataType: 'json',
	    formData: { path:'' },
	    done: function (e, data) {
	        var baseurl = document.location.origin;
	        var src = baseurl+'/'+data.result.files[0].url;
	        $scope.form.profilepic = src;
	        console.log($scope.form);
	        $('#profileimage_path').val(src);
	        $('#in_img').attr('src',src);
	    },
	    progressall: function (e, data) {
	    },error: function(e){
	      console.log(e.responseText);
	    }
	}).prop('disabled', !$.support.fileInput)
	.parent().addClass($.support.fileInput ? undefined : 'disabled');

	//start file upload2
	$('#resume').fileupload({
	    url: '/fileupload_ajax',
	    dataType: 'json',
	    formData: { path:'' },
	    done: function (e, data) {
	        var baseurl = document.location.origin;
	        var src = baseurl+'/'+data.result.files[0].url;
	        $scope.form.resumeSrc = src;
	        console.log($scope.form);
	        $('#resume_path').val(src);
	      //  $('#in_img').attr('src',src);
	    },
	    progressall: function (e, data) {
	    },error: function(e){
	      console.log(e.responseText);
	    }
	}).prop('disabled', !$.support.fileInput)
	.parent().addClass($.support.fileInput ? undefined : 'disabled');

	//Angular Definition
	$scope.records = {!! json_encode($userData) !!};
	

	$scope.departments = {!! json_encode($departmentData) !!}; 
	

	$scope.talentpool = {!! json_encode($talentpoolData) !!};
	

	$scope.pipelines = {!! json_encode($pipeLine) !!};
	console.log($scope.pipelines);

	$scope.data = {};
	$scope.data.information = false;
	$scope.name = '';
	$scope.email = '';
	$scope.number = '';
	$scope.form = {};
	$scope.editForm = {};
	
	//Adding Dynamic Email Fields
	$scope.form.emailList = [{
		email: ''
	}];
	$scope.addEmail = function() {
		$scope.form.emailList.push({
			email: ''
		});
	}

	//Adding Dynamic Numbers Fields


	$scope.form.numberList = [{
		number:''
	}];
	$scope.addNumber = function(){
		$scope.form.numberList.push({
			number:''
		})
	}
	
	//Adding Data In Angular
	$scope.saveData = function () {
		console.log($scope.form)
		var data = {name:$scope.name, number:$scope.form.numberList, email:$scope.form.emailList ,profile_path:$scope.form.profilepic,can_resume:$scope.form.resumeSrc};
		
		console.log(data);
		$http.post('addCandidate', {name:$scope.name, number:$scope.number, email:$scope.email ,profile_path:$scope.form.profilepic,can_resume:$scope.form.resumeSrc}).then(function success(e){
			console.log(e.data);
			$('.ManuallyModal').modal('hide');
			$scope.successMessage = "Candidate Added Successfully";
        	$scope.successMessagebool = true;
        		$timeout(function () {
            		$scope.successMessagebool = false;
        		}, 6000);
		},
		function error(error){
			console.log(error);
		});
	}

	//Retriving Data 
	$scope.showEditForm = function(data) {
		$("#particularModal").modal('show');
		// console.log(data);
		// console.log(data.candidate['name']);
		var dt = data ;
		$http.get('candidateTest',{params:dt}).then(function success(e){
			console.log(e.data.data);
			$scope.editForm = e.data.data;
		},
		function error(error){
			console.log(error);
		});
	};

	//Updating Data
	$scope.updateData = function(){
		console.log($scope.editForm);
		var data = $scope.editForm;
		$http.post('updateCan',{data:$scope.editForm}).then(function success(e){
			console.log(e);
			$('.particularModal').modal('hide');
			$scope.updateMessage = "Candidates Updated Successfully";
        	$scope.updateMessagebool = true;
        		$timeout(function () {
            		$scope.updateMessagebool = false;
        		}, 6000);
		},
		function error(error){
			console.log(error);
		});
	}

	//Delete Data
	$scope.deleteData = function(index){
		
		var s = $scope.records.filter(function(e){ 
			if(e.checked == true){
				return e;					
			}
		}).map(function(obj) {
    	  return obj.id;
  		 });

		

		$http.delete('destroyCan',{params:s}).then(function success(e){
			console.log(e);
			if(e.data.success){

				$scope.records.forEach(function(v, i) {
					if(v.checked)
						v.deleted = true;
						$scope.deleteMessage = "Candidates Deleted Successfully";
        				$scope.deleteMessagebool = true;
        					$timeout(function () {
            					$scope.updateMessagebool = false;
        			}, 1000);
				});
			}
		},
		function error(error){
			console.log(error);
		});
	}
})

</script>
@endsection
      

   