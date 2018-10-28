<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>添加证号</title>
</head>

<link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/css/layui.css");?>">
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/static/js/common.js");?>"></script>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/layui.js");?>"></script>


<body>
 
 

 
  <div class="demoTable">
	  搜索：
	  <div class="layui-inline">
		<input class="layui-input" name="" id="bdczh" placeholder="不动产证号" autocomplete="off">
	  </div>
	  <div class="layui-inline">
		<input class="layui-input" name="" id="bdcdyh" placeholder="不动产单元号" autocomplete="off">
	  </div>
	  <div class="layui-inline">
		<input class="layui-input" name="" id="qlr" placeholder="抵押人" autocomplete="off">
	  </div>
	  <div class="layui-inline">
		<input class="layui-input" name="" id="qlrzjh" lay-verify="required|sfz" placeholder="抵押人证件号" autocomplete="off">
	  </div>
	  <div class="layui-inline">
		<button class="layui-btn layui-btn-sm" id="searchQz" data-type="reload">搜索</button>	
	  </div>
	 
	   <div class="layui-inline">
	    <script type="text/html" id="toolbarDemo">
		<button class="layui-btn layui-btn-sm" lay-event="getCheckData">选定</button>
		</script>
	<!--     <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
		<button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button> -->
	  </div>
	 
  </div>
   
<table class="layui-hide" id="test" lay-filter="test"></table>
	
 
<script>
layui.use('table', function(){
  var table = layui.table;
  
	table.render({
			elem: '#test'
			,url:'<?php \Cml\Http\Response::url("bank/Apply/ajaxSearchQz");?>'
			,method:'post'
			,toolbar: '#toolbarDemo'
			,defaultToolbar:[]
			,title: '用户数据表'
			,cols: [[
			  {type: 'checkbox', fixed: 'left'}
			  ,{field:'bdczh', title:'不动产证号', width:120, sort: true}
			  ,{field:'bdcdyh', title:'不动产单元号', width:120}
			  ,{field:'qlr', title:'抵押人', width:80}
			  ,{field:'qlrzjh', title:'抵押人证件号', width:120}
			  ,{field:'zl', title:'坐落', width:120}
			  ,{field:'jzmj', title:'建筑面积(平方)', width:120}
			  ,{field:'dysw', title:'抵押顺位', width:120}
			  ,{field:'xzxx', title:'限制信息', width:120, fixed: 'right'}
			]]
			,id: 'testReload'
			,page: true
			,done:function(res, curr, count){
			
			}
	  });
			  
   var $ = layui.$, active = {
    reload: function(){
      var bdczh = $('#bdczh');
      var bdcdyh = $('#bdcdyh');
	  var qlr = $('#qlr');
	  var qlrzjh = $('#qlrzjh');
	  
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
				bdczh: bdczh.val(),
				bdcdyh: bdcdyh.val(),
				qlr: qlr.val(),
				qlrzjh: qlrzjh.val()
        }
      });
    }
  };
  
  
  $('#searchQz').on('click', function(){
	var sfz = $('#qlrzjh').val();
	if(('' != sfz) && !checkSfz(sfz) ){
		layer.msg('请输入正确的身份证号', {icon: 5}, function(){
		//关闭后的操作
		});
		return false;
	}
    var type = $(this).data('type');
    active[type] ? active[type].call(this) : '';
  });
 
	

  //头工具栏事件
  table.on('toolbar(test)', function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'getCheckData':
	    var data = checkStatus.data;
		if('' == checkStatus.data){
			layer.alert('未选定记录!');
			break;
		}
        console.log('get searchQz api data:');
		console.log(data);
		selected(data);
      break;
      case 'getCheckLength':
        var data = checkStatus.data;
        layer.msg('选中了：'+ data.length + ' 个');
      break;
      case 'isAll':
        layer.msg(checkStatus.isAll ? '全选': '未全选');
      break;
    };
  });
  
  //监听行工具事件
  table.on('tool(test)', function(obj){
    var data = obj.data;
    //console.log(obj)
    if(obj.event === 'del'){
      layer.confirm('真的删除行么', function(index){
        obj.del();
        layer.close(index);
      });
    } else if(obj.event === 'edit'){
      layer.prompt({
        formType: 2
        ,value: data.email
      }, function(value, index){
        obj.update({
          email: value
        });
        layer.close(index);
      });
    }
  });
});

function selected(selectedData){
		
/*	arrList = [
		{
			'id':'id',
			'qzslbh': '权证受理编号(权证唯一主键)001',
			'bdczh':'20170000688',
			'bdcdyh':'单元号001',
			'jzmj':'建筑面积001',
			'qlr':'qlr',
			'qlrzjh':'qlrzjh',
			'zl':'zl',
			'dysw':'1',
			'xzxx':'权利状态(查封,异议)11'
		}
	];
*/// 抵押信息		
	console.log('searchQz:selectedData');
	console.log(selectedData);
	arrList = [];
	for(var i = 0; i < selectedData.length; i++){
	
		if('' != selectedData[i]['dysw']){
			var isDy = true;
		}
		if('' != selectedData[i]['xzxx']){
			var isXz = true;
		}
		
		arrList.push({
			'id':i+1,
			'qzbh':selectedData[i]['qzslbh'],
			'hbh':selectedData[i]['qzslbh'] + '-' + (i+1),
			'bdczh':selectedData[i]['bdczh'],
			'bdcdyh':selectedData[i]['bdcdyh'],
			'jzmj':selectedData[i]['jzmj'],
			'qlr':selectedData[i]['qlr'],
			'zjlx':selectedData[i]['zjlx'],
			'zjlx_name':selectedData[i]['zjlx_name'],
			'zjh':selectedData[i]['qlrzjh'],
			'tel':selectedData[i]['tel'],
			'zl':selectedData[i]['zl'],
			'dysw':selectedData[i]['dysw'],
			'xzxx':selectedData[i]['xzxx'],
			'isDy':isDy,
			'isXz':isXz
		});
	}
	// 取得选定的记录
	console.log('searchQz:arrList');
	console.log(arrList);
	// 更新父页面
	parent.updateQz(arrList);
	var index = parent.layer.getFrameIndex(window.name);
	parent.layer.close(index);
}



</script>

</body>
</html>