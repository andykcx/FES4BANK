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

class EmpController extends Controller {
	
	use ValidateOrRenderJson;
	
	
	public function index(){
		
		// 
		GridBuildService::create('web/Oa/Emp/ajaxPage', '用户列表')
            ->addSearchItem('username', '请输入用户名')
            ->addSearchItem('nickname', '请输入用户昵称')
            ->addTopButton('新增用户', FormBuildService::BUTTON_ADD, 'web/Oa/Emp/add', '新增用户', 'web/Oa/Emp/save')
            ->addColumn('id', 'id')
            ->addColumn('用户名', 'username')
            ->addColumn('邮箱', 'email')
            ->addColumn('工号', 'workno')
			->addColumn('所属部门', 'dept_id')
            ->addColumn('是否离职', 'leave', '', 2)
            ->addColumn('创建时间', 'created_at')
            ->addColumn('修改时间', 'updated_at')
            ->addButtonColumn('操作', 'id', [
                [
                    'text' => '编辑',
                    'type' => FormBuildService::BUTTON_EDIT,
                    'url' => 'web/Oa/Emp/edit',
                    'title' => '编辑用户',
                    'saveUrl' => 'web/Oa/Emp/save',
                    'class' => ''
                ],
                [
                    'text' => '删除',
                    'type' => FormBuildService::BUTTON_DEL,
                    'url' => 'web/Oa/Emp/del',
                    'class' => 'layui-btn-danger'
                ],
                [
                    'text' => "{{item.status == 1 ? '禁用' : '启用'}}",
                    'type' => FormBuildService::BUTTON_DISABLE,
                    'url' => 'web/Oa/Emp/disable',
                    'class' => '',
                    'status' => 'status',
                    'other' => ":class=\"item.status==1 ? 'layui-btn-warm' : 'layui-btn-normal'\"",
                ],
                [
                    'text' => '授权',
                    'type' => FormBuildService::BUTTON_ADD,
                    'url' => 'web/Acl/Acl/user',
                    'title' => '用户授权',
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
        $EmpModel = new EmpModel();
        $totalCount = $EmpModel->paramsAutoReset(false, true)->getTotalNums();
        $list = $EmpModel->getUsersList(Config::get('page_num'));
        $this->renderJson(0, ['list' => $list, 'totalCount' => $totalCount]);
    }
	
	/**
     * 新增用户
     *
     * @param array $user 编辑的时候传入用户信息
     */
    public function add($user = [])
    {
        $showField = Plugin::hook('before_add_or_edit_user', $user ? [$user['from_type']] : []);

        $inst = FormBuildService::create($user ? '修改用户信息' : '新增用户')
            ->addFormItem('用户名', 'username', (isset($showField['username']) ? $showField['username'] : '请输入用户名'), '',
                ' lay-verify="length" lay-min="3" lay-max="10" '
            );

        if (!$showField || $showField['email']) {
            $inst->addFormItem('邮 箱', 'email', '请输入邮箱', '',
                ' lay-verify="length" lay-min="3" lay-max="20" '
            );
        }
		
		if (!$showField || $showField['workno']) {
            $inst->addFormItem('工 号', 'workno', '请输入工号', '',
                ' lay-verify="length" lay-min="3" lay-max="20" '
            );
        }
		
		if (!$showField || $showField['dept_id']) {
           /*  $inst->addFormItem('所属部门', 'dept_id', '请输入所属部门', '',
                ' lay-verify="length" lay-min="3" lay-max="20" '
            ); */
			$deptModel = new DeptModel();
			$tmp = $deptModel->getDeptName();//[[1, '文本', 'selected'], [2, '文本2', '']];
	//\Cml\dump($tmp);
			$selectDept = [];
			$i = 0;
			foreach($tmp as $key => $v){
				array_push($selectDept, array($i + 1, $tmp[$key]['dept_name'], ''));
	/* 			$selectDept[$i]['id'] = $i + 1;
				$selectDept[$i]['deptName'] = $tmp[$key]['dept_name'];
				$selectDept[$i]['status'] = ''; */
				$i++;
			}
			$selectDept[0]['status'] = 'selected';
	//\Cml\dump($selectDept);		
			$inst->addFormItem('所属部门', 'dept_id', '请输入所属部门', '', '', FormBuildService::INPUT_SELECT, $selectDept);
        }

        if (!$showField || $showField['password']) {
            $inst->addFormItem('密码', 'password', '请输入新密码', 'use_password', '', FormBuildService::INPUT_PASSWORD)
                ->addFormItem('重复密码', 'checkpassword', '请重复输入密码', '', ' lay-verify="repeat" lay-repeat=".use_password" lay-repeat-text="值必须和密码一样" ', FormBuildService::INPUT_PASSWORD);
        }

        /* $groupOptions = [];
        $group = GroupsModel::getInstance()->getAllGroups();

        foreach ($group as $item) {
            $groupOptions[] = [$item['id'], $item['name'], ($user && $user['groupid'] == $item['id']) ? 'selected' : ''];
            $inst->addFormItem('用户组', 'groupid[]', $item['name'], '', '', FormBuildService::INPUT_CHECKBOX, $item['id']);
        } */
        //$inst->addFormItem('用户组', 'groupid', '', '', '', FormBuildService::INPUT_SELECT, $groupOptions);

        $inst->addFormItem('备注', 'remark', '备注信息', '', '', FormBuildService::INPUT_TEXTAREA);

        $user && $inst->addFormItem('', 'id', '', '', '', FormBuildService::INPUT_HIDDEN);
        $user && $user['groupid[]'] = explode('|', trim($user['groupid'], '|'));

        $inst->withData($user)->display();
    }
	
	/* public function add(){
		$view = View::getEngine('Html');
		// 显示部门名称信息
		$empModel = new EmpModel();
		$deptName = $empModel->getDeptName();
//\Cml\dump($deptName);
		$view->assign('dept_name', $deptName);
		$view->display('Oa/emp/add');
	} */
	
	
	/**
     * 保存用户
     *
     * @acljump web/Acl/Users/add|web/Acl/Users/edit
     *
     */
    public function save()
    {
        $data = [];
        $id = Input::postInt('id');
       // $id > 0 && (AclService::currentLoginUserIsHadPermisionToOpUser($id) || $this->renderJson(10100));//'您所有的用户组没有操作该用户[组]的权限!'

        $username = Input::postString('username');
        $data['email'] = Input::postString('email');
		$data['workno'] = Input::postString('workno');
		$data['leave'] = 0;
        $data['password'] = Input::postString('password');
        $data['checkpassword'] = Input::postString('checkpassword');
        $data['dept_id'] = Input::postInt('dept_id');
        $data['remark'] = Input::postString('remark', '');
		
		if(is_null($username)){
			$this->renderJson(-1, '用户名必须大于3小于20！');
		}
		
       /*  if ($data['groupid']) {
            $newGroupInfo = GroupsModel::getInstance()->mapDbAndTable()->whereIn('id', $data['groupid'])->plunk('name', 'id');

            foreach($newGroupInfo as $groupId => $groupName) {
                if (!AclService::currentLoginUserIsHadPermisionToOpGroup($groupId)) {
                    $this->renderJson(10100, "您所有的用户组没有权限将该用户的用户组设为【{$groupName}】!");
                }
            }
        } */

        if (!is_null($data['email'])) {
            if (mb_strlen($data['email']) < 3 || mb_strlen($data['email']) > 20) {
                $this->renderJson(-1, '邮箱长度必须大于3小于20！');
            }
        } else {
            unset($data['email']);
        }

        if (isset($data['password'])) {
            $data['password'] != $data['checkpassword'] && $this->renderJson(-1, '两次密码输入不正确，请重新输入！');
        } else {
            unset($data['password']);
        }

        unset($data['checkpassword']);

        if (is_null($data['password']) || empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = md5(md5($data['password']) . Config::get('password_salt'));
        }

        $empModel = new EmpModel();

       // $data['groupid'] = $data['groupid'] ? implode('|', $data['groupid']) : '';

        if (is_null($id)) {//新增
            //第三方登录挂载点
            $otherUserInfo = Plugin::hook('before_add_user_save', [$username]);
            //判断是否已有同名用户
            $equalName = $empModel->getUserName($username);
            $equalName && $this->renderJson(1, '用户名已存在');

            is_array($otherUserInfo) && $data = array_merge($data, $otherUserInfo);
            $data['username'] = $username;
            $data['created_at'] = date('Y-m-d H:i:s', Cml::$nowTime);
	//\Cml\dd($data['created_at']);
            $res = $empModel->setEmp($data);
          //  LogService::addActionLog("添加了用户" . json_encode($data, JSON_UNESCAPED_UNICODE));
        } else {
            $data['updated_at'] = date('Y-m-d H:i:s', Cml::$nowTime);

          //  LogService::addActionLog("修改了用户[{$id}]的信息" . json_encode($data, JSON_UNESCAPED_UNICODE));
	//\Cml\dump($data);
            $res = $empModel->updateByColumn($id, $data);
        }
        $this->renderJson($res ? 0 : 1);
    }
	
	
	/* // 新添加员工的处理
	public function store(){
		$emp = array("name"=>"", 
					  "email"=>"",
					  "workno"=>"",
					  "dept_name"=>'',
					  "password"=>'',
					  "leave"=>"",
					  "created_at"=>""
				);	
				
		$emp['name'] = \Cml\Http\Input::postString('name');
		$emp['email'] = \Cml\Http\Input::postString('email');
		$emp['workno'] = \Cml\Http\Input::postString('workno');
		$emp['dept_id'] = \Cml\Http\Input::postString('dept_id');
		$emp['password'] = \Cml\Http\Input::postString('password');
		$emp['leave'] = \Cml\Http\Input::postString('leave');
		$emp['created_at'] = date('Y-m-d H:i:s', time());
\Cml\dump($emp);

		// 写入数据库
		$empModel = new EmpModel();
		$empModel->setEmp($emp);
	} */
	
	public function edit(){
		$id = Input::getInt('id');

       // AclService::currentLoginUserIsHadPermisionToOpUser($id) || exit('您所有的用户组没有操作该用户[组]的权限!');

        $this->add(EmpModel::getInstance()->getByColumn($id));
	}
	
	
	public function del(){
		$id = Input::getInt('id');
        $id < 1 && $this->renderJson(1);
        $users = new EmpModel();

       // AclService::currentLoginUserIsHadPermisionToOpUser($id) || $this->renderJson(10100);

        if ($id === intval(Config::get('administratorid'))) {
            $this->renderJson(1, '不能删除超管');
        }

        if ($users->delByColumn($id)) {
            LogService::addActionLog("删除了用户[{$id}]");
            //删除对应的权限
            $accessModel = new AccessModel();
            $accessModel->delByColumn($id, 'userid');
            $this->renderJson(0);
        } else {
            $this->renderJson(1);
        }
	}
}