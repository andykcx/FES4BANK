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
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/js/layui-xtree.js");?>"></script>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/js/ajaxfileupload.js");?>"></script>


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
                                                      <input type="text" name="" id="slbh"  readonly value="<?php echo $apply['slbh'];?>" placeholder="自动生成" autocomplete="off" class="layui-input">

                                              </div>
											  
											  <label class="layui-form-label">抵押银行</label>
                                              <div class="layui-input-inline">
                                                      <input type="text" name="" id="dyqr"  readonly value="<?php echo $apply['dyqr'];?>" lay-verify="" placeholder="自动生成" autocomplete="off" class="layui-input">
													  <input type="text" name="dyqrbh" id="dyqrbh"  readonly value="<?php echo $apply['dyqrbh'];?>" lay-verify=""  readonly placeholder="自动生成" autocomplete="off" class="layui-input layui-hide">
													  <input type="text" name="zjlx" id="zjlx"  readonly value="<?php echo $apply['zjlx'];?>" lay-verify=""  readonly placeholder="自动生成" autocomplete="off" class="layui-input layui-hide">
													  <input type="text" name="zjh" id="zjh"  readonly value="<?php echo $apply['zjh'];?>" lay-verify=""  readonly placeholder="自动生成" autocomplete="off" class="layui-input layui-hide">
													  <input type="text" name="tel" id="tel"  readonly value="<?php echo $apply['tel'];?>" lay-verify=""  readonly placeholder="自动生成" autocomplete="off" class="layui-input layui-hide">
                                              </div>
											  
											   <label class="layui-form-label">收件时间</label>
											   <div class="layui-input-inline">
													  <input type="text" name="" id="created_at"  readonly value="<?php echo $apply['created_at'];?>" lay-verify="" placeholder="" autocomplete="off" class="layui-input">

											   </div>
											  
                                      </div>
                            
      </div>
	  <fieldset class="layui-elem-field layui-field-title">
		<legend>权证信息</legend>
	  </fieldset>
	 <div class="layui-col-md12">
		  <div ><button type="button" id="searchQz"  class="layui-btn layui-btn-sm">添加</button></div>
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
			   <th>删除</th>          
			</tr> 
		  </thead>
		  <tbody id="qz_table">
			<tr v-for="(todo,key) in todos">
				<td>{{ todo.id }}</td>
				<td>{{ todo.bdczh }}</td>
				<td>{{ todo.bdcdyh }}</td>
				<td>{{ todo.jzmj }}</td>
				<td>{{ todo.zl }}</td>
				<td>{{ todo.dyqk }}</td>
				<td>{{ todo.xzxx }}</td>
				<td width='50px'><button id="qz_bt_del" @click.prevent="delQz(key)" class="layui-btn layui-btn-sm layui-btn-danger">删除</button></td>
			</tr>
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
				 <tr id="dyqr_table">
					<td>{{ dyqrbh }}</td>
					<td>{{ name }}</td>
					<td>{{ zjlx }}</td>
					<td>{{ zjh }}</td>
					<td>{{ tel }}</td>
				 </tr>         
				</tbody>
			  </table>
		</div>
		<fieldset class="layui-elem-field layui-field-title">
		  <legend>抵押权人代理人</legend>
		</fieldset>
         <div class="layui-col-md12"> 
			<div><button  type="button" id="addDyqrdlr"  class="layui-btn layui-btn-sm ">添加</button></div>
			<table class="layui-table">
                <thead>
                  <tr>
                    <th>序号</th>
                    <th>代理人名称</th>
                    <th>证件种类</th>
                    <th>证件号</th>
                    <th>电话</th>
                    <th>操作</th>
                  </tr> 
                </thead>
                <tbody id="dyqrdlr_table">
				 <tr v-for="(todo,key) in todos">
					<td>{{ todo.id }}</td>
					<td>{{ todo.name }}</td>
					<td>{{ todo.zjlx }}</td>
					<td>{{ todo.zjh }}</td>
					<td>{{ todo.tel }}</td>
					<td width='50px'><button id="dyqrdlr_bt_del" @click.prevent="delDyqrdlr(key)" class="layui-btn layui-btn-sm layui-btn-danger">删除</button></td>
				</tr>
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
				 <tr v-for="(todo,key) in todos">
						<td>{{ todo.id }}</td>
						<td>{{ todo.name }}</td>
						<td>{{ todo.zjlx }}</td>
						<td>{{ todo.zjh }}</td>
						<td>{{ todo.tel }}</td>
					</tr>
				  
				</tbody>
			  </table>
		</div>
		<fieldset class="layui-elem-field layui-field-title">
		  <legend>抵押人代理人</legend>
		</fieldset>
		  <div class="layui-col-md12">  
			  <div><button type="button" id="addDyrdlr"  class="layui-btn layui-btn-sm ">添加</button></div>
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
					  <th>操作</th>
					</tr> 
				  </thead>
				  <tbody id="dyrdlr_table">
				   <tr v-for="(todo,key) in todos">
						<td>{{ todo.id }}</td>
						<td>{{ todo.name }}</td>
						<td>{{ todo.zjlx }}</td>
						<td>{{ todo.zjh }}</td>
						<td>{{ todo.tel }}</td>
						<td width='50px'><button id="dyrdlr_bt_del" @click.prevent="delDyrdlr(key)" class="layui-btn layui-btn-sm layui-btn-danger">删除</button></td>
					</tr>
		 
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
					  <td>{{bdcdyh}}</td>
					  <td  class="t-b">业务类型</td>
					  <td colspan="4">
							<div class="layui-input-inline">
							  <select name="ywlx" id="ywlx">
								<option value="0" selected >普通抵押</option>
								<option value="1"  >预告抵押</option>
								<option value="2" >在建抵押</option>
							  </select>
							</div>

					   </td>

					</tr>
					<tr>
					  <td  class="t-b">不动产单元坐落</td>
					  <td>{{zl}}</td>
					  <td  class="t-b">登记原因</td>
					  <td colspan="4"></td>
					</tr>
					<tr>
					  <td  class="t-b">房屋抵押面积</td>
					  <td>{{dymj}}</td>
					   <td  class="t-b">抵押方式</td>
					   <td colspan="4">
							<div class="layui-input-inline">
							  <select name="dyfs" id="dyfs"  lay-filter="dyfs">
								<option value="0" selected>一般抵押</option>
								<option value="1" >最高额抵押</option>
							  </select>
							</div>

					   </td>
					  
				  </tr>
				  
				   <tr>
					  <td  class="t-b" rowspan="2">不动产价值</td>
					  <td rowspan="2"><input type="text"   class="layui-input" id="bdcjz" lay-verify="required" lay-filter="bdcjz" placeholder="评估价值(万元)"></td>
					  <td  class="t-b" rowspan="2">抵押担保范围</td>
					  <td colspan="3" rowspan="2"><input type="text"  class="layui-input" id="dbfw" lay-verify="required" lay-filter="dbfw" readonly value="全部抵押"></td>
					</tr>
					<tr>
					  <td></td>
					</tr>
					<tr>
					  <td  class="t-b" rowspan="2">本次抵押金额</td>
					  <td><input type="text"  class="layui-input" id="dyje" lay-verify="required" lay-filter="dyje" placeholder="本次抵押金额(万元)"></td>
					  <td  class="t-b">债务履行期限</td>
					  <td>{{stime}}---{{etime}}</td>
					   <td  class="t-b" rowspan="2">债务履行期限<br>(债权确定时间)</td>
					   <td  class="t-b">起</td>
					   <td><input type="text" class="layui-input" id="stime" lay-verify="required" placeholder="yyyy-MM-dd"></td>
					   
				  </tr>
				  <tr>
					  <td></td>
					  <td  class="t-b">抵押顺位</td>
					  <td>{{dysw}}</td>
					  <td  class="t-b">止</td>
					  <td><input type="text" class="layui-input" id="etime" lay-verify="required" placeholder="yyyy-MM-dd"></td>
					  
				  </tr>
				  </tbody>
				</table>
		  </div>
		  
         <fieldset class="layui-elem-field layui-field-title">
			<legend>借款人(债务人)</legend>
		 </fieldset>
			  <div class="layui-col-md12">
					<div><button type="button" id="addJkr" class="layui-btn layui-btn-sm ">添加</button></div>
					<table class="layui-table">
						<thead>
						  <tr>
							<th>序号</th>
							<th>名称</th>
							<th>证件种类</th>
							<th>证件号</th>
							<th>电话</th>
							<th>操作</th>
						  </tr> 
						</thead>
						 <tbody id="jkr_table">
						   <tr v-for="(todo,key) in todos">
								<td>{{ todo.jkrbh }}</td>
								<td>{{ todo.name }}</td>
								<td>{{ todo.zjlx }}</td>
								<td>{{ todo.zjh }}</td>
								<td>{{ todo.tel }}</td>
								<td width='50px'><button id="jkr_bt_del" @click.prevent="delJkr(key)" class="layui-btn layui-btn-sm layui-btn-danger">删除</button></td>
							</tr>
				 
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
								  <td id="fj_table" colspan="5">{{todos.text}}</td>
							   </tr>
							  </tbody>
							</table>
			   </div>				

				<fieldset class="layui-elem-field layui-field-title">
					<legend>添加附件</legend>
				</fieldset>
				 <div class="layui-col-md12">   

					<div class="layui-col-md5">
						<table class="layui-hidden" id="treeTable" lay-filter="treeTable"></table>
					  </div>

					<div class="layui-col-md7">
					  <div class="uploadListTable">
						<table class="layui-table">
						  <thead>
							<tr>
							<th>文件名</th>
							<th>大小</th>
							<th>文件类型</th>
							<th>上传目录</th>
							<th>状态</th>
							<th>操作</th>
						  </tr></thead>
						  <tbody id="uploadFileList_table">
							 <tr id="uploadFileList" v-for="(todo,key) in todos">
								<td width='70px'>{{ todo.name }}</td>
								<td width='50px'>{{ todo.size }}</td>
								<td width='60px'>{{ todo.type }}</td>
								<td>{{ todo.selectedPath }}</td>
								<td>{{ todo.status }}</td>
								<td id="uploadAction" width='85px'>
									<button id="delUploadFile" @click.prevent="delUploadFile(key)" class="layui-btn layui-btn-xs layui-btn-danger">删除</button>
									<button id="reloadUploadFile" @click.prevent="reloadUploadFile(key)" class="layui-btn layui-btn-xs layui-btn-warm layui-hide">重传</button>
									<button id="showUploadFile" @click.prevent="showUploadFile(key)" class="layui-btn layui-btn-xs layui-btn-normal">预览</button>
								</td>
							</tr>
						  </tbody>
						</table>
					  </div>
					  
				<div id="outerdiv" style="position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:2000;width:100%;height:100%;display:none;">
				   <div id="innerdiv" style="position:absolute;">
					  <img id="bigimg" style="border:5px solid #fff;" src="javascript:void(0);" />
				   </div>
				</div>

				<div class="uploadBtn">
				  <button type="button" class="layui-btn" onclick="uploadFujianFile()" id="uploadFile">开始上传</button>
				  <input type="file" class="layui-input layui-hide" multiple id="selectFile" />
				   <input type="text" class="layui-input layui-hide"  id="selectedPath" />
				  (支持文件格式:jpg/png/gif/bmp/jpeg)
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
							<td >{{slyh}}</td>
							<td  class="t-b">受理人员</td>
							<td >{{slry}}</td>
						  </tr>
						  <tr>
							<td class="t-b">通知人姓名</td>
							<td>{{tzr}}</td>
						    <td class="t-b">通知电话</td>
						    <td>{{tzdh}}</td>
						  </tr>
						  <tr>
							<td class="t-b">通知人地址</td>
							<td >{{tzrdz}}</td>
							<td class="t-b">通知备注</td>
							<td class="t-b">{{tzbz}}</td>
						  </tr>
						</tbody>
					  </table>
				 </div>
						
		
				 <div class="layui-form-item">
                    <div class="layui-input-inline">		
						<button type="button" id="" onclick="saveApply()" class="layui-btn layui-btn-primary">保存</button>
					</div>
                    <div class="layui-input-inline">		
						<button id="submitApply" type="button" class="layui-btn">提交</button>
					</div> 					
				</div>  
