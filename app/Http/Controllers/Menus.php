<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Menus_m;
use Illuminate\Http\Request;

class Menus extends Controller
{	
	function index(Request $req)
	{
		$id_user_session = $req->session()->get('id_User_Komando');
		$ubis_session = $req->session()->get('uNis_Komando');
		
		if (empty($req->session()->get('id_User_Komando')))
		{
            return redirect('auth')->with('alert','Kamu harus login dulu ya !!!');
        }
		else
		{
			if(request()->ajax()) {
				return datatables()->of(Menus_m::get_datatables())
				->addColumn('action', function($field){					
					$button = '<button type="button" title="Edit" name="edit" id="'.$field->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil-square"></i></button>';
					$button .= '&nbsp;&nbsp;';
					$button .= '<button type="button" title="Delete" name="delete" id="'.$field->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
					$button .= '&nbsp;&nbsp;';
					return $button;				
				})
				->addColumn('groupmenu', function($field){
					if ($field->group_menu_id==null){
						$gm = "-";
					} else {
						$gm = $field->groupmenu;
					}
					return $gm;
				})
				->make(true);
			}
		}
		
		$max_id = Menus_m::get_maxKode();
		$parentidfe = Menus_m::get_parentidfe();
		$menugroup = Menus_m::get_menugroup();
		return view('vb_settings/menus/daftar_menus',compact('id_user_session','ubis_session','max_id','parentidfe','menugroup'));
	}
	
	function datenow()
	{
		return date('Y-m-d H:i:s');
	}
	
	function save_menus_frontend(Request $req)
	{
		$pub = 'Yes';
		$data1 = array(
			'id_menu'			=> $req->get('kd_menu'),
			'menu_name'			=> $req->get('nm_menu'),
			'parent_id'			=> $req->get('parent'),
			'link'				=> $req->get('link'),
			'menu_type_id'		=> 2,
			'unis_id'			=> 1,
			'group_menu_id'		=> $req->get('groupmenu'),
			'sortir'			=> $req->get('sort'),
			'publish'			=> $pub,
			'created'			=> $this->datenow(),
			'created_by'		=> $req->session()->get('id_User_Komando')
		);
		Menus_m::simpan_data_menus_frontend($data1);
	}
	
	function ubah_menus_frontend(Request $req, $id)
	{
		$id_user_session = $req->session()->get('id_User_Komando');
		$ubis_session = $req->session()->get('uNis_Komando');
		$get_edit = Menus_m::get_dataedit($id);
		$parentidfe = Menus_m::get_parentidfe();
		$parentidbe = Menus_m::get_parentidbe();
		$menugroup = Menus_m::get_menugroup();
		$typemenu = Menus_m::get_typemenu();
		$datapublish = Menus_m::get_publish($id);
		
		return view('vb_settings/menus/edit_menus',compact('id_user_session','ubis_session','get_edit','parentidfe','parentidbe','menugroup','typemenu','datapublish'));
	}
	
	function update_menus_frontend(Request $req)
	{
		$idu = $req->get('id');
		
		$data2 = array(
			'menu_name'				=> $req->get('nm_menu'),
			'parent_id'				=> $req->get('parent'),
			'group_menu_id'			=> $req->get('groupmenu'),
			'sortir'				=> $req->get('sort'),
			'link'					=> $req->get('link'),
			'menu_type_id'			=> $req->get('typemenu'),
			'publish'				=> $req->get('pub'),
			'modified'				=> $this->datenow(),
			'modified_by'			=> $req->session()->get('id_User_Komando')
		);
		Menus_m::ubah_data_menus_frontend($idu,$data2);
	}
	
	function delete_menus_frontend($id)
	{
		$data3 = array(
			'active'				=> 0,
			'trash'					=> 1
		);
		Menus_m::hapus_data_menus_frontend($id,$data3);
	}
}