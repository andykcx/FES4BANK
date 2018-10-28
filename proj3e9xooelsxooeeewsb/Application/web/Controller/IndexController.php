<?php 

namespace web\Controller;

use web\Controller\CommonController;
use Cml\Http\Input;
use Cml\View;
use Cml\Vendor\Acl;
use web\Model\Acl\UsersModel;

class IndexController extends CommonController
{
    public function index()
    {
        //echo '欢迎使用cml框架,应用初始化成功';
	
        $isSub = Input::getInt('type', 0);
        $view = View::getEngine('Html');
        $isSub ? $view->displayWithLayout('Index/sub', 'regional') : $view->display('Index/index');
    }
	
	public function index_v1()
	{
		$view = View::getEngine('Html');
        $view->display('Index/index_v1');
	}
}