</form>
</div>
	
</body>

<script>

var base_table = new Vue({
	el:'#base_table',
	data:{
		slbh:'',
		dyqr:'',
		created_at:''
	}
});

/*var qz_table = new Vue({
	el:'#qz_table',
	data:{
		qzbh:'',
		bdczh:'',
		zjlx:'权证',
		todos:[
		  {text:''}
		],
		qz_id:[
			{id:1}
		]
	}
});
*/
var qz_table = new Vue({
	el:'#qz_table',
	data:{
		bdczh:'',
		zjlx:'权证',
		todos:[
			{
				'qzbh':'',
				'hbh':'',
				'bdcdyh':'',
				'zl':'',
				'jzmj':'',
				'dyqk':'',
				'xzxx':''
			}
		]
	}
});

var dyqr_table = new Vue({
	el:'#dyqr_table',
	data:{
		dyqrbh:'',
		slbh:'',
		name:'',
		zjlx:'',
		zjh:'',
		tel:''
	}
});	

var dyqrdlr_table = new Vue({
	el:'#dyqrdlr_table',
	data:{
		todos:[
		  {text:''}
		],
		dyqrdlr_id:[
			{id:1}
		]
	}
});

var dyr_table = new Vue({
	el:'#dyr_table',
	data:{
		todos:[
		  {text:''}
		],
		dyr_id:[
			{id:1}
		]
	}
});

var dyrdlr_table = new Vue({
	el:'#dyrdlr_table',
	data:{
		todos:[
		  {text:''}
		],
		dyrdlr_id:[
			{id:1}
		]
	}
});

var dyxx_table = new Vue({
	el:'#dyxx_table',
	data:{
			'bdcdyh':'',
			'zl':'',
			'dyfs':'',
			'dyje':'',
			'dymj':'',
			'bdcjz':'',
			'dbfw':'',
			'stime':'',
			'etime':'',
			'dysw':'',
			'ywlx':''
	}
});

							
var jkr_table = new Vue({
	el:'#jkr_table',
	data:{
		todos:[
		  {text:''}
		],
		jkr_id:[
			{id:1}
		]
	}
});

var fj_table = new Vue({
	el:'#fj_table',
	data:{
		todos:[{text:'fj'}]
	}
});

var uploadFileList_table = new Vue({
	el:'#uploadFileList_table',
	data:{
		todos:[{
			name:'',
			size:'',
			type:'',
			selectedPath:'',
			status:'',
			imgUrl:''
		}]
	}
});

var tzxx_table = new Vue({
	el:'#tzxx_table',
	data:{
			'slyh':'',
			'slry':'',
			'tzr':'',
			'tzdh':'',
			'tzrdz':'',
			'tzbz':''
	}
});

/*
var fujian_table = new Vue({
	el:'#fujian_table',
	data:{
		selected:false,
		counts:0,
		OnlyOne:false,
		jd:'',
		filename:'',
		url:'',
		selectedPath:'',
		selectedTitle:'',
		djsqs:[
			{'name':'xxx','url':'www.xx.com'}
		],
		sqrsfz:[
			{'name':'xxx','url':'www.xx.com'}
		],
		dyht:[
			{'name':'xxx','url':'www.xx.com'}
		],
		jkht:[
			{'name':'xxx','url':'www.xx.com'}
		],
		bdcqszs:[
			{'name':'xxx','url':'www.xx.com'}
		],
		sqwts:[
			{'name':'xxx','url':'www.xx.com'}
		],
		gzs:[
			{'name':'xxx','url':'www.xx.com'}
		],
		zxh:[
			{'name':'xxx','url':'www.xx.com'}
		],
		others:[
			{'name':'xxx','url':'www.xx.com'}
		]
	}
});
*/

var fujian_table = new Vue({
	el:'#fujian_table',
	data:{
		djsqs:'',
		sqrzj:'',
		dyht:'',
		jkht:'',
		sqwts:'',
		gzs:'',
		zxh:'',
		others:''
	}
});

/*
var xtree = new Vue({
	el:'#xtree',
	data:{
		list:''
	}
});
*/

function updateDyqrDlr(arrList){
	//alert(arrList[0]['id']);
	console.log('updateDyqrDlr:');
	console.log( arrList);
	dyqrdlr_table.$data.todos.shift();
	var strBdcdyh = '';
	var arrDyxx = [];
	var arrTzxx = [];
	for(var i = 0; i < arrList.length; i++){
		dyqrdlr_table.$data.todos.push(arrList[i]);
	}	
	
	// 通知人信息		
	arrTzxx['slyh'] = 'bankname';
	arrTzxx['slry'] = 'slry';
	arrTzxx['tzr'] = 'tzr';
	arrTzxx['tzdh'] = 'tel';
	arrTzxx['tzrdz'] = 'address';
	arrTzxx['tzbz'] = 'bz';
	
	tzxx_table.$data.slyh = arrTzxx['slyh'];
	tzxx_table.$data.slry = arrTzxx['slry'];
	tzxx_table.$data.tzr = arrTzxx['tzr'];
	tzxx_table.$data.tzdh = arrTzxx['tzdh'];
	tzxx_table.$data.tzrdz = arrTzxx['tzrdz'];
	tzxx_table.$data.tzbz = arrTzxx['tzbz'];
	tzxx_table.$data.dbfw = arrTzxx['dbfw'];

}

