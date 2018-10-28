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

use Cml\Http\Input;
use bank\Service\ValidateOrRenderJson;
use bank\Server\SendJson;


class SearchController extends CommonController {
	
	use ValidateOrRenderJson;
	
	
	public function index(){
		
		// 取得抵押权人信息
		$user = Acl::getLoginInfo();
//\Cml\dump($user);		
		$userModel = new UserModel();
		$dyqr = $userModel->getUserInfo($user['username']);
			
		$arrApplySearch = [
			'slbh' => $this->slbh,
			'dyqrbh' => $dyqr['dyqrbh'],
			'dyqr' => $dyqr['nickname'],
			'zjlx' => $dyqr['zjlx'],
			'zjh' => $dyqr['zjh'],
			'tel' => $dyqr['tel'],
			'created_at' => date('Y-m-d:H:i:s', time()),
			'status' => 0 // 新建空记录:暂存(未提交)
		];
			
        $view = View::getEngine('Html');
		$view->assign('applySearch', $arrApplySearch);
        $view->display('Search/index');
	}
	
	// ajax 模糊 查询 抵押申请信息
	public function applySearch(){
	
		$arrSearch['slbh'] = Input::getString('slbh');		
		$arrSearch['jkr'] = Input::getString('jkr');
		$arrSearch['jkrzjh'] = Input::getString('jkrzjh');
		$arrSearch['dyr'] = Input::getString('dyr');
		$arrSearch['dyrzjh'] = Input::getString('dyrzjh');
//\Cml\dump($arrSearch);
//\Cml\dd('ff');		
		// 根据给定条件 取得 受理编号
		$slbh = $this->getApplyId($arrSearch);
//\Cml\dump($slbh);
//\Cml\dd(empty($slbh));
		if( empty($slbh) ){
			// 没查到内容
			$list = [
						[
							'slbh' => '没查到内容', // 每条记录都包含这个编号，方便写数据库
							'created_at' =>'',
							'qzbh' =>'',
							'dyr' =>'',
							'jkr' =>'',
							'dyje' =>'',
							'jzmj' =>'',
							'status' => '',
							'bz' => ''
						]
			];			
		}else{
			// 处理 暂存(未提交)情况
			$applyModel = new ApplyModel();
			$applyInfo = $applyModel->getApplyInfo($slbh);
	//\Cml\dump($applyInfo);
			if('暂存(未提交)' == $applyInfo['status']){
				$ret = [
						"code" => 0,
						"msg" => "返回查询",
						"data" => [
								"list" => [
										[
												"uid" => $slbh,
												"status" => $applyInfo['status'],
												"dtime" => "--",
												"bz" => "备注"
										]
								]
						],
						"totalCount" => 1,
						"limit" => 10	
				];
				$ret = json_encode($ret); 
		//\Cml\dump($ret);
		//\Cml\dd('ff');
				$list = $this->filterSearchQzInfo($ret);
		//\Cml\dump($list);
		//\Cml\dd('ff');
			}else{
				$arrJson = $this->buildQzStatusSearchJson($slbh);
	//\Cml\dump($arrJson);
	//\Cml\dd('ff');
				$server = new SendJson();
				$ret = $server->sendJson('ApplicationStatus', $arrJson);
	//\Cml\dump($ret);
	//\Cml\dd('ff');
				// 更新 被查询记录信息
				$this->updateApplyInfo($slbh, $ret);
				// 数据过滤 生成需要的显示格式
				$list = $this->filterSearchQzInfo($ret);
			}
		}
		
//\Cml\dump($list);
//\Cml\dd('ff');
        $totalCount = count($list);

        $this->renderJson(0, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // ayui table 专用格式
		
	}
	
	// 根据 api 返回 更新 apply中的相关数据
	public function updateApplyInfo($slbh, $ret){
	/*	// 查询状态返回
		{
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
		
		$applyModel = new ApplyModel();
		$arrTmp = $ret['data']['list'];
		foreach($arrTmp as $k => $v){
			$applyModel->updateApplyStatus($slbh, $arrTmp[$k]['status'], $arrTmp[$k]['dtime'], $arrTmp[$k]['bz']);
		}
		
	}
	
	/**
     * api得到的数据 转换为 查询页面显示格式
     *
     * @param array $arrJson 需要清理的json数据
	 * @return array $ret 处理完毕需要显示的arr
     */
	public function filterSearchQzInfo($arrJson){
	
	/*	// 查询状态返回
		{
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
	
		// 页面需要显示的格式
			  
	 	$arrTmp = [
					[
						'slbh' => "申请编号", // 每条记录都包含这个编号，方便写数据库
						'created_at' =>'申请日期',
						'qzbh' =>'权证编号',
						'dyr' =>'抵押人',
						'jkr' =>'jkr',
						'dyje' =>'抵押金额',
						'jzmj' =>'建筑面积(平方)',
						'status' =>'当前状态',
						'utime' =>'当前状态',
						'bz' =>'状态备注',
					]
		]; */
		$arrTmp = json_decode($arrJson, true); // true: 转换为数组
		
		// 记录当前arrList 条数
		$totalNums = 0;
		// list 可能包含多个记录
		$arrTmp = $arrTmp['data']['list'];
		foreach($arrTmp as $k => $v){
			$tmpList = [];// 清空
			if('暂存(未提交)' == $arrTmp[$k]['status']){ // 后端返回 '' ，说明该该笔申请 是暂存(未提交)。因此可以删除
				$actionHtml = '
								<div class="">
									<a class="layui-btn  layui-btn-xs" lay-event="edit">编辑</a>
									<a  class="layui-btn  layui-btn-xs layui-btn-danger" lay-event="del">删除</a >
								</div>
							  ';
			}else{
				$actionHtml = '
								<div class="">
									<a class="layui-btn  layui-btn-xs" lay-event="detail">查看</a>
								</div>
							  ';
			}
			
			$applyModel = new ApplyModel();
			$applyModel->updateApplyStatus($arrTmp[$k]['uid'], $arrTmp[$k]['status'], $arrTmp[$k]['dtime'], $arrTmp[$k]['bz']);
			$apply = $applyModel->getApplyInfo($arrTmp[$k]['uid']);
		
			$tmpList = [
						'slbh' => $apply['slbh'], // 每条记录都包含这个编号，方便写数据库	
						'created_at' => $apply['created_at'],
						'qzbh' => $apply['qzbh'],
					//	'dyr' => $arrTmp[$k]['qzbh'],
					//	'jkr' =>'jkr',
						'dyje' => $apply['dyje'],
					//	'jzmj' => $apply['jzmj'],
						'utime' => $apply['utime'],
						'status' => $apply['status'],
						'action' => $actionHtml
			];
		
			$arrList[] = $tmpList;
			$totalNums += $numsList; // 累加记录条数
		}

		return $arrList;
	}
	
	// 根据 多种条件 查到 slbh
	public function getApplyId($arrSearch){
		$slbh = []; // 有可能是多条
		
		foreach($arrSearch as $k => $v){
			if( !empty($arrSearch[$k]) ){
				switch( $k ){
					case 'slbh':
						$slbh = $arrSearch[$k];
						return $slbh;	
						//break;
					case 'jkr':
						$slbh = $this->getSlbhFromJkr('name', $arrSearch[$k]);
						return $slbh;	
						//break;
					case 'jkrzjh':
						$slbh = $this->getSlbhFromJkr('zjh', $arrSearch[$k]);
						return $slbh;	
						//break;
					case 'dyr':
						$slbh = $this->getSlbhFromDyr('name', $arrSearch[$k]);
						return $slbh;	
						//break;
					case 'dyrzjh':
						$slbh = $this->getSlbhFromDyr('zjh', $arrSearch[$k]);
						return $slbh;	
						//break;
				}
			}
		}
//\Cml\dump($slbh);
		return $slbh;
	}
	
	// 查询 jkr 取得 slbh
	public function getSlbhFromJkr($columnName, $value){
		$jkrModel = new JkrModel();
		$jkrModel->getSlbh($columnName, $value);
	}
	
	// 查询 jkr 取得 slbh
	public function getSlbhFromDyr($columnName, $value){
		$qlrModel = new QlrModel();
		$qlrModel->getSlbh($columnName, $value);
	}
	
/**
     * 生成需要查询的json 数据 
     *
     * @param string $slbh 抵押申请受理编号
	 * @param string $jkr 借款人
	 * @param string $jkrzjh 借款人名称
	 * @param string $dyrzjh 抵押人证件号
	 * @return array $ret 生成的json数组
     */
	public function buildQzStatusSearchJson($slbh){
		
	/*	// 申请状态查询
		{
			"code": 0,
			"msg": "请求查询",
			"data": {
				"list": [
							"外网业务ID"
						],
				"totalCount": 1,
				"limit": 10
			}
		}
	*/
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
						$slbh
					],
					"totalCount" => 1,
					"limit" => 10
				]
		];
		
		
		return $arrJson;
	}
	
	// 显示申请 详情
	public function showDetail(){
		// 
		$slbh = Input::getString('slbh');

		$applyDetail = $this->buildApplyDetail($slbh);
//\Cml\dump($applyDetail);		
		$view = View::getEngine('Html');
		$view->assign('base_table', $applyDetail['base_table']);
		$view->assign('qz_table', $applyDetail['qz_table']);
		$view->assign('dyqr_table', $applyDetail['dyqr_table']);
		$view->assign('dyqrdlr_table', $applyDetail['dyqrdlr_table']);
		$view->assign('dyr_table', $applyDetail['dyr_table']);
		$view->assign('dyrdlr_table', $applyDetail['dyrdlr_table']);
		$view->assign('dyxx_table', $applyDetail['dyxx_table']);
		$view->assign('jkr_table', $applyDetail['jkr_table']);
		$view->assign('fj_table', $applyDetail['fj_table']);
		$view->assign('tzxx_table', $applyDetail['tzxx_table']);
		
		$view->display('Search/applyDetail');
	}
	
	// 
	public function delApplyRecord(){
		$slbh = Input::postString('slbh');

		// 事务处理开始
		// del apply 
		$applyModel = new ApplyModel();
		$applyModel->delApply($slbh);
		// del dyqr
		$dyqrModel = new DyqrModel();
		$dyqrModel->delDyqr($slbh);
		// del dyqr_dlr
		$dyqrDlrModel = new DyqrdlrModel();
		$dyqrDlrModel->delDlr($slbh);
		// del qlr
		$qlrModel = new QlrModel();
		$qlrModel->delQlr($slbh);
		// del dyr_dlr
		$dyrDlrModel = new DyrdlrModel();
		$dyrDlrModel->delDlr($slbh);
		// del fj
		$fjModel = new FjModel();
		$fjModel->delFj($slbh);
		// del hb
		$hbModel = new HbModel();
		$hbModel->delHb($slbh);
		// del qz
		$qzModel = new QzModel();
		$qzModel->delQz($slbh);
		// del jkr
		$jkrModel = new JkrModel();
		$jkrModel->delJkr($slbh);
		// 事务处理结束
		$this->renderJson(0, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // ayui table 专用格式
	}
	// 
	public function editApply(){
				// 
		$slbh = Input::postString('slbh');
		$applyJson = $this->buildApplySendJson($slbh);
		
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
		$view->assign('applyJson', $applyJson);
        $view->display('Apply/apply'); 
	
	}
	
	public function ajaxEditApply(){
		$params['getName'] = Input::postString('params');
/* \Cml\dump($params);
\Cml\dd('ff'); */
		$list = ['name'=>'ddd'];
		$list = json_encode($list);
		$this->renderJson(0, ['code'=>-1, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // layui table 专用格式
		
	}
	// 
	public function sendApplyRecord(){
		$slbh = Input::postString('slbh');
		//
		$applyModel = new ApplyModel();
		$apply = $applyModel->getApplyInfo($slbh);
		
		// 组装 要发送的 json
		$apply = [
			'code' => 0,
			'msg' => '请求查询',
			'data' => [
				'list' => [$apply]
			]
		];
		
		$apply = json_encode($apply);
		
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
	
	// 组装 当前选定的 apply详情
	public function buildApplyDetail($slbh){
				// apply
		$applyModel = new ApplyModel();
		$arrApply = $applyModel->getApplyInfo($slbh);
		
		// dyqr_dlr
		$dyqrdlrModel = new DyqrdlrModel();
		$arrDyqrdlr = $dyqrdlrModel->getDlrInfo($slbh);
		
		// dyr_dlr
		$dyrdlrModel = new DyrdlrModel();
		$arrDyrdlr = $dyrdlrModel->getDlrInfo($slbh);
		
		// hb
		$hbModel = new HbModel();
		$arrHb = $hbModel->getHbInfo($slbh);
		
		// Jkr
		$jkrModel = new JkrModel();
		$arrJkr = $jkrModel->getJkrInfo($slbh);
		
		// qlr
		$qlrModel = new QlrModel();
		$arrQlr = $qlrModel->getQlrInfo($slbh);
		
		// qz
		$qzModel = new QzModel();
		$arrQz = $qzModel->getQzInfoById($slbh);
		
		// dyqr
		$dyqrModel = new DyqrModel();
		$arrDyqr = $dyqrModel->getDyqrInfoById($slbh);
		
		// dyr
		$qlrModel = new QlrModel();
		$arrDyr = $qlrModel->getQlrInfo($slbh);
		
		// fj
		$fjModel = new FjModel();
		$arrFj = $fjModel->getFjInfo($slbh);
		
		// base_table
		$base_table = [
			'slbh' => $slbh,
			'dyqr' => $arrDyqr['name'],
			'dyqrbh' => $arrDyqr['dyqrbh'],
			'created_at' => $arrApply['created_at']
		];

		// qz
		foreach($arrHb as $k => $v){
			$qz_table[] = [
				'id' => $k+1,
				'bdczh' => $arrQz['bdczh'],
				'bdcdyh' => $arrHb[$k]['bdcdyh'],
				'jzmj' => $arrHb[$k]['jzmj'],
				'zl' => $arrHb[$k]['zl'],
				'dyqk' => $arrHb[$k]['dyqk'],
				'xzxx' => $arrHb[$k]['xzxx']
			];
		}

		//抵押权人信息
			$dyqr_table[] = [
				'name' => $arrDyqr['name'],
				'zjlx' => $arrDyqr['zjlx'],
				'zjh' => $arrDyqr['zjh'],
				'tel' => $arrDyqr['tel']
			];

		// dyqr_dlr
		foreach($arrDyqrdlr as $k => $v){
			$dyqrdlr_table[] = [
				'id' => $k+1,
				'name' => $arrDyqrdlr[$k]['name'],
				'zjlx' => $arrDyqrdlr[$k]['zjlx'],
				'zjh' => $arrDyqrdlr[$k]['zjh'],
				'tel' => $arrDyqrdlr[$k]['tel']
			];
		}
		
		// dyr
		foreach($arrDyr as $k => $v){
			$dyr_table[] = [
				'id' => $k+1,
				'name' => $arrDyr[$k]['name'],
				'zjlx' => $arrDyr[$k]['zjlx'],
				'zjh' => $arrDyr[$k]['zjh'],
				'tel' => $arrDyr[$k]['tel']
			];
		}
		
		// dyr_dlr
		foreach($arrDyrdlr as $k => $v){
			$dyrdlr_table[] = [
				'id' => $k+1,
				'name' => $arrDyrdlr[$k]['name'],
				'zjlx' => $arrDyrdlr[$k]['zjlx'],
				'zjh' => $arrDyrdlr[$k]['zjh'],
				'tel' => $arrDyrdlr[$k]['tel']
			];
		}			
					
		//dyxx_table
		$dyxx_table = [
			'bdcdyh' => $arrHb[0]['bdcdyh'] . '...等',
			'zl' => $arrHb[0]['zl'] . '...等',
			'dyfs' => $arrApply['dyfs'],
			'dyje' => $arrApply['dyje'],
			'dymj' => $arrApply['dymj'],
			'bdcjz' => $arrApply['bdcjz'],
			'dbfw' => $arrApply['dbfw'],
			'stime' => $arrApply['stime'],
			'etime' => $arrApply['etime'],
			'dysw' => $arrApply['dysw'],
			'ywlx' => $arrApply['ywlx'],
		];

		// jkr
		foreach($arrJkr as $k => $v){
			$jkr_table[] = [
				'id' => $k+1,
				'name' => $arrJkr[$k]['name'],
				'zjlx' => $arrJkr[$k]['zjlx'],
				'zjh' => $arrJkr[$k]['zjh'],
				'tel' => $arrJkr[$k]['tel']
			];
		}
		// fj						
		$fj_table = [
			['path' => '登记申请书(原件)', 'files' => $arrFj['djsqs']],
			['path' => '申请人(代理人)身份证(原件)', 'files' => $arrFj['sqrzj']],
			['path' => '抵押合同(含抵押物清单)', 'files' => $arrFj['dyht']],
			['path' => '借款合同，授信合同(原件)', 'files' => $arrFj['jkht']],
			['path' => '授权委托书', 'files' => $arrFj['sqwts']],
			['path' => '公证书', 'files' => $arrFj['gzs']],
			['path' => '知晓函', 'files' => $arrFj['zxh']],
			['path' => '其他', 'files' => $arrFj['others']]
		];	

		//tzxx_table
		$tzxx_table = [
			'slyh' => $arrApply['slyh'],
			'slry' => $arrApply['slry'],
			'tzr' => $arrApply['tzr'],
			'tzdh' => $arrApply['tzdh'],
			'tzrdz' => $arrApply['tzrdz'],
			'tzbz' => $arrApply['tzbz'],
			'dbfw' => $arrApply['dbfw']
		];

		$apply = [
			'base_table' => $base_table,
			'qz_table' => $qz_table,
			'dyqr_table' => $dyqr_table,
			'dyqrdlr_table' => $dyqrdlr_table,
			'dyr_table' => $dyr_table,
			'dyrdlr_table' => $dyrdlr_table,
			'dyxx_table' => $dyxx_table,
			'jkr_table' => $jkr_table,
			'fj_table' => $fj_table,
			'tzxx_table' => $tzxx_table
		];
		
		return $apply;
	}
	
	// 创建要发送的 apply json 请求
	public function buildApplySendJson($slbh){
		// apply
		$applyModel = new ApplyModel();
		$arrApply = $applyModel->getApplyInfo($slbh);
		
		// dyqr_dlr
		$dyqrdlrModel = new DyqrdlrModel();
		$arrDyqrdlr = $dyqrdlrModel->getDlrInfo($slbh);
		
		// dyr_dlr
		$dyrdlrModel = new DyrdlrModel();
		$arrDyrdlr = $dyrdlrModel->getDlrInfo($slbh);
		
		// hb
		$hbModel = new HbModel();
		$arrHb = $hbModel->getHbInfo($slbh);
		
		// Jkr
		$jkrModel = new JkrModel();
		$arrJkr = $jkrModel->getJkrInfo($slbh);
		
		// qlr
		$qlrModel = new QlrModel();
		$arrQlr = $qlrModel->getQlrInfo($slbh);
		
		// qz
		$qzModel = new QzModel();
		$arrQz = $qzModel->getQzInfo($slbh);
		foreach($arrQz as $k => $v){
			$arrQzslbh[] = $arrQz[$k]['qzbh'];
		}
		
		// dyqr
		$dyqrModel = new DyqrModel();
		$arrDyqr = $dyqrModel->getDyqrInfo($slbh);
		
		// fj
		$fjModel = new FjModel();
		$arrFj = $fjModel->getFjInfo($slbh);
		
		$arrList = [
				"uid" => $slbh,
				"qzslbh" => $arrQzslbh,
				"sqsj" => $arrApply['created_at'],
				"dyqr" => $arrDyqr,
				"dyqrdlr" => $arrDyqrdlr,
				"dyrdlr" => $arrDyrdlr,
				"ywlx" => $arrApply['ywlx'],
				"dyfs" => $arrApply['dyfs'],
				"dyje" => $arrApply['dyje'],
				"stime" => $arrApply['stime'],
				"etime" => $arrApply['etime'],
				"dysw" => $arrApply['dysw'],
				"htbh" => "增加什么合同编号??",//todo ;增加合同编号
				"dymj"  => $arrApply['dymj'],
				"zjjzwzl"  => "在建建筑物坐落?",
				"zjjzwdyfw"  => "在建建筑物抵押范围?",
				"dbfw"  => $arrApply['dbfw'],
				"jkr" => $arrJkr,
				"links" => $this->buildFJLinks($arrFj),
				"slry" => $arrApply['slry'],
				"tzr" => $arrApply['tzr'],
				"tzdh" => $arrApply['tzdh'],
				"tzrdz" => $arrApply['tzrdz'],
				"tzbz" => $arrApply['tzbz']
		];
		
		return $arrList;
		
	}
	
	// 生成附件 json格式
	public function buildFJLinks($arrFj){
		$arrFjLinks = [];	
		$arrTmp = [];
		
		$arrTmp = explode(';', $arrFj['djsqs']);
		foreach($arrTmp as $k => $v ){
			$arrFjLinks[] = [
				"name" => $arrTmp[$k],
				"url" => 'djsqs/' + $arrTmp[$k]
			];
		}
		
		$arrTmp = explode(';', $arrFj['sqrzj']);
		foreach($arrTmp as $k => $v ){
			$arrFjLinks[] = [
				"name" => $arrTmp[$k],
				"url" => 'sqrzj/' + $arrTmp[$k]
			];
		}
		$arrTmp = explode(';', $arrFj['dyht']);
		foreach($arrTmp as $k => $v ){
			$arrFjLinks[] = [
				"name" => $arrTmp[$k],
				"url" => 'dyht/' + $arrTmp[$k]
			];
		}
		$arrTmp = explode(';', $arrFj['jkht']);
		foreach($arrTmp as $k => $v ){
			$arrFjLinks[] = [
				"name" => $arrTmp[$k],
				"url" => 'jkht/' + $arrTmp[$k]
			];
		}
		$arrTmp = explode(';', $arrFj['sqwts']);
		foreach($arrTmp as $k => $v ){
			$arrFjLinks[] = [
				"name" => $arrTmp[$k],
				"url" => 'sqwts/' + $arrTmp[$k]
			];
		}
		$arrTmp = explode(';', $arrFj['gzs']);
		foreach($arrTmp as $k => $v ){
			$arrFjLinks[] = [
				"name" => $arrTmp[$k],
				"url" => 'gzs/' + $arrTmp[$k]
			];
		}
		$arrTmp = explode(';', $arrFj['zxh']);
		foreach($arrTmp as $k => $v ){
			$arrFjLinks[] = [
				"name" => $arrTmp[$k],
				"url" => 'zxh/' + $arrTmp[$k]
			];
		}
		$arrTmp = explode(';', $arrFj['others']);
		foreach($arrTmp as $k => $v ){
			$arrFjLinks[] = [
				"name" => $arrTmp[$k],
				"url" => 'others/' + $arrTmp[$k]
			];
		}
		
		return $arrFjLinks;
	}
}