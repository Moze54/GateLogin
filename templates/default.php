<?php
/**
 * Dark Template - 暗黑简约风格登录模板
 *
 * 特性：
 * - 深色主题设计
 * - 极简主义风格
 * - 优雅的过渡动画
 * - 完全响应式设计
 * - 清爽的视觉体验
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
    <link rel="stylesheet" href="<?php echo $options->pluginUrl; ?>/GateLogin/assets/css/default.css">
    <style>
        :root {
            --primary-color: <?php echo $config['primaryColor']; ?>;
            --primary-light: <?php echo $config['primaryColor']; ?>80;
        }
    </style>
</head>
<body class="dark-body">

    <!-- 背景装饰 -->
    <div class="dark-background">
        <div class="bg-gradient"></div>
        <div class="bg-noise"></div>
    </div>

    <!-- 主题切换按钮 -->
    <button class="theme-toggle" id="themeToggle" title="切换主题">
        <svg class="sun-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="5"/>
            <line x1="12" y1="1" x2="12" y2="3"/>
            <line x1="12" y1="21" x2="12" y2="23"/>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
            <line x1="1" y1="12" x2="3" y2="12"/>
            <line x1="21" y1="12" x2="23" y2="12"/>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
        </svg>
        <svg class="moon-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
        </svg>
    </button>

    <!-- 主容器 -->
    <div class="dark-wrapper">
        <!-- 登录卡片 -->
        <div class="dark-card">
            <!-- Logo 区域 -->
            <div class="card-logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <?php echo $config['iconSvg']; ?>
                    </svg>
                </div>
                <h1 class="logo-title"><?php echo htmlspecialchars($config['siteTitle']); ?></h1>
                <p class="logo-subtitle"><?php echo htmlspecialchars($config['siteSubtitle']); ?></p>
            </div>

            <!-- 分隔线 -->
            <div class="card-divider">
                <div class="divider-line"></div>
            </div>

            <!-- 登录表单 -->
            <div class="card-form">
                <form action="<?php $options->loginAction(); ?>" method="post" name="login" role="form" class="login-form" id="loginForm">
                    <!-- 用户名 -->
                    <div class="form-group">
                        <label class="form-label" for="name">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            用户名
                        </label>
                        <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>"
                               class="form-input" placeholder="请输入用户名" autocomplete="username" required />
                    </div>

                    <!-- 密码 -->
                    <div class="form-group">
                        <label class="form-label" for="password">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                            密码
                        </label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password"
                                   class="form-input" placeholder="请输入密码" autocomplete="current-password" required />
                            <button type="button" class="password-toggle" id="togglePassword">
                                <svg class="eye-open" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                                <svg class="eye-closed" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                                    <line x1="1" y1="1" x2="23" y2="23"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- 记住我 -->
                    <div class="form-options">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember" class="checkbox-input"
                                   <?php if(\Typecho\Cookie::get('__typecho_remember_remember')): ?> checked<?php endif; ?> value="1" />
                            <span class="checkbox-custom">
                                <svg class="check-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </span>
                            <span class="checkbox-text">记住登录状态</span>
                        </label>
                    </div>

                    <!-- 登录按钮 -->
                    <button type="submit" class="submit-button" id="submitBtn">
                        <span class="button-text">登录</span>
                        <svg class="button-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </button>
                    <input type="hidden" name="referer" value="<?php echo $request->filter('html')->get('referer'); ?>" />
                </form>
            </div>

            <!-- 底部链接 -->
            <div class="card-footer">
                <div class="footer-links">
                    <?php if($options->allowRegister): ?>
                        <a href="<?php $options->registerUrl(); ?>" class="footer-link">
                            注册账号
                        </a>
                        <span class="footer-dot">·</span>
                    <?php endif; ?>
                    <a href="<?php $options->siteUrl(); ?>" class="footer-link">
                        返回首页
                    </a>
                </div>
            </div>
        </div>

        <!-- 底部版权信息 -->
        <div class="dark-footer">
            <?php
            if (!empty($config['footerText'])) {
                $footerText = str_replace(
                    array('{year}', '{title}'),
                    array(date('Y'), $options->title),
                    $config['footerText']
                );
                echo '<p>' . htmlspecialchars($footerText) . '</p>';
            } else {
                echo '<p>&copy; ' . date('Y') . ' ' . htmlspecialchars($options->title) . '</p>';
            }
            ?>
        </div>
    </div>

<?php
include __TYPECHO_ROOT_DIR__ . '/admin/common-js.php';
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 主题切换功能
    const themeToggle = document.getElementById('themeToggle');
    const html = document.documentElement;

    // 从localStorage读取主题设置
    const savedTheme = localStorage.getItem('gateLoginTheme') || 'dark';
    html.setAttribute('data-theme', savedTheme);

    // 切换主题
    themeToggle.addEventListener('click', function() {
        const currentTheme = html.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        html.setAttribute('data-theme', newTheme);
        localStorage.setItem('gateLoginTheme', newTheme);

        // 添加旋转动画
        themeToggle.style.transform = 'rotate(360deg)';
        setTimeout(() => {
            themeToggle.style.transform = '';
        }, 300);
    });

    // 自动聚焦
    setTimeout(() => {
        document.getElementById('name').focus();
    }, 300);

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

    // 输入框聚焦效果
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
        document.querySelector('.dark-card').classList.add('visible');
    }, 100);
});
</script>
</body>
</html>
