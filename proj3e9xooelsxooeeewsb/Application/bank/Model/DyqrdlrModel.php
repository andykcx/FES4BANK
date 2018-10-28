<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;

class DyqrdlrModel extends Model
{
    protected $table = 'dyqr_dlr';

	
	/**
     * 写入代理人信息
     *
     * @param int $dyqrbh 抵押权人编号
     * @param array $arrDlr 代理人信息
     * @return array
     */
    public function setDlrInfo($arrDlr)
    {
		foreach($arrDlr as $k => $v){
		if( !empty($this->getByColumn($arrDlr[$k]['slbh'], 'slbh')) ){
			return false;// 代理人已存在
		}
        return $this->db()
				 ->set('dyqr_dlr', [
						'dlrbh' => $arrDlr[$k]['dlrbh'],
						'dyqrbh' => $arrDlr[$k]['dyqrbh'],
						'slbh' => $arrDlr[$k]['slbh'],
						'name' => $arrDlr[$k]['name'],
						'zjlx' => $arrDlr[$k]['zjlx'],
						'zjh' => $arrDlr[$k]['zjh'],
						'tel' => $arrDlr[$k]['tel']
					]);
		}
		return true;
    }
	
	public function delDlr($slbh){
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
    public function getDlrInfo($slbh)
    {
        return $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->where('slbh', $slbh)
					->paginate($limit);
    }
}