@extends('template.materialpro.template')
@section('content')

<!-- Select2 -->
<link href="themes/material-pro/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">

<link href="themes/material-pro/css/style.css" rel="stylesheet">

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Menu</h4>
				
				<?php
					foreach ($max_kode as $dt) {
						$no= $dt->maxKode;
					}
					
					$noUrut = floatval($no)+1;
					$nomorbaru = $noUrut;
				?>
				
				<hr class="m-t-0 m-b-40">
				{{ csrf_field() }}
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Menu Name</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" placeholder="Menu Name" name="menu_name" id="menu_name" autocomplete="off">
						<input type="text" class="form-control" id="kode_menu" name="kode_menu" placeholder="Nama Menu" value="<?php echo $nomorbaru ?>" autocomplete="off">
						<div class="form-control-feedback"><small><code>Required.</code></small></div>					
					</div>
				</div>
					
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Menu Type</label>
					<div class="col-sm-6">
						<select class="select2" id="menu_type" name="menu_type" style="width: 100%" autocomplete="off">
							<option value=""></option>
							<?php 
							foreach ($menu_type as $dt) {
							?>
								<option value="<?php echo $dt->id;?>"><?php echo $dt->menu_type_name;?></option>
							<?php
								}
							?>
						</select> 
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Parent/Child</label>
					<div class="col-sm-6">
						<select class="select2" id="parent" name="parent" onchange="changeParent(this.value)" style="width: 100%" autocomplete="off">
							<option value=""></option>
							<option value="0">Parent</option>
							<option value="1">Child</option>							
						</select>  
						<input type="text" class="form-control" name="prt" id="prt" autocomplete="off">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Master Data</label>
					<div class="col-sm-6">
						<select class="select2" id="master_data" name="master_data" onchange="changeMaster(this.value)" style="width: 100%" autocomplete="off">				
							<option value=""></option>
							<?php 
								foreach ($master_parent as $dt) 
								{			
							?>
								<option value="<?php echo $dt->id;?>|<?php echo $dt->menu_name;?>"><?php echo $dt->menu_name;?></option>
							<?php
								}
							?>
						</select>      
						<input type="text" class="form-control" id="parent_child" name="parent_child" autocomplete="off">	
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Link</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="link" name="link" placeholder="Link" autocomplete="off">							
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Sortir</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="sortir" name="sortir" placeholder="Sortir" autocomplete="off" onkeypress="return angkadanhuruf(event,'+0123456789',this)">							
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Publish</label>
					<div class="col-sm-6">
						<select class="select2" id="publish" name="publish" style="width: 100%" autocomplete="off">
							<option value=""></option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>                          
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Not View</label>
					<div class="col-sm-6 switch">
                        <label> 
							<input name="cbapprove" id="cbapprove" onclick="on_approve()" type="checkbox">
							<span class="lever"></span>
						</label>
						<input type="text" class="form-control" name="not_view" id="not_view" autocomplete="off">
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
<script src="themes/material-pro/assets/plugins/jquery/jquery.min.js"></script>

