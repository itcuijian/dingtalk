<?php

namespace Itcuijian\DingTalk\Api;

use Itcuijian\DingTalk\Util\Http;

class Media 
{
	/**
	 * 上传媒体文件
	 *
	 * @author cuijian
	 *
	 * @param string $accessToken
	 * @param string $type
	 * @param string $media
	 */
	public static function upload($accessToken, $type, $media) 
	{
		$response = Http::post('/media/upload', ['access_token' => $accessToken, 'type' => $type], json_encode(['media' => $media]));
		
		return $response;	
	}

	/**
	 * 下载媒体文件
	 *
	 * @author cuijian
	 * 
	 * @param  string $accessToken 
	 * @param  string $media_id
	 * @return mixed 
	 */
	public static function download($accessToken, $media_id)
	{
		$response = Http::get('/media/downloadFile', ['access_token' => $accessToken, 'media_id' => $media_id]);

		return $response;
	}
}