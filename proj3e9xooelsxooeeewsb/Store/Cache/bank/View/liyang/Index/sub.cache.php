<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title></title>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/css/layui.css");?>" media="all"/>
</head>

<body class="">
<blockquote class="layui-elem-quote">最新业务办理情况</blockquote>
<!-- /.box-header -->
<div class="layui-form-item">
    <table class="layui-table">
	 <thead>
    <tr>
      <th >申请编号</th>
      <th >申请日期</th>
      <th >权证编号</th>

      <th >抵押金额</th>
      <th >当前状态</th>
    </tr> 
  </thead>
	<tbody>
	<?php if (is_array($apply)) { foreach ($apply as $item) { ?>
	<tr>
		<td><?php echo $item['slbh'];?></td>
		<td><?php echo $item['created_at'];?></td>
		<td><?php echo $item['qzbh'];?></td>
		<td><?php echo $item['dyje'];?></td>
		<td><?php echo $item['status'];?></td>
	</tr>
	<?php } } ?>
	</tbody>
    </table>
</div>
</body>

</html>
