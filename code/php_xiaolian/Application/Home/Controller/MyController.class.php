<?php
/**
 * Created by PhpStorm.
 * User: 白照�?
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
        //判断当前用户是否已经把id写入到session中，如果已经写入过，就不再执行写入id的步�?
        if (!session('?id')) {
            //session("openid", 'offLcwVctn21W0eX0pLTzI4mOKJw');
            //判断当前用户是否是从微信客户端登录的
            if (!session('?openid')) {
                $this->error('请在微信客户端登录此网页来使用本功能�?, U('home/news/index'));
            }
            $openid = session('openid');
            $user = M('user');
            //查询当前用户的id
            $conditon['openid'] = $openid;
            $userinfo = $user->where($conditon)->find();
            //检测当前用户是否登�?
            if (!$userinfo) {
                $this->redirect(U('home/index/notLoginTips'));
            }
            //把id写入到session�?
            session('id',$userinfo['id']);
            session('uniid',$userinfo['uniid']);
        }
    }
    //捞一�?
    public function getOneMessage(){
        /*  思路：为了保证不会两次取到同一个瓶子，会每次把取到的信息的id放入到session里面保存
         *  每次取数据之前，都会从session中判断这个瓶子是不是已经被取过，如果被取过，�?
         *  不会被取出，如果未取过，则取出，
         *  这里面设置了一个中间变�?oldmid,没有没有办法对session中的数组用array_push，所以进行了一次次的赋值运�?
         * */

        // 如果�?前没有session('oldmid'),证明当前没有里面还没有取过瓶�?
        session_start();
        if (!session('?oldmid')){
            $oldmid = array();
            session(array('name'=>'oldmid','expire'=>7200));
            session('oldmid',$oldmid);
        }
        //获取用户的大学的id
        $tuniid = session('uniid');   //此id从session中获取，判断当前用户所在的大学
        $oldmid=session('oldmid');
        $match = D('match');
        // 构造查询条�?
        $condition = array();
        $condition['tuniid'] = $tuniid;
        $condition['tag'] = 0;
        //此处的查询条件是因为查询条件中，not in的值不能为空，假设为空的话，证明当前没有进行过查询
        if ($oldmid){
            $condition['mid'] = array('not in',$oldmid);
        }
        //从数据库中随机取一条数�?
        $result = $match->where($condition)->order('rand()')->relation(true)->find();
        //借助中间变量$oldmid，将session的值每次都增加
        array_push($oldmid, $result['mid']);
        session('oldmid', $oldmid);
        $result = json_encode($result,JSON_UNESCAPED_UNICODE);
        echo($result);
        /*$this->assign('result',$result);
        $this->display('getinfo');*/
    }
    /*假如用户同意接受这条信息，就在这里做同意的函数处�?/
    public function receiveOneMessage(){
        //从过渡界面接受的到匹配请求的mid
        $mid = I('mid');
        //从session中获取当前登录用户的的id
        $id = session('id');
        $tempresult = M('tempresult');
        $data['mid'] = $mid;
        $data['id'] = $id;
        $result = $tempresult->add($data);
        if ($result) {
            $this->success('接受一条消息成功，请等到对方的回应�?,U('home/my/index'));
        }else {
            $this->error('发生了未知的错误，请联系管理�?,U('home/my/index'));
        }
    }
    /*
     * 如果当前用户已经捞过了所有的请求者，点击此按钮可以清空缓存，重新筛选人*/
    public function refreshGetOneMessage(){
        //清除session，用户重新捞
        session('oldmid',null);
        if(!session('?oldmid')){
            echo 1;
        }else{
            echo '未知的错误发生了，请联系开发�?;
        }
    }
    /*将接受者的信息插入到tempresult表中的操�?/
    public function acceptOneMessage(){
        $mid = I('id');
        $id = session('id');
        //dump(session());
        $tempresult = M('tempresult');
        $data = array();
        $data['mid'] = $mid;
        $data['id'] = $id;
        //防止重复同意
        if ($tempresult->where($data)->select()){
            echo '您已经接受过此人的请求了';
            exit;
        }
        if($tempresult->add($data)){
            echo 1;
        }else {
            echo '未知的错误发生了，请联系开发�?;
        }
    }
    /*my界面的内容显�?/
    public function index(){
        //从session中获取的的当前登录人的id
        $id = session('id');
        $match = D('Match');
        $tempresult = D('Tempresult');
        //构造myreuqest的查询条�?
        $condition = array();
        $condition['fid'] = $id;
        $condition['tag'] = 0;
        //采用关联查询，查询两个大学的名字
        $myRequrest = $match->where($condition)->relation(true)->select();
        //采用关联查询，查询我的id所接受的请�?
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
        //获取本条信息的详细信�?
        $match = D('match');
        $myRequrest = $match->where("mid=$id")->relation(true)->find();
        $userid = session('id');
        if ($myRequrest['fid'] !== $userid){
            $this->redirect(U('home/index/notYourPlace'));
        }
        $tempresult = D('tempresult');
        $myConfirm = $tempresult->where("mid=$id")->relation(true)->select();
        $this->assign('myrequest',$myRequrest);
        $this->assign('myConfirm',$myConfirm);
        $this->display();
    }
    public function deleteOneReply(){
        //从url中获取要删除的那一条数据的id
        $id = I('id');
        $university = M('tempresult');
        if($university->where("rrid=$id")->delete()){
            echo 1;
        }
        else{
            echo '数据删除失败，请联系开发者！';
            exit;
        }
    }
    /*假设用户点击的同意，此时将清空tempresult�?
    *内所有关于此条消息id的同意（因为只能有一对一的进行匹配）*/
    public function agreeReply(){
        //获取本条消息的id
        $rrid = I('id');
        $match = D('match');
        $tempresult = D('tempresult');
        $condition['rrid'] = $rrid;
        //获取接受的人的信�?
        $res = $tempresult->where($condition)->find();
        //删除tempresult表中所有关于关于这条请求的同意（因为只能最多同意一个人�?
        $condition1['mid'] = $res['mid'];
        $resultx = $tempresult->where($condition1)->delete();
        if (!$resultx) {
            //发生错误以后停止运行
            echo '发生了错�?;
            exit;
        }
        //以下是修改match表，讲状态改成匹配成�?
        $condition2['mid'] = $res['mid'];
        $condition3['tid'] = $res['id'];
        $condition3['tag'] = 1;
        $resulty = $match->where($condition2)->save($condition3);
        if (!$resulty) {
            //发生错误以后停止运行
            echo '发生了错�?;
            exit;
        }
        echo 1;
    }
    public function receive(){
        $mid = I('id');
        $match = D('match');
        $result = $match->where("mid=$mid")->relation(true)->find();
        $this->assign('result',$result);
        $this->display();
    }
}