@extends('template.materialpro.template')
@section('content')

<!-- Select2 -->
<link href="{{url('themes/material-pro/assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet">

<link href="{{url('themes/material-pro/css/style.css')}}" rel="stylesheet">

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Edit Menu Settings</h4>
				
				<hr class="m-t-0 m-b-40">
				{{ csrf_field() }}
				
				<?php
					foreach ($get_edit as $dt) {
						$id = $dt->id;
						$n_name = $dt->menu_name;
						$parent=$dt->parent_id;
						$menutipe=$dt->menu_type_id;
						$groupmenu=$dt->group_menu_id;
						$sortir=$dt->sortir;
						$link=$dt->link;
						$pub=$dt->publish;
					}
				?>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Menu Name</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" placeholder="Menu Name" name="nama_menu_edit" id="nama_menu_edit" value="<?php echo $n_name ?>" autocomplete="off">
						<input type="text" class="form-control" name="id" id="id" value="<?php echo $id ?>" autocomplete="off">
						<div class="form-control-feedback"><small><code>Required.</code></small></div>					
					</div>
				</div>
				
				<?php if($menutipe==2){ ?>
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Parent</label>
					<div class="col-md-4">
						<select class="form-control text-center select2" name="parentedit" id="parentidedit">
							<option value="0">as Parent</option>
							<?php foreach ($parentidfe as $pfe) { ?>
                                <option value="<?= $pfe->id ?>" <?= ($pfe->id == $parent ? 'selected' : '') ?>><?= $pfe->menu_name ?></option>
                            <?php } ?>
						</select>
					</div>
				</div>
				<?php }else if($menutipe==1){ ?>
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Parent</label>
					<div class="col-md-4">
						<select class="form-control text-center select2" name="parentedit" id="parentidedit">
							<option value="0">as Parent</option>
							<?php foreach ($parentidbe as $pbe) { ?>
                                 <option value="<?= $pbe->id ?>" <?= ($pbe->id == $parent ? 'selected' : '') ?>><?= $pbe->menu_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<?php } ?>
				
				<?php if($menutipe==2){ ?>
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Group Menu</label>
					<div class="col-sm-4">
						<select class="form-control text-center select2" name="groupmenuedit" id="groupmenuedit">
							<option value=""></option>
							<?php foreach ($menugroup as $group) { ?>
                                <option value="<?= $group->id; ?>" <?= ($group->id == $groupmenu ? 'selected' : '') ?>><?= $group->menu_group_name; ?></option>
                            <?php } ?>
						</select>
					</div>
				</div>
				<?php } else if($menutipe==1){ ?>
					<!-- -->
				
				<?php } ?>
				
				<div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">Sortir</label>
                    <div class="col-sm-3">
                       <input type="text" class="form-control" name="sortiredit" id="sortiredit" placeholder="Sortir" value="<?php echo $sortir ?>" onkeypress="return angkadanhuruf(event,'+0123456789',this)">
                    </div>
                </div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Link</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="linkedit" id="linkedit" placeholder="Link" value="<?php echo $link ?>">
					</div>
				</div>
				
				<div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">Type Menu</label>
                    <div class="col-sm-4">
                        <select class="form-control text-center select2" name="typemenuedit" id="typemenuedit">
							<option value="">Type Menu</option>
							<?php foreach ($typemenu as $t) { ?>
								<option value="<?= $t->id ?>" <?= ($t->id == $menutipe ? 'selected' : '') ?>><?= $t->menu_type_name ?></option>
							<?php } ?>
                        </select>
                    </div>
                </div>
				
				<div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">Publish</label>
                    <div class="col-sm-4">
                        <select class="form-control text-center select2" name="publishedit" id="publishedit" style="width: 100%">
						<?php 
							foreach ($datapublish as $pub) { ?>
                            <option value=""></option>
                            <option value="<?php echo $pub->publish ?>" selected>
								<?php if ($pub->publish=="Yes"){ 
									echo"Yes";
								}else{
									echo"No";
								} ?>
							</option>
							<?php if($pub->publish=="Yes"){ ?>
								<option value="No">No</option>
							<?php }else{ ?>
								<option value="Yes">Yes</option>
							<?php } } ?>
                        </select>                            
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
	
	});
	
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
			url: "{{ url('settings/update_menus_frontend') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				id	    		: $("#id").val(),
				nm_menu	    	: $("#nama_menu_edit").val(),
				parent	    	: $("#parentidedit").val(),
				groupmenu    	: $("#groupmenuedit").val(),
				sort			: $("#sortiredit").val(),
				link	    	: $("#linkedit").val(),
				typemenu	   	: $("#typemenuedit").val(),
				pub		    	: $("#publishedit").val(),
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
		} else if (!$("#groupmenuedit").val()) {
    		$("#groupmenuedit").focus();
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
		} else if (!$("#sortiredit").val()) {
    		$("#sortiredit").focus();
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
		} else if (!$("#linkedit").val()) {
    		$("#linkedit").focus();
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
		} else if (!$("#publishedit").val()) {
    		$("#publishedit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Choose Publish, Please !'
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
	
	function on_back() 
	{
        var url = '{{ url('/settings/menus') }}';
        window.open(url, "_self");
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