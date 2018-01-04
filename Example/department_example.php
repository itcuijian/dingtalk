<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use \Itcuijian\DingTalk\Api\Department;
use \Itcuijian\DingTalk\Api\Auth;

//获取accessToken
$accessToken = Auth::getAccessToken($corpid, $secret);

//获取部门列表
$list = Department::listDept($accessToken);

$list = json_encode($list, JSON_UNESCAPED_SLASHES);

echo $list;
