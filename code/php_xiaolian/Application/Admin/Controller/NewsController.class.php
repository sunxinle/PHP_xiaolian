<?php
/**
 * Created by PhpStorm.
 * User: 白照运
 * Date: 2016/11/28
 * Time: 15:20
 */

namespace Admin\Controller;

use Think\Controller;

class NewsController extends Controller
{
    public function view(){
        $topline = M('topline');
        $result = $topline->select();
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
            $upload->rootPath =     $_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public';
            $upload->savePath = './Uploads/';// 设置附件上传目录
            //$upload->savePath  =      './Public/Uploads/';
            // 上传单个文件
            $info   =   $upload->upload();
            dump($upload->savePath);
            dump($upload);
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
            exit;
            $data = array();
            $data['tltitle']=I('title');
            $data['tlimage']=$file['name'];
            $data['tlcontent']=I('content');
            dump($data);

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
}