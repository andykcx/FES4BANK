<?php
namespace web\Model\Acl;

use Cml\Model;
use Cml\Vendor\Acl;

class AppModel extends Model
{
    protected $table = 'admin_app';

    public function __construct()
    {
        //$this->table = Acl::getTableName('app');
    }
}