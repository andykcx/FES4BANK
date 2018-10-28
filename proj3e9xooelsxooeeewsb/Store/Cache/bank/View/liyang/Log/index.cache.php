<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title></title>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/css/layui.css");?>" media="all"/>

</head>

<body class="">
<div class="layui-layout layui-layout-admin kit-layout-admin">

    <div class="layui-body" id="container">
        <!-- <iframe src="<?php \Cml\Http\Response::url("bank/Index/index/type/1");?>"></iframe>-->
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            暂不提供...
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        <p><?php echo date('Y');;?> &copy; nd</p>
    </div>
</div>

</body>

</html>