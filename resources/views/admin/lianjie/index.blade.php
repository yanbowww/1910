<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>2020年中国最大电子商城</title>
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
        <li><a href="{{url('/admin')}}">管理员管理</a></li>
        <li class="active"><a href="{{url('/lianjie')}}">友情链接管理</a></li>
      </ul>
    </div>
  </div>
</nav>
<center><h3 style="color:blue;">分类管理</h3><a href="{{url('/lianjie/create')}}" class="btn btn-success">添加</a><hr/></center>
<form>
	<input type="text" name="l_name" value="{{$l_name}}" placeholder="请输入网站名称关键字">
	<button>搜索</button>
</form>
<table class="table table-striped">
	<thead>
		<tr>
			<th>网站ID</th>
			<th>网站名称</th>
			<th>网站网址</th>
			<th>网站类型</th>
			<th>图片LOGO</th>
			<th>网站联系人</th>
			<th>网站介绍</th>
			<th>是否显示</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
@foreach($lianjie as $v)
		<tr>
			<td>{{$v->l_id}}</td>
			<td>{{$v->l_name}}</td>
			<td>{{$v->i_wangzhi}}</td>
			<td>{{$v->l_type}}</td>
			<td>@if($v->l_logo)<img src="{{env('UPLOADS_URL')}}{{$v->l_logo}}" height="100" width="100">@endif</td>
			<td>{{$v->l_man}}</td>
			<td>{{$v->l_desc}}</td>
			<td>{{$v->l_show}}</td>
			<td>
				<a href="{{url('/lianjie/edit/'.$v->l_id)}}" class="btn btn-primary">编辑</a>
				<a href="{{url('/lianjie/destroy/'.$v->l_id)}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
@endforeach
<tr>
	<td colspan="6">{{ $lianjie->appends(['l_name' => $l_name])->links() }}</td>
</tr>
</tbody>
</table>

</script>

</body>
</html>
<!-- <script type="text/javascript">
	$(function(){
		 $(document).on("click",".btn-danger",function(){
      var _this=$(this);
        var l_id=_this;
       
        var data=confirm('确认删除吗');
        if(data==true){
          $.post(
            "{:url('LianjieController/destroy')}",
            {l_id:l_id},
            function(res){
            
                alert(res);
              
             
            },
            'json'
            )
       }
    });
	});
</script> -->
