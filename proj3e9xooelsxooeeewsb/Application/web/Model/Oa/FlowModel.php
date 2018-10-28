<?php
namespace web\Model\Oa;

use Cml\Model;
use Cml\Vendor\Acl;

class FlowModel extends Model
{
    protected $table = 'flow';

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
    public function getFlowNameList($limit = 20)
    {
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
	public function getName($id){
		
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->where('id', $id)
				->getOne();
	}
	
	// 查询指定ID的记录是否存在
	public function getRecordById($id){
		return $this->getByColumn($id, 'id', $this->getTableName(), $this->tablePrefix);
	}
	
	// 取得全部Flow_name 信息
	public function getAllFlowName(){
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->columns('id', 'flow_name')
				->select();
	}
			
	// 插入表数据
	// @arg array emp 员工信息数组
	// @return int int 成功标志
	public function setFlow($Flow){
//\Cml\dump($flow);
		return $this
				->db()
				->set('flow', [
							  "flow_name"=>$Flow['flow_name'], 
							  "flow_no"=>$Flow['flow_no'], 
							  "template_id"=>$Flow['template_id'], 
							  "jsplumb"=>$Flow['jsplumb'],
							  "type_id"=>$Flow['type_id'],
							  "is_publish"=>$Flow['is_publish'],
							  "created_at"=>$Flow['created_at']
					]);
	}
	
		// 更新表数据
	// @param $id int 指定的id
	// @param $data array  需要更新的数据
	// @return int int 成功标志
	public function updateFlow($id, $data){
//\Cml\dump($data);
//\Cml\dd($id);
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->where('id', $id)
				->update('flow', [
							  "jsplumb"=>$data['jsplumb'],
							  "updated_at"=>$data['updated_at']
					]);
	}
}