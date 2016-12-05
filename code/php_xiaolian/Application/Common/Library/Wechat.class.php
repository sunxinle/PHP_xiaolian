<?php
namespace Common\Library;
//define your token

//define("TOKEN", "zhangzhimin");
/*define('APPID', "wxfd74994b21325e2d");
define('SECRET',"7de309fbc9c84519564a505efd505492");*/
define('APPID', "wxbc8229b317266198");
define('SECRET',"87ec313ac0a551cc2a1c4f5ab8008b28");

/*处理文件上传相关的放在Wechat.class.php中*/
class Wechat
{
    /*解决Thinkphp进行微信开发时可能出现的问题
    thinkphp框架在显示视图时可能会加载一些附加文件头消息
    导致微信服务器校验时出错，因此在开发微信环境时，最好
    在输出消息之前或显示视图文件之前
    清空输出缓存区，保证微信程序正常运行*/

    /*第一次开发者填写基本配置，填自己的服务器地址url，和token。
    url是开发者用来接收微信消息和事件的接口url
    修改配置中的token会和接口url中包含的Token进行对比，从而验证安全性*/
    public function valid()
    {
        /*首次微信开发者点击修改服务器配置后，微信服务器将发送GET请求到微信开发者的服务器
        get请求携带的参数signature,timestamp,nonce,echostr
        此后，每次开发者接收用户消息的时候，微信服务器都会带上前面那3个参数
        发送get请求到微信开发者的服务器，微信开发者通过对签名的校验
        来验证此条消息的真实性*/
        $echoStr = $_GET["echostr"];

        //清空缓存
        ob_clean();
        //self可以访问本类中的静态属性和静态方法，如checkSignature
        //可以访问父类中的静态属性和静态方法
        //用self时，可以不用实例化的
        if(self::checkSignature()){
            echo $echoStr;
            exit;
        }
    }
    /*检验signature的php代码*/
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
        // SORT_STRING用于对对象字符串比较，常量值为2
        //sort函数第一个参数是要排序的数组
        //第二个参数是用sort_string改变排序行为
        sort($tmpArr, SORT_STRING);
        //implode将一个一维数组的值转化为字符串
        $tmpStr = implode( $tmpArr );
        //shal是两个参数，第二个参数默认值为Null,
        //如果第二个参数是true的话，那么shal将以20字符长度
        //的原始格式返回，否则返回值是一个40字符长度的16进制数字
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 1、接收用户发送过来的数据
     */
    public function receiveMessage(){
        /*用户发送数据给微信服务器，微信服务器把它封装成
        xml数据包，然后在发送post请求给开发者服务器，然后开发者
        服务器再进行处理，将xml数据包转成xml对象*/
        //1) 接收数据（xml数据包）
        //$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];//php7无效
        /*file_put_contents将一个字符串写入文件
        被写入的文件名是log.xml
        要被写入的数据是$postStr,
        FILE_APPEND如果文件已经存在，追加数据而不是覆盖*/
        $postStr = file_get_contents("php://input");
        file_put_contents('log.xml',$postStr,FILE_APPEND);
        //2) 转成xml对象
        libxml_disable_entity_loader(true);
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        //3) 返回xml对象
        return $postObj;
    }
    /**
     * 2、回复文本消息函数
     */
    public function responseTextMsg($toUserName,$fromUserName,$content){
        //1) 组织xml数据包
        $xmlStr = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
        /*sprintf函数给$xmlStr该xml数据包写值，
        后面的参数值依次写入占位符%s中*/
        $resultStr = sprintf($xmlStr, $toUserName,$fromUserName,time(),$content);
        /*file_put_contents将一个字符串写入文件
        被写入的文件名是log.xml
        要被写入的数据是$postStr,
        FILE_APPEND如果文件已经存在，追加数据而不是覆盖*/
        file_put_contents('log.xml',$resultStr,FILE_APPEND);
        //2) 发送消息
        echo $resultStr;
    }
    /**
     * 3、回复图片消息
     */
    public function responseImageMsg(){

    }

    /**
     * 4、回复语音消息
     */
    public function responseVoiceMsg(){

    }

