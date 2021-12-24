@extends('template.materialpro.template')
@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Data Menu Settings</h4>
				<a href="" data-toggle="modal" data-target="#menu-modal"><button class="btn btn-success waves-effect waves-light">Add</button></a>
				
				<!-- tambah menu modal content -->          
				<div class="modal fade" id="menu-modal" tabindex="-1" role="dialog" aria-labelledby="MenuLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<!--   <h4 class="modal-title" id="MenuLabel">Pilih Menu</h4> -->
							</div>
							<div class="modal-body">
								<div class="form-actions">
									<div class="row text-center">
										<div class="col-md-12">
											<button type="button" class="btn btn-info" data-toggle="modal" data-target="#input-frontend">Frontend</button>
										</div>
									<!-- <div class="col-md-4">
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#input-backend">Backend</button>
									 </div>
									 <div class="col-md-4">
										<button type="button" class="btn btn-inverse" data-toggle="modal" data-target="#input-mobile">Mobile</button>
									 </div> -->
									</div>
								</div>
							</div>
							<div class="modal-footer">
							   <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			   
			   
			    <!-- modal input frontend -->            
				<div id="input-frontend" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="frontendModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
							   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							   <h4 class="modal-title" id="frontendModalLabel">Form Input Menu Frontend</h4>
							</div>
							<div class="modal-body">
								<?php									
									foreach ($max_id as $dt) {
										$no = $dt->maxKode;
									}
									$noUrut = floatval($no)+1;
									$nomorbaru = $noUrut
								?>
					
								<div class="form-group row">
									<label class="col-sm-3 text-right control-label col-form-label">Menu Name</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" required="true" id="nama_menu" name="nama_menu" placeholder="Menu Name" autocomplete="off">
										<input type="text" class="form-control" id="kode_menu" name="kode_menu" value="<?php echo $nomorbaru ?>" autocomplete="off">	
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 text-right control-label col-form-label">Parent ID</label>
									<div class="col-sm-4">
										<select class="form-control text-center custom-select" id="parent_id" name="parent_id">
											<option value="" selected>Select One</option>
											<option value="0">as Parent</option>
											<?php foreach ($parentidfe as $parent) { ?>
											   <option value="<?php echo $parent->id; ?>"><?php echo $parent->menu_name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 text-right control-label col-form-label">Group Menu</label>
									<div class="col-sm-4">
										<select class="form-control text-center custom-select" id="groupmenu_id" name="groupmenu_id">
											<option value="">Select One</option>
											<?php foreach ($menugroup as $group) { ?>
											   <option value="<?= $group->id; ?>"><?= $group->menu_group_name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 text-right control-label col-form-label">Sortir</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="sortir" name="sortir" placeholder="Sortir" onkeypress="return angkadanhuruf(event,'+0123456789',this)" autocomplete="off">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 text-right control-label col-form-label">Link</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="link" name="link" placeholder="Link" autocomplete="off">
										<div class="form-control-feedback"><small>Example : (folderview.filename) / XXXX.XXXX</small></div>	
									</div>
								</div>

							<!--   <div class="form-group row">
								  <label class="col-sm-3 text-right control-label col-form-label">Unit Business</label>
								  <div class="col-sm-4">
									 <select class="form-control text-center custom-select" name="ubis_id" id="ubis_id">
										<option value="" selected>Pilih Unit Business</option>
										
									 </select>
								  </div>
							   </div> -->

							</div>
							<div class="modal-footer">
							   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							   <button type="button" type="submit" class="btn btn-primary" onclick="save_frontend()">Save</button>
							</div>
						</div>
					</div>
				</div>

				
				<div class="table-responsive m-t-40">
					<table id="menus" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 3%">ID</th>
								<th style="width: 15%">Title</th>
								<th style="width: 20%">Link</th>
								<th style="width: 10%">Parent ID</th>
								<th style="width: 10%">Type</th>
								<th style="width: 10%">Group</th>
								<th style="width: 10%">Sortir</th>
								<th style="width: 10%">Published</th>
								<th style="width: 12%">Action</th>
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
<script src="{{url('themes/material-pro/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- This is data table -->
<script src="{{url('themes/material-pro/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<!-- Notify -->
<script src="{{url('themes/material-pro/assets/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript">
	var table;
	
	$(document).ready(function() {
		table = $('#menus').DataTable({
			processing: true,
			serverSide: true,
			"ordering": 'true',
			"order": [0, 'desc'],
			ajax: "{{ url('settings/menus') }}",
			columns: 
			[
				{ data: 'id', name: 'id' },               
				{ data: 'menu_name', name: 'menu_name' },
				{ data: 'link', name: 'link' },
				{ data: 'parent_id', name: 'parent_id' },
				{ data: 'typemenu', name: 'typemenu' },
				{ data: 'groupmenu', name: 'groupmenu' },
				{ data: 'sortir', name: 'sortir' },
				{ data: 'publish', name: 'publish' },
				{ data: 'action', name: 'action' }
			]
		});     
    });
	
	//Menuju ke halaman edit
	$(document).on('click', '.edit', function(){
		user_id = $(this).attr('id');
		var url = "edit_menus_frontend/"+user_id;
        window.open(url, "_self");		
	});
	
	//Proses delete
	$(document).on('click', '.delete', function(){
		idg = $(this).attr('id');
		$('#id_hapus').val(idg);
        $('#hapus_id').html(idg);
        $('#delete_modal').modal('show');
	});
	
	$('#deleteConfirm').click(function(){
		$.ajax({
			url:"hapus_menus_frontend/"+idg,
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
	
	function save_frontend()
	{
		if (validation_data() == false) return;
		simpan_data(); 
	}
	
	function simpan_data()
	{
		$.ajax({
			type: "POST",
			url: "{{ url('settings/create_menus_frontend') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				nm_menu	    	: $("#nama_menu").val(),
				parent	    	: $("#parent_id").val(),
				groupmenu	    : $("#groupmenu_id").val(),
				sort	    	: $("#sortir").val(),
				link		    : $("#link").val(),
				kd_menu		    : $("#kode_menu").val(),
			} ,
			success:function(data){ 
				table.ajax.reload();
				$('#input-frontend').modal('hide');
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
            statusCode: {
				404: function() {

					$.notify({
						title: '<strong>Failed 404</strong>',
						message: 'Save Failed.'
					},{
						type: 'danger',
                        placement: {
                            from: "top",
                            align: "center"
                        }
					});

				},
				500: function() {
					$.notify({
						title: '<strong>Failed 500</strong>',
						message: 'Save Failed.'
					},{
						type: 'danger',
                        placement: {
                            from: "top",
                            align: "center"
                        }
					});
				}
			},
			complete:function () {
			}
        });
	}
	
	function validation_data()
	{
		if (!$("#nama_menu").val()) {
    		$("#nama_menu").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Menu Name, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#parent_id").val()) {
    		$("#parent_id").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Choose Parent ID, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#groupmenu_id").val()) {
    		$("#groupmenu_id").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Choose Group Menu, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#sortir").val()) {
    		$("#sortir").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Sortir, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#link").val()) {
    		$("#link").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Link, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		}
	}
</script>

<script language="javascript">
	function getkey(e)
	{
		if (window.event)
		   return window.event.keyCode;
		else if (e)
		   return e.which;
		else
		   return null;
	}

	function angkadanhuruf(e, goods, field)
	{
		var angka, karakterangka;
		angka = getkey(e);
		if (angka == null) return true;
		 
		karakterangka = String.fromCharCode(angka);
		karakterangka = karakterangka.toLowerCase();
		goods = goods.toLowerCase();
		 
		// check goodkeys
		if (goods.indexOf(karakterangka) != -1)
			return true;
		// control angka
		if ( angka==null || angka==0 || angka==8 || angka==9 || angka==27 )
		   return true;
			
		if (angka == 13) {
			var i;
			for (i = 0; i < field.form.elements.length; i++)
				if (field == field.form.elements[i])
					break;
			i = (i + 1) % field.form.elements.length;
			field.form.elements[i].focus();
			return false;
			};
		return false;
	}
</script>


@endsection