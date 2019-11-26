<?php

namespace app\v1\controller\info;
use app\common\controller\AuthController;
use think\Config;
use app\common\model\Info;
use app\v1\service\Infosservice;
class Infos extends  AuthController
{


  public function index(){
    if($this->request->isGet()){
        $title = input('get.title','','trim');
        $list = Infosservice::instance()->getList($title);
        $this->assign('list',$list);
        $this->assign('title','招标信息');
        return $this->fetch();
    }

    return false;
  }


  public function infosAdd(){
    if($this->request->isGet()){
        return $this->fetch();
    }

    if($this->request->isPost()){
        $array['pid'] = input('post.pid', '', 'int');
        $array['title'] = input('post.title', '', 'trim');
        $array['content'] = input('post.content', '');
        $array['describe'] = input('post.describe', '', 'trim');
        $array['keyword'] = input('post.keyword', '', 'trim');
        $array['release_time'] = date("Y-m-d");

       $ret = Infosservice::instance()->saves($array);
       if($ret){
           return json(['code'=>200,'msg'=>'操作成功']);
       }else {
           return json(['code'=>400,'msg'=>'操作失败']);
       }
    }

  }


  public function infosEdit(){

      if($this->request->isGet()){
          $id = input('get.id','','int');
          if(empty($id)){
              return false;
          }
          $info = Infosservice::instance()->getId($id);
          $this->assign('info',$info);
          return $this->fetch();
      }

      if($this->request->isPost()){
          $id = input('post.id','','int');
          $array = array(
              'pid'     =>input('post.pid','','int'),
              'title'   =>input('post.title','','trim'),
              'content' =>input('post.content'),
              'describe'    =>input('post.describe','','trim'),
              'keyword' =>input('post.keyword','','trim'),
          );

          $ret = Infosservice::instance()->updateId($array,$id);
          if($ret){
              return json(['code'=>200,'msg'=>'操作成功']);
          }else {
              return json(['code'=>400,'msg'=>'操作失败']);
          }
      }
  }


  //删除
  public function infoDels(){

     if($this->request->isGet()){
        $id = input('get.id','','int');

        if(empty($id)){
            return false;
        }

        $arr = ['status'=>0];
        $ret = Infosservice::instance()->dels($arr,$id);

        if($ret){
          return json(['code'=>200,'msg'=>'操作成功']);
        }else{
            return json(['code'=>400,'msg'=>'操作失败']);
        }
     }
     return false;
  }

}