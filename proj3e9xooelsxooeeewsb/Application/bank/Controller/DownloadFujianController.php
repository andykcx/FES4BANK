<?php 

namespace bank\Controller;

use Cml\Controller;
use Cml\Http\Input;
use Cml\Http\Request;
use Cml\View;
use Cml\Cml;
use Cml\Vendor\Acl;
use bank\Model\Acl\UsersModel;
use bank\Model\System\LoginLogModel;
use Cml\Vendor\Validate;
use Cml\Config;
use bank\Service\ResponseService;

class DownloadFujianController extends Controller
{
	
	
    /**
     * 校验 下载用户登录
     *
     */
    public function checkDownloadLogin($username, $password)
    {
		//不查从库-防止延迟
        $config = Config::get('default_db');
        $config['slaves'] = [];
        Config::set('default_db', $config);

        Acl::setTableName([
            'access' => 'admin_access',
            'groups' => 'admin_groups',
            'menus' => 'admin_menus',
            'users' => 'admin_users',
        ]);
		
	   		// 权限控制
		// 指定ip、用户名、密码...

    /*    $validate = new Validate($_POST);
        $validate
            ->rule('require', 'username', 'pwd')
            ->rule('length', 'username', 3, 50)
            ->rule('length', 'password', 6, 50)
            ->label([
                'username' => '用户名',
                'password' => '密码'
            ]);

        if (!$validate->validate()) {
            ResponseService::renderJson(10002, $validate->getErrors(2, '|'));
        }
	*/

        $usersModel = new UsersModel();

        $user = $usersModel->where('status', 1)->getByColumn($username, 'username');
        if (!$user || $user['status'] == 0) {
            ResponseService::renderJson(10003);
        }

        if ($user['from_type'] == 2) {
            md5(md5($password) . Config::get('password_salt')) != $user['password'] && ResponseService::renderJson(10005);
        } else {
            //第三方登录挂载点
            if (!Plugin::hook('admin_login_plugin', [$username, $password])) {
                ResponseService::renderJson(10005);
            }
        }

      //  Acl::setLoginStatus($user['id'], Config::get('oss_login', true));

        $loginLogModel = new LoginLogModel();
        $loginLogModel->set([
            'userid' => $user['id'],
            'username' => $user['username'],
            'nickname' => $user['nickname'],
            'ip' => Request::ip(),
            'ctime' => Cml::$nowTime
        ]);

        $usersModel->updateByColumn($user['id'], [
            'lastlogin' => Cml::$nowTime
        ]);
//\Cml\dd('login...');
       // ResponseService::renderJson(0, '登录成功！');
		return true;
    }
	
	/**
     * @param string $url 请求地址
     * @param string $filePath 上传文件的绝对路径
     * @param array $postParam 数据
     * @return array|bool|string
	 * $url = 'http://localhost/ComposeApi/file.php'; 
	 * $file = 'C:/WWW/XXX/uploads/wx/thumb/20170609/3c40cd75a6e9d5c570fb662a098195ca.jpg'; 
	 * $result = $this->uploadFile($url,$file,[]);
     */
    public function uploadFile($url, $filePath, $postParam)
    {
        if(version_compare(phpversion(),'5.5.0') >= 0 && class_exists('CURLFile')){
            $file = new \CURLFile(realpath($filePath));
        }else{
            $file = '@'.$filePath;
        }
        $data = ["file" => '@'.$filePath];
        $param = array_merge($postParam, $data);
\Cml\dump($param);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
       
        curl_setopt($ch, CURLOPT_POST, true);
		
		//curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
		
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 3); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        if (curl_errno($ch) != 0)
            return curl_error($ch);
 
        curl_close($ch);
        if (!$response)
            return false;
//\Cml\dump($response);
        return $response;
    }

	/*
	* 发送附件到 发起请求的后台
	* @param string  username
	* @param string  password
	* @param string  recvUrl 接收地址
	* @param string  arrDownloadFileWithPath  所请求的文件目录、名称
	*/
	public function downloadFujian()
    {
		 $username = Input::getString('username');
		 $password = Input::getString('password');
		 $fileName  = Input::getString('fileName');
		 
		
//\Cml\dd($fileName);
		if( true == $this->checkDownloadLogin($username, $password) ){
			
			// 路径地址转换
			$path = Cml::getApplicationDir('apps_path') . DIRECTORY_SEPARATOR .'bank' . DIRECTORY_SEPARATOR . 'UpLoad'; // 根目录下的 bank/upload/slbh/子目录名称
			$downloadFile = $path . DIRECTORY_SEPARATOR . $fileName; // 绝对地址

//\Cml\dd($downloadFile);


			//让访问浏览器直接下载文件流
			$url = "Location:".$downloadFile;	

			/* echo $url;
			exit(); */


			//Header($url);	
			// 提供给浏览器下载
			if(file_exists($downloadFile)){
			header("Content-type:application/octet-stream");
			$filename = basename($downloadFile);
			header("Content-Disposition:attachment;filename = ".$filename);
			header("Accept-ranges:bytes");
			header("Accept-length:".filesize($downloadFile));
			readfile($downloadFile);
			}else{
			  echo "<script>alert('系统错误！文件不存在！')</script>";
			}				
			return true;
		}
		return false;
    }
	
}