<?php
/**
 * Created by PhpStorm.
 * User: 白照?
 * Date: 2016/11/28
 * Time: 15:23
 */

namespace Home\Controller;


use Think\Controller;

class MomentsController extends Controller
{
	public function index(){
		if(!session('?openid'))
	 	{

	 		$this->writesession();

	 		$click=M('click');
	 		$map['opeid']=session('openid');
	 		$cresult=$click->where($map)->select();


			$xlart=M('xiaolianarticle');
			$data=$xlart->limit(20)->order('xlaaddtime desc')->select();
			
			for($i=0;$i<20;$i++){
				for ($j=0; $j < count($cresult); $j++) { 
					if($data[$i]['xlaid']==$cresult[$j]['xlaid'])
					{
						$data[$i]['tag']=1;
						break;
					}
					else{
					
						$data[$i]['tag']=0;
					}
				}

			}
			$this->assign("data",$data);
			//dump($data);
			$this->assign('ope',session('openid'));
			$this->display();
		}
		else{
			$click=M('click');
	 		$map['opeid']=session('openid');
	 		$cresult=$click->where($map)->select();


			$xlart=M('xiaolianarticle');
			$data=$xlart->limit(20)->order('xlaaddtime desc')->select();
			
			for($i=0;$i<20;$i++){
				for ($j=0; $j < count($cresult); $j++) { 
					if($data[$i]['xlaid']==$cresult[$j]['xlaid'])
					{
						$data[$i]['tag']=1;
						break;
					}
					else{
					
						$data[$i]['tag']=0;
					}
				}

			}
			$this->assign("data",$data);
			//dump($data);
			$this->assign('ope',session('openid'));
			$this->display();
		}
	}

