<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Menu_m
{
	public static function get_datatables()
	{	
		return DB::select(DB::raw('select a.id,a.menu_name,a.link,a.publish,a.created,b.menu_category_name,c.menu_type_name 
					from menu as a 
					LEFT JOIN menu_category as b ON b.id=a.menu_category_id 
					LEFT JOIN menu_type as c ON c.id=a.menu_type_id 
					where a.active=1 and a.trash=0
					'));
	}
	
	public static function get_menu_type()
	{
		return DB::select(DB::raw('select * from menu_type where active=1 and trash=0'));
	}
	
	public static function get_master_parent()
	{
		return DB::select(DB::raw('select * from menu where active=1 and trash=0 and parent_id=0 and menu_type_id=1'));
	}
	
	public static function get_cek_menu($nama)
	{
		return DB::select(DB::raw('SELECT * FROM menu WHERE menu_name="'.$nama.'"'));
	}
	
	public static function get_id_max()
	{				
		return DB::select(DB::raw('select max(id_menu) as maxKode from menu where active=1 and trash=0'));
	}
	
	public static function simpan_data_menu($data1)
	{
		DB::table('menu')->insert($data1);
	}
	
	public static function get_edit_menu($id)
	{
		return DB::select(DB::raw('SELECT a.*,a.id as menu_id,b.id as category_id,b.menu_category_name,c.id as type_id,c.menu_type_name FROM menu a LEFT JOIN menu_category b ON a.menu_category_id=b.id LEFT JOIN menu_type c ON a.menu_type_id=c.id where a.active=1 AND a.trash=0 AND a.id="'.$id.'"'));
	}
	
	public static function get_menu_category()
	{
		return DB::select(DB::raw('SELECT * FROM menu_category'));
	}
	
	public static function ubah_data_menu($idh,$data2)
	{
		DB::table('menu')->where('id',$idh)->update($data2);
	}
	
	public static function hapus_data_menu($id,$data3)
	{
		DB::table('menu')->where('id',$id)->update($data3);
	}
}