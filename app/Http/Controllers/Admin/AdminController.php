<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       $pageSize = config('app.pageSize');
       $admin = Admin::orderBy('admin_id','desc')->paginate($pageSize);//orm操作
       return view('admin.admin.index',['admin'=>$admin]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {   
        $admin=Admin::all();
        $admin_time = time();
        return view('admin.admin.create',['admin'=>$admin]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // //第一种验证
        $request->validate([
            'admin_name' => 'required|unique:admin',
            'admin_tel' =>'required|max:11|min:11',
            'admin_email' =>'required',
            'admin_pwd' =>'required',
            'admin_pwds' =>'required',
        ],[
            'admin_name.required'=>'管理员名称必填！',
            'admin_name.unique'=>'管理员名称已存在！',
            'admin_tel.required'=>'手机号不能为空!',
            'admin_tel.max'=>'手机号格式不正确',
            'admin_tel.min'=>'手机号格式不正确!',
            'admin_email.required'=>'邮箱不能为空!',
            'admin_pwd.required'=>'密码不能为空!',
            'admin_pwds.required'=>'确认密码不能为空!',
        ]);


        
        $post = $request->except('_token');
        $post['admin_time'] = time();

        //dump($post);
         $post['admin_pwd'] = encrypt($post['admin_pwd']);
         unset($post['admin_pwds']);
         //dd($post);
        $res = Admin::create($post);

        if($res){
            return redirect('/admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $admin = Admin::find($id);
        return view('admin.admin.edit',['admin'=>$admin]);
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
          // //第一种验证
        $request->validate([
            'admin_name' => 'required|unique:admin',
            'admin_tel' =>'required|max:11|min:11',
            'admin_email' =>'required',
            
          
        ],[
            'admin_name.required'=>'管理员名称必填！',
            'admin_name.unique'=>'管理员名称已存在！',
            'admin_tel.required'=>'手机号不能为空!',
            'admin_tel.max'=>'手机号格式不正确',
            'admin_tel.min'=>'手机号格式不正确!',
            'admin_email.required'=>'邮箱不能为空!',
            
           
        ]);
          $res = Admin::where('admin_id',$id)->update($post);
        if($res!==false){
            return redirect('/admin');
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
         $res = Admin::destroy($id);
        if($res){
            return redirect('/admin');
        }
    }
}
