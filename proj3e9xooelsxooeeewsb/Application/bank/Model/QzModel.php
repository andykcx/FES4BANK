<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;

class QzModel extends Model
{
    protected $table = 'qz';

    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }

	/**
     * 根据  不动产证号  取得相关信息记录
	 *
     * @param string $bdczh 
     * @param int $limit
     *
     * @return array
     */
    public function getQzInfo($bdczh, $limit = 20)
    {
        $userList = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->whereLike('bdczh', true, $bdczh, true)
					->paginate($limit);
        return $userList;
    }
		/**
     * 查询 申请记录信息
     * @param int $slbh
     *
     * @return string $list
     */
    public function getQzInfoById($slbh)
    {
        return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->getOne();
    }
	
	/**
     * 写入qz
     *
     * @param array $arrQz 
     * @return array
     */
    public function setQzInfo($arrQz)
    {
		if( !empty($this->getByColumn($arrQz['slbh'], 'slbh')) ){
			return false;// 记录已存在
		}
        return $this->db()
				 ->set('qz', [
						'qzbh' => $arrQz['qzbh'],
						'slbh' => $arrQz['slbh'],
						'bdczh' => $arrQz['bdczh'],
						'zjlx' => $arrQz['zjlx']
					]);
    }
	
	public function delQz($slbh){
		return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->delete();
	}
	
	
}