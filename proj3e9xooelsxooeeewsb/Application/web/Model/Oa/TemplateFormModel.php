<?php
namespace web\Model\Oa;

use Cml\Model;
use Cml\Vendor\Acl;

class TemplateFormModel extends Model
{
    protected $table = 'template_form';

    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }

	
	
	// 根据指定字段值获取同表的其他字段的值:根据id在另一个表中查找对应的中文名称等
	public function getFieldsInfo($template_id){
		
		return $this
				->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
				->columns($strColumnName)
				->where('template_id', $template_id)
				->select();
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
			
}