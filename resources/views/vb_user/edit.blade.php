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
				<h4 class="card-title">Edit User</h4>
				
				@if (count($errors) > 0)
					<ul>
					@foreach ($errors->all() as $error)
					<li><code>{{ $error }}</code></li>
					@endforeach
					</ul>
				@endif
				
				<hr class="m-t-0 m-b-40">

				
				<?php
					foreach($user_edit as $dt) {
						$id=$dt->id;
						$nik=$dt->nik;
						$nm_dpn=$dt->first_name;
						$nm_blkg=$dt->last_name;
						$gdr=$dt->gender;
						$adr=$dt->address;
						$username=$dt->username;
						$telp=$dt->telp;
						$email=$dt->email;
						$hp=$dt->handphone;
						$pla_birth=$dt->place_birth;
						$date_birth=$dt->date_birth;
						$age=$dt->age;
						$rel=$dt->religion;
						$mar=$dt->married;
						$ima=$dt->image;
						$fb=$dt->facebook;
						$twit=$dt->twitter;
						$ig=$dt->instagram;
						$you=$dt->youtube;
					}
				?>
				
				<form method="POST" action="{{ url('update_user_tanpa_ajax') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
				
					<div class="form-body">	 
						<h3 class="box-title">Biodata Diri</h3>
						<hr class="m-t-0 m-b-40">
						
						<div class="row">
							<div class="col-4">		
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Edit</h4>
										<label for="input-file-now">Input Photo</label>
										@if ($errors->has('image_edit'))
											<code>{{ $errors->first('image_edit') }}</code>
										@endif
										<input type="file" id="image_edit" name="image_edit"/>
										<img id="preview_image" src="{{ url('/') }}<?= $ima ?>" alt="Preview image here" width="245px"/>
									</div> 
								</div>			
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">First Name</label>
									<div class="col-md-8">
										<input type="text" class="form-control" placeholder="First Name" name="first_name_edit" id="first_name_edit" value="<?php echo $nm_dpn ?>" autocomplete="off">
										<input type="hidden" class="form-control" name="id_user" id="id_user" value="<?php echo $id ?>" autocomplete="off">
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('first_name_edit'))
											<code>{{ $errors->first('first_name_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Last Name</label>
									<div class="col-md-8">
										<input type="text" class="form-control" placeholder="Last Name" value="<?php echo $nm_blkg ?>" name="last_name_edit" id="last_name_edit" autocomplete="off">
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('last_name_edit'))
											<code>{{ $errors->first('last_name_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Username</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="ti-user"></i></div>
											<input type="text" class="form-control" value="<?php echo $username ?>" name="username_edit" id="username_edit" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('username_edit'))
											<code>{{ $errors->first('username_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>

						<!--	<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Password</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="ti-lock"></i></div>
											<input type="password" class="form-control" name="password" id="password" autocomplete="off" >
										</div>
										<div class="form-control-feedback"><small><code>Harus diisi.</code></small></div>
									</div>														
								</div>
							</div> -->
						</div> 

						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">NIK</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="ti-id-badge"></i></div>
											<input type="text" class="form-control" value="<?php echo $nik ?>" name="nik" id="nik" readonly autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Handphone</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="ti-mobile"></i></div>
											<input type="text" class="form-control" value="<?php echo $hp ?>" name="handphone_edit" id="handphone_edit" onkeypress="return angkadanhuruf(event,'+0123456789',this)" maxlength="13" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('handphone_edit'))
											<code>{{ $errors->first('handphone_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Email</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="ti-email"></i></div>
											<input type="email" class="form-control" value="<?php echo $email ?>" name="email_edit" id="email_edit" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('email_edit'))
											<code>{{ $errors->first('email_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Telp</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="icon-phone"></i></div>
											<input type="text" class="form-control" value="<?php echo $telp ?>" name="telp_edit" id="telp_edit" onkeypress="return angkadanhuruf(event,'+0123456789',this)" maxlength="15" autocomplete="off" >
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Place Birth</label>
									<div class="col-md-8">
										<div class="input-group">
											<input type="text" class="form-control" value="<?php echo $pla_birth ?>" name="place_birth_edit" id="place_birth_edit" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('place_birth_edit'))
											<code>{{ $errors->first('place_birth_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Date Birth</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="icon-emotsmile"></i></div>
											<input type="date" class="form-control" value="<?php echo $date_birth ?>" name="date_birth_edit" id="date_birth_edit" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('date_birth_edit'))
											<code>{{ $errors->first('date_birth_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Age</label>
									<div class="col-md-8">
										<div class="input-group">
											<input type="text" class="form-control" value="<?php echo $age ?>" name="age_edit" id="age_edit" onkeypress="return angkadanhuruf(event,'+0123456789',this)" maxlength="2" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('age_edit'))
											<code>{{ $errors->first('age_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Gender</label>
									<div class="col-md-8">
										<select class="form-control custom-select md-4" id="gender_edit" name="gender_edit" autocomplete="off">
											<option value="<?php echo $gdr ?>" selected>
												<?php
													if ($gdr=="Laki-laki") {
														echo "Laki-laki";
													} else if ($gdr=="Perempuan") {
														echo "Perempuan";
													}
												?>
											</option>
											
											<?php if ($gdr=="Laki-laki") { ?>
											<option value="Perempuan">Perempuan</option>
											<?php } else if ($gdr=="Perempuan") { ?>
											<option value="Laki-laki">Laki-laki</option>
											<?php } ?>
										</select>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('gender_edit'))
											<code>{{ $errors->first('gender_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Religion</label>
									<div class="col-md-8">
										<select class="form-control custom-select md-4" name="religion_edit" id="religion_edit">
											<option value="<?php echo $rel ?>" selected>
												<?php
													if ($rel=="Islam") {
														echo "Islam";
													} else if ($rel=="Kristen") {
														echo "Kristen";
													} else if ($rel=="Katolik") {
														echo "Katolik";
													} else if ($rel=="Hindu") {
														echo "Hindu";
													} else if ($rel=="Budha") {
														echo "Budha";
													} else if ($rel=="Konghucu") {
														echo "Konghucu";
													}
												?>
											</option>
											
											<?php if ($rel=="Islam") { ?>
											<option value="Kristen">Kristen</option>
											<option value="Katolik">Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>
											<option value="Konghucu">Konghucu</option>
											<?php } else if ($rel=="Kristen") { ?>
											<option value="Islam">Islam</option>
											<option value="Katolik">Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>
											<option value="Konghucu">Konghucu</option>
											<?php } else if ($rel=="Katolik") { ?>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>
											<option value="Konghucu">Konghucu</option>
											<?php } else if ($rel=="Hindu") { ?>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Katolik">Katolik</option>
											<option value="Budha">Budha</option>
											<option value="Konghucu">Konghucu</option>
											<?php } else if ($rel=="Budha") { ?>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Katolik">Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Konghucu">Konghucu</option>
											<?php } else if ($rel=="Konghucu") { ?>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Katolik">Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>
											<?php } ?>
										</select>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('religion_edit'))
											<code>{{ $errors->first('religion_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Married</label>
									<div class="col-md-8">
										<select class="form-control custom-select md-4" name="married_edit" id="married_edit">
											<option value="<?php echo $mar ?>">
												<?php
													if ($mar=="Single") {
														echo "Single";
													} else if ($mar=="Married") {
														echo "Married";
													}
												?>
											</option>
											
											<?php if ($mar=="Single") { ?>
											<option value="Married">Married</option>
											<?php } else if ($mar=="Married") { ?>
											<option value="Single">Single</option>
											<?php } ?>
										</select>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('married_edit'))
											<code>{{ $errors->first('married_edit') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label class="control-label text-left col-md-2">Address</label>
							<div class="col-md-10">
								<textarea class="form-control" name="address_edit" id="address_edit" rows="4" placeholder="Completed Address" autocomplete="off"><?php echo $adr ?></textarea>
								<div class="form-control-feedback"><small><code>Required.</code></small>
								@if ($errors->has('address_edit'))
									<code>{{ $errors->first('address_edit') }}</code>
								@endif
								</div>
							</div>
						</div>
						
						<h3 class="box-title">Social Media</h3>
						<hr class="m-t-0 m-b-40">
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Facebook</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="mdi mdi-facebook"></i></div>
											<input type="text" class="form-control" name="facebook_edit" id="facebook_edit" value="<?php echo $fb ?>" autocomplete="off" >
										</div>
									</div> 
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Twitter</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="mdi mdi-twitter"></i></div>
											<input type="text" class="form-control" name="twitter_edit" id="twitter_edit" value="<?php echo $twit ?>" autocomplete="off" >
										</div>
									</div>														
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Instagram</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="mdi mdi-instagram"></i></div>
											<input type="text" class="form-control" name="instagram_edit" id="instagram_edit" value="<?php echo $ig ?>" autocomplete="off" >
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Youtube</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="mdi mdi-youtube-play"></i></div>
											<input type="text" class="form-control" name="youtube_edit" id="youtube_edit" value="<?php echo $you ?>" autocomplete="off" >
										</div>
									</div>														
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group row m-b-0">
						<div class="col-md-3"></div>
						<div class="col-md-3 m-r-5">	
							<button type="submit" id="submit_btn" class="btn btn-success waves-effect waves-light">Save</button>
							<button type="button" id="batal_btn" class="btn btn-danger waves-effect waves-light" onclick="on_back()">Cancel</button>
						</div>
					</div>									
				</form>
			</div>
		</div>
	</div>
</div>


<!-- JQuery -->
<script src="{{url('themes/material-pro/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Notify -->
<script src="{{url('themes/material-pro/assets/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
	});
	
	//Menggunakan AJAX
	function on_update()
	{
		// if (validation_data() == false) return;
		// if (cek_menu()== false ) return ;
		ubah_data();
	}
	
	//Proses update
	function ubah_data()
	{	
		$.ajax({
			type: "POST",
			url: "{{ url('update_user') }}",
			data: {	
				"_token"			: "{{ csrf_token() }}",
				f_name_e	    	: $("#first_name_edit").val(),
				l_name_e	        : $("#last_name_edit").val(),
				gdr_e		    	: $("#gender_edit").val(),
				adr_e	    		: $("#address_edit").val(),
				id_u	    		: $("#id_user").val(),
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
		if (!$("#first_name_edit").val()) {
    		$("#first_name_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the First Name, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} 
		 else if (!$("#last_name_edit").val()) {
			$("#last_name_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Last Name, Please'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});		
			return false;
		}
		 else if (!$("#gender_edit").val()) {
			$("#gender_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Choose the Gender, Please'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});		
			return false;
		}
		else if (!$("#address_edit").val()) {
			$("#address_edit").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Address, Please !'
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
        var url = '{{ url('/home') }}';
        window.open(url, "_self");
    }
</script>

<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
	
			reader.onload = function(e) {
				$('#preview_image').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}	
	}

	$("#image_edit").change(function() {
		readURL(this);
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