function updateDyrDlr(arrList){
	//alert(arrList[0]['id']);
	console.log('updateDyrDlr:');
	console.log( arrList);
	dyrdlr_table.$data.todos.shift();
	var strBdcdyh = '';
	var arrDyxx = [];
	var arrTzxx = [];
	for(var i = 0; i < arrList.length; i++){
		dyrdlr_table.$data.todos.push(arrList[i]);
	}	
	
	// 通知人信息		
	arrTzxx['slyh'] = 'bankname';
	arrTzxx['slry'] = 'slry';
	arrTzxx['tzr'] = 'tzr';
	arrTzxx['tzdh'] = 'tel';
	arrTzxx['tzrdz'] = 'address';
	arrTzxx['tzbz'] = 'bz';
	
	tzxx_table.$data.slyh = arrTzxx['slyh'];
	tzxx_table.$data.slry = arrTzxx['slry'];
	tzxx_table.$data.tzr = arrTzxx['tzr'];
	tzxx_table.$data.tzdh = arrTzxx['tzdh'];
	tzxx_table.$data.tzrdz = arrTzxx['tzrdz'];
	tzxx_table.$data.tzbz = arrTzxx['tzbz'];
	tzxx_table.$data.dbfw = arrTzxx['dbfw'];
}

function updateJkr(arrList){
	//alert(arrList[0]['id']);
	console.log('updateJkr:');
	console.log( arrList);
	jkr_table.$data.todos.shift();
	var strBdcdyh = '';
	var arrDyxx = [];
	var arrTzxx = [];
	for(var i = 0; i < arrList.length; i++){
		jkr_table.$data.todos.push(arrList[i]);
	}	
	
	// 通知人信息		
	arrTzxx['slyh'] = 'bankname';
	arrTzxx['slry'] = 'slry';
	arrTzxx['tzr'] = 'tzr';
	arrTzxx['tzdh'] = 'tel';
	arrTzxx['tzrdz'] = 'address';
	arrTzxx['tzbz'] = 'bz';
	
	tzxx_table.$data.slyh = arrTzxx['slyh'];
	tzxx_table.$data.slry = arrTzxx['slry'];
	tzxx_table.$data.tzr = arrTzxx['tzr'];
	tzxx_table.$data.tzdh = arrTzxx['tzdh'];
	tzxx_table.$data.tzrdz = arrTzxx['tzrdz'];
	tzxx_table.$data.tzbz = arrTzxx['tzbz'];
	tzxx_table.$data.dbfw = arrTzxx['dbfw'];
}


function updateQz(arrList){
	//alert(arrList[0]['id']);
	console.log('updateQz:');
	console.log( arrList);
	qz_table.$data.todos.shift();
	dyr_table.$data.todos.shift();
	jkr_table.$data.todos.shift();
	var strBdcdyh = '';
	var arrDyr = [];
	var arrDyxx = [];
	var arrTzxx = [];
	var arrJkr = [];
	for(var i = 0; i < arrList.length; i++){
		qz_table.$data.todos.push(arrList[i]);

		// 户信息
		
		// 抵押人 信息填写
		// 提前生成 dyrbh ,共用 slbh这个唯一code
		arrDyr.push({
			'dyrbh':document.getElementById("slbh").value,
			'id':arrList[i]['id'],
			'name':arrList[i]['qlr'],
			'zjlx':arrList[i]['zjlx'],
			'zjh':arrList[i]['zjh'],
			'tel':arrList[i]['tel']
		});
		
		// 默认借款人 填写
		arrJkr.push({
			'jkrbh':document.getElementById("slbh").value,
			'id':arrList[i]['id'],
			'name':arrList[i]['qlr'],
			'zjlx':arrList[i]['zjlx'],
			'zjh':arrList[i]['zjh'],
			'tel':arrList[i]['tel']
		});
	}
	console.log('updateQz():qz_table');
	console.log(qz_table.$data.todos);
	
	console.log('arrDyr');
	console.log(arrDyr);
	for(var j = 0; j < arrDyr.length; j++){
		dyr_table.$data.todos.push(arrDyr[j]);
	}
	
	console.log('arrJkr');
	console.log(arrJkr);
	for(var j = 0; j < arrJkr.length; j++){
		jkr_table.$data.todos.push(arrJkr[j]);
	}
	
	//抵押权人信息
	dyqr_table.$data.slbh = document.getElementById("slbh").value;
	dyqr_table.$data.dyqrbh = document.getElementById("dyqrbh").value;
	dyqr_table.$data.name = document.getElementById("dyqr").value;
	dyqr_table.$data.zjlx = document.getElementById("zjlx").value;
	dyqr_table.$data.zjh = document.getElementById("zjh").value;
	dyqr_table.$data.tel = document.getElementById("tel").value;
	
	
	// 抵押信息		
	arrDyxx['bdcdyh'] = arrList[0]['bdcdyh'] + '...等';
	arrDyxx['zl'] = arrList[0]['zl'] + '...等';
	arrDyxx['ywlx'] = ''; // 暂为'',后边输入后再取值
	arrDyxx['dyfs'] = ''; // 暂为'',后边输入后再取值
	arrDyxx['dyje'] = ''; // 暂为'',后边输入后再取值
	arrDyxx['dymj'] = arrList[0]['jzmj'];
	arrDyxx['bdcjz'] =  ''; // 暂为'',后边输入后再取值
	arrDyxx['dbfw'] = '全部抵押';
	arrDyxx['stime'] = ''; // 暂为'',后边输入后再取值
	arrDyxx['etime'] = ''; // 暂为'',后边输入后再取值
	arrDyxx['dysw'] = arrList[0]['dyqk']; // dyqk:抵押情况
	
	dyxx_table.$data.bdcdyh = arrDyxx['bdcdyh'];
	dyxx_table.$data.zl = arrDyxx['zl'];
	dyxx_table.$data.ywlx = arrDyxx['ywlx'];
	dyxx_table.$data.dyfs = arrDyxx['dyfs'];
	dyxx_table.$data.dyje = arrDyxx['dyje'];
	dyxx_table.$data.dymj = arrDyxx['dymj'];
	dyxx_table.$data.bdcjz = arrDyxx['bdcjz'];
	dyxx_table.$data.dbfw = arrDyxx['dbfw'];
	dyxx_table.$data.stime = arrDyxx['stime'];
	dyxx_table.$data.etime = arrDyxx['etime'];
	dyxx_table.$data.dysw = arrDyxx['dysw'];

			
	console.log('updateQz():dyxx_table');
	console.log(dyxx_table.$data);
	// 通知人信息		
	arrTzxx['slyh'] = 'bankname';
	arrTzxx['slry'] = 'slry';
	arrTzxx['tzr'] = 'tzr';
	arrTzxx['tzdh'] = 'tel';
	arrTzxx['tzrdz'] = 'address';
	arrTzxx['tzbz'] = 'bz';
	
	tzxx_table.$data.slyh = arrTzxx['slyh'];
	tzxx_table.$data.slry = arrTzxx['slry'];
	tzxx_table.$data.tzr = arrTzxx['tzr'];
	tzxx_table.$data.tzdh = arrTzxx['tzdh'];
	tzxx_table.$data.tzrdz = arrTzxx['tzrdz'];
	tzxx_table.$data.tzbz = arrTzxx['tzbz'];
	tzxx_table.$data.dbfw = arrTzxx['dbfw'];
}
 
$('#searchQz').on('click', function(){
    perContent = layer.open({
					type: 2,
					title: '增加相关权证',
					maxmin: true,
					area: ['800px', '500px'],
					content: '<?php \Cml\Http\Response::url("bank/Apply/searchQz");?>',
					end: function(){
					}
				 });
	//layer.full(perContent);
});
function delQz(qzId){
	layer.confirm('确定删除'+qzId+'？', {
	  btn: ['是的','放弃'] //按钮
	}, function(){
		layer.closeAll('dialog');
		qz_table.$data.todos.splice(qzId, 1);
	}, function(){
		//
	});
}

