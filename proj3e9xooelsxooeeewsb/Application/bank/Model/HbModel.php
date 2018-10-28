<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;

class HbModel extends Model
{
    protected $table = 'hb';

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
					->where('bdzdyh', $bdcdyh)
					->paginate($limit);
        return $userList;
    }

	/**
     * 写入hb 
     *
     * @param array $arrHb 
     * @return array
     */
    public function setHbInfo($arrHb)
    {
//\Cml\dump($arrHb);
		foreach($arrHb as $k => $v){
			if( !empty($this->getByColumn($arrHb[$k]['hbh'], 'hbh')) ){
				return false;// 记录已存在
			}
			$this->db()
				 ->set('hb', [
						'slbh' => $arrHb[$k]['slbh'],
						'hbh' => $arrHb[$k]['hbh'],
						'bdcdyh' => $arrHb[$k]['bdcdyh'],
						'qzbh' => $arrHb[$k]['qzbh'],
						'zl' => $arrHb[$k]['zl'],
						'jzmj' => $arrHb[$k]['jzmj'],
						'dysw' => $arrHb[$k]['dysw'],
						'xzxx' => $arrHb[$k]['xzxx']
					]);
		}
		return true;
    }
	
	/**
     * 查询 申请记录信息
     * @param int $slbh
     *
     * @return string $list
     */
    public function getHbInfo($slbh)
    {
        return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->paginate($limit);
    }
	
	public function delHb($slbh){
		return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->delete();
	}
}