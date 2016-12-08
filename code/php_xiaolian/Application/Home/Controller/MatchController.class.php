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
    public function select(){
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
        //dump($university);
        $this->assign('university',$university);
        $this->display();
    }
    /*作者：孙新乐
    时间：2016/12/07*/
    public function successTips(){
        $StudentMsg =I('post.');
        $stu['id']=1;//发送者id
        $school['uniname']=$StudentMsg[University];
        $user=M('user');
        $match=M('match');
        $university=M('university');
        $date=array();
        $date['tuniid']= $university->where($school)->getField("uniid");
        $date['funiid']=$user->where($stu)->getField('uniid');
        $date['fid']=$stu['id'];//发送者id
        $date['tagone']=0;
        $date['tagtwo']=0;
        $date['msendtime']=date("Y-m-d H:i:s",time());//发送请求时间
        $date['mgotime'] =$StudentMsg[ReachTime];//想要去的时间
        $date['mmessage'] =$StudentMsg[NoteMsg];//备注信息
      //dump($date['msendtime']);
        $match->add($date);
        $this->display();
    }
}

