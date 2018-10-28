<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;

class ZjlxModel extends Model
{
    protected $table = 'zjlx';
	
	//
	public function getZjlxInfoCanShow($limit = 20){
				$List = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->whereNot('flag', 1)
					->paginate($limit);

		return $List;
	}
	
	//
	public function getZjlxInfoById($code){

				$List = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->columns('name')
					->where('code', $code)
					->getOne();

		return $List;
	}
}