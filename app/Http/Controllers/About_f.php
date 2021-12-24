<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// use App\Models\About_f_m;
use Illuminate\Http\Request;

class About_f extends Controller
{
	function index(Request $req)
	{	
		return view('vf_about/utama');
	}
	
	function det_berita(Request $req, $id, $alias)
	{	
		$foto_berita_detail = Home_f_m::berita_detail($id,$alias);
		$view_max = Home_f_m::get_view_max($id);
		$artikel = Home_f_m::artikel();	
		// $foto_hiburan_detail = Home_f_m::hiburan_det($id);
		
		return view('vf_home/detail_berita_home',compact('view_max','foto_berita_detail','artikel'));
	}
	
	function save_view(Request $req)
	{
		$idj = $req->get('id');
		$data1 = array(
			'view'			=> $req->get('view_jml')
		);
		Home_f_m::simpan_view($idj,$data1);
	}
	
	function det_video_home(Request $req, $id, $alias)
	{
		$video_detail_home = Home_f_m::video_det_home($id,$alias);
		// var_dump($video_detail_home);die;
		
		return view('vf_home/detail_video_home',compact('video_detail_home'));
	}
	
	function news_full()
	{	
		$full_berita = Home_f_m::full_news();
		
		return view('vf_home/full_news',compact('full_berita'));
	}
}