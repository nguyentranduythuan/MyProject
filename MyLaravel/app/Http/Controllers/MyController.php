<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\TinModel;

class MyController extends Controller
{
    public function XinChao()
    {
    	echo "Xin chao moi nguoi";
    }

    public function KhoaHoc($ten) {
    	echo "Khoa HOC:".$ten;
    	return redirect()->route('MyRoute2');
    }

    public function GetURL(Request $request) {
    	//return $request->path();
    	//return $request->url();
    	//if ($request->isMethod('post')) {
    		//echo "Day la phuong thuc get";
    	//} else {
    		//echo "Day khong phai la phuong thuc get";
    	//}
    	if ($request->is('My*')) {
    		echo "Co My";
    	} else {
    		echo "Khong co My";
    	}		
    }

    public function postForm(Request $request)
    {
    	//echo "Ten cua ban la:";
    	//echo $request->hoten;
    	if ($request->has('tuoi')) {
    		echo "Co tham so";
    	} else {
    		echo "Khong co tham so";
    	}
    	
    }

    public function setCookie() {
    	$reponse = new Response();
    	$reponse->withCookie('KhoaHoc','Laravel',1);
    	return $reponse;
    }

    public function getCookie(Request $request) {
    	return $request->cookie('KhoaHoc');
    }

    public function postFile(Request $request){

    	if ($request->hasFile('myFile')) {
    		$file = $request->file('myFile');
    		$file->move('img','myfile.jpg');
    	} else {
    		echo "Chua upload File";
    	}
    	
    }

    public function getJson () {
    	$array = ['KhoaHoc' => 'Laravel - Khoa Pham'];
    	return response()->json($array);
    }

    public function MyView () {
    	return view('view.khoapham');
    }

    public function Time($t) {
    	return view('MyView',['time'=>$t]);
    }

    public function Blade($str) {
    	$khoahoc = '<b>Nguyen Tran Duy Thuan</b>';
    	if ($str == 'laravel') {
    		return view('pages.laravel',['khoahoc'=>$khoahoc]);
    	} elseif ($str == 'php') {
    		return view('pages.php',['khoahoc'=>$khoahoc]);
    	}
    	
    }

    public function index() {

        $tin = TinModel::paginate(5);
        return view('tin',['tin'=>$tin]);
    }

}
