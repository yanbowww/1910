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
        <li class="active"><a href="{{url('/goods')}}">商品管理</a></li>
        <li><a href="{{url('/admin')}}">管理员管理</a></li>
        <li><a href="{{url('/lianjie')}}">友情链接管理</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="navbar-header">
	欢迎【】登录
</div>
<center><h3 style="color:blue;">梦妤品牌管理</h3><a href="{{url('/goods/create')}}" class="btn btn-success">添加</a><hr/></center>
<form>
	<select name="goods_cate">
		<option>请选择分类</option>
		<option>庞大</option>
        <option>渺小</option>
        <option>正常</option>
	</select>
	<select name="goods_brand">
		<option>请选择品牌</option>
		<option>高端</option>
        <option>大气</option>
        <option>上档次</option>
	</select>
	<input type="text" name="goods_name" value="{{$goods_name}}" placeholder="请输入商品名称关键字">
	<button>搜索</button>
</form>
<table class="table table-striped">
	<thead>
		<tr>
			<th>商品ID</th>
			<th>商品名称</th>
			<th>商品货号</th>
			<th>商品分类</th>
			<th>商品品牌</th>
			<th>商品价格</th>
			<th>商品库存</th>
			<th>商品主图</th>
			<th>商品相册</th>
			<th>是否显示</th>
			<th>是否新品</th>
			<th>是否精品</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
@foreach($goods as $v)
		<tr>
			<td>{{$v->goods_id}}</td>
			<td>{{$v->goods_name}}</td>
			<td>{{$v->goods_number}}</td>
			<td>{{$v->goods_cate}}</td>
			<td>{{$v->goods_brand}}</td>
			<td>{{$v->goods_price}}</td>
			<td>{{$v->goods_num}}</td>
			<td>@if($v->goods_logo)<img src="{{env('UPLOADS_URL')}}{{$v->goods_logo}}" height="100" width="100">@endif</td>
			<td>@if(isset($v->goods_imgs))
				@php $imgs = explode('|',$v->goods_imgs);
				 @endphp
				@foreach($imgs as $img)
				<img width="100" height="100" src="{{env('UPLOADS_URL')}}{{$img}}">
				@endforeach
				@endif
			</td>
			<td>{{$v->is_show}}</td>
			<td>{{$v->is_new}}</td>
			<td>{{$v->is_jing}}</td>
			<td>
				<a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn btn-primary">编辑</a>
				<a href="{{url('/goods/destroy/'.$v->goods_id)}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
@endforeach
<tr><td colspan="6">{{$goods->links()}}</td></tr>
	</tbody>
</table>

</body>
</html>