<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Qiutuleng\HyperfDumpServer;

use Qiutuleng\HyperfDumpServer\Commands\DumpServerCommand;
use Qiutuleng\HyperfDumpServer\Listeners\DumpServerListener;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'commands' => [
                DumpServerCommand::class,
            ],
            'listeners' => [
                DumpServerListener::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'description of this config file.',
                    'source' => __DIR__ . '/../publish/dump-server.php',
                    'destination' => BASE_PATH . '/config/autoload/dump-server.php',
                ],
            ],
        ];
    }
}
