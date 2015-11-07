<?php

use Silex\Application;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\SwiftmailerServiceProvider;
use SimpleUser\UserServiceProvider;

$app = new Application();
$app->register(new SessionServiceProvider());           // Обязательно для Simple-User
$app->register(new UrlGeneratorServiceProvider());      // Обязательно для Simple-User
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider()); // Обязательно для Simple-User
$app->register(new SecurityServiceProvider(),array('security.firewalls' => array()));
$app->register(new TwigServiceProvider());              // Обязательно для Simple-User
$app->register(new HttpFragmentServiceProvider());

$app->register(new DoctrineServiceProvider());          // Обязательно для Simple-User
$app->register(new RememberMeServiceProvider());        // Обязательно для Simple-User
$app->register(new SwiftmailerServiceProvider());       // Обязательно для Simple-User

$app->register($sup=new UserServiceProvider());

return $app;
