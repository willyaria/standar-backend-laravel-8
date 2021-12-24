@extends('template.materialpro.template')
@section('content')

<!-- Bootstrap-TouchSpin -->
<link href="{{url('themes/material-pro/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />

<!-- Select2 -->
<link href="{{url('themes/material-pro/assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Bootstrap-Select -->
<link href="{{url('themes/material-pro/assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />

<link href="{{url('themes/material-pro/css/style.css')}}" rel="stylesheet">

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">			
				<div class="form-body">
					<h3 class="box-title">Edit Customize</h3>
					<hr class="m-t-0 m-b-40">
					
					<?php
						foreach ($edit_pos_module as $dt) {
							$id = $dt->id;
							$judul = $dt->title;
							$modul = $dt->module_id;
							$posisi = $dt->position;
							$limit = $dt->limit;
							$ordering = $dt->ordering;
							$halaman = $dt->page;
							$menu = $dt->menu_id;
						}
					?>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Title</label>
								<div class="col-md-8">
									<input type="text" class="form-control" placeholder="Title" name="title_edit" id="title_edit" value="<?php echo $judul ?>" autocomplete="off">
									<input type="text" class="form-control" name="id_edit" id="id_edit" value="<?php echo $id ?>" autocomplete="off">
									<div class="form-control-feedback"><small><code>Required.</code></small></div>
								</div>
							</div>
						</div>
							
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Module</label>
								<div class="col-md-8">
									<select class="form-control text-center select2" name="module_edit" id="module_edit" autocomplete="off">
										<option value=""></option>
										<?php foreach ($module as $m) { ?>
										<option value="<?= $m->id ?>" <?= ($m->id == $modul ? 'selected' : '') ?>><?= $m->filename ?></option>
										<?php } ?>
									</select>
									<div class="form-control-feedback"><small><code>Required.</code></small></div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Limit</label>
								<div class="col-md-4">
									<input type="text" id="limit_edit" name="limit_edit" value="<?php echo $limit ?>" onkeypress="return angkadanhuruf(event,'+0123456789',this)" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" autocomplete="off">
									<div class="form-control-feedback"><small><code>Number Only.</code></small></div>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Ordering</label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="ordering_edit" id="ordering_edit" value="<?php echo $ordering ?>" onkeypress="return angkadanhuruf(event,'+0123456789',this)" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" autocomplete="off">
									<div class="form-control-feedback"><small><code>Number Only.</code></small></div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Position</label>
								<div class="col-md-8">
									<select class="form-control select2" name="position_edit" id="position_edit" autocomplete="off">
										<option value=""></option>
										<option value="header" <?php echo ($posisi == 'header' ? 'selected' : '') ?>>header</option>
										<option value="top-banner" <?php echo ($posisi == 'top-banner' ? 'selected' : '') ?>>top-banner</option>
										<option value="full-banner" <?php echo ($posisi == 'full-banner' ? 'selected' : '') ?>>full-banner</option>
										<option value="skyscrapper" <?php echo ($posisi == 'skyscrapper' ? 'selected' : '') ?>>skyscrapper</option>
										<option value="left1" <?php echo ($posisi == 'left1' ? 'selected' : '') ?>>left1</option>
										<option value="left2" <?php echo ($posisi == 'left2' ? 'selected' : '') ?>>left2</option>
										<option value="left3" <?php echo ($posisi == 'left3' ? 'selected' : '') ?>>left3</option>
										<option value="right1" <?php echo ($posisi == 'right1' ? 'selected' : '') ?>>right1</option>
										<option value="right2" <?php echo ($posisi == 'right2' ? 'selected' : '') ?>>right2</option>
										<option value="right3" <?php echo ($posisi == 'right3' ? 'selected' : '') ?>>right3</option>
										<option value="middle1" <?php echo ($posisi == 'middle1' ? 'selected' : '') ?>>middle1</option>
										<option value="middle2" <?php echo ($posisi == 'middle2' ? 'selected' : '') ?>>middle2</option>
										<option value="middle3" <?php echo ($posisi == 'middle3' ? 'selected' : '') ?>>middle3</option>
										<option value="footer1" <?php echo ($posisi == 'footer1' ? 'selected' : '') ?>>footer1</option>
										<option value="footer2" <?php echo ($posisi == 'footer2' ? 'selected' : '') ?>>footer2</option>
										<option value="footer3" <?php echo ($posisi == 'footer3' ? 'selected' : '') ?>>footer3</option>
									</select>
									<div class="form-control-feedback"><small><code>Required.</code></small></div>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Page</label>
								<div class="col-md-8">
									<select class="form-control text-center select2" name="page_edit" id="page_edit" autocomplete="off">
										<option value=""></option>
										<option value="home" <?php echo ($halaman == 'home' ? 'selected' : '') ?>>Home</option>									
										<option value="detail_hiburan_home" <?php echo ($halaman == 'detail_hiburan_home' ? 'selected' : '') ?>>Detail Hiburan Home</option>									
									</select>
									<div class="form-control-feedback"><small><code>Required.</code></small></div>
								</div>
							</div>
						</div>
					</div>
							
					<div class="row">								
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Menu</label>
								<div class="col-md-8">
									<select class="form-control text-center select2" name="menu_edit" id="menu_edit" autocomplete="off">
										<option value=""></option>
										<?php foreach ($menuu as $m) : ?>
										<option value="<?= $m->id ?>" <?= ($m->id == $menu ? 'selected' : '') ?>><?= $m->menu_name ?></option>
										<?php endforeach; ?>
									</select>
									<div class="form-control-feedback"><small><code>Required.</code></small></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<hr>
				<div class="form-actions">
					<div class="row">
						<div class="col-md-6">

						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" id="submit_btn" class="btn btn-success waves-effect waves-light" onclick="on_save()">Save</button>
									<button type="submit" class="btn btn-inverse" onclick="on_back()">Cancel</button>
								</div>
							</div>
						</div>
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

<!-- Bootstrap-TouchSpin -->
<script src="{{url('themes/material-pro/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>

<!-- Select2 -->
<script src="{{url('themes/material-pro/assets/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>

<!-- Bootstrap-Select -->
<script src="{{url('themes/material-pro/assets/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
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
			url: "{{ url('settings/update_customize') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				judul_u	    	: $("#title_edit").val(),
				modul_u	    	: $("#module_edit").val(),
				lim_u			: $("#limit_edit").val(),
				ord_u		   	: $("#ordering_edit").val(),
				posisi_u		: $("#position_edit").val(),
				halaman_u		: $("#page_edit").val(),
				menu_u		    : $("#menu_edit").val(),
				kode_u		    : $("#id_edit").val(),
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
		if (!$("#title_edit").val()) {
    		$("#title_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Title, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#module_edit").val()) {
    		$("#module_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Choose the Module, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#limit_edit").val()) {
    		$("#limit_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Limit, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#ordering_edit").val()) {
    		$("#ordering_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Ordering, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#position_edit").val()) {
    		$("#position_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Choose the Position, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#page_edit").val()) {
    		$("#page_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Choose the Page, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#menu_edit").val()) {
    		$("#menu_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Choose the Menu, Please !'
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
        var url = '{{ url('/settings/customize') }}';
        window.open(url, "_self");
    }
</script>

<script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        // $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        $("input[name='limit_edit']").TouchSpin();
        $("input[name='ordering_edit']").TouchSpin();
    });
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