$('#addDyqrdlr').on('click', function(){
    layer.open({
		type: 2,
		title: '增加抵押权人代理人',
		maxmin: true,
		area: ['800px', '500px'],
	/*	btn: ['确定','放弃'],
		yes:function(index, layero){
			// 
			arrDyqrdlr = [
					{
						'id':'id',
						'name':'押权人代理人',
						'zjlx':'zjlx',
						'zjh':'zjh',
						'tel':'tel'
					}
			];
			
			dyqrdlr_table.$data.todos.shift();
			for(var i = 0; i < arrDyqrdlr.length; i++){
				dyqrdlr_table.$data.todos.push(arrDyqrdlr[i]);
			}	
			layer.close(index);
		},
	*/
		content: '<?php \Cml\Http\Response::url("bank/Apply/addDyqrdlr");?>?dyqrbh=' + document.getElementById('dyqrbh').value + '&dlrbh=' + document.getElementById('slbh').value
	 });
});
function delDyqrdlr(DyqrdlrId){
	layer.confirm('确定删除'+DyqrdlrId+'？', {
	  btn: ['是的','放弃'] //按钮
	}, function(){
		layer.closeAll('dialog');
		dyqrdlr_table.$data.todos.splice(DyqrdlrId, 1);
	}, function(){
		//
	});
}

$('#addDyrdlr').on('click', function(){
console.log(dyr_table.$data.todos);
	var strDyrbh = dyr_table.$data.todos[0]['dyrbh'];// 暂不考虑多个抵押人情况,就用 共用code作为 拟生成的 dyrbh
	var strDlrbh = document.getElementById('slbh').value; // 此处bug
	console.log('strDyrbh:');
	console.log(strDyrbh);
    layer.open({
		type: 2,
		title: '增加抵押人代理人',
		maxmin: true,
		area: ['800px', '500px'],
	/*	btn: ['确定','放弃'],
		yes:function(index, layero){
			// 
			arrDyrdlr = [
					{
						'id':'id',
						'name':'抵押人代理人',
						'zjlx':'zjlx',
						'zjh':'zjh',
						'tel':'tel'
					}
			];
			
			dyrdlr_table.$data.todos.shift();
			for(var i = 0; i < arrDyrdlr.length; i++){
				dyrdlr_table.$data.todos.push(arrDyrdlr[i]);
			}	
			layer.close(index);
		},
	*/
		content: '<?php \Cml\Http\Response::url("bank/Apply/addDyrdlr");?>?strDyrbh=' + strDyrbh + '&strDlrbh=' + strDlrbh
	 });
});
function delDyrdlr(DyrdlrId){
	layer.confirm('确定删除'+DyrdlrId+'？', {
	  btn: ['是的','放弃'] //按钮
	}, function(){
		layer.closeAll('dialog');
		dyrdlr_table.$data.todos.splice(DyrdlrId, 1);
	}, function(){
		//
	});
}

$('#addJkr').on('click', function(){
	var strJkrbh = document.getElementById("slbh").value;// 暂不考虑多个抵押人情况,就用 共用code作为 拟生成的 dyrbh
    layer.open({
		type: 2,
		title: '增加借款人',
		maxmin: true,
		area: ['800px', '500px'],
	/*	btn: ['确定','放弃'],
		yes:function(index, layero){
			// 
			arrJkr = [
					{
						'jkrbh':'jkrbh',
						'name':'借款人',
						'zjlx':'zjlx',
						'zjh':'zjh',
						'tel':'tel'
					}
			];
			
			jkr_table.$data.todos.shift();
			for(var i = 0; i < arrJkr.length; i++){
				jkr_table.$data.todos.push(arrJkr[i]);
			}	
			layer.close(index);
		},
	*/
		content: '<?php \Cml\Http\Response::url("bank/Apply/addJkr");?>?strJkrbh=' + strJkrbh,
	 });
});
function delJkr(JkrId){
	layer.confirm('确定删除'+JkrId+'？', {
	  btn: ['是的','放弃'] //按钮
	}, function(){
		layer.closeAll('dialog');
		jkr_table.$data.todos.splice(JkrId, 1);
	}, function(){
		//
	});
}

function delUploadFile(index){
	layer.confirm('确定删除'+index+'？', {
	  btn: ['是的','放弃'] //按钮
	}, function(){
		layer.closeAll('dialog');
		uploadFileList_table.$data.todos.splice(index, 1);
		$('#selectFile').val('');
		$('#selectedPath').val('');
	}, function(){
		//
	});
}

function uploadFileList(tableIndex){
	layer.confirm('确定删除'+tableIndex+'？', {
	  btn: ['是的','放弃'] //按钮
	}, function(){
		layer.closeAll('dialog');
		uploadFileList.$data.todos.splice(tableIndex, 1);
	}, function(){
		//
	});
}


function getDyxxInfo(){
	switch( document.getElementById('dyfs').value ){
		case '0':
			dyxx_table.$data['dyfs'] = '一般抵押';
		case '1':
			dyxx_table.$data['dyfs'] = '最高额抵押';
		
	}
	
	switch( document.getElementById('ywlx').value ){
		case '0':
			dyxx_table.$data['ywlx'] = '普通抵押';
		case '1':
			dyxx_table.$data['ywlx'] = '预告抵押';
		case '2':
			dyxx_table.$data['ywlx'] = '在建抵押';
	}
	
	dyxx_table.$data['dyje'] = document.getElementById('dyje').value;
	dyxx_table.$data['bdcjz'] = document.getElementById('bdcjz').value;
	dyxx_table.$data['dbfw'] = document.getElementById('dbfw').value;
	dyxx_table.$data['stime'] = document.getElementById('stime').value;
	dyxx_table.$data['etime'] = document.getElementById('etime').value;
	
	console.log(dyxx_table.$data);
	return;
}

