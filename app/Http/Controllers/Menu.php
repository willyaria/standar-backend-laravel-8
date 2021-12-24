<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Menu_m;
use Illuminate\Http\Request;
use DB;

class Menu extends Controller
{	
	public function index(Request $request)
	{
        if (empty($request->session()->get('id_User_Komando')))
		{
            return redirect('auth')->with('alert','Kamu harus login dulu ya !!!');
        } 
		else 
		{
			if(request()->ajax()) {
				return datatables()->of(Menu_m::get_datatables())
				->addColumn('action', function($field){
					$button = '<button type="button" title="Edit" name="edit" id="'.$field->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil-square"></i></button>';
					$button .= '&nbsp;&nbsp;';
					$button .= '<button type="button" title="Delete" name="delete" id="'.$field->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
					$button .= '&nbsp;&nbsp;';
					return $button;
				})
				->rawColumns(['action'])
				->make(true);
			}
			
			$id_user_session = $request->session()->get('id_User_Komando');
			$ubis_session = $request->session()->get('uNis_Komando');
			return view('vb_menu/daftar',compact('id_user_session','ubis_session'));
		}
		
		// $hehe = Menu_m::get_datatables();
		// var_dump($hehe);die;
    }
	 
	function get_data_menu(Request $request)
	{
		
	}
	
	function datenow()
	{
		return date('Y-m-d H:i:s');
	}
	
	function tambah_menu(Request $request)
	{
		$menu_type = Menu_m::get_menu_type();
		$master_parent = Menu_m::get_master_parent();
		$max_kode = Menu_m::get_id_max();
		$id_user_session = $request->session()->get('id_User_Komando');
		$ubis_session = $request->session()->get('uNis_Komando');
		return view('vb_menu/add',compact('menu_type','master_parent','max_kode','id_user_session','ubis_session'));
	}
	
	function check_menu(Request $req)
	{ 
		$nama = strtoupper($req->get('menu'));
		$nm_menu = Menu_m::get_cek_menu($nama);
		
		if ($nm_menu) { echo  1;} else {echo  0;}
	}
	
	function save_menu(Request $req)
	{
		$data1=array(
			'id_menu'				=> $req->get('kd_menu'),
			'menu_name'				=> strtoupper($req->get('m_name')),
			'parent_id'				=> $req->get('p_child'),
			'link'					=> "/".$req->get('link'),
			'menu_type_id'			=> $req->get('m_type'),
			'menu_category_id'		=> $req->get('prt'),
			'unis_id'				=> $req->session()->get('uNis_Komando'),
			'publish'				=> $req->get('pub'),
			'sortir'				=> $req->get('sor'),
			'not_view'				=> $req->get('n_view'),
			'created'				=> $this->datenow(),
			'created_by'			=> $req->session()->get('id_User_Komando')
		);
		Menu_m::simpan_data_menu($data1);
	}
	
	function ubah_menu(Request $request, $id)
	{
		$menu_edit = Menu_m::get_edit_menu($id);
		$menu_category = Menu_m::get_menu_category();
		$menu_type = Menu_m::get_menu_type();
		$master_parent = Menu_m::get_master_parent();
		$id_user_session = $request->session()->get('id_User_Komando');
		$ubis_session = $request->session()->get('uNis_Komando');
		// var_dump($menu_edit);die;
		return view('vb_menu/edit',compact('menu_edit','menu_category','menu_type','master_parent','id_user_session','ubis_session'));
	}
	
	function update_menu(Request $req)
	{
		$idh = $req->get('id');
		$prt = $req->get('prt_menu');
		
		if ($prt==1) { //Jika parent
			$data2=array(
				'menu_name'				=> strtoupper($req->get('menu')),
				'menu_type_id'			=> $req->get('tp_menu'),
				'menu_category_id'		=> $req->get('prt_menu'),
				'sortir'				=> $req->get('sortir'),
				'publish'				=> $req->get('pub'),
				'not_view'				=> $req->get('not_view'),
				'modified'				=> $this->datenow(),
				'modified_by'			=> $req->session()->get('id_User_Komando')
			);
			Menu_m::ubah_data_menu($idh,$data2);
		} else if ($prt==2) { //Jika child
			$data2=array(
				'menu_name'				=> strtoupper($req->get('menu')),
				'menu_type_id'			=> $req->get('tp_menu'),
				'menu_category_id'		=> $req->get('prt_menu'),
				'parent_id'				=> $req->get('prt_chi_menu'),
				'link'					=> $req->get('link'),
				'sortir'				=> $req->get('sortir'),
				'publish'				=> $req->get('pub'),
				'not_view'				=> $req->get('not_view'),
				'modified'				=> $this->datenow(),
				'modified_by'			=> $req->session()->get('id_User_Komando')
			);
			Menu_m::ubah_data_menu($idh,$data2);
		}		
	}
	
	function delete_menu($id)
	{
		$data3=array(
			'active' => 0,
			'trash' => 1
		);
		Menu_m::hapus_data_menu($id,$data3);
	}
}