    /**
     * 5、回复视频消息
     */
    public function responseVideoMsg(){

    }
    /**
     * 6、回复图文消息
     */
    public function responseImageTextMsg($toUserName,$fromUserName,$result,$num){
        //error_log('response', 3, 'log.log');
        $time = time();
        //1、组织xml数据包
        $tpl="<xml>
<ToUserName><![CDATA[$toUserName]]></ToUserName>
<FromUserName><![CDATA[$fromUserName]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>$num</ArticleCount>
<Articles>";

        foreach($result as $tmp){
            $title=$tmp['title'];
            $description=$tmp['description'];
            $picurl = $tmp['thumb'];
            $url = $tmp['url'];
            $tpl .="<item>
<Title><![CDATA[$title]]></Title> 
<Description><![CDATA[$description]]></Description>
<PicUrl><![CDATA[$picurl]]></PicUrl>
<Url><![CDATA[$url]]></Url>
</item>";
            file_put_contents('imageText.xml',$tpl);
        }

        $tpl .= "</Articles>
</xml>";
        //2、发送消息给用户
        echo $tpl;
    }
    /**
     * 7、回复音乐消息
     */
    public function responseMusicMsg(){

    }

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Content><![CDATA[%s]]></Content>
						<FuncFlag>0</FuncFlag>
						</xml>";
            if(!empty( $keyword ))
            {
                $msgType = "text";
                $contentStr = "Welcome to wechat world!";
                $resultStr = sprintf($textTpl, $toUsername, $fromUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                echo "Input something...";
            }

        }else {
            echo "";
            exit;
        }
    }

    /**
     * 创建菜单
     */
    public function createMenu($url,$menu){
        //初始化CURL会话
        $curl = curl_init ($url);
        $timeout = 5;

        //curl_setopt是设置curl参数
        curl_setopt ( $curl, CURLOPT_POST, 1 );//设置提交方式为POST
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );//获取的信息以文件流的形式返回，而不是直接输出
        curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $menu);//传递一个作为HTTP "$menu"操作的所有数据的字符串
        //执行指定的CURL会话
        $result = curl_exec ($curl);

        if(curl_errno()==0){
            $result=json_decode($result,true);
            return $result;
        }else {
            return curl_error($curl);
        }
        //关闭curl_close会话，释放资源
        curl_close ( $curl );
    }
    public function getAccessToken(){

        //打开缓存文件
        /*file_get_contents将整个文件读入一个字符串*/
        $str = trim(file_get_contents('access_token.php'));
        dump($str);
        /*json_decode将一个字符串转变成数组*/
        $access_token = json_decode($str);
        //access_token过期了或缓存文件未创建
        if($access_token->expire_time < time() || !$access_token){
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".SECRET;
            $newStr = file_get_contents($url);
            $access_token = json_decode($newStr);
            $access_token->expire_time=time()+7000;
            file_put_contents('access_token.php',json_encode($access_token));
        }
        return $access_token->access_token;
    }
    public function addMedia($url,$filePath,$formData){
        $curl = curl_init($url);//初始化CURL会话,返回句柄
        $timeout = 5;

        $data= array(
            "media"=>"@{$filePath}",
            'form-data'=>$formData
        );
        //CURLOPT_POST，ture时会发送POST请求，类型为application/x-www-form-urlencoded,是html表单提交时最常见的一种
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        //true将curl_exec()获取的信息以字符串返回，而不是直接输出
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        //CURLOPT_CONNECTTIMEOUT在尝试连接时等待的秒数，设置为0，无限等待
        curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
        //false禁止curl验证对等证书
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data );
        $result = curl_exec ($curl);

        if(curl_errno()==0){
            $result=json_decode($result,true);
            return $result;
        }else {
            return curl_error($curl);
        }
        curl_close ( $curl );
    }
    public function getMediaList($url,$data){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);//过滤头部
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt($curl,CURLOPT_POST,true); // post传输数据
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);// post传输数据
        $responseText = curl_exec($curl);
        $res = json_decode($responseText, true);
        curl_close($curl);

        return $res;
    }
    public function addNews($url,$data){
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            return $result;
        }else {
            dump(curl_errno($curl));
        }
    }

    public function getInfo($url, $data){
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            return $result;
        }else {
            dump(curl_errno($curl));
        }
    }

    /**
     * 获取菜单数据
     */
    public function menuView($url){
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            return $result;
        }else {
            dump(curl_errno($curl));
        }
    }
    public function deleteMedia($url,$data){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);//过滤头部
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt($curl,CURLOPT_POST,true); // post传输数据
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);// post传输数据
        $responseText = curl_exec($curl);
        curl_close($curl);
        return $responseText;
    }

}

?>