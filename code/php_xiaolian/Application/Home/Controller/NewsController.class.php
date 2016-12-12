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
	 	if(!session('?openid'))
	 	{
	 		$this->writesession();
	 		$model=M('topline');
	        // $data=$model->limit(10)->order('xlaaddtime desc')->select();
		 	$data=$model->select();
		 	$this->assign("topline",$data);
		 	$this->display();
	 	}
	 	else
	 	{
	 		//dump(session('headimgurl'));
		  	$model=M('topline');
	        //$data=$model->limit(10)->order('xlaaddtime desc')->select();
		  	$data=$model->select();
		  	$this->assign("topline",$data);
		  	$this->display();
		  }
	 }

	 public function detail()
	 {
	 	$id=I('get.id');
	 	if(!$id){
	 		$this->redirect('news/detail', array('id' => "1"), 0.2, "<script>alert('没有了')</script>");
	 	}

	 	$model=M('topline');              //链接头条数据表
	 	$comment=M('toplinecomment');      //链接评论数据表

	 	$data2=$comment->where("tlid=%d",$id)->order('tlcaddtime desc')->select();
	 	$data=$model->where("tlid=%d",$id)->find();
	 	$after=$model->where("tlid>".$id)->order('tlid asc')->limit('1')->find();
	 	//dump($data2);
	 	
	 	$nextid=$after['tlid'];

	 	$this->assign("topcontent",$data);
	 	$this->assign("topcomment",$data2);
	 	$this->assign("nextid",$nextid);

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
	 	$data['tlcaddtime']=date("Y-m-d H:i:s",time());
	 	$data['tlccontent']=$comment['suggestion'];
	 	$data['tlid']=$comment['hid'];

	 	$data['tlcnickname']=session('tlcnickname'); //提取保存在session的用户信息

	 	$data['tlcimage']=session('headimgurl');      //提取保存在session中的用户图片
	 	$result=$model->add($data);
	 	if($result){
	 		 $this->redirect('news/detail', array('id' => $data['tlid']),0);
	 	}
	 	else $this->error('新增失败');
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
            //dump($result2);
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