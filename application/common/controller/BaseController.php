<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 2019/10/29
 * Time: 11:32
 */
namespace app\common\controller;
use think\Config;
use think\Controller;
use think\Cookie;
use think\Hook;

/**
 * Class前台页面公共类
 * @package app\common\controller
 */
class BaseController extends Controller
{
    /**
     * 用户信息
     */
    protected $userinfo = '';

    /**
     * @DESC：初始化
     * @author: jason
     * @date: 2019-10-29 11:35:04
     */
    public function _initialize()
    {
        $mobile = Cookie('mobile');

        $token = Cookie('token');
        $userName = Cookie('userName');
        $userType = Cookie('userType');
        $mobile = isset($mobile) ? $mobile :'';
        $token = isset($token) ? $token : '';
        $userName = isset($userName) ? $userName : '';
        $userType = isset($userType) ? $userType : '';
        $userInfo = [];

        $userInfo['mobile'] = mb_substr($mobile,0,6,$charset="utf-8");
        $userInfo['token'] = $token;
        $userInfo['userName'] = $userName;
        $userInfo['userType'] = $userType;
        $this->userinfo = $userInfo;
        $SOFTWARE = $_SERVER['SERVER_SOFTWARE'];
        $is_nginx = stripos($SOFTWARE,'nginx');
        if($is_nginx !== false){
            $is_nginx = '';
        }else{
            $is_nginx = '/index.php';
        }
        $this->assign('is_nginx',$is_nginx);

        $this->assign('userinfo',$userInfo);
    }
}