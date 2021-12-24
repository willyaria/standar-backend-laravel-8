@extends('template.materialpro.template')
@section('content')

<div class="row">
	<div class="col-12">
		
		<!-- msg -->
		
		<div class="card">
			<div class="card-body">
				<h6 class="card-subtitle"></h6>
				<hr class="m-t-0 m-b-40">
				
				<?php
					foreach ($edit_pass as $dt) {
						$id=$dt->id;
						$username=$dt->username;
					}
				?>

				
				<div class="form-body">
					<h3 class="box-title">Change Password</h3>
					<hr class="m-t-0 m-b-40">

					
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-7">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Username</label>
								<div class="col-md-7">
									<div class="input-group">
										<div class="input-group-addon"><i class="ti-user"></i></div>
										<input type="text" class="form-control" name="username" value="<?php echo $username ?>" readonly>											
									</div>
									<input type="hidden" class="form-control" name="id_user" id="id_user" value="<?php echo $id ?>">
								</div>
							</div>
						</div>
					</div>					

					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-7">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">New Password</label>
								<div class="col-md-7">
									<div class="input-group">
										<div class="input-group-addon"><i class="ti-lock"></i></div>
										<input type="password" class="form-control" name="new_pass" id="new_pass" autocomplete="off">
									</div>
									<div class="form-control-feedback"><small><code>Required.</code></small></div>
								</div>														
							</div>
						</div>					
					</div>				
					
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-7">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">New Password Confirmation</label>
								<div class="col-md-7">
									<div class="input-group">
										<div class="input-group-addon"><i class="ti-lock"></i></div>
										<input type="password" class="form-control" name="pass_confirmation" id="pass_confirmation" autocomplete="off">
									</div>
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
									<button type="button" class="btn btn-success waves-effect waves-light" onclick="onSave()">Save</button>
									<button type="button" class="btn btn-danger waves-effect waves-light" onclick="onBack()">Cancel</button>
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
<script type="text/javascript">
	
	$(document).ready(function() {
		
	});
	
	function onSave()
	{	
		// if (validation_data() == false) return;
		simpan_data();
	}
	
	function simpan_data()
	{
		$.ajax({
			type: "POST",
			url: "{{ url('update_password') }}",
			data: {	
				"_token"			: "{{ csrf_token() }}",
				pass_new	    	: $("#new_pass").val(),
				id_u	    		: $("#id_user").val(),
			} ,
			success:function(data){ 
				onStay();
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
	
	function onBack(){
		var url = '{{ url('/home') }}';
        window.open(url, "_self");
	}
	
	function onStay(){
		var id = $("#id_user").val();
		var url = '{{ url('/edit_password') }}/'+id;
        window.open(url, "_self");
	}
	
	function validation_data()
	{
		if (!$("#new_pass").val()) {
    		$("#new_pass").focus();
			$.notify({
				title: '<strong>INFORMASI!</strong>',
				message: 'Fill the New Password, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if (!$("#pass_confirmation").val()) {
    		$("#pass_confirmation").focus();
			$.notify({
				title: '<strong>INFORMASI!</strong>',
				message: 'Fill the New Password Confirmation, Please !'
			},{
				type: 'danger',
                placement: {
                    from: "top",
                    align: "center"
                }
			});
			
			return false;
		} else if ($("#new_pass").val()!=$("#pass_confirmation").val()) {
    		$("#pass_confirmation").focus();
			$.notify({
				title: '<strong>INFORMASI!</strong>',
				message: 'Password Confirmation Not Same New Password !'
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




@endsection