<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>title</title>
</head>
<style>
      
</style>
<link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/css/layui.css");?>">
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/layui.js");?>"></script>


<body>

  <div class="demoTable">
	  搜索：
	<div>
	  <div class="layui-inline">
		<input class="layui-input" name="" id="name" placeholder="名字全称或简称" autocomplete="off">
	  </div>
	  <div class="layui-inline">
		<input class="layui-input" name="" id="zjh" placeholder="证件号" autocomplete="off">
	  </div>
	  <div class="layui-inline">
		<button class="layui-btn layui-btn-sm" id="search" data-type="reload">搜索</button>	
	  </div>
	</div>
  </div>
   
<table class="layui-hide" id="test" lay-filter="test"></table>
	
 
<script>
layui.use('table', function(){
  var table = layui.table;
  
	table.render({
			elem: '#test'
			,url:'<?php \Cml\Http\Response::url("bank/Dyqr/ajaxSearch");?>'
			,cols: [[
			  ,{field:'fullname', title:'名字全称', width:80, sort: true}
			  ,{field:'nickname', title:'名字简称', width:120}
			  ,{field:'username', title:'登录名称', width:120}
			  ,{field:'zjlx', title:'证件类型', width:120}
			  ,{field:'zjh', title:'证件号', width:120}
			  ,{field:'addr', title:'地址', width:120}
			  ,{field:'tel', title:'电话', width:120}
			  ,{field:'lxr', title:'联系人', width:120}
			]]
			,id: 'testReload'
			,page: true
			,done:function(res, curr, count){
			
			}
	  });
			  
   var $ = layui.$, active = {
    reload: function(){
      //执行重载
      table.reload('testReload', {
        page: {
          curr: 1 //重新从第 1 页开始
        }
		,parseData: function(res){ //res 即为原始返回的数据
				console.log(res);
				return {
				  "code": res.data.code, //解析接口状态
				  "msg": res.data.msg, //解析提示文本
				  "count": res.data.count, //解析数据长度
				  "data": res.data.list //解析数据列表
				};
		}
        ,where: {
				name: $('#name').val(),
				zjh: $('#zjh').val(),
        }
      });
    }
  };
  
  $('#search').on('click', function(){
	console.log('f');
    var type = $(this).data('type');
    active[type] ? active[type].call(this) : '';
  });
 
});


</script>

</body>
</html>