@extends('template.materialpro.template')
@section('content')

<!-- Select2 -->
<link href="{{url('themes/material-pro/assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet">

<link href="{{url('themes/material-pro/css/style.css')}}" rel="stylesheet">

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Edit Menu</h4>
				
				<?php
					foreach ($menu_edit as $dt)
					{
						$id = $dt->id;
						$menu = $dt->menu_name;
						$kategori = $dt->category_id;
						$tipe = $dt->type_id;
						$parent = $dt->parent_id;
						$link = $dt->link;
						$sortir = $dt->sortir;
						$publik = $dt->publish;
						$n_view = $dt->not_view;
					}
				?>
				<hr class="m-t-0 m-b-40">
				{{ csrf_field() }}
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Menu Name</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" placeholder="Menu Name" id="nama_menu_edit" name="nama_menu_edit" value="<?php echo $menu ?>" autocomplete="off">
						<input type="text" class="form-control" id="id_edit" name="id_edit" value="<?php echo $id ?>" autocomplete="off">
						<div class="form-control-feedback"><small><code>Required.</code></small></div>					
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Menu Type</label>
					<div class="col-sm-6">
						<select class="select2" id="tipe_menu_edit" name="tipe_menu_edit" onchange="changeTipe(this.value)" style="width: 100%" autocomplete="off">
							<option value=""></option>
							<?php 
								foreach ($menu_type as $dt) 
								{
									if ($dt->id==$tipe) 
									{
										$s='selected'; 
									}
									else
									{
										$s='';
									}
								?>
								<option <?php echo $s ?>  value="<?php echo $dt->id;?>"><?php echo $dt->menu_type_name;?></option>
								<?php
								}
								?>
						</select>
						<input type="hidden" class="form-control" id="tipe_edit" name="tipe_edit" autocomplete="off">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Parent/Child</label>
					<div class="col-sm-6">
						<select class="select2" id="parent_edit" name="parent_edit" onchange="changeParent(this.value)" style="width: 100%" autocomplete="off">
							<?php 
								foreach ($menu_category as $dt) 
								{
									if ($dt->id==$kategori) 
									{
										$s='selected'; 
									}
									else
									{
										$s='';
									}
								?>
								<option <?php echo $s ?>  value="<?php echo $dt->id;?>"><?php echo $dt->menu_category_name;?></option>
								<?php
								}
								?>							
						</select>  
						<input type="text" class="form-control" name="prt_edit" id="prt_edit" autocomplete="off">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Master Data</label>
					<div class="col-sm-6">
						<select class="select2" id="master_data_edit" name="master_data_edit" onchange="changeMaster(this.value)" style="width: 100%" autocomplete="off">				
							<option value=""></option>
							<?php 
								foreach ($master_parent as $dt) 
								{
									if ($dt->id==$parent) 
									{
										$s='selected'; 
									}
									else
									{
										$s='';
									}
								?>
								<option <?php echo $s ?>  value="<?php echo $dt->id;?>|<?php echo $dt->link;?>|"><?php echo $dt->menu_name;?></option>
								<?php
								}
								?>
						</select>      
						<input type="text" class="form-control" id="parent_child_edit" name="parent_child_edit" value="<?php echo $parent ?>" autocomplete="off">	
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Link</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="link_edit" name="link_edit" placeholder="Link" value="<?php echo $link ?>"autocomplete="off">							
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Sortir</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="sortir_edit" name="sortir_edit" placeholder="Sortir" value="<?php echo $sortir ?>" autocomplete="off" onkeypress="return angkadanhuruf(event,'+0123456789',this)">							
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Publish</label>
					<div class="col-sm-6">
						<select class="select2" id="publikasi_edit" name="publikasi_edit" style="width: 100%" autocomplete="off">
							<option value="<?php echo $publik ?>">
								<?php 
									if ($publik=="Yes") { 
										echo "Yes";
									} else if ($publik=="No") {
										echo "No";
									}
								?>
							</option>
							
							<?php if ($publik=="Yes") { ?>
								<option value="No">No</option>
							<?php } else if ($publik=="No") { ?>
								<option value="Yes">Yes</option>
							<?php } ?>
						</select>                          
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Not View</label>
					<div class="col-sm-6 switch">
                        <?php if($n_view==0){ ?>
							<label> 
								<input name="cbapprove" id="cbapprove" onclick="on_approve()" type="checkbox">
								<span class="lever"></span>
							</label>
							<?php } else { ?>
							<label>
								<input name="cbapprove" id="cbapprove" onclick="on_approve()" type="checkbox" checked>
								<span class="lever"></span>
							</label>
							<?php } ?>
							<input type="hidden" class="form-control" name="not_view_edit" id="not_view_edit" value="<?php echo $n_view ?>" autocomplete="off">
					</div>
				</div>
				
				<div class="form-group row m-b-0">
					<div class="col-md-3"></div>
					<div class="col-md-3 m-r-5">	
						<button type="submit" id="submit_btn" class="btn btn-success waves-effect waves-light" onclick="on_save()">Save</button>
						<button type="submit" id="batal_btn" class="btn btn-danger waves-effect waves-light" onclick="on_back()">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- JQuery -->
