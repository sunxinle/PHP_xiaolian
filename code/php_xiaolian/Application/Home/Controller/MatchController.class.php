<?php
/**
 * Created by PhpStorm.
 * User: sunxinle
 * Date: 2016/11/28
 * Time: 15:22
 */

namespace Home\Controller;
use Think\Controller;
class MatchController extends Controller
{
    //如果用户想要使用下面的高级功能，是需要注册的，可以先判断当前用户是否注册然后
    public function _initialize(){
        //判断当前用户是否已经把id写入到session中，如果已经写入过，就不再执行写入id的步骤
        if (!session('?id')) {
            //session("openid", 'offLcwdWSmYAcieoTwtw4A7kEDkU');
            //判断当前用户是否是从微信客户端登录的
            if (!session('?openid')) {
                $this->error('请在微信客户端登录此网页来使用本功能！', U('home/news/index'));
            }
            $openid = session('openid');
            $user = M('user');
            //查询当前用户的id
            $conditon['openid'] = $openid;
            $userinfo = $user->where($conditon)->find();
            //检测当前用户是否登录
            if (!$userinfo) {
                $this->redirect(U('home/index/notLoginTips'));
            }
            //把信息写入到session中
            session('id',$userinfo['id']);
            session('uniid',$userinfo['uniid']);
        }
    }
    //选择大学
    public function select(){
        $universitylist = M('university');
        $result = $universitylist->field('uniname')->select();
        //dump($result);
        //exit;
        //遍历二维数组，获取大学的名称成为一维数组
        $arr = array();
        foreach ($result as $key) {
            foreach ($key as $k){
                $arr[] = $k;
            }
        }
        $this->assign('result',$arr);
        $this->display();

    }

    public function _before_go(){
        $university=I('post.university');
        if (!$university){
            header("refresh:0;url=select");
        }
    }
    public function go(){
        $university=I('post.university');
        $this->assign('university',$university);
        $this->display();
    }
    /*作者：孙新乐
    时间：2016/12/07*/
    public function successTips(){
        $StudentMsg =I('post.');
        $stu['id']=session('id');//发送者id
        $school['uniname']=$StudentMsg['University'];
        //实例化一个user数据表
        $user=M('user');
        //实例化一个match数据表
        $match=M('match');
        $university=M('university');
        $date=array();
        $date['tuniid']= $university->where($school)->getField("uniid");
        $date['funiid']=$user->where($stu)->getField('uniid');
        $date['fid']=$stu['id'];//发送者id
        $date['tag']=0;
        $date['msendtime']=date("Y-m-d H:i:s",time());//发送请求时间
        $date['mgotime'] =$StudentMsg[ReachTime];//想要去的时间
        $date['mmessage'] =$StudentMsg[NoteMsg];//备注信息
        //dump($date['msendtime']);
        $match->add($date);
        $this->display();
    }
}

