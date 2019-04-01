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

Route::get('/', function () {
    return view('welcome');
});

Route::get('KhoaHoc',function(){
	return "Xin chao cac ban";
});

Route::get('KhoaHoc/Laravel',function(){
	echo "<h1>Khoahoc - Laravel<h1>";
});

Route::get('HoTen/{ten}',function($ten){
	echo "Ten cua ban la:".$ten;
});

Route::get('KhoaPham/{ngay}',function($ngay){
	echo "Hom nay la ngay:".$ngay;
})->where(['ngay' => '[0-9]+']);

Route::get('Route1',['as' => 'MyRoute',function(){
	echo "Xin chao cac ban";
}]);

Route::get('Route2',function(){
	echo "Day la Route 2";
})->name('MyRoute2');

Route::get('GoiTen',function(){
	return redirect()->route('MyRoute2');
});

Route::group(['prefix' => 'MyGroup'],function(){
	Route::get('User1',function(){
		echo "User 1:";
	});
	Route::get('User2',function(){
		echo "User 2:";
	});
	Route::get('User3',function(){
		echo "User 3:";
	});
});

Route::get('GoiController','MyController@XinChao');

Route::get('ThamSo/{ten}','MyController@KhoaHoc');

Route::get('MyRequest','MyController@GetURL');

Route::get('GetForm',function(){
	return view('postForm');
});

Route::post('postForm',['as'=>'postForm','uses'=>'MyController@postForm']);

Route::get('setCookie','MyController@setCookie');

Route::get('getCookie','MyController@getCookie');

Route::get('uploadFile',function(){
	return view('postFile');
});

Route::post('postFile',['as' => 'postFile','uses' => 'MyController@postFile']);

Route::get('getJson','MyController@getJson');

Route::get('MyView','MyController@MyView');

Route::get('Time/{t}','MyController@Time');

View::share('KhoaHoc','Laravel');

//blade template

Route::get('Blade',function(){
	return view('pages.php');
});

Route::get('BladeTemplate/{str}','MyController@Blade');

// Database 

Route::get('database',function(){
	//Schema::create('loaisanpham',function($table){
		//$table->increments('id');
		//$table->string('ten',200);
	//});
	Schema::create('theloai',function($table){
		$table->increments('id');
		$table->string('ten',200)->nullable();
		$table->string('nsx')->default('Nha san xuat');
	});
	echo "Da thuc hien tao bang";
});

Route::get('lienketbang',function(){
	Schema::create('sanpham',function($table){
		$table->increments('id');
		$table->string('ten');
		$table->float('gia');
		$table->integer('soluong')->default(0);
		$table->integer('id_loaisanpham')->unsigned();
		$table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');
	});
	echo "da tao bang san pham";
});

Route::get('suabang',function(){
	Schema::table('theloai',function($table){
		//$table->dropColumn('nsx');
		$table->string('Email');
	});
		echo "da them cot Email";
});

// querry builder

Route::get('qb/get',function(){
	$data = DB::table('users')->get();
	//var_dump($data);
	foreach ($data as $users) 
	{
		foreach ($users as $user => $value) 
		{
			echo $user.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//select * from users where id = 2

Route::get('qb/where',function(){
	$data = DB::table('users')->where('id','=',2)->get();
	//var_dump($data);
	foreach ($data as $users) 
	{
		foreach ($users as $user => $value) 
		{
			echo $user.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//select id, name, email ...

Route::get('qb/select',function(){
	$data = DB::table('users')->select(['id','name','email'])->where('id','=',2)->get();
	//var_dump($data);
	foreach ($data as $users) 
	{
		foreach ($users as $user => $value) 
		{
			echo $user.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//select name as from ...

Route::get('qb/raw',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id','=',2)->get();
	//var_dump($data);
	foreach ($data as $users) 
	{
		foreach ($users as $user => $value) 
		{
			echo $user.":".$value."<br>";
		}
		echo "<hr>";
	}
});

//orderby 

Route::get('qb/orderBy',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->orderby('id','DESC')->where('id','>',1)->take(2);
	//var_dump($data);
	//var_dump($data);
	echo $data->count();
	//foreach ($data as $users) 
	///{
		//foreach ($users as $user => $value) 
		//{
			//echo $user.":".$value."<br>";
		//}
		//echo "<hr>";
	//}
});

//

Route::get('qb/update',function(){
	DB::table('users')->where('id',1)->update(['name' => 'Thuan0','email'=>'Thuan@gmail.com']);
	echo "da update";
});
//xoa id trong bang
Route::get('qb/delete',function(){
	DB::table('users')->where('id','=',1)->delete();
	echo "da delete";
});
//xoa tat ca du lieu trong bang
Route::get('qb/truncate',function(){
	DB::table('users')->where('id','=',1)->truncate();
	echo "da delete";
});

// save user

Route::get('model/save',function(){
	$user = new App\User();
	$user->name = "Mai";
	$user->email = 'Mail@gmail.com';
	$user->password = '123456';
	$user->save();
	echo "Da thuc hien save()";
});

Route::get('model/query',function(){
	$user = App\User::find(1);
	echo $user->name;
});

// save san pham

Route::get('model/sanpham/save/{ten}',function($ten){
	$sanpham = new App\SanPham();
	$sanpham->ten = $ten;
	$sanpham->soluong = 100;
	$sanpham->save();
	echo "Da Luu".$ten;
});

// Lay du lieu duoi dang JSON, array

Route::get('model/sanpham/all',function(){
	//$sanpham = App\SanPham::all()->toJson();
	$sanpham = App\SanPham::all()->toArray();
	var_dump($sanpham);
	//echo $sanpham;
});
// lAY DU LIEU THEO TEN
Route::get('model/sanpham/ten',function(){
	$sanpham = App\SanPham::where('ten','Laptop')->get()->toArray();
	//var_dump($sanpham);
	echo $sanpham[0]['ten']; 
});
// xoa du lieu theo ten
Route::get('model/sanpham/xoa',function(){
	$sanpham = App\SanPham::destroy(4);
	//var_dump($sanpham);
	//echo $sanpham[0]['ten']; 
});

Route::get('taocot',function(){
	Schema::table('sanpham',function($table){
		$table->integer('id_loaisanpham')->unsigned();
	});
});

// LIEN KET BANG

Route::get('lienket_sanpham',function(){
	$data = App\SanPham::find(3)->LoaiSanPham->toArray();
	var_dump($data);
});

Route::get('lienket_loaisanpham',function(){
	$data = App\LoaiSanPham::find(1)->SanPham->toArray();
	var_dump($data);
});

//Middleware 
Route::get('diem',function(){
	echo "Ban da du diem";
})->middleware('MyMiddleware')->name('diem');

Route::get('loi',function(){
	echo "Ban chua co du diem";
})->name('loi');

Route::get('nhapdiem',function(){
	return view('nhapdiem');
})->name('nhapdiem');

// Auth

Route::get('dangnhap',function(){
	return view('dangnhap');
});

Route::post('login','AuthController@login')->name('123');

Route::get('logout','AuthController@logout');

//session

Route::group(['middleware' => ['web']],function(){
	Route::get('Session',function(){
		Session::put('KhoaHoc','Laravel');
		echo "Da dat Session";
		//echo Session::get('KhoaHoc');
		if(Session::has('KhoaHoc'))
			echo "Da co Session Khoa Hoc";
		else 
			echo "Session Khoa Hoc khong ton tai";
	});
});

Route::get('tin','MyController@index');

