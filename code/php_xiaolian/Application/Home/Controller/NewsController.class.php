<?php
/**
 * Created by PhpStorm.
 * User: 白照运
 * Date: 2016/11/28
 * Time: 15:20
 */

namespace Home\Controller;
use Think\Controller;

class NewsController extends Controller
{
	 public function index()
	 {
	 	$model=M('topline');
	 	$data=$model->select();
	 	$this->assign("topline",$data);
	 	$this->display();
	 }

	 public function detail()
	 {
	 	$id=I('get.id');
	 	$model=M('topline');              //链接头条数据表
	 	$model2=M('toplinecomment');      //链接评论数据表

	 	$data2=$model2->where("tlid=%d",$id)->select();
	 	$data=$model->where("tlid=%d",$id)->find();
	 	
	 	$this->assign("topcontent",$data);
	 	$this->assign("topcomment",$data2);
	 	$this->display();
	 }
	 public function comment()
	 {
	 	$id=I('get.id');
	 	$this->assign("id",$id);
	 	$this->display();
	 }

	 public function getcomment()
	 {
	 	$comment=I('post.');
	 	$model=M('toplinecomment');

	 	$data['tlccontent']=$comment['suggestion'];
	 	$data['tlid']=$comment['hid'];
	 	//$data['tlcnickname']=$session['name']; //提取保存在session的用户信息
	 	//$data['tlcimage']=$sessiom['img'];      //提取保存在session中的用户图片
	 	$result=$model->add($data);
	 	if($result){
	 		 $this->redirect('news/detail', array('id' => $data['tlid']), 1, '评论成功');
	 	}
	 	else $this->error('新增失败');
	 }

}