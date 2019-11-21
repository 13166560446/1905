<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Category;
use App\Text;
use App\Http\Requests\StoreTextPost;
class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = config('app.pageSize');
        $word = request()->word;
        $cate_id = request()->cate_id;
        $Cate_Info=category::get()->toArray();
        $info = getCateInfo($Cate_Info);
        $where=[];
        if ($word) {
            $where[]=['title','like',"%$word%"];
        }
        if ($cate_id) {
            $where[]=['category.cate_id','like',"%$cate_id%"];
        }

         $data=DB::table('text')
            ->join('category', 'text.cate_id', '=', 'category.cate_id')
            ->select('text.*', 'category.cate_name')
            ->where($where)->paginate($pageSize);
        $query = request()->all();
        //dd($data);
        return view('text.index',['data'=>$data,'query'=>$query,'info'=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cate_Info=category::get()->toArray();
        $info = getCateInfo($Cate_Info);
        return view('text.create',['info'=>$info]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTextPost $request)
    {
        $post = $request->except('_token');
        //dd($post);
        // if($validator->fails()){
        //     return redirect('text/create')
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        //文件上传
        if ($request->hasFile('img')) {
            $post['img'] = $this->upload('img');
        }
        $text = Text::create($post);
        if ($text->id) {
            return redirect('/text/index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $title=request()->title;
        $id = request()->id;

        if($title){
            $where[]=['title','=',$title];
        }

        if($id){
            $where[]=['id','=',$id];
        }

        $where['id']=$id;

        $res=Text::where($where)->count();
        echo $res;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (!$id) {
            return;
        }
       $text=Text::find($id);
        $Cate_Info = Category::get()->toArray();
        //dd($Cate_Info);
        $info = getCateInfo($Cate_Info);
        return view('text.edit',['info'=>$info,'text'=>$text]);
        }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //检验
        //dd($id);
        //接值
        $post=$request->except('_token');
        //有无文件上传
        if ($request->hasFile('img')) {
            $post['img'] = $this->upload('img');
        }
        $text = Text::where('id',$id)->update($post);
        // dd($text);
        return redirect('/text/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
         echo $id;
        if (!$id) {
            abort(404);
        }

        $res = Text::where('id',$id)->delete();
        if ($res) {
            return redirect('/text/index');
        }
    }






    public function upload($filename){
        if (request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('text');
            return $store_result;
        }
        exit('为获取到上传文件或上传过程出错');

    }
}
