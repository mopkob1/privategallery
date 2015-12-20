<?php
use Providers\UserProvider;

$interface = require 'translation.php';

$app['user.options'] = array(
    'templates' => array(
        'layout' => 'usermanager\layout.twig',
        'register' => 'usermanager\register.twig',
        'register-confirmation-sent' => 'usermanager\register-confirmation-sent.twig',
        'login' => 'usermanager\login.twig',
        'login-confirmation-needed' => 'usermanager\login-confirmation-needed.twig',
        'forgot-password' => 'usermanager\forgot-password.twig',
        'reset-password' => 'usermanager\reset-password.twig',
        'view' => 'usermanager\view.twig',
        'edit' => 'usermanager\edit.twig',
        'list' => 'usermanager\list.twig',
    ),
    'interface.strings' => $interface,
);

$app->mount('/user',$sup);         //монтирует все роуты разом.
                                    //Переменная $sup определена в app

$app['security.firewalls'] = array(
    'admin' => array(
        'pattern' => '^.*$',
        'anonymous' => true,
        'remember_me'=> array(),
        'form' => array('login_path' => '/user/login', 'check_path' => '/user/login_check'),
        'logout'=>array('logout_path'=>'/user/logout'),
        'users' => $app->share(function () use ($app) {return $app['user.manager'];}),
    ),
);
return $app;
/*
 * ROUTE PATH	                ROUTE NAME
/user/login	                    user.login	            The login form.
/user/login_check	            user.login_check	    Process the login submission. The login form POSTs here.
/user/forgot-password	        user.forgot-pasword	    Initiate a password reset request.
/user/reset-password/{token}	user.reset-password	    Reset a user’s password. Arrived at from a special link sent via email.
/user/logout	                user.logout	            Log out the current user.
/user/register	                user.register	        Form to create a new user.
/user/confirm-email/{token}	    user.confirm-email	    Activate a new account after verifying its email address (optional).
/user	                        user	                View the profile of the current user.
/user/{id}	                    user.view	            View a user profile.
/user/{id}/edit	                user.edit	            Edit a user.
/user/list	                    user.list	            List users.
 */