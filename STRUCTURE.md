# GateLogin 插件项目结构

## 目录结构

```
GateLogin/
├── Plugin.php              # 插件主文件（核心逻辑）
├── templates/             # 模板目录
│   ├── default.php        # 默认模板（简约现代风格）
│   ├── aurora.php         # 极光风格模板
│   └── prestige.php       # 大气庄重模板
├── assets/                # 全局资源目录
│   └── css/               # 样式文件
│       ├── default.css    # 默认模板样式
│       ├── aurora.css     # 极光模板样式
│       └── prestige.css   # 大气庄重模板样式
│
└── STRUCTURE.md           # 本文档（项目结构说明）
```

## 文件说明

### 核心文件

| 文件 | 说明 |
|------|------|
| `Plugin.php` | 插件主文件，包含插件类定义、配置面板、渲染逻辑等核心功能 |

### 模板系统

#### templates/ 目录

存放所有登录页面模板，每个模板都是独立的：

```
templates/
├── {模板名称}.php       # 模板文件
└── assets/
    └── {模板名称}.css   # 模板样式文件
```

#### 已有模板

| 模板名称 | 文件 | 风格特点 |
|---------|------|---------|
| **default** | `templates/default.php` | 简约现代、圆形背景装饰、渐变色主题、单卡片居中布局 |
| **aurora** | `templates/aurora.php` | 极光背景动画、玻璃态设计、流星效果、双栏响应式布局 |
| **prestige** | `templates/prestige.php` | 大气庄重、浅色系配色（蓝色/青色）、渐变背景、现代简洁设计 |

## 模板开发指南

### 创建新模板

1. 在 `templates/` 目录下创建新的 PHP 文件（如 `my-template.php`）
2. 在 `assets/css/` 目录下创建对应的 CSS 文件（如 `my-template.css`）
3. 在模板中引用样式文件：
   ```php
   <link rel="stylesheet" href="<?php echo $options->pluginUrl; ?>/GateLogin/assets/css/my-template.css">
   ```

### 可用变量

所有模板都可以使用以下变量（由 `Plugin.php` 的 `render()` 方法提供）：

```php
// 配置变量
$config           // 插件配置数组
$config['siteTitle']      // 站点标题
$config['siteSubtitle']   // 站点副标题
$config['primaryColor']   // 主题色
$config['iconSvg']        // 图标 SVG
$config['footerText']     // 页脚文字

// Typecho 核心对象
$options          // Typecho 配置对象
$request          // 当前请求对象

// 表单变量
$rememberName     // 记住的用户名
```

### 模板示例

```php
<?php
/**
 * My Template - 自定义登录模板
 */
if (!isset($rememberName)) {
    $rememberName = '';
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $options->charset(); ?>">
    <title><?php _e('登录 - %s', $options->title); ?></title>
    <link rel="stylesheet" href="<?php echo $options->pluginUrl; ?>/GateLogin/templates/assets/my-template.css">
    <style>
        :root {
            --primary-color: <?php echo $config['primaryColor']; ?>;
        }
    </style>
</head>
<body>
    <!-- 你的模板内容 -->
    <form action="<?php $options->loginAction(); ?>" method="post">
        <input type="text" name="name" value="<?php echo $rememberName; ?>">
        <input type="password" name="password">
        <button type="submit">登录</button>
    </form>

    <?php include __TYPECHO_ROOT_DIR__ . '/admin/common-js.php'; ?>
</body>
</html>
```

### 必需元素

每个登录模板必须包含：

1. **表单元素**：
   ```php
   <form action="<?php $options->loginAction(); ?>" method="post" name="login">
       <input type="text" name="name" value="<?php echo $rememberName; ?>">
       <input type="password" name="password">
       <!-- 记住我（可选） -->
       <input type="checkbox" name="remember" value="1">
       <!-- 来源页面（必需） -->
       <input type="hidden" name="referer" value="<?php echo $request->filter('html')->get('referer'); ?>">
       <button type="submit">登录</button>
   </form>
   ```

2. **公共 JS**（在 `</body>` 前）：
   ```php
   <?php include __TYPECHO_ROOT_DIR__ . '/admin/common-js.php'; ?>
   ```

3. **主题色变量**（用于自定义颜色）：
   ```css
   :root {
       --primary-color: <?php echo $config['primaryColor']; ?>;
   }
   ```

## 设计规范

### 响应式设计

所有模板应支持以下断点：
- **移动设备**：< 768px
- **平板设备**：768px - 1024px
- **桌面设备**：> 1024px

### 动画性能

- ✅ 使用 CSS `transform` 和 `opacity` 进行动画（GPU 加速）
- ❌ 避免使用 `width`、`height`、`top`、`left` 等属性做动画
- 💡 可使用 `will-change` 提示浏览器优化

### 浏览器兼容

- Chrome/Edge: 最新版本
- Firefox: 最新版本
- Safari: 最新版本
- 移动浏览器: iOS Safari 12+, Chrome Android 最新版

### 命名规范

- **模板文件**：`{模板名称}.php`（小写，用连字符分隔单词）
- **样式文件**：`{模板名称}.css`（与模板同名）
- **CSS 类名**：使用 BEM 或连字符命名法
- **CSS 变量**：使用 `--` 前缀，如 `--primary-color`

## 模板切换

### 方法 1：直接修改 Plugin.php

在 `Plugin.php` 的 `render()` 方法中修改：

```php
// 使用默认模板
include __DIR__ . '/templates/default.php';

// 或使用极光模板
include __DIR__ . '/templates/aurora.php';
```

### 方法 2：添加配置选项（推荐）

在 `Plugin.php` 的 `config()` 方法中添加模板选择器：

```php
$template = new Typecho_Widget_Helper_Form_Element_Select(
    'template',
    [
        'default' => '简约现代',
        'aurora' => '极光风格',
        'prestige' => '大气庄重'
    ],
    'default',
    _t('登录模板'),
    _t('选择登录页面的显示模板')
);
$form->addInput($template->multicodeMode()->addRule('enum', _t('模板必须在可选列表中'), ['default', 'aurora', 'prestige']));
```

然后在 `render()` 方法中使用：

```php
$template = $this->options->template;
include __DIR__ . '/templates/' . $template . '.php';
```

## 未来扩展

### 计划中的模板

- [x] **prestige** - 大气庄重风格（已完成）
- [ ] **minimal** - 极简黑白风格
- [ ] **neon** - 霓虹灯赛博朋克风格
- [ ] **nature** - 自然风光主题
- [ ] **gradient** - 纯渐变背景风格
- [ ] **glass** - 纯玻璃态设计
- [ ] **dark** - 深色模式专用

### 功能扩展

- [ ] 后台模板选择功能
- [ ] 自定义背景图片上传
- [ ] 主题色实时预览
- [ ] 暗色/亮色模式切换
- [ ] 模板在线预览
- [ ] 模板导入/导出功能

## 更新日志

### 2025-03-22
- ✨ 创建项目结构
- ✨ 添加极光风格模板（Aurora）
- ✨ 添加大气庄重模板（Prestige）
- ✨ 统一模板文件命名和目录结构
- ✨ 完善响应式设计
- ✨ 添加多种动画效果
- 📝 完善项目结构文档

## 快速开始

1. **选择模板**：修改 `Plugin.php` 中的模板路径
2. **自定义颜色**：在插件设置中修改"主题颜色"
3. **创建新模板**：参考现有模板，复制并修改
4. **测试效果**：访问登录页面查看效果

## 技术支持

如有问题或建议，请查看：
- Typecho 官方文档：https://typecho.org/
- 插件开发文档：[待补充]
