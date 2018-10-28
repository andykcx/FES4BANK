<?php
namespace web\Controller\Oa;

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

class FlowController extends Controller {
	
	use ValidateOrRenderJson;
	
	
	public function index(){
		
		// 
		GridBuildService::create('web/Oa/Flow/ajaxPage', '工作流列表')
            ->addTopButton('创建流程', FormBuildService::BUTTON_ADD, 'web/Oa/Flow/add', '创建流程', 'web/Oa/Flow/save')
            ->addColumn('id', 'id')
            ->addColumn('流程名称', 'flow_name')
            ->addColumn('模板名称', 'template_id')
            ->addColumn('状态', 'is_publish')
            ->addColumn('创建时间', 'created_at')
            ->addButtonColumn('操作', 'id', [
                [
                    'text' => '流程图',
                    'type' => FormBuildService::BUTTON_TAB,
                    'url' => 'web/Oa/Flow/flowDesign',
                    'title' => '流程设计',
                    'saveUrl' => 'web/Oa/Flow/save',
                    'class' => '',
					'width' => "['100%', '100%']"
                ],
				[
                    'text' => '编辑',
                    'type' => FormBuildService::BUTTON_EDIT,
                    'url' => 'web/Oa/Flow/edit',
                    'title' => '编辑流程',
                    'saveUrl' => 'web/Oa/Flow/save',
                    'class' => ''
                ],
                [
                    'text' => '删除',
                    'type' => FormBuildService::BUTTON_DEL,
                    'url' => 'web/Oa/Flow/del',
                    'class' => 'layui-btn-danger'
                ]
            ])
            ->display();
	}
	
	/**
     * ajax请求分页
     *
     * @acljump web/Acl/Users/index
     */
    public function ajaxPage()
    {	
        $flowModel = new FlowModel();
        $totalCount = $flowModel->paramsAutoReset(false, true)->getTotalNums();
        $list = $flowModel->getFlowNameList(Config::get('page_num'));
        $this->renderJson(0, ['list' => $list, 'totalCount' => $totalCount]);
    }
	
