@extends('template.materialpro.template')
@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				
				<?php
					foreach ($add_level as $dt) {
						$id=$dt->id;
						$nm_dpn=$dt->first_name;
						$nm_blkg=$dt->last_name;
						$username=$dt->username;
					}
				?>


				<div class="form-body">
					<h3 class="box-title">Level User</h3>
					<hr class="m-t-0 m-b-40">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">First Name</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="first_name" autocomplete="off" value="<?php echo $nm_dpn ?>" readonly>
									<input type="hidden" class="form-control" name="id_user" id="id_user" autocomplete="off" value="<?php echo $id ?>">
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Last Name</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="last_name" autocomplete="off" value="<?php echo $nm_blkg ?>" readonly>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">Username</label>
								<div class="col-md-7">
									<div class="input-group">
										<input type="text" class="form-control" name="username" id="username" autocomplete="off" value="<?php echo $username ?>" readonly>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group row">
								<label class="control-label text-left col-md-4">User Group</label>
								<div class="col-md-7">
									<select class="form-control custom-select" name="user_group" id="user_group">
										<option value="">Select One</option>
										<?php foreach ($user_group as $dt) { 
										?>
											<option value="<?php echo $dt->id ?>"><?php echo $dt->user_group_name ?></option>
										<?php } ?>
									</select>
									<div class="form-control-feedback"><small><code>Required.</code></small></div>
								</div>														
							</div>
						</div>
					</div>
				</div>

				<hr>
				<div class="form-body">
					<div class="row">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="button" class="btn btn-success waves-effect waves-light" onclick="on_save()">Save</button>
									<button type="button" class="btn btn-danger waves-effect waves-light" onclick="on_back()">Cancel</button>
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
	
	function on_save()
	{	
		// if (validation_data() == false) return;
		save_data();
	}
	
	function save_data()
	{
		$.ajax({
			type: "POST",
			url: "{{ url('add_level') }}",
			data: {	
				"_token"			: "{{ csrf_token() }}",
				user_g		    	: $("#user_group").val(),
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
		if (!$("#user_group").val()) {
    		$("#user_group").focus();
			$.notify({
				title: '<strong>INFORMASI!</strong>',
				message: 'Fill the User Group, Please !'
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
        var url = '{{ url('/user') }}';
        window.open(url, "_self");
    }
</script>








@endsection