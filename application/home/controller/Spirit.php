<?php
namespace app\home\controller;

use app\common\controller\BaseController;
use app\common\model\Work;
use think\Controller;
use app\v1\service\Workservice;

class Spirit extends BaseController
{
    /**
     * @DESC：初始化
     * @author: jason
     * @date: 2019-10-28 04:24:30
     */
    public function _initialize(){
        $SOFTWARE = $_SERVER['SERVER_SOFTWARE'];
        $is_nginx = stripos($SOFTWARE,'nginx');
        if($is_nginx !== false){
            $is_nginx = '';
        }else{
            $is_nginx = '/index.php';
        }
        $this->assign('is_nginx',$is_nginx);
    }



    /**
     * @return bool|mixed
     * 慧灵工 首页
     */
    public function  index()
    {
        if($this->request->isGet()){
            //行业资讯
            $data = Workservice::instance()->three();
            $this->assign('data',$data);
            $this->assign('title','惠灵工');
            return $this->fetch();
        }
        return false;
    }


    /**
     * 慧灵工 列表页
     */
     public function informationList(){

         if($this->request->isGet()){
           $keyword = input('get.keyword','','trim');
           $list  = Workservice::instance()->Getinfolist($keyword,'');
           //总数
           $total = Workservice::instance()->getCount($keyword);

           $this->assign('list',$list);
           $this->assign('title','惠灵工行业资讯');
           $this->assign('total',$total);
           return $this->fetch();
         }
         return false;
     }

     /**
      * 惠灵工详情页
      */
     public function detail(){

         if($this->request->isGet()){
           $id = input('get.mid','','int');
           if(empty($id) || !isset($id)){
               return false;
           }

           $info = Workservice::instance()->getIdInfo($id);
           $top  = Workservice::instance()->getTop($id);
           $next = Workservice::instance()->getNext($id);

           $this->assign('top',$top);
           $this->assign('next',$next);

           $this->assign('info',$info);
           $this->assign('title','资讯详情');
           return $this->fetch();
         }
         return false;
     }


     /*
      * 分页接口
      */
     public function getpageInfo(){
        $keyword = input('get.keyword','','trim');
        $page    = input('get.page','','int');

        $list  = Workservice::instance()->Getinfolist($keyword,$page);

        if(empty($list)){
            return json(['code'=>404,'msg'=>'没有更多了']);
        }

        if($list){
            return json(['code'=>200,'data'=>$list,'msg'=>'请求成功']);
        }

     }

}