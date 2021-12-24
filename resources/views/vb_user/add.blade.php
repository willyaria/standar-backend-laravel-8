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
				<h4 class="card-title">User</h4>
				@if (count($errors) > 0)
					<ul>
					@foreach ($errors->all() as $error)
					<li><code>{{ $error }}</code></li>
					@endforeach
					</ul>
				@endif
				<hr class="m-t-0 m-b-40">

				<form method="POST" action="{{ url('create_user_tanpa_ajax') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
				
					<div class="form-body">	 
						<h3 class="box-title">Biodata Diri</h3>
						<hr class="m-t-0 m-b-40">
						
						<div class="row">
							<div class="col-4">		
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">New</h4>
										<label for="input-file-now">Input Photo</label>
										@if ($errors->has('image'))
											<code>{{ $errors->first('image') }}</code>
										@endif
										<input type="file" id="image" name="image"/>
										<img id="preview_image" src="{{url('laravel/uploads/user-default.png')}}" alt="Preview image here" width="245px"/>																
									</div> 									
								</div>							
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">First Name</label>
									<div class="col-md-8">
										<input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name" autocomplete="off">
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('first_name'))
											<code>{{ $errors->first('first_name') }}</code>
										@endif
										</div>										
									</div>									
								</div>								
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Last Name</label>
									<div class="col-md-8">
										<input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name" autocomplete="off">
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('last_name'))
											<code>{{ $errors->first('last_name') }}</code>
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
										<input type="text" class="form-control" name="username" id="username" autocomplete="off" >
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('username'))
											<code>{{ $errors->first('username') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Password</label>
									<div class="col-md-8">		
										<input type="password" class="form-control" name="password" id="password" autocomplete="off" >
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('password'))
											<code>{{ $errors->first('password') }}</code>
										@endif
										</div>
									</div>														
								</div>
							</div>
						</div> 
					
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">NIK</label>
									<div class="col-md-8">
										<div class="input-group">
											<div class="input-group-addon"><i class="ti-id-badge"></i></div>
											<input type="text" class="form-control" name="nik" id="nik" onkeypress="return angkadanhuruf(event,'+0123456789',this)" maxlength="16" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('nik'))
											<code>{{ $errors->first('nik') }}</code>
										@endif
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
											<input type="text" class="form-control" name="handphone" id="handphone" onkeypress="return angkadanhuruf(event,'+0123456789',this)" maxlength="13" autocomplete="off">										
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('handphone'))
											<code>{{ $errors->first('handphone') }}</code>
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
											<input type="email" class="form-control" name="email" id="email" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('email'))
											<code>{{ $errors->first('email') }}</code>
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
											<input type="text" class="form-control" name="telp" id="telp" onkeypress="return angkadanhuruf(event,'+0123456789',this)" maxlength="15" autocomplete="off" >
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
											<input type="text" class="form-control" name="place_birth" id="place_birth" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('place_birth'))
											<code>{{ $errors->first('place_birth') }}</code>
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
											<input type="date" class="form-control" name="date_birth" id="date_birth" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('date_birth'))
											<code>{{ $errors->first('date_birth') }}</code>
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
											<input type="text" class="form-control" name="age" id="age" onkeypress="return angkadanhuruf(event,'+0123456789',this)" maxlength="2" autocomplete="off">
										</div>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('age'))
											<code>{{ $errors->first('age') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Gender</label>
									<div class="col-md-8">
										<select class="form-control custom-select md-4" id="gender" name="gender" autocomplete="off">
											<option value="">Select One</option>
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('gender'))
											<code>{{ $errors->first('gender') }}</code>
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
										<select class="form-control custom-select md-4" name="religion" id="religion">
											<option value="">Select One</option>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Katolik">Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>
											<option value="Konghucu">Konghucu</option>
										</select>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('religion'))
											<code>{{ $errors->first('religion') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label text-left col-md-4">Married</label>
									<div class="col-md-8">
										<select class="form-control custom-select md-4" name="married" id="married">
											<option value="">Select One</option>
											<option value="Single">Single</option>
											<option value="Married">Married</option>
										</select>
										<div class="form-control-feedback"><small><code>Required.</code></small>
										@if ($errors->has('married'))
											<code>{{ $errors->first('married') }}</code>
										@endif
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label class="control-label text-left col-md-2">Address</label>
							<div class="col-md-10">
								<textarea class="form-control" name="address" id="address" rows="4" placeholder="Completed Address" autocomplete="off"></textarea>
								<div class="form-control-feedback"><small><code>Required.</code></small>
								@if ($errors->has('address'))
									<code>{{ $errors->first('address') }}</code>
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
											<input type="text" class="form-control" name="facebook" id="facebook" autocomplete="off" >
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
											<input type="text" class="form-control" name="twitter" id="twitter" autocomplete="off" >
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
											<input type="text" class="form-control" name="instagram" id="instagram" autocomplete="off" >
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
											<input type="text" class="form-control" name="youtube" id="youtube" autocomplete="off" >
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
<script src="themes/material-pro/assets/plugins/jquery/jquery.min.js"></script>

<!-- Notify -->
<script src="themes/material-pro/assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
	});
	
	//Menggunakan AJAX
	function on_save()
	{
		if (validation_data() == false) return;
		// if (cek_menu()== false ) return ;
		simpan_data();
	}
	
	//Proses save
	function simpan_data()
	{	
		$.ajax({
			type: "POST",
			url: "{{ url('create_user') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				f_name	    	: $("#first_name").val(),
				l_name	        : $("#last_name").val(),
				gdr		    	: $("#gender").val(),
				adr	    		: $("#address").val(),
				user	    	: $("#username").val(),
				pass	    	: $("#password").val(),
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
		if (!$("#first_name").val()) {
    		$("#first_name").focus();
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
		else if (!$("#last_name").val()) {
			$("#last_name").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Last Name, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});		
			return false;
		}
		else if (!$("#username").val()) {
			$("#username").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Username, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});		
			return false;
		}
		else if (!$("#password").val()) {
			$("#password").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Password, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});		
			return false;
		}
		else if (!$("#gender").val()) {
			$("#gender").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Choose the Gender, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});		
			return false;
		}
		else if (!$("#address").val()) {
			$("#address").focus();
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
	
	function on_back() 
	{
        var url = '{{ url('/user') }}';
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

	$("#image").change(function() {
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