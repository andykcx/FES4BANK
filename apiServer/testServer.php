<?php
/**
 * @Author: anziguoer@sina.com
 * @Email: anziguoer@sina.com
 * @link: https://git.oschina.net/anziguoer
 * @Date:  2015-04-30 16:52:53
 * @Last Modified by:  yangyulong
 * @Last Modified time: 2015-04-30 17:26:37
 */
 error_reporting(0); 
 
// 指定允许其他域名访问  
header('Access-Control-Allow-Origin:*');  
// 响应类型  
header('Access-Control-Allow-Methods:POST');  
// 响应头设置  
header('Access-Control-Allow-Headers:x-requested-with,content-type');  

 
include 'ApiServer.php';
 
class testServer extends apiServer
{
  /**
   * 先执行apiServer中的方法，初始化数据
   * @param object $obj 可以传入的全局对象[数据库对象，框架全局对象等]
   */
    
  private $obj;
  
  function __construct()//object $obj
  {
    parent::__construct();
    //$this->obj = $obj;
    //$this->resourse; 父类中已经实现，此类中可以直接使用
    //$tihs->resourseId; 父类中已经实现，此类中可以直接使用
  }
    
  /**
   * 获取资源操作
   * @return [type] [description]
   */
  protected function _get(){
    echo "get";
    //逻辑代码根据自己实际项目需要实现
  }  
  
  /**
   * 新增资源操作
   * @return [type] [description]
   */
  protected function _post(){

	//echo file_get_contents('php://input');
	
	// mock 数据
	
	$arrRecv = json_decode(file_get_contents('php://input'), true);
	//$arrRecv = file_get_contents('php://input');
/* echo "<pre>";
echo print_r($arrRecv);
echo "</pre>";
exit(); */ 	

	// 分别模拟不同的 json 数据包
		$pathinfo = $_SERVER['PATH_INFO'];  
	$requestAction = explode('/', ltrim($pathinfo, '/')); // 区分 json包格式
	$requestAction = $requestAction[0];
//file_put_contents('receivedApply.txt', $arrRecv);
	$sendJson = $this->getMockData( $requestAction, $arrRecv);
	
	echo json_encode($sendJson, JSON_UNESCAPED_UNICODE);// 防止乱码 php.5.4+
  }
  
  // 取得模拟数据
  // 
  public function getMockData($requestAction, $arrRecv){
	  
	$url = 'http://localhost:3000/' . $requestAction; 
	$mockData = $this->ajax_http_request($url);
//file_put_contents('receivedMockInfo.txt', $mockData);
	$mockData = json_decode($mockData, true);
	switch($requestAction){
		case 'ApplicationStatus': // 抵押申请状态查询
			return $this->buildApplyStatusJson($mockData, $arrRecv);
		case 'OwnershipInfo': // 权证状态查询
			return $this->buildQzJson($mockData, $arrRecv);
		case 'ApplicationContent': // 抵押申请
			return $this->buildApplyJson($mockData, $arrRecv);
	}
  }
  
  // 生成真实 参数的 模拟抵押申请状态json数据
  public function buildApplyStatusJson($mockData, $arrRecv){
	/*$mockData = {
			"code": 0,
			"msg": "返回查询",
			"data": {
				"list": [
							{
								"uid": "外网业务ID",
								"status": "当前步骤",
								"dtime": "最后操作时间",
								"bz": "备注"
							}
						],
				"totalCount": 1,
				"limit": 10
			}
	} 
*/ 
	$arrRecv = $arrRecv['data']['list'];
	$slbh = $arrRecv[0];
//file_put_contents('buildApplyStatusJson.txt', $arrRecv);
	$arrTmp = $mockData['data']['list'];
	foreach($arrTmp as $k => $v){
		$arrTmp[$k]['uid'] = $slbh; // 修改所有返回的模拟数据 uid 为提交过来的 slbh。更真实
	}
	$mockData['data']['list'] = $arrTmp;
	return $mockData;
  }
  
    // 生成真实 参数的 模拟权证状态查询json数据
  public function buildQzJson($mockData, $arrRecv){
	/*$mockData ={
		"code": 0,
		"msg": "返回查询",
		"data": {
			"list": [
						{
							"qzslbh": "权证受理编号(权证唯一主键)",
							"bdczh": "不动产证号",
							"bdczlx":"权证/预告",
							"qlr":[
									[{
										"name": "抵押权人",
										"xh": "序号",
										"zjlx": "证件类型",
										"zjh": "证件号",
										"tel": "电话"
									}]
							],
							"bdcdyxx":[
									{
										"bdcdyh": "不动产单元号",
										"zl": "坐落",
										"jzmj": "建筑面积"
									}
							],
							"dyqk":[
										{
											"id":"抵押受理编号",
											"je":"贷款金额",
											"number":"抵押顺位"
										}
							],
							"xzxx": "权利状态(查封,异议)"
						}
					],
			"totalCount": 1,
			"limit": 10
		}
	}
	*/ 

	return $mockData;
	
  }
  
    // 生成真实 参数的 模拟抵押申请json数据
  public function buildApplyJson($mockData, $arrRecv){
	/*$mockData={
		"code": 0,
		"msg": "返回查询",
		"data": {
			"list": [
				{
					"uid": "外网业务ID",
					"errinfo": "错误原因"
				},
				{
					"uid": "外网业务ID",
					"errinfo": "成功"
				}
			],
			"totalCount": 1,
			"limit": 10
		}
	}
	*/ 
	$arrRecv = $arrRecv['data']['list'];
	$slbh = $arrRecv[0]['uid'];

	$arrTmp = $mockData['data']['list'];
	foreach($arrTmp as $k => $v){
		$arrTmp[$k]['uid'] = $slbh; // 修改所有返回的模拟数据 uid 为提交过来的 slbh。更真实
	}
	$mockData['data']['list'] = $arrTmp;
//file_put_contents('sendNewMockInfo.txt', $mockData);
	return $mockData;	
  }
  
  /**
 * 构造ajax请求,不支持https
 */
	public function ajax_http_request($url )
	{

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		// 返回结果 不直接输出
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		// 追踪内部跳转
		curl_setopt($ch, CURLOPT_MAXREDIRS, 100);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		// 设置请求头信息
		$header = [
			'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
			'Accept-Encoding:gzip, deflate',
			'Accept-Language:zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',
			//'Host:'. $url, //必填
			'X-Requested-With:XMLHttpRequest', // 设置ajax请求头
			];
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		// 设置响应信息的编码
		curl_setopt($ch, CURLOPT_ACCEPT_ENCODING, 'gzip, deflate');
		// 请求数据
		$data = [
						'email'=>'email',
						'pwd'=>'js加密的密码（js函数可以到登陆页面找到）',
						'auto_login'=>0,
						'is_bbslogin'=>'0',
						'mem_pwd'   =>'0',
						'forward'=>'',
						'client_time'=>date('Y-m-d H:i:s')
				];
		//curl_setopt($ch, CURLOPT_POST, 1);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$ret = curl_exec($ch);
		curl_close($ch);
		
		return $ret;
	}
	
	
  /**
   * 删除资源操作
   * @return [type] [description]
   */
  protected function _delete(){
    //逻辑代码根据自己实际项目需要实现
  }
  
  /**
   * 更新资源操作
   * @return [type] [description]
   */
  protected function _put(){
    echo "put";
    //逻辑代码根据自己实际项目需要实现
  }
}
  
$server = new testServer();