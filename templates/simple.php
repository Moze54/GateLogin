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
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="<?php $options->charset(); ?>">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php _e('登录 - %s', $options->title); ?></title>
        <meta name="robots" content="noindex, nofollow">
        <link rel="stylesheet" href="<?php echo $options->pluginUrl; ?>/GateLogin/assets/css/simple.css">
        <style>
            :root {
                --primary-color: <?php echo $config['primaryColor']; ?>;
                --primary-light: <?php echo $config['primaryColor']; ?>cc;
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
                        <?php echo $config['iconSvg']; ?>
                    </svg>
                <?php endif; ?>
            </div>
            <h1 class="logo-title"><?php echo htmlspecialchars($config['siteTitle']); ?></h1>
            <p class="logo-subtitle"><?php echo htmlspecialchars($config['siteSubtitle']); ?></p>
        </div>
    </div>

    <!-- 登录卡片 -->
    <div class="login-card">
        <div class="card-header">
            <h2 class="card-title">欢迎回来</h2>
            <p class="card-desc">登录以继续管理您的内容</p>
        </div>

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

        <div class="card-footer">
            <div class="footer-divider">
                <span>或</span>
            </div>
            <div class="footer-links">
                <?php if($options->allowRegister): ?>
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
// 加载后台公共 JS（使用绝对路径）
include __TYPECHO_ROOT_DIR__ . '/admin/common-js.php';
?>
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
});
</script>
</body>
</html>
