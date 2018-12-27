@extends('master')
@section('content')
<div ng-controller="settingDepartment">
	<div class="container" >
		<div class="row">
			<div class="col-md-12">
				<p>Department</p>
				<p>Manage departments in your company.</p><hr>
				<div class="row">
					<div class="d-flex align-items-end flex-column split right">
						<button type="button" class="btn btn-primary p-2" data-toggle="modal" data-target="#exampleModal">
						  Add Department
						</button>
					</div>
				</div>
				<table class="table">
				  <thead>
				    <tr>
				      <th>Sl.no</th>
				      <th>name</th>
				      <th>Edit</th>
				      
				    </tr>
				  </thead>
				  <tbody>
				    <tr ng-repeat="data in department  track by $index">
				     <td>@{{ $index + 1 }}</td>
				      <td>@{{data .name }}</td>
				      <td>
				      	<button type="button" class="btn btn-primary"  ng-click="departmentedit(data)" data-toggle="modal" data-target="#exampleModalCenter">
						  Edit
						</button>

					  </td>
				    </tr>
				</tbody>
			</table>
		</div>
		</div>
	</div>


<!-------      ----->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><hr/>
      	<div class="form-group">
		    <label for="exampleFormControlInput1">Add new</label>
		    <input type="text" class="form-control" ng-model="department.name" id="exampleFormControlInput1" placeholder="">
		 </div>@{{ department.name }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" ng-click="departmentsave()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><hr/>
        <div class="form-group">
		    <label for="exampleFormControlInput1">update</label>
		    <input type="text" class="form-control" ng-model="dept.name" id="exampleFormControlInput1" placeholder="">
		 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  ng-click="departmentUpdate(dept)">Save changes</button>
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
app.controller('settingDepartment',function($scope,$http) {


	$scope.departmentsave = function(){
		 var p = {name: $scope.department.name};
		 console.log(p);
		 $http.post('settingDepartmentsave', p).then(function success(e){
	     console.log(e.data);
	       $scope.department.push(e.data.data);
	      

    },
    function(e){
    	alert('error');
    }
    );
	}
	
	$scope.departmentedit = function(f){
		$scope.dept = f;
		console.log($scope.dept);
		

	}
	$scope.departmentUpdate = function(f){
		$scope.id = f.id;
		console.log($scope.id);
		var p ={name:$scope.dept.name,id:$scope.id};
    	console.log(p);
		$http.post('settingDepartmentUpdate', p).then(function success(e){
	    console.log(e.data);
	    
	      

    },
    function(e){
    	alert('error');
    }
    );
	}

	$http.get('/settingDepartment').then(function(f){
   	var s =  {!! $data!!} 
    $scope.department = s;
    console.log($scope.department);

	},
	function(f){
		alert(f);
	}
	);

		 
	

	



}
);


</script>
@endsection