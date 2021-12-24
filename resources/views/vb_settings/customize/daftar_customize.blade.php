@extends('template.materialpro.template')
@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Data Customize</h4>
				<a href="{{ url('/settings/add_customize') }}"><button class="btn btn-success waves-effect waves-light">Add</button></a>
				<h6 class="card-subtitle"></h6>
				<div class="table-responsive m-t-40">
					<table id="customize" class="table table-bordered table-hover">
						<thead>
							<tr class="style1">
								<th style="width: 5%">ID</th>
								<th style="width: 15%">Name</th>
								<th style="width: 5%">Page</th>
								<th style="width: 5%">Position</th>
								<th style="width: 5%">Ordering</th>							
								<th style="width: 10%">Aksi</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
				<div style="height:10px">
					<div class="progress-bar bg-info active progress-bar-striped" id="progressbottom" style="width: 100%; height:8px; display:none;" role="progressbar"></div>
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
<script src="{{url('themes/material-pro/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- This is data table -->
<script src="{{url('themes/material-pro/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<!-- Notify -->
<script src="{{url('themes/material-pro/assets/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript">
	var table;
	
	$(document).ready(function() {
		table = $('#customize').DataTable({
			processing: true,
			serverSide: true,
			"ordering": 'true',
			"order": [0, 'desc'],
			ajax: "{{ url('settings/customize') }}",
			columns: 
			[
				{ data: 'id', name: 'id' },               
				{ data: 'title', name: 'title' },
				{ data: 'page', name: 'page' },
				{ data: 'position', name: 'position' },
				{ data: 'ordering', name: 'ordering' },
				{ data: 'action', name: 'action' }
			]
		}); 
	});
	
	//Menuju ke halaman edit
	$(document).on('click', '.edit', function(){
		user_id = $(this).attr('id');
		var url = "edit_customize/"+user_id;
        window.open(url, "_self");		
	});
	
	$(document).on('click', '.delete', function(){
		idg = $(this).attr('id');
		$('#id_hapus').val(idg);
        $('#hapus_id').html(idg);
        $('#delete_modal').modal('show');
	});
	
	$('#deleteConfirm').click(function(){
		$.ajax({
			url:"hapus_customize/"+idg,
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
</script>

@endsection