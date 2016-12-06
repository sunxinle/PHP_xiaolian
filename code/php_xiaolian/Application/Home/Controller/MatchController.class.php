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

    public function beforego(){
        $university=I('post.university');
        if (!$university){
            header("refresh:0;url=select");
        }
    }
    public function go(){
        $university=I('post.university');
        if (!$university){
            header("refresh:0;url=select");
        }
        dump($university);
        $this->assign('university',$university);
        $this->display();
    }
    public function successTips(){
        $StudentMsg =I('post.');
        dump($StudentMsg);
        $date=array();
        $date['university'] =$StudentMsg[University];
        $date[] =$StudentMsg[ReachTime];
        $date[] =$StudentMsg[NoteMsg];
        dump($date);
        $match=M('match');
        $university=M('university');
       // $date['funiid']=$university->where(uniname=$StudentMsg[university]);
    /*    dump($date['funiid']);
        $match->add($date);
        echo $match->getLastSql();*/
        $this->display();
    }
}

