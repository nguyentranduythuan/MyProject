<?php

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
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@GetLogin');
Route::post('admin/dangnhap','UserController@PostLogin');
Route::get('admin/logout','UserController@GetLogout');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin_middleware'],function(){
	Route::group(['prefix'=>'theloai'],function(){

		Route::get('danhsach','TheLoaiController@GetDanhsach');

		Route::get('sua/{id}','TheLoaiController@GetSua');
		Route::post('sua/{id}','TheLoaiController@PostSua');

		Route::get('them','TheLoaiController@GetThem');
		Route::post('them','TheLoaiController@PostThem');

		Route::get('xoa/{id}','TheLoaiController@GetXoa');
	});

	Route::group(['prefix'=>'loaitin'],function(){

		Route::get('danhsach','LoaiTinController@GetDanhsach');

		Route::get('sua/{id}','LoaiTinController@GetSua');
		Route::post('sua/{id}','LoaiTinController@PostSua');

		Route::get('them','LoaiTinController@GetThem');
		Route::post('them','LoaiTinController@PostThem');

		Route::get('xoa/{id}','LoaiTinController@GetXoa');
	});

	Route::group(['prefix'=>'tintuc'],function(){

		Route::get('danhsach','TinTucController@GetDanhsach');

		Route::get('sua/{id}','TinTucController@GetSua');
		Route::post('sua/{id}','TinTucController@PostSua');

		Route::get('them','TinTucController@GetThem');
		Route::post('them','TinTucController@PostThem');

		Route::get('xoa/{id}','TinTucController@GetXoa');
	});

	Route::group(['prefix'=>'slide'],function(){

		Route::get('danhsach','SlideController@GetDanhsach');

		Route::get('sua/{id}','SlideController@GetSua');
		Route::post('sua/{id}','SlideController@PostSua');

		Route::get('them','SlideController@GetThem');
		Route::post('them','SlideController@PostThem');

		Route::get('xoa/{id}','SlideController@GetXoa');
	});

	Route::group(['prefix'=>'user'],function(){

		Route::get('danhsach','UserController@GetDanhsach');

		Route::get('sua/{id}','UserController@GetSua');
		Route::post('sua/{id}','UserController@PostSua');

		Route::get('them','UserController@GetThem');
		Route::post('them','UserController@PostThem');

		Route::get('xoa/{id}','UserController@GetXoa');
	});

	Route::group(['prefix'=>'comment'],function(){
		Route::get('xoa/{id}/{idTinTuc}','CommentController@GetXoa');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idTheLoai}','AjaxController@GetLoaiTin');
	});
});

Route::get('index','PageController@index');
Route::get('contact','PageController@contact');
Route::get('loaitin/{id}/{TenKhongDau}.html','PageController@loaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PageController@tintuc');
Route::get('dangnhap','PageController@GetDangNhap');
Route::post('dangnhap','PageController@PostDangNhap');
Route::get('dangxuat','PageController@GetDangXuat');
Route::post('comment/{id}','CommentController@PostComment');
Route::get('nguoidung','PageController@GetUser');
Route::post('nguoidung','PageController@PostUser');
Route::get('dangky','PageController@GetDangky');
Route::post('dangky','PageController@PostDangky');
Route::post('timkiem','PageController@TimKiem');