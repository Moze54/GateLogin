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
    <link rel="stylesheet" href="<?php echo $options->pluginUrl; ?>/GateLogin/assets/css/prestige.css">
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-light: #4f46e520;
            --primary-lighter: #4f46e510;
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
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor"/>
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
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
                    <h2 class="form-title"><?php echo $isRegister ? '注册新账号' : '管理员登录'; ?></h2>
                    <p class="form-desc"><?php echo $isRegister ? '填写信息以注册新账号' : '请使用您的管理员账号登录系统'; ?></p>
                </div>

                <?php if ($isRegister): ?>
                <form action="<?php $options->registerAction(); ?>" method="post" name="register" role="form" class="login-form" id="loginForm">
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

                    <!-- 邮箱 -->
                    <div class="form-group">
                        <label class="form-label" for="mail">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                            邮箱
                        </label>
                        <div class="input-container">
                            <input type="email" id="mail" name="mail" value="<?php echo $rememberMail; ?>"
                                   class="form-input" placeholder="请输入邮箱地址" autocomplete="email" required />
                            <div class="input-border"></div>
                        </div>
                    </div>

                    <!-- 注册按钮 -->
                    <button type="submit" class="submit-button" id="submitBtn">
                        <span class="button-text">立即注册</span>
                        <svg class="button-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="8.5" cy="7" r="4"/>
                            <line x1="20" y1="8" x2="20" y2="14"/>
                            <line x1="23" y1="11" x2="17" y2="11"/>
                        </svg>
                        <div class="button-shine"></div>
                    </button>
                    <input type="hidden" name="referer" value="<?php echo $request->filter('html')->get('referer'); ?>" />
                </form>
                <?php else: ?>
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
                <?php endif; ?>
            </div>

            <!-- 底部链接 -->
            <div class="card-footer">
                <div class="footer-divider"></div>
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
// 手动加载 jQuery（不加载 common-js.php 以避免原生消息提示冲突）
?>
<script src="<?php echo $options->adminStaticUrl('js', 'jquery.js'); ?>"></script>
<script src="<?php echo $options->adminStaticUrl('js', 'jquery-ui.js'); ?>"></script>
<script src="<?php echo $options->adminStaticUrl('js', 'typecho.js'); ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 自动聚焦
    setTimeout(() => {
        document.getElementById('name').focus();
    }, 400);

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

    // 表单提交效果
    const loginForm = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');

    loginForm.addEventListener('submit', function(e) {
        submitBtn.classList.add('submitting');
        submitBtn.disabled = true;
        const originalText = submitBtn.querySelector('.button-text').textContent;
        submitBtn.querySelector('.button-text').textContent = originalText === '立即登录' ? '登录中...' : '注册中...';
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

    // 显示消息提示
    function showMessage(messages, type) {
        type = type || 'notice';
        const messageText = Array.isArray(messages) ? messages.join('<br>') : messages;

        const existingMessage = document.querySelector('.gate-message');
        if (existingMessage) {
            existingMessage.remove();
        }

        let iconHtml = '';
        if (type === 'success') {
            iconHtml = '<svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
        } else if (type === 'error') {
            iconHtml = '<svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
        } else {
            iconHtml = '<svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>';
        }

        const messageDiv = document.createElement('div');
        messageDiv.className = 'gate-message ' + type;
        messageDiv.innerHTML = `
            ${iconHtml}
            <div class="message-content">${messageText}</div>
            <div class="message-close">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        `;

        document.body.appendChild(messageDiv);

        setTimeout(() => {
            messageDiv.classList.add('show');
        }, 10);

        messageDiv.querySelector('.message-close').addEventListener('click', function() {
            messageDiv.classList.remove('show');
            setTimeout(() => {
                messageDiv.remove();
            }, 300);
        });

        setTimeout(() => {
            if (messageDiv.classList.contains('show')) {
                messageDiv.classList.remove('show');
                setTimeout(() => {
                    messageDiv.remove();
                }, 300);
            }
        }, 5000);
    }

    // 检查并显示 Typecho 的通知消息
    (function() {
        if (typeof $ !== 'undefined') {
            const prefix = '<?php echo \Typecho\Cookie::getPrefix(); ?>';
            const noticeCookie = $.cookie(prefix + '__typecho_notice');
            const noticeTypeCookie = $.cookie(prefix + '__typecho_notice_type');

            if (noticeCookie && noticeTypeCookie) {
                const messages = JSON.parse(noticeCookie);
                showMessage(messages, noticeTypeCookie);

                $.cookie(prefix + '__typecho_notice', null, {path: '<?php echo \Typecho\Cookie::getPath(); ?>', domain: '<?php echo \Typecho\Cookie::getDomain(); ?>', secure: <?php echo json_encode(\Typecho\Cookie::getSecure()); ?>});
                $.cookie(prefix + '__typecho_notice_type', null, {path: '<?php echo \Typecho\Cookie::getPath(); ?>', domain: '<?php echo \Typecho\Cookie::getDomain(); ?>', secure: <?php echo json_encode(\Typecho\Cookie::getSecure()); ?>});
            }
        }
    })();
});
</script>
</body>
</html>
