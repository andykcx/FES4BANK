<?php
namespace web\Model\Oa;

use Cml\Model;
use Cml\Vendor\Acl;

class EmpModel extends Model
{
    protected $table = 'emp';

    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }

	
	/**
     * 取得全部员工信息
     *
     * @param int $limit
     *
     * @return array
     */
    public function getUsersList($limit = 20)
    {
//\Cml\dd('ddd');
        $userList = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->orderBy('id', 'asc')
					->paginate($limit);
//\Cml\dump($userList);
        /* foreach($userList as &$item) {
            $item['groupid'] = explode(Acl::getMultiGroupDeper(), $item['groupid']);
            count($item['groupid']) > 0 && $item['name'] = GroupsModel::getInstance()->mapDbAndTable()->whereIn('id', $item['groupid'])->plunk('name');
        } */
        return $userList;
    }
	
	// 根据指定字段值获取同表的其他字段的值:根据id在另一个表中查找对应的中文名称等
	public function getName($id, $strColumnName, $strTableName){
		
		return $this
				->db($this->getDbConf())
				->table($strTableName, $this->tablePrefix)
				->columns($strColumnName)
				->where('id', $id)
				->getOne()[$strColumnName];
	}
	
	// 查询制定用户名的记录是否存在
	public function getUserName($username){
		return $this->getByColumn($username, 'username', $this->getTableName(), $this->tablePrefix);
	}
	
	// 取得dept_name 信息
	public function getDeptName(){
		return $this
				->db($this->getDbConf())
				->table('dept', $this->tablePrefix)
				->columns('id', 'dept_name')
				->select();
	}
	// 
	public function getEmpsInfo($id){
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->where('id', $id)
				->plunk('id');
	}
	
	// 插入emp表数据
	// @arg array emp 员工信息数组
	// @return int int 成功标志
	public function setEmp($emp){
		// 判断员工是否已存在
		// 密码加密
		return $this
				->db()
				->set('emp', [
							  "username"=>$emp['username'], 
							  "email"=>$emp['email'], 
							  "workno"=>$emp['workno'], 
							  "dept_id"=>$emp['dept_id'], 
							  "password"=>$emp['password'], 
							  "leave"=>$emp['leave'], 
							  "remark"=>$emp['remark'],
							  "created_at"=>$emp['created_at']
					]);
	}
}