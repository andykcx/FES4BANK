<?php
namespace web\Controller\Oa;

use Cml\Controller;
use Cml\View;
use Cml\Service\Blade;
use CmlExt\Blade\BladeCompiler;
use CmlExt\Blade\Factory;
use CmlExt\Blade\FileViewFinder;
use web\Model\Oa\EmpModel;
use web\Model\Oa\DeptModel;
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

class DeptController extends Controller {
	
	use ValidateOrRenderJson;
	
	
	public function index(){
		
		// 
		GridBuildService::create('web/Oa/Dept/ajaxPage', '部门列表')
            ->addSearchItem('dept_name', '请输入部门名称')
            ->addTopButton('新增部门', FormBuildService::BUTTON_ADD, 'web/Oa/Dept/add', '新增部门', 'web/Oa/Dept/save')
            ->addColumn('id', 'id')
            ->addColumn('部门名', 'dept_name')
            ->addColumn('部门主管', 'director_id')
            ->addColumn('部门经理', 'manager_id')
            ->addColumn('创建时间', 'created_at')
            ->addButtonColumn('操作', 'id', [
                [
                    'text' => '编辑',
                    'type' => FormBuildService::BUTTON_EDIT,
                    'url' => 'web/Oa/Dept/edit',
                    'title' => '编辑部门',
                    'saveUrl' => 'web/Oa/Dept/save',
                    'class' => ''
                ],
                [
                    'text' => '删除',
                    'type' => FormBuildService::BUTTON_DEL,
                    'url' => 'web/Oa/Dept/del',
                    'class' => 'layui-btn-danger'
                ],
                [
                    'text' => "{{item.status == 1 ? '禁用' : '启用'}}",
                    'type' => FormBuildService::BUTTON_DISABLE,
                    'url' => 'web/Oa/Dept/disable',
                    'class' => '',
                    'status' => 'status',
                    'other' => ":class=\"item.status==1 ? 'layui-btn-warm' : 'layui-btn-normal'\"",
                ],
                [
                    'text' => '授权',
                    'type' => FormBuildService::BUTTON_ADD,
                    'url' => 'web/Acl/Acl/user',
                    'title' => '部门授权',
                    'saveUrl' => 'web/Acl/Acl/save/type/1',
                    'class' => 'layui-btn-primary'
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
        $deptModel = new DeptModel();
        $totalCount = $deptModel->paramsAutoReset(false, true)->getTotalNums();
        $list = $deptModel->getDeptNameList(Config::get('page_num'));
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

        $inst = FormBuildService::create($user ? '修改部门信息' : '新增部门')
            ->addFormItem('部门名称', 'dept_name', (isset($showField['dept_name']) ? $showField['dept_name'] : '请输入部门名称'), '',
                ' lay-verify="length" lay-min="3" lay-max="10" '
            );
		$deptModel = new DeptModel();
		$tmp = $deptModel->getAllDeptName();//[[1, '文本', 'selected'], [2, '文本2', '']];
	//\Cml\dump($tmp);
		$selectDept = [];
		$i = 0;
		foreach($tmp as $key => $v){
			array_push($selectDept, array($tmp[$key]['id'], $tmp[$key]['dept_name'], ''));
			$i++;
		}
		$selectDept[0]['status'] = 'selected';		
        if (!$showField || $showField['pid']) {
            $inst->addFormItem('上级部门', 'pid', '请输入上级部门', '', '', FormBuildService::INPUT_SELECT, $selectDept);
        }
		
		$empModel = new EmpModel();
		$tmp = $empModel->getUsersList();//[[1, '文本', 'selected'], [2, '文本2', '']];
		$selectUserList = [];
		$i = 0;
		foreach($tmp as $key => $v){
			array_push($selectUserList, array($i + 1, $tmp[$key]['username'], ''));
			$i++;
		}
		$selectUserList[0]['status'] = 'selected';
		
		if (!$showField || $showField['director_id']) {
            $inst->addFormItem('部门主管', 'director_id', '请输入部门主管', '', '', FormBuildService::INPUT_SELECT, $selectUserList);
        }
		
		if (!$showField || $showField['manager_id']) {
            $inst->addFormItem('部门经理', 'manager_id', '请输入部门经理', '', '', FormBuildService::INPUT_SELECT, $selectUserList);
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

        $deptName = Input::postString('dept_name');
        $data['pid'] = Input::postInt('pid');
		$data['director_id'] = Input::postString('director_id');
        $data['manager_id'] = Input::postString('manager_id');
        $data['created_at'] = Input::postInt('dept_id');
		
		if(is_null($deptName)){
			$this->renderJson(-1, '部门名必须大于3小于20！');
		}
		
       /*  if ($data['groupid']) {
            $newGroupInfo = GroupsModel::getInstance()->mapDbAndTable()->whereIn('id', $data['groupid'])->plunk('name', 'id');

            foreach($newGroupInfo as $groupId => $groupName) {
                if (!AclService::currentLoginUserIsHadPermisionToOpGroup($groupId)) {
                    $this->renderJson(10100, "您所有的部门组没有权限将该部门的部门组设为【{$groupName}】!");
                }
            }
        } */


        $DeptModel = new DeptModel();

       // $data['groupid'] = $data['groupid'] ? implode('|', $data['groupid']) : '';

        if (is_null($id)) {//新增
            //第三方登录挂载点
            $otherUserInfo = Plugin::hook('before_add_user_save', [$deptName]);
            //判断是否已有同名部门
            $equalName = $DeptModel->getDeptName($deptName);
            $equalName && $this->renderJson(1, '部门名已存在');

            is_array($otherUserInfo) && $data = array_merge($data, $otherUserInfo);
            $data['dept_name'] = $deptName;
            $data['created_at'] = date('Y-m-d H:i:s', Cml::$nowTime);
	//\Cml\dd($data['created_at']);
            $res = $DeptModel->setDept($data);
          //  LogService::addActionLog("添加了部门" . json_encode($data, JSON_UNESCAPED_UNICODE));
        } else {
            $data['updated_at'] = date('Y-m-d H:i:s', Cml::$nowTime);

          //  LogService::addActionLog("修改了部门[{$id}]的信息" . json_encode($data, JSON_UNESCAPED_UNICODE));
	//\Cml\dump($data);
            $res = $DeptModel->updateByColumn($id, $data);
        }
        $this->renderJson($res ? 0 : 1);
    }
	
	
	public function edit(){
		$id = Input::getInt('id');

       // AclService::currentLoginUserIsHadPermisionToOpUser($id) || exit('您所有的部门组没有操作该部门[组]的权限!');

        $this->add(DeptModel::getInstance()->getByColumn($id));
	}
	
	
	public function del(){
		$id = Input::getInt('id');
        $id < 1 && $this->renderJson(1);
        $users = new DeptModel();

       // AclService::currentLoginUserIsHadPermisionToOpUser($id) || $this->renderJson(10100);

        if ($id === intval(Config::get('administratorid'))) {
            $this->renderJson(1, '不能删除超管');
        }

        if ($users->delByColumn($id)) {
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