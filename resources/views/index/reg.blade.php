@extends('layouts.shop')
@section('title','注册')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="login.html" method="get" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="login.html">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="name" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text" name="code" placeholder="输入短信验证码" /> <button type="button">获取验证码</button></div>
       <div class="lrList"><input type="password" name="admin_pwd" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="password" name="admin_pwds" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit"  value="立即注册" />
      </div>
     </form><!--reg-login/-->
     <script>
        $('button').click(function(){
        var name = $('input[name="name"]').val();
        var reg = /^1[3|5|6|7|8|9]\d{9}$/;
        if(reg.test(name)){
          $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
          $.post('/sendSms',{mobile:name},function(result){
           alert(result.msg);
          },'json');
          return;
        }
        //邮箱验证正则
        var emailreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(emailreg.test(name)){
          $.get('/sendEmail',{email:name},function(result){
            alert(result.msg);
          },'json');
          return;
        }
        alert('请输入正确的手机号或者邮箱');
       });
            $('#submit').click(function(){
      var moblie=$('input[name="moblie"]').val();
      var tel=/^1[3,5,6,7,8,9]\d{9}$/;
      var email=/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
      var afalg=false;
      if(moblie==''){
        $('input[name="moblie"]+span').css('color','red').html('<b>'+'请填写手机号或邮箱'+'</b>');
        afalg=false;
      }else{
        $('input[name="moblie"]+span').html('');
        afalg=true;
      }
      var code=$('input[name="code"]').val();
      var bfalg=false;
      if(code==''){
        $('#code').css('color','red').html('<b>'+'请填验证码'+'</b>');
        bfalg=false;
      }else{
        $('#code').css('color','red').html('');
        bfalg=true;
}
              var admin_pwd=$('input[name="admin_pwd"]').val();
      var preg=/^[0-9a-zA-Z]{8,20}$/;
      var cfalg=false;
      if(admin_pwd==''){
        $('input[name="admin_pwd"]+span').css('color','red').html('<b>'+'请填写新密码'+'</b>');
        cfalg=false;
      }else if(!preg.test(admin_pwd)){
         $('input[name="admin_pwd"]+span').css('color','red').html('<b>'+'密码格式不对'+'</b>');
      }else{
         $('input[name="admin_pwd"]+span').css('color','red').html('');
        cfalg=true;
      }
      var admin_pwds=$('input[name="admin_pwds"]').val();
      var dfalg=false;
      if(admin_pwds==''){
        $('input[name="admin_pwds"]+span').css('color','red').html('<b>'+'请填写确认密码'+'</b>');
        dfalg=false;
      }else if(!(admin_pwds == admin_pwd)){
        $('input[name="admin_pwds"]+span').css('color','red').html('<b>'+'确认密码要与密码一致'+'</b>');
        dfalg=false;
      }else{
         $('input[name="admin_pwds"]+span').css('color','red').html('');
        dfalg=true;
      }
      if(afalg===false || bfalg===false || cfalg===false || dfalg===false){
        return false;
      }
      $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
      $.post('/register',{'moblie':moblie,'code':code,'admin_pwd':admin_pwd,'admin_pwds':admin_pwds},function(result){
            if(result.no==0){
              location.href='/login';
            }
            alert(result.msg);
          },'json');
          return;
});
      </script>
      @endsection