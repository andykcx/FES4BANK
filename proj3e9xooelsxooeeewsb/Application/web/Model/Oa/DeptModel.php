<?php
namespace web\Model\Oa;

use Cml\Model;
use Cml\Vendor\Acl;

class DeptModel extends Model
{
    protected $table = 'dept';

    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }

	/**
     * 取得全部部门信息
     *
     * @param int $limit
     *
     * @return array
     */
    public function getDeptNameList($limit = 20)
    {
        $userList = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->orderBy('id', 'asc')
					->paginate($limit);
		$userList = DeptModel::recursion($userList);
//\Cml\dump($userList);
        /* foreach($userList as &$item) {
            $item['groupid'] = explode(Acl::getMultiGroupDeper(), $item['groupid']);
            count($item['groupid']) > 0 && $item['name'] = GroupsModel::getInstance()->mapDbAndTable()->whereIn('id', $item['groupid'])->plunk('name');
        } */
        return $userList;
    }
	
	/**
     * 取得全部部门信息
     *
     * @param int $limit
     *
     * @return array
     */
    public function getAllDeptInfoOrderBy($limit = 20)
    {
        $userList = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->orderBy('id', 'asc')
					->paginate($limit);
		$userList = DeptModel::recursion($userList);
//\Cml\dump($userList);
        /* foreach($userList as &$item) {
            $item['groupid'] = explode(Acl::getMultiGroupDeper(), $item['groupid']);
            count($item['groupid']) > 0 && $item['name'] = GroupsModel::getInstance()->mapDbAndTable()->whereIn('id', $item['groupid'])->plunk('name');
        } */
        return $userList;
    }
	
	// 根据指定字段值获取同表的其他字段的值:根据id在另一个表中查找对应的中文名称等
	public function getDeptInfo($id){
		
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->columns($strColumnName)
				->where('id', $id)
				->getOne()[$strColumnName];
	}
	
	// 查询制定用户名的记录是否存在
	public function getDeptName($deptName){
		return $this->getByColumn($deptName, 'dept_name', $this->getTableName(), $this->tablePrefix);
	}
	
	// 取得全部dept_name 信息
	public function getAllDeptName(){
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->columns('id', 'dept_name')
				->select();
	}
			
	// 插入emp表数据
	// @arg array emp 员工信息数组
	// @return int int 成功标志
	public function setDept($dept){
		return $this
				->db()
				->set('dept', [
							  "dept_name"=>$dept['dept_name'], 
							  "pid"=>$dept['pid'], 
							  "director_id"=>$dept['director_id'], 
							  "manager_id"=>$dept['manager_id'], 
							  "created_at"=>$dept['created_at']
					]);
	}
	
	// 递归处理部门
    public static function recursion($depts,$html='├──',$pid=0,$level=0){

    	$data=[];
    	foreach($depts as $k=>$v){
    		if($v['pid']==$pid){
    			$v['dept_name'] = str_repeat($html, $level).$v['dept_name'];
                $v['level']=$level+1;
    			$data[]=$v;
    			unset($depts[$k]);
    			$data=array_merge($data,self::recursion($depts,$html,$v['id'],$level+1));
    		}
    	}
    	
    	return $data;
    }
	
}