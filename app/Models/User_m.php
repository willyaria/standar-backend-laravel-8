<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class User_m
{
	public static function get_datatables($idgroup)
	{
		// return DB::select(DB::raw('select * from user where active=1 and trash=0'));
		
		if ($idgroup != 1) { //Jika user yang login mempunyai hak level group sebagai selain superadmin
			return DB::table('user')
					->select('*')
					->where('active',1)
					->where('trash',0)
					->where('sa',null)
					->where('on_off','Off')
					->orderBy('id','desc');
		} else if ($idgroup == 1) { //Jika user yang login mempunyai hak level group sebagai superadmin
			return DB::table('user')
					->select('*')
					->where('active',1)
					->where('trash',0)
					->where('on_off','Off')
					->orderBy('id','desc');
		}
	}
	
	public static function simpan_data_user($data1)
	{
		DB::table('user')->insert($data1);	
	}
	
	public static function simpan_data_user_tanpa_ajax($data16)
	{
		DB::table('user')->insert($data16);	
	}
	
	public static function get_edit_data_user($id)
	{
		// return DB::select(DB::raw('select * from user where id=$id'));
		return DB::select(DB::raw('SELECT * from user WHERE id="'.$id.'"'));	
	}
	
	public static function ubah_data_user($id,$data2)
	{
		DB::table('user')->where('id',$id)->update($data2);
	}
	
	public static function ubah_data_user_tanpa_ajax($idt,$data15)
	{
		DB::table('user')->where('id',$idt)->update($data15);
	}
	
	public static function hapus_data_user($id,$data3)
	{
		DB::table('user')->where('id',$id)->update($data3);
	}
	
	public static function simpan_data_user_store_password($data4)
	{
		DB::table('user_store_password')->insert($data4);
	}
	
	public static function get_edit_data_password($id)
	{
		return DB::select(DB::raw('SELECT * from user WHERE id="'.$id.'"'));		
	}
	
	public static function ubah_data_password($idf,$data5)
	{
		DB::table('user')->where('id',$idf)->update($data5);
	}
	
	public static function ubah_data_store_password($idf,$data6)
	{
		DB::table('user_store_password')->where('user_id',$idf)->update($data6);
	}
	
	public static function get_add_level_user($id)
	{
		return DB::select(DB::raw('SELECT * from user WHERE id="'.$id.'"'));
	}
	
	public static function get_user_group()
	{
		return DB::select(DB::raw('SELECT * from user_group'));
	}
	
	public static function simpan_data_user_group($data7)
	{
		DB::table('user_group_map')->insert($data7);
	}
	
	public static function simpan_data_user_usergroup_map($data10)
	{
		DB::table('user_usergroup_map')->insert($data10);
	}
	
	public static function ubah_cek_group_map($idp,$data8)
	{
		DB::table('user')->where('id',$idp)->update($data8);
	}
	
	public static function get_add_level_user_edit($id)
	{
		return DB::select(DB::raw('SELECT a.id,a.first_name,a.last_name,a.username,b.user_group_id,c.user_group_name from user a LEFT JOIN user_group_map b ON a.id=b.user_id LEFT JOIN user_group c ON b.user_group_id=c.id WHERE a.id="'.$id.'"'));
	}
	
	public static function get_user_group_map($id)
	{
		return DB::select(DB::raw('SELECT * from user_group_map WHERE user_id="'.$id.'"'));
	}
	
	public static function ubah_user_group_map($idv,$data9)
	{
		DB::table('user_group_map')->where('user_id',$idv)->update($data9);
	}
	
	public static function get_detail_group_map($id)
	{
		return DB::select(DB::raw('SELECT a.id,a.first_name,a.last_name,a.username from user a WHERE a.id="'.$id.'"'));
	}
	
	public static function get_menu2($idgroup)
	{
		if ($idgroup != 1) { //Jika yang login selain superadmin maka setting menu yang akan tampil berdasarkan nilai not view 0
			return DB::select(DB::raw('SELECT * FROM menu WHERE not_view=0 AND active=1 AND trash=0 AND menu_type_id=1'));
		} else if ($idgroup == 1) { //Jika yang login superadmin maka setting menu semuanya akan tampil berdasarkan nilai not view 1
			return DB::select(DB::raw('SELECT * FROM menu WHERE active=1 AND trash=0'));
		}	
	}
	
	public static function get_menu_map($id)
	{
		return DB::select(DB::raw('SELECT * FROM menu_map WHERE user_id="'.$id.'"'));
	}
	
	public static function simpan_data_menu_map($req,$id,$menuid)
	{
		$data10=array(
			'user_id'		=> $id,
			'menu_id'		=> $menuid,
			'unis_id'		=> $req->session()->get('uNis_Komando'),
			'created'		=> date('Y-m-d H:i:s'),
			'created_by'	=> $req->session()->get('id_User_Komando')
		);		
		DB::table('menu_map')->insert($data10);
	}
	
	public static function hapus_data_menu_map($id,$menuid)
	{
		$data11=array(
			'user_id'		=> $id,
			'menu_id'		=> $menuid
		);
		DB::table('menu_map')->where('menu_id',$menuid)->delete();
	}
	
	public static function ubah_user_group_map1($idp,$data11)
	{
		DB::table('user_usergroup_map')->where('user_id',$idp)->update($data11);
	}
	
	public static function ubah_user_group_map2($idv,$data12)
	{
		DB::table('user_usergroup_map')->where('user_id',$idv)->update($data12);
	}
	
	public static function ubah_data_biodata($idw,$data13)
	{
		DB::table('user')->where('id',$idw)->update($data13);
	}
	
	public static function ubah_data_sosmed($idt,$data14)
	{
		DB::table('user')->where('id',$idt)->update($data14);
	}
	
	public static function get_user_map($idf)
	{
		return DB::select(DB::raw('SELECT a.id, a.user_id, a.group_id, a.unis_id, b.id as id_group, b.user_group_name as groupx, c.username, d.system_name as unit 
					from user_usergroup_map a 
					LEFT JOIN user_group b ON b.id = a.group_id 
					LEFT JOIN user c ON c.id = a.user_id 
					LEFT JOIN unit_system d ON d.id = a.unis_id 
					WHERE a.user_id="'.$idf.'" AND a.active=1'));
	}
	
	public static function get_user_map2($idb)
	{
		return DB::select(DB::raw('SELECT id, user_group_id FROM user_group_map WHERE user_id="'.$idb.'" AND active=1 AND trash=0'));
	}
}