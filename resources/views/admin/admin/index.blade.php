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
        <li><a href="{{url('/brand')}}">商品品牌</a></li>
        <li><a href="{{url('/cate')}}">商品分类</a></li>
        <li><a href="{{url('/goods')}}">商品管理</a></li>
        <li class="active"><a href="{{url('/admin')}}">管理员管理</a></li>
        <li><a href="{{url('/lianjie')}}">友情链接管理</a></li>
      </ul>
    </div>
  </div>
</nav>
<center><h3 style="color:blue;">管理员管理</h3><a href="{{url('/admin/create')}}" class="btn btn-success">添加</a><hr/></center>

</form>
<table class="table table-striped">
	<thead>
		<tr>
			<th>管理员Id</th>
			<th>管理员名称</th>
			<th>手机号</th>
			<th>邮箱</th>
			
			<th>添加时间</th>	
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
  @foreach($admin as $v)
		<tr>
			<td>{{$v->admin_id}}</td>
			<td>{{$v->admin_name}}</td>
			<td>{{$v->admin_tel}}</td>
			<td>{{$v->admin_email}}</td>

			<td>{{date('Y-m-d h:i:s',$v->admin_time)}}</td>
			<td>
				<a href="{{url('/admin/edit/'.$v->admin_id)}}" class="btn btn-primary">编辑</a>
				<a href="{{url('/admin/destroy/'.$v->admin_id)}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
  @endforeach
<tr><td colspan="6">{{$admin->links()}}</td></tr>
	</tbody>
</table>

</body>
</html>