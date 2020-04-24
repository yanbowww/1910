<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\goods;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //搜索
        $goods_name = request()->goods_name;
        $where = [];
        if($goods_name){
            $where[]=['goods_name','like',"%$goods_name%"];
        }
        $pagSize = config('app.pagSize');
        $goods = Goods::orderBy('goods_id','desc')->where($where)->paginate(3);
        //dd($goods);
        return view('admin.goods.index',['goods'=>$goods,'goods_name'=>$goods_name,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.create');
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
            'goods_name' => 'required|unique:goods|regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u',
            'goods_price' => 'required|numeric',
            'goods_num' => 'required|numeric|regex:/^\d{1,8}$/',
            'goods_number' => 'required',
        ],[
            'goods_name.required' => '商品名称必填！',
            'goods_name.unique' => '商品名称已存在！',
            'goods_name.regex' => '商品名称格式错误！',
            'goods_price.required' => '商品价格必填！',
            'goods_price.numeric' => '商品价格必须是数字！',
            'goods_num.required' => '商品库存必填！',
            'goods_numeric' => '商品库存必须是数字！',
            'goods_num.regex' => '商品库存不得超过8位！',
            'goods_number.required' => '商品货号必填!',
        ]);
        $post = request()->except(['_token']);
        dump($post);
        //$post = request()->only(['_token','goods_logo']);
        //$goods_name = $request->goods_name;
        //dd($post);
        //if($request->hasFile('brand_logo')){
        //dump($post);
        //dd($request->file('goods_logo')->isValid());
        //上传文件
        if($request->hasFile('goods_logo')){
            $post['goods_logo'] = $this->upload('goods_logo');
        }
        if(isset($post['goods_imgs'])){
            $imgs = $this->Moreupload('goods_imgs');
            $post['goods_imgs'] = implode('|',$imgs);
        }
        $res = DB::table('goods')->insert($post);
        if($res){
            return redirect('/goods');
        }
    }
    public function upload($filename){
        if(request()->file($filename)->isValid()){
            $file = request()->$filename;
            $path = $file->store('uploads');
            return $path;
        }
        exit('上传文件失败！');
    }

     public function Moreupload($filename){
         $file = request()->$filename;
         if(!is_array($file)){
         return;
     }
        foreach($file as $k =>$v){
        $path[$k] = $v->store('uploads');  
        }
        return $path;
        exit('上传文件失败！');
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
        $goodslist = DB::table('goods')->where('goods_id',$id)->first();
        return view('admin.goods.edit',['goodslist'=>$goodslist]);
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
       $res = DB::table('goods')->where('goods_id',$id)->update($post);
       if($res!==false){
        return redirect('/goods');
       }
       // if($res!==false){
       //  return redirect('/goods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('goods')->where('goods_id',$id)->delete();
        if($res){
            return redirect('/goods');
        }
    }
}
