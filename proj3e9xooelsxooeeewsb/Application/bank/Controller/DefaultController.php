<?php 

namespace bank\Controller;

use Cml\Controller;
use Cml\View;
//use bank\Model\OracleModel;



class DefaultController extends Controller
{
    public function index()
    {
        //echo '欢迎使用FES4bank系统';
		//$orcl = new OracleModel();
		//$str = $orcl->getName();
//\Cml\dump($str);		
		//$isSub = Input::getInt('type', 0);
        $view = View::getEngine('Html');
        //$isSub ? $view->displayWithLayout('Index/sub', 'regional') : $view->display('Index/bank');
		$view->display('Index/bank');
    }

}