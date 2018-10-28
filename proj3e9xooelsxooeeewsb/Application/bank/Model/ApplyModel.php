<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;
use bank\Service\LockService;

class ApplyModel extends Model
{
    protected $table = 'apply';

    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }
	
	// 锁机制生成 一个编号
	public function buildCode()
	{
		//这边可能存在并发的情况，所以需要上锁
	
        $lockApplyKey = 'apply-lock-slbh';
        if (LockService::lockWait($lockApplyKey)) {//以这个用户名为锁
			$slbh = date('Ymd', time()) . time(); // 20180830+timestrap
            $isExist = $this->getByColumn($slbh, 'slbh');
            if ($isExist) {//已存在
                LockService::unLockWait($lockApplyKey);
                return -1;//在独占锁的状态下，该 编号仍已被生成。这是不可能的。
            }

            //校验通过
            //入库
            /* $this->db()
				 ->set('apply', [
						"slbh" => $slbh
					]); */
			
			LockService::unLockWait($lockApplyKey);
			return $slbh;
        }

        LockService::unLockWait($lockApplyKey);
        return 0;
	}
	/**
     * 查询 附件编号
     *
     * @param int $slbh
     *
     * @return string $fjbh
     */
    public function getFuJianInfo($slbh)
    {
        $fjbh = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->columns('fjbh')
					->where('slbh', $slbh)
					->getOne();
        return $fjbh;
    }
	
	/**
     * 查询 申请记录信息
     * @param int $slbh
     *
     * @return string $apply
     */
    public function getApplyInfo($slbh)
    {
        return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->getOne();
    }
	
	// 为首页面 提取信息 
	public function getApplyForSub($dyqrbh, $limit = 10){

		return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('dyqrbh', $dyqrbh)
			->orderBy('created_at', 'desc')
			->select(0, $limit);
	}
	
	/**
     * 查询指定的 受理编号 是否存在
     *
     * @param int $slbh
     *
     * @return array
     */
    public function checkId($slbh, $limit = 20)
    {
        $userList = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->where('slbh', $slbh)
					->paginate($limit);
        return $userList;
    }
	
	/**
     * 写入申请表信息
     *
     * @param array $arrApply 
     * @return array
     */
    public function setApplyInfo($arrApply)
    {
//\Cml\dump($arrApply);
		if( !empty($this->getByColumn($arrApply['slbh'], 'slbh')) ){
			return false;// 记录已存在
		}
        return $this->db()
				 ->set('apply', [
						'slbh' => $arrApply['slbh'],
						'qzbh' => $arrApply['qzbh'],
						'created_at' => $arrApply['created_at'],
						'dyqrbh' => $arrApply['dyqrbh'],
						'ywlx' => $arrApply['ywlx'],
						'dyfs' => $arrApply['dyfs'],
						'dyje' => $arrApply['dyje'],
						'dymj' => $arrApply['dymj'],
						'bdcjz' => $arrApply['bdcjz'],
						'dbfw' => $arrApply['dbfw'],
						'stime' => $arrApply['stime'],
						'etime' => $arrApply['etime'],
						'dysw' => $arrApply['dysw'],
						'slry' => $arrApply['slry'],
						'tzr' => $arrApply['tzr'],
						'tzdh' => $arrApply['tzdh'],
						'tzrdz' => $arrApply['tzrdz'],
						'tzbz' => $arrApply['tzbz'],
						'status' => $arrApply['status']
					]);
    }
	
	/**
     * 更新 apply表 状态信息
     *
     * @param string $slbh
     * @param string $status
	 * @param string $utime 最后更新时间
	 * @param string $bz 备注信息
     * @return array
     */
    public function updateApplyStatus($slbh, $status, $utime, $bz)
    {

        return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->update([
				'status' => $status,
				'utime' => $utime,
				'bz' => $bz
			]);
    }
	
	//
	public function delApply($slbh){
		//return $this->delByColumn($slbh, 'slbh', $this->getTableName(), $this->tablePrefix);

		return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->delete();
	}

}