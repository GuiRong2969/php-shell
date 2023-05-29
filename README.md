# PHP Shell

[![License](https://img.shields.io/github/license/GuiRong2969/php-shell)](LICENSE)
[![Php Version](https://img.shields.io/badge/php-%3E%3D5.5.0-brightgreen)](https://www.php.net/ChangeLog-5.php#PHP_5_5)
![GitHub tag (latest by date)](https://img.shields.io/github/v/tag/GuiRong2969/php-shell)

一个基于`psysh shell`的命令行交互模式依赖包。

## 项目地址

- **github** <https://github.com/GuiRong2969/php-shell.git>

> **注意：** 
-  版本要求 `php >= 5.5.0`
## 安装

```bash
composer require guirong/php-shell
```

### 使用

```php
<?php

use Guirong\Shell\PsyshShell;

/**
 * Execute this shell command,depend on psysh shell.
 */

PsyshShell::run();

```

## License

[MIT](LICENSE)


## 我的其他项目

### `guirong/cli-message` [github](https://github.com/GuiRong2969/cli-message)

一个简单易用的，命令行输出样式工具库

### `guirong/php-router` [github](https://github.com/GuiRong2969/php-router)
 
轻量且快速的路由库

### `guirong/php-closure` [github](https://github.com/GuiRong2969/php-closure)

闭包的序列化和反序列化类库

### `guirong/php-validate` [github](https://github.com/GuiRong2969/php-validate)

一个轻量级且功能丰富的验证和过滤库

### `guirong/php-event` [github](https://github.com/GuiRong2969/php-event)

一个简洁小巧的php事件监听器
