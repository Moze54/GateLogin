<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * GateLogin - 登录页面样式
 *
 * @package GateLogin
 * @author 优优
 * @version 1.0.0
 * @link https://blog.uuhb.cn
 */
class GateLogin_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件
     *
     * @return string
     */
    public static function activate()
    {
        // 注册钩子拦截登录页面
        Typecho_Plugin::factory('admin/common.php')->begin = array('GateLogin_Plugin', 'render');

        return '插件已激活，自定义登录页面已启用';
    }

    /**
     * 禁用插件
     *
     * @return string
     */
    public static function deactivate()
    {
        // 钩子会自动移除
        return '插件已禁用，已恢复原始登录页面';
    }

    /**
     * 插件配置
     *
     * @param Typecho_Widget_Helper_Form $form
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        // 网站标题
        $siteTitle = new Typecho_Widget_Helper_Form_Element_Text(
            'siteTitle',
            NULL,
            'Typecho',
            _t('网站标题'),
            _t('登录页面显示的网站标题，留空则使用系统默认标题')
        );
        $form->addInput($siteTitle);

        // 副标题
        $siteSubtitle = new Typecho_Widget_Helper_Form_Element_Text(
            'siteSubtitle',
            NULL,
            '现代化的内容管理系统',
            _t('副标题'),
            _t('标题下方显示的副标题或标语')
        );
        $form->addInput($siteSubtitle);

        // 登录模板
        $template = new Typecho_Widget_Helper_Form_Element_Select(
            'template',
            [
                'default' => _t('简约现代 - 单卡片居中布局，圆形背景装饰'),
                'aurora' => _t('极光风格 - 双栏布局，极光背景动画，玻璃态设计'),
                'prestige' => _t('大气庄重 - 浅色系配色，渐变背景，现代简洁')
            ],
            'default',
            _t('登录模板'),
            _t('选择登录页面的显示模板风格')
        );
        $form->addInput($template);

        // 底部文案
        $footerText = new Typecho_Widget_Helper_Form_Element_Text(
            'footerText',
            NULL,
            '',
            _t('底部文案'),
            _t('页面底部显示的文字，留空则显示默认格式。可使用变量：{year} 年份，{title} 网站标题')
        );
        $form->addInput($footerText);

        // 主题色
        $primaryColor = new Typecho_Widget_Helper_Form_Element_Text(
            'primaryColor',
            NULL,
            '#1e293b',
            _t('主题色'),
            _t('登录页面的主色调，使用十六进制颜色代码，如 #1e293b')
        );
        $form->addInput($primaryColor);

        // 图标 SVG
        $iconSvg = new Typecho_Widget_Helper_Form_Element_Textarea(
            'iconSvg',
            NULL,
            '<path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor"/>
<path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
<path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
            _t('图标 SVG'),
            _t('Logo 图标的 SVG 代码，只写 path/polygon/circle 等元素内容')
        );
        $form->addInput($iconSvg);
    }

    /**
     * 个人配置（可选）
     *
     * @param Typecho_Widget_Helper_Form $form
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
        // 用户级别的配置
    }

    /**
     * 渲染自定义登录页面
     *
     * 通过钩子拦截 admin/login.php，渲染自定义页面
     */
    public static function render()
    {
        // 检测当前是否为登录页面
        $request = \Typecho_Widget::widget('Widget_Options')->request;

        // 获取当前请求的 URL
        $currentUrl = $request->getRequestUrl();

        // 获取必要的变量
        $options = \Typecho_Widget::widget('Widget_Options');
        $user = \Typecho_Widget::widget('Widget_User');

        // 获取插件配置
        try {
            $pluginOptions = $options->plugin('GateLogin');
        } catch (Exception $e) {
            // 配置不存在，使用默认值
            $pluginOptions = null;
        }

        // 准备配置变量，使用默认值如果未配置
        $config = array(
            'siteTitle' => ($pluginOptions && isset($pluginOptions->siteTitle) && !empty($pluginOptions->siteTitle))
                ? $pluginOptions->siteTitle
                : $options->title,
            'siteSubtitle' => ($pluginOptions && isset($pluginOptions->siteSubtitle) && !empty($pluginOptions->siteSubtitle))
                ? $pluginOptions->siteSubtitle
                : '现代化的内容管理系统',
            'footerText' => ($pluginOptions && isset($pluginOptions->footerText) && !empty($pluginOptions->footerText))
                ? $pluginOptions->footerText
                : '',
            'primaryColor' => ($pluginOptions && isset($pluginOptions->primaryColor) && !empty($pluginOptions->primaryColor))
                ? $pluginOptions->primaryColor
                : '#1e293b',
            'iconSvg' => ($pluginOptions && isset($pluginOptions->iconSvg) && !empty($pluginOptions->iconSvg))
                ? $pluginOptions->iconSvg
                : '<path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor"/>
<path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
<path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
            'template' => ($pluginOptions && isset($pluginOptions->template) && !empty($pluginOptions->template))
                ? $pluginOptions->template
                : 'default'
        );

        // 检查是否为登录页面
        if (strpos($currentUrl, '/admin/login.php') !== false && $_SERVER['REQUEST_METHOD'] === 'GET') {
            // 如果已经登录，重定向到后台首页
            if ($user->hasLogin()) {
                $options->response->redirect($options->adminUrl);
                exit;
            }

            // 获取上次登录的用户名
            $rememberName = htmlspecialchars(\Typecho\Cookie::get('__typecho_remember_name', ''));
            \Typecho\Cookie::delete('__typecho_remember_name');

            // 设置 body class 用于样式
            $bodyClass = 'body-100';

            // 获取选择的模板
            $templateName = $config['template'];
            $templateFile = dirname(__FILE__) . '/templates/' . $templateName . '.php';

            // 安全检查：确保模板文件存在
            if (!file_exists($templateFile)) {
                $templateFile = dirname(__FILE__) . '/templates/default.php';
            }

            // 渲染自定义登录页面
            include $templateFile;
            exit;  // 终止执行，阻止原始 login.php 继续执行
        }
    }
}
