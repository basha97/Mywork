
@extends('master')
<?php
use App\Country;
?>
@section('content')
<style type="text/css">

.jumbotron {
    position: relative;
    overflow: inherit !important; 
    display: block;
    padding: 0;
    background-color: #f0f0f0;
}

.dropdown, .dropup {
    position: relative;
    border: 2px solid #ffffff;
    padding: 7px;
}
.form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}

/**
* The dnd-list should always have a min-height,
* otherwise you can't drop to it once it's empty
*/
.simpleDemo ul[dnd-list] {
    min-height: 42px;
    padding-left: 0px;
}

/**
* The dndDraggingSource class will be applied to
* the source element of a drag operation. It makes
* sense to hide it to give the user the feeling
* that he's actually moving it.
*/
.simpleDemo ul[dnd-list] .dndDraggingSource {
    display: none;
}

/**
* An element with .dndPlaceholder class will be
* added to the dnd-list while the user is dragging
* over it.
*/
.simpleDemo ul[dnd-list] .dndPlaceholder {
    background-color: #ddd;
    display: block;
    min-height: 42px;
}

.simpleDemo ul[dnd-list] li {
    background-color: #fff;
    border: 1px solid #ddd;
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    display: block;
    padding: 10px 15px;
    margin-bottom: -1px;
}

/**
* Show selected elements in green
*/
.simpleDemo ul[dnd-list] li.selected {
    background-color: #dff0d8;
    color: #3c763d;
}


.section {
    margin-top: 30px;
    margin-bottom: 30px;
}

.list {
    /* border: 1px solid #000; */
    /* border-radius: 15px; */
    list-style: none outside none;
    /* margin: 10px; */
    padding: 10px;
    width:500px;
}

.item {
    padding: 5px 10px;
    margin: 5px 0;
    /* border: 2px solid #444; */
    border-radius: 5px;
    background-color: #ececec;
    font-size: 1.1em;
    font-weight: bold;
    text-align: left;
    cursor: move;
}


/***  Extra ***/

