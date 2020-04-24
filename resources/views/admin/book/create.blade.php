<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <title>2020年中国最大电子商城-文章管理</title>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h3 style="color:blue;">文章管理</h3><a href="{{url('/book')}}" class="btn btn-default">列表</a><hr/></center>

<form action="{{url('/book/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
  @csrf
  <!-- {{csrf_field()}}
  <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章标题</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="book_name" id="firstname" 
           placeholder="请输入文章标题">
           
    </div>

    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章分类</label>
    <div class="col-sm-10">
     <select class="form-control" name="bookstore_id">
       <option value='0'>请选择文章分类</option>
       @foreach($book as $v)
       <option value="{{$v->book_id}}">{{str_repeat('|——',$v->level)}}{{$v->book_name}}</option>
       @endforeach
     </select>
    </div>
    <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">文章重要性</label>
    <div class="col-sm-10">
      <input type="radio" name="book_zhong" value="普通" checked>普通
           <input type="radio" name="book_zhong" value="置顶">置顶
    </div>
  </div>
<div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio" name="book_xian" value="显示" checked>显示
           <input type="radio" name="book_xian" value="不显示">不显示
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章作者</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="book_man" id="firstname" 
           placeholder="请输入文章作者">
    </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">作者email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="book_email" id="firstname" 
           placeholder="请输入作者email">
    </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">关键字</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="book_zi" id="firstname" 
           placeholder="请输入关键字">
    </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">网页描述</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="book_intro" id="firstname">
      </textarea>
    </div>
     <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">上传文件</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="book_logo" id="firstname">
    </div>
 
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</form>

</body>
</html>