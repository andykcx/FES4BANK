<?php 

namespace web\Controller;

use Cml\Controller;
use Cml\View;
use Cml\Service\Blade;
use CmlExt\Blade\BladeCompiler;
use CmlExt\Blade\Factory;
use CmlExt\Blade\FileViewFinder;
use web\Model\Oa\TemplateModel;
use web\Model\Oa\FlowTypeModel;
use web\Model\Oa\FlowModel;
use Cml\Http\Input;
use Cml\Plugin;
use Cml\Config;
use Cml\Cml;
use web\Service\Builder\FormBuildService;
use web\Service\Builder\GridBuildService;
use web\Service\System\LogService;
use web\Service\ValidateOrRenderJson;
use web\Service\ResponseService;
use web\Service\AclService;


class TestController extends Controller
{
    public function index()
    {
        //echo '欢迎使用cml框架,应用初始化成功';
		$flow['id'] = 7;//Input::getInt('id');
		$flowModel = new FlowModel();
		$tmp = $flowModel->getRecordById($flow['id']);
		$flow['flow_no'] = $tmp['flow_no'];
		$flow['flow_name'] = $tmp['flow_name'];
		$flow['is_publish'] = $tmp['is_publish'];
		$flow['jsplumb'] = $tmp['jsplumb'];
//\Cml\dump($flow);		
        $view = View::getEngine('Html');
		$view->assign('flow', $flow);
        $view->display('test');
    }

}