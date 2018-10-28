<?php
/* * *********************************************************
* 表单构建
* @Author  linhecheng<linhechengbush@live.com>
* @Date: 2017/1/17 16:43
* *********************************************************** */
namespace web\Service\Builder;

use Cml\Cml;
use Cml\Config;
use Cml\Http\Response;
use Cml\Tools\StaticResource;
use Cml\View;

class FormBuildService extends Base
{
    /**
     * 表单元素类型
     */
    const INPUT_TEXT = 'text';
    const INPUT_HIDDEN= 'hidden';
    const INPUT_PASSWORD = 'password';
    const INPUT_CHECKBOX = 'checkbox';
    const INPUT_RADIO = 'radio';
    const INPUT_DATE = 'date';
    const INPUT_DATETIME = 'datetime';
    const INPUT_SELECT = 'select';
    const INPUT_TEXTAREA = 'textarea';
    const INPUT_EDITOR = 'editor';
    const INPUT_UEDITOR = 'ueditor';
    const INPUT_FILE = 'file';
    const INPUT_IMAGE = 'image';

    /**
     * 打开弹窗按钮类型
     */
    const BUTTON_ADD = 'add';
    const BUTTON_EDIT = 'edit';
    const BUTTON_DEL = 'del';
    const BUTTON_DISABLE = 'disable';
    const BUTTON_TAB = 'newTab';
    const BUTTON_VIEW = 'view';

    /**
     * 页面顶部的标题
     *
     * @var string
     */
    private $title = '';

    /**
     * 表单信息
     *
     * @var array
     */
    private $table = [];

    /**
     * 表单元素的值
     *
     * @var array
     */
    private $data = [];


    /**
     * 要执行的js
     *
     * @var string
     */
    private $toPageJs = <<<js
        layui.use(['form'], function(){
            var form = layui.form;
            form.render();
        });
js;

    /**
     * 要引入的js
     * @var array
     */
    private $needIncludeJs = [

    ];

    /**
     * 引入js文件后执行
     *
     * @var string
     */
    private $toPageJsAfterInclude = <<<js
   
js;

    /**
     * FormBuildService constructor.
     *
     * @param string $title 页面的标题
     */
    public function __construct($title = '')
    {
        $this->title = $title;
    }

