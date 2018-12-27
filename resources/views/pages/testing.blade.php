@extends('master')
@section('content')

<form ng-controller="candidateCtrl">
	<input type="text" ng-model="name" class="form-control" name="name">
	<input type="text" ng-model="place" class="form-control" name="place">
	<input type="submit" ng-click="addData()">
</form>
@foreach($new as $data)
<h1>{{ $data->name }}</h1>
@endforeach
@endsection
@section('scripts')

<script>


app.controller('candidateCtrl', function($scope,$http) {

	$scope.name = '';
	$scope.place = '';

	$scope.addData = function () {
		console.log('helooooo');
		var data = {name:$scope.name, place:$scope.place};
		
		console.log(data);
		$http.post('test', {name:$scope.name,place:$scope.place}).then(function success(e){
			console.log(e.data);
		},
		function error(error){
			console.log(error);
		});
	}
});
	
</script>
@endsection