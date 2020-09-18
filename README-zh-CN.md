# Hyperf Dump Server

## 介绍

适配 Hyperf 框架的 [Symfony's Var-Dump Server](https://symfony.com/doc/current/components/var_dumper.html#the-dump-server) 服务。

该软件包将为您提供一个转储服务器，该服务器收集您的所有 `dump` 函数调用输出，以免干扰 HTTP/API 响应。

[英文文档 / English document](./README.md)

## 安装

在你的项目文件夹中，运行此代码：

```bash
composer require --dev qiutuleng/hyperf-dump-server
```

使用 `vendor:publish` 命令来复制 `dump-server.php` 配置文件：

```bash
php bin/hyperf.php vendor:publish qiutuleng/hyperf-dump-server
```

## 使用

使用 `hyperf` 的命令行，启动 `dump server` 服务：

```bash
php bin/hyperf.php dump-server
```

你可以使用 `--format` 参数来设置输出格式为 `HTML` ：

```bash
php bin/hyperf.php dump-server --format=html > dump.html
```

⚠️不要在 Hyperf 项目代码中使用 `dd` 方法，因为它会杀死 Hyperf 进程，使用 `dump` 方法替代它。

## 参考

此扩展包参考自 [beyondcode](https://github.com/beyondcode) 组织的 [laravel-dump-server](https://github.com/beyondcode/laravel-dump-server) 扩展包。

感谢 [beyondcode](https://github.com/beyondcode) 组织和它的所有贡献者的伟大贡献。

## 授权

此项目使用 MIT License (MIT) 授权，详情请查看 [License](./LICENSE.txt) File 文件了解更多信息。