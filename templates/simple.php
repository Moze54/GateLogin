<?php
/**
 * GateLogin - 自定义登录页面模板
 *
 * 此文件由 GateLogin 插件的 render() 方法加载
 * 所有必要变量已由 Plugin.php 准备好
 */

// 确保必要的变量可用（在 Plugin.php 的 render() 中已设置）
if (!isset($rememberName)) {
    $rememberName = '';
}
if (!isset($rememberMail)) {
    $rememberMail = '';
}
if (!isset($pageType)) {
    $pageType = 'login';
}

$isRegister = ($pageType === 'register');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="<?php $options->charset(); ?>">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $isRegister ? '注册' : '登录'; ?> - <?php $options->title(); ?></title>
        <meta name="robots" content="noindex, nofollow">
        <link rel="stylesheet" href="<?php echo $options->pluginUrl; ?>/GateLogin/assets/css/simple.css">
        <style>
            :root {
                --primary-color: #1e293b;
                --primary-light: #1e293bcc;
            }
        </style>
    </head>
    <body class="body-100">

<!-- 背景装饰元素 -->
<div class="bg-decoration">
    <div class="bg-circle bg-circle-1"></div>
    <div class="bg-circle bg-circle-2"></div>
    <div class="bg-circle bg-circle-3"></div>
    <div class="bg-grid"></div>
</div>

<!-- 主容器 -->
<div class="login-container">
    <!-- 顶部 Logo 区域 -->
    <div class="login-header">
        <div class="logo-wrapper">
            <div class="logo-icon">
                <?php if (!empty($config['iconUrl'])): ?>
                    <img src="<?php echo htmlspecialchars($config['iconUrl']); ?>" alt="<?php echo htmlspecialchars($config['siteTitle']); ?>" />
                <?php else: ?>
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor"/>
                        <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                <?php endif; ?>
            </div>
            <h1 class="logo-title"><?php echo htmlspecialchars($config['siteTitle']); ?></h1>
            <p class="logo-subtitle"><?php echo htmlspecialchars($config['siteSubtitle']); ?></p>
        </div>
    </div>

    <!-- 登录/注册卡片 -->
    <div class="login-card">
        <div class="card-header">
            <h2 class="card-title"><?php echo $isRegister ? '创建新账号' : '欢迎回来'; ?></h2>
            <p class="card-desc"><?php echo $isRegister ? '填写信息以注册新账号' : '登录以继续管理您的内容'; ?></p>
        </div>

        <?php if ($isRegister): ?>
        <!-- 注册表单 -->
        <form action="<?php $options->registerAction(); ?>" method="post" name="register" role="form" class="login-form">
            <div class="form-group">
                <label for="name" class="form-label">
                    <span class="label-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </span>
                    用户名
                </label>
                <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>"
                       placeholder="请输入用户名" class="form-input" autofocus required />
            </div>

            <div class="form-group">
                <label for="mail" class="form-label">
                    <span class="label-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </span>
                    邮箱
                </label>
                <input type="email" id="mail" name="mail" value="<?php echo $rememberMail; ?>"
                       placeholder="请输入邮箱地址" class="form-input" required />
            </div>

            <button type="submit" class="submit-btn">
                <span class="btn-text">注册</span>
                <span class="btn-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="8.5" cy="7" r="4"/>
                        <line x1="20" y1="8" x2="20" y2="14"/>
                        <line x1="23" y1="11" x2="17" y2="11"/>
                    </svg>
                </span>
            </button>
        </form>
        <?php else: ?>
        <!-- 登录表单 -->
        <form action="<?php $options->loginAction(); ?>" method="post" name="login" role="form" class="login-form">
            <div class="form-group">
                <label for="name" class="form-label">
                    <span class="label-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </span>
                    用户名或邮箱
                </label>
                <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>"
                       placeholder="请输入用户名或邮箱" class="form-input" autofocus />
            </div>

            <div class="form-group">
                <label for="password" class="form-label">
                    <span class="label-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </span>
                    密码
                </label>
                <input type="password" id="password" name="password"
                       placeholder="请输入密码" class="form-input" required />
            </div>

            <div class="form-options">
                <label class="checkbox-label">
                    <input type="checkbox" name="remember" class="checkbox"
                           <?php if(\Typecho\Cookie::get('__typecho_remember_remember')): ?> checked<?php endif; ?> value="1" />
                    <span class="checkbox-custom"></span>
                    <span class="checkbox-text">记住我</span>
                </label>
            </div>

            <button type="submit" class="submit-btn">
                <span class="btn-text">登录</span>
                <span class="btn-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </span>
            </button>
            <input type="hidden" name="referer" value="<?php echo $request->filter('html')->get('referer'); ?>" />
        </form>
        <?php endif; ?>

        <div class="card-footer">
            <div class="footer-divider">
                <span>或</span>
            </div>
            <div class="footer-links">
                <?php if($isRegister): ?>
                    <a href="<?php $options->loginUrl(); ?>" class="footer-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                            <polyline points="10 17 15 12 10 7"/>
                            <line x1="15" y1="12" x2="3" y2="12"/>
                        </svg>
                        返回登录
                    </a>
                <?php elseif($options->allowRegister): ?>
                    <a href="<?php $options->registerUrl(); ?>" class="footer-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="8.5" cy="7" r="4"/>
                            <line x1="20" y1="8" x2="20" y2="14"/>
                            <line x1="23" y1="11" x2="17" y2="11"/>
                        </svg>
                        创建新账号
                    </a>
                <?php endif; ?>
                <a href="<?php $options->siteUrl(); ?>" class="footer-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    返回首页
                </a>
            </div>
        </div>
    </div>

    <!-- 底部信息 -->
    <div class="login-footer">
        <?php
        if (!empty($config['footerText'])) {
            $footerText = str_replace(
                array('{year}', '{title}'),
                array(date('Y'), $options->title),
                $config['footerText']
            );
            echo '<p>' . htmlspecialchars($footerText) . '</p>';
        } else {
            echo '<p>&copy; ' . date('Y') . ' ' . htmlspecialchars($options->title) . '. Powered by Typecho</p>';
        }
        ?>
    </div>
