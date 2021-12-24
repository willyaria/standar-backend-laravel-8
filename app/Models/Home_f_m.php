<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Home_f_m
{
	public static function berita_home()
	{
		return DB::select(DB::raw('select a.id,a.title,a.alias,a.part_caption,a.full_caption,a.created,b.url_thumb,b.thumb,b.url_image,b.image,c.first_name,c.last_name
					from news_image as a
					left join file as b on a.file_id = b.id
					left join user as c on a.created_by=c.id
					where a.active=1 and a.trash=0
					and a.published=1
					and b.file_category_id=1
					order by a.id desc
					limit 8
					'));
	}
	
	public static function get_slider_home()
	{
		$halaman = 'home';
		$posisi = 'top-banner';
		$group = 'topmenu';
					
		return DB::select(DB::raw('select a.id, a.title, b.filename, c.link, d.menu_group_name 
					from pos_module as a 
					left join module as b on a.module_id = b.id
					left join menu as c on a.menu_id = c.id
					left join menu_group as d on c.group_menu_id = d.id
					where a.active=1 and a.trash=0
					and a.page="'.$halaman.'"
					and a.position="'.$posisi.'"
					and d.menu_group_name="'.$group.'"
					order by a.ordering asc
					'));
	}
	
	public static function data_slider_home()
	{
		return DB::select(DB::raw('select a.id,a.title,a.part_caption,b.url_thumb,b.thumb,b.url_image,b.image
					from news_image as a
					left join file as b on a.file_id = b.id
					where a.active=1 and a.trash=0
					and a.published=1
					and b.file_category_id=1
					order by a.id desc
					limit 5
					'));
	}
	
	public static function get_left1()
	{
		$halaman = 'home';
		$posisi = 'left1';
		$group = 'middlemenu';
					
		return DB::select(DB::raw('select a.id, a.title, b.filename, c.link, d.menu_group_name 
					from pos_module as a 
					left join module as b on a.module_id = b.id
					left join menu as c on a.menu_id = c.id
					left join menu_group as d on c.group_menu_id = d.id
					where a.active=1 and a.trash=0
					and a.page="'.$halaman.'"
					and a.position="'.$posisi.'"
					and d.menu_group_name="'.$group.'"
					order by a.ordering asc
					'));
	}
	
	public static function hiburan()
	{
		return DB::select(DB::raw('select a.id,a.title,a.alias,a.part_caption,a.full_caption,a.publish_up,a.view,b.url_thumb,b.thumb,b.url_image,b.image,
					c.first_name,c.last_name
					from news_image as a
					left join file as b on a.file_id = b.id
					left join user as c on b.created_by = c.id
					where a.active=1 and a.trash=0
					and a.published=1
					and b.file_category_id=2
					order by a.id desc
					limit 5
					'));
	}
	
	public static function berita_detail($id,$alias)
	{
		return DB::select(DB::raw('select a.id,a.title,a.full_caption,a.font_size,a.created,b.url_thumb,b.thumb,b.url_image,b.image,c.first_name,c.last_name
					from news_image as a
					left join file as b on a.file_id = b.id
					left join user as c on a.created_by=c.id
					where a.active=1 and a.trash=0
					and a.id="'.$id.'"
					and a.alias="'.$alias.'"
					and a.published=1
					and b.file_category_id=1
					order by a.id desc
					limit 5
					'));
	}
	
	public static function hiburan_det($id)
	{
		return DB::select(DB::raw('select a.id,a.title,a.part_caption,a.full_caption,a.publish_up,b.url_thumb,b.thumb,b.url_image,b.image
					from news_image as a
					left join file as b on a.file_id = b.id
					where a.active=1 and a.trash=0
					and a.id="'.$id.'"
					and a.published=1
					and b.file_category_id=2
					'));
	}
	
	public static function get_detail_middle1()
	{
		$halaman = 'detail_hiburan_home';
		$posisi = 'middle1';
		$group = 'middlemenu';
					
		return DB::select(DB::raw('select a.id, a.title, b.filename, c.link, d.menu_group_name 
					from pos_module as a 
					left join module as b on a.module_id = b.id
					left join menu as c on a.menu_id = c.id
					left join menu_group as d on c.group_menu_id = d.id
					where a.active=1 and a.trash=0
					and a.page="'.$halaman.'"
					and a.position="'.$posisi.'"
					and d.menu_group_name="'.$group.'"
					order by a.ordering asc
					'));
	}
	
	public static function get_right1()
	{
		$halaman = 'home';
		$posisi = 'right1';
		$group = 'middlemenu';
					
		return DB::select(DB::raw('select a.id, a.title, b.filename, c.link, d.menu_group_name 
					from pos_module as a 
					left join module as b on a.module_id = b.id
					left join menu as c on a.menu_id = c.id
					left join menu_group as d on c.group_menu_id = d.id
					where a.active=1 and a.trash=0
					and a.page="'.$halaman.'"
					and a.position="'.$posisi.'"
					and d.menu_group_name="'.$group.'"
					order by a.ordering asc
					'));
	}
	
	public static function profile_pengembang()
	{
		return DB::select(DB::raw('select a.id,a.title,a.part_caption,a.full_caption,a.publish_up,b.url_thumb,b.thumb,b.url_image,b.image
					from news_image as a
					left join file as b on a.file_id = b.id
					where a.active=1 and a.trash=0
					and a.published=1
					and b.file_category_id=3
					order by a.id desc
					'));
	}
	
	public static function get_view_max($id)
	{				
		return DB::select(DB::raw('select max(view) as maxView from news_image where active=1 and trash=0 and id="'.$id.'"'));
	}
	
	public static function simpan_view($idj,$data1)
	{
		DB::table('news_image')->where('id',$idj)->update($data1);
	}
	
	public static function get_middle1()
	{
		$halaman = 'home';
		$posisi = 'middle1';
		$group = 'middlemenu';
					
		return DB::select(DB::raw('select a.id, a.title, b.filename, c.link, d.menu_group_name 
					from pos_module as a 
					left join module as b on a.module_id = b.id
					left join menu as c on a.menu_id = c.id
					left join menu_group as d on c.group_menu_id = d.id
					where a.active=1 and a.trash=0
					and a.page="'.$halaman.'"
					and a.position="'.$posisi.'"
					and d.menu_group_name="'.$group.'"
					order by a.ordering asc
					'));
	}
	
	public static function video_slider_home()
	{
		return DB::select(DB::raw('select a.id,a.alias,a.title,a.caption,a.publish_up,b.url_thumb,b.thumb,b.url_image,b.image,c.first_name,c.last_name
					from news_video as a
					left join file as b on a.file_id = b.id
					left join user as c on b.created_by = c.id
					where a.active=1 and a.trash=0
					and a.published=1
					'));
	}
	
	public static function video_det_home($id,$alias)
	{
		return DB::select(DB::raw('select a.id,a.title,a.caption,a.publish_up,b.url_thumb,b.thumb,b.url_image,b.image
					from news_video as a
					left join file as b on a.file_id = b.id
					where a.active=1 and a.trash=0
					and a.id="'.$id.'"
					and a.alias="'.$alias.'"
					and a.published=1
					and b.file_category_id=4
					'));
	}
	
	public static function artikel()
	{
		return DB::select(DB::raw('select a.id,a.title,a.alias,a.part_caption,a.full_caption,a.created,b.url_thumb,b.thumb,b.url_image,b.image,c.first_name,c.last_name
					from news_article as a
					left join file as b on a.file_id = b.id
					left join user as c on a.created_by=c.id
					where a.active=1 and a.trash=0
					and a.published=1
					and b.file_category_id=4
					order by a.id desc
					limit 4
					'));
	}
	
	public static function full_news()
	{
		return DB::select(DB::raw('select a.id,a.title,a.alias,a.part_caption,a.full_caption,a.created,b.url_thumb,b.thumb,b.url_image,b.image,c.first_name,c.last_name
					from news_image as a
					left join file as b on a.file_id = b.id
					left join user as c on a.created_by=c.id
					where a.active=1 and a.trash=0
					and a.published=1
					and b.file_category_id=1
					order by a.id desc
					'));
	}
	
	public static function gallery_home()
	{
		return DB::select(DB::raw('SELECT b.url_image,b.image,b.url_thumb,b.thumb
					FROM news_image AS a
					LEFT JOIN file AS b ON a.file_id=b.id
					WHERE a.active=1 AND a.trash=0 
					AND a.published=1 AND b.file_category_id=2 ORDER BY a.id DESC LIMIT 16
					'));
	}
}