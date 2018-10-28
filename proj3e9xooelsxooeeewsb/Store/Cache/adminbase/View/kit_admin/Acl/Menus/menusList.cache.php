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


<style>
    [class^="icon-"],
    [class*=" icon-"] {
        display: inline-block;
        width: 14px;
        height: 14px;
        margin-top: 1px;
        *margin-right: .3em;
        line-height: 14px;
        vertical-align: text-top;
        background-image: url("<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/images/glyphicons-halflings.png");?>");
        background-position: 14px 14px;
        background-repeat: no-repeat;
    }
    .icon-folder-open {
        width: 16px;
        background-position: -408px -120px;
    }
    .icon-minus-sign {
        background-position: -24px -96px;
    }
    .menu_list ul, .menu_list ol {padding: 0;margin-left: 25px;}
    h1,h2,h3,h4,h5,h6 {font-size: 100%; font-family: "MicroSoft YaHei";line-height:0;}
    input[type="radio"], input[type="checkbox"]{margin:0;margin-right:7px;}
    body{background-color:#f1f2f7;padding:0;margin:0;}
    .tree{min-height:20px;padding:19px;margin-bottom:20px;background-color:#fbfbfb;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.05);-moz-box-shadow:inset 0 1px 1px rgba(0,0,0,0.05);box-shadow:inset 0 1px 1px rgba(0,0,0,0.05)}.tree li{list-style-type:none;margin:0;padding:10px 5px 0 5px;position:relative}.tree li::before,.tree li::after{content:'';left:-20px;position:absolute;right:auto}.tree li::before{border-left:1px solid #999;bottom:50px;height:100%;top:0;width:1px}.tree li::after{border-top:1px solid #999;height:20px;top:25px;width:25px}.tree li span{-moz-border-radius:5px;-webkit-border-radius:5px;border:1px solid #999;border-radius:5px;display:inline-block;padding:3px 8px;text-decoration:none}.tree li.parent_li>span{cursor:pointer}.tree>ul>li::before,.tree>ul>li::after{border:0}.tree li:last-child::before{height:25px}.tree li.parent_li>span:hover,.tree li.parent_li>span:hover+ul li span{background:#eee;border:1px solid #94a0b4;color:#000}
    a.del {color:#e64525;border:1px solid #0480be;border-radius:5px;}
    a.edit {color:#0a67fb;border:1px solid #0480be;border-radius:5px;}
    a.add {color:#03b8cf;border:1px solid #0480be;border-radius:5px;}
    .label{display:inline;padding:.2em .6em .2em;font-size:75%;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;background-color:#808080;border-radius:.25em;}.label[href]:hover,.label[href]:focus{color:#fff;background-color:#666;}.label.label-circle{color:#808080;background:none;border:1px solid #808080;}.label[href]:hover,.label[href]:focus{color:#fff;text-decoration:none;cursor:pointer;}.label:empty{display:none;}.label-success{background-color:#38b03f;}
    .menu_list .sub_menu li,.menu_list .second_li {display:none;}
</style>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="menu_list" style="overflow: scroll;margin-bottom:60px; outline: none;">

                <div class="tree well template">
                    <ul>
                        <li v-for="subApp in app" class="parent_li">
                            <span  v-html="'<i class=icon-minus-sign></i>' + subApp.name" title="Collapse this branch"></span>
                            <a href="javascript:;" class="add" @click.prevent="add('新增顶级菜单', '<?php \Cml\Http\Response::url("adminbase/Acl/Menus/add/pid/0");?><?php echo \Cml\Config::get("url_model") == 3 ? "&" : "?"; ?>app=' + subApp.id, '<?php \Cml\Http\Response::url('adminbase/Acl/Menus/save');?>');">添加子菜单</a>
                            <ul>
                                <li v-for="topmenu in menus" v-if="topmenu.app == subApp.id" class="parent_li">
                                    <span title="Collapse this branch"><i v-bind:class="[topmenu.sonNode.length > 0  ? 'icon-folder-open':'']"></i> {{topmenu.title}} <span v-bind:class="['label', topmenu.isshow == 1 ? 'label-success' : 'label-circle']">{{topmenu.isshow == 1 ? 'show' : 'hide'}}</span></span>
                                    <a href="javascript:;" class="add" @click.prevent="add('新增菜单', '<?php \Cml\Http\Response::url("adminbase/Acl/Menus/add");?><?php echo \Cml\Config::get("url_model") == 3 ? "&" : "?"; ?>pid=' + topmenu.id + '&app=' + subApp.id, '<?php \Cml\Http\Response::url('adminbase/Acl/Menus/save');?>');">添加子菜单</a>
                                    <a href="javascript:;" class="edit" @click.prevent="edit('编辑菜单', '<?php \Cml\Http\Response::url("adminbase/Acl/Menus/edit");?><?php echo \Cml\Config::get("url_model") == 3 ? "&" : "?"; ?>id=' + topmenu.id, '<?php \Cml\Http\Response::url('adminbase/Acl/Menus/save');?>');">编辑</a>

                                    <a href="javascript:;" class="del" @click.prevent="del('<?php \Cml\Http\Response::url("adminbase/Acl/Menus/del");?><?php echo \Cml\Config::get("url_model") == 3 ? "&" : "?"; ?>id=' + topmenu.id, topmenu.id);">删除</a>
                                    <ul v-if="topmenu.sonNode.length > 0">
                                        <li v-for="submenu in topmenu.sonNode" class="parent_li second_li">
                                            <span title="Collapse this branch"><i v-bind:class="[submenu.sonNode.length > 0  ? 'icon-folder-open':'']"></i> {{submenu.title}} <span v-bind:class="['label', submenu.isshow == 1 ? 'label-success' : 'label-circle']">{{submenu.isshow == 1 ? 'show' : 'hide'}}</span></span>
                                            <a href="javascript:;" class="add" @click.prevent="add('新增菜单', '<?php \Cml\Http\Response::url("adminbase/Acl/Menus/add");?><?php echo \Cml\Config::get("url_model") == 3 ? "&" : "?"; ?>pid=' + submenu.id + '&app=' + subApp.id, '<?php \Cml\Http\Response::url('adminbase/Acl/Menus/save');?>');">添加子菜单</a>
                                            <a href="javascript:;" class="edit" @click.prevent="edit('编辑菜单', '<?php \Cml\Http\Response::url("adminbase/Acl/Menus/edit");?><?php echo \Cml\Config::get("url_model") == 3 ? "&" : "?"; ?>id=' + submenu.id, '<?php \Cml\Http\Response::url('adminbase/Acl/Menus/save');?>');"> 编辑</span>
                                            <a href="javascript:;" class="del" @click.prevent="del('<?php \Cml\Http\Response::url("adminbase/Acl/Menus/del");?><?php echo \Cml\Config::get("url_model") == 3 ? "&" : "?"; ?>id=' + submenu.id, submenu.id);">删除</a>
                                            <ul  class="sub_menu">
                                                <li v-for="sonmenu in submenu.sonNode">
                                                    <span>{{sonmenu.title}} <span v-bind:class="['label', sonmenu.isshow == 1 ? 'label-success' : 'label-circle']">{{sonmenu.isshow == 1 ? 'show' : 'hide'}}</span></span>
                                                    <a href="javascript:;" class="edit" @click.prevent="edit('编辑菜单', '<?php \Cml\Http\Response::url("adminbase/Acl/Menus/edit");?><?php echo \Cml\Config::get("url_model") == 3 ? "&" : "?"; ?>id=' + sonmenu.id, '<?php \Cml\Http\Response::url('adminbase/Acl/Menus/save');?>');"> 编辑</span>
                                                    <a href="javascript:;" class="del" @click.prevent="del('<?php \Cml\Http\Response::url("adminbase/Acl/Menus/del");?><?php echo \Cml\Config::get("url_model") == 3 ? "&" : "?"; ?>id=' + sonmenu.id, sonmenu.id);">删除</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

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


<script type="text/javascript">
    layui.use('cml', function() {
        cml = layui.cml;
        cml.layerWidth = '500px';
        cml.preLayerWidth = '500px';

        var vm = new Vue({
            el: ".menu_list",
            data: {
                checkedIds: [],
                app:<?php echo json_encode($app, JSON_UNESCAPED_UNICODE);;?>,
                menus:<?php echo json_encode($menus, JSON_UNESCAPED_UNICODE);;?>
            },
            created: function () {
                $('.template').show();
            },
            methods: {
                add: function (title, form_url, save_url, width) {
                    cml.form.add(title, form_url, save_url, width);
                },
                edit: function (title, form_url, save_url, width) {
                    cml.form.edit(title, form_url, save_url, width);
                },
                del: function (url, id, msg) {
                    cml.form.del(url, id, msg);
                }
            }
        });

        $('.tree').on('click', 'li.parent_li > span', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i.icon-minus-sign').addClass('icon-folder-open').removeClass('icon-minus-sign');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i.icon-folder-open').addClass('icon-minus-sign').removeClass('icon-folder-open');
            }
            e.stopPropagation();
        });

        cml.form.operateSuccessCallBack = function() {
            cml.loadUrl('<?php \Cml\Http\Response::url("adminbase/Acl/Menus/menusList");?>', 'json', function(res) {
                vm.$data.menus = res.data;
            });
        };
    });
</script>


</html>