<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config.php';

use Itcuijian\DingTalk\Api\Auth;
use Itcuijian\DingTalk\Api\User;

//获取accessToken
$accessToken = Auth::getAccessToken($corpid, $secret);

//获取部门用户列表
// $deptId = 1;
// $list = User::simplelist($accessToken, $deptId);
// $list = json_encode($list, JSON_UNESCAPED_SLASHES);

//获取部门用户详情列表
$deptId = 1;
$list = User::getUserList($accessToken, $deptId);
$list = json_encode($list, JSON_UNESCAPED_SLASHES);

echo $list;

//获取用户详情
// $userId = 'manager8119';
// $user = User::getInfoByUserId($accessToken, $userId);
// $user = json_encode($user, JSON_UNESCAPED_SLASHES); 
// echo $user;

//创建用户
// $user = ['name' => 'jergo', 'department' => [1], 'mobile' => '13555555553'];
// $res = User::store($accessToken, $user);	
// var_dump($res);

//更新用户
// $user = ['userid' => '15336023281091708676', 'name' => 'chenxiansheng'];
// $res = User::update($accessToken, $user);
// var_dump($res);

//删除用户
// $userId = '15336023281091708676';
// $res = User::delete($accessToken, $userId);
// var_dump($res);

//批量删除
// $userIdList = ['0248373140101014975'];
// $res = User::batchDelete($accessToken, $userIdList);
// var_dump($res);

//获取管理者列表
// $list = User::getAdminList($accessToken);
// $list = json_encode($list);

// echo $list;

//根据unionid获取userid
// $userId = User::getUserIdByUnionId($accessToken, 'fLNiPhpBh5C0iE');
// echo $userId;
