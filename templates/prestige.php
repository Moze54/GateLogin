<?php
/**
 * Prestige Template - 大气庄重风格登录模板
 *
 * 特性：
 * - 大气的渐变背景
 * - 现代简洁的卡片设计
 * - 浅色系配色（蓝色/青色）
 * - 优雅的微交互动画
 * - 完全响应式设计
 */

if (!isset($rememberName)) {
    $rememberName = '';
}
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="<?php $options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php _e('登录 - %s', $options->title); ?></title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $options->pluginUrl; ?>/GateLogin/assets/css/prestige.css">
    <style>
        :root {
            --primary-color: <?php echo $config['primaryColor']; ?>;
            --primary-light: <?php echo $config['primaryColor']; ?>20;
            --primary-lighter: <?php echo $config['primaryColor']; ?>10;
        }
    </style>
</head>
<body class="prestige-body">

    <!-- 背景装饰 -->
    <div class="prestige-background">
        <div class="gradient-layer layer-1"></div>
        <div class="gradient-layer layer-2"></div>
        <div class="gradient-layer layer-3"></div>
        <div class="floating-shapes">
            <div class="shape shape-circle-1"></div>
            <div class="shape shape-circle-2"></div>
            <div class="shape shape-circle-3"></div>
        </div>
    </div>

    <!-- 主容器 -->
    <div class="prestige-wrapper">
        <!-- 登录卡片 -->
        <div class="prestige-card">
            <!-- 头部 Logo 区域 -->
            <div class="card-header">
                <div class="logo-container">
                    <div class="logo-icon">
                        <?php if (!empty($config['iconUrl'])): ?>
                            <img src="<?php echo htmlspecialchars($config['iconUrl']); ?>" alt="<?php echo htmlspecialchars($config['siteTitle']); ?>" />
                        <?php else: ?>
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <?php echo $config['iconSvg']; ?>
                            </svg>
                        <?php endif; ?>
                    </div>
                </div>
                <h1 class="site-title"><?php echo htmlspecialchars($config['siteTitle']); ?></h1>
                <p class="site-subtitle"><?php echo htmlspecialchars($config['siteSubtitle']); ?></p>
            </div>

            <!-- 登录表单 -->
            <div class="card-body">
                <div class="form-intro">
                    <h2 class="form-title">管理员登录</h2>
                    <p class="form-desc">请使用您的管理员账号登录系统</p>
                </div>

                <form action="<?php $options->loginAction(); ?>" method="post" name="login" role="form" class="login-form" id="loginForm">
                    <!-- 用户名 -->
                    <div class="form-group">
                        <label class="form-label" for="name">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            用户名
                        </label>
                        <div class="input-container">
                            <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>"
                                   class="form-input" placeholder="请输入用户名" autocomplete="username" required />
                            <div class="input-border"></div>
                        </div>
                    </div>

                    <!-- 密码 -->
                    <div class="form-group">
                        <label class="form-label" for="password">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                            密码
                        </label>
                        <div class="input-container">
                            <input type="password" id="password" name="password"
                                   class="form-input" placeholder="请输入密码" autocomplete="current-password" required />
                            <button type="button" class="password-toggle" id="togglePassword">
                                <svg class="eye-open" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                                <svg class="eye-closed" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                                    <line x1="1" y1="1" x2="23" y2="23"/>
                                </svg>
                            </button>
                            <div class="input-border"></div>
                        </div>
                    </div>

                    <!-- 记住我 -->
                    <div class="form-options">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember" class="checkbox-input"
                                   <?php if(\Typecho\Cookie::get('__typecho_remember_remember')): ?> checked<?php endif; ?> value="1" />
                            <span class="checkbox-box">
                                <svg class="check-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </span>
                            <span class="checkbox-text">记住我的登录状态</span>
                        </label>
                    </div>

                    <!-- 登录按钮 -->
                    <button type="submit" class="submit-button" id="submitBtn">
                        <span class="button-text">立即登录</span>
                        <svg class="button-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        <div class="button-shine"></div>
                    </button>
                    <input type="hidden" name="referer" value="<?php echo $request->filter('html')->get('referer'); ?>" />
                </form>
            </div>

            <!-- 底部链接 -->
            <div class="card-footer">
                <div class="footer-divider"></div>
                <div class="footer-links">
                    <?php if($options->allowRegister): ?>
                        <a href="<?php $options->registerUrl(); ?>" class="footer-link">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="8.5" cy="7" r="4"/>
                                <line x1="20" y1="8" x2="20" y2="14"/>
                                <line x1="23" y1="11" x2="17" y2="11"/>
                            </svg>
                            注册新账号
                        </a>
                    <?php endif; ?>
                    <a href="<?php $options->siteUrl(); ?>" class="footer-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                        返回网站首页
                    </a>
                </div>
            </div>
        </div>

        <!-- 版权信息 -->
        <footer class="prestige-footer">
            <?php
            if (!empty($config['footerText'])) {
                $footerText = str_replace(
                    array('{year}', '{title}'),
                    array(date('Y'), $options->title),
                    $config['footerText']
                );
                echo '<p>' . htmlspecialchars($footerText) . '</p>';
            } else {
                echo '<p>&copy; ' . date('Y') . ' ' . htmlspecialchars($options->title) . ' · Powered by Typecho</p>';
            }
            ?>
        </footer>
    </div>

<?php
include __TYPECHO_ROOT_DIR__ . '/admin/common-js.php';
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 自动聚焦
    setTimeout(() => {
        document.getElementById('name').focus();
    }, 400);

    // 密码显示/隐藏
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        document.querySelector('.eye-open').style.display = type === 'password' ? 'block' : 'none';
        document.querySelector('.eye-closed').style.display = type === 'password' ? 'none' : 'block';
    });

    // 表单提交效果
    const loginForm = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');

    loginForm.addEventListener('submit', function(e) {
        submitBtn.classList.add('submitting');
        submitBtn.disabled = true;
        submitBtn.querySelector('.button-text').textContent = '登录中...';
    });

    // 输入框聚焦动画
    const inputs = document.querySelectorAll('.form-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });

        // 初始化状态
        if (input.value) {
            input.parentElement.classList.add('focused');
        }
    });

    // 卡片进入动画
    setTimeout(() => {
        document.querySelector('.prestige-card').classList.add('visible');
    }, 100);
});
</script>
</body>
</html>
