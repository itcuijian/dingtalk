<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Itcuijian\DingTalk\Api\Auth;

$corpid = '';
$secret = '';
$agentid = '';

$auth = new Auth($corpid, $secret, $agentid);
// $auth->setCacheRoot('/');
// $auth->setLogRoot('/');

var_dump($auth->getConfig());