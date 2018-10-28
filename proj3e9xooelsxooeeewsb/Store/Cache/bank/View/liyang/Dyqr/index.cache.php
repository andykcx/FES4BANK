<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加抵押权人</title>
</head>
<style>
   
</style>
<link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/css/layui.css");?>">
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/layui.js");?>"></script>
<body>
                       
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>抵押权人录入</legend>
</fieldset>
 
<form class="layui-form" id="huozhuForm" action="">
  <div class="layui-form-item">
    <label class="layui-form-label">编号</label>
    <div class="layui-input-inline">
      <input type="text" name="dyqrbh" lay-verify="dyqrbh" value="<?php echo $dyqrbh;?>" readonly  class="layui-input ">
    </div>
	<label class="layui-form-label">创建人</label>
    <div class="layui-input-inline">
      <input type="text" name="nickname" lay-verify="people" value="<?php echo $nickname;?>" readonly  class="layui-input">
	  <input type="text" name="pid" lay-verify="people" value="<?php echo $pid;?>" readonly  class="layui-input layui-hide">
    </div>
	<label class="layui-form-label">创建时间</label>
    <div class="layui-input-inline"">
      <input type="text" name="ctime" lay-verify="ctime" value="<?php echo $ctime;?>" readonly  class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">机构全称</label>
    <div class="layui-input-inline">
      <input type="text" name="company" lay-verify="required|name"  autocomplete="off" class="layui-input">
    </div>
	<div class="layui-form-mid layui-word-aux">请填写3到50个字符</div>
  </div>
   <div class="layui-form-item">
    <label class="layui-form-label">操作人姓名</label>
    <div class="layui-input-inline">
      <input type="text" name="nickname" lay-verify="required|name"  autocomplete="off" class="layui-input">
    </div>
	<div class="layui-form-mid layui-word-aux">请填写3到50个字符</div>
  </div>
   <div class="layui-form-item">
    <label class="layui-form-label">登录用户名</label>
    <div class="layui-input-inline">
      <input type="text" name="username" lay-verify="required|asci"  autocomplete="off" class="layui-input">
	  <input type="text" name="userId" lay-verify="userId" value="<?php echo $userId;?>" readonly  class="layui-input layui-hide">
    </div>
	<div class="layui-form-mid layui-word-aux">请填写3到5个英文字符</div>
  </div>
  <div class="layui-form-item">	  
  <label class="layui-form-label">登录密码</label>
    <div class="layui-input-inline">
      <input type="password" name="password" id="password" lay-verify="required|pass"  placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
	 <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
	  
  </div>
   <div class="layui-form-item">	 
   <label class="layui-form-label">密码确认</label>
	<div class="layui-input-inline">
	  <input type="password" name="confirmPassword" id="confirmPassword" lay-verify="required"  placeholder="请再次输入密码" autocomplete="off" class="layui-input">
	</div>
	 <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
   </div>
  <div class="layui-form-item">	  
	 <label class="layui-form-label">证件类型</label>
    <div class="layui-input-inline">
	 <select name="zjlx" id="zjlx"  lay-filter="zjlx">
	  <?php if (is_array($zjlx)) { foreach ($zjlx as $item) { ?>
		<option value="<?php echo $item['code'];?>" ><?php echo $item['name'];?></option>
	  <?php } } ?>
	 </select>
    </div>
	 <label class="layui-form-label">证件号码</label>
    <div class="layui-input-inline">
      <input type="text" name="zjh" lay-verify="required|identity"  autocomplete="off" class="layui-input">
    </div>
  </div>  
  <div class="layui-form-item">	  
	 <label class="layui-form-label">地址</label>
    <div class="layui-input-inline">
      <input type="text" name="addr" lay-verify="required"  autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">	  
	 <label class="layui-form-label">联系电话</label>
    <div class="layui-input-inline">
      <input type="text" name="tel" lay-verify="required|phone"  autocomplete="off" class="layui-input">
    </div>  
	 <label class="layui-form-label">电子邮件</label>
    <div class="layui-input-inline">
      <input type="text" name="email" lay-verify="required|email"  autocomplete="off" class="layui-input">
    </div>  
	 <label class="layui-form-label">联系人</label>
    <div class="layui-input-inline">
      <input type="text" name="lxr" lay-verify="required"  autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">备注</label>
    <div class="layui-input-inline">
      <textarea placeholder="请输入内容" name="beizhu" class="layui-textarea"></textarea>
    </div>
  </div>
  <!--<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">编辑器</label>
    <div class="layui-input-block">
      <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="LAY_demo_editor"></textarea>
    </div>
  </div>-->
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
    //layer.alert(JSON.stringify(data.field), {
   //   title: '最终的提交信息'
    //});
	//alert('password' + data.field.password);
	if(data.field.password != data.field.confirmPassword){
		document.getElementById('password').value = '';
		document.getElementById('confirmPassword').value = '';
		layer.msg('两次密码输入不相同,请重新输入!');
		return false;
	}
	// ajax post
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
				url: '<?php \Cml\Http\Response::url("bank/Dyqr/add");?>',
				data: data.field,
				success: function(result){
					delete result['sql'];
					result = eval('(' + result.data + ')'); // 截取的部分 json结构需要再次转换未json对象;
					console.log(result);
					//delete result.sql;
					switch(result.code){
						case 0:
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
</script>

</body>
</html>