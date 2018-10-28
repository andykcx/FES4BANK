<?php
namespace web\Model\Oa;

use Cml\Model;
use Cml\Vendor\Acl;

class ProcessModel extends Model
{
    protected $table = 'process';

	/* protected $fillable=['flow_id',
						  'process_name',
						  'limit_time',
						  'type','icon',
						  'description',
						  'style',
						  'style_color',
						  'style_height',
						  'style_width',
						  'position_left',
						  'position_top',
						  'position',
						  'child_flow_id',
						  'child_after',
						  'child_back_process'
						  ]; */
						  
    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }

	// 根据指定字段值获取同表的其他字段的值:根据id在表中查找对应的中文名称等
	// @return int/array 指定id的记录(集)
	public function getProcessInfo($id){
		if(is_array($id)){
//\Cml\dump($id);
			return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->columns('id', 'process_name')
				->whereIn('id', $id)
				->select();
		}
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->where('id', $id)
				->getOne();
	}
			
	// 插入表数据
	// @arg array emp 员工信息数组
	// @return int int 成功标志
	public function setProcess($process){
		return $this
				->db()
				->set('process', [
							  "flow_id"=>$process['flow_id'], 
							  "process_name"=>$process['process_name'], 
							  "style"=>$process['style'],
							  "style"=>$process['style'],
							  "position_left"=>$process['position_left'],
							  "position_top"=>$process['position_top'],
							  "created_at"=>$process['created_at']
					]);
	}
	
	// 删除制定id的记录
	// @param int processId 
	// @param int flowId
	// @return int int 成功标志
	public function delProcess($processId, $flowId){
		return $this
				->db()
				->table($this->getTableName(), $this->tablePrefix)
				->where('id', $processId)
				->where('flow_id', $flowId)
				->delete();
	}
	
}