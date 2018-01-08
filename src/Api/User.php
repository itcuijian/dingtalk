<?php

namespace Itcuijian\DingTalk\Api;

use Itcuijian\DingTalk\Util\Http;

class User
{
    /**
     * 通过code获取用户信息
     * @param  string $accessToken
     * @param  string $code        
     * @return mixed              
     */
    public static function getUserInfo($accessToken, $code)
    {
        $response = Http::get("/user/getuserinfo", 
            array("access_token" => $accessToken, "code" => $code));
        return $response;
    }

    /**
     * 通过userid获取用户信息
     *
     * @author cuijian <itcuijian@gmail.com>
     *
     * @param string $accessToken
     * @param string $userId
     *
     * @return mixed
     */
    public static function getInfoByUserId($accessToken, $userId)
    {
        $response = Http::get('/user/get', ['access_token' => $accessToken, 'userid' => $userId]);

        return $response;
    }

    /**
     * 创建成员
     *
     * @author cuijian
     *
     * @param string $accessToken
     * @param array $userInfo
     */
    public static function store($accessToken, $userInfo)
    {
        if (!isset($userInfo['name']) || empty($userInfo['name'])) {
            throw new \Exception("The name is required and must be non-empty");
        }

        if (!isset($userInfo['department']) || !is_array($userInfo['department']))  {
            throw new \Exception("The department is required and must be an array");
        }

        if (!isset($userInfo['mobile']) || empty($userInfo['mobile'])) {
            throw new \Exception("The mobile is required");
        }

        $response = Http::post('/user/create', ['access_token' => $accessToken], json_encode($userInfo));

        return $response->errcode == 0;
    }

    /**
     * 更新成员
     *
     * @author cuijian
     *
     * @param string $accessToken
     * @param array $userInfo
     *
     * @return boolean
     */
    public static function update($accessToken, $userInfo)
    {
        if (!isset($userInfo['userid']) || !isset($userInfo['name'])) {
            throw new \Exception("The userid and name is required");
        }
        
        $response = Http::post('/user/update', ['access_token' => $accessToken], json_encode($userInfo));

        return $response->errcode == 0;
    }

    /**
     * 删除成员
     *
     * @author cuijian
     *
     * @param string $accessToken
     * @param string $userId
     *
     * @return boolean
     */
    public static function delete($accessToken, $userId)
    {
        $response = Http::get('/user/delete', ['access_token' => $accessToken, 'userid' => $userId]);

        return $response->errcode == 0;
    }

    /**
     * 批量删除成员
     *
     * @author cuijian
     *
     * @param string $accessToken
     * @param array $userIdList
     *
     * @return boolean
     */
    public static function batchDelete($accessToken, $userIdList)
    {
        $response = Http::post('/user/batchdelete', ['access_token' => $accessToken], json_encode(['useridlist' => $userIdList]));

        return $response->errcode == 0;
    }

    public static function simplelist($accessToken,$deptId){
        $response = Http::get("/user/simplelist",
            array("access_token" => $accessToken,"department_id"=>$deptId));
        return $response->userlist;

    }

    /**
     * 获取部门的用户详情列表
     * 
     * @author cuijian
     *
     * @param  string $accessToken
     * @param  int $deptId
     *
     * @return array
     */
    public static function getUserList($accessToken, $deptId)
    {
        $response = Http::get('/user/list', ['access_token' => $accessToken, 'department_id' => $deptId]);

        return $response->userlist;
    }

    /**
     * 获取管理员列表
     *
     * @author cuijian 
     *
     * @param string $accessToken
     *
     * @return  array 
     */
    public static function getAdminList($accessToken)
    {
        $response = Http::get('/user/get_admin', ['access_token' => $accessToken]);

        return $response->adminList;
    }

    /**
     * 根据unionid获取成员的userid
     *
     * @author cuijian
     *
     * @param string $accessToken 
     * @param string $unionid
     *
     * @return string
     */
    public static function getUserIdByUnionid($accessToken, $unionid)
    {
        $response = Http::get('/user/getUseridByUnionid', ['access_token' => $accessToken, 'unionid' => $unionid]);

        return $response->userid;
    }

    

}