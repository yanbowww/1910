<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>微商城后台管理</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
<center><h3 style="color:blue;">微商城后台管理</h3></center><hr/>

<b style="color:red">{{session('msg')}}</b>
<form action="{{url('/logindo')}}" method="post" class="form-horizontal" role="form">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-3  control-label">用户名</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="admin_name" id="firstname" 
				   placeholder="请输入用户名">
		</div>
		<center><b style="color: red">{{$errors->first('admin_name')}}</b></center>
	</div>


	<div class="form-group">
		<label for="firstname" class="col-sm-3  control-label">密码</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" name="admin_pwd" id="firstname" 
				   placeholder="请输入密码">
		</div>
	</div>
	<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<div class="checkbox">
			<label>
				<input type="checkbox" name="isrember">七天免登录
			</label>
		</div>
	</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">登录</button>
		</div>
	</div>
</form>

</body>
</html>