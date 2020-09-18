# Hyperf Dump Server

## Introduction

Bring [Symfony's Var-Dump Server](https://symfony.com/doc/current/components/var_dumper.html#the-dump-server) to Hyperf.

This package will give you a dump server, that collects all your `dump` call outputs, so that it does not interfere with HTTP / API responses.

[中文文档 / Chinese document](./README-zh-CN.md)

## Install

Under your project folder and run the command in terminal:

```bash
composer require --dev qiutuleng/hyperf-dump-server
```

Publish the `dump-server.php` configuration file using `vendor:publish` command :

```bash
php bin/hyperf.php vendor:publish qiutuleng/hyperf-dump-server
```

## Usage

Start the dump server by calling the hyperf command:

```bash
php bin/hyperf.php dump-server
```

You can set the output format to HTML using the `--format` option:

```bash
php bin/hyperf.php dump-server --format=html > dump.html
```

## Reference

This extension package refers to the [laravel-dump-server](https://github.com/beyondcode/laravel-dump-server) package released by [beyondcode](https://github.com/beyondcode) organization

Thank [beyondcode](https://github.com/beyondcode) organization and all its contributors for this great contribution.

## License

The MIT License (MIT). Please see [License File](./LICENSE.txt) for more information.