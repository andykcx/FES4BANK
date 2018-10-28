<?php
namespace bank\Server;

use Cml\Vendor\ApiClient;

class SendJson {
	
	/**
     * 发送json 数据  到api 接口
      * @param string $action 发送的动作 : qzcx:权证查询，apply:抵押申请
     * @param array $arrJson 需要发送的json数据
	 * @return array $ret 收到的api接口数据
     */
	 public function sendJson($action , $arrJson){
		 
		/*  $arrJson = [
				"system"=>[
				"version"=>"V1",
				"from"=> "web",
				"sign"=> "a101f236d049b9ad80e012113e59f9bc",
				"time"=> "1445482366"
				],
				"method"=> "1-1",
				"params"=> [
					"username" => "test001@163.com",
					"password" => "123456",
					"nickname" => "我是测试账号1"
				],
				"data" =>[
					"list" =>[
								[
									"bdczh" => "甘(2017)嘉峪关市不动产权第0000688号",
									"bdcdyh" => "",
									"qlr" => "",
									"qlrzjh" => ""
								]
					],
					"totalCount" => 1,
					"limit" => 10
				]
		]; */
		
	/*
		"data" =>[
					"list" =>[
						"bdczh" => "甘(2017)嘉峪关市不动产权第0000688号",
						"bdcdyh" => "620201401034GB00063F00430088",
						"qlr" => "王东瑞",
						"qlrzjh" => "620201198201160019"
					],
					"totalCount" => 1,
					"limit" => 10
				]
 	{
		"system": {
			"version":"V1",
			"from": "ios",
			"sign": "a101f236d049b9ad80e012113e59f9bc",
			"time": "1445482366"
		},
		"method": "1-1",
		"params": {
			"username" : "test001@163.com",
			"password" : "123456",
			"nickname" : "我是测试账号1"
		},
		"data": {
			"list": [
						{
							"bdczh": "不动产证号",
							"bdcdyh": "不动产单元号",
							"qlr": "权利人",
							"qlrzjh": "权利人证件号"
						}
					],
			"totalCount": 1,
			"limit": 10
		}
	} */
		$arrJson = json_encode($arrJson);
//\Cml\dump($arrJson);
//\Cml\dd('ff');
		//$url = 'http://api.loc/testServer.php/users/123';
		//$url = 'http://api.loc/testServer.php';
		$url = 'http://frpzj.kskxs.com:56536//api/BankPrepose/v1/';
		$url = $url . '/'. $action;
//\Cml\dd($url);
		$rest = new ApiClient($url, $arrJson, 'post');
		$info = $rest->doRequest();	
	
		//获取curl中的状态信息
/*		$status = $rest->status;
 		echo '<pre>';
		print_r($info);
		echo '</pre>'; */
		
		return $info;
	}
}