<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validator;
use App\Models\Auth_m; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class Auth extends Controller
{	
	public function index(){
        if(!Session::get('login')){
            return redirect('auth')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('vb_auth/auth_login_center');
        }
    }
	
	// public function logine(){
        // return view('vb_auth/auth_login_center');
    // }
	
	function login()
	{
		return view('vb_auth/auth_login_center');
	}
	
	// function admin(Request $request)
	// {
		// return view('vb_auth/administrator');
	// }
	
	function loginx(Request $request)
	{	
		// $validator =  Validator::make($request->all(),['username' => 'required']);
		// $this->validate($request,['password' => 'required']);
		
		// if ($validator->fails()) {
			// echo "gagal login";
		// } else {
		$username = $request->username;
		$password = $request->password;
			
		$usser = Auth_m::resolve_user_login($username,$password);
		
		foreach ($usser as $dt){
			$pass = $dt->password;
			$user = $dt->username;
		}

        if($usser){ //apakah usrname tersebut ada atau tidak		 
            if(Hash::check($password,$pass)){
				$user_id = Auth_m::get_user_id_from_username($username);
				
				foreach($user_id as $dt) {
					$userId=$dt->id;
				}
				
				$user    = Auth_m::get_user($userId);
				// var_dump($user);die;
				foreach ($user as $dt) {
					$id = $dt->id;
					$username = $dt->username;
					$nama_depan = $dt->first_name;
					$nama_belakang = $dt->last_name;
					$email = $dt->email;
				}
				
				$sess_data = array(
						Session::put('id_User_Komando',$id),
						Session::put('nm_Depan_Komando',$nama_depan),
						Session::put('nm_Belakang_Komando',$nama_belakang),
						Session::put('userNameKomando',$username)
						// 'username'  		=> $username,
						// 'name'  			=> $nama_depan.' '.$nama_belakang,
						// 'email'     		=> $email,
						// 'logged_in' 		=> TRUE
				);
				Session::put('userdata_Komando', $sess_data);
				Auth_m::update_log($id);
				
				$ubisugroup = Auth_m::get_user_map($id);
				$jmlubisugroup = count($ubisugroup);
				
				if($jmlubisugroup == 1) {
					$menu = Auth_m::get_menu_map($id,$ubisugroup[0]->unis_id);
					
					if(empty($menu)) {
						$menuarr = array('user_menu_akses' => '');
					} else {
						foreach($menu as $menu_user) {
							$row[$menu_user->link] = $menu_user->link;
						}
						$menuarr = array('user_menu_akses' => $row);
					}
					
					Session::put('userdata_Komando', $menuarr);
					
					foreach ($ubisugroup as $ubis) {
						$sess_data = array(
							// 'ugroup' 	=> $ubis->group_id,
							// 'ubis' 		=> $ubis->unit_id,
							Session::put('uGroup_Komando',$ubis->group_id),
							Session::put('uNis_Komando',$ubis->unis_id)
						);
						// $this->session->set_userdata($sess_data);
						Session::put('userdata_Komando', $sess_data);
					}
					return redirect('admin');
				} else {
					return redirect('admin');
				}
					
                // return redirect('admin');
            }
            else{
                return redirect('auth')->with('alert','Password, Salah !');
            }
        }
        else{
            return redirect('auth')->with('alert','Username, Salah!');
        }
			
			
		// }
		
	}
	
	function logout(Request $req){
		$req->session()->flush();
        return redirect('auth');
    }
}