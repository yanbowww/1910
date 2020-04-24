<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <title>2020年中国最大电子商城-梦妤商品管理</title>
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
        <li><a href="{{url('/brand')}}">商品品牌</a></li>
        <li><a href="{{url('/cate')}}">商品分类</a></li>
        <li class="active"><a href="{{url('/goods')}}">商品管理</a></li>
        <li><a href="{{url('/admin')}}">管理员管理</a></li>
        <li><a href="{{url('/lianjie')}}">友情链接管理</a></li>
      </ul>
    </div>
  </div>
</nav>
<center><h3 style="color:blue;">梦妤管理</h3><a href="{{url('/goods')}}" class="btn btn-default">列表</a><hr/></center>

@if ($errors->any()) 
<div class="alert alert-danger"> 
  <ul> 
  @foreach ($errors->all() as $error) 
  <li>{{ $error }}</li> 
  @endforeach
  </ul> 
</div>
 @endif

<form action="{{url('/goods/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
  @csrf
  <!-- {{csrf_field()}}
  <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_name" id="firstname" 
           placeholder="请输入商品名称">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品货号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_number" id="lastname" 
           placeholder="请输入商品货号">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品分类</label>
    <div class="col-sm-2">
      <select name="goods_cate" class="form-control">
        <option value="0">请选择分类</option>
        <option>庞大</option>
        <option>渺小</option>
        <option>正常</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品品牌</label>
    <div class="col-sm-2">
       <select name="goods_brand" class="form-control">
        <option value="0">请选择品牌</option>
        <option>高端</option>
        <option>大气</option>
        <option>上档次</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_price" id="lastname" 
           placeholder="请输入商品价格">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品库存</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_num" id="lastname" 
           placeholder="请输入商品库存">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio" name="is_show" checked value="是">是
           <input type="radio" name="is_show" value="否">否
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否新品</label>
    <div class="col-sm-10">
      <input type="radio" name="is_new" checked value="是">是
           <input type="radio" name="is_new" value="否">否
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否精品</label>
    <div class="col-sm-10">
      <input type="radio" name="is_jing" checked value="是">是
           <input type="radio" name="is_jing" value="否">否
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品主图</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="goods_logo" id="lastname">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品相册</label>
    <div class="col-sm-10">
      <input type="file" multiple="multiple" class="form-control" name="goods_imgs[]" id="lastname">
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