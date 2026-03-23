<?php
/**
 * Aurora Template - 极光风格登录模板
 *
 * 特性：
 * - 极光渐变背景动画
 * - 玻璃态拟态设计 (Glassmorphism)
 * - 流畅的微交互动画
 * - 完全响应式设计
 */

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
<html lang="zh-CN">
<head>
    <meta charset="<?php $options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $isRegister ? '注册' : '登录'; ?> - <?php $options->title(); ?></title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $options->pluginUrl; ?>/GateLogin/assets/css/aurora.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-glow: #6366f140;
        }
    </style>
</head>
<body class="aurora-body">

    <!-- 极光背景动画 -->
    <div class="aurora-background">
        <div class="aurora aurora-1"></div>
        <div class="aurora aurora-2"></div>
        <div class="aurora aurora-3"></div>
        <div class="aurora aurora-4"></div>
        <div class="stars"></div>
        <div class="shooting-star"></div>
    </div>

    <!-- 主登录容器 -->
    <div class="login-wrapper">
        <!-- 玻璃态卡片 -->
        <div class="glass-card">
            <!-- 左侧装饰区 -->
            <div class="card-decoration">
                <div class="decoration-content">
                    <div class="floating-shapes">
                        <div class="shape shape-1"></div>
                        <div class="shape shape-2"></div>
                        <div class="shape shape-3"></div>
                    </div>
                    <div class="brand-info">
                        <div class="brand-logo animated-logo">
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
                        <h2 class="brand-title"><?php echo htmlspecialchars($config['siteTitle']); ?></h2>
                        <p class="brand-tagline"><?php echo htmlspecialchars($config['siteSubtitle']); ?></p>
                    </div>
                </div>
            </div>

            <!-- 右侧登录表单 -->
            <div class="card-form">
                <div class="form-header">
                    <h1 class="form-title">
                        <span class="title-text"><?php echo $isRegister ? '创建账号' : '欢迎回来'; ?></span>
                        <span class="title-wave"></span>
                    </h1>
                    <p class="form-subtitle"><?php echo $isRegister ? '注册以开启您的创作之旅' : '登录以继续您的创作之旅'; ?></p>
                </div>

                <?php if ($isRegister): ?>
                <!-- 注册表单 -->
                <form action="<?php $options->registerAction(); ?>" method="post" name="register" role="form" class="login-form" id="loginForm">
                    <!-- 用户名输入 -->
                    <div class="input-group">
                        <div class="input-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>"
                                   placeholder="用户名" class="input-field" autocomplete="username" required />
                        </div>
                    </div>

                    <!-- 邮箱输入 -->
                    <div class="input-group">
                        <div class="input-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                            <input type="email" id="mail" name="mail" value="<?php echo $rememberMail; ?>"
                                   placeholder="邮箱" class="input-field" autocomplete="email" required />
                        </div>
                    </div>

                    <!-- 注册按钮 -->
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span class="btn-text">注册</span>
                        <span class="btn-progress"></span>
                        <svg class="btn-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="8.5" cy="7" r="4"/>
                            <line x1="20" y1="8" x2="20" y2="14"/>
                            <line x1="23" y1="11" x2="17" y2="11"/>
                        </svg>
                    </button>
                    <input type="hidden" name="referer" value="<?php echo $request->filter('html')->get('referer'); ?>" />
                </form>
                <?php else: ?>
                <!-- 登录表单 -->
                <form action="<?php $options->loginAction(); ?>" method="post" name="login" role="form" class="login-form" id="loginForm">
                    <!-- 用户名输入 -->
                    <div class="input-group">
                        <div class="input-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>"
                                   placeholder="用户名" class="input-field" autocomplete="username" required />
                        </div>
                    </div>

                    <!-- 密码输入 -->
                    <div class="input-group">
                        <div class="input-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                            <input type="password" id="password" name="password"
                                   placeholder="密码" class="input-field" autocomplete="current-password" required />
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
                        </div>
                    </div>

                    <!-- 记住我 -->
                    <div class="form-options">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" name="remember" class="checkbox-input"
                                   <?php if(\Typecho\Cookie::get('__typecho_remember_remember')): ?> checked<?php endif; ?> value="1" />
                            <span class="checkbox-custom">
                                <svg class="checkmark" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </span>
                            <span class="checkbox-label">记住我</span>
                        </label>
                    </div>

                    <!-- 登录按钮 -->
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span class="btn-text">登录</span>
                        <span class="btn-progress"></span>
                        <svg class="btn-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </button>
                    <input type="hidden" name="referer" value="<?php echo $request->filter('html')->get('referer'); ?>" />
                </form>
                <?php endif; ?>

                <!-- 底部链接 -->
                <div class="form-footer">
                    <div class="divider">
                        <span></span>
                        <em>更多选项</em>
                        <span></span>
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
                                注册账号
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
        </div>

        <!-- 底部版权 -->
        <footer class="login-footer">
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
        </footer>
    </div>

<?php
// 加载后台公共 JS
include __TYPECHO_ROOT_DIR__ . '/admin/common-js.php';
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 自动聚焦
    setTimeout(() => {
        document.getElementById('name').focus();
    }, 500);

    // 密码显示/隐藏切换
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            document.querySelector('.eye-open').style.display = type === 'password' ? 'block' : 'none';
            document.querySelector('.eye-closed').style.display = type === 'password' ? 'none' : 'block';
        });
    }

    // 表单提交动画
    const loginForm = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');

    loginForm.addEventListener('submit', function(e) {
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
    });

    // 输入框聚焦效果
    const inputs = document.querySelectorAll('.input-field');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });

    // 鼠标跟随效果
    document.addEventListener('mousemove', function(e) {
        const card = document.querySelector('.glass-card');
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        card.style.setProperty('--mouse-x', x + 'px');
        card.style.setProperty('--mouse-y', y + 'px');
    });
});
</script>
</body>
</html>
