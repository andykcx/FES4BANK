<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo \Cml\Config::get("system_name");?></title>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/css/layui.css");?>" media="all"/>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/font-awesome/css/font-awesome.min.css");?>"
          media="all"/>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/build/css/app.css");?>" media="all"/>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/build/css/themes/green.css");?>" media="all" id="skin"
          kit-skin/>
</head>

<body class="kit-theme">
<div class="layui-layout layui-layout-admin kit-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><?php echo \Cml\Config::get("system_name");?></div>

        <ul class="layui-nav layui-layout-right kit-nav">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <?php if ($user['from_type'] == 1) { ?>
                    <img src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/images/0.jpg");?>" class="layui-nav-img"/>
                    <?php } else { ?>
                    <img src="http://cs.101.com/v0.1/static/cscommon/avatar/<?php echo $user['username'];?>/<?php echo $user['username'];?>.jpg?size=80"
                         class="layui-nav-img"/>
                    <?php } ?>
                    <span class="top-nav-nickname"><?php echo $user['nickname'];?></span>
                </a>

                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" onclick="cml.form.edit('编辑个人资料', '<?php \Cml\Http\Response::url("bank/Acl/Users/editSelfInfo");?>',
                        '<?php \Cml\Http\Response::url("bank/Acl/Users/saveSelfInfo");?>');"><span>编辑个人资料</span></a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="<?php \Cml\Http\Response::url('bank/Public/logout');?>"><i class="fa fa-sign-out"
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
        <!-- <iframe src="<?php \Cml\Http\Response::url("bank/Index/index/type/1");?>"></iframe>-->
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
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/layui.js");?>"></script>

<script>
    var menu_url = "<?php \Cml\Http\Response::url('bank/Index/index/app');?>";
    var layui_base_url = '<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/build/js/");?>';
    var main_page_url = '<?php \Cml\Http\Response::url("bank/Index/sub/type/1");?>';
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