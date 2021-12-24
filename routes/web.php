<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    // return view('welcome');
// });

Route::get('/', 'Home_f@index');

Route::get('dosen', 'DosenController@index');

//Modul Backend Auth
Route::get('auth', 'Auth@login');
Route::post('loginPost', 'Auth@loginx');
Route::get('logout', 'Auth@logout');
// End Modul Backend Auth

//Modul Backend Administrator
Route::get('admin', 'Administrator@index');
Route::post('dashboard', 'Administrator@to_dashboard');
Route::get('home', 'Administrator@dashboard');
//End Modul Backend Administrator

//Modul Backend User
Route::get('user', 'User@index');
Route::get('daftar_user', 'User@get_data_user'); //Untuk menampilkan list user
Route::get('add_user', 'User@tambah_user'); //Untuk menuju ke halaman create user
Route::post('create_user', 'User@save_user'); //Untuk proses save user
Route::post('create_user_tanpa_ajax', 'User@save_user_tanpa_ajax'); //Untuk proses save user
Route::get('edit_user/{id}', 'User@ubah_user'); //Untuk menuju ke halaman edit user
Route::get('profil_user/{id}', 'User@profil_detail'); //Untuk menuju ke halaman profil detail user
Route::post('update_user', 'User@update_user'); //Untuk proses edit user
Route::post('update_user_tanpa_ajax', 'User@update_user_tanpa_ajax'); //Untuk proses edit user
Route::post('update_profil_biodata', 'User@update_biodata'); //Untuk proses edit profil biodata
Route::post('update_profil_sosmed', 'User@update_sosmed'); //Untuk proses edit profil sosmed
Route::get('hapus_user/{id}', 'User@delete_user'); //Untuk proses delete user
Route::get('edit_password/{id}', 'User@change_password'); //Untuk menuju ke halaman change password
Route::post('update_password', 'User@update_pass'); //Untuk proses edit password
Route::get('level/{id}', 'User@level_user'); //Untuk menuju ke halaman level user
Route::post('add_level', 'User@add_level_user'); //Untuk proses add level user
Route::get('level_edit/{id}', 'User@level_user_edit'); //Untuk menuju ke halaman level user edit
Route::post('update_level_user', 'User@edit_level_user'); //Untuk proses edit level user
Route::get('menu_setting/{id}', 'User@setting_menu'); //Untuk menuju ke halaman setting menu
Route::post('add_menu_map', 'User@menu_map'); //Untuk proses save menu map
//End Modul Backend User


//Modul Backend Menu
Route::get('menu', 'Menu@index');
Route::get('daftar_menu', 'Menu@get_data_menu'); //Untuk menampilkan list menu
Route::get('add_menu', 'Menu@tambah_menu'); //Untuk menuju ke halaman create menu
Route::post('cek_menu', 'Menu@check_menu'); //Untuk proses cek menu agar tidak duplikasi
Route::post('create_menu', 'Menu@save_menu'); //Untuk proses save menu
Route::get('edit_menu/{id}', 'Menu@ubah_menu'); //Untuk menuju ke halaman edit menu
Route::post('update_menu', 'Menu@update_menu'); //Untuk proses edit menu
Route::get('hapus_menu/{id}', 'Menu@delete_menu'); //Untuk proses delete menu
//End Modul Backend Menu

//Modul Backend Settings
Route::get('settings/module', 'Module@index');
Route::get('settings/add_module', 'Module@tambah_module'); //Untuk menuju ke halaman create module
Route::post('settings/create_module', 'Module@save_module'); //Untuk proses save module
Route::get('settings/hapus_module/{id}', 'Module@delete_module'); //Untuk proses delete module
Route::get('settings/menus', 'Menus@index');
Route::post('settings/create_menus_frontend', 'Menus@save_menus_frontend'); //Untuk proses save menus frontend
Route::get('settings/edit_menus_frontend/{id}', 'Menus@ubah_menus_frontend'); //Untuk menuju ke halaman edit menus frontend
Route::post('settings/update_menus_frontend', 'Menus@update_menus_frontend'); //Untuk proses edit menus frontend
Route::get('settings/hapus_menus_frontend/{id}', 'Menus@delete_menus_frontend'); //Untuk proses delete menus frontend
Route::get('settings/customize', 'Customize@index');
Route::get('settings/add_customize', 'Customize@tambah_customize'); //Untuk menuju ke halaman create customize
Route::post('settings/create_customize', 'Customize@save_customize'); //Untuk proses save customize
Route::get('settings/edit_customize/{id}', 'Customize@ubah_customize'); //Untuk menuju ke halaman edit customize
Route::post('settings/update_customize', 'Customize@update_customize'); //Untuk proses edit menus frontend
Route::get('settings/hapus_customize/{id}', 'Customize@delete_customize'); //Untuk proses delete customize
//End Modul Backend Settings

//Modul Frontend About
Route::get('about', 'About_f@index');
//End Modul Frontend About