	/**
     * 新增部门
     *
     * @param array $user 编辑的时候传入部门信息
     */
    public function add($user = [])
    {
        $showField = Plugin::hook('before_add_or_edit_user', $user ? [$user['from_type']] : []);

        $inst = FormBuildService::create($user ? '修改流程' : '新建流程')
            ->addFormItem('流程名', 'flow_name', (isset($showField['flow_name']) ? $showField['flow_name'] : '请输入流程名称'), '',
                ' lay-verify="length" lay-min="3" lay-max="10" '
            );
			
		if (!$showField || $showField['flow_no']) {
            $inst->addFormItem('流程编号', 'flow_no', (isset($showField['flow_no']) ? $showField['flow_no'] : '请输入流程名称'), '',
                ' lay-verify="length" lay-min="3" lay-max="10" '
            );
        }
		
		$templateModel = new TemplateModel();
		$tmp = $templateModel->getAlltemplateName();//[[1, '文本', 'selected'], [2, '文本2', '']];
	//\Cml\dump($tmp);
		$selectTemplate = [];
		$i = 0;
		foreach($tmp as $key => $v){
			array_push($selectTemplate, array($tmp[$key]['id'], $tmp[$key]['template_name'], ''));
			$i++;
		}
		$selectTemplate[0]['status'] = 'selected';		
        if (!$showField || $showField['template_id']) {
            $inst->addFormItem('当前模板', 'template_id', '请输入当前模板', '', '', FormBuildService::INPUT_SELECT, $selectTemplate);
        }
		
		$flowTypeModel = new FlowTypeModel();
		$tmp = $flowTypeModel->getAllFlowTypeName();//[[1, '文本', 'selected'], [2, '文本2', '']];
		$selectFlowTypeList = [];
		$i = 0;
		foreach($tmp as $key => $v){
			array_push($selectFlowTypeList, array($i + 1, $tmp[$key]['type_name'], ''));
			$i++;
		}
		$selectFlowTypeList[0]['status'] = 'selected';
		
		if (!$showField || $showField['type_id']) {
            $inst->addFormItem('流程分类', 'type_id', '请输入分类', '', '', FormBuildService::INPUT_SELECT, $selectFlowTypeList);
        }

		if (!$showField || $showField['is_show']) {
            $inst->addFormItem('是否显示', 'is_show', '是', '', ' checked ', FormBuildService::INPUT_RADIO, 1);
			$inst->addFormItem('是否', 'is_show', '否', '', ' ', FormBuildService::INPUT_RADIO, 0);
        }
		
        /* $groupOptions = [];
        $group = GroupsModel::getInstance()->getAllGroups();

        foreach ($group as $item) {
            $groupOptions[] = [$item['id'], $item['name'], ($user && $user['groupid'] == $item['id']) ? 'selected' : ''];
            $inst->addFormItem('部门组', 'groupid[]', $item['name'], '', '', FormBuildService::INPUT_CHECKBOX, $item['id']);
        } */
        //$inst->addFormItem('部门组', 'groupid', '', '', '', FormBuildService::INPUT_SELECT, $groupOptions);

        //$inst->addFormItem('备注', 'remark', '备注信息', '', '', FormBuildService::INPUT_TEXTAREA);

        $user && $inst->addFormItem('', 'id', '', '', '', FormBuildService::INPUT_HIDDEN);
        $user && $user['groupid[]'] = explode('|', trim($user['groupid'], '|'));

        $inst->withData($user)->display();
    }
	
	
	/**
     * 保存部门
     *
     * @acljump web/Acl/Users/add|web/Acl/Users/edit
     *
     */
    public function save()
    {
        $data = [];
        $id = Input::postInt('id');
       // $id > 0 && (AclService::currentLoginUserIsHadPermisionToOpUser($id) || $this->renderJson(10100));//'您所有的部门组没有操作该部门[组]的权限!'

        $flowName = Input::postString('flow_name');
        $data['flow_no'] = Input::postString('flow_no');
		$data['template_id'] = Input::postString('template_id');
        $data['type_id'] = Input::postInt('type_id');
        $data['is_show'] = Input::postInt('is_show');
		
		
       /*  if ($data['groupid']) {
            $newGroupInfo = GroupsModel::getInstance()->mapDbAndTable()->whereIn('id', $data['groupid'])->plunk('name', 'id');

            foreach($newGroupInfo as $groupId => $groupName) {
                if (!AclService::currentLoginUserIsHadPermisionToOpGroup($groupId)) {
                    $this->renderJson(10100, "您所有的部门组没有权限将该部门的部门组设为【{$groupName}】!");
                }
            }
        } */


        $flowModel = new FlowModel();

       // $data['groupid'] = $data['groupid'] ? implode('|', $data['groupid']) : '';

        if (is_null($id)) {//新增
            //第三方登录挂载点
            $otherUserInfo = Plugin::hook('before_add_user_save', [$flowName]);
            //判断是否已有同名部门
            $equalName = $flowModel->getFlowName($flowName);
            $equalName && $this->renderJson(1, '流程名已存在');

            is_array($otherUserInfo) && $data = array_merge($data, $otherUserInfo);
            $data['flow_name'] = $flowName;
            $data['created_at'] = date('Y-m-d H:i:s', Cml::$nowTime);
	//\Cml\dd($data['created_at']);
            $res = $flowModel->setFlow($data);
          //  LogService::addActionLog("添加了部门" . json_encode($data, JSON_UNESCAPED_UNICODE));
        } else {
            $data['updated_at'] = date('Y-m-d H:i:s', Cml::$nowTime);

          //  LogService::addActionLog("修改了部门[{$id}]的信息" . json_encode($data, JSON_UNESCAPED_UNICODE));
	//\Cml\dump($data);
            $res = $flowModel->updateByColumn($id, $data);
        }
        $this->renderJson($res ? 0 : 1);
    }
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function flowDesign()
    {
		
//\Cml\dd($id);
		// 取得流程表信息
		$flow['id'] = Input::getInt('id');
		$flowModel = new FlowModel();
		$tmp = $flowModel->getRecordById($flow['id']);
		$flow['flow_no'] = $tmp['flow_no'];
		$flow['flow_name'] = $tmp['flow_name'];
		$flow['is_publish'] = $tmp['is_publish'];
		$flow['jsplumb'] = $tmp['jsplumb'];
//\Cml\dump($flow);		
        $view = View::getEngine('Html');
		$view->assign('flow', $flow);
        $view->display('Oa/flowDesign/flow/design');
    }
	
	
	public function edit(){
		$id = Input::getInt('id');

       // AclService::currentLoginUserIsHadPermisionToOpUser($id) || exit('您所有的部门组没有操作该部门[组]的权限!');

        $this->add(flowModel::getInstance()->getByColumn($id));
	}
	
	
	public function del(){
		$id = Input::getInt('id');
        $id < 1 && $this->renderJson(1);
        $flowModel = new FlowModel();

       // AclService::currentLoginUserIsHadPermisionToOpUser($id) || $this->renderJson(10100);

        if ($id === intval(Config::get('administratorid'))) {
            $this->renderJson(1, '不能删除超管');
        }

        if ($flowModel->delByColumn($id)) {
            LogService::addActionLog("删除了部门[{$id}]");
            //删除对应的权限
            $accessModel = new AccessModel();
            $accessModel->delByColumn($id, 'userid');
            $this->renderJson(0);
        } else {
            $this->renderJson(1);
        }
	}
}