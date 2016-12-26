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
        if (!session('?openid')) {
            $this->writesession();
        }
        //判断当前用户是否已经把id写入到session中，如果已经写入过，就不再执行写入id的步骤
        if (!session('?id')) {
            //session("openid", 'offLcwVctn21W0eX0pLTzI4mOKJw');
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
         *  这里面设置了一个中间变量$oldmid,没有没有办法对session中的数组用array_push，所以进行了一次次的赋值运算
         * */

        // 如果当前没有session('oldmid'),证明当前没有里面还没有取过瓶子
        session_start();
        if (!session('?oldmid')){
            $oldmid = array();
            session(array('name'=>'oldmid','expire'=>7200));
            session('oldmid',$oldmid);
        }
        if (!session('?search_times')){
            $search_times = 0;
            session(array('name'=>'search_times','expire'=>3600*12));
            session('search_times',$search_times);
        }
        $search_times = session('search_times');
        //获取用户的大学的id
        $tuniid = session('uniid');   //此id从session中获取，判断当前用户所在的大学
        $oldmid=session('oldmid');
        $match = D('match');
        // 构造查询条件
        $condition = array();
        $condition['tuniid'] = $tuniid;
        $condition['tag'] = 0;
        //此处的查询条件是因为查询条件中，not in的值不能为空，假设为空的话，证明当前没有进行过查询
        if ($oldmid){
            $condition['mid'] = array('not in',$oldmid);
        }
        //从数据库中随机取一条数据
        $result = $match->where($condition)->order('rand()')->relation(true)->find();
        //只有正确的捞到一条信息之后才算是一次，才能开始计算捞的次数
        if ($result){
            $search_times++;
            session('search_times',$search_times);
        }
        if ($search_times > 10){
            echo 'toomuch';
            exit;
        }
        //借助中间变量$oldmid，将session的值每次都增加
        array_push($oldmid, $result['mid']);
        session('oldmid', $oldmid);
        $result = json_encode($result,JSON_UNESCAPED_UNICODE);
        if ($result === 'null'){
            echo 'nothing';
        }else{
            echo $result;
        }
        /*$this->assign('result',$result);
        $this->display('getinfo');*/
    }


    /*
     * 如果当前用户已经捞过了所有的请求者，点击此按钮可以清空缓存，重新筛选人*/
    public function refreshGetOneMessage(){
        //清除session，用户重新捞
        session('oldmid',null);
        if(!session('?oldmid')){
            echo 1;
        }else{
            echo '未知的错误发生了，请联系开发者';
        }
    }

    /*将接受者的信息插入到tempresult表中的操作*/
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
            $match = M('match');
            $user = M('user');
            $university = M('university');
            $uniid = session('uniid');
            $fid = $match->where("mid=$mid")->getField('fid');

            $touser = $user->where("id=$fid")->getField('openid');
            $fnickname = session('tlcnickname');
            $funiname = $university->where("uniid=$uniid")->getField('uniname');
            $jumpurl = "http://www.mengguoxiaolian/home/my/request/id/$mid";

            self::sendToAsker($touser,$funiname,$fnickname,$mid);

            echo 1;
        }else {
            echo '未知的错误发生了，请联系开发者';
        }
    }
    /*接受了此人的请求以后，会给此人发送一个提示，表明有人接受了他的请求*/
    /* $touser      发起请求者的openid
     * $fnickname   接收者（当前用户）的微信名称
     * $funiame     接收者的大学（当前用户）的名称
     * $url         要跳转的网页
     * */
    public function sendToAsker($touser,$funiname,$fnickname,$mid){
        $accessToken = \Common\Library\WeChat::getAccessToken();
        $wechatObj = new \Common\Library\WeChat();
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$accessToken";
        $data = '{
           "touser":"'.$touser.'",
           "template_id":"J7eICRATiIDFJFV_j9XGAuzjNhTTnIuc9raLvYFWLHo",       
           "data":{
                   "uniname": {
                       "value":"'.$funiname.'",
                       "color":"#173177"
                   },
                   "mid":{
                       "value":"'.$mid.'",
                       "color":"#173177"
                   },
                   "nickname":{
                       "value":"'.$fnickname.'",
                       "color":"#173177"
                   }
           }
       }';
        $news = $wechatObj->sendNews($url,$data);

        return $news;
    }

    /*my界面的内容显示*/
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
        $myRequrest = $match->where($condition)->order('mid desc')->relation(true)->select();
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
    /*假设用户点击的同意，此时将清空tempresult表
    *内所有关于此条消息id的同意（因为只能有一对一的进行匹配）*/
    public function agreeReply(){
        //获取本条消息的id
        $rrid = I('id');
        $match = D('match');
        $tempresult = D('tempresult');
        $condition['rrid'] = $rrid;
        //获取接受的人的信息
        $res = $tempresult->where($condition)->find();
        //删除tempresult表中所有关于关于这条请求的同意（因为只能最多同意一个人）
        $condition1['mid'] = $res['mid'];
        $resultx = $tempresult->where($condition1)->delete();
        if (!$resultx) {
            //发生错误以后停止运行
            echo '发生了错误';
            exit;
        }
        //以下是修改match表，将状态改成匹配成功
        $condition2['mid'] = $res['mid'];

        $condition3['tid'] = $res['id'];
        $condition3['tag'] = 1;
        $resulty = $match->where($condition2)->save($condition3);
        if (!$resulty) {
            //发生错误以后停止运行
            echo '发生了错误';
            exit;
        }
        //组织数据，向微信客户端发送消息
        $mid = $res['mid'];
        $tid = $res['id'];
        //$resultz中存储的信息都是发送请求者的信息，也就是当前登录的用户的信息
        $resultz = $match->where("mid=$mid")->relation(true)->find();
        //找到接受请求者的微信号
        $user = M('user');
        //赋值
        $touser = $user->where("id=$tid")->getField('openid');
        $funiname = $resultz['from_uni']['uniname'];
        $fnickname = $resultz['nickname'];
        $wechatid = $resultz['wechatid'];
        $xlqid = $resultz['account'];
        self::sendToAccepter($touser,$funiname,$fnickname,$wechatid,$xlqid);

        //同样给请求发起者自己一个提示信息,提供给发起者接受请求者的账户信息
        $touser = session('openid');
        $resultm = $user->where("id=$tid")->find();
        $university = M('university');
        $uniid = $resultm['uniid'];

        $fnickname = $resultm['nickname'];
        $funiname = $university->where("uniid=$uniid")->getField('uniname');
        $wechatid = $resultm['wechatid'];
        $xlqid = $resultm['account'];
        self::resendToAsker($touser,$funiname,$fnickname,$wechatid,$xlqid);
        //结束
        echo 1;
    }

    /*接受了此人的请求以后，会给此人发送一个提示，表明有人接受了他的请求*/
    /*此函数是写发送给通过双方达成共识的被动接受消息的一方的一条信息*/
    /* $touser      确认消息者的openid
     * $fnickname   请求发起者的微信名称
     * $funiame     请求发起者的大学的名称
     * $wechatid    请求发起者的微信号
     * $xlqid       请求发起者的校脸圈账号
     * */
    public function sendToAccepter($touser,$funiname,$fnickname,$wechatid,$xlqid){
        $accessToken = \Common\Library\WeChat::getAccessToken();
        $wechatObj = new \Common\Library\WeChat();
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$accessToken";
        $data = '{
           "touser":"'.$touser.'",
           "template_id":"CrdaTSdX76YjSbq5pjgF2KTkaQR7nC8LNWHHGAVhhXM",       
           "data":{
                   "uniname": {
                       "value":"'.$funiname.'",
                       "color":"#173177"
                   },
                   "nickname":{
                       "value":"'.$fnickname.'",
                       "color":"#173177"
                   },
                   "xlqid":{
                       "value":"'.$xlqid.'",
                       "color":"#173177"
                   },
                   "wechatid":{
                       "value":"'.$wechatid.'",
                       "color":"#173177"
                   }
           }
       }';
        $news = $wechatObj->sendNews($url,$data);

        return $news;
    }
    /*接受了某人的请求以后，会给本人发送一个提示，表明我同意了他的请求*/
    /*此函数是写发送给通过双方达成共识的主动接受消息的一方的一条信息*/
    /* $touser      请求发起者的openid
     * $fnickname   请求接受者的微信名称
     * $funiame     请求接受者的大学的名称
     * $wechatid    请求接受者的微信号
     * $xlqid       请求接受者的校脸圈账号
     * */
    public function resendToAsker($touser,$funiname,$fnickname,$wechatid,$xlqid){
        $accessToken = \Common\Library\WeChat::getAccessToken();
        $wechatObj = new \Common\Library\WeChat();
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$accessToken";
        $data = '{
           "touser":"'.$touser.'",
           "template_id":"ygyaDHg1IlY22bwhpNoiXiXQOn_zqhA3bkAhixdSJfA",       
           "data":{
                   "uniname": {
                       "value":"'.$funiname.'",
                       "color":"#173177"
                   },
                   "nickname":{
                       "value":"'.$fnickname.'",
                       "color":"#173177"
                   },
                   "xlqid":{
                       "value":"'.$xlqid.'",
                       "color":"#173177"
                   },
                   "wechatid":{
                       "value":"'.$wechatid.'",
                       "color":"#173177"
                   }
           }
       }';
        $news = $wechatObj->sendNews($url,$data);

        return $news;
    }
    //接受的信息的详情页面
    public function receive(){
        $mid = I('id');
        $match = D('match');
        $result = $match->where("mid=$mid")->relation(true)->find();
        $this->assign('result',$result);
        $this->display();
    }

    //微信授权使用
    private function writesession()
    {
        $code=I('code');
        //dump($code);
        /*2、通过code换取网页授权access_token,这里通过code换取的是一个特殊的网页授权
        access_token,与基础支持中的access_token(该access_token用于调用其他接口)
        不同。公众号可通过下述接口来获取网页授权access_token
        如果网页授权的作用域为snsapi_base，则本步骤中获取到网页
        授权access_token的同时，也获取到了openid，snsaqi_base式的网页授权流程即到此为止*/

        /*以下的调用接口正确返回时的jsno数据包里有
        access_token,expires_in,refresh_token,openid,scope*/
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxbc8229b317266198&secret=87ec313ac0a551cc2a1c4f5ab8008b28&code=$code&grant_type=authorization_code";
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            $result = json_decode($result);
            // dump($result);
            //3、拉取用户信息(需scope为snsapi_userinfo)
            $access_token=$result->access_token;
            $openid=$result->openid;
            /*开发者通过获取到access_token和openid值作为以下接口的参数来拉取用户信息
            正确返回的json数据包里的参数有openid(用户唯一标识)，nickname(用户昵称),
            sex(用户性别，值为1是男生，值为2是女生),province（个人资料填写的省份）,
            city（普通用户个人资料填写的城市）,country（国家）
            headimgurl（用户头像）,privilege（用户特权）,
            unionid（只有在用户将公众号绑定到微信开放平台账号后
            才会出现该字段）*/
            $url2="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
            $curl = curl_init ($url2);
            curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
            curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
            $result2 = curl_exec ($curl);
            if(curl_errno()==0){
                $data=json_decode($result2);

                //dump(json_decode($result2));
                //把用户信息分配到视图文件中

                $openid=$data->openid;
                $nickname=$data->nickname;
                $headimgurl=$data->headimgurl;
                $sex=$data->sex;

                session("tlcnickname",$nickname);
                session("openid",$openid);
                session("headimgurl",$headimgurl);
                session("sex",$sex);

                return 1;
            }else{
                dump(curl_errno($curl));
            }
        }else {
            dump(curl_errno($curl));
        }
    }


    public function chat(){
        $user=M(user);
        $map['openid']=session('openid');
        $data=$user->where($map)->find();
        $account=$data['account'];
        $password=$data['password'];
        $img=$data['headimgurl'];
          $this->assign('user',$user);
        $this->assign('account',$account);
        $this->assign('password',$password);
        $this->assign('img',$img);

        $this->display();
    }

}