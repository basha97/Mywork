@extends('master')
@section('content')
	
	<div class="container" ng-controller="applicationCntrl">

			<div class="position pull-right" data-placement="bottom-right">
				<div class=" alert alert-success" ng-show="successMessagebool " role="alert" >
		            <button class="close" data-dismiss="alert"></button>
		            <strong>@{{successMessage }}</strong>
		        </div>
		    </div>
	    
		<div class="row">
			<div class="col-md-12">
				<form method="post">
					{{ CSRF_field() }}
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" ng-model="name" class="form-control" ng-required="true"  placeholder="Your full name">
							</div>	
						</div>
					</div>	
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Email</label>
								<input type="email" ng-model="email" class="form-control"  placeholder="Your Email Address">
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Number</label>
								<input type="text" ng-model="number" class="form-control"  placeholder="Your phone Number">
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Photo</label>
								<button class="btn form-control" id="in_profile_file"><i class="fa fa-cloud-upload"></i> Photo</button>
								<input type="file" id="profile_file" class="form-control profile_file"  style="display:none" />
								<input type="hidden" ng-model="profile_file_src" class="form-control profile_file_src" id="profile_file_src">
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Resume</label>
								<button class="btn form-control in_resume_file" id="in_resume_file"><i class="fa fa-cloud-upload"></i> Resume</button>
								<input type="File" class="form-control resume_file" id="resume_file"  style="display:none">
								<input type="hidden" ng-model="resume_file_src" class="form-control resume_file_src" id="resume_file_src">
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<a href="javascrip:;" ng-click="saveApplication()" class="btn btn-primary btn-cons m-b-10 btn-block"><i class="fa fa-form"></i> <span class="bold">Submit Application</span></a>
							</div>	
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	<script src="{{ URL::asset('assets/js/fileupload.js') }}"></script>
	<script type="text/javascript">
 var q =  {!! $job_records!!} 
    console.log(q.id);

    
		app.controller('applicationCntrl',function($scope,$http,$timeout){

			$('#in_profile_file').click(function(){
			$('.profile_file').click()

			$('#in_resume_file').click(function(){
				$('.resume_file').click()
			})


	});
			$scope.Applyfinal = q.id;
			console.log($scope.Applyfinal);
			//FileUpload Image
			$('.profile_file').fileupload({
			    url: '/fileupload_ajax',
			    dataType: 'json',
			    formData: { path:'' },
			    done: function (e, data) {
			        var baseurl = document.location.origin;
			        var src = baseurl+'/'+data.result.files[0].url;
			        $scope.profile_file_src = src;
			        console.log($scope.profile_file_src);
			        // $('#profileimage_path').val(src);
			        // $('#in_img').attr('src',src);
			    },
			    progressall: function (e, data) {
			    },error: function(e){
			      console.log(e.responseText);
			    }
			}).prop('disabled', !$.support.fileInput)
			.parent().addClass($.support.fileInput ? undefined : 'disabled');

			//FileUpload Resume
			$('.resume_file').fileupload({
			    url: '/fileupload_ajax',
			    dataType: 'json',
			    formData: { path:'' },
			    done: function (e, data) {
			        var baseurl = document.location.origin;
			        var src = baseurl+'/'+data.result.files[0].url;
			        $scope.resume_file_src = src;
			        console.log($scope.resume_file_src);
			        // $('#profileimage_path').val(src);
			        // $('#in_img').attr('src',src);
			    },
			    progressall: function (e, data) {
			    },error: function(e){
			      console.log(e.responseText);
			    }
			}).prop('disabled', !$.support.fileInput)
			.parent().addClass($.support.fileInput ? undefined : 'disabled');

			$scope.saveApplication = function(){

				console.log('hii');
				$http.post('/addApplication',{name:$scope.name,number:$scope.number,email:$scope.email,profile_path:$scope.profile_file_src,resume:$scope.resume_file_src,job_id:$scope.Applyfinal}).then(function success(e){
					console.log(e);
					$scope.name = '';
					$scope.email = '';
					$scope.number = '';
					$scope.successMessage = "Your application had been applied successfully";
        			$scope.successMessagebool = true;
        				$timeout(function () {
            				$scope.successMessagebool = false;
        		}, 6000);
				},
				function error(error){
					console.log(error);
				});
			}



				



		//End of Angular Controller	
		});
	</script>


@endsection