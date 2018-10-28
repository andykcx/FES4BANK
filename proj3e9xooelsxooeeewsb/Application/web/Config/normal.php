<?php
/* * *********************************************************
* 配置文件
* @Author  kechangxu
* @Date: 2018/7/16 
* *********************************************************** */

return [
    'html_theme' => 'liyang',
    'page_num' => 15,
    'oss_login' => true,//是否单点登录
    'upload_path' => CML_PROJECT_PATH . DIRECTORY_SEPARATOR . 'public/uploads',
    'upload_into_db_prefix' => '/uploads',
    'administratorid' => 1,//后台超级管理员id
    'log_unset_field' => [//记录操作日志时不记录敏感数据的日志，要unset掉post中相关的参数
        'pwd',
        'oldpwd',
        'repwd',
        'password',
        'checkpassword'
    ],
    'password_salt' => 'xebx-elheifn-xhfelk',//后台账号密码salt key
    'menu_icon' => [
        'liyang' => ['fa-dashboard', 'fa-comment', 'fa-table', 'fa-flash', 'fa-sitemap', 'fa-umbrella', 'fa-paste', 'fa-hand-spock-o', 'fa-hashtag', 'fa-heart-o'],
    ],
    'default_app' => 3,//默认载入的app的菜单
    'system_name' => '北斗测绘xx平台',
];