function saveApply(){
	// 先取得 录入/选择 的抵押信息
	getDyxxInfo();

    // post 申请信息
	base_table.$data.slbh = document.getElementById("slbh").value;
	base_table.$data.dyqr = document.getElementById("dyqr").value;
	base_table.$data.dyqrbh = document.getElementById("dyqrbh").value;
	base_table.$data.created_at = document.getElementById("created_at").value;
	//console.log(base_table.$data.slbh);
	// apply 表
	var tbApply = {
		'slbh':base_table.$data.slbh,
		'qzbh':qz_table.$data.todos[0]['qzbh'],
		'created_at':base_table.$data.created_at,
		'dyqrbh':base_table.$data.dyqrbh,
		'ywlx':dyxx_table.$data['ywlx'],
		'dyfs':dyxx_table.$data['dyfs'],
		'dyje':dyxx_table.$data['dyje'],
		'dymj':dyxx_table.$data['dymj'],
		'bdcjz':dyxx_table.$data['bdcjz'],
		'dbfw':dyxx_table.$data['dbfw'],
		'stime':dyxx_table.$data['stime'],
		'etime':dyxx_table.$data['etime'],
		'dysw':dyxx_table.$data['dysw'],
		'slry':tzxx_table.$data['slry'],
		'tzr':tzxx_table.$data['tzr'],
		'tzdh':tzxx_table.$data['tzdh'],
		'tzrdz':tzxx_table.$data['tzrdz'],
		'tzbz':tzxx_table.$data['tzbz'],
		'status':'暂存(未提交)'
	};
	// qz 表
	var tbQz = {
		'slbh':base_table.$data.slbh,
		'qzbh':qz_table.$data.todos[0]['qzbh'],
		'bdczh':qz_table.$data.bdczh,
		'zjlx':qz_table.$data.zjlx
	};
	// dyqr 表
	var tbDyqr = {
		'slbh':base_table.$data.slbh,
		'dyqrbh':dyqr_table.$data.dyqrbh,
		'name': dyqr_table.$data.name,
		'zjlx': dyqr_table.$data.zjlx,
		'zjh': dyqr_table.$data.zjh,
		'tel': dyqr_table.$data.tel
	};
	// hb 表
	var tbHb = [];
	for(var i = 0; i < qz_table.$data.todos.length; i++){
		var arr = {
			'slbh':base_table.$data.slbh,
			'hbh':qz_table.$data.todos[i]['hbh'],
			'bdcdyh':qz_table.$data.todos[i]['bdcdyh'],
			'qzbh':qz_table.$data.todos[i]['qzbh'],
			'zl':qz_table.$data.todos[i]['zl'],
			'jzmj':qz_table.$data.todos[i]['jzmj'],
			'dyqk':qz_table.$data.todos[i]['dyqk'],
			'xzxx':qz_table.$data.todos[i]['xzxx']
		};
		tbHb.push(arr);
	};
	
	// qlr 表
	var tbQlr = [];
	for(var i = 0; i < dyr_table.$data.todos.length; i++){
		var arr = {
			'slbh':base_table.$data.slbh,
			'qlrbh':dyr_table.$data.todos[i]['dyrbh'],
			'qzbh':qz_table.$data.todos[0]['qzbh'],
			'name':dyr_table.$data.todos[i]['name'],
			'zjlx':dyr_table.$data.todos[i]['zjlx'],
			'zjh':dyr_table.$data.todos[i]['zjh'],
			'tel':dyr_table.$data.todos[i]['tel']
		};
		tbQlr.push(arr);
	};
	
	// dyqr_dlr 表
	var tbDyqrdlr = [];
	for(var i = 0; i < dyqrdlr_table.$data.todos.length; i++){
		var arr = {
			'dlrbh':dyqrdlr_table.$data.todos[i]['dlrbh'],
			'dyqrbh':dyqrdlr_table.$data.todos[i]['dyqrbh'],
			'slbh':base_table.$data.slbh,
			'name':dyqrdlr_table.$data.todos[i]['name'],
			'zjlx':dyqrdlr_table.$data.todos[i]['zjlx'],
			'zjh':dyqrdlr_table.$data.todos[i]['zjh'],
			'tel':dyqrdlr_table.$data.todos[i]['tel']
		};
		tbDyqrdlr.push(arr);
	};
	
	// dyr_dlr 表
	var tbDyrdlr = [];
	for(var i = 0; i < dyrdlr_table.$data.todos.length; i++){
		var arr = {
			'dlrbh':dyrdlr_table.$data.todos[i]['dlrbh'],
			'dyrbh':dyrdlr_table.$data.todos[i]['dyrbh'],
			'slbh':base_table.$data.slbh,
			'name':dyrdlr_table.$data.todos[i]['name'],
			'zjlx':dyrdlr_table.$data.todos[i]['zjlx'],
			'zjh':dyrdlr_table.$data.todos[i]['zjh'],
			'tel':dyrdlr_table.$data.todos[i]['tel']
		};
		tbDyrdlr.push(arr);
	};
	
	// jkr 表
	var tbJkr = [];
	for(var i = 0; i < jkr_table.$data.todos.length; i++){
		var arr = {
			'slbh':base_table.$data.slbh,
			'jkrbh':jkr_table.$data.todos[i]['jkrbh'],
			'name':jkr_table.$data.todos[i]['name'],
			'zjlx':jkr_table.$data.todos[i]['zjlx'],
			'zjh':jkr_table.$data.todos[i]['zjh'],
			'tel':jkr_table.$data.todos[i]['tel']
		};
		tbJkr.push(arr);
	};
	
	// fujian 表 已提前写入数据库
	//for(var i = 0; i < fujian_table.$data.length; i++){
		var tbFj = {
			slbh:base_table.$data.slbh,
			djsqs:fujian_table.$data.djsqs,
			sqrzj:fujian_table.$data.sqrzj,
			dyht:fujian_table.$data.dyht,
			jkht:fujian_table.$data.jkht,
			sqwts:fujian_table.$data.sqwts,
			gzs:fujian_table.$data.gzs,
			zxh:fujian_table.$data.zxh,
			others:fujian_table.$data.others
		};
	//};
	

	//
	
	console.log(tbApply);
	console.log(tbQz);
	console.log(tbDyqr);
	console.log(tbHb);
	console.log(tbQlr);
	console.log(tbDyqrdlr);
	console.log(tbDyrdlr);
	console.log(tbJkr);
	console.log(tbFj);
	
	var arrSaveApply = {
		tbApply:JSON.stringify(tbApply),
		tbQz:JSON.stringify(tbQz),
		tbDyqr:JSON.stringify(tbDyqr),
		tbHb:JSON.stringify(tbHb),
		tbQlr:JSON.stringify(tbQlr),
		tbDyqrdlr:JSON.stringify(tbDyqrdlr),
		tbDyrdlr:JSON.stringify(tbDyrdlr),
		tbJkr:JSON.stringify(tbJkr),
		tbFj:JSON.stringify(tbFj)
	};
	
	console.log(arrSaveApply);

	//发送数据 写入各个数据表
	var flag = false;
	$.ajax({
		type:'POST',
		url:'<?php \Cml\Http\Response::url("bank/Apply/saveApply");?>',
		data:arrSaveApply,
		async:false,
		success:function(result){
			console.log(result);
			//delete result['sql'];
			//result = eval('(' + result + ')');
			if(0 == result.code){
				layer.msg('数据保存成功！');
				flag = true;
			}
		}
	});
	console.log(flag);
	return flag;
};

function buildFuJianJson(){
	var arrFj = [];	
	var arrTmp = [];
	
	arrTmp = fujian_table.$data.djsqs.split(';');
	for(var i = 0; i < arrTmp.length; i++){
		arrFj.push({
						"name": arrTmp[i],
						"url": 'djsqs/' + arrTmp[i]
		});
	}
	
	arrTmp = fujian_table.$data.sqrzj.split(';');
	for(var i = 0; i < arrTmp.length; i++){
		arrFj.push({
						"name": arrTmp[i],
						"url": 'sqrzj/' + arrTmp[i]
		});
	}
	arrTmp = fujian_table.$data.dyht.split(';');
	for(var i = 0; i < arrTmp.length; i++){
		arrFj.push({
						"name": arrTmp[i],
						"url": 'dyht/' + arrTmp[i]
		});
	}
	arrTmp = fujian_table.$data.jkht.split(';');
	for(var i = 0; i < arrTmp.length; i++){
		arrFj.push({
						"name": arrTmp[i],
						"url": 'jkht/' + arrTmp[i]
		});
	}
	arrTmp = fujian_table.$data.sqwts.split(';');
	for(var i = 0; i < arrTmp.length; i++){
		arrFj.push({
						"name": arrTmp[i],
						"url": 'sqwts/' + arrTmp[i]
		});
	}
	arrTmp = fujian_table.$data.gzs.split(';');
	for(var i = 0; i < arrTmp.length; i++){
		arrFj.push({
						"name": arrTmp[i],
						"url": 'gzs/' + arrTmp[i]
		});
	}
	arrTmp = fujian_table.$data.zxh.split(';');
	for(var i = 0; i < arrTmp.length; i++){
		arrFj.push({
						"name": arrTmp[i],
						"url": 'zxh/' + arrTmp[i]
		});
	}
	arrTmp = fujian_table.$data.others.split(';');
	for(var i = 0; i < arrTmp.length; i++){
		arrFj.push({
						"name": arrTmp[i],
						"url": 'others/' + arrTmp[i]
		});
	}
	
	return arrFj;
}

function buildApplyApi(){
	// api 
	var arrJkr = [];
	for(var i = 0; i < jkr_table.$data.todos.length; i ++){
		arrJkr.push({
						"name": jkr_table.$data.todos[i]['name'],
						"xh": jkr_table.$data.todos[i]['jkrbh'],
						"zjlx": jkr_table.$data.todos[i]['zjlx'],
						"zjh": jkr_table.$data.todos[i]['zjh'],
						"tel": jkr_table.$data.todos[i]['tel']
		});
	}
	
	// 附件
	var arrFj = [];
	arrFj = buildFuJianJson();
			
	var arrApply = {
			"uid": base_table.$data.slbh,
			"qzslbh":[
					qz_table.$data.todos[0]['qzbh']
			],
			"sqsj": base_table.$data.created_at,
			"dyqr":[{
				"name": dyqr_table.$data.name,
				"xh": dyqr_table.$data.dyqrbh,
				"zjlx": dyqr_table.$data.zjlx,
				"zjh": dyqr_table.$data.zjh,
				"tel": dyqr_table.$data.tel,
			}],
			"dyqrdlr":[{
				"name": dyqrdlr_table.$data.todos[0]['name'],
				"xh": dyqrdlr_table.$data.todos[0]['dlrbh'],
				"zjlx": dyqrdlr_table.$data.todos[0]['zjlx'],
				"zjh": dyqrdlr_table.$data.todos[0]['zjh'],
				"tel": dyqrdlr_table.$data.todos[0]['tel']
			}],
			"dyrdlr":[{
				"name": dyrdlr_table.$data.todos[0]['name'],
				"xh": dyrdlr_table.$data.todos[0]['dlrbh'],
				"zjlx": dyrdlr_table.$data.todos[0]['zjlx'],
				"zjh": dyrdlr_table.$data.todos[0]['zjh'],
				"tel": dyrdlr_table.$data.todos[0]['tel']
			}],
			"ywlx": dyxx_table.$data.ywlx,
			"dyfs": dyxx_table.$data.dyfs,
			"dyje": dyxx_table.$data.dyje,
			"stime": dyxx_table.$data.stime,
			"etime": dyxx_table.$data.etime,
			"dysw": dyxx_table.$data.dysw,
			"htbh": "增加什么合同编号??",//todo ;增加合同编号
			"dymj" : dyxx_table.$data.dymj,
			"zjjzwzl" : "在建建筑物坐落?",
			"zjjzwdyfw" : "在建建筑物抵押范围?",
			"dbfw" : dyxx_table.$data.dbfw,
			"jkr":arrJkr,
			"links":arrFj,
			"slry": tzxx_table.$data.slry,
			"tzr": tzxx_table.$data.tzr,
			"tzdh": tzxx_table.$data.tzdh,
			"tzrdz": tzxx_table.$data.tzrdz,
			"tzbz": tzxx_table.$data.tzbz,
	};
console.log('send apply:arrApply');
console.log(arrApply);	
	return arrApply;
}

