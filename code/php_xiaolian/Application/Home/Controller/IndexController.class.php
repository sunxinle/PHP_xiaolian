<?php
namespace Home\Controller;

use Think\Controller;
use Common\Library\WeChat;

class IndexController extends Controller
{
    protected $_db;
    public function index()
    {
        //$this->display();
        //实例化一个对象
        $wechatObj = new WeChat();
        //进行用户发来的数据
        //$wechatObj->valid();
        //接收用户发送过来的数据
        $xmlObj = $wechatObj->receiveMsg();
        //获取用户发送的数据类型
        $type = $xmlObj->MsgType;
        $content = $xmlObj->Content;
        $toUsername = $xmlObj->FromUserName;
        $fromUsername = $xmlObj->ToUserName;
        switch ($type){
            case 'text':
                if ($content == '摄影'){
                    $content = '您可以直接向我们发送图片来参加本次比赛,图片的规格可以自定义';
                }elseif ($content == '图文'){
                    //从news表里获取数据
                    /*$sql = "select * from news";
                    $pdoStament = $pdo->query($sql);
                    $result = $pdoStament->fetchAll();//取多条数据
                    $wechatObj->responseImageTextMsg($toUsername,$fromUsername,$result,count($result));*/
                    $this->_db = M('news');
                    $result = $this->_db->where('id=1')->select();
                    /*$result = array();
                    $result['title'] = 'someone reponse you';
                    $result['description'] = 'it my time';
                    $result['url'] = 'www.baidu.com';*/
                    $wechatObj->responseImageTextMsg($toUsername,$fromUsername,$result,count($result));
                }elseif ($content=="奇闻趣事") {
                    $res = ApiController::news();
                    $result = $res['newslist'];
                    $wechatObj->responseImageTextMsg($toUsername,$fromUsername,$result,count($result));
                }
                $find = '天气';
                if(strpos($content,$find)!==false){
                    $city = str_replace('天气','',$content);
                    $content = ApiController::weather($city);
                }
                $wechatObj->responseTextMsg($toUsername,$fromUsername,$content);
                break;

            case 'image':
                //将图片的信息存储到数据库
               /* $sql = "INSERT INTO `images`(`mediaId`, `picUrl`, `fromUserName`) VALUES ('$mediaId','$picUrl','$toUsername')";
                $pdo->exec($sql);*/
                $images = M('images');
                $data = array();
                //重要！！为什么这里一定要加引号！！！
                $data['mediaId'] = "$xmlObj->MediaId";
                $data['picUrl'] = "$xmlObj->PicUrl";
                $data['fromUserName'] = "$fromUsername";
                $images->data($data)->add();
                $wechatObj->responseTextMsg($toUsername, $fromUsername, '恭喜您，参赛成功！');
                break;
            case 'event':
                $event = $xmlObj->Event;
                switch ($event){
                    case 'CLICK':
                        $key = $xmlObj->EventKey;
                        if ($key == 'V1001_ABSTRACT') {
                            $content = '这个公众号只是我自己开发的呀，里面不定时推送一些别人经验啊什么的，不管怎么，谢谢你的订阅！';
                            $wechatObj->responseTextMsg($toUsername,$fromUsername,$content);
                        } elseif ($key == 'V1001_PHOTO_RULES') {
                            $content = '您可以直接向我们发送图片来参加本次比赛,图片的规格可以自定义';
                            $wechatObj->responseTextMsg($toUsername,$fromUsername,$content);
                        } elseif ($key == 'V1001_WELCOME_WEI') {
                            $content = '欢迎来到微官网啊！';
                            $wechatObj->responseTextMsg($toUsername,$fromUsername,$content);
                        } elseif ($key == 'K1002') {
                            $content = '直接在聊天框输入“天气+城市”，例如“天气石家庄”';
                            $wechatObj->responseTextMsg($toUsername, $fromUsername, $content);
                        } elseif ($key == 'K2001'){
                            //这里是奇闻趣事接口
                            //$content = '点击不能实现，尝试输入“奇闻趣事”';
                            //$wechatObj->responseTextMsg($toUsername, $fromUsername, $content);
                            //以下接口不能实现
                            $res = ApiController::news();
                            $result = $res['newslist'];
                            $wechatObj->responseImageTextMsg($toUsername,$fromUsername,$result,count($result));
                        }
                        break;
                    case 'subscribe':
                        $content = '谢谢你的关注，既然来了，就别走啦！';
                        $wechatObj->responseTextMsg($toUsername,$fromUsername,$content);
                        break;
                    case 'unsubscribe':
                        error_log(date('Y-m-d H:i:s').$toUsername.'取消了关注'."\r\n",3,'subscribe.log');
                        break;
                    case 'SCAN':
                        $content = '你是不是又扫了我的二维码';
                        $wechatObj->responseTextMsg($toUsername,$fromUsername,$content);
                        break;
                    case 'LOCATION':
                        $latitude = (float)$xmlObj->Latitude;//纬度
                        $longitude = (float)$xmlObj->Longitude;//经度
                        $precision = (float)$xmlObj->Precision;//精确度
                        error_log(date('Y-m-d H:i:s').$toUsername.'的'.'纬度'.$latitude.'  '.'经度'.$longitude."\r\n",3,'location.log');
                        break;
                    default:
                        break;
                }
                break;
            case 'location':
                $latitude = (float)$xmlObj->Location_X;//纬度
                $longitude = (float)$xmlObj->Location_Y;//经度
                $content = '您现在所处的纬度为' . $latitude . ',' . '经度为' . $longitude;
                $wechatObj->responseTextMsg($toUsername,$fromUsername,$content);
                break;
            default:
                break;
        }
    }

