<?php

require __DIR__ . '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env')) {
    (new \Dotenv\Dotenv(__DIR__))->load();
}

$isProduction = strtolower(getenv('ENVIRONMENT')) === 'production';

return (new \Harmony\DI\ContainerFactory([
    \Symfony\Component\Console\Application::class => \DI\factory(function (\Psr\Container\ContainerInterface $container) use ($isProduction) {
        $app = new \Symfony\Component\Console\Application('CLI Application');

        $app->setAutoExit(false);
        $app->setCatchExceptions($isProduction);
        $app->setHelperSet(new \Symfony\Component\Console\Helper\HelperSet([
            'dialog' => new \Symfony\Component\Console\Helper\QuestionHelper
        ]));

        foreach (require __DIR__ . '/config/commands.php' as $command) {
            if ($container->has($command)) {
                $app->add($container->get($command));
            }
        }

        return $app;
    }),

    \Psr\Log\LoggerInterface::class => \DI\factory(function (\Psr\Container\ContainerInterface $container) {
        return new \Psr\Log\NullLogger;
    })
]))->create(require __DIR__ . '/config/definitions.php');
