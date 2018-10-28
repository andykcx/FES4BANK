<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;
use bank\Service\LockService;

class dyqrModel extends Model
{
    protected $table = 'dyqr';

    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }
	
	// 锁机制生成 一个编号
	public function buildCode()
	{
		//这边可能存在并发的情况，所以需要上锁
	
        $lockDyqrKey = 'dyqr-lock-dyqrbh';
        if (LockService::lockWait($lockDyqrKey)) {//以这个用户名为锁
			$dyqrbh = date('Ymd', time()) . time(); // 20180830+timestrap
            $isExist = $this->getByColumn($dyqrbh, 'dyqrbh');
            if ($isExist) {//已存在
                LockService::unLockWait($lockDyqrKey);
                return -1;//在独占锁的状态下，该 编号仍已被生成。这是不可能的。
            }

            //校验通过
            //入库
            /* $this->db()
				 ->set('dyqr', [
						"dyqrbh" => $dyqrbh
					]); */
			
			LockService::unLockWait($lockDyqrKey);
			return $dyqrbh;
        }

        LockService::unLockWait($lockDyqrKey);
        return 0;
	}
	/**
     * 写入抵押权人流水表信息
     *
     * @param array $arrDyqr 抵押权人信息
     * @return array
     */
	public function setDyqrInfo($arrDyqr){
//\Cml\dump($arrDyqr);
		if( !empty($this->getByColumn($arrDyqr['slbh'], 'slbh')) ){
			return false;// 暂定一个受理编号只有一个抵押权人
		}
		return $this->db()
				 ->set('dyqr', [
						'dyqrbh' => $arrDyqr['dyqrbh'],
						'slbh' => $arrDyqr['slbh'],
						'name' => $arrDyqr['name'],
						'zjlx' => $arrDyqr['zjlx'],
						'zjh' => $arrDyqr['zjh'],
						'tel' => $arrDyqr['tel']
					]);
	}
	/**
     * 写入代理人信息
     *
     * @param int $dyqrbh 抵押权人编号
     * @param array $arrDlr 代理人信息
     * @return array
     */
    public function setDlrInfo($arrDlr)
    {
		if( !empty($this->getByColumn($arrDlr['name'], 'name')) ){
			return false;// 代理人已存在
		}
        return $this->db()
				 ->set('dyqr', [
						'dlrbh' => $arrDlr['dlrbh'],
						'dyqrbh' => $arrDlr['dyqrbh'],
						'name' => $arrDyqr['name'],
						'zjlx' => $arrDyqr['zjlx'],
						'zjh' => $arrDyqr['zjh'],
						'tel' => $arrDyqr['tel']
					]);
    }
	
	/**
     * 查询指定 userid 的记录
     *
     * @param int $userId
     *
     * @return array
     */
    public function getUserInfo($userId)
    {
        return $this->getByColumn($userId, 'userId');
    }
	
	/**
     * 查询指定 名称 是否存在
     *
     * @param string $name
     *
     * @return array
     */
    public function getDyqrInfo($name)
    {
        return $this->getByColumn($name, 'name');
    }
		/**
     * 查询 申请记录信息
     * @param int $slbh
     *
     * @return string $list
     */
    public function getDyqrInfoById($slbh)
    {
        $list = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->where('slbh', $slbh)
					->getOne();
        return $list;
    }
	
	public function delDyqr($slbh){
		return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->delete();
	}
}