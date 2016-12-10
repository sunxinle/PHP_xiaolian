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
	//显示数据的函数
	public function index(){
		//用thinkphp内置模型类M()函数
		$xlart=M('xiaolianarticle');
		//按添加时间倒序，且显示10条数据
		$data=$xlart->limit(10)->order('xlaaddtime desc')->select();
		//将$data数据赋值给自定义的data
		$this->assign("data",$data);
		//通过display()来找到view文件夹中Moments中index.html
        $this->display();
	}
    //显示用户所想看id对应的某条校脸圈动态详情
	public function detail(){
		/*id是通过前台页面view/moments/index中
		<a href="{:U('moments/detail',array('id'=>$vo['xlaid']))}">
		传递过来的参数*/
		$id=I('get.id');
		if(!$id){
			//调用redirect方法，重定向到moments/detail且id=1，跳转时间为0.2,提示信息为(没有了，返回第一篇文章)
	 		$this->redirect('moments/detail', array('id' => "1"), 0.2, "<script>alert('没有了,返回第一篇文章')</script>");
	 	}
        /*xiaolianarticle里有
        xlaid字段代表动态id，
        xlaaddtime字段代表动态发表时间
        xlaimage代表动态中的图片
        xlatitle代表动态的标题
        xlaauthor代表动态的作者
        xlacontent代表动态的内容
        xlaviews代表动态的浏览次数
        xlalikes代表动态的点赞次数*/
		$xlart=M('xiaolianarticle');
		/*xiaolianarticlecomment数据表中有
		xlacid字段代表动态评论id
		xlacaddtime字段代表动态评论时间
		xlacimage字段代表动态评论头像
		xlaccomment字段代表动态评论内容
		xlacnickname字段代表动态评论人昵称
		xlaid字段代表动态id*/
		$xlac=M('xiaolianarticlecomment');

		$art=$xlart->where("xlaid=%d",$id)->find();
		//dump($art);
		$artc=$xlac->where("xlaid=%d",$id)->select();
		//dump($artc);
		$after=$xlart->where("xlaid",$id)->order('xlaid asc')->limit('1')->find();
		$nextid=$after['xlaid'];
        
		$this->assign("art",$art);
		$this->assign("artc",$artc);
		$this->assign("nextid",$nextid);
        //通过display()来找到view文件夹中moments中的detail.html
        $this->display();
	}
	public function getart()
	{
		// 实例化上传类
		$upload = new \Think\Upload();
		// 设置附件上传大小
        $upload->maxSize = 3145728 ;
        // 设置附件上传类型
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath = $_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/';
        // 设置附件上传目录
        $upload->savePath = 'sayimage/';
        //$upload->savePath  = './Public/Uploads/';
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