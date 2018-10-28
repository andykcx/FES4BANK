<?php
namespace bank\Controller;

use bank\Controller\CommonController;
use Cml\View;
use Cml\Vendor\Acl;
use bank\Model\SearchModel;
use bank\Model\ApplyModel;
use bank\Model\QzModel;
use bank\Model\DyqrModel;
use bank\Model\DyqrdlrModel;
use bank\Model\DyrdlrModel;
use bank\Model\HbModel;
use bank\Model\JkrModel;
use bank\Model\QlrModel;
use bank\Model\FjModel;
use bank\Model\UserModel;
use bank\Model\UsersModel;
use bank\Model\ZjlxModel;
use Cml\Http\Input;
use Cml\Http\Request;
use Cml\Plugin;
use Cml\Config;
use Cml\Cml;
use bank\Service\Builder\FormBuildService;
use bank\Service\Builder\PopGridBuildService;
use bank\Service\System\LogService;
use bank\Service\ValidateOrRenderJson;
use bank\Service\ResponseService;
use bank\Service\AclService;
use bank\Service\SearchService;
use bank\Server\SendJson;


class ApplyController extends CommonController {
	
	use ValidateOrRenderJson;
	
	private $arrApply = [];// 申请数据集
	private $slbh = '';// 受理编号

	public function __construct(){
		$applyModel = new ApplyModel();
		// 生成 受理编号
		$this->slbh = $applyModel->buildCode();	
		if($this->slbh < 0){
			echo "系统逻辑错误!";
			exit();
		}else if($this->slbh == 0){
			echo "系统繁忙!请稍后再试!";
			exit();
		}

		// 
		
	}
	
	public function index(){
		
		// 取得抵押权人信息
		$user = Acl::getLoginInfo();
//\Cml\dump($user);		
		$userModel = new UserModel();
		$dyqr = $userModel->getUserInfo($user['username']);
			
		$arrApply = [
			'slbh' => $this->slbh,
			'dyqrbh' => $dyqr['dyqrbh'],
			'dyqr' => $dyqr['company'],
			'nickname' => $dyqr['nickname'],
			'zjlx' => $dyqr['zjlx'],
			'zjh' => $dyqr['zjh'],
			'tel' => $dyqr['tel'],
			'created_at' => date('c', time()),
			'status' => 0 // 新建空记录:暂存(未提交)
		];
//\Cml\dump($arrApply);		
		
        $view = View::getEngine('Html');
		$view->assign('apply', $arrApply);
        $view->display('Apply/apply');
		
	}
	
