<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

// 公共助手函数

if(!function_exists('mb_substr')){
        function mb_substr($str, $start=0, $length, $charset="utf-8", $suffix=true)
    {
        $re['utf-8']   = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef]
                  [x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
        $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
        $re['gbk']    = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
        $re['big5']   = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
        if($suffix) return $slice."…";
        return $slice;

    }
}



if (!function_exists('__')) {

    /**
     * 获取语言变量值
     * @param string $name 语言变量名
     * @param array $vars 动态变量值
     * @param string $lang 语言
     * @return mixed
     */
    function __($name, $vars = [], $lang = '')
    {
        if (is_numeric($name) || !$name)
            return $name;
        if (!is_array($vars)) {
            $vars = func_get_args();
            array_shift($vars);
            $lang = '';
        }
        return \think\Lang::get($name, $vars, $lang);
    }

}

function sortlist(){
    $d=array();
    $d[]="服务员";
    $d[]="餐饮工";
    $d[]="促销导购";
    $d[]="送餐员";
    $d[]="快递配送";
    $d[]="传单派发";
    $d[]="问卷调查";
    $d[]="话务服务";
    return $d;
}

//CONTROLLER 参数初始化
function initPost($field=""){
    if(empty($field)) return input("post.");
    $fields=explode(",",$field);
    $newd=array();
    foreach($fields as $v){
        $newd[$v]=input("post.{$v}");
        if(is_null($newd[$v])) $newd[$v]="";
    }
    return $newd;
}


//MODEL 强制初始化
function initData($field,$data){
    if($field===true) return $data;
    $exp=explode(",",$field);
    if($exp){
        foreach($exp as $ex){
            if(!isset($data[$ex])) $data[$ex]="";
        }
    }
    return $data;
}




#SendSms("15827100194","222")
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use AlibabaCloud\Dybaseapi\MNS\Requests\BatchReceiveMessage;
use AlibabaCloud\Dybaseapi\MNS\Requests\BatchDeleteMessage;
function SendSms($phone,$code){
    AlibabaCloud::accessKeyClient('LTAIxZeNzz50qyGg', 'dAgGCU1BeJvXtZ6Friok7tnzz5XW4b')
        ->regionId('cn-hangzhou')
        ->asGlobalClient();

    try {
        $result = AlibabaCloud::rpcRequest()
            ->product('Dysmsapi')
            // ->scheme('https') // https | http
            ->version('2017-05-25')
            ->action('SendSms')
            ->method('POST')
            ->options([
                'query' => [
                    'RegionId' => 'cn-hangzhou',
                    'PhoneNumbers' => $phone,
                    'SignName' => '惠创优',
                    'TemplateCode' => 'SMS_163600217',
                    'TemplateParam' => '{"code":"'.$code.'"}',
                ],
            ])
            ->request();
        $r=$result->toArray();
        #print_r($r);
        if($r["Message"]=="OK"){
            return true;
        }else{
            return false;
        }
    } catch (ClientException $e) {
        echo $e->getErrorMessage() . PHP_EOL;
    } catch (ServerException $e) {
        echo $e->getErrorMessage() . PHP_EOL;
    }
}