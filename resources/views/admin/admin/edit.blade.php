<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理员管理</title>
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
        <li><a href="{{url('/pinpai')}}">商品品牌</a></li>
        <li><a href="{{url('/cate')}}">商品分类</a></li>
        <li><a href="{{url('/brand')}}">品牌管理</a></li>
        <li class="active"><a href="{{url('/admin')}}">管理员管理</a></li>
        <li><a href="{{url('/lianjie')}}">友情链接管理</a></li>
      </ul>
    </div>
  </div>
</nav>
<center><h1>管理员管理</h1></center><a style="float: right" href="{{url('/admin')}}"  class="btn btn-success">列表</a>
</body></html>
<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif -->
<form action="{{url('/admin/update/'.$admin->admin_id)}}" method="post" class="form-horizontal" role="form">
	@csrf<!-- 419错误解决方式 -->
	<div class="form-group">
		<label for="firstname" class="col-sm-2  control-label">管理员名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$admin->admin_name}}"  name="admin_name" id="firstname" 
				   placeholder="请输入管理员名称">
		</div>
		<center><b style="color: red">{{$errors->first('admin_name')}}</b></center>
	</div>


	<div class="form-group">
		<label for="firstname" class="col-sm-2  control-label">手机号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$admin->admin_tel}}" name="admin_tel" id="firstname" 
				   placeholder="请输入管理员手机号">
		</div>
		<center><b style="color: red">{{$errors->first('admin_tel')}}</b></center>
	</div>


	<div class="form-group">
		<label for="firstname" class="col-sm-2  control-label">邮箱</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" value="{{$admin->admin_email}}" name="admin_email" id="firstname" 
				   placeholder="请输入管理员邮箱">
		</div>
		<center><b style="color: red">{{$errors->first('admin_email')}}</b></center>
	</div>

	

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>