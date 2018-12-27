@extends('master')
@section('content')
<style>
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
<div class="col-md-12" ng-controller="pipeline">
	<div class="row">
		<div class="col-md-12">
				<ul ui-sortable ng-model="datas" class="list">
					<li ng-repeat="data in datas track by $index" class="item"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;@{{ data.pipe_name }}</li>
				</ul>

				<a href="javascript:;" class="btn btn-success float-center justify-content-center" ng-click="getsortable()">save</a>
		</div>
	</div>
	
	
	<div class="d-flex justify-content-center bg-secondary mb-3" style="border-style: dashed;opacity: 0.4;padding: 5px;">
		<div class="p-2 ">
			<button type="button" class="btn btn-success" ng-click="data.showInformation=true"><i class="fa fa-plus" aria-hidden="true"></i> Add pipeline</button>

		</div>
	</div>

	<div class="pipe" ng-if="data.showInformation">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<label>Stage name *</label>
					<input type="text" class="form-control" ng-model="data.pipeline.name" placeholder="Type stage name" required>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<label>Type</label>
							<select  class="form-control" ng-model="data.pipeline.type">
								<option value="">Select</option>
								<option value="Apply">Apply</option>
								<option value="Phone Screen">Phone Screen</option>
								<option value="Interview">Interview</option>
								<option value="Evaluation">Evaluation</option>
								<option value="other">other</option>
								<option value="Hire">Hire</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div><br/>
		<div class="row pull-right">
			<div class="col-md-12">
				<button type="button" class="btn btn-secondary" ng-click="data.showInformation=false">Cancel</button>
				<button type="button" ng-click="savePipeline()" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div><br/>

	<table class="table table-striped" ng-init="mySwitch">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Pipe name</th>
				<th scope="col">status</th>
			</tr>
		</thead>
		<tbody>
			<tr  ng-repeat="data in datas track by $index">

				<td>@{{ $index + 1 }}</td>
				<td><input type="text" class="form-control" ng-show="data.select" id="usr"  data-id ng-model="data.pipe_name" ><input type="text" class="form-control" ng-show="!data.select" readonly="" id="usr"  data-id ng-model="data.pipe_name" ></td>
				<td> 
					<button type="button"  class="btn btn-default" ng-click="saif(data, $index)"><i class="fa fa-pencil" aria-hidden="true"></i> show </button>

					<button type="button"   class="btn btn-default"  ng-click="pipeSave(data)" ng-if="data.select"><i class="fa fa-floppy-o" aria-hidden="true"></i> save </button>

					<button type="button" ng-hide="third" class="btn btn-default"><i class="fa fa-remove" aria-hidden="true"></i> Delete</button>


				</td>
			</tr>

		</tbody>
	</table>
</div>

@endsection

@section('page-level-css')



@endsection

@section('page-level-scripts')

@endsection

@section('scripts')

<script type="text/javascript">
app.controller('pipeline',function($scope,$http) {

    $scope.data = {};
    $scope.data.pipeline = {};

    $scope.saif=function(data, index){
       $scope.datas[index].select = true;


    };





$scope.getsortable = function(){
    console.log($scope.datas);
    $http.post('/updateworkflowpositionprocess', {params:$scope.datas}).then(function success(e){
        console.log(e.data.data);
        $scope.statenames = e.data.data;
    },
    function(e){
    });
}

$scope.statenames = [];
$http.get('/getPipeData').then(function(f){
    $scope.datas = f.data;
    console.log($scope.datas);

},
function(f){

}
);
$scope.savePipeline = function() {

    var p = {name: $scope.data.pipeline.name, type:$scope.data.pipeline.type};
    console.log(p);
    $http.post('pipeStore', p).then(function success(e){
        console.log(e.data);
        $scope.datas.push(e.data.data);

    },
    function(e){

    }
    );

}





}
);
</script>

@endsection