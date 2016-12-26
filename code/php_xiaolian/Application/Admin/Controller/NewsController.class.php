<?php
/**
 * Created by PhpStorm.
 * User: 家牧
 * Date: 2016/11/30
 * Time: 19:21
 */

namespace Admin\Controller;
use Common\Controller\BaseController;
class NewsController extends BaseController
{
    public function view(){
        $topline = M('topline');
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
            $data['tltitle']=I('title');
            $data['tlcontent']=I('content');
            $topline = M('topline');
            $result = $topline->where("tlid=$id")->save($data);
            if ($result){
                $this->success('数据更新成功',U('admin/news/view'));
            }else{
                $this->error('数据没有更改或者更新失败',U('admin/news/view'));
            }
        }else {
            $id = I('id');
            $topline = M('topline');
            $result = $topline->where("tlid=$id")->find();
            $this->assign('result',$result);
            $this->display();
        }

    }
    public function show(){
        $id = I('id');
        $topline = M('topline');
        $result = $topline->where("tlid=$id")->find();
        $this->assign('result',$result);
        $this->display();
    }
    public function add(){
        if(I('submit')){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath =     $_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/';
            $upload->savePath = 'newsimage/';// 设置附件上传目录
            //$upload->savePath  =      './Public/Uploads/';
            // 上传单个文件
            $info   =   $upload->upload();
            //exit();
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
            $data['tltitle']=I('title');
            $data['tlimage']=$file['savepath'].$file['savename'];
            $data['tlcontent']=I('content');
            $topline = M('topline');
            $result = $topline->add($data);
            if ($result){
                $this->success('数据更新成功',U('admin/news/view'));
            }else{
                $this->error('数据没有更改或者更新失败',U('admin/news/view'));
            }
        }else{
            $this->display();
        }
    }
    /*s删除操作*/
    public function delete(){
        //从url中获取要删除的那一条数据的id
        $id = I('id');
        $university = M('topline');
        $tpc=M('toplinecomment');
        $map['tlid']=$id;
        $tpc->where($map)->delete();
        if($university->where("tlid=$id")->delete()){
            echo 1;
        }
        else{
            echo '数据删除失败，请联系开发者！';
            exit;
        }
    }
}