$('#submitApply').on('click', function(){
	layer.confirm('确认提交申请?', {
	  btn: ['是的','放弃'] //按钮
	},function(){
		// 先保存申请信息
		if(true == saveApply()){
			console.log('saveApply success ');
			$.ajax({
				type:'POST',
				dataType:'json',
				async : false,
				url:'<?php \Cml\Http\Response::url("bank/Apply/apply");?>',
				data:{'apply':buildApplyApi()},
				success:function(result){
					console.log('apply success:result');
					console.log(result);
					layer.closeAll('dialog');
					if(0 == result.code){ // 提交成功后的反馈信息处理
						$.ajax({
							type:'POST',
							dataType:'json',
							async : false,
							url:'<?php \Cml\Http\Response::url("bank/Apply/updateApplyStatus");?>',
							data:{'status':'success'},
							success:function(result){
								//console.log('update apply table status:' + result.data.list[0]['errinfo']);
													//jkr_table.$data.todos.splice(JkrId, 1);
								console.log('updateApplyStatus success');
								//if(0 == result.code){
									layer.alert('申请提交成功！请到 【申请查询】 页面查看受理情况!', function(){
										window.location.reload();
									});
							//	}
							}
						});

					}else{
						
					}
				}
			});	
		}

	},function(){
		
	});
});






layui.use('laydate', function(){
	var laydate = layui.laydate;
	
	laydate.render({
	elem: '#stime'
	,done: function(value, date){
		//layer.alert('你选择的日期是：' + value + '<br>获得的对象是' + JSON.stringify(date));
		var arrTmp = dyxx_table.$data;
		console.log(arrTmp);
		arrTmp['stime'] = value;
		dyxx_table.$data.stime = arrTmp['stime'];
	}
	});
	
	laydate.render({
	elem: '#etime'
	,done: function(value, date){
		//layer.alert('你选择的日期是：' + value + '<br>获得的对象是' + JSON.stringify(date));
		var arrTmp = dyxx_table.$data;
		console.log(arrTmp);
		arrTmp['etime'] = value;
		dyxx_table.$data.stime = arrTmp['etime'];
	}
	});
  
});

// 自定义 tree, 利用 layui tree
	
var editObj=null,ptable=null,treeGrid=null,tableId='treeTable',layer=null;
var objSelectTree = null;// 保存当前选择的tree obj
var arrNode = []; // 保存treeGrid添加的 单条记录信息
layui.config({
	base: '<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/plugins/extend/");?>'
}).extend({
	treeGrid:'treeGrid'
}).use(['jquery','treeGrid','layer', 'upload'], function(){
	var $=layui.jquery;
	treeGrid = layui.treeGrid;//很重要
	layer=layui.layer;
	
	//申请tree数据 并 创建 treeGrid组件 进行渲染
	$.ajax({
            type: 'post',
            url: '<?php \Cml\Http\Response::url("bank/Apply/ajaxUpdateTreePath");?>',
            dataType:'json',
            success:function(res){
				console.log(res);
				delete res['sql']; // 去除debug 增加的 sql 字符串
				//console.log(res.data);
				res =  eval('(' + res.data + ')'); // 截取的部分 json结构需要再次转换未json对象
                if(res.code =='0'){
                    //var message=res.msg;
                    arrTreeData=res.data;
					tmpRes = arrTreeData; // 保存服务器返回的 数据
					console.log('tree post tmpRes:' + tmpRes[0].id);
                    ptable=treeGrid.render({
						id:tableId
						,elem: '#'+tableId
						,idField:'id'
						//,url:'<?php \Cml\Http\Response::url("bank/Apply/ajaxUpdateTreePath");?>'
						,cellMinWidth: 100
						,treeId:'id'//树形id字段名称s
						,treeUpId:'pId'//树形父id字段名称
						,treeShowName:'name'//以树形式显示的字段
						,cols: [[
							{field:'name',  title: '目录名称', align:'center'}
							,{
								title: '操作',
								align:'center'/*toolbar: '#barDemo'*/
								,width:110
								,templet: function(d){
						console.log('treeGrid template: d.id:' + d.id);
									var html='';
									var addBtn='<a class="layui-btn layui-btn-primary layui-btn-xs" id="' + d.id + '"  lay-event="add">添加</a>';
									var delBtn='<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>';
									return addBtn+delBtn;
								}
							}
						]]
						,data: arrTreeData // 添加数据
						,page:false
					});
                }
            },
            error:function(){

            }
    });
		
	treeGrid.on('tool('+tableId+')',function (obj) {
		
		objSelectTree = obj.data;//保存当前操作的 tree obj 为全局变量
		console.log('treeGird on:objSelectTree:');
		console.log(objSelectTree);
		if(obj.event === 'del'){//删除行
			delNode(obj);
		}else if(obj.event==="add"){//添加行
			addNode(obj); // 处理 tree grid 显示 及 uploadlist table 显示 因为异步的原因，此时 最新的选择还未完成
			//updateFujianTable( treeGrid );// 处理附件数据结构
			console.log('finished add:obj:');
			console.log(obj);
		}
	});
	
/*	$(function(){  
		$("#previewFile").click(function(){  
			var _this = $(this);//将当前的pimg元素作为_this传入函数  
			imgShow("#outerdiv", "#innerdiv", "#bigimg", _this);  
			
		});  
	});
*/
		
});

// 处理附件数据结构
// 将选择上传过的 最新附件信息保存入  fujian_table结构中
function updateFujianTable(){
	list = treeGrid.getDataList(tableId) || [];
	fujian_table.$data = [];// 清空
	for(var i = 0; i < list.length; i++){
		var path = list[i]['id'];
		path = path.substring(0, path.indexOf('_'));
		if( '' != path){
			switch( path ){
				case 'djsqs':
					fujian_table.$data.djsqs += list[i]['name'] + ';';
					break;
				case 'sqrzj':
					fujian_table.$data.sqrzj += list[i]['name'] + ';';
					break;
				case 'dyht':
					fujian_table.$data.dyht += list[i]['name'] + ';';
					break;
				case 'jkht':
					fujian_table.$data.jkht += list[i]['name'] + ';';
					break;
				case 'sqwts':
					fujian_table.$data.sqwts += list[i]['name'] + ';';
					break;
				case 'gzs':
					fujian_table.$data.gzs += list[i]['name'] + ';';
					break;
				case 'zxh':
					fujian_table.$data.zxh += list[i]['name'] + ';';
					break;
				case 'others':
					fujian_table.$data.others += list[i]['name'] + ';';
					break;				
			}
		}
	}
	console.log('updateFujianTable:fujian_table.$data:');
	console.log(fujian_table.$data);
}

/**
 * updateFujianTable    将最新的附件上传信息更新到 界面及  fujian_table
 */
function uploadFujianFile() {
		
/*	//JQuery异步上传插件	
	$.ajaxFileUpload 
	(
		{
			url: '<?php \Cml\Http\Response::url("bank/Apply/testUpLoad");?>',  //用于文件上传的服务器端请求地址
			type: 'post',
			data: treeGrid,
			secureuri: false, //是否需要安全协议，一般设置为false
			fileElementId: 'uploadFileList', //文件上传域的ID
			dataType: 'text', //返回值类型 一般设置为json
			success: function (data, status)  //服务器成功响应处理函数
			{
				var data=eval("("+data+")")
				if (typeof (data.error) != 'undefined') {
					if (data.error != '') {
						alert(data.error);
					} else {
						alert(data.msg);
						$("#img1").attr("src", data.imgurl);
					}
				}
			},
			error: function (data, status, e)//服务器响应失败处理函数
			{
				top.layer.close(load);//关闭上传提示窗口
				var tr = uploadFileList.find('tr#upload-'+ index)
				,tds = tr.children();
				tds.eq(4).html('<span style="color: #FF5722;">上传失败</span>');
				tds.eq(5).find('.demo-reload').removeClass('layui-hide'); //显示重传
			}
		}
	);
*/	
	// 更新 treeGrid 变动
	add(arrNode);
	// 保存数据到 fujian_table
	updateFujianTable( treeGrid );// 处理附件数据结构
	
	// 清空数据
	arrNode = [];// 
	objSelectTree = null;
	console.log('finished add: treeGrid:');
	console.log(treeGrid);
	uploadFileList_table.$data.todos =[];
	layer.msg('上传成功!');
	return false;
}

