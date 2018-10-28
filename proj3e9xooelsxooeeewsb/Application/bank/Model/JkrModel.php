<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;

class JkrModel extends Model
{
    protected $table = 'jkr';

	
	/**
     * 写入代理人信息
     *
     * @param int $dyqrbh 抵押权人编号
     * @param array $arrJkr 代理人信息
     * @return array
     */
    public function setJkrInfo($arrJkr)
    {
//\Cml\dump($arrJkr);
		foreach($arrJkr as $k => $v){
			if( !empty($this->getByColumn($arrJkr[$k]['slbh'], 'slbh')) ){
				return false;// 代理人已存在
			}
			$this->db()
					 ->set('jkr', [
							'slbh' => $arrJkr[$k]['slbh'],
							'jkrbh' => $arrJkr[$k]['jkrbh'],
							'name' => $arrJkr[$k]['name'],
							'zjlx' => $arrJkr[$k]['zjlx'],
							'zjh' => $arrJkr[$k]['zjh'],
							'tel' => $arrJkr[$k]['tel']
						]);
		}
		return true;
    }
	
	//
	public function getSlbh($columnName, $value){
				$List = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->columns('slbh')
					->where($columnName, $value)
					->paginate($limit);

		return $List;
	}
	
	public function delJkr($slbh){
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
    public function getJkrInfo($slbh)
    {
        return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->paginate($limit);
    }
	
}