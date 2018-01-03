<?php

namespace Itcuijian\DingTalk\Util;

Class Http
{
    const OAPI_HOST = 'https://oapi.dingtalk.com';

    public static function get($path, $params)
    {
        $url = self::joinParams($path, $params);
        $response = \Httpful\Request::get($url)->send();
        if ($response->hasErrors())
        {
            throw new \Exception("Error: " . json_encode($response));
        }
        if ($response->body->errcode != 0)
        {
            throw new \Exception("Error: " . $response->body->errmsg);
        }
        return $response->body;
    }
    
    
    public static function post($path, $params, $data)
    {
        $url = self::joinParams($path, $params);
        $response = \Httpful\Request::post($url)
            ->body($data)
            ->sendsJson()
            ->send();
        if ($response->hasErrors())
        {
            throw new \Exception("Error: " . json_encode($response));
        }
        if ($response->body->errcode != 0)
        {
            throw new \Exception("Error: " . $response->body->errmsg);
        }
        return $response->body;
    }
    
    
    private static function joinParams($path, $params)
    {
        $url = self::OAPI_HOST . $path;
        if (count($params) > 0)
        {
            $url = $url . "?";
            foreach ($params as $key => $value)
            {
                $url = $url . $key . "=" . $value . "&";
            }
            $length = count($url);
            if ($url[$length - 1] == '&')
            {
                $url = substr($url, 0, $length - 1);
            }
        }
        return $url;
    }
}