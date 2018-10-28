<?php

/**
 * Author: kechangxu
 * Date: 2018/10/7
 * Version: 0.1.1
 * 人脸活体识别：实现张张嘴、眨眨眼功能
 */

namespace Cml\Vendor;

use Cml\Vendor\AipFace;

class DetectFace {
	private $client = null;// 
	
	public function __construct(){
		// 你的 APPID AK SK
		const APP_ID = '你的 App ID';
		const API_KEY = '你的 Api Key';
		const SECRET_KEY = '你的 Secret Key';
		$this->client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
	}
	
	/**
     * 
    * @Description: 该方法的主要作用：'张张嘴'验证
    * @Title: face_jiance
    * @param  @param img
    * @param  @param response
    * @param  @param request 设定文件  
    * @return  返回类型：void   
     */
	public function face_mouse($faceImg){
		/*if (dataMap.get(1) == null) {
            // 第一次请求
            landmark = face_jiance(img);
            System.out.println("第一次的上嘴唇："+landmark.getMouse__top()[0]);
            System.out.println("第一次的嘴唇中心："+landmark.getMouse_zhongxin()[0]);
            System.out.println("第一次的下嘴唇："+landmark.getMouse__bottom()[0]);
            dataMap.put(1, landmark);
        } else {*/
            // 不是第一次请求
			$landmarkNext = new Landmark();
            $landmarkNext = $this->face_jiance($faceImg);
            // 和前一次的数据进行比较
            //Landmark landmark_pre = (Landmark) dataMap.get(1);
            // 嘴唇上面的位置相对于中心点对比
            if (($landmarkNext->getMouse_zhongxin()[0] - $landmarkNext->getMouse__top()[0]) > 40 
					&&($landmarkNext->getMouse__bottom()[0] - $landmarkNext->getMouse_zhongxin()[0]) > 30) {

                    try {
						return true;
                    } catch (Exception e) {
                        // TODO 异常执行块！
						echo 'Message: ' .$e->getMessage();
                }
            }else{
                try {
					return false';
                } catch (Exception e) {
                    // TODO 异常执行块！
					echo 'Message: ' .$e->getMessage();
            }
            }
	}
	
	// '眨眨眼' 检测
	public function face_eye($faceImg){
		 $landmark_next = new LandMark();
		 $landmark_next = $this->face_jiance($faceImg);
        if (($landmarkNext->getLeft_eye_zhongxin()[0])
                - ($landmarkNext->getLeft_eye_top()[0]) < 6
                && ($landmarkNext->getRight_eye_zhongxin()[0])
                        - ($landmarkNext->getRight_eye_top()[0]) < 6) {
            // 继续判断下边的
            if (($landmarkNext->getLeft_eye_bottom()[0])
                    - ($landmarkNext->getLeft_eye_zhongxin()[0]) < 6.6
                    && ($landmarkNext->getRight_eye_bottom()[0])
                            - ($landmarkNext->getRight_eye_zhongxin()[0]) < 6.6) {
                try {
                    return true;
                } catch (Exception e) {
                    // TODO 异常执行块！
                     echo 'Message: ' .$e->getMessage();
                }
            } else {
                try {
                   return false';
                } catch (Exception e) {
                    // TODO 异常执行块！
                    echo 'Message: ' .$e->getMessage();
                }
            }
        }
	}
	
