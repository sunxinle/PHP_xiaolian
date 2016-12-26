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
        if (!session('?openid')) {
            $this->writesession();
        }
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
        //dump($arr);
        $result = json_encode($arr,JSON_UNESCAPED_UNICODE);
        $this->assign('result',$result);
        $this->display();

    }
    // 用于是否填写大学的纠正
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
        //dump($date);
        //exit;
        $match->add($date);
        $this->display();
    }

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
}

