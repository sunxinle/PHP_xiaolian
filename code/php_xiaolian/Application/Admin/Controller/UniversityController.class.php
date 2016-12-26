<?php
/**
 * Created by PhpStorm.
 * User: 家牧
 * Date: 2016/11/30
 * Time: 19:23
 */

namespace Admin\Controller;

use Common\Controller\BaseController;

class UniversityController extends BaseController
{
    public function view(){
         $name = $_SESSION['loginedUserName'];
        if($name=='admin'){
            $this->assign('tag','block');
        }
        else{
             $this->assign('tag','none');
        }
        $university = M('university');
        $result = $university->select();
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
        if (I('submit')){
            $id = I('id');
            $data = array();
            $data['unidescription']=I('unidescription');
            $university = M('university');
            $result = $university->where("uniid=$id")->save($data);
            if ($result){
                $this->success('数据更新成功',U('admin/university/view'));
            }else{
                $this->error('数据没有更改或者更新失败',U('admin/university/view'));
            }
        }else {
            $id = I('id');
            $topline = M('university');
            $result = $topline->where("uniid=$id")->find();
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
        $university = M('university');
        $result = $university->where("uniid=$id")->find();
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
        if(I('submit')){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath =     $_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/';
            $upload->savePath = 'universityimage/';// 设置附件上传目录
            //$upload->savePath  =      './Public/Uploads/';
            // 上传单个文件
            $info   =   $upload->upload();
            if(!$info) {
                // 上传错误提示错误信息
                $this->error($upload->getError());
            }else{
                // 上传成功 获取上传文件信息
                foreach($info as $file) {
                    echo $file['savepath'].$file['savename'];
                }
            }
            $data = array();
            $data['uniname']=I('uniname');
            $data['uniimage']=$file['savepath'].$file['savename'];
            $data['uniaddress']=I('uniaddress');
            $data['unidescription']=I('unidescription');
            $university = M('university');
            $result = $university->add($data);
            if ($result){
                $this->success('数据更新成功',U('admin/university/view'));
            }else{
                $this->error('数据没有更改或者更新失败',U('admin/university/view'));
            }
        }else{
            $this->display();
        }
    }
    public function delete(){
        //从url中获取要删除的那一条数据的id
        $id = I('id');
        $university = M('university');
        if($university->where("uniid=$id")->delete()){
            echo 1;
        }
        else{
            echo '数据删除失败，请联系开发者！';
            exit;
        }
    }
}