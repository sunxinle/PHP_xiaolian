<?php
namespace Home\Controller;

use Org\Util\Rbac;
use Think\Controller;
define('APPID', "wxbc8229b317266198");
define('SECRET',"87ec313ac0a551cc2a1c4f5ab8008b28");

class UserController extends Controller {
    public function index(){
        /*接收code的值*/
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
            $user = M('user');
            if(curl_errno()==0){
                $data=json_decode($result2);
                $condition['openid']=$data->openid;      //openid数据
                $condition['nickname']=$data->nickname;  //名字
                $condition['sex']=$data->sex;            //性别
                $condition['headimgurl']=$data->headimgurl;//头像
                $ro['openid']=$condition['openid'];
                if (!$user->where($ro)->find()){
                    //dump(json_decode($result2));
                    //把用户信息分配到视图文件中

                    //注册huanxin账号和密码
                    $condition['account']=$this->account();
                    $condition['password']=$this->password();
                    
                    $this->assign('user',$condition);
                    $this->display();
                }else{
                    $count = $user->where($ro)->find();
                    $this->assign('user',$count);
                    $this->display();
                }
            }else {
                dump(curl_errno($curl));
            }
        }
    }
   
    public function login(){
        //1、数据表xl_user的增
        //I方法其命名来自input，用于任何地方，更加方便和安全的获取系统输入变量

        $user = M('user');
        $col=M('university');

        $da['uniname']=I('post.college');
        $re=$col->where($da)->getField('uniid');
        
        $data = array();

        $data['uniid']=$re;

        $data['college'] = I('post.college');
        $data['name'] = I('post.name');
        $data['phonenumber'] =I('post.phonenumber');
        $data['sno'] =  I('post.sno');
        $data['enrollmentDate'] = I('post.enrollmentDate');

        $data['openid']=I('post.openid');
        $data['sex']=I('post.sex');
        $data['headimgurl']=I('post.headimgurl');
        $data['nickname']=I('post.nickname');

        $data['account']=I('post.account');  //获取huanxin账号
        $data['password']=I('post.password');//获取huanxin密码
        //thinkphp的数据写入操作使用add方法
        $ro['openid']=$data['openid'];
        if (!$user->where($ro)->find()){
            $result = $user->add($data);
            if ($result){
                $data['prompt'] = '注册成功';
                $this->assign('user',$data);
                $this->display('index');
            } else {
                //错误页面的默认跳转页面是返回前一页javascript:history.back(-1)，通常不需要设置
                $this->error('提交失败');
            }
        } else {
            /*根据条件更新数据，如果没写条件，系统自动
            会把主键的值作为更新条件来更新其他字段的值*/
            $condition['college'] = I('post.college');
            $condition['name'] = I('post.name');
            $condition['phonenumber'] =I('post.phonenumber');
            $condition['sno'] =  I('post.sno');
            $condition['enrollmentDate'] = I('post.enrollmentDate');
            $result = $user->where($ro)->save($condition);
            if ($result){
                $count = $user->where($ro)->find();
                $count['prompt'] = '信息修改成功了哦^_^';
                $this->assign('user',$count);
                $this->display('index');
            }else{
                $count = $user->where($ro)->find();
                $count['prompt'] = '信息没有修改哦^_^'; 
                $this->assign('user',$count);
                $this->display('index');
            }
        }
    }


     private function account($length = 10 ) {
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $password ='';
        for ( $i = 0; $i < $length; $i++ )
        {
            $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $password;
    }
    private function password($length = 8 ) {
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $password ='';
        for ( $i = 0; $i < $length; $i++ )
        {
            $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $password;
    }

}
