<?php
/**
 * Brutal Template - 新野兽派风格登录模板
 *
 * 特性：
 * - 粗黑边框设计
 * - 硬阴影效果（无模糊）
 * - 高对比度配色
 * - 大胆的几何形状
 * - 独特的视觉风格
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
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $options->pluginUrl; ?>/GateLogin/assets/css/brutal.css">
    <style>
        :root {
            --primary-color: #000000;
        }
    </style>
</head>
<body class="brutal-body">

    <!-- 背景装饰 -->
    <div class="brutal-background">
        <div class="bg-pattern"></div>
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
    </div>

    <!-- 主容器 -->
    <div class="brutal-wrapper">
        <!-- 左侧装饰区域 -->
        <div class="brutal-decor">
            <div class="decor-content">
                <div class="decor-title">
                    <h1>WELCOME</h1>
                    <h2>BACK</h2>
                </div>
                <div class="decor-shapes">
                    <div class="big-shape shape-square"></div>
                    <div class="big-shape shape-circle"></div>
                    <div class="big-shape shape-triangle"></div>
                </div>
                <div class="decor-text">
                    <p><?php echo htmlspecialchars($config['siteTitle']); ?></p>
                    <span class="decor-line"></span>
                </div>
            </div>
        </div>

        <!-- 右侧登录框 -->
        <div class="brutal-card">
            <!-- 顶部装饰条 -->
            <div class="card-banner">
                <div class="banner-dot"></div>
                <div class="banner-dot"></div>
                <div class="banner-dot"></div>
            </div>

            <!-- Logo 区域 -->
            <div class="card-logo">
                <div class="logo-box">
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
                <div class="logo-badge"><?php echo htmlspecialchars($config['siteSubtitle']); ?></div>
            </div>

            <!-- 登录表单 -->
            <?php if ($isRegister): ?>
            <form action="<?php $options->registerAction(); ?>" method="post" name="register" role="form" class="brutal-form" id="loginForm">
                <!-- 用户名 -->
                <div class="form-group">
                    <label class="brutal-label" for="name">
                        <span>USERNAME</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </label>
                    <div class="input-wrapper">
                        <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>"
                               class="brutal-input" placeholder="Enter your username" autocomplete="username" required />
                        <div class="input-corner tl"></div>
                        <div class="input-corner tr"></div>
                        <div class="input-corner bl"></div>
                        <div class="input-corner br"></div>
                    </div>
                </div>

                <!-- 邮箱 -->
                <div class="form-group">
                    <label class="brutal-label" for="mail">
                        <span>EMAIL</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </label>
                    <div class="input-wrapper">
                        <input type="email" id="mail" name="mail" value="<?php echo $rememberMail; ?>"
                               class="brutal-input" placeholder="Enter your email" autocomplete="email" required />
                        <div class="input-corner tl"></div>
                        <div class="input-corner tr"></div>
                        <div class="input-corner bl"></div>
                        <div class="input-corner br"></div>
                    </div>
                </div>

                <!-- 注册按钮 -->
                <button type="submit" class="brutal-submit" id="submitBtn">
                    <span class="submit-text">REGISTER</span>
                    <svg class="submit-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="8.5" cy="7" r="4"/>
                        <line x1="20" y1="8" x2="20" y2="14"/>
                        <line x1="23" y1="11" x2="17" y2="11"/>
                    </svg>
                </button>
                <input type="hidden" name="referer" value="<?php echo $request->filter('html')->get('referer'); ?>" />
            </form>
            <?php else: ?>
            <form action="<?php $options->loginAction(); ?>" method="post" name="login" role="form" class="brutal-form" id="loginForm">
                <!-- 用户名 -->
                <div class="form-group">
                    <label class="brutal-label" for="name">
                        <span>USERNAME</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </label>
                    <div class="input-wrapper">
                        <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>"
                               class="brutal-input" placeholder="Enter your username" autocomplete="username" required />
                        <div class="input-corner tl"></div>
                        <div class="input-corner tr"></div>
                        <div class="input-corner bl"></div>
                        <div class="input-corner br"></div>
                    </div>
                </div>

                <!-- 密码 -->
                <div class="form-group">
                    <label class="brutal-label" for="password">
                        <span>PASSWORD</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password"
                               class="brutal-input" placeholder="Enter your password" autocomplete="current-password" required />
                        <button type="button" class="password-toggle" id="togglePassword">
                            <svg class="eye-open" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <svg class="eye-closed" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="display:none;">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                                <line x1="1" y1="1" x2="23" y2="23" stroke-width="3"/>
                            </svg>
                        </button>
                        <div class="input-corner tl"></div>
                        <div class="input-corner tr"></div>
                        <div class="input-corner bl"></div>
                        <div class="input-corner br"></div>
                    </div>
                </div>

                <!-- 记住我 -->
                <div class="form-options">
                    <label class="brutal-checkbox">
                        <input type="checkbox" name="remember" class="checkbox-input"
                               <?php if(\Typecho\Cookie::get('__typecho_remember_remember')): ?> checked<?php endif; ?> value="1" />
                        <span class="checkbox-box">
                            <svg class="checkmark" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </span>
                        <span class="checkbox-text">Remember Me</span>
                    </label>
                </div>

                <!-- 登录按钮 -->
                <button type="submit" class="brutal-submit" id="submitBtn">
                    <span class="submit-text">LOGIN</span>
                    <svg class="submit-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
                <input type="hidden" name="referer" value="<?php echo $request->filter('html')->get('referer'); ?>" />
            </form>
            <?php endif; ?>

            <!-- 底部链接 -->
            <div class="card-footer">
                <div class="footer-divider"></div>
                <div class="footer-links">
                    <?php if($isRegister): ?>
                        <a href="<?php $options->loginUrl(); ?>" class="brutal-link">
                            <span>BACK TO LOGIN</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                                <polyline points="10 17 15 12 10 7"/>
                                <line x1="15" y1="12" x2="3" y2="12"/>
                            </svg>
                        </a>
                    <?php elseif($options->allowRegister): ?>
                        <a href="<?php $options->registerUrl(); ?>" class="brutal-link">
                            <span>REGISTER</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="8.5" cy="7" r="4"/>
                                <line x1="20" y1="8" x2="20" y2="14"/>
                                <line x1="23" y1="11" x2="17" y2="11"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <a href="<?php $options->siteUrl(); ?>" class="brutal-link">
                        <span>HOME</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
include __TYPECHO_ROOT_DIR__ . '/admin/common-js.php';
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 自动聚焦
    setTimeout(() => {
        document.getElementById('name').focus();
    }, 300);

    // 密码显示/隐藏
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

    // 表单提交
    const loginForm = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');

    loginForm.addEventListener('submit', function(e) {
        submitBtn.classList.add('submitting');
        submitBtn.disabled = true;
        const originalText = submitBtn.querySelector('.submit-text').textContent;
        submitBtn.querySelector('.submit-text').textContent = originalText + '...';
    });

    // 输入框聚焦效果
    const inputs = document.querySelectorAll('.brutal-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });

    // 卡片进入动画
    setTimeout(() => {
        document.querySelector('.brutal-card').classList.add('visible');
    }, 100);
});
</script>
</body>
</html>