<!-- Notify -->
<script src="themes/material-pro/assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Select2 -->
<script src="themes/material-pro/assets/plugins/select2/dist/js/select2.min.js"></script>
<script type="text/javascript">
	
	$(document).ready(function(){ 
		
		//Kondisi field master_data disabled ketika halaman dibuka 
		if (!$("#parent").val()) {
			$('#master_data').prop( "disabled", true );
		}
		//End
		
		//Kondisi jika field parent/child dipilih parent maka field master_data dan link akan disabled 
		$('#parent').change(function() {
			if( $(this).val() == "0") { //0 = Parent			
				$("#link").val("#");
				$('#link').prop( "disabled", true );
				$('#master_data').prop( "disabled", true );				
			}
			//Kondisi jika field parent/child dipilih child maka field master_data dan link akan enabled
			else { //1 = Child
				$("#link").val("");
				$('#link').prop( "disabled", false );
				$('#master_data').prop( "disabled", false );
			}
		});
		//End
	});
	
	function on_approve()
	{
		if ($('#cbapprove').is(':checked')) 
		{
			$("#not_view").val(1);
		} 
		else
		{
			$("#not_view").val(0);
		}
	}
	
	$(".select2").select2({
		placeholder:'Select One'
	});
	
	function changeParent() {
		//Kondisi jika field parent/child dipilih parent maka field prt bernilai 1 dan field parent_child bernilai 0
		if ($("#parent option:selected").val()=='0'){ //0 = Parent
			$("#prt").val(1);
			$("#parent_child").val(0);
		} 
		//Kondisi jika field parent/child dipilih child maka field prt bernilai 2 dan field parent_child bernilai NULL
		else if ($("#parent option:selected").val()=='1'){ //1 = Child
			$("#prt").val(2);
			$("#parent_child").val("");
		}
		//End
	}
	
	//Mengambil nilai value pada field master_data
	function changeMaster() {
		var nama = $("#master_data option:selected").val();
		var namanya = nama.split("|");
		// alert(namanya[0]);
		$("#parent_child").val(namanya[0]);	
	}
	//End
	
	//Proses untuk mengecek nama menu di database sudah ada atau belum
	function cek_menu(){
		$url = '{{ url('/cek_menu') }}';

		$.post($url,{ 
			"_token"	: "{{ csrf_token() }}",
			menu		: $("#menu_name").val()			
			}, function(data, status){
				if (data==1) 
				{ 
					alert("Nama Menu Sudah Ada..!! ");
					$("#menu_name").focus(); return false ; 
				}
				else
				{	
					simpan_data();
				}			
            });
	}
	//End
	
	function on_save()
	{
		if (validation_data() == false) return;
		if (cek_menu()== false ) return ;
	}
	
	function simpan_data()
	{
		$.ajax({
			type: "POST",
			url: "{{ url('create_menu') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				m_name	    	: $("#menu_name").val(),
				m_type	        : $("#menu_type").val(),
				parent		   	: $("#parent").val(),
				// m_data	   		: $("#master_data").val(),
				link	    	: $("#link").val(),
				sor		    	: $("#sortir").val(),
				pub		    	: $("#publish").val(),
				prt				: $("#prt").val(),
				p_child			: $("#parent_child").val(),
				n_view			: $("#not_view").val(),
				kd_menu			: $("#kode_menu").val(),
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
		if (!$("#menu_name").val()) {
    		$("#menu_name").focus();
			$.notify({
				title: '<strong>INFORMASI!</strong>',
				message: 'Fill the Menu Name, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} 
		 else if (!$("#menu_type").val()) {
			$("#menu_type").focus();
			$.notify({
				title: '<strong>INFORMASI!</strong>',
				message: 'Choose Menu Type, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});		
			return false;
		}
		 else if (!$("#parent").val()) {
			$("#parent").focus();
			$.notify({
				title: '<strong>INFORMASI!</strong>',
				message: 'Choose Parent/Child, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});		
			return false;
		}
		// else if (!$("#link").val()) {
			// $("#link").focus();
			// $.notify({
				// title: '<strong>INFORMASI!</strong>',
				// message: 'Fill the Link, Please !'
			// },{
				// type: 'danger',
                // placement: {
                    // from: "top",
                    // align: "center"
                // }
			// });		
			// return false;
		// }
		else if (!$("#sortir").val()) {
			$("#sortir").focus();
			$.notify({
				title: '<strong>INFORMASI!</strong>',
				message: 'Fill the Sortir, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});		
			return false;
		}
		else if (!$("#publish").val()) {
			$("#publish").focus();
			$.notify({
				title: '<strong>INFORMASI!</strong>',
				message: 'Choose Publish Yes or No, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});		
			return false;
		}
		// else if (!$("#not_view").val()) {
			// $("#not_view").focus();
			// $.notify({
				// title: '<strong>INFORMASI!</strong>',
				// message: 'Choose Not View Yes or No, Please !'
			// },{
				// type: 'danger',
                // placement: {
                    // from: "top",
                    // align: "center"
                // }
			// });		
			// return false;
		// }
	}
	
	function on_back() {
        var url = '{{ url('/menu') }}';
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