<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User_m;
use Illuminate\Http\Request;
use DB;

class User extends Controller
{	
	public function index(Request $request)
	{
		$idf = $request->session()->get('id_User_Komando');
		$group_data = User_m::get_user_map($idf); //Mengambil data user yang login
		
		foreach ($group_data as $dt) { //Mengambil id group user sebagai level user group pada user yang login untuk di lakukan select query pada get_user
			$idgroup = $dt->id_group;
		}
		
        if (empty($request->session()->get('id_User_Komando')))
		{
            return redirect('auth')->with('alert','Kamu harus login dulu ya !!!');
        }
        else
		{
            if(request()->ajax()) {
				return datatables()->of(User_m::get_datatables($idgroup))
				->addColumn('action', function($field){
					
					$button = '<button type="button" title="Edit" name="edit" id="'.$field->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil-square"></i></button>';
					$button .= '&nbsp;&nbsp;';
					$button .= '<button type="button" title="Delete" name="delete" id="'.$field->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
					$button .= '&nbsp;&nbsp;';
					$button .= '<button type="button" title="Change Password" name="change_pass" id="'.$field->id.'" class="change_pass btn btn-sm btn-secondary"><i class="fa fa-key"></i></button>';
					if ($field->cek_group_map == 0)
					{
						$button .= '&nbsp;&nbsp;';
						$button .= '<button type="button" title="Level User" name="level_user" id="'.$field->id.'" class="level_user btn btn-sm btn-info"><i class="fa fa-level-up"></i></button>';
					} else if ($field->cek_group_map != 0)
					{
						$button .= '&nbsp;&nbsp;';
						$button .= '<button type="button" title="Level User" name="level_user_edit" id="'.$field->id.'" class="level_user_edit btn btn-sm btn-info"><i class="fa fa-level-up"></i></button>';
					}
					$button .= '&nbsp;&nbsp;';
					$button .= '<button type="button" title="Setting Menu" name="set_menu" id="'.$field->id.'" class="set_menu btn btn-sm btn-info"><i class="fa fa-bars"></i></button>';
					return $button;
					
				})
				->make(true);
			}

			$id_user_session = $request->session()->get('id_User_Komando');
			$ubis_session = $request->session()->get('uNis_Komando');
			return view('vb_user/daftar',compact('id_user_session','ubis_session'));
        }
    }
	
	function datenow()
	{
		return date('Y-m-d H:i:s');
	}
	
