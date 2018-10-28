<?php
//配置文件
defined('CML_PATH') || exit();

$config = [
    'debug' => true,
    'default_db' => [
        'driver' => 'MySql.Pdo', //数据库驱动
        'master' => [
            'host' => '127.0.0.1', //数据库主机
            'username' => 'root', //数据库用户名
            'password' => 'root', //数据库密码
            'dbname' => 'fes4bank', //数据库名
            'charset' => 'utf8mb4', //数据库编码
            'tableprefix' => 'pr_', //数据表前缀
            'pconnect' => false, //是否开启数据库长连接
            'engine' => ''//数据库引擎
        ],
        'slaves' => [],
        'cache_expire' => false,//查询数据缓存时间
    ],
	
	/* 'db_oracle' => [
        'driver' => 'Oracle.Pdo', //数据库驱动
        'master' => [
            'host' => '192.168.0.3:1521',
            'username' => 'system',
            'password' => 'oracle',
            'dbname' => 'XE',// 数据库名 lzbdcsvr
            'tablespace' => 'test', //表空间名 CSGXK
            'tableprefix' => '', //数据表前缀
            'pconnect' => false //是否开启数据库长连接
        ],
        'slaves'=>[],
    ], */
    // 缓存服务器的配置
    'default_cache' => [
        'on' => 1, //为1则启用，或者不启用
        'driver' => 'File',
        'prefix' => 'lbx_',
        /*'server' => [
            [
                'host' => '192.168.19.215',
                'port' => '6379',
                'password' => '',

            ],
            //多台...
        ],*/
    ],
];
return $config;