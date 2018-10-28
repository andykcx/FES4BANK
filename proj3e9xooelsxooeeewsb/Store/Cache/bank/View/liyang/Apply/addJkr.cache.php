<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加第三方借款人(债务人)</title>
</head>
<style>
   
</style>
<link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/css/layui.css");?>">
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/static/js/common.js");?>"></script>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/layui.js");?>"></script>
<body>
                       
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>新增借款人(债务人)</legend>
</fieldset>
			
<form class="layui-form" id="huozhuForm" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">借款人名称</label>
    <div class="layui-input-inline">
      <input type="text" name="name" lay-verify="required|name"  autocomplete="off" class="layui-input">
	  <input type="text" name="jkrbh" lay-verify="jkrbh" value="<?php echo $apply['jkrbh'];?>"  readonly autocomplete="off" class="layui-input layui-hide">
    </div>
  </div>
  <div class="layui-form-item">
	<label class="layui-form-label">证件类型</label>
    <div class="layui-input-inline">
     <!-- <input type="text" name="zjlx" lay-verify="required"  autocomplete="off" class="layui-input"> -->
	 <select name="zjlx" id="zjlx"  lay-filter="zjlx">
	  <?php if (is_array($zjlx)) { foreach ($zjlx as $item) { ?>
		<option value="<?php echo $item['code'];?>" ><?php echo $item['name'];?></option>
	  <?php } } ?>
	 </select>
    </div>
  </div>
  <div class="layui-form-item">
	<label class="layui-form-label">证件号</label>
    <div class="layui-input-inline"">
     <input type="text" name="zjh" id="zjh" lay-verify="required|identity"  autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">电话</label>
    <div class="layui-input-inline">
     <input type="text" name="tel" lay-verify="required|phone"  autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
 
 
<script>
layui.use(['form', 'layedit', 'jquery'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,$ = layui.$;
  
  
  //创建一个编辑器
  var editIndex = layedit.build('LAY_demo_editor');
 
  //自定义验证规则
form.verify({
    name: function(value){
      if(value.length < 3){
        return '名称至少得3个字符啊';
      }
    }
    ,pass: [/(.+){6,12}$/, '密码必须6到12位']
	,asci: [/^[a-zA-Z]{3,5}$/, '登录用户名必须是3到5位的英文字符']
    ,content: function(value){
      layedit.sync(editIndex);
    }
  });
  
  
  //监听提交
  form.on('submit(submit)', function(data){
  console.log(data);
	var sfz = $('#zjh').val();
	if(!checkSfz(sfz) ){
		layer.msg('请输入正确的身份证号', {icon: 5}, function(){
		//关闭后的操作
		});
		return false;
	}
	// ajax post
	var options = $('#zjlx option:selected'); //获取选中的项
	var zjlx_name = options.text(); //拿到选中项的文本
	var arrJkr =[];
	arrJkr =data.field;
	arrJkr['zjlx_name'] = zjlx_name;
	
	layer.alert('确认提交吗?', {
		skin: 'layui-layer-molv' //样式类名  自定义样式
		,closeBtn: 1    // 是否显示关闭按钮
		//,anim: 1 //动画类型
		,btn: ['确定','放弃'] //按钮
		,icon: 6    // icon
		,yes:function(){
			$.ajax({
				type: 'POST',
				dataType:'json',
				url: '<?php \Cml\Http\Response::url("bank/Apply/ajaxJkr");?>',
				data: {arrJkr:arrJkr},
				success: function(result){
					switch(result.code){
						case 0:
							console.log(result.data.list);
							arrList = eval("(" + result.data.list + ")");
							console.log('case:');
							console.log(arrList);
							selectedJkr(arrList);
							layer.msg('保存成功',{
								  offset:['50%'],
								  time: 2000 //5秒关闭（如果不配置，默认是3秒）
								},function(){
									window.location.reload();
							});
						default:
							layer.alert(result.msg);
					}
					
				}
			});
		}
	});
	
    return false;
  });
  
  
});

function selectedJkr(selectedData){
		
/*	arrList = [
		{
			'slbh' : 'slbh',
			'jkrbh' : 'jkrbh',
			'name' : 'name',
			'zjlx' : 'zjlx',
			'zjh' : 'zjh',
			'tel' : 'tel'
		}
	];
*/
	arrList = [];
	arrList.push({
		'slbh':selectedData['slbh'],
		'jkrbh':selectedData['jkrbh'],
		'name':selectedData['name'],
		'zjlx':selectedData['zjlx'],
		'zjlx_name':selectedData['zjlx_name'],
		'zjh':selectedData['zjh'],
		'tel':selectedData['tel']
	});
	// 取得选定的记录
	
	console.log(arrList);
	// 更新父页面
	parent.updateJkr(arrList);
	var index = parent.layer.getFrameIndex(window.name);
	parent.layer.close(index);
}



</script>

</body>
</html>