<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;

class SearchModel extends Model
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
    public function getSearchInfo($bdczh, $bdcdyh, $qlr, $zjh, $limit = 20)
    {
        $userList = $this
					->db($this->getDbConf())
					->table($this->getTableName(), $this->tablePrefix)
					->where('bdcdyh', $bdcdyh)
					->orderBy('bdczh', 'asc')
					->paginate($limit);
        return $userList;
    }

}