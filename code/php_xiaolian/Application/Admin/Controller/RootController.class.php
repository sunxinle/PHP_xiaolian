<?php
/**
 * Created by PhpStorm.
 * User: 家牧
 * Date: 2016/11/30
 * Time: 19:21
 */

namespace Admin\Controller;
use Common\Controller\BaseController;
class RootController extends BaseController
{
    public function view(){
       
        
        $topline = M('think_user');
        $result = $topline->select();
        //输出当前登录的用户的名字
        $name = $_SESSION['loginedUserName'];
        if($name=='admin'){
            $this->assign('tag','block');
        }
        else{
             $this->assign('tag','none');
        }

        $this->assign('name',$name);
        $this->assign('result',$result);
        $this->display();
    }
    public function update(){
         $name = $_SESSION['loginedUserName'];
        if($name=='admin'){
            $this->assign('tag','block');
        }
        else{
             $this->assign('tag','none');
        }
        if(I('submit')){
            $map['id'] = I('id');
            $data = array();
            $data['name']=I('name');
            $data['passwd']=I('passwd');
            $topline = M('think_user');
            $result = $topline->where($map)->save($data);
            if ($result){
                $this->success('数据更新成功',U('admin/root/view'));
            }else{
                $this->error('数据没有更改或者更新失败',U('admin/root/view'));
            }
        }else {
            $id = I('id');
            $topline = M('think_user');
            $result = $topline->where("id=$id")->find();
            $this->assign('result',$result);
            $this->display();
        }

    }
    public function show(){
         $name = $_SESSION['loginedUserName'];
        if($name=='admin'){
            $this->assign('tag','block');
        }
        else{
             $this->assign('tag','none');
        }
        $id = I('id');
        $topline = M('think_user');
        $result = $topline->where("id=$id")->find();
        $this->assign('result',$result);
        $this->display();
    }
    public function add(){
         $name = $_SESSION['loginedUserName'];
        if($name=='admin'){
            $this->assign('tag','block');
        }
        else{
             $this->assign('tag','none');
        }
        if(I("submit")){
            $data = array();
            $data['name']=I('post.name');
            $data['passwd']=md5(I('post.passwd'));
            $data['time']=date("Y-m-d H:i:s",time());
            $topline = M('think_user');
            $result = $topline->add($data);

            //$ru=D('Root');
            //$result=$ru->select();
            //dump($result);
            if ($result){
               $this->success('增加成功',U('admin/root/view'));
            }else{
                $this->error('更新失败',U('admin/root/view'));
            }
        }else{
            $this->display();
        }
    }
    /*s删除操作*/
    public function delete(){
        //从url中获取要删除的那一条数据的id
        $id = I('id');
        $university = M('think_user');
        if($university->where("id=$id")->delete()){
            $this->success('删除成功',U('admin/root/view'));
        }
        else{
            echo '数据删除失败，请联系开发者！';
            exit;
        }
    }
}