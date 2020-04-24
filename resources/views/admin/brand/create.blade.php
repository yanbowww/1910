<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <title>2020年中国最大电子商城-梦妤管理</title>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">微商城</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('/brand')}}">商品品牌</a></li>
        <li><a href="{{url('/category')}}">商品分类</a></li>
        <li><a href="{{url('/goods')}}">商品管理</a></li>
        <li><a href="{{url('/admin')}}">管理员管理</a></li>
        <li><a href="{{url('/lianjie')}}">友情链接管理</a></li>
      </ul>
    </div>
  </div>
</nav>
<center><h3 style="color:blue;">梦妤管理</h3><a href="{{url('/brand')}}" class="btn btn-default">列表</a><hr/></center>

@if ($errors->any()) 
<div class="alert alert-danger"> <ul> @foreach ($errors->all() as $error) 
  <li>{{ $error }}</li> 
  @endforeach
  </ul> 
</div>
 @endif
<form action="{{url('/brand/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
  @csrf
  <!-- {{csrf_field()}}
  <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="brand_name" id="firstname" 
           placeholder="请输入品牌名称">
           <a style="color:red">{{$errors->first('brand_name')}}</a>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="brand_url" id="lastname" 
           placeholder="请输入品牌网址">
           <a style="color:red">{{$errors->first('brand_url')}}</a>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌LOGO</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="brand_logo" id="lastname" 
           placeholder="请输入品牌LOGO">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌描述</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="brand_desc" id="lastname" 
           placeholder="请输入品牌描述">
         </textarea>
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</form>

</body>
</html>