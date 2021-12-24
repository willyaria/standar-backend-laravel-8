<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Customize_m
{
	public static function get_datatables()
	{
		return DB::select(DB::raw('select a.*
					from pos_module as a 
					LEFT JOIN module as b ON b.id=a.module_id 
					where a.active=1 and a.trash=0
					'));
	}
	
	public static function get_module()
	{
		return DB::select(DB::raw('SELECT * FROM module WHERE active=1 AND trash=0'));
	}
	
	public static function get_menu()
	{
		return DB::select(DB::raw('SELECT * FROM menu WHERE menu_type_id=2 AND active=1 AND trash=0'));
	}
	
	public static function simpan_data_customize($data1)
	{
		DB::table('pos_module')->insert($data1);
	}
	
	public static function get_edit($id)
	{
		return DB::select(DB::raw('SELECT * FROM pos_module WHERE id="'.$id.'" AND active=1 AND trash=0'));
	}
	
	public static function ubah_data_customize($idj,$data2)
	{
		DB::table('pos_module')->where('id',$idj)->update($data2);
	}
	
	public static function hapus_data_customize($id,$data3)
	{
		DB::table('pos_module')->where('id',$id)->update($data3);
	}
}