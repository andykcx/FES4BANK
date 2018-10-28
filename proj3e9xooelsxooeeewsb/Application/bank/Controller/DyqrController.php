<?php
namespace bank\Controller;

use bank\Controller\CommonController;
use Cml\View;
use Cml\Vendor\Acl;
use bank\Model\UserModel;
use bank\Model\DyqrModel;
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
use Cml\Vendor\ApiClient;
use Cml\Model;

class DyqrController extends CommonController {
	
	use ValidateOrRenderJson;
	private $dyqrModel = '';
	private $arrDyqr = [];
	private $dyqrbh = '';
	
	public function __construct(){
		$this->dyqrModel = new DyqrModel();
	}
	
	public function index(){	
				
		// 取得抵押权人信息
		$user = Acl::getLoginInfo();
		// 验证是否有权限操作 该页面
		
		
		
		// 生成 客户编号
		$this->dyqrbh = $this->dyqrModel->buildCode();
		if($this->dyqrbh < 0){
			echo "系统逻辑错误!";
			exit();
		}else if($this->dyqrbh == 0){
			echo "系统繁忙!请稍后再试!";
			exit();
		}		
				// zjlx select
		$zjlxModel = new ZjlxModel();
		$arrZjxl = $zjlxModel->getZjlxInfoCanShow();
		
		
        $view = View::getEngine('Html');
		$view->assign('dyqrbh', $this->dyqrbh);
		$view->assign('nickname', $user['nickname']);
		$view->assign('pid', $user['id']);
		$view->assign('ctime', date('Y-m-d:H:i:s', time()));
		$view->assign('userId', $this->dyqrbh); // 共用这个唯一编号
		$view->assign('zjlx', $arrZjxl);
        $view->display('Dyqr/index');
		
	}
	
	//
	public function add(){
		
		// 增加登录用户信息
		$userModel = new UserModel();
		// 用户登录信息已存在
		if( !empty($userModel->getUserInfo(Input::postString('userId'))) ){
			$ret = ['code'=>2, 'msg'=>'登录用户重复!', 'data'=>''];
		}else{
			$arrUser = [
				'dyqrbh' => Input::postString('dyqrbh'),
				'ctime' => Input::postString('ctime'),
				'pid' => Input::postString('pid'),
				'groupid' => '3', // 暂写死为 3
				'company' => Input::postString('company'),
				'username' => Input::postString('username'),
				'nickname' => Input::postString('nickname'),
				'password' => Input::postString('password'),
				'zjlx' => Input::postString('zjlx'),
				'zjh' => Input::postString('zjh'),
				'addr' => Input::postString('addr'),
				'tel' => Input::postString('tel'),
				'email' => Input::postString('email'),
				'lxr' => Input::postString('lxr'),
				'beizhu' => Input::postString('beizhu')
			];
		}
		$arrUser['password'] =  md5(md5($arrUser['password']) . Config::get('password_salt'));
		$userModel->setUserInfo($arrUser);
		$ret = ['code'=>0, 'msg'=>'用户创建成功!', 'data'=>''];
		$ret = json_encode($ret);
		// 页面数据更新
		$view = View::getEngine('Json');
		$view->assign('data', $ret);
		$view->display('Dyqr/index');
	}
	
	// 
	public function search(){
		// 页面数据更新
		$view = View::getEngine('Html');
		$view->display('Dyqr/search');
	}
	
	public function ajaxSearch(){
		$name = Input::getString('name');
		$zjh = Input::getString('zjh');
				
		$dyqrModel = new UserModel();
		$arrTmp = $dyqrModel->getDyqrInfoForList($name, $zjh);
		
		foreach($arrTmp as $k => $v){
			$list[] = [
				'company' => $arrTmp[$k]['company'],
				'nickname' => $arrTmp[$k]['nickname'],
				'username' => $arrTmp[$k]['username'],
				'zjlx' => $arrTmp[$k]['zjlx'],
				'zjh' => $arrTmp[$k]['zjh'],
				'addr' => $arrTmp[$k]['addr'],
				'tel' => $arrTmp[$k]['tel'],
				'lxr' => $arrTmp[$k]['lxr']
			];
		}
		
        $totalCount = count($list);
        $this->renderJson(0, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // ayui table 专用格式
	}
	
}