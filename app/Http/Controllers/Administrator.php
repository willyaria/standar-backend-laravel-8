<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User_m;
use App\Models\Administrator_m;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class Administrator extends Controller
{
	function index(Request $request)
	{
		// Session::put('userdata', $sess_data);
		// $id = $this->session->userdata('id_user_l1');
		$id = $request->session()->get('id_User_Komando');
		$user = Administrator_m::get_user($id);
		$ubisugroup = Administrator_m::get_user_map($id);
		// var_dump($id);die;
		
		return view('vb_administrator/main_dashboard',compact('user','ubisugroup'));
	}
	
	function to_dashboard(Request $request)
	{
		$id_user 		= $request->session()->get('id_User_Komando');
		$nm_dpn 		= $request->session()->get('nm_Depan_Komando');
		$nm_blkg 		= $request->session()->get('nm_Belakang_Komando');
		$user_name 		= $request->session()->get('userNameKomando');
		$id_unit 		= $request->get('id_unit');
		$id_usergroup 	= $request->get('id_usergroup');
		$menu		 	= Administrator_m::get_menu_map($id_user,$id_unit);
		if(empty($menu)) {
			$menuarr = array('user_menu_akses' => '');
		} else {
			foreach($menu as $menu_user) {
				$row[$menu_user->link] = $menu_user->link;
			}
			$menuarr = array('user_menu_akses' => $row);
		}
		Session::put('userdata_Komando', $menuarr);
		
		if(!empty($id_unit) && !empty($id_usergroup)) {
			$sess_data = array(
				'ugroup' 		=> $id_usergroup,
				'unis' 			=> $id_unit,
				'iduser' 		=> $id_user,
				'nmdpn' 		=> $nm_dpn,
				'nmblkg' 		=> $nm_blkg,
				'userName' 		=> $user_name,
			);
			Session::put('userdata_Komando', $sess_data);			
			$result['success'] = true;
		} else {
			$result['success'] = false;
		}
	}
	
	function dashboard(Request $request)
	{
		$id_user_session = $request->session()->get('id_User_Komando');
		$ubis_session = $request->session()->get('uNis_Komando');
		$all_session = $request->session()->get('userdata_Komando');
		// var_dump($ubis);die;
		// Administrator_m::check_ubis_ugroup();
		// $ubis = $request->session()->get('uNis_PA');
		// $iduser = $request->session()->get('id_User_PA');
		return view('vb_administrator/dashboard_utama',compact('id_user_session','ubis_session','all_session'));
	}
}