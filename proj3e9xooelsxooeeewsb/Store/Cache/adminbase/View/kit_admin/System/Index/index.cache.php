<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo \Cml\Config::get("system_name");?></title>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/plugins/layui/css/layui.css");?>" media="all"/>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/plugins/font-awesome/css/font-awesome.min.css");?>"
          media="all"/>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/build/css/app.css");?>" media="all"/>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/build/css/themes/green.css");?>" media="all" id="skin"
          kit-skin/>
</head>

<body class="kit-theme">
<div class="layui-layout layui-layout-admin kit-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><?php echo \Cml\Config::get("system_name");?></div>
        <div class="layui-logo kit-logo-mobile">K</div>
     <!--   <ul class="layui-nav layui-layout-left kit-nav">
            <?php if (is_array($app)) { foreach ($app as $item) { ?>
            <li class="layui-nav-item admin-app-list <?php echo $item['default'] ? 'layui-this' : '';?>">
                <a data-id="<?php echo $item['id'];?>" href="<?php \Cml\Http\Response::url("adminbase/System/Index/index/app/{$item['id']}");?>"><?php echo $item['name'];?></a>
            </li>
            <?php } } ?>
        </ul>-->

        <div class="layui-tab layui-layout-left kit-nav kit-nav-app">
            <ul class="layui-tab-title">
                <?php if (is_array($app)) { foreach ($app as $item) { ?>
                <li class="layui-nav-item admin-app-list <?php echo $item['default'] ? 'layui-this' : '';?>">
                    <a data-id="<?php echo $item['id'];?>" href="<?php \Cml\Http\Response::url("adminbase/System/Index/index/app/{$item['id']}");?>"><?php echo $item['name'];?></a>
                </li>
                <?php } } ?>
            </ul>
        </div>

        <ul class="layui-nav layui-layout-right kit-nav">
            <li class="layui-nav-item kit-nav-skin">
                <a href="javascript:;">
                    <i class="layui-icon">&#xe63f;</i> 皮肤</a>
                </a>
                <dl class="layui-nav-child skin">
                    <dd><a href="javascript:;" data-skin="default" style="color:#393D49;"><i
                            class="layui-icon">&#xe658;</i> 默认</a></dd>
                    <dd><a href="javascript:;" data-skin="orange" style="color:#ff6700;"><i
                            class="layui-icon">&#xe658;</i> 橘子橙</a></dd>
                    <dd><a href="javascript:;" data-skin="green" style="color:#00a65a;"><i
                            class="layui-icon">&#xe658;</i> 原谅绿</a></dd>
                    <dd><a href="javascript:;" data-skin="pink" style="color:#FA6086;"><i
                            class="layui-icon">&#xe658;</i> 少女粉</a></dd>
                    <dd><a href="javascript:;" data-skin="blue.1" style="color:#00c0ef;"><i
                            class="layui-icon">&#xe658;</i> 天空蓝</a></dd>
                    <dd><a href="javascript:;" data-skin="red" style="color:#dd4b39;"><i class="layui-icon">&#xe658;</i>
                        枫叶红</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <?php if ($user['from_type'] == 1) { ?>
                    <img src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/images/0.jpg");?>" class="layui-nav-img"/>
                    <?php } else { ?>
                    <img src="http://cs.101.com/v0.1/static/cscommon/avatar/<?php echo $user['username'];?>/<?php echo $user['username'];?>.jpg?size=80"
                         class="layui-nav-img"/>
                    <?php } ?>
                    <span class="top-nav-nickname"><?php echo $user['nickname'];?></span>
                </a>

                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" onclick="cml.form.edit('编辑个人资料', '<?php \Cml\Http\Response::url("adminbase/Acl/Users/editSelfInfo");?>',
                        '<?php \Cml\Http\Response::url("adminbase/Acl/Users/saveSelfInfo");?>');"><span>编辑个人资料</span></a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="<?php \Cml\Http\Response::url('adminbase/Public/logout');?>"><i class="fa fa-sign-out"
                                                                                      aria-hidden="true"></i> 注销</a>
            </li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black kit-side">
        <div class="layui-side-scroll">
            <div class="kit-side-fold"><i class="fa fa-navicon" aria-hidden="true"></i></div>
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>

            </ul>
        </div>
    </div>
    <div class="layui-body" id="container">
        <!-- <iframe src="<?php \Cml\Http\Response::url("adminbase/System/Index/index/type/1");?>"></iframe>-->
        <!-- 内容主体区域 -->
        <div style="padding: 15px;"><i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop">&#xe63e;</i>
            请稍等...
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        <p><?php echo date('Y');;?> &copy; nd</p>
    </div>
</div>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/plugins/layui/layui.js");?>"></script>

<script>
    var menu_url = "<?php \Cml\Http\Response::url('adminbase/System/Index/index/app');?>";
    var layui_base_url = '<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/build/js/");?>';
    var main_page_url = '<?php \Cml\Http\Response::url("adminbase/System/Index/index/type/1");?>';

    var message;
    layui.config({
        base: layui_base_url
    }).use(['app', 'message', 'layer', 'cml'], function () {
        var app = layui.app,
            $ = layui.jquery,
            layer = layui.layer;
            cml = layui.cml;
            cml.preLayerWidth = '500px';
            cml.layerWidth = '500px';
        //将message设置为全局以便子页面调用
        message = layui.message;
        //主入口
        app.set({
            type: 'iframe'
        }).init();

        $('dl.skin > dd').on('click', function () {
            var $that = $(this);
            var skin = $that.children('a').data('skin');
            switchSkin(skin);
        });
        var setSkin = function (value) {
                layui.data('kit_skin', {
                    key: 'skin',
                    value: value
                });
            },
            getSkinName = function () {
                return layui.data('kit_skin').skin;
            },
            switchSkin = function (value) {
                var _target = $('link[kit-skin]')[0];
                _target.href = _target.href.substring(0, _target.href.lastIndexOf('/') + 1) + value + _target.href.substring(_target.href.lastIndexOf('.'));
                setSkin(value);
            },
            initSkin = function () {
                var skin = getSkinName();
                switchSkin(skin === undefined ? 'green' : skin);
            }();
    });
</script>
</body>

</html>