	private function hash_password($password)
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}
	
	function tambah_user(Request $request)
	{
		$id_user_session = $request->session()->get('id_User_Komando');
		$ubis_session = $request->session()->get('uNis_Komando');
		return view('vb_user/add',compact('id_user_session','ubis_session'));
	}
	
	//Menggunakan AJAX
	function save_user(Request $request)
	{
		//proses save user
		$passcrypt = $this->hash_password($request->get('pass'));
		$data1=array(
			'first_name' 	=> $request->get('f_name'),
			'last_name' 	=> $request->get('l_name'),
			'username' 		=> $request->get('user'),
			'password'	 	=> $passcrypt,
			'gender' 		=> $request->get('gdr'),
			'address' 		=> $request->get('adr'),
			'created'		=> $this->datenow(), 
			'created_by'	=> $request->session()->get('id_User_Komando'),
			'on_off'		=> 'Off'
		);
		$userid=User_m::simpan_data_user($data1);
		
		//proses save password user
		$idg=DB::getPdo()->lastInsertId();
		$data4=array(
			'user_id'		=> $idg,
			'password'		=> $request->get('pass'),
			'created'		=> $this->datenow(), 
			'created_by'	=> $request->session()->get('id_User_Komando')
		);
		User_m::simpan_data_user_store_password($data4);
		
		//proses save user_usergroup_map
		$data10=array(
			'user_id'		=> $idg,
			'group_id'		=> 0,
			'unis_id'		=> $request->session()->get('uNis_Komando'),
			'created'		=> $this->datenow(),
			'created_by'	=> $request->session()->get('id_User_Komando')
		);
		User_m::simpan_data_user_usergroup_map($data10);
	}
	//End AJAX
	
	//Tanpa AJAX
	public function save_user_tanpa_ajax(Request $request)
	{			
		$this->validate($request, [
			'first_name' 	=> 'required',
			'last_name' 	=> 'required',
			'username' 		=> 'required',
			'password' 		=> 'required',
			'nik' 			=> 'required|max:16',
			'email' 		=> 'required',
			'handphone' 	=> 'required',
			'gender' 		=> 'required',
			'place_birth' 	=> 'required',
			'date_birth' 	=> 'required',
			'age'		 	=> 'required',
			'religion' 		=> 'required',
			'married' 		=> 'required',
			'address' 		=> 'required',
			'image' 		=> 'image|max:2097152', //2MB
		]);
		
		$passcrypt = $this->hash_password($request->get('password'));
		$off = 'Off';
		
		if ( ! $request->hasFile('image') ) { //Jika insert tanpa foto
			$data16=array(
				'first_name'		=> $request->get('first_name'),
				'last_name'			=> $request->get('last_name'),
				'username'			=> $request->get('username'),
				'password'			=> $passcrypt,
				'nik'				=> $request->get('nik'),
				'telp'				=> $request->get('telp'),
				'email'				=> $request->get('email'),
				'handphone'			=> $request->get('handphone'),
				'gender'			=> $request->get('gender'),
				'place_birth'		=> $request->get('place_birth'),
				'date_birth'		=> $request->get('date_birth'),
				'age'				=> $request->get('age'),
				'religion'			=> $request->get('religion'),
				'married'			=> $request->get('married'),
				'address'			=> $request->get('address'),
				'facebook'			=> $request->get('facebook'),
				'twitter'			=> $request->get('twitter'),
				'instagram'			=> $request->get('instagram'),
				'youtube'			=> $request->get('youtube'),
				'on_off'			=> $off,
				'created'			=> $this->datenow(),
				'created_by'		=> $request->session()->get('id_User_Komando'),
				'image'				=> "/uploads/user-default.png"
			);
			User_m::simpan_data_user_tanpa_ajax($data16);
			
			//proses save password user
			$idg=DB::getPdo()->lastInsertId();
			$data4=array(
				'user_id'		=> $idg,
				'password'		=> $request->get('password'),
				'created'		=> $this->datenow(), 
				'created_by'	=> $request->session()->get('id_User_Komando')
			);
			User_m::simpan_data_user_store_password($data4);
			
			//proses save user_usergroup_map
			$data10=array(
				'user_id'		=> $idg,
				'group_id'		=> 0,
				'unis_id'		=> $request->session()->get('uNis_Komando'),
				'created'		=> $this->datenow(),
				'created_by'	=> $request->session()->get('id_User_Komando')
			);
			User_m::simpan_data_user_usergroup_map($data10);
		
			return redirect('user')->with('alert-success','Created Successfully.');
		} else { //Jika insert dengan foto
			if($request->hasFile('image')) {
				$resorce 	= $request->file('image');
				$f_name   	= $request->get('first_name');
				$l_name   	= $request->get('last_name');
				$extension	= $resorce->getClientOriginalExtension(); //Ekstensi file 
				$resorce->move(\base_path() ."/uploads/user", $f_name." ".$l_name.".".$extension); //Simpan path file di folder

				$data16=array(
					'first_name'		=> $request->get('first_name'),
					'last_name'			=> $request->get('last_name'),
					'username'			=> $request->get('username'),
					'password'			=> $passcrypt,
					'nik'				=> $request->get('nik'),
					'telp'				=> $request->get('telp'),
					'email'				=> $request->get('email'),
					'handphone'			=> $request->get('handphone'),
					'gender'			=> $request->get('gender'),
					'place_birth'		=> $request->get('place_birth'),
					'date_birth'		=> $request->get('date_birth'),
					'age'				=> $request->get('age'),
					'religion'			=> $request->get('religion'),
					'married'			=> $request->get('married'),
					'address'			=> $request->get('address'),
					'facebook'			=> $request->get('facebook'),
					'twitter'			=> $request->get('twitter'),
					'instagram'			=> $request->get('instagram'),
					'youtube'			=> $request->get('youtube'),
					'on_off'			=> $off,
					'created'			=> $this->datenow(),
					'created_by'		=> $request->session()->get('id_User_Komando'),
					'image'				=> "/uploads/user/".$f_name." ".$l_name.".".$extension
				);
				User_m::simpan_data_user_tanpa_ajax($data16);
				
				//proses save password user
				$idg=DB::getPdo()->lastInsertId();
				$data4=array(
					'user_id'		=> $idg,
					'password'		=> $request->get('password'),
					'created'		=> $this->datenow(), 
					'created_by'	=> $request->session()->get('id_User_Komando')
				);
				User_m::simpan_data_user_store_password($data4);
				
				//proses save user_usergroup_map
				$data10=array(
					'user_id'		=> $idg,
					'group_id'		=> 0,
					'unis_id'		=> $request->session()->get('uNis_Komando'),
					'created'		=> $this->datenow(),
					'created_by'	=> $request->session()->get('id_User_Komando')
				);
				User_m::simpan_data_user_usergroup_map($data10);
				
				return redirect('user')->with('alert-success','Created Successfully.');					
			} else {
				echo "Gagal upload gambar";
			}				
		}				
    }
	//End Tanpa AJAX
	
	function ubah_user(Request $request, $id)
	{
		$user_edit = User_m::get_edit_data_user($id);
		$id_user_session = $request->session()->get('id_User_Komando');
		$ubis_session = $request->session()->get('uNis_Komando');
		// var_dump($user_edit);die;
		return view('vb_user/edit',compact('user_edit','id_user_session','ubis_session'));
	}
	
	function profil_detail(Request $request, $id)
	{
		$user_edit = User_m::get_edit_data_user($id);
		$id_user_session = $request->session()->get('id_User_Komando');
		$ubis_session = $request->session()->get('uNis_Komando');
		
		return view('vb_user/profil_detail',compact('user_edit','id_user_session','ubis_session'));
	}
	
	//Menggunakan AJAX
	function update_user(Request $req)
	{
		$ids=$req->get('id_u');
		$data2=array(
			'first_name'		=> $req->get('f_name_e'),
			'last_name'			=> $req->get('l_name_e'),
			'gender'			=> $req->get('gdr_e'),
			'address'			=> $req->get('adr_e'),
			'modified'			=> date('Y-m-d H:i:s'),
			'modified_by'		=> $request->session()->get('id_User_Komando')
		);
		User_m::ubah_data_user($ids,$data2);
	}
	//End AJAX
	
	//Tanpa AJAX
	function update_user_tanpa_ajax(Request $req)
	{
		$idt		= $req->get('id_user');
		
		$this->validate($req, [
			'first_name_edit'	=> 'required',
			'last_name_edit'  	=> 'required',
			'username_edit' 	=> 'required',
			'email_edit' 		=> 'required',
			'handphone_edit' 	=> 'required',
			'gender_edit' 		=> 'required',
			'place_birth_edit' 	=> 'required',
			'date_birth_edit' 	=> 'required',
			'age_edit'		 	=> 'required',
			'religion_edit' 	=> 'required',
			'married_edit' 		=> 'required',
			'address_edit' 		=> 'required',
			'image_edit' 		=> 'image|max:2097152', //2MB
		]);
		
		if ( ! ($req->hasFile('image_edit')) ) { //Jika edit tanpa foto
			$data15=array(
				'first_name'		=> $req->get('first_name_edit'),
				'last_name'			=> $req->get('last_name_edit'),
				'username'			=> $req->get('username_edit'),
				'telp'				=> $req->get('telp_edit'),
				'email'				=> $req->get('email_edit'),
				'handphone'			=> $req->get('handphone_edit'),
				'place_birth'		=> $req->get('place_birth_edit'),
				'date_birth'		=> $req->get('date_birth_edit'),
				'age'				=> $req->get('age_edit'),
				'gender'			=> $req->get('gender_edit'),
				'religion'			=> $req->get('religion_edit'),
				'married'			=> $req->get('married_edit'),
				'address'			=> $req->get('address_edit'),
				'facebook'			=> $req->get('facebook_edit'),
				'twitter'			=> $req->get('twitter_edit'),
				'instagram'			=> $req->get('instagram_edit'),
				'youtube'			=> $req->get('youtube_edit'),
				'modified'			=> $this->datenow(),
				'modified_by'		=> $req->session()->get('id_User_Komando')
			);
			User_m::ubah_data_user_tanpa_ajax($idt,$data15);
			return redirect('edit_user/'.$idt)->with('alert-success','Update Successfully.');
		} else { //Jika edit dengan foto
			if($req->hasFile('image_edit')){
				$resorce 	= $req->file('image_edit');
				$f_name   	= $req->get('first_name_edit');
				$l_name   	= $req->get('last_name_edit');
				$extension	= $resorce->getClientOriginalExtension();
				$resorce->move(\base_path() ."/uploads/user", $f_name." ".$l_name.".".$extension); //Simpan Path File in Folder
				
				$data15=array(
					'first_name'		=> $req->get('first_name_edit'),
					'last_name'			=> $req->get('last_name_edit'),
					'username'			=> $req->get('username_edit'),
					'telp'				=> $req->get('telp_edit'),
					'email'				=> $req->get('email_edit'),
					'handphone'			=> $req->get('handphone_edit'),
					'place_birth'		=> $req->get('place_birth_edit'),
					'date_birth'		=> $req->get('date_birth_edit'),
					'age'				=> $req->get('age_edit'),
					'gender'			=> $req->get('gender_edit'),
					'religion'			=> $req->get('religion_edit'),
					'married'			=> $req->get('married_edit'),
					'address'			=> $req->get('address_edit'),
					'facebook'			=> $req->get('facebook_edit'),
					'twitter'			=> $req->get('twitter_edit'),
					'instagram'			=> $req->get('instagram_edit'),
					'youtube'			=> $req->get('youtube_edit'),
					'image'				=> "/kipas/uploads/user/".$f_name." ".$l_name.".".$extension,
					'modified'			=> $this->datenow(),
					'modified_by'		=> $req->session()->get('id_User_Komando')
				);
				User_m::ubah_data_user_tanpa_ajax($idt,$data15);

				return redirect('edit_user/'.$idt)->with('alert-success','Update Successfully.');
			}else{
				echo "Gagal update gambar";
			}
		}	
	}
	//End Tanpa AJAX
	
	function update_biodata(Request $req)
	{
		$idw=$req->get('id_u');
		$data13=array(
			'first_name'		=> $req->get('f_name_u'),
			'last_name'			=> $req->get('l_name_u'),
			'gender'			=> $req->get('gdr_u'),
			'username'			=> $req->get('user_u'),
			'email'				=> $req->get('email_u'),
			'place_birth'		=> $req->get('pla_birth_u'),
			'date_birth'		=> $req->get('date_birth_u'),
			'age'				=> $req->get('age_u'),
			'handphone'			=> $req->get('hp_u'),
			'telp'				=> $req->get('telp_u'),
			'religion'			=> $req->get('religi_u'),
			'married'			=> $req->get('mar_u'),
			'address'			=> $req->get('adr_u'),
			'modified'			=> $this->datenow(),
			'modified_by'		=> $req->session()->get('id_User_Komando')
		);
		User_m::ubah_data_biodata($idw,$data13);
	}
	
	function update_sosmed(Request $req)
	{
		$idt=$req->get('id_s');
		$data14=array(
			'facebook'			=> $req->get('fb'),
			'twitter'			=> $req->get('twi'),
			'instagram'			=> $req->get('ig'),
			'youtube'			=> $req->get('you'),
			'modified'			=> $this->datenow(),
			'modified_by'		=> $req->session()->get('id_User_Komando')
		);
		User_m::ubah_data_sosmed($idt,$data14);
	}
	
	function delete_user($id)
	{
		$data3=array(
			'active' => 0,
			'trash' => 1
		);
		User_m::hapus_data_user($id,$data3);
	}
	
	function change_password(Request $request, $id)
	{
		$edit_pass = User_m::get_edit_data_password($id);
		$id_user_session = $request->session()->get('id_User_Komando');
		$ubis_session = $request->session()->get('uNis_Komando');
		return view('vb_user/edit_password',compact('edit_pass','id_user_session','ubis_session'));
	}
	
	function update_pass(Request $req)
	{
		$idf=$req->get('id_u');
		$passcrypt = $this->hash_password($req->get('pass_new'));
		$data5=array(
			'password'			=> $passcrypt
		);
		User_m::ubah_data_password($idf,$data5);
		
		$data6=array(
			'password'			=> $req->get('pass_new'),
			'modified'			=> $this->datenow(),
			'modified_by'		=> $req->session()->get('id_User_Komando')
		);
		User_m::ubah_data_store_password($idf,$data6);
	}
	
	function level_user(Request $request, $id)
	{
		$add_level = User_m::get_add_level_user($id);
		$user_group = User_m::get_user_group();
		$id_user_session = $request->session()->get('id_User_Komando');
		$ubis_session = $request->session()->get('uNis_Komando');
		return view('vb_user/level_user',compact('add_level','user_group','id_user_session','ubis_session'));
	}
	
	function add_level_user(Request $req)
	{
		$data7=array(
			'user_id'			=> $req->get('id_u'),
			'user_group_id'		=> $req->get('user_g'),
			'created'			=> $this->datenow(),
			'created_by'		=> $req->session()->get('id_User_Komando')
		);
		User_m::simpan_data_user_group($data7);
		
		$idp = $req->get('id_u');
		$data8=array(
			'cek_group_map'		=> 1
		);
		User_m::ubah_cek_group_map($idp,$data8);
		
		//proses ubah user_usergroup_map
		$data11=array(
			'group_id'			=> $req->get('user_g'),
			'modified'			=> $this->datenow(),
			'modified_by'		=> $req->session()->get('id_User_Komando')
		);
		User_m::ubah_user_group_map1($idp,$data11);
	}
	
	function level_user_edit(Request $request, $id)
	{
		$add_level_edit = User_m::get_add_level_user_edit($id);
		$user_group_map = User_m::get_user_group_map($id);
		$user_group = User_m::get_user_group();
		$id_user_session = $request->session()->get('id_User_Komando');
		$ubis_session = $request->session()->get('uNis_Komando');
		return view('vb_user/level_user_edit',compact('add_level_edit','user_group','user_group_map','id_user_session','ubis_session'));
	}
	
	function edit_level_user(Request $req)
	{
		$idv = $req->get('id_u');
		$data9=array(
			'user_group_id'		=> $req->get('group_u'),
			'modified'			=> $this->datenow(),
			'modified_by'		=> $request->session()->get('id_User_Komando')
		);
		User_m::ubah_user_group_map($idv,$data9);
		
		//proses ubah user_usergroup_map
		$data12=array(
			'group_id'		=> $req->get('group_u')
		);
		User_m::ubah_user_group_map2($idv,$data12);
	}
	
	function setting_menu(Request $request, $id)
	{
		$idb = $request->session()->get('id_User_Komando');
		$group_data = User_m::get_user_map2($idb);
		foreach($group_data as $dt) {
			$idgroup = $dt->user_group_id;
		}
		
		$detail_group_map = User_m::get_detail_group_map($id);
		$menu = User_m::get_menu2($idgroup);
		$menu_map = User_m::get_menu_map($id);
		$id_user_session = $request->session()->get('id_User_Komando');
		$ubis_session = $request->session()->get('uNis_Komando');		
		
		return view('vb_user/setting_menu',compact('detail_group_map','menu','menu_map','id_user_session','ubis_session'));
	}
	
	function menu_map(Request $req)
	{
		$id = $req->get('ids');
		$menuid = $req->get('menuid');
		$status = $req->get('state');
		
		if ($status=='true') {
			$simpan = User_m::simpan_data_menu_map($req, $id,$menuid);
			if ($simpan) {
		      $result['success'] = true;
		    } else {
		      $result['success'] = false;
		    }
		} else if ($status=='false') {
			$hapus = User_m::hapus_data_menu_map($id,$menuid);
			if ($hapus) {
		      $result['success'] = true;
		    } else {
		      $result['success'] = false;
		    }
		}
	}
}