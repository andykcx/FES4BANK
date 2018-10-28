<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo \Cml\Config::get("system_name");?></title>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/plugins/layui/css/layui.css");?>" media="all" />
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/plugins/font-awesome/css/font-awesome.min.css");?>" media="all" />
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/build/css/app.css");?>" media="all" />
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/build/css/themes/green.css");?>" media="all" id="skin" kit-skin />
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


<blockquote class="layui-elem-quote">个人资料</blockquote>

<!-- /.box-header -->
<div class="layui-form-item">
    <table class="layui-table">
        <tbody>
        <tr>
            <th>用户id</th>
            <td><?php echo $user['id'];?></td>
        </tr>
        <tr>
            <th>用户名</th>
            <td><?php echo $user['username'];?></td>
        </tr>
        <tr>
            <th>昵称</th>
            <td><?php echo $user['nickname'];?></td>
        </tr>
        <tr>
            <th>用户组</th>
            <td><?php echo $user['groupname'];?></td>
        </tr>
        </tbody>
    </table>
</div>


</body>

<script type="text/javascript" src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/plugins/jquery-2.2.3.min.js");?>"></script>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/plugins/layui/layui.js");?>"></script>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/plugins/vue.min.js");?>"></script>




<script>
    var layui_base_url = '<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/build/js/");?>';
    layui.config({
        base: layui_base_url
    });
    //$ = layui.jquery;
 /*   $ = layui.$;
    jQuery = layui.$;*/
</script>



</html>