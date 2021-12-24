<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Module_m
{
	public static function get_datatables()
	{	
		return DB::table('module')
					->select('*')
					->where('active',1)
					->where('trash',0)
					->orderBy('id','desc');
	}
	
	public static function simpan_data_module($data1)
	{
		DB::table('module')->insert($data1);
	}
	
	public static function hapus_data_module($id,$data2)
	{
		DB::table('module')->where('id',$id)->update($data2);
	}
	
}