<?php
namespace bank\Model;

use Cml\Model;

class OracleModel extends Model
{
    protected $table = 'test';

   
	

	public function getName(){
		
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
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
	
}