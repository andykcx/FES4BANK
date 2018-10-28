// index.js
/*
{
	"code": 0,
	"msg": "返回查询",
	"data": {
		"list": [
					{
						"qzslbh": "权证受理编号(权证唯一主键)",
						"bdczh": "不动产证号",
						"bdczlx":"权证/预告",
						"qlr":[
								[{
									"name": "抵押权人",
									"xh": "序号",
									"zjlx": "证件类型",
									"zjh": "证件号",
									"tel": "电话"
								}]
						],
						"bdcdyxx":[
								{
									"bdcdyh": "不动产单元号",
									"zl": "坐落",
									"jzmj": "建筑面积"
								}
						],
						"dyqk":[
									{
										"id":"抵押受理编号",
										"je":"贷款金额",
										"number":"抵押顺位"
									}
						],
						"xzxx": "权利状态(查封,异议)"
					}
				],
		"totalCount": 1,
		"limit": 10
	}
}
*/

/*
// mock.js
const Mock = require('mockjs');
const Random = Mock.Random;

module.exports = function () {
	// Random.extend 用于自定义扩展 
		Random.extend({
		courses: ['音乐课', '舞蹈课', '地理课'],
		course: function(date){
			return this.pick(this.courses)
		}
	});

	const courses = Mock.mock({
		startClass: '@bool', // 布尔值，可以传入参数设置频率
		token: '@string("upper", 2, 8)', // 随机字符串
		createData: '@datetime("yyyy-MM-dd A HH:mm:ss")', // 返回日期
		image: '@image("200x100")', // 模拟图片 'x'链接  
		manager: '@cname', // 中文名
		'partners|3': [
			'@name' // 英文名
		], 
		website: '@url',
		email: '@email',
		'password|2': '**', // 数据模板下，值为字符串表示按照规则重复字符串
		'contents|1-20': [{ // 数据模板下，值为数组或者对象 rule 部分都规定了显示的元素数量
			'id|+1': 0, // 数据模板下，值为数值表示初始值或者底数（按招规则细分）
			courseType: '@COURSE ', // 使用扩展
			courseName() {  // 值可以是一个函数，用来细致模拟数据
				return this.courseType + ' ' + Random.natural(1, 10) + '班'
			},
			name: '@courseType @natural(1, 10) 班', // 可以同时使用多个占位符，用空格隔开
			'teacher': '@cname',
			position: '@courseType 第 @id 教室', // 引用当前数据模板中的内容
			students: /\d{5,10}/, // 使用正则规定数据格式
			classTime: '@datetime("M月d日起 每周三 HH:mm")'
		}]
	})

	return {courses};
}
*/

// mock.js
const Mock = require('mockjs')
const Random = Mock.Random;

// json-server	
module.exports = function(){
	// Random.extend 用于自定义扩展
	Random.extend({
		arrBdczlx : ['权证', '预告'],
		arrZjlx: ['身份证', '营业执照'],
		zjlx: function(date){
			return this.pick(this.arrZjlx)
		},
		bdczlx: function(date){
			return this.pick(this.arrBdczlx)
		}
	});
	
	const OwnershipInfo = Mock.mock({
		code: 0,
		msg: '返回查询',
		data:{
			'list|1-3':[{
					"qzslbh": "@id",
					"bdczh": "不动产字第@natural(1, 100)号",
					"bdczlx":"@bdczlx",
					"qlr":[
							{
								"name": "@cname",
								"xh": "序号",
								"zjlx": "1",
								"zjh": "@id",
								"tel": null
							}
					],
					"bdcdyxx":[
							{
								"bdcdyh": "不动产单元字第@natural(1, 100)号",
								"zl": "甘肃省兰州市xx区xxx路",
								"jzmj": "@float(60, 140)"
							}
					],
					"dyqk":[
								{
									"id":"抵押受理编号@natural(60, 100)",
									"je":"@natural(60, 100)",
									"number":"抵押顺位"
								}
					],
					"xzxx": "权利状态(查封,异议)"
			}],
			totalCount: 1,
			limit: 10
		}
	});
	
	return {OwnershipInfo}
}
