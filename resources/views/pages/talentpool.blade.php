@extends('master')
@section('content')

	<form method="post">
		{{ csrf_field() }}

			<div class="row" ng-controller="talentCntrl">
			
			{{-- Adding The talent pool part1 --}}
				<div class="col-md-8">
					<div class="row">
						
						<div class="col-md-8">
							<div class="form-group">
								<label>Title</label>
								<input class="form-control" type="text" ng-model="title" name="title">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Department</label>
								<input class="form-control" type="text" ng-model="department" name="department">
							</div>
						</div>
						
					</div>
					<div class="row">
						 
                                 
                                   
						<div class="col-lg-12">
							<div class="form-group">
								<label>Description</label>
                                <textarea cols="80" class="form-control" rows="10" ng-model="Jobs.requirement" id="ckeExample">
                                </textarea>
                            </div>            
						</div>
					</div>
				</div>





				{{-- Adding The talent pool part2 --}}
				<div class="col-md-4">
					<a href="javascript:;" ng-click="saveData()">Save</a>
				</div>
		    
		    </div>
	</form>

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js" ></script>
<script type="text/javascript">
	    var ckEditorID;
    var sortorder = [];
    ckEditorID = 'ckeExample';

    function fnConsolePrint()
    {
//console.log($('#' + ckEditorID).val());
console.log(CKEDITOR.instances[ckEditorID].getData());
}
CKEDITOR.config.forcePasteAsPlainText = true;
CKEDITOR.replace( ckEditorID,
{
    toolbar :
    [
    {
        items : [ 'Bold','Italic','Underline' ]
    }
    ]
});
</script>
<script>

	app.controller('talentCntrl', function($scope,$http){

		$scope.form = {};
		console.log($scope.form);

		$scope.saveData = function(){
			var s = {title:$scope.title,department:$scope.department};
			console.log(s);
			$http.post('addTalent',{title:$scope.title,department:$scope.department}).then(function success(e){
				console.log(e);
			},
			function error(error){
				console.log(error);
			});
		}
	})
</script>

@endsection