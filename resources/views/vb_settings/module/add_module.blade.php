@extends('template.materialpro.template')
@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Module</h4>
				<hr class="m-t-0 m-b-40">
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="control-label text-left col-md-4">Filename</label>
							<div class="col-md-8">
								<input type="text" class="form-control" placeholder="Filename" name="file_name" id="file_name" autocomplete="off">
								<div class="form-control-feedback"><small><code>Required.</code></small>
								</div>										
							</div>									
						</div>								
					</div>
				</div>
				
				<div class="form-group row m-b-0">
					<div class="col-md-3"></div>
					<div class="col-md-3 m-r-5">	
						<button type="submit" id="submit_btn" class="btn btn-success waves-effect waves-light" onclick="on_save()">Save</button>
						<button type="button" id="batal_btn" class="btn btn-danger waves-effect waves-light" onclick="on_back()">Cancel</button>
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
	function on_save()
	{
		if (validation_data() == false) return;
		simpan_data(); 
	}
	
	function simpan_data()
	{	
		$.ajax({
			type: "POST",
			url: "{{ url('settings/create_module') }}",
			data: {	
				"_token"		: "{{ csrf_token() }}",
				filename	    : $("#file_name").val(),
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
		if (!$("#file_name").val()) {
    		$("#file_name").focus();
			$.notify({
				title: '<strong>INFORMATION!</strong>',
				message: 'Fill the Filename, Please !'
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
        var url = '{{ url('/settings/module') }}';
        window.open(url, "_self");
    }
</script>

@endsection