</div>

<?php
// 手动加载 jQuery（不加载 common-js.php 以避免原生消息提示冲突）
?>
<script src="<?php echo $options->adminStaticUrl('js', 'jquery.js'); ?>"></script>
<script src="<?php echo $options->adminStaticUrl('js', 'jquery-ui.js'); ?>"></script>
<script src="<?php echo $options->adminStaticUrl('js', 'typecho.js'); ?>"></script>
<script>
$(document).ready(function () {
    $('#name').focus();

    // 输入框焦点效果
    $('.form-input').on('focus', function() {
        $(this).closest('.form-group').addClass('focused');
    }).on('blur', function() {
        if ($(this).val() === '') {
            $(this).closest('.form-group').removeClass('focused');
        }
    });

    // 初始化已有值的输入框
    $('.form-input').each(function() {
        if ($(this).val() !== '') {
            $(this).closest('.form-group').addClass('focused');
        }
    });

    // 显示消息提示
    function showMessage(messages, type) {
        type = type || 'notice';
        var messageText = Array.isArray(messages) ? messages.join('<br>') : messages;

        // 移除已存在的消息
        $('.gate-message').remove();

        // 创建消息元素
        var iconHtml = '';
        if (type === 'success') {
            iconHtml = '<svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
        } else if (type === 'error') {
            iconHtml = '<svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
        } else {
            iconHtml = '<svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>';
        }

        var $message = $('<div class="gate-message ' + type + '">' +
            iconHtml +
            '<div class="message-content">' + messageText + '</div>' +
            '<div class="message-close">' +
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>' +
            '</div>' +
        '</div>');

        $('body').append($message);

        // 显示消息
        setTimeout(function() {
            $message.addClass('show');
        }, 10);

        // 点击关闭
        $message.find('.message-close').on('click', function() {
            $message.removeClass('show');
            setTimeout(function() {
                $message.remove();
            }, 300);
        });

        // 自动关闭
        setTimeout(function() {
            if ($message.hasClass('show')) {
                $message.removeClass('show');
                setTimeout(function() {
                    $message.remove();
                }, 300);
            }
        }, 5000);
    }

    // 检查并显示 Typecho 的通知消息
    (function() {
        var prefix = '<?php echo \Typecho\Cookie::getPrefix(); ?>',
            notice = $.cookie(prefix + '__typecho_notice'),
            noticeType = $.cookie(prefix + '__typecho_notice_type'),
            path = '<?php echo \Typecho\Cookie::getPath(); ?>',
            domain = '<?php echo \Typecho\Cookie::getDomain(); ?>',
            secure = <?php echo json_encode(\Typecho\Cookie::getSecure()); ?>;

        if (notice && noticeType) {
            var messages = $.parseJSON(notice);
            showMessage(messages, noticeType);

            // 清除 cookie
            $.cookie(prefix + '__typecho_notice', null, {path: path, domain: domain, secure: secure});
            $.cookie(prefix + '__typecho_notice_type', null, {path: path, domain: domain, secure: secure});
        }
    })();
});
</script>
</body>
</html>
