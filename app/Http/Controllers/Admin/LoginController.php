<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests\StoreAdminPost;
use Illuminate\Support\Facades\Cache;
class LoginController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * 添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.login.login');
    }

    /**
     * Store a newly created resource in stora
     * ge.
     * 执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(\App\Http\Requests\StoreBrandPost $request){
    public function store(Request $request)
    {

         $post=$request->except('_token');
          $validator = \Validator::make($post, [
            'admin_name' => 'required',
            'admin_pwd' => 'required'
        ],[
            'admin_name.required' => '账号不能为空',
            // 'admin_name.alpha_dash' => '账号可以包含字母和数字，以及破折号和下划线',
            'admin_pwd.required' => '密码不能为空',
            // 'admin_pwd.between' => '密码必须在4-10之间',
        ]);
        if ($validator->fails()) {
            return redirect('login/login')
            ->withErrors($validator)
            ->withInput();
        }
        $where=[
            ['admin_name','=',$post['admin_name']],
            // ['admin_pwd','=',$post['admin_pwd']]
        ];

        $admin = Admin::where($where)->first();
        // dd($admin);
         if ($admin['admin_pwd']==$post['admin_pwd']) {
            if ($admin) {
                session(['admin'=>$admin]);
                return redirect('/text/index');
            }
        }else{
            return redirect('/login/login')->with('msg','没有此用户');
        }




    }
    public function del(){
        session(['admin'=>null]);
        return redirect('login/login');
    }
}