.logList {
    min-height: 200px;
    border: 5px solid #000;
    border-radius: 15px;
}
</style>
<!-- START card -->
<div ng-controller="saifCtrl">
    <div class="card card-transparent">
        <div class="card-block">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-transparent ">

                        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
                            <li class="nav-item">
                                <a href="javascript:;" id="slide1Div" class="active"><i class="fa fa-pencil"></i> Job posting</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" id="slide2Div"><i class="fa fa-clipboard"></i> Application form</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" id="slide3Div"><i class="fa fa-bars"></i> Workflow</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" id="slide4Div"><i class="fa fa-users"></i> Recruiting team</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane slide-left active" id="slide1">
                                <form>

                                    <div class="row">
                                        <div class="col">
                                            <label>Job Title *</label>
                                            <input type="text" class="form-control" ng-model="Jobs.job_title" placeholder="manager"  required>
                                        </div>
                                        <div class="col">
                                            <label>Department </label>
                                            <select  ng-model="Jobs.job_department" name="jobCountryName"   class="form-control">
                                                <option ng-repeat = "k in w" value='@{{ k.id }}'>@{{ k.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br/>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label >Country *</label>
                                                <select data-init-plugin="select2" ng-model="Jobs.country" name="CountryName"  class="inputAdd" ng-change="getcountrystates()">
                                                    <option value="">Select</option>
                                                    @foreach(Country::countrySelect() as $key => $value)
                                                    <option   value={{ $key }} > {{$value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group ">
                                                <label>State/Region *</label>
                                                <select class="full-width" data-init-plugin="select2" ng-model="Jobs.state" id='statename'>
                                                    <option value="">Select</option>
                                                    <option ng-repeat="option in statenames" value="@{{option.id}}">@{{option.name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>city *</label>
                                            <input type="text" class="form-control" ng-model="Jobs.city" placeholder="Amsterdam" required>
                                        </div>
                                        <div class="col">
                                            <label>Zip Code *</label>
                                            <input type="text" class="form-control" ng-model="Jobs.codes" placeholder="XX-XXX" required>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-block">
                                                <div class="form-group form-group-default required ">
                                                    <label>Tags +</label>
                                                    <input class="tagsinput custom-tag-input" ng-model="Jobs.task" name="task" type="text"  value="inspiration" />
                                                </div>
                                            </div>

                                            <!-- END card -->
                                        </div>
                                    </div>

                                    <section>
                                        <label>Job Description</label>
                                        <textarea ck-editor cols="80" rows="10" ng-model="Jobs.description" id="ckeExample">
                                        </textarea>
                                    </section>
                                    <br/>

                                    <section>
                                        <label>Job Requirement</label>
                                        <textarea ck-editor cols="80" rows="10" ng-model="Jobs.requirement" id="cke">
                                        </textarea>
                                    </section>

                                    <section>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h4> Job Details <span class="label label-default">Optional</span></h4>
                                                <p>Please fill out these fields if you want to use the free job boards.</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label>Employment type</label>
                                                    <select data-init-plugin="select2" ng-model="Jobs.employement_type">
                                                        <option value="None">None</option>
                                                        <option value="Part-time">Part-time</option>
                                                        <option value="Full-time">Full-time</option>
                                                        <option value="Temporary">Temporary</option>
                                                        <option value="Contract">Contract</option>
                                                        <option value="Internship">Internship</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label>Category</label>
                                                    <select data-init-plugin="select2" ng-model="Jobs.category">
                                                        <option value="None">None</option>
                                                        <option value="Accounting">Accounting</option>
                                                        <option value="Administrative">Administrative</option>
                                                        <option value="Agriculture">Agriculture</option>
                                                        <option value="Architectural">Architectural </option>
                                                        <option value="Automotive">Automotive</option>
                                                        <option value="Construction">Construction</option>
                                                        <option value="Customer-Service">Customer Service</option>
                                                        <option value="technical">Technical</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label>Hours Per week </label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="number" class="form-control" ng-model="Jobs.hr_week" placeholder="Amsterdam" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" class="form-control" placeholder="Amsterdam" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Required Education</label><br/>
                                                <select data-init-plugin="select2" ng-model="Jobs.education">
                                                    <option value="None">None</option>
                                                    <option value="High-school-coursework">High school coursework</option>
                                                    <option value="High-school-or-equivalent">High school or equivalent</option>
                                                    <option value="Certification">Certification</option>
                                                    <option value="Vocational">Vocational</option>
                                                    <option value="Bachelor's-degree">Bachelor's degree</option>
                                                    <option value="Master's degree">Master's degree</option>
                                                    <option value="Professional">Professional</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Required Experiences</label><br/>
                                                <select data-init-plugin="select2" ng-model="Jobs.experiences">
                                                    <option value="Student-(High school)">Student (High school)</option>
                                                    <option value="Student-(College)">Student (College)</option>
                                                    <option value="Entry-level">Entry level</option>
                                                    <option value="Mid-level">Mid level</option>
                                                    <option value="Experienced">Experienced</option>
                                                    <option value="Senior manager/Supervisor">Senior manager / Supervisor</option>
                                                    <option value="Executive">Executive</option>
                                                    <option value="Senior-executive">Senior executive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-md-4" id="displayErrorMessages" style="display: none;">
                                    </div>
                                    
                                </div>
                                <section>
                                        <!--<button class="btn btn-complete btn-cons pull-right">Complete</button>-->
                                        <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                                            <ul class="pager wizard no-style slide1Buttons">
                                                <li class="next finish" style="display: list-item;">
                                                    <button class="btn btn-primary btn-cons pull-right" type="button" ng-click="jobSave()">
                                                        <span>Save & Go Next</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                </section>
                                <!-- START card -->
                            </div>

                            <div class="tab-pane slide-left" id="slide2">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dropdown pull-right hidden-md-down show">
                                            <button class=" btn btn-primary btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                more  
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                                                <a href="#" class="dropdown-item"><i class="fa fa-plus"></i> Assign</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"><i class="fa fa fa-clone"></i> Copy to company</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"><i class="fa fa-trash"></i> Delete Candidate </a>
                                            </div>
                                        </div>
                                        <h4>Screening questions</h4>
                                        <p>Candidates’ answers will be imported to their profiles to help you screen and select faster.</p>
                                        <div class="jumbotron" data-pages="parallax">
                                            <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                                               
                                                    <div class="form-group">
                                                        <label for="exampleSelect1">Phone</label>
                                                        <select class="form-control" id="exampleSelect1" ng-model="Jobapp.phone">
                                                          <option value="Required">Required</option>
                                                          <option value="optional">optional</option>
                                                          <option value="hidden">hidden</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleSelect1">Photo</label>
                                                        <select class="form-control" id="exampleSelect1" ng-model="Jobapp.photo">
                                                          <option value="Required">Required</option>
                                                          <option value="optional">optional</option>
                                                          <option value="hidden">hidden</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleSelect1">Cv/resume</label>
                                                        <select class="form-control" id="exampleSelect1" ng-model="Jobapp.cv">
                                                          <option value="Required">Required</option>
                                                          <option value="optional">optional</option>
                                                          <option value="hidden">hidden</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleSelect1">cover Letter</label>
                                                        <select class="form-control" id="exampleSelect1" ng-model="Jobapp.cover">
                                                          <option value="Required">Required</option>
                                                          <option value="optional">optional</option>
                                                          <option value="hidden">hidden</option>
                                                        </select>
                                                      </div>

                                                    <!-- END BREADCRUMB -->
                                               
                                            </div>
                                        </div>

                                        <section>
                                            <!--<button class="btn btn-complete btn-cons pull-right">Complete</button>-->
                                            <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                                                <ul class="pager wizard no-style">
                                                    <li class="next finish" style="display: list-item;">
                                                        <button class="btn btn-primary btn-cons pull-right" type="button" ng-click="Jobapp()">
                                                            <span>Save & Go Next</span>
                                                        </button>
                                                    </li>
                                                    <li class="previous">
                                                        <button class="btn btn-default btn-cons pull-right btn-animated from-left fa fa-truck" type="button" ng-click="activetab('slide1')">
                                                            <span>Previous</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane slide-left" id="slide4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <section>
                                            <p><strong>Team members</strong></p>
                                            <p>Assign team members to work on this Job.</p><br/><br/>
                                            <div class="row>">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                                    Add existing Team member
                                                </button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                                                    Add New Team member
                                                </button>
                                            </div>
                                        </section>
                                        <section>
                                            <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                                                <ul class="pager wizard no-style">
                                                    <li class="previous">
                                                        <button class="btn btn-default btn-cons pull-right btn-animated from-left fa fa-truck" type="button" ng-click="activetab('slide3')">
                                                            <span>Previous</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane slide-left" id="slide3">
                                <div class=" container-fluid   container-fixed-lg">
                                    <div class="d-flex justify-content-center bg-secondary mb-3" style="border-style: dashed;opacity: 0.4;padding: 5px;">
                                        <div class="p-2 ">
                                            <button type="button" class="btn btn-success" ng-click="data.showInformation=true"><i class="fa fa-plus" aria-hidden="true"></i> Edit pipeline</button>

                                        </div>
                                    </div>
                                    <div class="pipe" ng-if="data.showInformation">
                                       <div class="col-sm-offset-2 col-sm-4">
                                            <ul ui-sortable ng-model="datas" class="list">
                                                <li ng-repeat="data in datas track by $index" class="item"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;@{{ data.pipe_name }}</li>
                                            </ul>
                                        </div>
                                        <div class="row pull-right">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-secondary" ng-click="data.showInformation=false">Cancel</button>
                                                <a href="javascript:;"  class="btn btn-success" ng-click="getsortable()">save</a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <section>
                                            <h6>Default hiring pipeline for Jobs</h6>
                                            <p>Use placeholders to customize this Job's auto-confirmation email. It will be sent to all candidates when they apply for the Job. The current content is generated from the default auto-confirmation email in "Settings".</p>
                                            <div class="col">
                                                <label>Email subject *</label>
                                                <input type="text" class="form-control" placeholder="[job_offer] - application submitted" required>
                                            </div><br/>
                                            <label>Job Requirement</label>
                                            <textarea ck-editor  cols="80" rows="10" id="emailEditor">
                                            </textarea>
                                        </section>
                                        <section>
                                            <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                                                <ul class="pager wizard no-style">
                                                    <li class="next finish" style="display: list-item;">
                                                        <button class="btn btn-primary btn-cons pull-right" type="button">
                                                            <span>Save & Go Next</span>
                                                        </button>
                                                    </li>
                                                    <li class="previous">
                                                        <button class="btn btn-default btn-cons pull-right btn-animated from-left fa fa-truck" type="button" ng-click="activetab('slide2')">
                                                            <span>Previous</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---MODAL AREA---->

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Who should follow this Job?</h5><p>Team members following a Job will receive notifications of all changes in that Job</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fa fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                    Invite a new team member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <label>Email *</label>
                            <input type="text" class="form-control" placeholder="First name" required>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>select a role</label>
                                    <select  class="form-control">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div>
    </div>
    <!-- END MODEL card -->

</div> 
@endsection

@section('page-level-css')

<link href="{{ URL::asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('pages/css/pages.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('page-level-scripts')

<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ URL::asset('assets/js/form_elements.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{  URL::asset('assets/plugins/jquery-autonumeric/autoNumeric.js') }}"></script>
<script type="text/javascript" src="{{  URL::asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{  URL::asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}"></script>
<script type="text/javascript" src="{{  URL::asset('assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{  URL::asset('assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
<script src="{{  URL::asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{  URL::asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

<script src="{{  URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{  URL::asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{  URL::asset('assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script>
<script src="{{  URL::asset('assets/plugins/bootstrap-typehead/typeahead.jquery.min.js') }}"></script>
<script src="{{  URL::asset('assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script>

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.ckeditor.com/4.5.5/standard/ckeditor.js" ></script>
<script type="text/javascript">

var w = {!! $data !!}
console.log(w);
var j ={!! $Jobdata !!}
console.log(j.id);










app.controller('saifCtrl',function($scope,$http) {

    $scope.w = w;
    $scope.j = j;

    $scope.jobId = '';

    $scope.data = {};
    $scope.Jobapp = {};
    $scope.data.pipeline = {};
    $scope.Jobs = {};
    $scope.Jobs.job_title = "";
    $scope.Jobs.job_department = "";
    $scope.Jobs.country = "";
    $scope.Jobs.state = "";
    $scope.Jobs.city = "";
    $scope.Jobs.code = "";
    $scope.Jobs.task = "";
    $scope.Jobs.description = "";
    $scope.Jobs.requirement = "";
    $scope.Jobs.employement_type = "";
    $scope.Jobs.category = "";
    $scope.Jobs.hr_week = "";
    $scope.Jobs.education = "";
    $scope.Jobs.experiences = "";

    $scope.saif=function(data, index){
       $scope.datas[index].select = true;


    };

    $scope.activetab = function (tab){
        
        $('#slide1').hide();
        $('#slide2').hide();
        $('#slide3').hide();
        $('#slide4').hide();
        $('#slide1Div').removeClass('active');
        $('#slide2Div').removeClass('active');
        $('#slide3Div').removeClass('active');
        $('#slide4Div').removeClass('active');
        if(tab == 'slide1'){
            $('#slide1').show();
            $('#slide1Div').addClass('active');
        }else if(tab == 'slide2'){
            $('#slide2').show();
            $('#slide2Div').addClass('active');
        }else if(tab == 'slide3'){
            $('#slide3').show();
            $('#slide3Div').addClass('active');
        }else if(tab == 'slide4'){
            $('#slide4').show();
            $('#slide4Div').addClass('active');
        }
    }





$scope.getsortable = function(){
    console.log($scope.datas);
    $http.post('/updateworkprocess', {params:$scope.datas,id:$scope.jobId}).then(function success(e){
        console.log(e.data.data);
        $scope.statenames = e.data.data;
    },
    function(e){
    });
}

$scope.statenames = [];
$http.get('/getPipeData').then(function(f){
    $scope.datas = f.data;
   // console.log($scope.datas);
},
function(f){

}
); 
$scope.Jobapp =function(){

        var p = {phone: $scope.Jobapp.phone, photo: $scope.Jobapp.photo,cv: $scope.Jobapp.cv,cover_letter: $scope.Jobapp.cover,job_id:$scope.jobId};
        console.log(p);
        $http.post('/jobForm', {phone: $scope.Jobapp.phone, photo: $scope.Jobapp.photo,cv: $scope.Jobapp.cv,cover_letter: $scope.Jobapp.cover,job_id:$scope.jobId}).then(function success(e){
        $scope.activetab('slide3');
    },
    function(e){

    });
   
}
$scope.getcountrystates = function(){
    var id = $( ".inputAdd option:selected" ).val();
    console.log(id)
    var s ={country_id:id};
    $http.post('/jobState', {params:s}).then(function success(e){
        console.log(e.data.data);
        $scope.statenames = e.data.data;
    },
    function(e){

    });

}

$scope.models = {
    selected: null,
    lists: {"A": [], "B": []}
};

// Generate initial model
for (var i = 1; i <= 3; ++i) {
    $scope.models.lists.A.push({label: "Item A" + i});
    $scope.models.lists.B.push({label: "Item B" + i});
}

// Model to JSON for demo purpose
$scope.$watch('models', function(model) {
    $scope.modelAsJson = angular.toJson(model, true);
}, true);





$scope.jobSave = function() {

    console.log($scope.Jobs);
    $('#displayErrorMessages').empty().hide();

    var s ={job_title:$scope.Jobs.job_title,job_department: $scope.Jobs.job_department,country: $scope.Jobs.country,state: $scope.Jobs.state,city: $scope.Jobs.city,code: $scope.Jobs.codes,description: $scope.Jobs.description,requirement: $scope.Jobs.requirement,employement_type: $scope.Jobs.employement_type,category: $scope.Jobs.category,hr_week: $scope.Jobs.hr_week,education: $scope.Jobs.education,experiences: $scope.Jobs.experiences,task:$scope.Jobs.task, jobId:$scope.jobId};
    
//console.log(s);


$http.post('JobStore', {params:s}).then(function success(e){
    console.log(e.data);
   if(e.data.status == 'validation'){
        var errors = e.data.messages;
        var errorMessages = '';
        $.each(errors, function(e,v){
            errorMessages+='<p>'+v[0]+'</p>';
        });
        $('#displayErrorMessages').html(errorMessages).show();
    }else if(e.data.status == 'success'){
        $scope.jobId = e.data.jobId;
        $scope.activetab('slide2');
    }else if(e.data.status == 'failed'){
        $('#displayErrorMessages').html(e.data.message).show();
    }
},
function(e){

}
);
};

$scope.savePipeline = function() {

    var p = {name: $scope.data.pipeline.name, type:$scope.data.pipeline.type};
    console.log(p);
    $http.post('pipeStore', p).then(function success(e){
        console.log(e.data);

    },
    function(e){

    }
    );

}

$scope.pipeSave =function(data){

    console.log(data.id);
    var u ={id:data.id,pipename:data.pipe_name};
    console.log(u);
    $http.post('pipeUpdate', u).then(function success(e){
        console.log(e.data);

    },
    function(e){

    }
    );

}


});
app.directive('ckEditor', function () {
        return {
            require: '?ngModel',
            link: function (scope, elm, attr, ngModel) {
                var ck = CKEDITOR.replace(elm[0]);
     
                if (!ngModel) return;
     
                ck.on('pasteState', function () {
                    scope.$apply(function () {
                        ngModel.$setViewValue(ck.getData());
                    });
                });
     
                ngModel.$render = function (value) {
                    ck.setData(ngModel.$viewValue);
                };
            }
        };
    });

// $(function(){
// $('#jobCountry').on('click', function(e){
//     alert('saif');
//     });
// });



</script>
@endsection