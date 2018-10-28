<?php
namespace bank\Model\Acl;

use Cml\Model;
use Cml\Vendor\Acl;

class UsersModel extends Model
{
    protected $table = 'admin_users';

    public function __construct()
    {
        $this->table = Acl::getTableName('users');
    }

    /**
     * 获取数据的总数
     *
     * @param string $pkField 主键的字段名
     * @param string $tableName 表名 不传会自动从当前Model中$table属性获取
     * @param mixed $tablePrefix 表前缀 不传会自动从当前Model中$tablePrefix属性获取再没有则获取配置中配置的前缀
     *
     * @return mixed
     */
    public function getTotalNums($pkField = 'id', $tableName = null, $tablePrefix = null)
    {
        return $this->db($this->getDbConf())->table([$this->table => 'u'])->count($pkField);
    }

    /**
     * 获取用户列表
     *
     * @param int $limit
     *
     * @return array
     */
    public function getUsersList($limit = 20)
    {
        $userList = $this->db()->table([$this->table => 'u'])
            ->columns('u.*')
            //->where('u.status', 1)
            ->orderBy('id', 'asc')
            ->paginate($limit);
        foreach($userList as &$item) {
            $item['groupid'] = explode(Acl::getMultiGroupDeper(), $item['groupid']);
            count($item['groupid']) > 0 && $item['name'] = GroupsModel::getInstance()->mapDbAndTable()->whereIn('id', $item['groupid'])->plunk('name');
        }
        return $userList;
    }
}