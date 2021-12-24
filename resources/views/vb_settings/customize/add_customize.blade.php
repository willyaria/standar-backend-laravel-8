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
					<h3 class="box-title">Customize</h3>
					<hr class="m-t-0 m-b-40">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Title</label>
								<div class="col-md-8">
									<input type="text" class="form-control" placeholder="Title" name="title" id="title" autocomplete="off">
									<div class="form-control-feedback"><small><code>Required.</code></small></div>
								</div>
							</div>
						</div>
							
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Module</label>
								<div class="col-md-8">
									<select class="form-control text-center select2" name="module" id="module" autocomplete="off">
										<option value=""></option>
										<?php foreach ($module as $m) { ?>
										<option value="<?=$m->id ?>"><?=$m->filename ?></option>
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
									<input type="text" id="limit" name="limit" onkeypress="return angkadanhuruf(event,'+0123456789',this)" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" autocomplete="off">
									<div class="form-control-feedback"><small><code>Number Only.</code></small></div>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Ordering</label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="ordering" id="ordering" onkeypress="return angkadanhuruf(event,'+0123456789',this)" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" autocomplete="off">
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
									<select class="form-control select2" name="position" id="position" autocomplete="off">
										<option value=""></option>
										<option value="header">header</option>
										<option value="top-banner">top-banner</option>
										<option value="full-banner">full-banner</option>
										<option value="skyscrapper">skyscrapper</option>
										<option value="left1">left1</option>
										<option value="left2">left2</option>
										<option value="left3">left3</option>
										<option value="right1">right1</option>
										<option value="right2">right2</option>
										<option value="right3">right3</option>
										<option value="middle1">middle1</option>
										<option value="middle2">middle2</option>
										<option value="middle3">middle3</option>
										<option value="footer1">footer1</option>
										<option value="footer2">footer2</option>
										<option value="footer3">footer3</option>
									</select>
									<div class="form-control-feedback"><small><code>Required.</code></small></div>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Page</label>
								<div class="col-md-8">
									<select class="form-control text-center select2" name="page" id="page" autocomplete="off">
										<option value=""></option>
										<option value="home">Home</option>
										<option value="detail_hiburan_home">Detail Hiburan Home</option>
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
									<select class="form-control text-center select2" name="menu" id="menu" autocomplete="off">
										<option value=""></option>
										<?php foreach ($menu as $t) { ?>
										<option value="<?=$t->id ?>"><?=$t->menu_name ?></option>
										<?php } ?>
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
		simpan_data(); 
	}
	
	function simpan_data()
	{
		$.ajax({
			type: "POST",
			url: "{{ url('settings/create_customize') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				judul	    	: $("#title").val(),
				modul	    	: $("#module").val(),
				lim			    : $("#limit").val(),
				ord		    	: $("#ordering").val(),
				posisi		    : $("#position").val(),
				halaman		    : $("#page").val(),
				menu		    : $("#menu").val(),
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
		if (!$("#title").val()) {
    		$("#title").focus();
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
		} else if (!$("#module").val()) {
    		$("#module").focus();
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
		} else if (!$("#limit").val()) {
    		$("#limit").focus();
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
		} else if (!$("#ordering").val()) {
    		$("#ordering").focus();
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
		} else if (!$("#position").val()) {
    		$("#position").focus();
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
		} else if (!$("#page").val()) {
    		$("#page").focus();
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
		} else if (!$("#menu").val()) {
    		$("#menu").focus();
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
        $("input[name='limit']").TouchSpin();
        $("input[name='ordering']").TouchSpin();
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