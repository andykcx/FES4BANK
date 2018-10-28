<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;

class UserModel extends Model
{
    protected $table = 'admin_users';

	
	//
	public function setUserInfo($arrUser){
		
		return $this->db()
				 ->set('admin_users', [
						'dyqrbh' => $arrUser['dyqrbh'],
						'ctime' => $arrUser['ctime'],
						'pid' => $arrUser['pid'],
						'groupid' => $arrUser['groupid'],
						'company' => $arrUser['company'],
						'username' => $arrUser['username'],
						'nickname' => $arrUser['nickname'],
						'password' => $arrUser['password'],
						'zjlx' => $arrUser['zjlx'],
						'zjh' => $arrUser['zjh'],
						'addr' => $arrUser['addr'],
						'tel' => $arrUser['tel'],
						'email' => $arrUser['email'],
						'lxr' => $arrUser['lxr'],
						'beizhu' => $arrUser['beizhu']
					]);
	}
	
	/**
     * 查询指定 dyqrbh
     *
     * @param int $username
     *
     * @return array
     */
	public function getDyqrbh($id){

		return $this->getByColumn($id, 'id');

	}
	
	/**
     * 查询指定 名称 是否存在
     *
     * @param int $username
     *
     * @return array
     */
    public function getUserInfo($username)
    {
		return $this->getByColumn($username, 'username');
    }
	
	public function getDyqrInfoForList($name, $zjh, $limit=10){
		if(empty($name) && empty($zjh)){
			return;
		}
		
		return  $this->db($this->getDbConf())
				->table($this->getTableName(), $this->tablePrefix)
			  ->lBrackets()
					->whereLike('company', true, $name, true)
				->rBrackets()
				->_or()
				->lBrackets()
					->whereLike('nickname', true, $name, true)
				->rBrackets()
				->_or()
				->lBrackets()
					->whereLike('zjh', true, $zjh, true)
				->rBrackets()
				->paginate($limit);
	}
}