    /**
     * 添加表单元素
     *
     * @param string $label label文字
     * @param string $name name属性
     * @param string $placeholder
     * @param string $class 样式
     * @param string $other 其它信息。直接输出如disable。
     * @param string $type 表单的type
     * @param mixed $options checkbox和radio时为value 、
     *      select时传option 如：[['1', '是', 'selected']] 生成的html <option value="1" selected >是</option>、
     *      editor时为图片上传的服务端地址
     *
     * 例:
    ->addFormItem('昵 称', 'nickname', '请输入昵称', '',
    ' lay-verify="length" lay-min="3" lay-max="20" '.isset($showField['nickname'])?'':' disabled '
    )
    ->addFormItem('密 码', 'oldpwd', '请输入旧密码', '', '', FormBuildService::INPUT_PASSWORD)
    ->addFormItem('新密码', 'pwd', '请输入新密码', 'use_password', '', FormBuildService::INPUT_PASSWORD)
    ->addFormItem('重复新密码', 'repwd', '重复新密码', '', ' lay-verify="repeat" lay-repeat=".use_password" lay-repeat-text="值必须和新密码一样" ', FormBuildService::INPUT_PASSWORD)
    ->addFormItem('备注', 'remark', '请输入备注信息', '', '', FormBuildService::INPUT_EDITOR, 'web/Public/upload')
    ->addFormItem('是否显示到菜单', 'isshow', '是', '', ' checked ', FormBuildService::INPUT_RADIO, 1)
    ->addFormItem('是否显示到菜单', 'isshow', '否', '', ' ', FormBuildService::INPUT_RADIO, 0)
    ->addFormItem('TEST', 'pic', 'TEST', '', '', FormBuildService::INPUT_IMAGE, 'web/public/upload')
    //$user['pic'] = 'upload/de6cc24af58796f18306f9256bf004f1841e8f9c.png'
    ->addFormItem('TEST2', 'pic2', 'TEST2', '', '', FormBuildService::INPUT_UEDITOR, ['initialFrameWidth' => 800])
     * ->addFormItem('用户组', 'groupid', '', '', '', FormBuildService::INPUT_SELECT, [[1, '文本', 'selected'], [2, '文本2', '']])

     *
     * @return $this;
     */
    public function addFormItem($label, $name, $placeholder = '', $class = '', $other = '', $type = self::INPUT_TEXT, $options = [])
    {
	//\Cml\dump($options);
        if (is_array($options) && $type != self::INPUT_UEDITOR) {
            $option = '';
            foreach($options as $item) {
                $option .= "<option value='{$item[0]}' {$item[2]} >{$item[1]}</option>";
            }
            $options = $option;
	//\Cml\dd($options);
        }

        $theme = Config::get('html_theme');

        switch ($type) {
            case self::INPUT_UEDITOR:
                $ueditorHomeUrl = StaticResource::parseResourceUrl("web/{$theme}/plugins/ueditor/", false);
                $ueditorServiceUrl = Response::url('web/Public/uploadConfig', false);

                $this->toPageJs .= <<<str
    window.UEDITOR_HOME_URL = "{$ueditorHomeUrl}";
    window.UEDITOR_SERVER_URL = "{$ueditorServiceUrl}";

str;
                $this->needIncludeJs = [
                    "web/{$theme}/plugins/ueditor/ueditor.config.js",
                    "web/{$theme}/plugins/ueditor/ueditor.all.min.js",
                    "web/{$theme}/plugins/ueditor/lang/zh-cn/zh-cn.js"
                ];

                $ueditorConfig = '';
                foreach($options as $key => $val) {
                    $ueditorConfig .= "window.UEDITOR_CONFIG.{$key}='{$val}';";
                }
                $this->toPageJsAfterInclude .= <<<str
                $ueditorConfig;
   var ue = UE.getEditor('editor_{$name}');
str;

                break;
            case self::INPUT_EDITOR:
                $options = Response::url($options, false);
                $this->toPageJs .= <<<str
    layui.use(['layedit', 'cml'], function(){
        var layedit = layui.layedit;
        layedit.set({
            uploadImage: {
                url: '{$options}' //接口url
                ,type: '' //默认post
            }
        });    
        var index = layedit.build('editor_{$name}');
        cml.layeditIndex.push(index);
    });
str;
                break;
            case self::INPUT_DATE:
                $type = 'text';//用date类型laydate有bug
                $class .= ' laydate_select_' . $name;
                $this->toPageJs .= <<<str
layui.use('laydate', function(){
    layui.laydate.render({elem: '.laydate_select_{$name}', type: 'date', format: 'yyyy-MM-dd'})
});
str;
                break;
            case self::INPUT_DATETIME:
                $class .= ' laydate_select_' . $name;
                $this->toPageJs .= <<<str
layui.use('laydate', function(){
    layui.laydate.render({elem: '.laydate_select_{$name}', type: 'datetime', format: 'yyyy-MM-dd HH:mm:ss'})
});
str;
                break;
            case self::INPUT_IMAGE:
            case self::INPUT_FILE:
                $options = Response::url($options, false);
                //$baseUrl = Config::get("static__path", Cml::getContainer()->make("cml_route")->getSubDirName());
                //为了兼容editor。后端返回完整文件路径
                $baseUrl = '';
                $this->toPageJs .= <<<str
    layui.use(['upload', 'cml'], function(){
        var cml = layui.cml;
        var elem = $('.imageup_{$name}');
        layui.upload.render({
               elem:'.imageup_{$name}',
              url: '{$options}'
              ,before: function(input){
                   cml.showLoading();
              }
              ,done: function(res){
                    cml.closeLoading();
                    cml.showTip(res.msg);                  
                    $(elem).parents('.layui-input-block').find('img').attr('src', '{$baseUrl}' + res.data.src).removeClass('layui-hide');
                    $(elem).parents('.layui-input-block').find('a').attr('href', '{$baseUrl}' + res.data.src).html('{$baseUrl}' + res.data.src);
                    $(elem).parents('.layui-input-block').find('.imageup').val(res.data.src);
              }
        });        
    });
str;

        }
        $this->table[$name][] = [
            'label' => $label,
            'name' => $name,
            'placeholder' => $placeholder,
            'class' => $class,
            'other' => $other,
            'type' => $type,
            'options' => $options
        ];
//\Cml\dump($options);
        return $this;
    }

    /**
     * 有时候有们要在某个表单项的前面加上大块的警告提示信息。只要在添加相关的表单项前调用本方法即可
     *
     * @param string $tip 要输出的提示信息.支持html
     *
     * @return $this;
     */
    public function addBlockTip($tip = '')
    {
        static $block = 1;

        $this->table['__block____'.$block++][] = [
            'type' => 'block_tip',
            'tip' => $tip
        ];
        return $this;
    }

    /**
     * 赋值给表单元素
     *
     * @param array $data
     *
     * @return $this;
     */
    public function withData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * 渲染模板并输出
     *
     * @param string $layout 布局
     * @param string $layoutInOtherApp 布局所在的应用名
     * @param string $tpl 使用的模板
     */
    public function display($layout = '', $layoutInOtherApp = 'web', $tpl = 'table')
    {
        parent::display($layout, $layoutInOtherApp);

        $layerWidthHeight = $this->getLayerWidthHeight();

        $layerWidthHeight && $this->toPageJsAfterInclude .= <<<str
cml.layerWidth = {$layerWidthHeight};
str;

        echo View::getEngine('Html')
            ->assignByRef('title', $this->title)
            ->assignByRef('table', $this->table)
            ->assignByRef('data', $this->data)
            ->assignByRef('toPageJs', $this->toPageJs)
            ->assignByRef('neeIncludeJs', $this->needIncludeJs)
            ->assignByRef('toPageJsAfterInclude', $this->toPageJsAfterInclude)
            ->fetch($tpl, false, true, true);
        Cml::cmlStop();
    }

    /**
     * @param string $title 页面的标题
     *
     * @return $this
     */
    public static function create($title = '')
    {
        return new self($title);
    }
}