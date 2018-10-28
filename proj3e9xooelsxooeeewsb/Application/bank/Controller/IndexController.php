<?php 

namespace bank\Controller;

use bank\Controller\CommonController;
use Cml\Http\Input;
use Cml\View;
use Cml\Vendor\Acl;
use Cml\Http\Response;
use Cml\Vendor\DetectFace;
use bank\Model\ApplyModel;
use bank\Model\UserModel;

class IndexController extends CommonController
{
    public function index()
    {

        $isSub = Input::getInt('type', 0);
        $view = View::getEngine('Html');
        $isSub ? $view->displayWithLayout('Index/sub', 'regional') : $view->display('Index/index');
    }
	
	public function sub()
	{
		// 查询当前用户操作的前十笔业务情况
		$user = Acl::getLoginInfo();
		
		$userModel = new UserModel();
		$userInfo = $userModel->getDyqrbh($user['id']);

		// 处理 暂存(未提交)情况
		$applyModel = new ApplyModel();
		$applyInfo = $applyModel->getApplyForSub($userInfo['dyqrbh']);

		foreach($applyInfo as $k => $v){
			$arrApply[] = [
				'slbh' => $applyInfo[$k]['slbh'],
				'created_at' => $applyInfo[$k]['created_at'],
				'qzbh' => $applyInfo[$k]['qzbh'],
				'dyr' => $applyInfo[$k]['dyr'],
				'jkr' => $applyInfo[$k]['jkr'],
				'dyje' => $applyInfo[$k]['dyje'],
				'jzmj' => $applyInfo[$k]['jzmj'],
				'utime' => $applyInfo[$k]['utime'],
				'status' => $applyInfo[$k]['status']
			];
			
		}

        $view = View::getEngine('Html');
		$view->assign('apply', $arrApply);
        $view->display('Index/sub');
	
	}
	
	
	//
	public function face(){
		$view = View::getEngine('Html');
        $view->display('Index/face');
	}
	
	// face detection 
	public function detectFace(){
		$imageData = Input::postString('imageData');
		$faceImgType = 'base64';
		$type = Input::postString('type'); // type= mouse :张张嘴, eye: 眨眨眼
		
		//$imageData = base64_decode($imageData);
		//$list = [];
		//$this->renderJson(-1, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // layui table 专用格式
	
 		$detectFace = new DetectFace();
		if('mouse' == $type){
			$ret = $detectFace->face_mouse($faceImg);
		}else if('eye' == $type){
			$ret = $detectFace->face_eye($faceImg);
		} 
	//$ret = true;
		if( true == $ret){
			// 脸部活体验证成功
			$this->index();
			$list = [];
			$this->renderJson(0, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // layui table 专用格式
		}else if(false == $ret){
			// 脸部活体验证失败
			Acl::logout();
			//Response::redirect('bank/public/login');
			$this->renderJson(-1, ['code'=>0, 'msg'=>'', 'count' => $totalCount, 'list' => $list]); // layui table 专用格式
		}else{
			// 异常错误
			echo "Face detect error.";
			exit();
		}
	
	}
}