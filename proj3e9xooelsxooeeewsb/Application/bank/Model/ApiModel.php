<?php
namespace bank\Model;

use Cml\Model;
use Cml\Vendor\Acl;

class ApiModel extends Model
{
    protected $table = 'qz';

    public function __construct()
    {
       // $this->table = Acl::getTableName('access');
    }

	/**
     * 根据  不动产证号, 不动产单元号,抵押人名称,抵押人证件号码 取得相关权证信息记录
	 *
     * @param string $bdczh 
     * @param int $limit
     *
     * @return array
     */
    public function getQzInfo($bdczh, $bdcdyh, $name, $zjh)
    {
        // 生产json接口
		// 调用api接收模块
		// 数据保存及显示
    }

}