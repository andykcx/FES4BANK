<?php

namespace web\Controller\Map;

use Cml\Controller;
use Cml\Http\Input;
use Cml\View;
use Cml\Vendor\Acl;
use web\Model\Acl\UsersModel;

class IndexController extends Controller
{
    public function index()
    {
        //echo '欢迎使用cml框架,应用初始化成功';
	
        //$isSub = Input::getInt('type', 0);
        $view = View::getEngine('Html');
        //$isSub ? $view->displayWithLayout('Index/sub', 'regional') : $view->display('Index/index');
		$view->display('Map/index');
    }
	
	public function index_1()
    {
        //普通地图
	
        //$isSub = Input::getInt('type', 0);
        $view = View::getEngine('Html');
        //$isSub ? $view->displayWithLayout('Index/sub', 'regional') : $view->display('Index/index');
		$view->display('Map/index');
    }
	
	public function index_2()
    {
        //卫星地图
	
        //$isSub = Input::getInt('type', 0);
        $view = View::getEngine('Html');
        //$isSub ? $view->displayWithLayout('Index/sub', 'regional') : $view->display('Index/index');
		$view->display('Map/index_2');
    }
	
	public function index_jiangning()
    {
        //卫星地图
	
        //$isSub = Input::getInt('type', 0);
        $view = View::getEngine('Html');
        //$isSub ? $view->displayWithLayout('Index/sub', 'regional') : $view->display('Index/index');
		$view->display('Map/index_jiangning');
    }
}