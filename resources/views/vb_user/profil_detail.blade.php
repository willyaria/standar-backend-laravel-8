@extends('template.materialpro.template')
@section('content')

<?php
	foreach ($user_edit as $dt) {
		$id=$dt->id;
		$nik=$dt->nik;
		$nm_dpn=$dt->first_name;
		$nm_blkg=$dt->last_name;
		$gdr=$dt->gender;
		$adr=$dt->address;
		$email=$dt->email;
		$username=$dt->username;
		$hp=$dt->handphone;
		$telp=$dt->telp;
		$pla_birth=$dt->place_birth;
		$date_birth=$dt->date_birth;
		$age=$dt->age;
		$rel=$dt->religion;
		$mar=$dt->married;
		$telp=$dt->telp;
		$fb=$dt->facebook;
		$twit=$dt->twitter;
		$ig=$dt->instagram;
		$you=$dt->youtube;
		$ima=$dt->image;
	}
?>

<div class="row">
	<div class="col-lg-4 col-xlg-3 col-md-5">
		<div class="card">
			<div class="card-body">
				<center class="m-t-30"> <img id="preview_image" src="{{ url('/')}}<?= $dt->image ?>" class="img-circle" width="150" />
					<h4 class="card-title m-t-10"><?php echo $nm_dpn.' '.$nm_blkg ?></h4>
					<h6 class="card-subtitle">Accounts Manager Amix corp</h6>
					<div class="row text-center justify-content-md-center">
						<div class="col-8">
							<a href="javascript:void(0)" class="link"><i class="fa fa-vcard-o "></i> <font class="font-medium"><?php echo $nik ?></font></a>
						</div>
					</div>
				</center>
			</div>
			<div>
				<hr> 
			</div>
			<div class="card-body"> 
				<small class="text-muted">Email </small><h6><?php echo $email ?></h6> 
				<small class="text-muted p-t-30 db">Handphone</small><h6><?php echo $hp ?></h6> 
				<small class="text-muted p-t-30 db">Telp</small><h6><?php if ($telp=="") {echo "-";} else {echo $telp;} ?></h6> 
				<small class="text-muted p-t-30 db">Address</small><h6><?php echo $adr ?></h6>
				<!-- <div class="map-box">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div> -->
				<small class="text-muted p-t-30 db">Social Profile</small>
				<br/>
					<a href="https://www.facebook.com/<?php echo $fb ?>" target="_blank" class="btn btn-circle btn-secondary">
						<i class="fa fa-facebook"></i>
					</a>
					<a href="https://twitter.com/<?php echo $twit ?>" target="_blank" class="btn btn-circle btn-secondary">
						<i class="fa fa-twitter"></i>
					</a>
					<a href="https://www.instagram.com/<?php echo $ig ?>" target="_blank" class="btn btn-circle btn-secondary">
						<i class="fa fa-instagram"></i>
					</a>
					<a href="https://www.youtube.com/channel/<?php echo $you ?>" target="_blank" class="btn btn-circle btn-secondary">
						<i class="fa fa-youtube"></i>
					</a>
			</div>
		</div>
	</div>
	<!-- Column -->
	<!-- Column -->
	{{ csrf_field() }}
	<div class="col-lg-8 col-xlg-9 col-md-7">
		<div class="card">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs profile-tab" role="tablist">
				<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profil</a> </li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bio" role="tab">Biodata</a> </li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#socmed" role="tab">Media Sosial</a> </li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#addinfo" role="tab">Info Lainnya</a> </li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" onclick="on_back()" >Kembali</a> </li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<!--second tab-->
				<!-- Profil -->
				<div class="tab-pane active" id="profile" role="tabpanel">
					<div class="card-body">
						<div class="row">
							<div class="col-md-3 col-xs-6 b-r"> <strong>Completed Name</strong>
								<br>
								<p class="text-muted"><?php echo $nm_dpn.' '.$nm_blkg ?></p>
							</div>
							<div class="col-md-3 col-xs-6 b-r"> <strong>Gender</strong>
								<br>
								<p class="text-muted"><?php echo $gdr ?></p>
							</div>
							<div class="col-md-3 col-xs-6"> <strong>Date Birth</strong>
								<br>
								<p class="text-muted"><?php echo $date_birth ?></p>
							</div>
							<div class="col-md-3 col-xs-6"> <strong>Married</strong>
								<br>
								<p class="text-muted"><?php echo $mar ?></p>
							</div>
						</div>
						<hr>
						<p class="m-t-30">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						<h4 class="font-medium m-t-30">Skill Set</h4>
						<hr>
						<h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
						<div class="progress">
							<div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span>
							</div>
						</div>
						<h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
						<div class="progress">
							<div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> 
							</div>
						</div>
						<h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
						<div class="progress">
							<div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> 
							</div>
						</div>
						<h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
						<div class="progress">
							<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> 
							</div>
						</div>
					</div>
				</div>
				
				<!-- Biodata -->
				<div class="tab-pane" id="bio" role="tabpanel">
					<div class="card-body">	
						<input type="hidden" class="form-control form-control-line" name="idm" id="idm" value="<?php echo $id ?>">
						<div class="form-group">
							<label class="col-md-12">First Name</label>
							<div class="col-md-12">
								<input type="text" name="first_name_ubah" id="first_name_ubah" class="form-control form-control-line" value="<?php echo $nm_dpn ?>" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Last Name</label>
							<div class="col-md-12">
								<input type="text" name="last_name_ubah" id="last_name_ubah" class="form-control form-control-line" value="<?php echo $nm_blkg ?>" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="example-email" class="col-md-12">Username</label>
							<div class="col-md-12">
								<input type="text" name="username_ubah" id="username_ubah" class="form-control form-control-line" value="<?php echo $username ?>" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="example-email" class="col-md-12">Email</label>
							<div class="col-md-12">
								<input type="email" name="email_ubah" id="email_ubah" class="form-control form-control-line" value="<?php echo $email ?>" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">Gender</label>
							<div class="col-sm-12">
								<select class="form-control custom-select" name="gender_ubah" id="gender_ubah" autocomplete="off">
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
							</div>
						</div>
						<div class="form-group">
							<label for="example-email" class="col-md-12">Place Birth</label>
							<div class="col-md-12">
								<input type="text" name="place_birth_ubah" id="place_birth_ubah" class="form-control form-control-line" value="<?php echo $pla_birth ?>" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="example-email" class="col-md-12">Date Birth</label>
							<div class="col-md-12">
								<input type="date" name="date_birth_ubah" id="date_birth_ubah" class="form-control form-control-line" value="<?php echo $date_birth ?>" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="example-email" class="col-md-12">Age</label>
							<div class="col-md-12">
								<input type="text" name="age_ubah" id="age_ubah" class="form-control form-control-line" value="<?php echo $age ?>" onkeypress="return angkadanhuruf(event,'+0123456789',this)" maxlength="2" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Handphone</label>
							<div class="col-md-12">
								<input type="text" name="handphone_ubah" id="handphone_ubah" class="form-control form-control-line" value="<?php echo $hp ?>" onkeypress="return angkadanhuruf(event,'+0123456789',this)" maxlength="13" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Telp</label>
							<div class="col-md-12">
								<input type="text" name="telp_ubah" id="telp_ubah" class="form-control form-control-line" value="<?php echo $telp ?>" onkeypress="return angkadanhuruf(event,'+0123456789',this)" maxlength="15" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">Religion</label>
							<div class="col-sm-12">
								<select class="form-control custom-select" name="religion_ubah" id="religion_ubah" autocomplete="off">
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
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">Married</label>
							<div class="col-sm-12">
								<select class="form-control custom-select" name="married_ubah" id="married_ubah" autocomplete="off">
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
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Address</label>
							<div class="col-md-12">
								<textarea rows="5" class="form-control form-control-line" name="address_ubah" id="address_ubah" autocomplete="off"><?php echo $adr ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success" onclick="on_update_biodata()">Update Biodata</button>
							</div>
						</div>					
					</div>
				</div>
				
				<!-- Sosmed -->
				<div class="tab-pane" id="socmed" role="tabpanel">
					<div class="card-body">
						<input type="hidden" class="form-control form-control-line" name="ids" id="ids" value="<?php echo $id ?>">
						<div class="form-group">
							<label for="facebook">Facebook</label>
							<div class="input-group">
								<span class="input-group-addon">https://www.facebook.com/</span>
								<input type="text" class="form-control" name="facebook_ubah" id="facebook_ubah" value="<?php echo $fb ?>" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="twitter">Twitter</label>
							<div class="input-group">
								<span class="input-group-addon">https://www.twitter.com/</span>
								<input type="text" class="form-control" name="twitter_ubah" id="twitter_ubah" value="<?php echo $twit ?>" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname">Instagram</label>
							<div class="input-group">
								<span class="input-group-addon">https://www.instagram.com/</span>
								<input type="text" class="form-control" name="instagram_ubah" id="instagram_ubah" value="<?php echo $ig ?>" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputuname">Youtube</label>
							<div class="input-group">
								<span class="input-group-addon">https://www.youtube.com/channel/</span>
								<input type="text" class="form-control" name="youtube_ubah" id="youtube_ubah" value="<?php echo $you ?>" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success" onclick="on_update_sosmed()">Update Sosial Media</button>
							</div>
						</div>											
					</div>
				</div>
				
				<!-- Info Lainnya -->
				<div class="tab-pane" id="addinfo" role="tabpanel">
					<div class="card-body">
						<input type="hidden" name="id" value="<?php //$userdetail->id ?>">
						<div class="form-group">
							<label for="bank_name">Bank Name</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="ti-money"></i></div>
								<input type="text" class="form-control" name="bank_name" value="<?php //$userdetail->bank_name ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="acc_bank_number">Account No</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="ti-money"></i></div>
								<input type="text" class="form-control" name="acc_bank_number" value="<?php //$userdetail->acc_bank_number ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="branch_bank">Branch Bank</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="ti-money"></i></div>
								<input type="text" class="form-control" name="branch_bank" value="<?php //$userdetail->branch_bank ?>">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success" onclick="on_update_info()">Update Additional Info</button>
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
	
	function on_update_biodata()
	{
		ubah_biodata();
	}
	
	function ubah_biodata()
	{
		// alert($("#idm").val());
		$.ajax({
			type: "POST",
			url: "{{ url('update_profil_biodata') }}",
			data: {	
				"_token"			: "{{ csrf_token() }}",
				f_name_u	    	: $("#first_name_ubah").val(),
				l_name_u	        : $("#last_name_ubah").val(),
				user_u		    	: $("#username_ubah").val(),
				email_u		    	: $("#email_ubah").val(),
				gdr_u		    	: $("#gender_ubah").val(),
				pla_birth_u		    : $("#place_birth_ubah").val(),
				date_birth_u		: $("#date_birth_ubah").val(),
				age_u		    	: $("#age_ubah").val(),
				hp_u		    	: $("#handphone_ubah").val(),
				telp_u		    	: $("#telp_ubah").val(),
				religi_u		    : $("#religion_ubah").val(),
				mar_u		    	: $("#married_ubah").val(),
				adr_u	    		: $("#address_ubah").val(),
				id_u	    		: $("#idm").val(),
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
	
	function on_update_sosmed()
	{
		ubah_sosmed();
	}
	
	function ubah_sosmed()
	{
		$.ajax({
			type: "POST",
			url: "{{ url('update_profil_sosmed') }}",
			data: {	
				"_token"			: "{{ csrf_token() }}",
				fb			    	: $("#facebook_ubah").val(),
				twi			        : $("#twitter_ubah").val(),
				ig			    	: $("#instagram_ubah").val(),
				you		    		: $("#youtube_ubah").val(),
				id_s	    		: $("#ids").val(),
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
	
	function on_update_info()
	{
		alert('On Progress');
	}
	
	function on_back() 
	{
        var url = '{{ url('/user') }}';
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