<?php
namespace web\Model\Oa;

use Cml\Model;
use Cml\Vendor\Acl;

class TemplateModel extends Model
{
    protected $table = 'template';

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
    public function getTemplateNameList($limit = 20)
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
	public function getTemplateInfo($id){
		
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->columns($strColumnName)
				->where('id', $id)
				->getOne();
	}
	
	// 查询制定用户名的记录是否存在
	public function getTemplateName($FlowName){
		return $this->getByColumn($FlowName, 'flow_name', $this->getTableName(), $this->tablePrefix);
	}
	
	// 取得全部flow_name 信息
	public function getAllTemplateName(){
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->columns('id', 'template_name')
				->select();
	}
			
	// 插入emp表数据
	// @arg array emp 员工信息数组
	// @return int int 成功标志
	public function setTemplate($Template){
		return $this
				->db()
				->set('Template', [
							  "flow_name"=>$Template['flow_name'], 
							  "pid"=>$Template['pid'], 
							  "director_id"=>$Template['director_id'], 
							  "manager_id"=>$Template['manager_id'], 
							  "created_at"=>$Template['created_at']
					]);
	}
	
	// 递归处理部门
    public static function recursion($Template,$html='├──',$pid=0,$level=0){

    	$data=[];
    	foreach($Template as $k=>$v){
    		if($v['pid']==$pid){
    			$v['flow_name'] = str_repeat($html, $level).$v['flow_name'];
                $v['level']=$level+1;
    			$data[]=$v;
    			unset($Template[$k]);
    			$data=array_merge($data,self::recursion($Template,$html,$v['id'],$level+1));
    		}
    	}
    	
    	return $data;
    }
	
}