	/**
     * ajax 模糊 查询 权证相关信息
     *
     * 
     */
    public function ajaxSearchQz()
    {	
        $bdczh = Input::postString('bdczh');
		$bdcdyh = Input::postString('bdcdyh');
		$qlr = Input::postString('qlr');
		$qlrzjh = Input::postString('qlrzjh');

		$arrJson = $this->buildSearchQzJson($bdczh, $bdcdyh, $qlr, $qlrzjh);
		$server = new SendJson();
//\Cml\dump($arrJson);
//\Cml\dd('ff');
		$ret = $server->sendJson('OwnershipInfo', $arrJson);
		// 数据过滤
//\Cml\dump($ret);
//\Cml\dd('ff');
		$list = $this->filterSearchQzInfo($ret);
        $totalCount = count($list);

        $this->renderJson(0, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // ayui table 专用格式
		
		// 页面数据更新
		/* View::getEngine('Json')
            ->assign('data', $list)
            ->display(); */
		
    }
	
	/**
     * 生成需要查询的json 数据 
     *
     * @param string $bdczh 不动产证号
	 * @param string $bdczh 不动产单元号
	 * @param string $bdczh 抵押人名称
	 * @param string $bdczh 抵押人证件号
	 * @return array $ret 生成的json数组
     */
	public function buildSearchQzJson($bdczh, $bdcdyh, $qlr, $qlrzjh){
		$arrJson = [
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
									"bdczh" => $bdczh,
									"bdcdyh" => $bdcdyh,
									"qlr" => $qlr,
									"qlrzjh" => $qlrzjh
								]
					],
					"totalCount" => 1,
					"limit" => 10
				]
		];
		
		
		return $arrJson;
	}
	
	/**
     * api得到的数据 转换为 查询页面显示格式
     *
     * @param array $arrJson 需要清理的json数据
	 * @return array $ret 处理完毕需要显示的arr
     */
	public function filterSearchQzInfo($arrJson){
	
		// api 接收到的格式
		/* {
			"code": 0,
			"msg": "返回查询",
			"data": {
				"list": [
							{
								"qzslbh": "权证受理编号(权证唯一主键)",
								"bdczh": "不动产证号",
								"bdczlx":"权证/预告",
								"qlr":[
										{
											"name": "抵押人",
											"xh": "序号",
											"zjlx": "1",
											"zjh": "证件号",
											"tel": "电话"
										}
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
		// 页面需要显示的格式
	 	$arrTmp = [
					[
						'qzslbh' => "权证受理编号(权证唯一主键)", // 每条记录都包含这个编号，方便写数据库
						'bdczh' =>'不动产证号111',
						'bdcdyh' =>'不动产单元号111',
						'qlr' =>'',
						'zl' =>'坐落11',
						'jzmj' =>'建筑面积11',
						'dysw' =>'抵押顺位11',
						'xzxx' =>'权利状态(查封,异议)11',
					]
		]; */
		$arrTmp = json_decode($arrJson, true); // true: 转换为数组
		
		// 记录当前arrList 条数
		$totalNums = 0;
		// list 可能包含多个记录
		$arrTmp = $arrTmp['data']['list'];
		$zjlxModel = new ZjlxModel();
		foreach($arrTmp as $k => $v){
			$tmpList = [];// 清空
			$tmpList = [
					'qzslbh' => $arrTmp[$k]['qzslbh'],
					'bdczh' =>$arrTmp[$k]['bdczh'],
					'bdcdyh' =>'',
					'qlr' =>'',
					'zjlx' => '',
					'zjlx_name' => '',
					'qlrzjh' =>'',
					'tel' =>'',
					'zl' =>'',
					'jzmj' =>'',
					'dysw' =>'',
					'xzxx' =>$arrTmp[$k]['xzxx']
			];
			
			$arrQlr = $arrTmp[$k]['qlr'];
			$numsList = count($arrQlr);// 以 不动产单元信息条数作为 list 的记录总数
			// 跳过新增加的记录，避免被覆盖
			for($i = $totalNums; $i < $numsList + $totalNums; $i++){
				$arrList[] = $tmpList; // 根据 房子数量再生成多条'子记录'		
			}	
			
			// qlr 可能包含多个记录
			$i = $totalNums;
			//$arrQlr = $arrTmp[$k]['qlr'];
			$arrBdcdyxx = $arrTmp[$k]['bdcdyxx'];
			foreach($arrQlr as $k2 => $v2){
				$zjlx_name = $zjlxModel->getZjlxInfoById($arrQlr[$k2]['zjlx']);
				$arrList[$i]['qlr'] = $arrQlr[$k2]['name']; 
				$arrList[$i]['zjlx'] = $arrQlr[$k2]['zjlx'];
				$arrList[$i]['zjlx_name'] = $zjlx_name['name'];
				$arrList[$i]['qlrzjh'] = $arrQlr[$k2]['zjh'];
				$arrList[$i]['tel'] = $arrQlr[$k2]['tel'];
				
				// // 此处可能有错误。因为 不动产单元信息有可能有多条。此处只按照有一条处理
				$arrList[$i]['bdcdyh'] = $arrBdcdyxx[0]['bdcdyh'];
				$arrList[$i]['zl'] = $arrBdcdyxx[0]['zl'];
				$arrList[$i]['jzmj'] = $arrBdcdyxx[0]['jzmj'];
				
				// dyqk 可能包含多个记录
				$j = $totalNums;
				$arrDyqk = $arrTmp[$k]['dyqk'];
				foreach($arrDyqk as $k3 => $v3){
					//$arrList[$i]['dysw'] = $arrDyqk[$k3]['number']; // 暂时 用number 值。后期调整
					$j++;
				}
				if(0 == $j){
					$arrList[$i]['dysw'] = 0; // 目前只是计算抵押顺位数值
				}else{
					$arrList[$i]['dysw'] = $j; // 目前只是计算抵押顺位数值
				}
			
			
				$i++;
			}
			
/* 			// 依次填写每条 子记录所在的 全部信息
			$i = $totalNums;
			// bdcdyxx 可能包含多个记录
			$arrBdcdyxx = $arrTmp[$k]['bdcdyxx'];
			foreach($arrBdcdyxx as $k1 => $v1){
				$arrList[$i]['bdcdyh'] = $arrBdcdyxx[$k1]['bdcdyh'];
				$arrList[$i]['zl'] = $arrBdcdyxx[$k1]['zl'];
				$arrList[$i]['jzmj'] = $arrBdcdyxx[$k1]['jzmj'];
				$i++;
			} */
		
			$totalNums += $numsList; // 累加记录条数
		}
/* \Cml\dump($arrTmp);		
\Cml\dump($arrList);
\Cml\dd('eee'); */

		return $arrList;
	}
	/**
     * 接收 选择权证弹窗 过来的 json 数据
     *
     * @param array $arrJson 需要发送的json数据
	 * @return array $ret 收到的api接口数据
     */
	 public function recvJsonFromQzPop(){
		 $bdczh = Input::postString('bdczh');
	\Cml\dump($bdczh);
		$i = 1;// 排列序号
		$this->arrApply['id'] = $arrJson['bdczh'];
		$this->arrApply['bdczh'] = $arrJson['bdczh'];
		$this->arrApply['bdcdyh'] = $arrJson['bdczh'];
		$this->arrApply['qlr'] = $arrJson['bdczh'];
		$this->arrApply['zl'] = $arrJson['bdczh'];
		
		// 页面数据更新
		$view = View::getEngine('Json');
		$view->assignRef('', $this->arrApply);
		$view->renderJson('Apply/apply');
	 }
	
	
	/**
     * 更新申请表
     *
     * @param string status ajax 过来的 apply 表 status , 0:暂存(未提交)1:提交(未受理)2:受理3:收件4:录入5:审核6:缮证8:退件
	 *
     */
	public function updateApplyStatus(){
		$applyStatus = Input::postString('applyStatus');
		$updateApplyStatus = json_decode($updateApplyStatus, true);
		
		$slbh = $applyStatus['slbh'];// Input::postString('slbh'); // 取页面已有的slbh最稳妥。ajax调用 url时会重新请求 服务页面，生成新的slbh
		$status = $applyStatus['status'];//Input::postString('status');
		$utime = $applyStatus['utime'];// Input::postString('utime'); 
		$bz = $applyStatus['bz'];// Input::postString('bz'); 		

		$applyModel = new ApplyModel();
		switch($status){
			case '已提交(未受理)':
				$applyModel->updateApplyStatus($slbh, '已提交(未受理)', $utime, $bz);
				break;
			case '受理':
				$applyModel->updateApplyStatus($slbh, '受理', $utime, $bz);
				break;
			case '收件':
				$applyModel->updateApplyStatus($slbh, '收件', $utime, $bz);
				break;
			case '录入':
				$applyModel->updateApplyStatus($slbh, '录入', $utime, $bz);
				break;
			case '审核':
				$applyModel->updateApplyStatus($slbh, '审核', $utime, $bz);
				break;
			case '缮证':
				$applyModel->updateApplyStatus($slbh, '缮证', $utime, $bz);
				break;
			case '退件':
				$applyModel->updateApplyStatus($slbh, '退件', $utime, $bz);	
				break;				
			default:
				$applyModel->updateApplyStatus($slbh, '服务器错误', $utime, $bz);
				break;
		}
		
		$this->renderJson(0);
	}
	
	/**
     * 查询 权证信息
     *
     * @param array $user 编辑的时候传入部门信息
     */
    public function searchQz()
    {
		$view = View::getEngine('html');
		$view->assign('apply', $arrApply);
        $view->display('Apply/searchQz');

    }
	
	/**
     * 增加 抵押权人代理人
     *
     */
	public function addDyqrdlr(){

		$arrApply['dyqrbh'] = Input::getString('dyqrbh');
		$arrApply['dlrbh'] = Input::getString('dlrbh');
		
		// zjlx select
		$zjlxModel = new ZjlxModel();
		$arrZjxl = $zjlxModel->getZjlxInfoCanShow();
		
//\Cml\dump($arrZjxl);		
		$view = View::getEngine('html');
		$view->assign('apply', $arrApply);
		$view->assign('zjlx', $arrZjxl);
        $view->display('Apply/addDyqrdlr');

	}
	/**
     * 查询 抵押权人代理人
     *
     */
	public function ajaxDyqrdlr(){

		$arrDlr = Input::postString('arrDlr');
		
//\Cml\dump($arrDlr);	
//\Cml\dd('ff');	
		// 页面显示
		$totalCount = count($arrDlr);
		$list = json_encode($arrDlr);
		$this->renderJson(0, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // layui table 专用格式
		
		
	}
	
	
	/**
     * 增加附件显示信息
     *
     */
	 public function ajaxUpdateTreePath(){

		// 查询 附件表 取得附件信息
		$fjModel = new FjModel();
		$arrFj = $fjModel->getFuJianInfo($this->slbh);
//\Cml\dd($this->slbh);	
		// 附件没有内容则显示空目录
		if(empty($arrFj)){
			$json = [
				'msg' => '',
				'code' =>  0,
				'data' =>  [
						'0' => [
							'id' =>  'root',
							'name' =>  '/',
							'pId' => '0',
							'children' =>  []
						],
						'1' => [
							'id' =>  'djsqs',
							'name' =>  '登记申请书(原件)',
							'pId' => 'root',
							'children' =>  []
						],
						'2' => [
							'id' =>  'sqrsfz',
							'name' =>  '申请人(代理人)身份证(原件)',
							'pId' => 'root',
							'children' =>  []
						],
						'3' => [
							'id' =>  'dyht',
							'name' =>  '抵押合同(含抵押物清单)',
							'pId' => 'root',
							'children' =>  []
						],
						'4' => [
							'id' =>  'jkht',
							'name' =>  '借款合同，授信合同(原件)',
							'pId' => 'root',
							'children' =>  []
						],
						'5' => [
							'id' =>  'bdcqszs',
							'name' =>  '不动产权属证书',
							'pId' => 'root',
							'children' =>  []
						],
						'6' => [
							'id' =>  'sqwts',
							'name' =>  '授权委托书',
							'pId' => 'root',
							'children' =>  []
						],
						'7' => [
							'id' =>  'gzs',
							'name' =>  '公证书',
							'pId' => 'root',
							'children' =>  []
						],
						'8' => [
							'id' =>  'zxh',
							'name' =>  '知晓函',
							'pId' => 'root',
							'children' =>  []
						],
						'9' => [
							'id' =>  'others',
							'name' =>  '其他',
							'pId' => 'root',
							'children' =>  []
						]
				],
				'count' =>  924,
				'is' =>  true,
				'tip' =>  "操作成功！"
			];
		}else{
			// jd1
			$arrData = explode(';', $arrFj['djsqs']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd1_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd1.".$k+1, 'data'=>[]];
			}
			// jd2
			$arrData = explode(';', $arrFj['sqrsfz']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd2_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd2.".$k+1, 'data'=>[]];
			}
			// jd3
			$arrData = explode(';', $arrFj['dyht']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd3_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd3.".$k+1, 'data'=>[]];
			}
			// jd4
			$arrData = explode(';', $arrFj['jkht']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd4_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd4.".$k+1, 'data'=>[]];
			}
			// jd5
			$arrData = explode(';', $arrFj['bdcqszs']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd5_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd5.".$k+1, 'data'=>[]];
			}
			// jd6
			$arrData = explode(';', $arrFj['sqwts']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd5_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd6.".$k+1, 'data'=>[]];
			}
			// jd7
			$arrData = explode(';', $arrFj['gzs']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd6_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd7.".$k+1, 'data'=>[]];
			}
			// jd8
			$arrData = explode(';', $arrFj['zxh']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd7_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd8.".$k+1, 'data'=>[]];
			}
			// jd9
			$arrData = explode(';', $arrFj['others']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd8_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd9.".$k+1, 'data'=>[]];
			}
			
			// 填充附件json 并渲染
			$json = [
				'msg' => '',
				'code' =>  0,
				'data' =>  [
						'0' => [
							'id' =>  'root',
							'name' =>  '/',
							'pId' => '0',
							'children' =>  []
						],
						'1' => [
							'id' =>  'djsqs',
							'name' =>  '登记申请书(原件)',
							'pId' => 'root',
							'children' =>  []
						],
						'2' => [
							'id' =>  'sqrsfz',
							'name' =>  '申请人(代理人)身份证(原件)',
							'pId' => 'root',
							'children' =>  []
						],
						'3' => [
							'id' =>  'dyht',
							'name' =>  '抵押合同(含抵押物清单)',
							'pId' => 'root',
							'children' =>  []
						],
						'4' => [
							'id' =>  'jkht',
							'name' =>  '借款合同，授信合同(原件)',
							'pId' => 'root',
							'children' =>  []
						],
						'5' => [
							'id' =>  'bdcqszs',
							'name' =>  '不动产权属证书',
							'pId' => 'root',
							'children' =>  []
						],
						'6' => [
							'id' =>  'sqwts',
							'name' =>  '授权委托书',
							'pId' => 'root',
							'children' =>  []
						],
						'7' => [
							'id' =>  'gzs',
							'name' =>  '公证书',
							'pId' => 'root',
							'children' =>  []
						],
						'8' => [
							'id' =>  'zxh',
							'name' =>  '知晓函',
							'pId' => 'root',
							'children' =>  []
						],
						'9' => [
							'id' =>  'others',
							'name' =>  '其他',
							'pId' => 'root',
							'children' =>  []
						]
				],
				'count' =>  924,
				'is' =>  true,
				'tip' =>  "操作成功！"
			];
		}
//\Cml\dump($json);		
		$json = json_encode($json, JSON_UNESCAPED_UNICODE); // 防止乱码 php.5.4+
		View::getEngine('Json')
            ->assign('data', $json)
            ->display();
	
	}
	
	public function ajaxUpdateTreePath1(){
		
	/*  例子
		$json = [
			'0' =>[
				'title' => '节点1',
				'value' => 'jd1',
				'data' => [
					['title'=>"节点1.1", 'checked'=>true, 'disabled'=>false, 'value'=>"jd1.1", 'data'=>[]],
					['title'=>"节点1.2", 'checked'=>true, 'disabled'=>false, 'value'=>"jd1.2", 'data'=>[]],
					['title'=>"节点1.3", 'checked'=>true, 'disabled'=>false, 'value'=>"jd1.3", 'data'=>[]],
					['title'=>"节点1.4", 'checked'=>true, 'disabled'=>false, 'value'=>"jd1.4", 'data'=>[]]
				]
			],
			'1' =>[
				'title' => '节点2',
				'value' => 'jd2',
				'data' => [
					['title'=>"节点2.1", 'checked'=>true, 'disabled'=>false, 'value'=>"jd2.1", 'data'=>[]],
					['title'=>"节点2.2", 'checked'=>true, 'disabled'=>false, 'value'=>"jd2.2", 'data'=>[]],
					['title'=>"节点2.3", 'checked'=>true, 'disabled'=>false, 'value'=>"jd2.3", 'data'=>[]],
					['title'=>"节点2.4", 'checked'=>true, 'disabled'=>false, 'value'=>"jd2.4", 'data'=>[]]
				]
			]
		]; 
	*/

		// 查询 附件表 取得附件信息
		$fjModel = new FjModel();
		$arrFj = $fjModel->getFuJianInfo($this->slbh);
//\Cml\dd($this->slbh);	
		// 附件没有内容则显示空目录
		if(empty($arrFj)){
			$json = [
					'0' =>[
						'title' => '登记申请书(原件)',
						'value' => 'djsqs',
						'data' => []
					],
					'1' =>[
						'title' => '申请人(代理人)身份证(原件)',
						'value' => 'sqrsfz',
						'data' => []
					],
					'2' =>[
						'title' => '抵押合同(含抵押物清单)',
						'value' => 'dyht',
						'data' => []
					],
					'3' =>[
						'title' => '借款合同，授信合同(原件)',
						'value' => 'jkht',
						'data' => []
					],
					'4' =>[
						'title' => '不动产权属证书',
						'value' => 'bdcqszs',
						'data' => []
					],
					'5' =>[
						'title' => '授权委托书',
						'value' => 'sqwts',
						'data' => []
					],
					'6' =>[
						'title' => '公证书',
						'value' => 'gzs',
						'data' => []
					],
					'7' =>[
						'title' => '知晓函',
						'value' => 'zxh',
						'data' => []
					],
					'8' =>[
						'title' => '其他',
						'value' => 'others',
						'data' => []
					]
			];
		}else{
			// jd1
			$arrData = explode(';', $arrFj['djsqs']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd1_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd1.".$k+1, 'data'=>[]];
			}
			// jd2
			$arrData = explode(';', $arrFj['sqrsfz']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd2_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd2.".$k+1, 'data'=>[]];
			}
			// jd3
			$arrData = explode(';', $arrFj['dyht']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd3_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd3.".$k+1, 'data'=>[]];
			}
			// jd4
			$arrData = explode(';', $arrFj['jkht']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd4_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd4.".$k+1, 'data'=>[]];
			}
			// jd5
			$arrData = explode(';', $arrFj['bdcqszs']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd5_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd5.".$k+1, 'data'=>[]];
			}
			// jd6
			$arrData = explode(';', $arrFj['sqwts']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd5_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd6.".$k+1, 'data'=>[]];
			}
			// jd7
			$arrData = explode(';', $arrFj['gzs']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd6_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd7.".$k+1, 'data'=>[]];
			}
			// jd8
			$arrData = explode(';', $arrFj['zxh']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd7_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd8.".$k+1, 'data'=>[]];
			}
			// jd9
			$arrData = explode(';', $arrFj['others']);
			$arrData = array_filter($arrData);
			array_walk($arrData, function(&$item){$item = ltrim(substr($item, strrpos($item, DIRECTORY_SEPARATOR)),DIRECTORY_SEPARATOR);});// 去掉路径，只保留文件
			foreach($arrData as $k => $v){
				$jd8_data[$k] = ['title'=>$arrData[$k], 'checked'=>false, 'disabled'=>false, 'value'=>"jd9.".$k+1, 'data'=>[]];
			}
			
			// 填充附件json 并渲染
				$json = [
					'0' =>[
						'title' => '登记申请书(原件)',
						'value' => 'djsqs',
						'data' => $jd1_data
					],
					'1' =>[
						'title' => '申请人(代理人)身份证(原件)',
						'value' => 'sqrsfz',
						'data' => $jd2_data
					],
					'2' =>[
						'title' => '抵押合同(含抵押物清单)',
						'value' => 'dyht',
						'data' => $jd3_data
					],
					'3' =>[
						'title' => '借款合同，授信合同(原件)',
						'value' => 'jkht',
						'data' => $jd4_data
					],
					'4' =>[
						'title' => '不动产权属证书',
						'value' => 'bdcqszs',
						'data' => []
					],
					'5' =>[
						'title' => '授权委托书',
						'value' => 'sqwts',
						'data' => []
					],
					'6' =>[
						'title' => '公证书',
						'value' => 'gzs',
						'data' => []
					],
					'7' =>[
						'title' => '知晓函',
						'value' => 'zxh',
						'data' => []
					],
					'8' =>[
						'title' => '其他',
						'value' => 'others',
						'data' => []
					]
			];
		}
		
		$json = json_encode($json, JSON_UNESCAPED_UNICODE); // php.5.4+
		View::getEngine('Json')
            ->assign('data', $json)
            ->display();
	
	}
	
	// 附件上传
	public function upLoadFile(){
		$slbh = Input::postString('slbh'); // 受理编号
		$selectedPath = Input::postString('selectedPath'); // 选定的目录
		
		// 多文件上传暂未实现
		
		$file = $_FILES['arrSelectFiles']; // 根据 input:file 的 name 取值。多个input:file共用一个 name 属性
		
        /* $totalPieces = $_POST['totalPieces'];  //上传文件切片总数
        $index = $_POST['index'];  //上传文件当前切片
        $progress = round(($index/$totalPieces),2)*100; 
        if($index == ($totalPieces - 1)){
            $progress = 100;  //进度条
        } */
	$progress = 100;	
		// 未选中上传目录则 不操作
		if(empty($selectedPath)){
			return false;
		} 
        $filename_arr = explode('.', $file['name']);  //获取上传文件名称
        $ext = end($filename_arr);
        $date = date("Ymd");
        //$saveFileName = md5($date.$file['name']).'.'.$ext;  //上传文件名称加密
		$saveFileName = $file['name'];
		$saveFileName = iconv('UTF-8', 'GB2312//IGNORE', $saveFileName); // UTF8转GB2312
        $path = Cml::getApplicationDir('apps_path') . DIRECTORY_SEPARATOR .'bank' . DIRECTORY_SEPARATOR . 'UpLoad'. DIRECTORY_SEPARATOR . $slbh. DIRECTORY_SEPARATOR . $selectedPath; // 根目录下的 bank/upload/slbh20180919    
		$savePath = $path . DIRECTORY_SEPARATOR .$saveFileName; // 内部路径地址
//\Cml\dd($savePath);
        if (!file_exists($path)){
            mkdir($path, 0777, true); // true:允许多级创建 
        }				

        if($file['error']==0){
            if(!file_exists($savePath)){
                if(move_uploaded_file($file['tmp_name'],$savePath)){
					$code = 0;
                }
            }else{
                $content=file_get_contents($file['tmp_name']);
                if (file_put_contents($savePath, $content,FILE_APPEND)) {
					$code = 0;
                }
            }	
        }
		
		// 页面显示
		// { error:'" + error + "', msg:'" + msg + "'}
		$error = "错误代码001";
		$msg = "上传成功";
		echo "{ error:'" + $error + "', msg:'" + $msg + "'}";
		//$this->renderJson(0, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // layui table 专用格式
	}
	
	// 已上传的附件删除
	
	public function delUploadFile(){
		$slbh = Input::postString('slbh'); // 受理编号
		$selectedPath = Input::postString('selectedPath'); // 选定的目录
		$delFileName = Input::postString('delFileName');

		// 未选中上传目录则 不操作
		if(empty($selectedPath) || empty($slbh) || empty($delFileName)){
			return false;
		} 
/*		
		switch($selectedPath){
			case 'djsqs':
				$selectedPath = '登记申请书(原件)';
				break;
			case 'sqrsfz':
				$selectedPath = '申请人(代理人)身份证(原件)';
				break;
			case 'dyht':
				$selectedPath = '抵押合同(含抵押物清单)';
				break;
			case 'jkht':
				$selectedPath = '借款合同，授信合同(原件)';
				break;
			case 'bdcqszs':
				$selectedPath = '不动产权属证书';
				break;
			case 'sqwts':
				$selectedPath = '授权委托书';
				break;
			case 'gzs':
				$selectedPath = '公证书';
				break;
			case 'zxh':
				$selectedPath = '知晓函';
			case 'others':
				$selectedPath = 'others';
		}
*/
        $path = Cml::getApplicationDir('apps_path') . DIRECTORY_SEPARATOR .'bank' . DIRECTORY_SEPARATOR . 'UpLoad'. DIRECTORY_SEPARATOR . $slbh. DIRECTORY_SEPARATOR . $selectedPath; // 根目录下的 bank/upload/slbh20180919    
		$delFileName = $path . DIRECTORY_SEPARATOR .$delFileName; // 内部路径地址
//\Cml\dd($delFileName);			
		unlink($delFileName);
//\Cml\dd($delFileName);			
		// 页面显示

		$this->renderJson(0); // layui table 专用格式
		
	}
	
	/**
     * 增加 抵押人代理人
     *
     */
	public function addDyrdlr(){
		
		$strDyrbh['dyrbh'] = Input::getString('strDyrbh');
		$strDyrbh['dlrbh'] = Input::getString('strDlrbh');
		// zjlx select
		$zjlxModel = new ZjlxModel();
		$arrZjxl = $zjlxModel->getZjlxInfoCanShow();
				
		$view = View::getEngine('html');
		$view->assign('apply', $strDyrbh);
		$view->assign('zjlx', $arrZjxl);
        $view->display('Apply/addDyrdlr');
	}
	
	/**
     * 查询 申请进度
     *
     */
	public function searchApply(){
		
	}
	
	/**
     * 增加 借款人
     *
     */
	public function addJkr(){
		
		$strDyrbh['jkrbh'] = Input::getString('strJkrbh');
		// zjlx select
		$zjlxModel = new ZjlxModel();
		$arrZjxl = $zjlxModel->getZjlxInfoCanShow();
		
//\Cml\dump($arrZjxl);		
		$view = View::getEngine('html');
		$view->assign('apply', $arrApply);
		$view->assign('zjlx', $arrZjxl);
        $view->display('Apply/addJkr');
	}
	
	/**
     * 查询 借款人
     *
     */
	public function ajaxJkr(){
	
		$arrJkr = Input::postString('arrJkr');
		
		// 页面显示
		$totalCount = count($arrJkr);
		$list = json_encode($arrJkr);
		$this->renderJson(0, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // layui table 专用格式
	}
	
	/**
     * 查询 抵押人代理人
     *
     */
	public function ajaxDyrdlr(){
	
		$arrDlr = Input::postString('arrDlr');
		// 页面显示
		$totalCount = count($arrDlr);
		$list = json_encode($arrDlr);
		$this->renderJson(0, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // layui table 专用格式
	}
	
	
	
	/**
     * 暂存全部 apply 的数据 到 各个数据表
     *
     */
	public function saveApply(){
		
		// 写数据库
		// apply
		$tbApply = Input::postString('tbApply');
		$tbApply = htmlspecialchars_decode($tbApply); // 将特殊的 HTML 实体转换回普通字符
		$tbApply = json_decode($tbApply, true);
		$applyModel = new ApplyModel();
		$applyModel->setApplyInfo($tbApply);
		
		// dyqr_dlr
		$tbDyqrdlr = Input::postString('tbDyqrdlr');
		$tbDyqrdlr = htmlspecialchars_decode($tbDyqrdlr); // 将特殊的 HTML 实体转换回普通字符
		$tbDyqrdlr = json_decode($tbDyqrdlr, true);
		$dyqrdlrModel = new DyqrdlrModel();
		$dyqrdlrModel->setDlrInfo($tbDyqrdlr);
		
		// dyr_dlr
		$tbDyrdlr = Input::postString('tbDyrdlr');
		$tbDyrdlr = htmlspecialchars_decode($tbDyrdlr); // 将特殊的 HTML 实体转换回普通字符
		$tbDyrdlr = json_decode($tbDyrdlr, true);
		$dyrdlrModel = new DyrdlrModel();
		$dyrdlrModel->setDlrInfo($tbDyrdlr);
		
		// hb
		$tbHb = Input::postString('tbHb');
		$tbHb = htmlspecialchars_decode($tbHb); // 将特殊的 HTML 实体转换回普通字符
		$tbHb = json_decode($tbHb, true);
		$hbModel = new HbModel();
		$hbModel->setHbInfo($tbHb);
		
		// Jkr
		$tbJkr = Input::postString
		('tbJkr');
		$tbJkr = htmlspecialchars_decode($tbJkr); // 将特殊的 HTML 实体转换回普通字符
		$tbJkr = json_decode($tbJkr, true);
		$jkrModel = new JkrModel();
		$jkrModel->setJkrInfo($tbJkr);
		
		// qlr
		$tbQlr = Input::postString('tbQlr');
		$tbQlr = htmlspecialchars_decode($tbQlr); // 将特殊的 HTML 实体转换回普通字符
		$tbQlr = json_decode($tbQlr, true);
		$qlrModel = new QlrModel();
		$qlrModel->setQlrInfo($tbQlr);
		
		// qz
		$tbQz = Input::postString('tbQz');
		$tbQz = htmlspecialchars_decode($tbQz); // 将特殊的 HTML 实体转换回普通字符
		$tbQz = json_decode($tbQz, true);
		$qzModel = new QzModel();
		$qzModel->setQzInfo($tbQz);
		
		// dyqr
		$tbDyqr = Input::postString('tbDyqr');
		$tbDyqr = htmlspecialchars_decode($tbDyqr); // 将特殊的 HTML 实体转换回普通字符
		$tbDyqr = json_decode($tbDyqr, true);
		$dyqrModel = new DyqrModel();
		$dyqrModel->setDyqrInfo($tbDyqr);
		
		// fj
		$tbFj = Input::postString('tbFj');
//\Cml\dump($tbFj);
		$tbFj = htmlspecialchars_decode($tbFj); // 将特殊的 HTML 实体转换回普通字符
		$tbFj = json_decode($tbFj, true);
//\Cml\dump($tbFj);
//\Cml\dd('ff');
		$fjModel = new FjModel();
		$fjModel->setFjInfo($tbFj);
		
		// 页面显示
		$this->renderJson(0); // layui table 专用格式
	}
	
	
	/**
     * 发起抵押申请
     *
     */
    public function sendApply()
    {	
		//$apply = Input::postString('apply');
		$apply = $_POST['apply'];
		
		// 组装 要发送的 json
		$apply = [
			'code' => 0,
			'msg' => '请求查询',
			'data' => [
				'list' => [$apply]
			]
		];
		
		//$apply = json_encode($apply);
		
		$server = new SendJson();
		$ret = $server->sendJson('ApplicationContent', $apply);

			$ret = json_decode($ret, true);

		$ret = $ret['data']['list'];

		if('成功' == $ret[0]['errinfo']){
			$list = [
				[
					'status' => '已提交(未受理)',
					'utime' => date('Y-m-d H:i:s', time()),
					'bz' => '--'
				]
			];
			$this->renderJson(0, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // layui table 专用格式
		}else{
			$list = [];
			$this->renderJson(0, ['code'=>-1, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // layui table 专用格式
		}       
    }
	
	
}