<?php
/**
 * Created by PhpStorm.
 * User: 白照运
 * Date: 2016/11/28
 * Time: 15:24
 * Description: 实现捞一捞（随机从数据库中获取一条数据），我的请求（将我的请求表中的内容，显示出来）
 */

namespace Home\Controller;


use Think\Controller;

class MyController extends Controller
{
    //如果用户想要使用下面的高级功能，是需要注册的，可以先判断当前用户是否注册然后
    public function _initialize(){
        //判断当前用户是否已经把id写入到session中，如果已经写入过，就不再执行写入id的步骤
        if (!session('?id')) {
            session("openid", 'offLcwdWSmYAcieoTwtw4A7kEDkU');
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
            //把id写入到session中
            session('id',$userinfo['id']);
            session('uniid',$userinfo['uniid']);
        }
    }
    //捞一捞
    public function getOneMessage(){
        /*  思路：为了保证不会两次取到同一个瓶子，会每次把取到的信息的id放入到session里面保存
         *  每次取数据之前，都会从session中判断这个瓶子是不是已经被取过，如果被取过，就
         *  不会被取出，如果未取过，则取出，
         * 这里面设置了一个中间变量$oldmid,没有没有办法对session中的数组用array_push，所以进行了一次次的赋值运算
         * */

        // 如果当前没有session('oldmid'),证明当前没有里面还没有取过瓶子
        session_start();
        if (!session('?oldmid')){
            $oldmid = array();
            session(array('name'=>'oldmid','expire'=>7200));
            session('oldmid',$oldmid);
        }
        //获取用户的大学的id
        $tuniid = session('uniid');   //此id从session中获取，判断当前用户所在的大学
        $oldmid=session('oldmid');
        $match = M('match');
        // 构造查询条件
        $condition = array();
        $condition['tuniid'] = $tuniid;
        $condition['tag'] = 0;
        //此处的查询条件是因为查询条件中，not in的值不能为空，假设为空的话，证明当前没有进行过查询
        if ($oldmid){
            $condition['mid'] = array('not in',$oldmid);
        }
        //从数据库中随机取一条数据
        $result = $match->where($condition)->order('rand()')->find();
        //借助中间变量$oldmid，将session的值每次都增加
        array_push($oldmid, $result['mid']);
        session('oldmid', $oldmid);
        dump(session('oldmid'));
        dump($result);
    }
    /*
     * 如果当前用户已经捞过了所有的请求者，点击此按钮可以清空缓存，重新筛选人*/
    public function refreshGetOneMessage(){
        //清除session，用户重新捞
        session('oldmid',null);
        if(!session('?oldmid')){
            $this->success('操作成功',U('home/news/index'));
        }else{
            $this->error('操作失败，请两个小时之后重试',U('home/news/index'));
        }
    }
    public function index(){
        //从session中获取的的当前登录人的id
        $id = session('id');
        $match = D('Match');
        $tempresult = D('Tempresult');
        //构造myreuqest的查询条件
        $condition = array();
        $condition['fid'] = $id;
        $condition['tag'] = 0;
        //采用关联查询，查询两个大学的名字
        $myRequrest = $match->where($condition)->relation(true)->select();
        //采用关联查询，查询我的id所接受的请求
        $myReceive = $tempresult->where("id=$id")->relation(true)->select();
        //dump($myReceive->getLastSql());
        //dump($myReceive);
        //dump($myRequrest);
        //exit();
        //$result = $receiveRequest->where("id=$id")->select();
        //$result['id']
        //$user->where("id=")->select();
        $this->assign('myrequest',$myRequrest);
        $this->assign('myreceive',$myReceive);
        $this->display();
    }
    public function request(){
        $id = I('id');
        //获取本条信息的详细信息
        $match = D('match');
        $myRequrest = $match->where("mid=$id")->relation(true)->find();
        $tempresult = D('tempresult');
        $myConfirm = $tempresult->where("mid=$id")->relation(true)->select();
        //dump($myRequrest);
        //dump($myConfirm);
        $this->assign('myrequest',$myRequrest);
        $this->assign('myConfirm',$myConfirm);
        $this->display();

    }
}