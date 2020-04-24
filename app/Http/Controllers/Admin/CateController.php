<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Cate;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = Cate::all();
        //调用无限极分类
        $cate = $this->createTree($cate);
        return view('admin.cate.index',['cate'=>$cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $cate = Cate::all();
        //调用无限极分类
        $cate = $this->createTree($cate);
        //dd($cate);
        return view('admin.cate.create',['cate'=>$cate]);
    }
    //无限极分类
    public function createTree($data,$parent_id=0,$level=1)
    {
        if(!$data){
            return;
        }
        static $newarray = [];
        foreach($data as $v){
            if($v->parent_id==$parent_id){
                $v->level = $level;
                $newarray[] = $v;

                $this->createTree($data,$v->cate_id,$level+1);
            }
        }
        return $newarray;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');
        $res = Cate::create($post);
        if($res){
            return redirect('/cate');
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
        $cate = Cate::all();
        //调用无限极分类
        $cate = $this->createTree($cate);
        $catelist = DB::table('category')->where('cate_id',$id)->first();
        return view('admin.cate.edit',['cate'=>$cate,'catelist'=>$catelist]);
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
       $res = DB::table('category')->where('cate_id',$id)->update($post);
       if($res!==false){
        return redirect('/cate');
       }
        // //orm操作
        // $cate = Category::find($id);
        // $catelist->cate_name = $post['cate_name'];
        // $catelist->parent_id = $post['parent_id'];
        // $catelist->is_show = $post['is_show'];
        // $catelist->is_nav_show = $post['is_nav_show'];
        // $res = $catelist->save();
        // //dd($res);
        // if($res!==false){
        //     return redirect('/cate');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $res = DB::table('category')->where('cate_id',$id)->delete();
       if($res){
        return redirect('/cate');
       }
    }
}
