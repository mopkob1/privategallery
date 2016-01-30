<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputOption;

$locale=$app['locale'];
$options=$app['user.options'];
$app_name=$options['interface.strings'][$locale]['app_name'];
$ver=isset($options['interface.strings'][$locale]['version']) ? $options['interface.strings'][$locale]['version'] : "n/a";

$console = new Application($app_name, $ver);
$console->getDefinition()->addOption(new InputOption('--env', '-e', InputOption::VALUE_REQUIRED, 'The Environment name.', 'dev'));
$console->setDispatcher($app['dispatcher']);

require __DIR__ . '/../config/cli-config.php';
$console->setHelperSet($helpers);
$console->addCommands($commands);

return $console;
