<?php

// configure your app for the production environment

$app['twig.path'] = array(__DIR__.'/../src/Resources/views');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

require __DIR__.'/../config/common.php';
