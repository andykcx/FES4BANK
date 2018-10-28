<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;

class FjModel extends Model
{
    protected $table = 'fj';

    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }
	
	
	/**
     * 查询指定的 附件编号 是否存在
     *
     * @param int $slbh
     *
     * @return array
     */
    public function getFuJianInfo($slbh)
    {
//\Cml\dd($slbh);
        return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->getOne();
    }

	/**
     * 更新指定 列的数据
     *
     * @param int $slbh
     * @param array $arrFuJian
     * @return array
     */
    public function updateFuJianInfo($slbh, $cloumnName, $cloumnValue = '')
    {
//\Cml\dd($cloumnName);
		// 先取得已有数据，然后添加在尾部 file1;file2;...
		if(!empty($cloumnValue)){
			$arrTmp = $this->getByColumn($slbh, 'slbh');
			
			return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->update([
				$cloumnName => $arrTmp[$cloumnName] . $cloumnValue
			]);
		}else{	// 清空指定 目录的数据
			return	$this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->update([
				$cloumnName => ''
			]); 
		} 
    }
	
		/**
     * fj 
     *
     * @param array $tbFj 
     * @return array
     */
    public function setFjInfo($arrFj)
    {
//\Cml\dump($arrFj);
		if( !empty($this->getByColumn($arrFj['slbh'], 'slbh')) ){
			return false;// 记录已存在
		}
		$this->db()
			 ->set('fj', [
					'slbh' => $arrFj['slbh'],
					'djsqs' => $arrFj['djsqs'],
					'sqrzj' => $arrFj['sqrzj'],
					'dyht' => $arrFj['dyht'],
					'jkht' => $arrFj['jkht'],
					'sqwts' => $arrFj['sqwts'],
					'gzs' => $arrFj['gzs'],
					'zxh' => $arrFj['zxh'],
					'others' => $arrFj['others']
				]);
		return true;
    }

	public function delFj($slbh){
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
    public function getFjInfo($slbh)
    {
        return $this
			->db($this->getDbConf())
			->table($this->getTableName(), $this->tablePrefix)
			->where('slbh', $slbh)
			->getOne();
    }
}