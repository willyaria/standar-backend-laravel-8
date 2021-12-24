<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Menus_m
{
	public static function get_datatables()
	{
		return DB::select(DB::raw('select a.id,a.menu_name,a.link,a.parent_id,a.sortir,a.publish,a.group_menu_id,b.menu_type_name as typemenu,c.menu_group_name as groupmenu
					from menu as a 
					LEFT JOIN menu_type as b ON b.id=a.menu_type_id 
					LEFT JOIN menu_group as c ON c.id=a.group_menu_id
					where a.active=1 and a.trash=0
					'));
	}
	
	public static function get_maxKode()
	{
		return DB::select(DB::raw('SELECT max(id_menu) as maxKode FROM menu'));
	}
	
	public static function get_parentidfe()
	{
		$pub = 'Yes';
		return DB::select(DB::raw('SELECT id, menu_name from menu WHERE parent_id=0 AND menu_type_id=2 AND publish="'.$pub.'" AND active=1 AND trash=0'));
	}
	
	public static function get_parentidbe()
	{
		$pub = 'Yes';
		return DB::select(DB::raw('SELECT id, menu_name from menu WHERE parent_id=0 AND menu_type_id=1 AND publish="'.$pub.'" AND active=1 AND trash=0'));
	}
	
	public static function get_menugroup()
	{
		return DB::select(DB::raw('SELECT id, menu_group_name FROM menu_group'));
	}
	
	public static function get_typemenu()
	{
		return DB::select(DB::raw('SELECT * FROM menu_type'));
	}
	
	public static function get_publish($id)
	{
		return DB::select(DB::raw('SELECT * FROM menu WHERE id="'.$id.'" AND active=1 AND trash=0'));
	}
	
	public static function simpan_data_menus_frontend($data1)
	{
		DB::table('menu')->insert($data1);
	}
	
	public static function get_dataedit($id)
	{
		return DB::select(DB::raw('SELECT * from menu WHERE id="'.$id.'" AND active=1 AND trash=0'));
	}
	
	public static function ubah_data_menus_frontend($idu,$data2)
	{
		DB::table('menu')->where('id',$idu)->update($data2);
	}
	
	public static function hapus_data_menus_frontend($id,$data3)
	{
		DB::table('menu')->where('id',$id)->update($data3);
	}
}