<?php if (!class_exists('\Cml\View')) die('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?></title>
</head>
<link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/css/layui.css");?>">
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/jquery-2.2.3.min.js");?>"></script>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layer/layer.js");?>"></script>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/layui/layui.js");?>"></script>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/vue.min.js");?>"></script>



<body>

<div id="app" class="layui-container">
	
     <form class="layui-form" action="post">
		<fieldset class="layui-elem-field layui-field-title">
		  <legend>抵押信息</legend>
		</fieldset>
      <div  id="base_table" >

                                      <div class="layui-form-item">
                                              <label class="layui-form-label">受理编号</label>
                                              <div class="layui-input-inline">
                                                      <input type="text" name="" id="slbh"  readonly value="<?php echo $base_table['slbh'];?>" placeholder="自动生成" autocomplete="off" class="layui-input">

                                              </div>
											  
											  <label class="layui-form-label">抵押银行</label>
                                              <div class="layui-input-inline">
                                                      <input type="text" name="" id="dyqr"  readonly value="<?php echo $base_table['dyqr'];?>" lay-verify="" placeholder="自动生成" autocomplete="off" class="layui-input">
													  <input type="text" name="dyqrbh" id="dyqrbh"  readonly value="<?php echo $base_table['dyqrbh'];?>" lay-verify=""  readonly placeholder="自动生成" autocomplete="off" class="layui-input layui-hide">
													  <input type="text" name="zjlx" id="zjlx"  readonly value="<?php echo $base_table['zjlx'];?>" lay-verify=""  readonly placeholder="自动生成" autocomplete="off" class="layui-input layui-hide">
													  <input type="text" name="zjh" id="zjh"  readonly value="<?php echo $base_table['zjh'];?>" lay-verify=""  readonly placeholder="自动生成" autocomplete="off" class="layui-input layui-hide">
													  <input type="text" name="tel" id="tel"  readonly value="<?php echo $base_table['tel'];?>" lay-verify=""  readonly placeholder="自动生成" autocomplete="off" class="layui-input layui-hide">
                                              </div>
											  
											   <label class="layui-form-label">收件时间</label>
											   <div class="layui-input-inline">
													  <input type="text" name="" id="created_at"  readonly value="<?php echo $base_table['created_at'];?>" lay-verify="" placeholder="" autocomplete="off" class="layui-input">

											   </div>
											  
                                      </div>
                            
      </div>
	  <fieldset class="layui-elem-field layui-field-title">
		<legend>权证信息</legend>
	  </fieldset>
	 <div class="layui-col-md12">
		  <table class="layui-table">
		  <thead>
			<tr>
			  <th>序号</th>
			  <th>房产证号</th>
			  <th>不动产单元号</th>
			   <th>建筑面积</th>
			   <th>坐落</th> 
			   <th>抵押情况</th> 
			   <th>限制信息</th>         
			</tr> 
		  </thead>
		  <tbody id="qz_table">
		  <?php if (is_array($qz_table)) { foreach ($qz_table as $item) { ?>
			<tr>		
				<td><?php echo $item['id'];?></td>
				<td><?php echo $item['bdczh'];?></td>
				<td><?php echo $item['bdcdyh'];?></td>
				<td><?php echo $item['jzmj'];?></td>
				<td><?php echo $item['zl'];?></td>
				<td><?php echo $item['dyqk'];?></td>
				<td><?php echo $item['xzxx'];?></td>
			</tr>
			<?php } } ?>
		  </tbody>
		</table>
	  </div>

		<fieldset class="layui-elem-field layui-field-title">
		  <legend>抵押权人</legend>
		</fieldset>
		<div class="layui-col-md12">
			<table class="layui-table">
			   
				<thead>
				  <tr>
					<th>序号</th>
					<th>抵押权人名称</th>
					<th>证件类型</th>
					<th>证件号</th>
					<th>电话</th>
				  </tr> 
				</thead>
				<tbody id="tbody1">
				<?php if (is_array($dyqr_table)) { foreach ($dyqr_table as $item) { ?>
				 <tr>
					<td><?php echo $item['dyqrbh'];?></td>
					<td><?php echo $item['name'];?></td>
					<td><?php echo $item['zjlx'];?></td>
					<td><?php echo $item['zjh'];?></td>
					<td><?php echo $item['tel'];?></td>
				 </tr> 
				<?php } } ?>
				</tbody>
			  </table>
		</div>
		<fieldset class="layui-elem-field layui-field-title">
		  <legend>抵押权人代理人</legend>
		</fieldset>
         <div class="layui-col-md12"> 
			<table class="layui-table">
                <thead>
                  <tr>
                    <th>序号</th>
                    <th>代理人名称</th>
                    <th>证件种类</th>
                    <th>证件号</th>
                    <th>电话</th>
                  </tr> 
                </thead>
                <tbody id="dyqrdlr_table">
				<?php if (is_array($dyqrdlr_table)) { foreach ($dyqrdlr_table as $item) { ?>
				 <tr v-for="(todo,key) in todos">
					<td><?php echo $item['id'];?></td>
					<td><?php echo $item['name'];?></td>
					<td><?php echo $item['zjlx'];?></td>
					<td><?php echo $item['zjh'];?></td>
					<td><?php echo $item['tel'];?></td>
				</tr>
				<?php } } ?>
                </tbody>
              </table>
		</div>
		<fieldset class="layui-elem-field layui-field-title">
		  <legend>抵押人</legend>
		</fieldset>
		<div class="layui-col-md12">   
			<table class="layui-table">
				<thead>
				  <tr>
					<th>序号</th>
					<th>代理人名称</th>
					<th>证件类型</th>
					<th>证件号</th>   
					<th>电话</th>
				  </tr> 
				</thead>
				<tbody id="dyr_table">
				<?php if (is_array($dyr_table)) { foreach ($dyr_table as $item) { ?>
				 <tr v-for="(todo,key) in todos">
					<td><?php echo $item['id'];?></td>
					<td><?php echo $item['name'];?></td>
					<td><?php echo $item['zjlx'];?></td>
					<td><?php echo $item['zjh'];?></td>
					<td><?php echo $item['tel'];?></td>
				</tr>
				<?php } } ?>
				  
				</tbody>
			  </table>
		</div>
		<fieldset class="layui-elem-field layui-field-title">
		  <legend>抵押人代理人</legend>
		</fieldset>
		  <div class="layui-col-md12">  
			  <table class="layui-table">
				  <colgroup>
					<col width="150">
					<col width="200">
					<col>
				  </colgroup>
				  <thead>
					<tr>
					  <th>序号</th>
					  <th>代理人名称</th>
					  <th>证件类型</th>
					  <th>证件号</th>
					  <th>电话</th>
					</tr> 
				  </thead>
				  <tbody id="dyrdlr_table">
				<?php if (is_array($dyrdlr_table)) { foreach ($dyrdlr_table as $item) { ?>
				 <tr>
					<td><?php echo $item['id'];?></td>
					<td><?php echo $item['name'];?></td>
					<td><?php echo $item['zjlx'];?></td>
					<td><?php echo $item['zjh'];?></td>
					<td><?php echo $item['tel'];?></td>
				</tr>
				<?php } } ?>
		 
				  </tbody>
				</table>
          </div> 

		 <fieldset class="layui-elem-field layui-field-title">
		  <legend>抵押信息</legend>
		</fieldset>
		  <div class="layui-col-md12">   
			<table id="dyxx_table" class="layui-table">
				  <colgroup>
					<col width="150">
					<col width="200">
					<col>
				  </colgroup>
				  <tbody>
					<tr>
					  <td  class="t-b">不动产单元号</td>
					  <td><?php echo $dyxx_table['bdcdyh'];?></td>
					  <td  class="t-b">业务类型</td>
					  <td colspan="4">
						<td><?php echo $dyxx_table['ywlx'];?></td>
					   </td>

					</tr>
					<tr>
					  <td  class="t-b">不动产单元坐落</td>
					  <td><?php echo $dyxx_table['zl'];?></td>
					  <td  class="t-b">登记原因</td>
					  <td colspan="4"></td>
					</tr>
					<tr>
					  <td  class="t-b">房屋抵押面积</td>
					  <td><?php echo $dyxx_table['dymj'];?></td>
					   <td  class="t-b">抵押方式</td>
					   <td colspan="4">
						<td><?php echo $dyxx_table['dyfs'];?></td>
					   </td>
					  
				  </tr>
				  
				   <tr>
					  <td  class="t-b" rowspan="2">不动产价值</td>
					 <td><?php echo $dyxx_table['bdcjz'];?></td>
					  <td  class="t-b" rowspan="2">抵押担保范围</td>
					  <td><?php echo $dyxx_table['dbfw'];?></td>
					</tr>
					<tr>
					  <td></td>
					</tr>
					<tr>
					  <td  class="t-b" rowspan="2">本次抵押金额</td>
					  <td><?php echo $dyxx_table['dyje'];?></td>
					  <td  class="t-b">债务履行期限</td>
					  <td><?php echo $dyxx_table['stime'];?>---<?php echo $dyxx_table['etime'];?></td>
					   <td  class="t-b" rowspan="2">债务履行期限<br>(债权确定时间)</td>
					   <td  class="t-b">起</td>
					   <td><td><?php echo $dyxx_table['stime'];?></td></td>
					   
				  </tr>
				  <tr>
					  <td></td>
					  <td  class="t-b">抵押顺位</td>
					  <td><?php echo $dyxx_table['dysw'];?></td>
					  <td  class="t-b">止</td>
					  <td><td><?php echo $dyxx_table['etime'];?></td></td>
					  
				  </tr>
				  </tbody>
				</table>
		  </div>
		  
         <fieldset class="layui-elem-field layui-field-title">
			<legend>借款人(债务人)</legend>
		 </fieldset>
			  <div class="layui-col-md12">
					<table class="layui-table">
						<thead>
						  <tr>
							<th>序号</th>
							<th>名称</th>
							<th>证件种类</th>
							<th>证件号</th>
							<th>电话</th>
						  </tr> 
						</thead>
						 <tbody id="jkr_table">
							<?php if (is_array($jkr_table)) { foreach ($jkr_table as $item) { ?>
							 <tr>
								<td><?php echo $item['id'];?></td>
								<td><?php echo $item['name'];?></td>
								<td><?php echo $item['zjlx'];?></td>
								<td><?php echo $item['zjh'];?></td>
								<td><?php echo $item['tel'];?></td>
							</tr>
							<?php } } ?>
				 
						  </tbody>
					  </table>
					  <table class="layui-table">
							  <colgroup>
								<col width="150">
								<col width="200">
								<col>
							  </colgroup>
							  <tbody>
							   
							   <tr>
								  <td   class="t-b">附记</td>
								  <td id="" colspan="5"></td>
							   </tr>
							  </tbody>
							</table>
			   </div>				

				<fieldset class="layui-elem-field layui-field-title">
					<legend>附件信息</legend>
				</fieldset>
				 <div class="layui-col-md12">   

					<div class="layui-col-md7">
					  <div class="uploadListTable">
						<table class="layui-table">
						  <thead>
							<tr>
							<th>目录名称</th>
							<th>文件名称</th>
						  </tr></thead>
						  <tbody id="uploadFileList_table">
						  <?php if (is_array($fj_table)) { foreach ($fj_table as $item) { ?>
							 <tr>
								<td width='70px'><?php echo $item['path'];?></td>
								<td width='50px'><?php echo $item['files'];?></td>
							</tr>
							<?php } } ?>
						  </tbody>
						</table>
					  </div>
					  

					</div> 

				</div>
				
				<fieldset class="layui-elem-field layui-field-title">
					<legend>通知信息</legend>
				</fieldset>
				  <div  class="layui-col-md12"> 
					<table id="tzxx_table" class="layui-table">
						<tbody>
						  <tr>
							<td  class="t-b">受理银行</td>
							<td ><?php echo $tzxx_table['slyh'];?></td>
							<td  class="t-b">受理人员</td>
							<td ><?php echo $tzxx_table['slry'];?></td>
						  </tr>
						  <tr>
							<td class="t-b">通知人姓名</td>
							<td><?php echo $tzxx_table['tzr'];?></td>
						    <td class="t-b">通知电话</td>
						    <td><?php echo $tzxx_table['tzdh'];?></td>
						  </tr>
						  <tr>
							<td class="t-b">通知人地址</td>
							<td ><?php echo $tzxx_table['tzrdz'];?></td>
							<td class="t-b">通知备注</td>
							<td class="t-b"><?php echo $tzxx_table['tzbz'];?></td>
						  </tr>
						</tbody>
					  </table>
				 </div>
						
		 
</form>
</div>
	
</body>

</html>