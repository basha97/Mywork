@extends('master')

@section('content')
<style type="text/css">


.list {

	list-style: none outside none;
	/*margin: 10px;*/
	padding: 10px;
}

.item {
    padding: 6px;
    padding-left: 7px;
    padding-top: 19px;
    margin: 5px 0;
    /* border: 2px solid #444; */
    border-radius: 5px;
    background-color: #dbe0e4;
    font-size: 1.1em;
    font-weight: bold;
    text-align: center;
    cursor: move;
}
.col-md-2 {
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 16.666667%;
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 12.666667%;
    border: 2px solid;
    border-radius: 6px;
    margin: 8px;
    text-align: center;
}

</style>

<h1>@{{item.can_name  }}</h1>
  <div ng-controller="connectedController" class="connectedItemsExample">

	<div class="container">
		<div class="row">
	    <div class="col-md-2" ng-repeat="master in masters">
	    	<p style="color:#7fccea;padding-top: 9px;">@{{ master.name }}</p>
		    	<hr>
		      <ul ui-sortable="sortableOptions" ng-model="master.list" class="list">
		        <li ng-repeat="item in master.list" class="item"><img src="@{{ item.can_profile }}" class="img-circle" alt="Cinque Terre" width="30px" height="30px"><p> @{{item.can_name}}</p></li>
		      </ul>
	    </div>
	    </div>
    </div>



    <a href="javascript:;" ng-click="submit()" class="btn btn-primary" id="submitBtn">submit</a>
  </div>

@endsection

@section('page-level-css')



@endsection


@section('page-level-scripts')

@endsection

@section('scripts')
<script>

	
app.controller('connectedController', function ($scope,$http) {
	$scope.editid = {!! $id !!};
	$scope.masters = [];

	$scope.getlist = function(){
		$http.post('/getpipelinelistprocess', {jobid: $scope.editid}).then(function success(e){
	        $scope.masters = e.data.master;
	        $('#submitBtn').text('Submit');
	    },
	    function(e){
	    });
	}
  	$scope.getlist();
	$scope.sortableOptions = {
	   connectWith: '.connectedItemsExample .list'
	};

    $scope.submit = function(){
	  	$('#submitBtn').text('Saving...Please wait');
	  	console.log($scope.masters);
	  	$http.post('/updatepipelinelistprocess', {jobid: $scope.editid,list: $scope.masters}).then(function success(e){
	        $scope.getlist();
	    },
	    function(e){
	    });
    }
});

</script>
@endsection