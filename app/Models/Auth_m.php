<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Auth_m extends Model
{
	protected $table = 'user';
	
	public static function get_user($user_id)
	{
		return DB::select(DB::raw('SELECT * from user where id="'.$user_id.'"'));
	}
	
	public static function get_user_map($id)
	{
		return DB::select(DB::raw('SELECT a.id, a.user_id, a.group_id, a.unis_id, b.id as id_group, b.user_group_name as groupx, c.username, d.system_name as unit from user_usergroup_map a LEFT JOIN user_group b ON b.id = a.group_id LEFT JOIN user c ON c.id = a.user_id LEFT JOIN unit_system d ON d.id = a.unis_id WHERE a.user_id="'.$id.'" AND a.active=1'));
	}
	
	public static function get_menu_map($id,$id_ubis)
	{
		return DB::select(DB::raw('SELECT a.id, a.user_id, a.menu_id, b.menu_name, b.link, c.username from menu_map a LEFT JOIN menu b ON b.id = a.menu_id LEFT JOIN user c ON c.id = a.user_id where a.user_id="'.$id.'" AND a.unis_id="'.$id_ubis.'"'));
	}
	
	public static function resolve_user_login($username)
	{
		return DB::select(DB::raw('SELECT * from user WHERE username="'.$username.'"'));	
	}
	
	public static function get_user_id_from_username($username)
	{
		return DB::select(DB::raw('SELECT * from user WHERE username="'.$username.'"'));	
	}
	
	public static function update_log($id)
	{
		$data 	= array('end_login_date' => date('Y-m-d H:i:s'));
		DB::table('user')->where('id',$id)->update($data);
	}
}