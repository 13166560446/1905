<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests\StoreAdminPost;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class StudentController extends Controller{
	public function index(){
		$page=request()->page??1;
		// $data=Cache::get('data_'.$page);
		$data=Redis::get('data_'.$page);
		// dump($data);
		if(!$data){
			echo 'dd=====';
			$pageSize = config('app.pageSize');
			$data = Student::paginate($pageSize);
			// Cache::put('data_'.$page,$data,10);
			$data=serialize($data);
			Redis::set('data_'.$page,$data,10);
		}
		$data=unserialize($data);
		return view('admin.student.index',['data'=>$data]);
		
	}

}