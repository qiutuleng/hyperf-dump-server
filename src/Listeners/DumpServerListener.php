<?php

declare(strict_types=1);

namespace Qiutuleng\HyperfDumpServer\Listeners;

use Hyperf\Contract\ConfigInterface;
use Hyperf\Di\Container;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\AfterWorkerStart;
use Hyperf\Framework\Event\BeforeWorkerStart;
use Hyperf\Framework\Event\OnStart;
use Hyperf\HttpServer\Request;
use Qiutuleng\HyperfDumpServer\Dumper;
use Qiutuleng\HyperfDumpServer\RequestContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Server\Connection;
use Symfony\Component\VarDumper\Server\DumpServer;
use Symfony\Component\VarDumper\VarDumper;

class DumpServerListener implements ListenerInterface
{
    public function listen(): array
    {
        return [
            AfterWorkerStart::class,
            OnStart::class,
        ];
    }

    /**
     * @param OnStart $event
     */
    public function process(object $event): void
    {
        /** @var Container $container */
        $container = \Hyperf\Utils\ApplicationContext::getContainer();
        $config = $container->get(ConfigInterface::class);
        $host = $config->get('dump-server.host', 'tcp://127.0.0.1:9912');
        $container->set(DumpServer::class, function () use ($host) {
            return new DumpServer($host);
        });

        $connection = new Connection($host, [
            'request' => new RequestContextProvider($container->make(Request::class)),
            'source' => new SourceContextProvider('utf-8', BASE_PATH),
        ]);

        VarDumper::setHandler(function ($var) use ($connection) {
            (new Dumper($connection))->dump($var);
        });
    }
}