	public function detail(){
		$id=I('get.id');
		if(!$id){
	 		$this->redirect('moments/detail', array('id' => "1"), 0.2, "<script>alert('没有?返回第一篇文?)</script>");
	 	}



		$xlart=M('xiaolianarticle');
		$xlac=M('xiaolianarticlecomment');

		$art=$xlart->where("xlaid=%d",$id)->find();//笑脸说说
		$artc=$xlac->where("xlaid=%d",$id)->order('xlacaddtime asc')->select();//笑脸评论
	    

	    $views=$art['xlaviews'];       //浏览次数加一
	    $view=$views+1;
	    $xlart->xlaviews=$view;
	    $xlart->where("xlaid=$id")->save();


		$after=$xlart->where("xlaid<".$id)->order('xlaid desc')->limit('1')->find();//下一页
		$nextid=$after['xlaid'];

		if(session('tlcnickname')==$art['xlaauthor']){
			$this->assign('tag','block');
		}
		else{
			$this->assign('tag','none');
		}

		$this->assign("art",$art);
		$this->assign("artc",$artc);
		$this->assign("nextid",$nextid);

        $this->display();
	}
	class MomentsController extends Controller
{
	public function index(){
		if(!session('?openid'))
	 	{

	 		$this->writesession();

	 		$click=M('click');
	 		$map['opeid']=session('openid');
	 		$cresult=$click->where($map)->select();


			$xlart=M('xiaolianarticle');
			$data=$xlart->limit(20)->order('xlaaddtime desc')->select();
			
			for($i=0;$i<20;$i++){
				for ($j=0; $j < count($cresult); $j++) { 
					if($data[$i]['xlaid']==$cresult[$j]['xlaid'])
					{
						$data[$i]['tag']=1;
						break;
					}
					else{
					
						$data[$i]['tag']=0;
					}
				}

			}
			$this->assign("data",$data);
			//dump($data);
			$this->assign('ope',session('openid'));
			$this->display();
		}
		else{
			$click=M('click');
	 		$map['opeid']=session('openid');
	 		$cresult=$click->where($map)->select();


			$xlart=M('xiaolianarticle');
			$data=$xlart->limit(20)->order('xlaaddtime desc')->select();
			
			for($i=0;$i<20;$i++){
				for ($j=0; $j < count($cresult); $j++) { 
					if($data[$i]['xlaid']==$cresult[$j]['xlaid'])
					{
						$data[$i]['tag']=1;
						break;
					}
					else{
					
						$data[$i]['tag']=0;
					}
				}

			}
			$this->assign("data",$data);
			//dump($data);
			$this->assign('ope',session('openid'));
			$this->display();
		}
	}
	class MomentsController extends Controller
{
	public function index(){
		if(!session('?openid'))
	 	{

	 		$this->writesession();

	 		$click=M('click');
	 		$map['opeid']=session('openid');
	 		$cresult=$click->where($map)->select();


			$xlart=M('xiaolianarticle');
			$data=$xlart->limit(20)->order('xlaaddtime desc')->select();
			
			for($i=0;$i<20;$i++){
				for ($j=0; $j < count($cresult); $j++) { 
					if($data[$i]['xlaid']==$cresult[$j]['xlaid'])
					{
						$data[$i]['tag']=1;
						break;
					}
					else{
					
						$data[$i]['tag']=0;
					}
				}

			}
			$this->assign("data",$data);
			//dump($data);
			$this->assign('ope',session('openid'));
			$this->display();
		}
		else{
			$click=M('click');
	 		$map['opeid']=session('openid');
	 		$cresult=$click->where($map)->select();


			$xlart=M('xiaolianarticle');
			$data=$xlart->limit(20)->order('xlaaddtime desc')->select();
			
			for($i=0;$i<20;$i++){
				for ($j=0; $j < count($cresult); $j++) { 
					if($data[$i]['xlaid']==$cresult[$j]['xlaid'])
					{
						$data[$i]['tag']=1;
						break;
					}
					else{
					
						$data[$i]['tag']=0;
					}
				}

			}
			$this->assign("data",$data);
			//dump($data);
			$this->assign('ope',session('openid'));
			$this->display();
		}
	}
	public function getart()
	{
		$upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','JPG','PNG','PNEG','JPEG');// 设置附件上传类型
        $upload->rootPath =     $_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/';
        $upload->savePath = 'sayimage/';// 设置附件上传目录
        //$upload->savePath  =      './Public/Uploads/';
        // 上传单个文件
        $info   =   $upload->upload();
		$art=I('post.');
		if(!$info) {
        	//如果没有上传，则默认上传图片
        	if( 2 == session('sex')){//如果是女生
        	    $data['xlaimageurl']='sayimage/xiaoshuoshuo2.jpeg';
        	}else{//如果是男生
        		$data['xlaimageurl']='sayimage/xiaoshuoshuo.jpeg';
        	}
        } else {
        	$data['xlaimageurl']=$info['img']['savepath'].$info['img']['savename'];
        }
		
		$data['xlacontent']=$art['art'];
		$data['xlaaddtime']=date("Y-m-d H:i:s",time());
		$data['xlaimage']=session('headimgurl');//从session中获取用户信?
		$data['xlaauthor']=session('tlcnickname');
		$data['xlaviews']=0;
		$yonghuart=M('xiaolianarticle');
		$result=$yonghuart->add($data);
		if($result){
			$this->redirect('moments/index', array('id' => $data['xlaid']),0.02, "<script>alert('发动态成功')</script>");
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
		$data['xlacnickname']=session('tlcnickname');//从session中获取评论人姓名
		$data['xlacimage']=session('headimgurl');//从session中获取评论人头像
		$result=$comment->add($data);
		if($result){
			$this->redirect('moments/detail', array('id' => $data['xlaid']), 0.01, "<script>alert('评论成功')</script>");
		}
	}
	public function delete()
	{
		$id=I('get.id');
		$xlart=M('xiaolianarticle');
		$xlac=M('xiaolianarticlecomment');

		$map['xlaid']=$id;

		$result=$xlart->where($map)->delete();
		$xlac->where($map)->delete();

		if($result){
			$this->redirect('moments/index', array('id' => $data['xlaid']),0.01, "<script>alert('删除成功')</script>");
		}

	}

	public function getclick()
	{
		if(!IS_AJAX)
		{
			hale('页面不存在');
		}
		else{
			$author=I('author');
			$xlaid=I('xlaid');

			$map['xlaid']=$xlaid;
			$map['opeid']=session('openid');
			$click=M('click');
			if(!$click->where($map)->find())
			{
				$data['status']=1;//变成红色
				$cunshuju['xlaid']=$xlaid;
			    $cunshuju['opeid']=session('openid');
			     $click->add($cunshuju);
			}
			else{
				$data['status']=0;//变成白色

			    $click->where($map)->delete();
			}

			$data['author']=$author;
			$data['xlaid']=$xlaid;
			  
			$this->ajaxReturn($data,'json');
		}
	}



	 private function writesession()
	 {
		 $code=I('code');
        //dump($code);
        /*2、通过code换取网页授权access_token,这里通过code换取的是一个特殊的网页授权
        access_token,与基础支持中的access_token(该access_token用于调用其他接口)
        不同。公众号可通过下述接口来获取网页授权access_token
        如果网页授权的作用域为snsapi_base，则本步骤中获取到网?
        授权access_token的同时，也获取到了openid，snsaqi_base式的网页授权流程即到此为?/

        /*以下的调用接口正确返回时的jsno数据包里?
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
            //3、拉取用户信?需scope为snsapi_userinfo)
            $access_token=$result->access_token;
            $openid=$result->openid;
            /*开发者通过获取到access_token和openid值作为以下接口的参数来拉取用户信?
            正确返回的json数据包里的参数有openid(用户唯一标识)，nickname(用户昵称),
            sex(用户性别，值为1是男生，值为2是女?,province（个人资料填写的省份?
            city（普通用户个人资料填写的城市?country（国家）
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
                //把用户信息分配到视图文件?
			
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

	 public function deletecom()
	 {
	 	$id=I('get.id');
	 	$map['xlacid']=$id;

		$xlac=M('xiaolianarticlecomment');
		$result=$xlac->where($map)->find();
		$artid=$result['xlaid'];

		$xlac->where($map)->delete();

		if($result){
			$this->redirect('moments/detail', array('id' => $artid),0.01, "<script>alert('删除成功')</script>");
		}

	 }
}