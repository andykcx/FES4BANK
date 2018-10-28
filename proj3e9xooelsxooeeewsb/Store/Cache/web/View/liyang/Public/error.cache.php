<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo \Cml\Config::get("system_name");?></title>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("web/liyang/plugins/layui/css/layui.css");?>" media="all" />
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("web/liyang/plugins/font-awesome/css/font-awesome.min.css");?>" media="all" />
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("web/liyang/build/css/app.css");?>" media="all" />
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("web/liyang/build/css/themes/green.css");?>" media="all" id="skin" kit-skin />
    <style>
        .forum-common {
            padding: 6px 15px;
        }

        .show_page {
            display: inline-block;
            line-height: 24px;
        }

        .page_bar {
            line-height:55px;
            min-height: 55px;
            width: 100%;
            background-color: #fbfbfb;
            border-bottom: 1px solid rgb(221, 221, 221);
        }

        .tot-num{color:red;font-weight: bold;display:inline-block;}

        .template {display:none;}
        .data_form_box {word-break: break-all;word-wrap: break-word;}
        .layui-btn+.layui-btn {margin-top:1px;margin-bottom: 1px;}
        .layui-elem-field  button.layui-btn {margin-left:5px;}
        .hide {display:none;}
    </style>
    
</head>

<body>

<h2 class="cont-tit">
    <span>首页&gt;</span>
    <span class="name"><?php echo $title;?></span>
</h2>
<div class="user-manage" style="overflow: hidden; outline: none;">
    <div class="sea-all clearfix">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>错误提示</h5>
                    </div>
                    <div class="widget-content">
                        <div class="error_ex">
                            <h1><?php echo $code;?></h1>
                            <h3><?php echo $msg;?></h3>
                            <p>Access to this page is forbidden</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script type="text/javascript" src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("web/liyang/plugins/jquery-2.2.3.min.js");?>"></script>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("web/liyang/plugins/layui/layui.js");?>"></script>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("web/liyang/plugins/vue.min.js");?>"></script>




<script>
    var layui_base_url = '<?php echo \Cml\Tools\StaticResource::parseResourceUrl("web/liyang/build/js/");?>';
    layui.config({
        base: layui_base_url
    });
    //$ = layui.jquery;
 /*   $ = layui.$;
    jQuery = layui.$;*/
</script>



</html>