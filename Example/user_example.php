<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use \Itcuijian\DingTalk\Api\Auth;
use \Itcuijian\DingTalk\Api\User;

//获取accessToken
$accessToken = Auth::getAccessToken($corpid, $secret);

//获取部门用户列表
$deptId = 1;
$list = User::simplelist($accessToken, $deptId);
$list = json_encode($list, JSON_UNESCAPED_SLASHES);

echo $list;