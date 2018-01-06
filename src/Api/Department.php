<?php

namespace Itcuijian\DingTalk\Api;

use Itcuijian\DingTalk\Util\Http;

class Department
{
    public static function createDept($accessToken, $dept)
    {
        $response = Http::post("/department/create", 
            array("access_token" => $accessToken), 
            json_encode($dept));
        return $response->id;
    }
    
    
    public static function listDept($accessToken)
    {
        $response = Http::get("/department/list", 
            array("access_token" => $accessToken));
        return $response->department;
    }
    
    /**
     * 删除部门
     * 
     * @param  string $accessToken
     * @param  int    $id
     * @return boolean
     */
    public static function deleteDept($accessToken, $id)
    {
        $response = Http::get("/department/delete", 
            array("access_token" => $accessToken, "id" => $id));
        return $response->errcode == 0;
    }

    /**
     * 获取部门详情
     *
     * @author cuijian
     *
     * @param string $accessToken
     * @param int $id
     * @param string $lang
     *
     * @return mixed 
     */
    public static function getDepartmentInfo($accessToken, $id, $lang="zh_CN")
    {
        $response = Http::get('/department/get', ['access_token' => $access_token, 'id' => $id, 'lang' => $lang]); 

        return $response;
    }

}
