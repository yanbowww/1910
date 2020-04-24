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
	
<center><h3 style="color:blue;">文章管理</h3><a href="{{url('/book/create')}}" class="btn btn-success">添加</a><hr/></center>
<table class="table table-striped">
	<thead>
		<tr>
			<th>文章ID</th>
			<th>文章标题</th>
			<th>文章重要性</th>
			<th>是否显示</th>
			<th>文章作者</th>
			<th>作者email</th>
			<th>关键字</th>
			<th>网页描述</th>
			<th>上传文件</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
@foreach($book as $v)
		<tr>
			<td>{{$v->book_id}}</td>
			<td>{{str_repeat('|——',$v->level)}}{{$v->book_name}}</td>
			<td>{{$v->book_zhong}}</td>
			<td>{{$v->book_xian}}</td>
			<td>{{$v->book_man}}</td>
			<td>{{$v->book_email}}</td>
			<td>{{$v->book_zi}}</td>
			<td>{{$v->book_intro}}</td>
			<td>@if($v->book_logo)<img src="{{env('UPLOADS_URL')}}{{$v->book_logo}}" height="100" width="100">@endif</td>
			<td>
				<a href="{{url('/book/edit/'.$v->book_id)}}" class="btn btn-primary">编辑</a>
				<a href="{{url('/book/destroy/'.$v->book_id)}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
@endforeach
<tr><td colspan="6">{{ $book->append(['book_name'=>$book_name])->links() }}</td></tr>
	</tbody>
</table>

</body>
</html>