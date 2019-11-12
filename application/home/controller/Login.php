<?php

namespace app\home\controller;
use app\common\controller\BaseController;
use  think\Controller;
use think\Cookie;
use think\Cache;
class Login extends  BaseController{


    public function login(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = intval($_GET['id']);
        }else{
            $id = '0';
        }
        if(isset($_GET['type']) && !empty($_GET['type'])){
            $type = intval($_GET['type']);
        }else{
            $type = '0';
        }
        $this->assign('web_type',$type);
        $this->assign('data_id',$id);
        return $this->fetch();
    }

    public  function register(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = intval($_GET['id']);
        }else{
            $id = '';
        }
        $this->assign('data_id',$id);
        return $this->fetch();
    }


    /**
     * @DESC：保存token、用户、电话到cookie里面
     * @author: jason
     * @date: 2019-10-29 11:09:49
     */
    public function savetoken()
    {
        //允许跨域
        header("Access-Control-Allow-Origin:*");
        if($this->request->isPost() && $this->request->isAjax()){
            if(empty($_POST)){
                return json(['status' => false,'message' => '请确认用户或密码是否正确']);
            }
            $mobile = $_POST['mobile'];
            $token = $_POST['token'];
            $userName = $_POST['userName'];
            $userType = $_POST['userType'];
            Cookie::set('mobile',$mobile);
            Cookie::set('token',$token);
            Cookie::set('userName',$userName);
            Cookie::set('userType',$userType);
            Cache::set($mobile,$mobile);
            return json(['status' => true,'message' => '登录成功']);
        }else{
            return json(['status' => false,'message' => '请确认用户或密码是否正确']);
        }
    }

    /**
     * @DESC：保存token、用户、电话到缓存里面
     * @author: jason
     * @date: 2019-10-29 11:09:49
     */
    public function savetokens()
    {
        //允许跨域
        header("Access-Control-Allow-Origin:*");
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(empty($_POST)){
                return json(['status' => 400,'message' => '请确认用户或密码是否正确']);
            }
            $mobile = $_POST['mobile'];
            $token = $_POST['token'];
            $userName = $_POST['userName'];
            $userType = $_POST['userType'];
            Cookie::set('mobile',$mobile);
            Cookie::set('token',$token);
            Cookie::set('userName',$userName);
            Cookie::set('userType',$userType);
            return json(['status' => 200,'message' => '成功']);
        }else{
            return json(['status' => 400,'message' => '请确认用户或密码是否正确']);
        }
    }


    /**
     * @DESC：前台退出登录
     * @return \think\response\Json
     * @author: jason
     * @date: 2019-10-31 10:38:54
     */
    public function logout(){
        if($this->request->isAjax() && $this->request->isPost()){
            Cookie::clear('mobile');
            Cookie::clear('token');
            Cookie::clear('userName');
            Cookie::clear('userType');
            return json(['status' => true,'message' => '退出登录成功']);
        }else{
            return json(['status' => false,'message' => '退出登录失败']);
        }
    }


}