	/**
     * 
    * @Description: 该方法的主要作用：活体检测 得到 具有图片特征值的 实体类
    * @Title: face_jiance
    * @param  @param img
    * @param  @return 设定文件  
    * @return  返回类型：Landmark   
     */
	public function face_jiance($faceImg){
		$faceImgType = "BASE64";
		$arrOptions = [
			'face_field' => 'landmark', // lankmark:返回4个关键点位置，左眼中心、右眼中心、鼻尖、嘴中心及 72个特征点位置
			'face_type' => 'LIVE'
		];
		// 调用 百度 第三方SDK
		try {
            $ret = $this->client->detect($faceImg, $faceImgType, $arrOptions);
        } catch (Exception $e) {
                // TODO 异常执行块！
            echo 'Message: ' .$e->getMessage();
        }
		
		return $this->parsingFaceJson($res); // 根据 sdk 提取的 res 结构 做后续的 业务处理
	}
}


    /**
     * 
    * @Description: 该方法的主要作用：解析人脸检测的json数据 
    * @Title: parsingFaceJson
    * @param  @param retJson
    * @param  @return 设定文件  
    * @return  返回类型：Landmark   
     */
	public function parsingFaceJson($retJson){
		
		/*
		// 此数据结构有4层：root层–result层–face_list 层–location、angle层
		$retJson = {
			"error_code": 0,
			"error_msg": "SUCCESS",
			"log_id": 9425351545101,
			"timestamp": 1533196016,
			"cached": 0,
			"result": {
				"face_num": 1,
				"face_list": [{
					"face_token": "1929940fc6cd6d260f9232bdf85b576f",
					"location": {
						"left": 87.22742462,
						"top": 159.038208,
						"width": 71,
						"height": 65,
						"rotation": 5
					},
					"face_probability": 1,
					"angle": {
						"yaw": -4.833847046,
						"pitch": -8.676548004,
						"roll": 4.778661251
					},
					 "landmark": [
						{
							"x": 161.74819946289,
							"y": 163.30244445801
						},
						...
					],
					"landmark72": [
						{
							"x": 115.86531066895,
							"y": 170.0546875
						}，
						...
					],
					"age": 29.298097610474,
					"beauty": 55.128883361816,
					"expression": {
						"type": "smile",
						"probability" : 0.5543018579483
					},
					"gender": {
						"type": "male",
						"probability": 0.99979132413864
					},
					"glasses": {
					"type": "sun",
						"probability": 0.99999964237213
					},
					"race": {
						"type": "yellow",
						"probability": 0.99999976158142
					},
					"face_shape": {
						"type": "triangle",
						"probability": 0.5543018579483
					}
					"quality": {
						"occlusion": {
							"left_eye": 0,
							"right_eye": 0,
							"nose": 0,
							"mouth": 0,
							"left_cheek": 0.0064102564938366,
							"right_cheek": 0.0057411273010075,
							"chin": 0
						},
						"blur": 1.1886881756684e-10,
						"illumination": 141,
						"completeness": 1
				}]
			}
		};
		*/

		//开始解析json
		$arrJson = json_decode($retJson, true);
        //找到result节点
		$result = $arrJson['result'];
        //继续找face_list节点
		$faceList = $result[0]['face_list']; // 最多 10 张脸,默认1张脸
        //找到landmark（关键点）节点，4个关键点位置，左眼中心、右眼中心、鼻尖、嘴中心
		$arrLdmrk = $faceList['landmark']; 
		$landmark = new LandMark();
		
		//左眼中心
		$landmark->setLeft_eye_zhongxin($arrLdmrk[0]); // 
		//右眼中心
        $landmark->setRight_eye_zhongxin($arrLdmrk[1]);
        //鼻尖
        $landmark->setNose_zhongxin($arrLdmrk[2]);
        //嘴中心
        $landmark->setMouse_zhongxin($arrLdmrk[3]);
        
		//继续找landmark72节点
		$landmark72 = $faceList[0]['landmark72'];
        //左眼上边
        $landmark->setLeft_eye_top($landmark72[14]); // 根据 样图上的 标记点取位置

        //左眼下边
        $landmark->setLeft_eye_bottom($landmark72[19]);
        //右眼上边
        $landmark->setRight_eye_top($landmark72[32]);
        //右眼下边
        $landmark->setRight_eye_bottom($landmark72[36]);
        //嘴巴上边
        $landmark->setMouse__top($landmark72[60]);
        //嘴巴下边
        $landmark->setMouse__bottom($landmark72[70]);
        
		return $landmark;
	}
	

/**   
 *    
 * 类名称：landMark  
 * 类描述：   关键点的实体类     
 */
class LandMark {

    private	$left_eye_zhongxin = [];   //左眼中心
    private $left_eye_top = [];        //左眼上边
    private $right_eye_top = [];       //右眼上边
    private $left_eye_bottom = [];     //左眼下边
    private $right_eye_bottom = [];    //右眼下边
    private $right_eye_zhongxin = [];  //右眼中心
    private $nose_zhongxin = [];       //鼻尖
    private $mouse_zhongxin = [];      //嘴巴中心
    private $mouse__top = [];          //嘴巴上边
    private $mouse__bottom = [];       //嘴巴下边

    public getLeft_eye_zhongxin() {
        return $thi->left_eye_zhongxin;
    }

    public setLeft_eye_zhongxin($left_eye_zhongxin) {
        $this->left_eye_zhongxin = $left_eye_zhongxin;
    }

    public getRight_eye_zhongxin() {
        return $this->right_eye_zhongxin;
    }

    public setRight_eye_zhongxin($right_eye_zhongxin) {
        $this->right_eye_zhongxin = $right_eye_zhongxin;
    }

    public getNose_zhongxin() {
        return $this->nose_zhongxin;
    }

    public setNose_zhongxin($nose_zhongxin) {
        $this->nose_zhongxin = $nose_zhongxin;
    }

    public getMouse_zhongxin() {
        return $this->mouse_zhongxin;
    }

    public setMouse_zhongxin($mouse_zhongxin) {
        $this->mouse_zhongxin = $mouse_zhongxin;
    }

    public getLeft_eye_top() {
        return $this->left_eye_top;
    }

    public setLeft_eye_top($left_eye_top) {
        $this->left_eye_top = $left_eye_top;
    }

    public getRight_eye_top() {
        return $this->right_eye_top;
    }

    public setRight_eye_top($right_eye_top) {
        $this->right_eye_top = $right_eye_top;
    }

    public getLeft_eye_bottom() {
        return $this->left_eye_bottom;
    }

    public setLeft_eye_bottom($left_eye_bottom) {
        $this->left_eye_bottom = $left_eye_bottom;
    }

    public getRight_eye_bottom() {
        return $this->right_eye_bottom;
    }

    public setRight_eye_bottom($right_eye_bottom) {
        $this->right_eye_bottom = $right_eye_bottom;
    }

    public getMouse__top() {
        return $this->mouse__top;
    }

    public setMouse__top($mouse__top) {
        $this->mouse__top = $mouse__top;
    }

    public getMouse__bottom() {
        return $this->mouse__bottom;
    }

    public setMouse__bottom($mouse__bottom) {
        $this->mouse__bottom = $mouse__bottom;
    }
}
