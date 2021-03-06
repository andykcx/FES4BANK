<?php
/* * *********************************************************
* 监控脚本
* @Author  linhecheng<linhechengbush@live.com>
* @Date: 2017/10/25 15:53
* *********************************************************** */
namespace web\Service;

use Cml\Vendor\Validate;

trait ValidateOrRenderJson{
    /**
     * @var Validate
     */
    protected $validate = null;

    /**
     * 设置提示语并-执行验证
     *
     * @param array $labels 要设置提示语的参数
     */
    public function runValidate($labels = [])
    {
        $this->validate->label($labels);
        if (!$this->validate->validate()) {
            $this->renderJson(1, $this->validate->getErrors(2));
        }
    }

    /**
     * json输出
     *
     * @param int $code
     * @param string $msg
     * @param array $data
     */
    protected function renderJson($code = -1, $msg = '', $data = [])
    {
//\Cml\dump($msg);
        ResponseService::renderJson($code, $msg, $data);
    }
}
