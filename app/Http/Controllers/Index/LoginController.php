<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login(){

    	return view('index.login');
    }
     public function reg(){
    	
    	return view('index.reg');
    }
    public function sendSms(Request $request){
    	$mobile = $request->mobile;
        //dd($mobile);
    	//php验证手机号
    	$reg = '/^1[3|5|6|7|8|9]\d{9}$/';
    	//dd(preg_match($reg,$mobile));
    	if(!preg_match($reg,$mobile)){
    		echo json_encode(['code'=>'00001','msg'=>'手机号格式不正确']);exit;
    	}
        $code = rand(100000,999999);
    	//发送
        $res = $this->sendMobaia($mobile,$code);
        //dd($res);
        if($res['Message']=='OK'){
            session('code',$code);
            echo json_encode(['code'=>'00000','msg'=>'发送成功']);exit;
        }
    	
    }

    public function sendMobaia($mobile,$code){

    // Download：https://github.com/aliyun/openapi-sdk-php
    // Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

    AlibabaCloud::accessKeyClient('LTAI4G6E5go5RRYhaP9nXYpu', 'mhwnmkxzirK6nYcMEPE7D0qmsGZxe9')
                        ->regionId('cn-hangzhou')
                        ->asDefaultClient();

    try {
        $result = AlibabaCloud::rpc()
                          ->product('Dysmsapi')
                          // ->scheme('https') // https | http
                          ->version('2017-05-25')
                          ->action('SendSms')
                          ->method('POST')
                          ->host('dysmsapi.aliyuncs.com')
                          ->options([
                                        'query' => [
                                          'RegionId' => "cn-hangzhou",
                                          'PhoneNumbers' => $mobile,
                                          'SignName' => "世界好大哈",
                                          'TemplateCode' => "SMS_182675143",
                                          'TemplateParam' => "{code:$code}",
                                        ],
                                    ])
                          ->request();
        return $result->toArray();
    } catch (ClientException $e) {
    return $e->getErrorMessage() . PHP_EOL;
    } catch (ServerException $e) {
    return $e->getErrorMessage() . PHP_EOL;
    }

        }


public function sendEmail(Request $request){
    $email = $request->email;

    //php 验证手机号
    $reg = '/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/';
    //dd(preg_match($reg,$email));
    if(!preg_match($reg,$email)){
        echo json_encode(['code'=>'00001','msg'=>'邮箱格式不正确']);exit;
    }
    $code = rand(100000,999999);
    $this->sendByEmail($email,$code);
    session(['code'=>$code]);
    echo json_encode(['code'=>'00000','msg'=>'发送成功']);exit;
}
//使用邮箱发送验证码
public function sendByEmail($email,$code){
    Mail::to($email)->send(new SendCode($code));
}


}