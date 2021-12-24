<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Module_m;
use Illuminate\Http\Request;
use DB;

class Module extends Controller
{	
	function index(Request $req)
	{
		if (empty($req->session()->get('id_User_Komando')))
		{
            return redirect('auth')->with('alert','Kamu harus login dulu ya !!!');
        }
		else
		{
			if(request()->ajax()) {
				return datatables()->of(Module_m::get_datatables())
				->addColumn('action', function($field){					
					$button = '<button type="button" title="Delete" name="delete" id="'.$field->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
					$button .= '&nbsp;&nbsp;';
					return $button;
				})
				->make(true);
			}
		}	
		
		$id_user_session = $req->session()->get('id_User_Komando');
		$ubis_session = $req->session()->get('uNis_Komando');
		return view('vb_settings/module/daftar_module',compact('id_user_session','ubis_session'));
	}
	
	function datenow()
	{
		return date('Y-m-d H:i:s');
	}
	
	function tambah_module(Request $req)
	{
		$id_user_session = $req->session()->get('id_User_Komando');
		$ubis_session = $req->session()->get('uNis_Komando');
		return view('vb_settings/module/add_module',compact('id_user_session','ubis_session'));
	}
	
	function save_module(Request $req)
	{
		$data1 = array(
			'filename'		=> $req->get('filename'),
			'created'		=> $this->datenow(),
			'created_by'	=> $req->session()->get('id_User_Komando')
		);
		Module_m::simpan_data_module($data1);
	}
	
	function delete_module($id)
	{
		$data2 = array(
			'active'		=> 0,
			'trash'			=> 1
		);
		Module_m::hapus_data_module($id,$data2);
	}
}