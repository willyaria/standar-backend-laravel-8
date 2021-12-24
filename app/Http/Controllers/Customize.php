<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Customize_m;
use Illuminate\Http\Request;

class Customize extends Controller
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
				return datatables()->of(Customize_m::get_datatables())
				->addColumn('action', function($field){					
					$button = '<button type="button" title="Edit" name="edit" id="'.$field->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil-square"></i></button>';
					$button .= '&nbsp;&nbsp;';
					$button .= '<button type="button" title="Delete" name="delete" id="'.$field->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
					$button .= '&nbsp;&nbsp;';
					return $button;				
				})
				->make(true);
			}
		}
		
		$id_user_session = $req->session()->get('id_User_Komando');
		$ubis_session = $req->session()->get('uNis_Komando');
		return view('vb_settings/customize/daftar_customize',compact('id_user_session','ubis_session'));
	}
	
	function datenow()
	{
		return date('Y-m-d H:i:s');
	}
	
	function tambah_customize(Request $req)
	{
		$id_user_session = $req->session()->get('id_User_Komando');
		$ubis_session = $req->session()->get('uNis_Komando');
		$module = Customize_m::get_module();
		$menu = Customize_m::get_menu();
		
		return view('vb_settings/customize/add_customize',compact('id_user_session','ubis_session','module','menu'));
	}
	
	function save_customize(Request $req)
	{
		$data1 = array(
			'title'				=> $req->get('judul'),
			'module_id'			=> $req->get('modul'),
			'limit'				=> $req->get('lim'),
			'ordering'			=> $req->get('ord'),
			'position'			=> $req->get('posisi'),
			'page'				=> $req->get('halaman'),
			'menu_id'			=> $req->get('menu'),
			'created'			=> $this->datenow(),
			'created_by'		=> $req->session()->get('id_User_Komando')
		);
		Customize_m::simpan_data_customize($data1);
	}
	
	function ubah_customize(Request $req, $id)
	{
		$id_user_session = $req->session()->get('id_User_Komando');
		$ubis_session = $req->session()->get('uNis_Komando');
		$module = Customize_m::get_module();
		$menuu = Customize_m::get_menu();
		$edit_pos_module = Customize_m::get_edit($id);
		
		return view('vb_settings/customize/edit_customize',compact('id_user_session','ubis_session','module','menuu','edit_pos_module'));
	}
	
	function update_customize(Request $req)
	{
		$idj = $req->get('kode_u');
		$data2 = array(
			'title'				=> $req->get('judul_u'),
			'module_id'			=> $req->get('modul_u'),
			'limit'				=> $req->get('lim_u'),
			'ordering'			=> $req->get('ord_u'),
			'position'			=> $req->get('posisi_u'),
			'page'				=> $req->get('halaman_u'),
			'menu_id'			=> $req->get('menu_u'),
			'modified'			=> $this->datenow(),
			'modified_by'		=> $req->session()->get('id_User_Komando')
		);
		Customize_m::ubah_data_customize($idj,$data2);
	}
	
	function delete_customize(Request $req, $id)
	{
		$data3 = array(
			'active'			=> 0,
			'trash'				=> 1
		);
		Customize_m::hapus_data_customize($id,$data3);
	}
}