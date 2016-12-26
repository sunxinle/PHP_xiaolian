<?php

namespace Common\Library;


/**
  * wechat php test
  */

//define your token


define("TOKEN", "sunxinle");

define('APPID', "wxbc8229b317266198");
define('SECRET',"87ec313ac0a551cc2a1c4f5ab8008b28");
class WeChat
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];
        //清空缓存
        ob_clean();
        //valid signature , option
        if(self::checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }
    /**
	*接收用户发送过来的消息
    */
	public function receiveMsg() {
        //1.接收数据（xml数据包）
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        //2.转成xml对象
        libxml_disable_entity_loader(true); //过滤掉一些敏感的符号
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        //3.返回xml对象
        return $postObj;
	}

	/**
	*回复文本消息的函数
	*/
	public function responseTextMsg($toUsername,$fromUsername,$content) {
		//error_log('已经进入responseTextMsg函数',3,'log.txt');
        //1.组织xml数据包
        $xmlStr = "<xml>
 <ToUserName><![CDATA[%s]]></ToUserName>
 <FromUserName><![CDATA[%s]]></FromUserName>
 <CreateTime>%s</CreateTime>
 <MsgType><![CDATA[text]]></MsgType>
 <Content><![CDATA[%s]]></Content>
 </xml>";
        $resultStr = sprintf($xmlStr, $toUsername, $fromUsername, time(), $content);
        //2.发送消息
        file_put_contents('log.xml', $resultStr);
        echo $resultStr;
	}

	/**
	*回复图片消息
	*/
	public function responseImageMsg() {

	}

	/**
	*回复语音消息
	*/
	public function responseVoiceMsg() {
		
	}

	/**
	*回复视频消息
	*/
	public function responseVedioMsg() {
		
	}

	/**
	*回复图文消息
	*/
	public function responseImageTextMsg($toUsername,$fromUsername,$result,$count) {
        
		$time = time();
	    //1.组织xml数据包
        $tpl="<xml>
<ToUserName><![CDATA[$toUsername]]></ToUserName>
<FromUserName><![CDATA[$fromUsername]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>$count</ArticleCount>
<Articles>";
        foreach ($result as $tmp){
            $title = $tmp['title'];
            error_log($title,3,'weather.log');
            $description = $tmp['description'];
            $picurl = $tmp['thumb'].$tmp['picUrl'];
            $url = $tmp['url'];
            $tpl .= "<item>
<Title><![CDATA[$title]]></Title> 
<Description><![CDATA[$description]]></Description>

<Url><![CDATA[$url]]></Url>
</item>";
        }
        $tpl .= "</Articles>
</xml>";
error_log($tpl,3,'weather.xml');
        echo $tpl;
	}

		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}


    public function get_php_file($filename) {
        return trim(substr(file_get_contents($filename), 15));
    }
    public function set_php_file($filename, $content) {
        $fp = fopen($filename, "w");
        fwrite($fp, "<?php exit();?>" . $content);
        fclose($fp);
    }
    public function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
        // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

    public function getAccessToken() {
        // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
        $data = json_decode(self::get_php_file("access_token.php"));
        if ($data->expire_time < time()) {
            // 如果是企业号用以下URL获取access_token
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=self::appId&corpsecret=self::appSecret";
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".SECRET;
            $res = json_decode(self::httpGet($url));
            $access_token = $res->access_token;
            if ($access_token) {
                $data->expire_time = time() + 7000;
                $data->access_token = $access_token;
                self::set_php_file("access_token.php", json_encode($data));
            }
        } else {
            $access_token = $data->access_token;
        }
        return $access_token;
    }

    public function sendNews($url,$data){
        $timeout = 5;
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data );
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            return $result;
        }else {
            dump(curl_errno($curl));
        }
    }


}

?>