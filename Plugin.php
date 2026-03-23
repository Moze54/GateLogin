<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * GateLogin - 登录页面样式
 *
 * @package GateLogin
 * @author 优优
 * @version 1.1.0
 * @link https://github.com/Moze54/GateLogin
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
        echo '<style>
            .gate-login-header {
                background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
                padding: 30px;
                border-radius: 12px;
                margin-bottom: 25px;
                color: #fff;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                position: relative;
                overflow: hidden;
            }
            .gate-login-header::before {
                content: "";
                position: absolute;
                top: -50%;
                right: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
                animation: header-shine 15s linear infinite;
            }
            @keyframes header-shine {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            .gate-login-header h2 {
                margin: 0 0 8px 0;
                font-size: 24px;
                font-weight: 700;
                position: relative;
                z-index: 1;
            }
            .gate-login-header p {
                margin: 0;
                font-size: 14px;
                opacity: 0.9;
                position: relative;
                z-index: 1;
            }
            .gate-login-header .header-icon {
                font-size: 32px;
                margin-bottom: 10px;
                position: relative;
                z-index: 1;
            }
            .typecho-option {
                background: #f8f9fa;
                border: 1px solid #e9ecef;
                border-radius: 8px;
                padding: 20px;
                margin-bottom: 15px !important;
                transition: all 0.3s ease;
                overflow: visible;
                position: relative;
                z-index: 1;
            }
            .typecho-option:hover {
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                border-color: #dee2e6;
            }
            .typecho-option label {
                font-weight: 600;
                color: #495057;
                font-size: 14px;
            }
            .typecho-option input[type="text"],
            .typecho-option select,
            .typecho-option textarea {
                border: 1px solid #ced4da;
                border-radius: 6px;
                padding: 8px 12px;
                font-size: 14px;
                transition: border-color 0.2s;
                max-width: 100%;
            }
            .typecho-option select {
                height: auto;
                min-height: 38px;
                position: relative;
                z-index: 10;
            }
            .typecho-option input[type="text"]:focus,
            .typecho-option select:focus,
            .typecho-option textarea:focus {
                border-color: #667eea;
                outline: none;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            }
            .typecho-option .description {
                color: #6c757d;
                font-size: 13px;
                margin-top: 8px;
                line-height: 1.5;
            }
            .typecho-page-title h1 {
                color: #343a40;
                font-weight: 700;
            }
            #template-preview-wrapper {
                margin-top: 20px;
                padding: 20px;
                background: #fff;
                border-radius: 8px;
                border: 2px dashed #dee2e6;
                text-align: center;
            }
            .template-preview-title {
                font-size: 14px;
                font-weight: 600;
                color: #495057;
                margin-bottom: 15px;
            }
            .template-preview-image {
                max-width: 100%;
                border-radius: 6px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                transition: all 0.3s ease;
            }
            .template-preview-image:hover {
                box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            }
            #template-preview-wrapper h4 {
                font-size: 14px;
                font-weight: 600;
                color: #495057;
                margin-bottom: 15px;
            }
            #template-preview-img {
                max-width: 100%;
                border-radius: 6px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                transition: all 0.3s ease;
            }
            #template-preview-img:hover {
                box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            }
            .template-preview-images {
                display: flex;
                gap: 15px;
                justify-content: center;
                flex-wrap: wrap;
            }
            .template-preview-images img {
                max-width: 48%;
                border-radius: 6px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                transition: all 0.3s ease;
            }
            .template-preview-images img:hover {
                box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            }
            .template-preview-label {
                font-size: 12px;
                color: #6c757d;
                margin-top: 8px;
                text-align: center;
            }
        </style>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            var pluginUrl = "' . \Typecho_Widget::widget('Widget_Options')->pluginUrl . '/GateLogin/assets/images/";
            var templateImages = {
                "default": ["default_light.png", "default_dark.png"],
                "simple": ["simple.png"],
                "aurora": ["aurora.png"],
                "prestige": ["prestige.png"],
                "brutal": ["brutal.png"],
                "tech": ["tech.png"]
            };
            var templateLabels = {
                "default": ["亮色模式", "暗色模式"],
                "simple": "",
                "aurora": "",
                "prestige": "",
                "brutal": "",
                "tech": ""
            };

            var previewWrapper = document.createElement("div");
            previewWrapper.id = "template-preview-wrapper";
            previewWrapper.innerHTML = "<h4>📷 模板预览</h4><div id=\"template-preview-content\"></div>";

            var templateSelect = document.querySelector("select[name=template]");
            if (templateSelect) {
                var optionElement = templateSelect.closest(".typecho-option");
                if (optionElement && optionElement.parentNode) {
                    optionElement.parentNode.insertBefore(previewWrapper, optionElement.nextSibling);
                }

                function updatePreview() {
                    var contentDiv = document.getElementById("template-preview-content");
                    if (!contentDiv) return;

                    var currentTemplate = templateSelect.value;
                    var images = templateImages[currentTemplate];
                    var labels = templateLabels[currentTemplate];

                    if (!images || images.length === 0) return;

                    if (images.length === 1) {
                        contentDiv.innerHTML = "<img id=\"template-preview-img\" src=\"" + pluginUrl + images[0] + "\" alt=\"模板预览\">";
                    } else {
                        var html = "<div class=\"template-preview-images\">";
                        for (var i = 0; i < images.length; i++) {
                            html += "<div>";
                            html += "<img src=\"" + pluginUrl + images[i] + "\" alt=\"模板预览\">";
                            if (labels && labels[i]) {
                                html += "<div class=\"template-preview-label\">" + labels[i] + "</div>";
                            }
                            html += "</div>";
                        }
                        html += "</div>";
                        contentDiv.innerHTML = html;
                    }
                }

                updatePreview();
                templateSelect.addEventListener("change", updatePreview);
            }
        });
        </script>
        <div class="gate-login-header">
            <div class="header-icon">🎨</div>
            <h2>GateLogin 登录页面美化</h2>
            <p>6款精美登录模板，支持主题切换，让您的登录页面更具个性</p>
        </div>';

        // 网站标题
        $siteTitle = new Typecho_Widget_Helper_Form_Element_Text(
            'siteTitle',
            NULL,
            'Typecho',
            _t('🏷️ 网站标题'),
            _t('登录页面显示的网站标题，留空则使用系统默认标题')
        );
        $form->addInput($siteTitle);

        // 副标题
        $siteSubtitle = new Typecho_Widget_Helper_Form_Element_Text(
            'siteSubtitle',
            NULL,
            '现代化的内容管理系统',
            _t('💬 副标题'),
            _t('标题下方显示的副标题或标语')
        );
        $form->addInput($siteSubtitle);

        // 登录模板
        $template = new Typecho_Widget_Helper_Form_Element_Select(
            'template',
            [
                'default' => _t('🌓 简约双模 - 支持亮白/暗黑切换，极简设计'),
                'simple' => _t('✨ 简约现代 - 单卡片居中布局，圆形背景装饰'),
                'aurora' => _t('🌌 极光风格 - 双栏布局，极光背景动画，玻璃态设计'),
                'prestige' => _t('💎 大气庄重 - 浅色系配色，渐变背景，现代简洁'),
                'brutal' => _t('🎨 新野兽派 - 粗边框硬阴影，高对比度，大胆几何'),
                'tech' => _t('🚀 科技未来 - 赛博朋克风格，霓虹光效，动态网格')
            ],
            'default',
            _t('🎨 登录模板'),
            _t('选择登录页面的显示模板风格')
        );
        $form->addInput($template);

        // 图标地址
        $iconUrl = new Typecho_Widget_Helper_Form_Element_Text(
            'iconUrl',
            NULL,
            '',
            _t('🖼️ 图标地址'),
            _t('Logo 图标的图片地址（如 https://example.com/logo.png），留空则使用默认图标')
        );
        $form->addInput($iconUrl);

        // 底部文案
        $footerText = new Typecho_Widget_Helper_Form_Element_Text(
            'footerText',
            NULL,
            '',
            _t('📝 底部文案'),
            _t('页面底部显示的文字，留空则显示默认格式。可使用变量：{year} 年份，{title} 网站标题')
        );
        $form->addInput($footerText);
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
     * 验证并过滤 URL
     *
     * @param string $url 待验证的 URL
     * @return string 验证后的 URL 或空字符串
     */
    private static function validateUrl($url)
    {
        if (empty($url)) {
            return '';
        }

        // 基本URL格式验证
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return '';
        }

        // 只允许 http 和 https 协议
        $parsed = parse_url($url);
        if ($parsed && isset($parsed['scheme']) && !in_array($parsed['scheme'], ['http', 'https'], true)) {
            return '';
        }

        return $url;
    }

    /**
     * 验证模板名称（白名单检查）
     *
     * @param string $templateName 模板名称
     * @return string 验证后的模板名称
     */
    private static function validateTemplateName($templateName)
    {
        // 模板白名单
        $allowedTemplates = ['default', 'simple', 'aurora', 'prestige', 'brutal', 'tech'];

        // 检查是否在白名单中
        if (in_array($templateName, $allowedTemplates, true)) {
            return $templateName;
        }

        // 不在白名单中，返回默认模板
        return 'default';
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

        // 获取并验证图标 URL
        $iconUrl = ($pluginOptions && isset($pluginOptions->iconUrl) && !empty($pluginOptions->iconUrl))
            ? self::validateUrl($pluginOptions->iconUrl)
            : '';

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
            'iconUrl' => $iconUrl,
            'template' => ($pluginOptions && isset($pluginOptions->template) && !empty($pluginOptions->template))
                ? self::validateTemplateName($pluginOptions->template)
                : 'default'
        );

        // 检查是否为登录页面或注册页面
        $isLoginPage = strpos($currentUrl, '/admin/login.php') !== false;
        $isRegisterPage = strpos($currentUrl, '/admin/register.php') !== false;

        if (($isLoginPage || $isRegisterPage) && $_SERVER['REQUEST_METHOD'] === 'GET') {
            // 注册页面检查是否允许注册
            if ($isRegisterPage && !$options->allowRegister) {
                $options->response->redirect($options->siteUrl);
                exit;
            }

            // 如果已经登录，重定向到后台首页
            if ($user->hasLogin()) {
                $options->response->redirect($options->adminUrl);
                exit;
            }

            // 获取上次登录/注册的用户名和邮箱
            $rememberName = htmlspecialchars(\Typecho\Cookie::get('__typecho_remember_name', ''));
            $rememberMail = htmlspecialchars(\Typecho\Cookie::get('__typecho_remember_mail', ''));
            \Typecho\Cookie::delete('__typecho_remember_name');
            \Typecho\Cookie::delete('__typecho_remember_mail');

            // 设置 body class 用于样式
            $bodyClass = 'body-100';

            // 获取选择的模板（已通过白名单验证）
            $templateName = $config['template'];
            $templateFile = dirname(__FILE__) . '/templates/' . $templateName . '.php';

            // 安全检查：确保模板文件存在（双重保护）
            if (!file_exists($templateFile)) {
                $templateFile = dirname(__FILE__) . '/templates/default.php';
            }

            // 设置页面类型（登录或注册）
            $pageType = $isRegisterPage ? 'register' : 'login';

            // 渲染自定义登录/注册页面
            include $templateFile;
            exit;  // 终止执行，阻止原始页面继续执行
        }
    }
}