<script src="{{url('themes/material-pro/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Notify -->
<script src="{{url('themes/material-pro/assets/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- Select2 -->
<script src="{{url('themes/material-pro/assets/plugins/select2/dist/js/select2.min.js')}}"></script>
<script type="text/javascript">

	$(document).ready(function(){ 
		if ($("#parent_edit").val()=="1") { //Parent
			$('#link_edit').prop( "disabled", true );
			$('#master_data_edit').prop( "disabled", true );
			$('#parent_edit').prop( "disabled", true );
			$('#prt_edit').prop( "disabled", true );
			$('#parent_child_edit').prop( "disabled", true );
			$("#prt_edit").val(1);
			$("#parent_child_edit").val(0);
			
			if ($("#tipe_menu_edit option:selected").val()=='1'){ //Backend
				$("#tipe_edit").val(1);			
			} else if ($("#tipe_menu_edit option:selected").val()=='2'){ //Frontend
				$("#tipe_edit").val(2);
			}
		} else if ($("#parent_edit").val()=="2") { //Child
			$("#link_edit").val("<?php echo $link ?>");
			$('#link_edit').prop( "disabled", false );
			$('#master_data_edit').prop( "disabled", false );
			$('#parent_edit').prop( "disabled", true );
			$('#prt_edit').prop( "disabled", true );
			$("#prt_edit").val(2);
			
			if ($("#tipe_menu_edit option:selected").val()=='1'){ //Backend
				$("#tipe_edit").val(1);			
			} else if ($("#tipe_menu_edit option:selected").val()=='2'){ //Frontend
				$("#tipe_edit").val(2);
			} 
		}
	});
	
	function changeParent() {
		if ($("#parent_edit option:selected").val()=="2"){ //Child
			$("#link_edit").val("");
			$('#link_edit').prop( "disabled", false );
			$('#master_data_edit').prop( "disabled", false );
			$("#prt_edit").val(2);			
		} else if ($("#parent_edit option:selected").val()=="1") { //Parent
			$("#link_edit").val("#");
			$('#link_edit').prop( "disabled", true );
			$('#master_data_edit').prop( "disabled", true );
			$("#prt_edit").val(1);
		}
	} 
	
	function changeMaster() {
		var nama = $("#master_data_edit option:selected").val();
		var namanya = nama.split("|");
		// alert(namanya[0]);
		$("#parent_child_edit").val(namanya[0]);	  
	} 
	
	function changeTipe() {
		if ($("#tipe_menu_edit option:selected").val()=='1'){ //Backend
			$("#tipe_edit").val(1);			
		} else if ($("#tipe_menu_edit option:selected").val()=='2'){ //Frontend
			$("#tipe_edit").val(2);
		} 
	}
	
	function on_approve()
	{
		if ($('#cbapprove').is(':checked')) 
		{
			$("#not_view_edit").val(1);
		} 
		else
		{
			$("#not_view_edit").val(0);
		}
	}
	
	$(".select2").select2({
		placeholder:'Select One'
	});
	
	function on_save()
	{
		if (validation_data() == false) return;
		ubah_data();
	}
	
	function ubah_data()
	{
		$.ajax({
			type: "POST",
			url: "{{ url('update_menu') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				id	    		: $("#id_edit").val(),
				menu	    	: $("#nama_menu_edit").val(),
				tp_menu	    	: $("#tipe_edit").val(),
				prt_menu    	: $("#prt_edit").val(),
				prt_chi_menu	: $("#parent_child_edit").val(),
				link	    	: $("#link_edit").val(),
				sortir	    	: $("#sortir_edit").val(),
				pub		    	: $("#publikasi_edit").val(),
				not_view    	: $("#not_view_edit").val(),
			} ,
			success:function(data){ 
				on_back();
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
		if (!$("#nama_menu_edit").val()) {
    		$("#nama_menu_edit").focus();
			$.notify({
				title: '<strong>INFORMASI!</strong>',
				message: 'Harap isi Nama Menu !'
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
	
	function on_back() {
        var url = '{{ url('/menu') }}';
        window.open(url, "_self");
    }
</script>

@endsection