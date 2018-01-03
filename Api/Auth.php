<?php

namespace Itcuijian\DingTalk\Api;

use Itcuijian\DingTalk\Util\Http;

class Auth
{
    public function static getAccessToken($corpid, $secret)
    {
        $response = Http::get('/gettoken', array('corpid' => $corpid, 'corpsecret' => $secret));
        $accessToken = $response->access_token;

        return $accessToken;
    }
    
     /**
      * 缓存jsTicket。jsTicket有效期为两小时，需要在失效前请求新的jsTicket（注意：以下代码没有在失效前刷新缓存的jsTicket）。
      */
    public static function getTicket($accessToken)
    {
        $response = Http::get('/get_jsapi_ticket', array('type' => 'jsapi', 'access_token' => $accessToken));
        self::check($response);
        $jsticket = $response->ticket;

        return $jsticket;
    }


    function curPageURL()
    {
        $pageURL = 'http';

        if (array_key_exists('HTTPS',$_SERVER)&&$_SERVER["HTTPS"] == "on")
        {
            $pageURL .= "s";
        }
        $pageURL .= "://";

        if ($_SERVER["SERVER_PORT"] != "80")
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        }
        else
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

    public function getConfig($corpid, $secret, $agentid)
    {
        $nonceStr = self::str_random(7);
        $timeStamp = time();
        $url = self::curPageURL();
        $corpAccessToken = self::getAccessToken($corpid, $secret);

        $ticket = self::getTicket($corpAccessToken);
        $signature = self::sign($ticket, $nonceStr, $timeStamp, $url);
        
        $config = array(
            'url' => $url,
            'nonceStr' => $nonceStr,
            'agentId' => $agentId,
            'timeStamp' => $timeStamp,
            'corpId' => $corpId,
            'signature' => $signature);
        return json_encode($config, JSON_UNESCAPED_SLASHES);
    }

    public static function str_random($length = 16)
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }

    public static function sign($ticket, $nonceStr, $timeStamp, $url)
    {
        $plain = 'jsapi_ticket=' . $ticket .
            '&noncestr=' . $nonceStr .
            '&timestamp=' . $timeStamp .
            '&url=' . $url;
        return sha1($plain);
    }
    
    static function check($res)
    {
        if ($res->errcode != 0)
        {
            throw new Exception("Error: " . $res->errmsg);
        }
    }
}