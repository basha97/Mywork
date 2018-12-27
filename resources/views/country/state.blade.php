@extends('master')
<?php
use App\Country;
	?>


@section('content')
	<div class="row">
		<div class="col-lg-8">
			<h2> STATE</h2>
		</div>
		<div class="col-lg-2">
			<button class="btn btn-complete btn-cons" data-toggle="modal" data-target="#stateModal"><i class="fa fa-plus" aria-hidden="true"></i> Add state</button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-striped">
			    <thead>
			        <tr>
			            <th scope="col">#</th>
			            <th scope="col">Country Name</th>
			            <th scope="col">State Name</th>
			            <th scope="col">Edit</th>
			        </tr>
			    </thead>
			    <tbody><?php $i = 1; ?>
			    	@foreach($state as $states)
				    	<tr>
				            <td>{{ $i++ }}</td>
				            <td>{{$states->countryName}}</td>
				            <td>{{ $states->stateName }}</td>
				            <td><button class="btn btn-primary btn-cons updatestate" data-toggle="modal" data-id="{{ $states->id}}" data-target="#updateModal"><i class="fa fa-cog" aria-hidden="true"></i> Edit </button><button class="btn btn-danger btn-cons" ><i class="fa fa-trash" aria-hidden="true"></i> Delete </button></td>
				        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>



<!----- modal start  ----->


<div class="modal fade" id="stateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
	    <div class="modal-content">
		      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">
			         Add State 
			     	</h5><br/>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times; </span>
			        </button>
		      </div>
		      <div class="modal-body">
			      	<form id="stateAdd">
			      		{{ csrf_field() }}
			         <div class="row">
			         	<div class="col-md-6">
					       		<div class="form-group">
								    <label for="exampleSelect1">select Country</label>
								  
								    <select class="form-control" id="exampleSelect1" name="country_id">
								    	
								     @foreach(Country::countrySelect() as $key => $value)
								     <option value={{ $key }}> {{$value }}</option>
								     
								     @endforeach
								    </select> 
								</div>
					    </div>
			         	<div class="col-md-6">
					       		<label> Enter State</label>
					            <input type="text" id="updateName" class="form-control" name="name" placeholder="America" value="" required>
					    </div>
					 </div>
					</form>
		      </div>
		      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary"  id="stateSave">Save changes</button>
		      </div>
	    </div>
  </div>
</div>


<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
	    <div class="modal-content">
		      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">
			         Add State 
			     	</h5><br/>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times; </span>
			        </button>
		      </div>
		      <div class="modal-body">
			      	<form id="stateUpdate">
			      		{{ csrf_field() }}
			         <div class="row">
			         	<div class="col-md-6">
					       		<div class="form-group">
								    <label for="exampleSelect1">select Country</label>
								  
								    <select class="form-control" id="updatestateId" name="country_id">
								    	
								     @foreach(Country::countrySelect() as $key => $value)
								     <option value={{ $key }}> {{$value }}</option>
								     
								     @endforeach
								    </select> 
								</div>
					    </div>
			         	<div class="col-md-6">
					       		<label> Enter State</label>
					            <input type="text" id="updateStateName" class="form-control" name="name" placeholder="America" value="" required>
					            <input type="hidden" id="updateIdstate" value="" class="form-control" name="id" placeholder="Enter theAmount">
					    </div>
					 </div>
					</form>
		      </div>
		      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary"  id="updateState">Save changes</button>
		      </div>
	    </div>
  </div>
</div>





<!----- end of  modal  ----->
@endsection

@section('page-level-css')



@endsection


@section('page-level-scripts')

@endsection

@section('scripts')
<script>
$('#stateSave').on('click',function(e){
	e.preventDefault();
	var qs = $('#stateAdd').serializeArray();
		console.log(qs);
		$.ajax({
			url: '/stateAdd',
			type: 'POST',
			data: qs,
			success: function(res){
				console.log(res);
				
			},
			error: function(e){
				console.log(e)
			}

		})

});
$('#updateState').on('click', function(e){

	e.preventDefault();
		var qs = $('#stateUpdate').serializeArray();
		console.log(qs);

		$.ajax({
			url: '/stateupdate',
			type: 'POST',
			data: qs,
			success: function(res){
				console.log(res)
				console.log(res.data.name);
				$('.activeCountry').closest('tr').find('.country-name').text(res.data.name);
			},
			error: function(e){
				console.log(e)
				// $('#result').html('<div class="alert alert-danger"><strong>Error! Please contact administrator.</strong></div>');
			}
		})

});

$(document).on('click', '.updatestate', function(){
	$('.updatestate').removeClass('activeCountry');
	var click = $(this);
	click.addClass('activeCountry');
	var id = click.attr('data-id');
	$.ajax({
		url: '/state/detail/get',
		type: 'GET',
		data: {id:id},
		success: function(res){
			console.log(res);
			if(res.success == true){
				$('#updateStateName').val(res.name);
				$('#updateIdstate').val(res.id);
				$('#updatestateId').val(res.country_id);
				$('#updateModal').modal('show');
				return false;
			}else{
				alert('Please select another country');
				return false;
			}
		},
		error: function(e){
			console.log(e)
			// $('#result').html('<div class="alert alert-danger"><strong>Error! Please contact administrator.</strong></div>');
		}
	});
	return false;
});
</script>
@endsection