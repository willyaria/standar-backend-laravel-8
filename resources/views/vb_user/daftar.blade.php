@extends('template.materialpro.template')
@section('content')

<div class="row">
	<div class="col-12">
				@if(\Session::has('alert'))
					<div class="alert alert-danger">
						<div>{{Session::get('alert')}}</div>
					</div>
				@endif
				@if(\Session::has('alert-success'))
					<div class="alert alert-success">
						<div>{{Session::get('alert-success')}}</div>
					</div>
				@endif
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Data User</h4>
				<a href="{{ url('/add_user') }}"><button class="btn btn-success waves-effect waves-light">Add</button></a>
				<div class="table-responsive m-t-40">
					<table id="user" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 3%">ID</th>
								<th style="width: 20%">First Name</th>
								<th style="width: 20%">Last Name</th>
								<th style="width: 10%">Gender</th>
								<th style="width: 20%">Address</th>
								<th style="width: 5%">Image</th>
								<th style="width: 15%">Action</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
</div>

<!-- View modal delete -->
<div id="delete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Information Delete</h4>
            </div>
            <div class="modal-body">
                Are you sure deleted data ?<br>
                ID = <label id="hapus_id"></label>
                <input type="hidden" name="id_hapus" id="id_hapus" value=""/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button" id="deleteConfirm" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- JQuery -->
<script src="themes/material-pro/assets/plugins/jquery/jquery.min.js"></script>

<!-- This is data table -->
<script src="themes/material-pro/assets/plugins/datatables/jquery.dataTables.min.js"></script>

<!-- Notify -->
<script src="themes/material-pro/assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script type="text/javascript">
	var table;
	var user_id;
	
    $(document).ready(function() {
		table = $('#user').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ url('user') }}",
			columns: 
			[
				{ data: 'id', name: 'id' },
				// // Menggabungkan 2 field berbeda untuk ditampilkan menjadi 1 kolom
				// { data: null, render: function ( data, type, row ) {					
					// return data.first_name+' '+data.last_name;
				// } },                
				{ data: 'first_name', name: 'first_name' },
				{ data: 'last_name', name: 'last_name' },
				{ data: 'gender', name: 'gender' },
				{ data: 'address', name: 'address' },
				{ data: 'image', name: 'image',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"{{ url('/') }}" + data + "\" height=\"50\" class=\"img-circle\"  height=\"50\" width=\"50\"/>";
                    }
                },
				{ data: 'action', name: 'action' }
			]
		});
        
    });
	
	//Menuju ke halaman profil detail
	$(document).on('click', '.edit', function(){
		user_id = $(this).attr('id');
		var url = "profil_user/"+user_id;
        window.open(url, "_self");		
	});
	
	//Menampilkan view modal untuk delete
	$(document).on('click', '.delete', function(){
		user_id = $(this).attr('id');
		$('#id_hapus').val(user_id);
        $('#hapus_id').html(user_id);
        $('#delete_modal').modal('show');
	});
	
	//Proses delete
	$('#deleteConfirm').click(function(){
		$.ajax({
			url:"hapus_user/"+user_id,
			beforeSend:function(){
				
			},
			success:function(data)
			{
				table.ajax.reload(null,false);
				$.notify({
					title: '<strong>INFORMATION!</strong>',
					message: 'Successfully.'
				},{
					type: 'success',
                    placement: {
                        from: "top",
                        align: "center"
                    }
				});
			}, 
			complete:function () {

            } 
		})
	});
	
	//Menuju ke halaman change password
	$(document).on('click', '.change_pass', function(){
		user_id = $(this).attr('id');
		var url = "edit_password/"+user_id;
        window.open(url, "_self");		
	});
	
	//Menuju ke halaman level user
	$(document).on('click', '.level_user', function(){
		user_id = $(this).attr('id');
		var url = "level/"+user_id;
        window.open(url, "_self");		
	});
	
	//Menuju ke halaman level user edit
	$(document).on('click', '.level_user_edit', function(){
		user_id = $(this).attr('id');
		var url = "level_edit/"+user_id;
        window.open(url, "_self");		
	});
	
	//Menuju ke halaman Setting Menu
	$(document).on('click', '.set_menu', function(){
		user_id = $(this).attr('id');
		var url = "menu_setting/"+user_id;
        window.open(url, "_self");		
	});
   
</script>

    
@endsection