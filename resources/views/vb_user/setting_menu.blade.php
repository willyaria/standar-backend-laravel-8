@extends('template.materialpro.template')
@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<?php
					foreach ($detail_group_map as $dt) {
						$id=$dt->id;
						$user=$dt->username;
						$f_name=$dt->first_name;
						$l_name=$dt->last_name;
					}
				?>
				<h3 class="card-title">Setting Menu Akses</h4>
				<h4 class="card-subtitle">Name : <?php echo $f_name ?> <?php echo $l_name ?></h6> 
				<h4 class="card-subtitle">Username : <?php echo $user ?></h6> 
				<input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $id ?>">
				<h6 class="card-subtitle"></h6>
				
				
				
				<div class="table-responsive m-t-40">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Menu</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="tabel">

						</tbody>
					</table>
				</div>
				<div style="height:10px">
					<div class="progress-bar bg-info active progress-bar-striped" id="progressbottom" style="width: 100%; height:8px; display:none;" role="progressbar"></div>
				</div>
				<div class="form-group row m-b-0 m-t-10">
					<div class="col-md-12 text-center">
						<button type="submit" id="batal_btn" class="btn btn-danger waves-effect waves-light" onclick="on_back()">Kembali</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- JQuery -->
<script src="{{url('themes/material-pro/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- This is data table -->
<script src="themes/material-pro/assets/plugins/datatables/jquery.dataTables.min.js"></script>

<!-- Notify -->
<script src="{{url('themes/material-pro/assets/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		
	});
	
	var html = '';
	var menu = '';
	var userid = $('#userid').val();
	
	//Menampilkan data menu
	<?php
		$no = 0;
		if (!empty($menu)) {
			foreach ($menu as $data) {
				$no++;
				?>
				menu += '<div class="switch"><label>NO<input type="checkbox"  onClick="saveMenu(<?= $data->id; ?>)" id="menu_id<?= $data->id ?>" name="menu_id<?= $data->id ?>"><span class="lever"></span>YES</label></div>';

				html += '<tr><td><?= $data->id ?></td><td><label id="menu<?= $no ?>"><?= $data->menu_name  ?></label></td><td>' + menu + '</td></tr>'
				// html += '<tr><td><?= $data->id ?></td><td><label id="menu<?= $no ?>"></label></td><td>' + menu + '</td></tr>'
				var menu = '';
				$('#tabel').html(html);
			<?php
		}
		?>
		<?php
	} else { ?>
			$('#tabel').html('<tr><td colspan="4">Tidak ada data menu</td></tr>');
		<?php
	}
	?>
	//End
	
	//Proses checked menu
	<?php
		$no = 0;
		foreach ($menu_map as $dt) {
			$no++;
			if ($dt->menu_id == 0) {
				?>
				$('#menu_id<?= $no ?>').prop('checked', false);
			<?php
		} else if ($dt->menu_id != 0) {
			?>
				$('#menu_id<?= $dt->menu_id ?>').val('<?= $dt->menu_id ?>').prop('checked', true);
			<?php
		}
	}
	?>
	//End
	
	//Proses simpan menu
	function saveMenu(id) {
		var cek = $("#menu_id" + id).is(":checked");
		// console.log(id);
		// console.log(userid);
		// console.log(cek);
		$.ajax({
			type: "POST",
			url: "{{ url('add_menu_map') }}",
			data: {	
				"_token"			: "{{ csrf_token() }}",
				ids: userid,
				menuid: id,
				state: cek
			} ,
			success:function(data){ 

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
	//End
	
	function on_back(){
		var url = '{{ url('/user') }}';
        window.open(url, "_self");
	}
	
</script>
@endsection