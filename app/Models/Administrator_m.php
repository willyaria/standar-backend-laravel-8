<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Http\Request;
use DB;

class Administrator_m extends Model
{
	public static function get_user($id)
	{
		return DB::select(DB::raw('SELECT * from user where id="'.$id.'"'));
	}
	
	public static function get_user_map($id)
	{
		return DB::select(DB::raw('SELECT a.id, a.user_id, a.group_id, a.unis_id, b.id as id_group, b.user_group_name as groupx, c.username, d.system_name as unit 
							from user_usergroup_map a 
							LEFT JOIN user_group b ON b.id = a.group_id 
							LEFT JOIN user c ON c.id = a.user_id 
							LEFT JOIN unit_system d ON d.id = a.unis_id 
							WHERE a.user_id="'.$id.'" AND a.active=1'));
	}
	
	public static function get_menu_map($id,$id_ubis)
	{
		return DB::select(DB::raw('SELECT a.id, a.user_id, a.menu_id, b.menu_name, b.link, c.username 
							from menu_map a 
							LEFT JOIN menu b ON b.id = a.menu_id 
							LEFT JOIN user c ON c.id = a.user_id 
							where a.user_id="'.$id.'" AND a.unis_id="'.$id_ubis.'"'));
	}
	
	// function check_ubis_ugroup()
	// {
		// if($this->have_ubis_ugroup() == false)
		// {
			// redirect('administrator');
		// }
	// }
	
	// function have_ubis_ugroup(Request $request)
	// {
		// if ($request->session()->get('ubis') == '' && $request->session()->get('ugroup');)
	// }
}