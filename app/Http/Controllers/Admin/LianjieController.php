<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lianjie;
class LianjieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $l_name = request()->l_name;
        $where = [];
        if($l_name){
            $where[]=['l_name','like',"%$l_name"];
        }

        //$brand = DB::table('brand')->all();
        $pageSize = config('app.pageSize');
        $lianjie = Lianjie::orderBy('l_id','desc')->where($where)->paginate($pageSize);//orm操作
        return view('admin.lianjie.index',['lianjie'=>$lianjie,'l_name'=>$l_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lianjie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'l_name' => 'required|unique:lianjie',
            'l_wangzhi' =>'required',
           
        ],[
            'l_name.required'=>'网站名称必填！',
            'l_name.unique'=>'网站名称已存在！',
            'l_wangzhi.required'=>'网址不能为空!',
            
        ]);

         $post = request()->except(['_token']);

         if ($request->hasFile('l_logo') ){
            $post['l_logo'] = $this->upload('l_logo');
        }
         $res = Lianjie::create($post);
        
        if($res){
            return redirect('/lianjie');
        }
    }

      public function upload($filename){
        if(request()->file($filename)->isValid()){
            //接受上传文件
            $file = request()->$filename;
            //实现上传
            $path = $file->store('uploads');
            return $path;
        }
        exit('文件上传出错！！！');
      }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $lianjie = Lianjie::find($id);
       
    
        return view('admin.lianjie.edit',['lianjie'=>$lianjie]);
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
         $post = $request->except('_token');

          if ($request->hasFile('l_logo') ){
            $post['l_logo'] = $this->upload('l_logo');
        }

         $res = Lianjie::where('l_id',$id)->update($post);


        if($res!==false){
            return redirect('/lianjie');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Lianjie::destroy($id);
        if($res){
            return redirect('/lianjie');
        }
    }
}
