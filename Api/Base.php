<?php
namespace Itcuijian\DingTalk\Api;

class Base {

	protected static $corpid = '';

	protected static $secret = '';

	protected static $agentid = '';


	public function __construct($corpid, $secret, $agentid)
	{
		self::$corpid = $corpid;
		self::$secret = $secret;
		self::$agentid = $agentid;

	}

	public function setCacheRoot($root)
	{
		defined('CACHE_ROOT') or define('CACHE_ROOT', $root);
	}

	public function setLogRoot($root)
	{
		defined('LOG_ROOT') or define('LOG_ROOT', $root);
	}
}