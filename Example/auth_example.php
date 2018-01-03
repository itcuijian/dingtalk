<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Itcuijian\DingTalk\Api\Auth;

$corpid = '';
$secret = '';
$agentid = '';

//获取accessToken
$accessToken = Auth::getAccessToken($corpid, $secret);

//获取jsTicket
$ticket = Auth::getTicket($accessToken);

//获取config
$config = Auth::getConfig($corpid, $agentid, $accessToken, $ticket);

$config = json_encode($config, JSON_UNESCAPED_SLASHES);
