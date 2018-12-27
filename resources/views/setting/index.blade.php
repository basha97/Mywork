@extends('master')
@section('content')

{{-- <style type="text/css">
.card {
    -webkit-box-shadow: none;
    box-shadow: none;
    border-radius: 1px;
    -webkit-border-radius: 1px;
    -moz-border-radius: 1px;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
    position: relative;
    background-color: #f0f4f7;
    margin-bottom: 20px;
    width: 100%;
}

.card .card-header {
    background: #f0f4f7;
    border-radius: 0px;
    border-bottom: 0px;
    /* padding: 20px 20px 7px 20px; */
    position: relative;
    z-index: 3;
    min-height: 48px;
}
	.secondary-sidebar {
    left: -30px;
    background: #f0f4f7;
    width: 250px;
    /* float: left; */
    top: -30px;
    max-height: 519px;
    padding-left: 47px;
    height: 100%;
    position: inherit;
    padding: 20px 0;
}
</style>
<!-- START SECONDARY SIDEBAR MENU-->
@include('includes.sidemenu') --}}
<div ng-controller="setting">
	<div class="container" >
		{{-- <form method="post">
			{{ CSRF_field() }}
			<input type="text" ng-model="f_name" name="">
			<input type="text" ng-model="l_name" name="">
			<a href="javascript:;" ng-click="add()">Add</a>
		</form> --}}
		<div class="row">
			<div class="col-md-12 jumbotron jumbotron-fluid">
				<div class="row">
					<div class="col-md-2 d-flex align-items-center">
						<img src="@{{ getinform.u_img }}" class="img-circle" alt="Cinque Terre" width="70px" height="70px">
					</div>
					<div class="col-md-6">
						<h4>@{{ getinform.f_name }} @{{ getinform.l_name }}</h4>
						<p><span><i class="fa fa-phone" aria-hidden="true"></i> @{{ getinform.phone }} </span> <span> <i class="fa fa-envelope" aria-hidden="true"></i> @{{ getinform.email }}</span></p>
					</div>
					<div class="col-md-4 d-flex align-items-center">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						 	<i class="fa fa-cog" aria-hidden="true"></i> Edit profile
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<div>
	
</div>



<!------    modal      ----------->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><hr/>
        {{ CSRF_field() }}
		<div class="form-group">
		    <label for="exampleFormControlInput1">First Name</label>
		    <input type="text" ng-model="getinform.f_name" class="form-control" id="exampleFormControlInput1" placeholder="John">
	  	</div>

	  	<div class="form-group">
		    <label for="exampleFormControlInput1">Last Name</label>
		    <input type="text" ng-model="getinform.l_name" class="form-control" id="exampleFormControlInput2" placeholder="Doe">
	  	</div>

	  	<div class="form-group">
		    <label for="exampleFormControlInput1">Email</label>
		    <input type="email"  ng-model="getinform.email" class="form-control" id="exampleFormControlInput3" placeholder="Company@gmail.com">
	  	</div>

	  	<div class="form-group">
		    <label for="exampleFormControlInput1">Phone</label>
		    <input type="phone" ng-model="getinform.phone" class="form-control" id="exampleFormControlInput3" >
	  	</div>

	  	<div class="form-group">
		    <label for="exampleFormControlInput1">Profile picture</label>
		    <input type="file"  ng-model="getinform.url" class="form-control-file img_upload"" id="img_upload"  >
		    <input type="hidden"  ng-model="img_upload_src" class="form-control-file img_upload_src"" id="img_upload_src"  >
	  	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        <button type="button" ng-click="SettingForm(getinform)" class="btn btn-primary">Save changes</button>
       {{--  <a href="javascript:;" ng-click="add()">Add</a> --}}
      </div>
    </div>
  </div>
</div>


<!----- ng-model div    ----->
</div>
@endsection

@section('page-level-css')



@endsection

@section('page-level-scripts')

@endsection

@section('scripts')
<script src="{{ URL::asset('assets/js/fileupload.js') }}"></script>
<script type="text/javascript">
app.controller('setting',function($scope,$http) {


	$('#img_upload').fileupload({
	    url: '/fileupload_ajax',
	    dataType: 'json',
	    formData: { path:'' },
	    done: function (e, data) {
	        var baseurl = document.location.origin;
	        var src = baseurl+'/'+data.result.files[0].url;
	        $scope.url = src;
	        console.log($scope.url);
	        // $('#img_upload_src').val(src);
	        // $('#in_img').attr('src',src);
	    },
	    progressall: function (e, data) {
	    },error: function(e){
	      console.log(e.responseText);
	    }
	}).prop('disabled', !$.support.fileInput)
	.parent().addClass($.support.fileInput ? undefined : 'disabled');



	$scope.add = function(){
		$http.post('addTest',{f_name:$scope.f_name,l_name:$scope.l_name,email:$scope.email,phone:$scope.phone,u_img:$scope.url}).then(function success(e){
			console.log(e);
		},
		function error(error){
			console.log(error);
		})
	}


	$http.get('/getinform').then(function(f){
    $scope.getinform = f.data;
    console.log($scope.getinform);

	},
	function(f){
		alert(f);
	}
	);

	$scope.SettingForm = function(f){
		$scope.id = f.id;
		console.log($scope.id);
		

		 var p = {f_name: $scope.getinform.f_name, l_name:$scope.getinform.l_name, email:$scope.getinform.email,phone:$scope.getinform.phone,u_img:$scope.url,id:$scope.id };
		    console.log(p);
		$http.post('saveinform', p).then(function success(e){
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