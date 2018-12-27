@extends('master')
@section('content')
<style type="text/css">
	.save_tal{
		border: 2px solid;
	}
	.save_but{
		margin-bottom: 5px;
	}
</style>
	<form method="post">
		{{ csrf_field() }}

			<div class="row" ng-controller="edittalentCntrl">
			
			{{-- Adding The talent pool part1 --}}
				<div class="col-md-8">
					<div class="row">
						
						<div class="col-md-8">
							<div class="form-group">
								<label>Title</label>
								<input class="form-control" type="text" ng-model="record.title" name="title">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Department</label>
								{{-- <input class="form-control" type="text" ng-model="department" name="department"> --}}
								<select class="form-control" ng-model="record.department">
									<option value="">Select department</option> 
									<option  ng-repeat="x in record" value="@{{ x.id}}">
										@{{ x.name }}
									</option>
								</select>
							</div>
						</div>
						
					</div>
					<div class="row">
						 
                                 
                                   
						<div class="col-lg-12">
							<div class="form-group">
								<label>Description</label>
                                <textarea ck-editor cols="80" class="form-control"  rows="10"  ng-model="record.description">
                                </textarea>
                            </div>            
						</div>
					</div>
				</div>

				{{-- Adding The talent pool part2 --}}
				<div class="col-md-4">
					<div class="container save_tal">
						<div class="row">
							<div class="col-md-12">
								<h3 style="text-align: center;">Talent pool</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<a class="btn btn-primary btn-block save_but" href="javascript:;" ng-click="updateData()">Update</a>
							</div>
						</div>
					</div>
				</div>
		    
		    </div>
	</form>

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.ckeditor.com/4.5.5/standard/ckeditor.js" ></script>

<script>
	
	app.controller('edittalentCntrl', function($scope,$http){

		$scope.record = {!! json_encode($new) !!};
		console.log($scope.record);
		

		$scope.updateData = function(){
			var s = {title:$scope.title,department:$scope.department,description:$scope.description};
			console.log(s);
			
			$http.post('addTalent',{title:$scope.title,department_id:$scope.department,description:$scope.description}).then(function success(e){  
				console.log(e);
			},
			function error(error){
				console.log(error);
			});
		}
	})
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
</script>

@endsection