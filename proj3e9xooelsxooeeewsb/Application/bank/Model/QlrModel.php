<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;

class QlrModel extends Model
{
    protected $table = 'qlr';

    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }

	/**
     * 取得不动产信息
     *
     * @param int $limit
     *
     * @return array
     */
    public function getSearchInfo($bdczh, $limit = 20)
    {
        $userList = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->where('bdczh', $bdcdyh)
					->paginate($limit);
        return $userList;
    }
	
	/**
     * 写入 
     *
     * @param array $tbQlr 
     * @return array
     */
    public function setQlrInfo($tbQlr)
    {
//\Cml\dump($tbQlr);
		foreach($tbQlr as $k => $v){
			if( !empty($this->getByColumn($tbQlr[$k]['qlrbh'], 'qlrbh')) ){
				return false;// 记录已存在
			}
			$this->db()
				 ->set('qlr', [
						'qlrbh' => $tbQlr[$k]['qlrbh'],
						'slbh' => $tbQlr[$k]['slbh'],
						'qzbh' => $tbQlr[$k]['qzbh'],
						'name' => $tbQlr[$k]['name'],
						'zjlx' => $tbQlr[$k]['zjlx'],
						'zjh' => $tbQlr[$k]['zjh'],
						'tel' => $tbQlr[$k]['tel']
					]);
		}
		return true;
    }
	
	//
	public function getSlbh($columnName, $value){
		return $List = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->columns('slbh')
					->where($columnName, $value)
					->paginate($limit);
	}

	public function delQlr($slbh){
		return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->delete();
	}
	
		/**
     * 查询 申请记录信息
     * @param int $slbh
     *
     * @return string $list
     */
    public function getQlrInfo($slbh)
    {
        return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->paginate($limit);
    }
}