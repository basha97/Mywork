@extends('master')
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-8">
	    		<h2>Country</h2>
	    	</div>
	    	<div class="col-lg-4">
	    		<button class="btn btn-complete btn-cons" data-toggle="modal" data-target="#exampleModalLong1"><i class="fa fa-plus" aria-hidden="true"></i> Add COUNTRY</button>
	    	</div>
	    </div>
			<table class="table table-striped" id="countryTable">
		        <thead>
		            <tr>
		                <th>Sl.No</th>
		                <th>Name</th>
		                <th>Edit</th>
		            </tr>
		        </thead>
		        <tbody><?php $i = 1; ?>
		        	@foreach($new as $post)
		            <tr>
		                <td>{{ $i++ }}</td>
	                    <td class="country-name">{{ $post->name }}</td>
		                <td><button class="btn btn-primary btn-cons updateCountry" data-toggle="modal" data-id="{{ $post->id}}" data-target="#countryModal"><i class="fa fa-cog" aria-hidden="true"></i> Edit </button><button class="btn btn-danger btn-cons" ><i class="fa fa-trash" aria-hidden="true"></i> Delete </button></td>
		            </tr>
		            @endforeach
		        </tbody>
		    </table>
	</div>
<!------   modal area     ---->
<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Add New country </h5><br/>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times; </span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="countryAdd">
      		{{ csrf_field() }}
         <div class="row">
         	<div class="col-md-10">
		       		<label> Enter Country</label>
		             <input type="text" class="form-control" name="name" placeholder="America"  required>
		       	</div>
		      </form>
		  </div>
       </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="save">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="countryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Edit country </h5><br/>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times; </span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="countryupdate">
      		{{ csrf_field() }}
         <div class="row">
         	<div class="col-md-10">
		       		<label> Enter Country</label>
		             <input type="text" id="updateName" class="form-control" name="name" placeholder="America" value="" required>
		             <input type="hidden" id="updateId" value="" class="form-control" name="id" placeholder="Enter theAmount">
		       	</div>
		      </form>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="update">Save changes</button>
      </div>
    </div>
  </div>

  <!-----  end of modal area  ---->
@endsection

@section('page-level-css')



@endsection

@section('page-level-scripts')
<script type="text/javascript">
$('#save').on('click', function(e){
	e.preventDefault();
		var qs = $('#countryAdd').serializeArray();
		console.log(qs);
		$.ajax({
			url: '/countryAdd',
			type: 'POST',
			data: qs,
			success: function(res){
				if(res.success == true){
						console.log(res);
						var dt = res.data;
						var html = '<tr>';
					html += '<td> '+dt.id+' </td>';
			        html += '<td> '+dt.name+' </td>';
			        html += '<td><a href="javascript:;" class="btn btn-primary btn-cons updateCountry" data-toggle="modal" data-id="'+dt.id+'" data-target="#countryModal"><i class="fa fa-cog" aria-hidden="true"></i> Edit </a> <a href="cloudedit/">delete</a></td>';

			     

						$('#countryTable').find('tbody').prepend(html);
					}else{
						alert('error');
					}

				},
			error: function(e){
				console.log(e)
				// $('#result').html('<div class="alert alert-danger"><strong>Error! Please contact administrator.</strong></div>');
			}
		})

});
$('#update').on('click', function(e){
	e.preventDefault();
		var qs = $('#countryupdate').serializeArray();
		console.log(qs);

		$.ajax({
			url: '/countryupdate',
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

$(document).on('click', '.updateCountry', function(){
	$('.updateCountry').removeClass('activeCountry');
	var click = $(this);
	click.addClass('activeCountry');
	var id = click.attr('data-id');
	console.log(id);
	$.ajax({
		url: '/country/detail/get',
		type: 'GET',
		data: {id:id},
		success: function(res){
			console.log(res);
			if(res.success == true){
				$('#updateName').val(res.name);
				$('#updateId').val(res.id);
				$('#countryModal').modal('show');
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

@section('scripts')

@endsection