    public function notLoginTips(){
        //dump(session());
        $this->display();
    }
    //用户自己定义地址栏，给出的错误提示
    public function notYourPlace(){
        $this->display();
    }
    //测试使用函数，以后会删除掉
    public function deleteallsession(){
        session(null);
    }
    public function looksession(){
        dump(session());
    }

    public function test(){
        $accessToken = \Common\Library\WeChat::getAccessToken();
        $wechatObj = new \Common\Library\WeChat();
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$accessToken";
        $data = '{
           "touser":"offLcwVctn21W0eX0pLTzI4mOKJw",
           "template_id":"l5W9c45h0CpyNuaLTvdk19rSswg063Hjm72joUYFRD0",
           "url":"http://www.baidu.com",            
           "data":{
                   "uniname": {
                       "value":"河北师范大学！",
                       "color":"#173177"
                   },
                   "nickname":{
                       "value":"Amberm",
                       "color":"#173177"
                   }
           }
       }';
        $news = $wechatObj->sendNews($url,$data);
        dump($news);
        return $news;
    }
    public function haha(){
        $mid = 12;
        $match = M('match');
        $user = M('user');
        $university = M('university');
        $uniid = session('uniid');
        $fid = $match->where("mid=$mid")->getField('fid');

        $touser = $user->where("id=$fid")->getField('openid');
        $fnickname = session('tlcnickname');
        $funiname = $university->where("uniid=$uniid")->getField('uniname');
        $jumpurl = "http://www.mengguoxiaolian/home/my/request/id/$mid";

        self::sendToAsker($touser,$funiname,$fnickname,$jumpurl);
    }
    public function sendToAsker($touser,$funiname,$fnickname,$jumpurl){
        $accessToken = \Common\Library\WeChat::getAccessToken();
        $wechatObj = new \Common\Library\WeChat();
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$accessToken";
        $data = '{
           "touser":"'.$touser.'",
           "template_id":"l5W9c45h0CpyNuaLTvdk19rSswg063Hjm72joUYFRD0",         
           "data":{
                   "uniname": {
                       "value":"'.$funiname.'",
                       "color":"#173177"
                   },
                   "nickname":{
                       "value":"'.$fnickname.'",
                       "color":"#173177"
                   }
           }
       }';
        $news = $wechatObj->sendNews($url,$data);
        dump($data);
        dump($news);
        return $news;
    }

    public function hei(){
        $match = D('match');
        $res = array();
        $res['mid'] = 15;
        $res['id'] = 12;
        $mid = $res['mid'];
        $tid = $res['id'];
        //$resultz中存储的信息都是请求发送者的信息，也就是当前登录的用户的信息
        $resultz = $match->where("mid=$mid")->relation(true)->find();
        //找到接受请求者的微信号
        $user = M('user');
        $touser = $user->where("id=$tid")->getField('openid');
        $funiname = $resultz['from_uni']['uniname'];
        $fnickname = $resultz['nickname'];
        $wechatid = $resultz['wechatid'];
        $xlqid = $resultz['account'];
        self::sendToAccepter($touser,$funiname,$fnickname,$wechatid,$xlqid);


        $touser = session('openid');
        $resultm = $user->where("id=$tid")->find();
        $university = M('university');
        $uniid = $resultm['uniid'];

        $fnickname = $resultm['nickname'];
        $funiname = $university->where("uniid=$uniid")->getField('uniname');
        $wechatid = $resultm['wechatid'];
        $xlqid = $resultm['account'];
        self::resendToAsker($touser,$funiname,$fnickname,$wechatid,$xlqid);
    }

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
        
}