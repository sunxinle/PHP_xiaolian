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
        $this->assign('name',$name);
        $this->assign('result',$result);
        $this->display();
    }
    public function update(){
        if (I('submit')){
            $id = I('id');
            $data = array();
            $data['name']=I('name');
            $data['passwd']=I('passwd');
            $topline = M('think_user');
            $result = $topline->where("id=$id")->save($data);
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
        $id = I('id');
        $topline = M('think_user');
        $result = $topline->where("id=$id")->find();
        $this->assign('result',$result);
        $this->display();
    }
    public function add(){
        if(I("submit")){
            $data = array();
            $data['name']=I('post.name');
            $data['passwd']=md5(I('post.passwd'));
            $data['time']=date("Y-m-d H:i:s",time());
            $topline = M('think_user');
            //$result = $topline->add($data);
            $ro=D('think_role_user');
            $a=$ro->select();
            dump($a);
            //$ru=D('Root');
            //$result=$ru->select();
            //dump($result);
            // if ($result){
                
            //     $data = $topline->where($data)->find();
            //     $ru=D('root');
                
            //     $ru->query($sql);

            //     $this->assign('result',$data);
            //     $this->display('view');
            // }else{
            //     $this->error('数据没有更改或者更新失败',U('admin/root/view'));
            // }
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
            echo 1;
        }
        else{
            echo '数据删除失败，请联系开发者！';
            exit;
        }
    }
}