function delNode(obj){
	// 遍历 checked 所有 固定节点不能删除
	console.log(obj);
	if( !isFixedNode(obj.data.id) ){
		del(obj);
	}else{
		layer.alert('固定目录不能被删除!');
	}
}

function isFixedNode(id){
	console.log('isFixedNode:id' + id);
	var arrName = ['root', 'djsqs','sqrzj','dyht','jkht','sqwts','gzs','zxh','others'];
	for(var i in arrName){
		if(arrName[i] == id){
			return true;
		}
	}
	return false;
}

function isRootOrEndNode(pObj){

	// 包含'_'的是 子节点
	if( pObj['id'].indexOf('_') > -1){
		return true;
	}else if( pObj['id'] == 'root'){ // 根目录也不允许添加
		return true;
	}
	return false;
}

function uploadFun(nodeName){
	// 触发 选择框
	document.getElementById('selectFile').click();
	// 保存选择的上传目录信息
	$('#selectedPath').val(nodeName);
	// 手动触发 change事件
	$("#selectedPath").trigger("change");
}

$('#selectedPath').change(function(){
		// 清空 文件信息 ,强制触发 selectFile change 
		$('#selectFile').val('');
});

// input file 取得的fileList 需要转换成json格式的对象才能够用
function multiFilesToJsonString(multiFiles){
    var files = multiFiles;//document.getElementById("myFiles").files;
    var myArray = [];
    var file = {};

    console.log(files); // see the FileList

    // manually create a new file obj for each File in the FileList
    //for(var i = 0; i < files.length; i++){

      file = {
          'lastMod'    : files.lastModified,//files[i].lastModified,
          'lastModDate': files.lastModifiedDate,//files[i].lastModifiedDate,
          'name'       : files.name,//files[i].name,
          'size'       : files.size,//files[i].size,
          'type'       : files.type,//files[i].type,
      } 

      //add the file obj to your array
      myArray.push(file)
    //}

    //stringify array
    console.log(JSON.stringify(myArray));
	return JSON.stringify(myArray);
}

$('#selectFile').change(function(event){
	// 若 selectedPath 被改变 且 
	// 该文件还未被选择
	if( '' == $('#selectFile').val() ){
		return ;
	}
	// 多文件选择处理
	var multiFiles = event.target.files;// 一次选择多个文件
	console.log('multiFiles:');
	console.log(multiFiles);
	for(var i = 0; i < multiFiles.length; i++){
		console.log('selectedPath changed.');
		var selectedFile = multiFiles[i]['name'];
		console.log('#selectFile:selectedFile' + selectedFile);
		var fileName = getFileName( selectedFile ); 
		// 产生 被选择file 的img url供预览
		var imgUrl = buildImgUrl(multiFiles[i]);
		// 处理选择的文件重复问题(upload list table 中重复)
		if( !isFileSelected( $('#selectedPath').val(), fileName ) ){
			// 处理 文件已经上传过的问题(treeGird list table 中重复)
			oneFile = multiFiles[i]; // 保存 文件数据 layer.confirm是异步的,for循环有可能在 layer之前执行,从而提前清空 multiFiles
			if( isFileUploaded( objSelectTree.id, fileName ) ){
				// 提示文件已经上传过
				_this = this;// 弹窗后会丢失 this, 故先保存
				layer.confirm("文件 【 " + fileName + " 】 已经上传过了，继续上传该文件吗？", {icon: 3, title:'提示'},
					function(index, layero){// 若继续上传则修改文件名
						// 修改文件名称为 xxx(1).png
						var newFileName = buildNewFileName(fileName);
						console.log('new fileName:' + newFileName);
						uploadFileList_table.$data.todos =[];
						console.log('#selectFile in isFileUploaded:');
						console.log(_this);
						uploadFileList_table.$data.todos.push({
								id: $('#selectedPath').val(),
								name: newFileName,
								size: Math.round( oneFile['size']/1024 ) + 'kb', 
								type: oneFile['type'], // 文件后缀
								selectedPath:$('#selectedPath').val(),
								imgUrl: imgUrl,
								status:'等待上传'
						});
						console.log(uploadFileList_table);
						
						// 全局变量: 保存新增加的文件信息 到 treeGrid
						arrNode.push({
								'index':objSelectTree.LAY_TABLE_INDEX,
								'id':objSelectTree.id +'_'+ newFileName,
								'name':newFileName,
								'children':[],
								'pId':objSelectTree.id
							});
						console.log('arrNode for added tree :');
						console.log(arrNode);
						layer.close(index);
					},function (index) {
					   layer.close(index);
					}
				);	
			}else{
				console.log('selectFile val:' + $('#selectFile').val());
				for(var i = 0; i < uploadFileList_table.$data.todos.length; i++){
					if( '' == uploadFileList_table.$data.todos[i]['name']){
						uploadFileList_table.$data.todos.splice(i);
					}
				}
				uploadFileList_table.$data.todos.push({
						id: $('#selectedPath').val(),
						name: fileName,
						size: Math.round( oneFile['size']/1024 ) + 'kb', 
						type: oneFile['type'], // 文件后缀
						selectedPath:$('#selectedPath').val(),
						imgUrl: imgUrl,
						status:'等待上传'
				});
				console.log(uploadFileList_table);
				
				// 全局变量: 保存新增加的文件信息 到 treeGrid
				arrNode.push({
						'index':objSelectTree.LAY_TABLE_INDEX,
						'id':objSelectTree.id +'_'+ fileName,
						'name':fileName,
						'children':[],
						'pId':objSelectTree.id
					});
				console.log('arrNode for added tree :');
				console.log(arrNode);
				
			}
		}else{
			layer.msg('该文件已添加!');
		}
	} // endfor multiFiles
	
	// 清空
	$('#selectFile').val('');
});

// 从 input file 中生产 imgUrl 供预览用
function buildImgUrl(file, imgMaxSize = 2){
	//var files = changeFileEvent.target.files, file;
	//var file;
	//if (files && files.length > 0) {
		  // 获取目前上传的文件
		//  file = files[0];
		  // 来在控制台看看到底这个对象是什么
		  console.log(file);
		  // 那么我们可以做一下诸如文件大小校验的动作
		  if( file.size > 1024 * 1024 * imgMaxSize ) {
			alert('图片大小不能超过 ' + imgMaxSize + 'MB!');
			return false;
		  }
		  // 获取 window 的 URL 工具     
		  var URL = window.URL || window.webkitURL;     
		  // 通过 file 生成目标 url
		  var imgURL = URL.createObjectURL(file);
		  // 用这个 URL 产生一个 <img> 将其显示出来
		  return imgURL;
		//  $('#' + showImgId ).attr('src', imgURL);
		  // 使用下面这句可以在内存中释放对此 url 的伺服，跑了之后那个 URL 就无效了
			 //URL.revokeObjectURL(imgURL);
	// }
}

// 生成 新文件名如:xxx(20180912111).png
function buildNewFileName(fileName){
	return ( fileName.split( fileName.lastIndexOf(".") ) )
							+ '(' + Number(new Date()) + ')' 
							+ ( fileName.split('.').splice(-1) );
}
// 是否选择指定的 文件夹 文件
// 同一文件夹下相同文件名 则 true 。不同文件夹下相同文件为 false
function isFileSelected(selectedPath, fileName){
	console.log('selectedPath:' +selectedPath+ 'fileName:' + fileName );
	for(var i = 0; i < uploadFileList_table.$data.todos.length; i++){
		if( selectedPath == uploadFileList_table.$data.todos[i]['selectedPath'] && fileName == uploadFileList_table.$data.todos[i]['name'] )
			return true;
	}
	return false;
}

