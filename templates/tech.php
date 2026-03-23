<?php
/**
 * Tech Template - 科技感风格登录模板
 *
 * 特性：
 * - 赛博朋克风格设计
 * - 霓虹灯光效
 * - 动态网格背景
 * - 粒子动画效果
 * - 扫描线特效
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
    <link rel="stylesheet" href="<?php echo $options->pluginUrl; ?>/GateLogin/assets/css/tech.css">
</head>
<body class="tech-body">

    <!-- 背景效果 -->
    <div class="tech-background">
        <!-- 网格背景 -->
        <div class="grid-background"></div>

        <!-- 扫描线 -->
        <div class="scan-lines"></div>

        <!-- 粒子效果 -->
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>

        <!-- 光晕效果 -->
        <div class="glow-orb orb-1"></div>
        <div class="glow-orb orb-2"></div>
    </div>

    <!-- 主容器 -->
    <div class="tech-wrapper">
        <!-- 左侧科技装饰区 -->
        <div class="tech-decor">
            <!-- 系统信息面板 -->
            <div class="system-panel">
                <div class="panel-header">
                    <div class="status-indicator"></div>
                    <span class="panel-title">SYSTEM STATUS</span>
                </div>
                <div class="panel-content">
                    <div class="system-info">
                        <div class="info-line">
                            <span class="info-label">SYSTEM</span>
                            <span class="info-value">ONLINE</span>
                        </div>
                        <div class="info-line">
                            <span class="info-label">VERSION</span>
                            <span class="info-value">v2.0.45</span>
                        </div>
                        <div class="info-line">
                            <span class="info-label">UPTIME</span>
                            <span class="info-value">99.9%</span>
                        </div>
                        <div class="info-line">
                            <span class="info-label">SECURITY</span>
                            <span class="info-value">ACTIVE</span>
                        </div>
                    </div>
                    <!-- 数据流动画 -->
                    <div class="data-stream">
                        <div class="stream-line"></div>
                        <div class="stream-line"></div>
                        <div class="stream-line"></div>
                    </div>
                </div>
            </div>

            <!-- 大标题 -->
            <div class="tech-title">
                <h1 class="main-title"><?php echo htmlspecialchars($config['siteTitle']); ?></h1>
                <p class="sub-title"><?php echo htmlspecialchars($config['siteSubtitle']); ?></p>
            </div>

            <!-- 装饰性代码块 -->
            <div class="code-block">
                <div class="code-line">01001000 01000101 01001100 01001100 01001111</div>
                <div class="code-line">01010111 01001111 01010010 01001100 01000100</div>
                <div class="code-line">01110011 01111001 01110011 01110100 01100101</div>
                <div class="code-line">01100001 01100011 01100011 01100101 01110011</div>
                <div class="code-line">01100011 01101111 01101110 01110100 01110010</div>
            </div>

            <!-- 装饰圆环 -->
            <div class="tech-rings">
                <div class="ring ring-1"></div>
                <div class="ring ring-2"></div>
                <div class="ring ring-3"></div>
            </div>
        </div>

        <!-- 右侧登录区域 -->
        <div class="tech-login-area">
            <!-- 登录卡片 -->
            <div class="tech-card">
            <!-- 角落装饰 -->
            <div class="corner-decoration corner-tl"></div>
            <div class="corner-decoration corner-tr"></div>
            <div class="corner-decoration corner-bl"></div>
            <div class="corner-decoration corner-br"></div>

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
                <h1 class="site-title"><?php echo $isRegister ? 'REGISTER' : 'ACCESS CONTROL'; ?></h1>
                <p class="site-subtitle"><?php echo $isRegister ? '注册新用户' : '身份验证系统'; ?></p>
            </div>

            <!-- 登录/注册表单 -->
            <div class="card-body">
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
                        </div>
                    </div>

                    <!-- 注册按钮 -->
                    <button type="submit" class="submit-button" id="submitBtn">
                        <span class="button-text">REGISTER</span>
                        <svg class="button-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="8.5" cy="7" r="4"/>
                            <line x1="20" y1="8" x2="20" y2="14"/>
                            <line x1="23" y1="11" x2="17" y2="11"/>
                        </svg>
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
                            <span class="checkbox-box">
                                <svg class="check-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </span>
                            <span class="checkbox-text">记住登录状态</span>
                        </label>
                    </div>

                    <!-- 登录按钮 -->
                    <button type="submit" class="submit-button" id="submitBtn">
                        <span class="button-text">LOGIN</span>
                        <svg class="button-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
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
                            BACK TO LOGIN
                        </a>
                    <?php elseif($options->allowRegister): ?>
                        <a href="<?php $options->registerUrl(); ?>" class="footer-link">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="8.5" cy="7" r="4"/>
                                <line x1="20" y1="8" x2="20" y2="14"/>
                                <line x1="23" y1="11" x2="17" y2="11"/>
                            </svg>
                            REGISTER
                        </a>
                    <?php endif; ?>
                    <a href="<?php $options->siteUrl(); ?>" class="footer-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                        HOME
                    </a>
                </div>
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
    }, 500);

    // 密码显示/隐藏（仅登录页面）
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
        const buttonText = submitBtn.querySelector('.button-text');
        if (buttonText) {
            buttonText.textContent = buttonText.textContent === 'LOGIN' ? '登录中...' : '注册中...';
        }
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
        document.querySelector('.tech-card').classList.add('visible');
    }, 100);

    // 系统信息滚动效果
    const systemInfo = {
        items: [
            { label: 'SYSTEM', value: 'ONLINE' },
            { label: 'VERSION', value: 'v2.0.45' },
            { label: 'UPTIME', value: '99.9%' },
            { label: 'SECURITY', value: 'ACTIVE' },
            { label: 'NETWORK', value: 'CONNECTED' },
            { label: 'MEMORY', value: '64%' },
            { label: 'CPU', value: '23%' },
            { label: 'DISK', value: '78%' },
            { label: 'BANDWIDTH', value: '1.2GB/s' },
            { label: 'LATENCY', value: '12ms' },
            { label: 'TEMPERATURE', value: '42°C' },
            { label: 'POWER', value: 'STABLE' },
            { label: 'FIREWALL', value: 'ENABLED' },
            { label: 'ENCRYPTION', value: 'AES-256' },
            { label: 'BACKUP', value: 'AUTO' },
            { label: 'PROTOCOL', value: 'HTTPS' },
            { label: 'AUTH', value: '2FA' },
            { label: 'LOGS', value: 'RECORDING' },
            { label: 'CACHE', value: 'HIT' }
        ],
        container: null,
        scrollWrapper: null,
        scrollSpeed: 0.5,
        animationId: null,

        init() {
            this.container = document.querySelector('.system-info');
            if (!this.container) return;

            // 清空现有内容
            this.container.innerHTML = '';

            // 创建滚动容器
            this.scrollWrapper = document.createElement('div');
            this.scrollWrapper.className = 'info-scroll-wrapper';
            this.scrollWrapper.style.cssText = `
                overflow: hidden;
                position: relative;
                height: 160px;
            `;

            // 创建内容容器
            const contentWrapper = document.createElement('div');
            contentWrapper.className = 'info-scroll-content';
            contentWrapper.style.cssText = `
                position: absolute;
                width: 100%;
                transition: transform 0.5s ease;
            `;

            // 创建所有信息项
            this.items.forEach(item => {
                const infoLine = document.createElement('div');
                infoLine.className = 'info-line';

                const labelElement = document.createElement('span');
                labelElement.className = 'info-label';
                labelElement.textContent = item.label;

                const valueElement = document.createElement('span');
                valueElement.className = 'info-value';
                valueElement.textContent = item.value;

                infoLine.appendChild(labelElement);
                infoLine.appendChild(valueElement);
                contentWrapper.appendChild(infoLine);
            });

            this.scrollWrapper.appendChild(contentWrapper);
            this.container.appendChild(this.scrollWrapper);

            this.contentWrapper = contentWrapper;
            this.lineHeight = 40; // 每行高度
            this.visibleLines = 4; // 可见行数
            this.currentPosition = 0;

            // 开始滚动
            this.startScrolling();
        },

        startScrolling() {
            setInterval(() => {
                this.currentPosition++;

                // 当滚动到末尾时，重置到开头
                if (this.currentPosition >= this.items.length) {
                    this.currentPosition = 0;
                }

                const offset = -this.currentPosition * this.lineHeight;
                this.contentWrapper.style.transform = `translateY(${offset}px)`;
            }, 2000);
        }
    };

    // 初始化系统信息滚动
    systemInfo.init();
});
</script>
</body>
</html>
