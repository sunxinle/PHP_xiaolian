<?php
/**
 * Created by PhpStorm.
 * User: 白照运
 * Date: 2016/11/28
 * Time: 15:23
 */

namespace Home\Controller;


use Think\Controller;

class MomentsController extends Controller
{
	public function index(){
		$xlart=M('xiaolianarticle');
		$data=$xlart->limit(10)->order('xlaaddtime desc')->select();
		$this->assign("data",$data);

		$this->display();
	}

	public function detail(){
		$id=I('get.id');
		if(!$id){
	 		$this->redirect('moments/detail', array('id' => "1"), 0.2, "<script>alert('没有了,返回第一篇文章')</script>");
	 	}

		$xlart=M('xiaolianarticle');
		$xlac=M('xiaolianarticlecomment');

		$art=$xlart->where("xlaid=%d",$id)->find();
		$artc=$xlac->where("xlaid=%d",$id)->select();
		$after=$xlart->where("xlaid>".$id)->order('xlaid asc')->limit('1')->find();
		$nextid=$after['xlaid'];

		$this->assign("art",$art);
		$this->assign("artc",$artc);
		$this->assign("nextid",$nextid);

        $this->display();
	}
	public function getart()
	{
		$upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath =     $_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/';
        $upload->savePath = 'sayimage/';// 设置附件上传目录
        //$upload->savePath  =      './Public/Uploads/';
        // 上传单个文件
        $info   =   $upload->upload();
		$art=I('post.');
		$data['xlacimage']=$info['img']['savepath'].$info['img']['savename'];
		$data['xlatitle']=$art['title'];
		$data['xlacontent']=$art['art'];
		$data['xlaaddtime']=date("Y-m-d H:i:s",time());
		//$data['xlaimage']=$session['img'];//从session中获取用户信息
		//$data['xlaauthor']=$session['author'];
		$yonghuart=M('xiaolianarticle');
		$result=$yonghuart->add($data);
		if($result){
			$this->redirect('moments/index', array('id' => $data['xlaid']),0.2, '评论成功');
		}
	}
	public function comment()
	{
		$id=I('get.id');
		$this->assign("id",$id);
		$this->display();
	}
	public function getcomment()
	{
		$Pdata=I('post.');
		$comment=M('xiaolianarticlecomment');

		$data['xlacaddtime']=date("Y-m-d H:i:s",time());
		$data['xlaccomment']=$Pdata['suggestion'];
		$data['xlaid']=$Pdata['hid'];
		//$data['xlacnickname']=$session['xlacnickname']//从session中获取评论人姓名
		//$data['xlacimage']=$session['xlacimage']//从session中获取评论人头像
		$result=$comment->add($data);
		if($result){
			$this->redirect('moments/detail', array('id' => $data['xlaid']), 1, '评论成功');
		}
	}
}