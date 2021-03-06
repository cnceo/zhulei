<?php

/* 跳转登录收银台 */
class cashier_controller extends base_controller {
	private $merid;
	private $SiteUrl;
    public function __construct(){
        parent::__construct();
		$this->merid = $this->store_session['store_id'];
		$this->SiteUrl = $this->config['site_url'];
		$this->SiteUrl = rtrim($this->SiteUrl,'/');
    }

    public function index(){


        $this->checkSiteUrl();

        // 判断门店管理员跳转，
        if ($this->user_session['type'] == 1) {
            header('Location: '.$this->SiteUrl.'/merchants.php?m=User&c=index&a=index');exit;
        }

        // $order_no = '234234325252523324';
        $order_no = isset($_GET['order_no']) ? trim($_GET['order_no']) : '';
        $splitData = $this->splitAuthInfo();
        $tmpdata = $this->sendAuthInfo($splitData);

		if (isset($tmpdata['code'])) {
            $locationUrl = $this->SiteUrl.'/merchants.php?m=Index&c=auth&a=login&code='.$tmpdata['code'];
            if (!empty($order_no)) {
                $locationUrl .= '&order_no='.$order_no;
            }
		    header('Location: '.$locationUrl);

		} else {
		    exit('对接错误');
		}
    }

    // 检测 siteUrl jiangyi
    private function checkSiteUrl () {

        if (empty($this->SiteUrl)) {
            $siteurl=isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');
            $siteurl=strtolower($siteurl);
            if(strpos($siteurl, "http:") === false && strpos($siteurl,"https:") === false) $siteurl = 'http://'.$siteurl;
            $this->SiteUrl=rtrim($siteurl,'/');
        }

    }

    // 拼接验证信息 jiangyi
    private function splitAuthInfo () {

        $store_id = $this->merid;

        $storeInfo = M("Store")->getStore($store_id);
        $userInfo = M("User")->getUserById($storeInfo['uid']);

        $merInfo = array(
            'mer_id' => $storeInfo['store_id'],
            'account' => $storeInfo['store_id'].$userInfo['phone'],
            'name' => $userInfo['nickname'],
            'phone' => $userInfo['phone'],
            'email' => '',
            'pic_info' => !empty($userInfo['avatar']) ? $userInfo['avatar'] : $this->SiteUrl.'/static/images/avatar.png',
            'adverimg' => '',
        );

        $postdata = array(
            'account'=>$merInfo['account'],
            'userid'=>$store_id."_".md5($merInfo['account']),
            'username'=>$merInfo['name'],
            'appid'=>'',
            'appsecret'=>'',
            'wxid'=>'',
            'weixin'=>'',
            'logo'=>$merInfo['pic_info'],
            'domain'=>ltrim($this->SiteUrl,'http://'),
            'source'=>2,
            'email'=>$merInfo['email'],
            'phone'=>$merInfo['phone'],
            'thirdmid'=>$store_id,
        );
        $postdata['sign'] = $this->getSign($postdata);
        // dump($postdata);exit;
        return $postdata;
    }

    private function sendAuthInfo ($postdata) {
        $postdataStr = json_encode($postdata);
        $postdataStr = $this->Encryptioncode($postdataStr,'ENCODE');
        $postdataStr = urlencode($postdataStr);
        $request_url = $this->SiteUrl.'/merchants.php?m=Index&c=auth&a=getIdentifier';
        $responsearr = $this->httpRequest($request_url, 'POST', $postdataStr);
        $tmpdata = trim($responsearr['1']);
        if (empty($tmpdata)) {
            $responsearr = $this->httpRequest($request_url, 'POST', $postdataStr);
            $tmpdata = trim($responsearr['1']);
        }

        return $tmpdata = json_decode($tmpdata, true);
    }

    private function getSign($data) {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
            	$validate[$key] = $this->getSign($value);
            } else {
            	$validate[$key] = $value;
            }			
        }
        $validate['salt'] = 'pigcmso2oCashier';	//salt
        sort($validate, SORT_STRING);
        return sha1(implode($validate));
    }

    /**
     * 加密和解密函数
     *
     * @access public
     * @param  string  $string    需要加密或解密的字符串
     * @param  string  $operation 默认是DECODE即解密 ENCODE是加密
     * @param  string  $key       加密或解密的密钥 参数为空的情况下取全局配置encryption_key
     * @param  integer $expiry    加密的有效期(秒)0是永久有效 注意这个参数不需要传时间戳
     * @return string
     */
    public function Encryptioncode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
        $ckey_length = 4;
        $key = md5($key != '' ? $key : 'lhs_simple_encryption_code_87063');
        $keya = md5(substr($key, 0, 16));
        $keyb = md5(substr($key, 16, 16));
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';

        $cryptkey = $keya . md5($keya . $keyc);
        $key_length = strlen($cryptkey);

        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
        $string_length = strlen($string);

        $result = '';
        $box = range(0, 255);

        $rndkey = array();
        for ($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }

        for ($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }

        for ($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }

        if ($operation == 'DECODE') {
            if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        } else {
            return $keyc . str_replace('=', '', base64_encode($result));
        }
	}


	public function httpRequest($url, $method, $postfields = null, $headers = array(), $debug = false) {
        /* $Cookiestr = "";  * cUrl COOKIE处理* 
        if (!empty($_COOKIE)) {
            foreach ($_COOKIE as $vk => $vv) {
                $tmp[] = $vk . "=" . $vv;
            }
            $Cookiestr = implode(";", $tmp);
        }*/
		$method=strtoupper($method);
        $ci = curl_init();
        /* Curl settings */
        curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ci, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0");
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 60); /* 在发起连接前等待的时间，如果设置为0，则无限等待 */
        curl_setopt($ci, CURLOPT_TIMEOUT, 7); /* 设置cURL允许执行的最长秒数 */
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        switch ($method) {
            case "POST":
                curl_setopt($ci, CURLOPT_POST, true);
                if (!empty($postfields)) {
                    $tmpdatastr = is_array($postfields) ? http_build_query($postfields) : $postfields;
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $tmpdatastr);
                }
                break;
            default:
                curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method); /* //设置请求方式 */
                break;
        }
		$ssl =preg_match('/^https:\/\//i',$url) ? TRUE : FALSE;
        curl_setopt($ci, CURLOPT_URL, $url);
		if($ssl){
		  curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
		  curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, FALSE); // 不从证书中检查SSL加密算法是否存在
		}
		//curl_setopt($ci, CURLOPT_HEADER, true); /*启用时会将头文件的信息作为数据流输出*/
		curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ci, CURLOPT_MAXREDIRS, 2);/*指定最多的HTTP重定向的数量，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的*/
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ci, CURLINFO_HEADER_OUT, true);
        /*curl_setopt($ci, CURLOPT_COOKIE, $Cookiestr); * *COOKIE带过去** */
        $response = curl_exec($ci);
		$requestinfo=curl_getinfo($ci);
        $http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        if ($debug) {
            echo "=====post data======\r\n";
            var_dump($postfields);
            echo "=====info===== \r\n";
            print_r($requestinfo);

            echo "=====response=====\r\n";
            print_r($response);
        }
        curl_close($ci);
        return array($http_code, $response,$requestinfo);
    }

}

?>