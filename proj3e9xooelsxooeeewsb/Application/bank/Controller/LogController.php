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

class LogController extends CommonController {
	
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
		
		
        $view = View::getEngine('Html');
		$view->assign('dyqrbh', $this->dyqrbh);
		$view->assign('nickname', $user['nickname']);
		$view->assign('pid', $user['id']);
		$view->assign('ctime', date('Y-m-d:H:i:s', time()));
		$view->assign('userId', $this->dyqrbh); // 共用这个唯一编号
        $view->display('Log/index');
		
	}
	
	//
	public function loginLog(){
		
		// 页面数据更新
		$view = View::getEngine('Html');
		$view->assign('data', $ret);
		$view->display('Log/index');
	}
	
	// 
	public function actionLog(){
		$view = View::getEngine('Html');
		$view->assign('apply', $arrApply);
        $view->display('Dyqr/list');	
	}
	
}