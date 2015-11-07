<?php
/**
 * Created by PhpStorm.
 * User: Максим В. Янушев
 * Date: 14.07.15
 * Time: 16:35
 */
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use \Controllers\HomePage;


$routeCol=new RouteCollection();

$routeCol->add("main",
    new Route("/",array("_controller"=>"Controllers\homepage::Index")));
$routeCol->add("admin",
    new Route("/admin",array("_controller"=>"Controllers\homepage::Admin")));
/*
$routeCol->add("admint",
    new Route("/admin/t",array("_controller"=>"Controllers\homepage::Admin")));
$routeCol->add("login",
    new Route("/login",array("_controller"=>"Controllers\homepage::Login")));*/

$app['routes']->addCollection($routeCol);