// 是否文件已上传到当前 选定目录里
// 同一文件夹下相同文件名 则 true 。不同文件夹下相同文件为 false
function isFileUploaded(selectedPath, fileName){
	console.log('selectedPath in isFileUploaded():');
	console.log( selectedPath  );
	console.log('fileName in isFileUploaded():' + fileName );
	var list = treeGrid.getDataList(tableId) || [];
	for(var i = 0; i < list.length; i++){
		console.log('list[id] in isFileUploaded: ' + list[i]['id']);
		console.log('list[name] in isFileUploaded: ' + list[i]['name']);
		if( (selectedPath + '_' + fileName) == list[i]['id'] && fileName == list[i]['name']){
			return true;
		}
	}
	return false;
}

function getFileName( filePath ){
	console.log('in getFileName:filePath:' + filePath);
	var str = filePath;
    if(str!==""){
            var arr = str.split("\\");
            var str = arr[arr.length-1];
	} 
	return str;
}

function addNode(obj){
//var obj = {'data':{'id':"gzs"}};
//var arrNode = {'id':"gzs_01", 'name':"公证书01.png", 'children':[], 'pId':obj.data.id};
	console.log('in addNode obj:');
	console.log(obj);
	if( !isRootOrEndNode(obj.data) ){
		// 触发 upload组件
		//console.log('triger node button: id:' + obj.data.id);
		uploadFun(obj.data.name);
		//layer.msg('添加成功!');
	}else{
		layer.alert('请选择正确的目录再添加文件!');
	}
}

function del(obj) {
	layer.confirm("你确定删除数据吗？此操作不能撤销！", {icon: 3, title:'提示'},
		function(index){//确定回调
			obj.del();
			layer.close(index);
		},function (index) {//取消回调
		   layer.close(index);
		}
	);
}


var i=1000;
//添加
function add(arrNode) {
	// 首先对 arrNode 处理。保证循环插入时 table index 不会发生错乱
	arrNode = sortArrNode(arrNode);
	for(var i = 0; i < arrNode.length; i++){
		var param={};
		param.name=arrNode[i]['name'];
		param.id=arrNode[i]['id'];
		param.pId=arrNode[i]['pId'];
		treeGrid.addRow(tableId, arrNode[i]['index'] + 1,param);
	}	
}

// 首先对 arrNode 处理。保证循环插入时 table index 不会发生错乱
// treeGrid table 中用 index 定位记录，当有多个目录需要同时插入时，index下表重排序后会影响 后去插入的index位置
// 通过对 插入顺序的排序 保证先插入 index大的 记录，再插入index小的数据 ，这样index重排时不会导致index定位错乱
function sortArrNode(arrNode){
	// 根据index 有大到小排序
	var tmp = 0;
	//冒泡排序
	for(var j=0;j<arrNode.length-1;j++){
    //两两比较，如果前一个比后一个大，则交换位置。
       for(var i=0;i<arrNode.length-1-j;i++){
            if( arrNode[i]['index'] < arrNode[i+1]['index'] ){
                var tmp = arrNode[i];
                arrNode[i] = arrNode[i+1];
                arrNode[i+1] = tmp;
            }
        } 
    }
	console.log('arrNode after sortArrNode:');
	console.log(arrNode);
	return arrNode;
}

// 缩略图 放大显示  
function imgShow(outerdiv, innerdiv, bigimg, _this){  
	var src = _this.attr("src");//获取当前点击的pimg元素中的src属性  
	$(bigimg).attr("src", src);//设置#bigimg元素的src属性  
  
		/*获取当前点击图片的真实大小，并显示弹出层及大图*/  
	$("<img/>").attr("src", src).load(function(){  
		var windowW = $(window).width();//获取当前窗口宽度  
		var windowH = $(window).height();//获取当前窗口高度  
		var realWidth = this.width;//获取图片真实宽度  
		var realHeight = this.height;//获取图片真实高度  
		var imgWidth, imgHeight;  
		var scale = 0.8;//缩放尺寸，当图片真实宽度和高度大于窗口宽度和高度时进行缩放  
		  
		if(realHeight>windowH*scale) {//判断图片高度  
			imgHeight = windowH*scale;//如大于窗口高度，图片高度进行缩放  
			imgWidth = imgHeight/realHeight*realWidth;//等比例缩放宽度  
			if(imgWidth>windowW*scale) {//如宽度扔大于窗口宽度  
				imgWidth = windowW*scale;//再对宽度进行缩放  
			}  
		} else if(realWidth>windowW*scale) {//如图片高度合适，判断图片宽度  
			imgWidth = windowW*scale;//如大于窗口宽度，图片宽度进行缩放  
						imgHeight = imgWidth/realWidth*realHeight;//等比例缩放高度  
		} else {//如果图片真实高度和宽度都符合要求，高宽不变  
			imgWidth = realWidth;  
			imgHeight = realHeight;  
		}  
				$(bigimg).css("width",imgWidth);//以最终的宽度对图片缩放  
		  
		var w = (windowW-imgWidth)/2;//计算图片与窗口左边距  
		var h = (windowH-imgHeight)/2;//计算图片与窗口上边距  
		$(innerdiv).css({"top":h, "left":w});//设置#innerdiv的top和left属性  
		$(outerdiv).fadeIn("fast");//淡入显示#outerdiv及.pimg  
	});  
	  
	$(outerdiv).click(function(){//再次点击淡出消失弹出层  
		$(this).fadeOut("fast");  
	});  
}

function showUploadFile(index){
	$('#bigimg').attr('src', uploadFileList_table.$data.todos[index]['imgUrl']);
	console.log( $('#bigimg').attr('src') );
	$('#bigimg').trigger("change");
}

$('#bigimg').change(function(event){
	var _this = $(this);
	imgShow("#outerdiv", "#innerdiv", "#bigimg", _this);
});

// end 自定义



//Js 数据容量单位转换(kb,mb,gb,tb)
function bytesToSize(bytes) {
    if (bytes === 0) return '0 B';
    var k = 1000, // or 1024
        sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
        i = Math.floor(Math.log(bytes) / Math.log(k));
 
   return (bytes / Math.pow(k, i)).toPrecision(3) + ' ' + sizes[i];
}


/*
// 保存附件信息到 fujian_table
function saveFuJianInfo(res){
	var hostName = '';
console.log('saveFuJianInfo:res');
console.log(res);
	switch( res.selectedPath ){
		case 'djsqs':
			fujian_table.djsqs.shift();
			fujian_table.djsqs.push({
					"name": res.filename,
					"url": hostName + res.tolink
			});
		case 'sqrsfz':
			fujian_table.sqrsfz.shift();
			fujian_table.sqrsfz.push({
					"name": res.filename,
					"url": hostName + res.tolink
			});
		case 'dyht':
			fujian_table.dyht.shift();
			fujian_table.dyht.push({
					"name": res.filename,
					"url": hostName + res.tolink
			});
		case 'jkht':
			fujian_table.djsqs.shift();
			fujian_table.jkht.push({
					"name": res.filename,
					"url": hostName + res.tolink
			});
		case 'bdcqszs':
			fujian_table.bdcqszs.shift();
			fujian_table.bdcqszs.push({
					"name": res.filename,
					"url": hostName + res.tolink
			});
		case 'sqwts':
			fujian_table.sqwts.shift();
			fujian_table.sqwts.push({
					"name": res.filename,
					"url": hostName + res.tolink
			});
		case 'gzs':
			fujian_table.gzs.shift();
			fujian_table.gzs.push({
					"name": res.filename,
					"url": hostName + res.tolink
			});
		case 'zxh':
			fujian_table.zxh.shift();
			fujian_table.zxh.push({
					"name": res.filename,
					"url": hostName + res.tolink
			});
		case 'others':
			fujian_table.others.shift();
			fujian_table.others.push({
					"name": res.filename,
					"url": hostName + res.tolink
			});
	}
	console.log('saveFuJianInfo:fujian_table');
	console.log(fujian_table);
}
*/
</script>


<!-- <script type="text/javascript">
var layui_base_url = '<?php echo \Cml\Tools\StaticResource::parseResourceUrl("bank/liyang/build/js/");?>';
    layui.config({
        base: layui_base_url
    }).use('cml', function() {
        cml = layui.cml;
        cml.layerWidth = '500px';
        cml.preLayerWidth = '800px';

        var vm = new Vue({
            el: "#searchQz",
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
				search: function (title, form_url, save_url, width) {
                    cml.form.search(title, form_url, save_url, width);
                },
                del: function (url, id, msg) {
                    cml.form.del(url, id, msg);
                }
            }
        });

        cml.form.operateSuccessCallBack = function() {
            cml.loadUrl('<?php \Cml\Http\Response::url("bank/Search/index");?>', 'json', function(res) {
                vm.$data.menus = res.data;
            });
        };
    });
</script> -->
      </html>