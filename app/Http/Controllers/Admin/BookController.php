<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use DB;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = config('app.pageSize');
        $book = Book::orderBy('book_id','desc')->paginate($pageSize);
        //$book = Book::all();
        //调用无限极分类
        $book = $this->createTree($book);
        return view('admin.book.index',['book'=>$book]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = Book::all();
        //调用无限极分类
        $book = $this->createTree($book);
        //dd($book);
        return view('admin.book.create',['book'=>$book]);
    }
    public function createTree($data,$bookstore_id=0,$level=0){
        if(!$data){
            return;
        }
        static $newarray = [];
        foreach($data as $v){
            if($v->bookstore_id==$bookstore_id){
                $v->level = $level;
                $newarray[] = $v;
                $this->createTree($data,$v->book_id,$level+1);
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
        //dump($post);die;
        //文件上传
        if($request->hasFile('book_logo')){
            $post['book_logo'] = $this->upload('book_logo');
            
        }
        $res = Book::create($post);
        if($res){
            return redirect('/book');
        }
    }
    public function upload($filename){

        if(request()->file($filename)->isValid()){
            //接收上传文件
            $file = request()->$filename;
            //实现上传
            $path = $file->store('uploads');
            return $path;
        }
        exit('上传文件出错！');
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
        $book = Book::all();
        //调用无限极分类
        $book = $this->createTree($book);
        $booklist = DB::table('book')->where('book_id',$id)->first();
        return view('admin.book.edit',['book'=>$book,'booklist'=>$booklist]);
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
        $res = DB::table('book')->where('book_id',$id)->update($post);
        if($res!==false){
            return redirect('/book');
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
        $res = DB::table('book')->where('book_id',$id)->delete();
        if($res){
            return redirect('/book');
        }
    }
}
