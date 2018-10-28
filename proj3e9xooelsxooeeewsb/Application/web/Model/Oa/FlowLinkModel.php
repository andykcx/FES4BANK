<?php
namespace web\Model\Oa;

use Cml\Model;
use Cml\Vendor\Acl;

class FlowLinkModel extends Model
{
    protected $table = 'flowlink';

						  
    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }
	
	// 
	public function getName($process_id, $flow_id, $type = 'Condition')
	{
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->where('process_id', $process_id)
				->where('flow_id', $flow_id)
				->where('type', $type)
				->getOne();
	}
	
	// 获取全部的符合条件的 next_process_id 集合
	public function getAllNextProcessId($process_id, $flow_id, $type = 'Condition')
	{
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->where('process_id', $process_id)
				->where('flow_id', $flow_id)
				->where('type', $type)
				->plunk('next_process_id');
	}
	// 获取全部的符合条件的 auditor 集合
	public function getAuditors($process_id)
	{
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->where('process_id', $process_id)
				->where('type', 'Emp')
				->plunk('auditor');
	}

	// 获取备选步骤
	// flow_id ,type = Condition, processId, next_process != processId
	public function getBeiXuanProcess($flow_id, $type = 'Condition', $processId, $next_process_id)
	{
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->where('flow_id', $flow_id)
				->where('type', $type)
				->whereNot('process_id', $processId)
				->whereNotIn('process_id', $next_process_id)
				->select();
	}
	
	// 删除指定id的记录
	// @param int flowId 
	// @param int processId
	// @return int int 成功标志
	
	public function delFlowLink($flowId, $processId){
		return $this
				->db()
				->table($this->getTableName(), $this->tablePrefix)
				->where('flow_id', $flowId)
				->where('process_id', $processId)
				->delete();
	}
	
	// 
	// @param int flowId 
	// @param int nextprocessId
	// return int int 成功标志
	public function updateFlowLink($flowId, $nextprocessId)
	{
		return $this
				->db()
				->table($this->getTableName(), $this->tablePrefix)
				->where('flow_id', $flowId)
				->where('next_process_id', $nextprocessId)
				->update('flowlink', ['next_process_id'=>-1]);
	}
}