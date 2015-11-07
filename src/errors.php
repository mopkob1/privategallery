<?php
/**
 * Created by PhpStorm.
 * User: Максим В. Янушев
 * Date: 14.07.15
 * Time: 16:37
 */
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

//$app->error(function (\Exception $e, Request $request, $code) use ($app) {
$app->error(function (\Exception $e) use ($app) {
    if ($app['debug']) {
        return;
    }
    $code=($e instanceof HttpException) ? $e->getStatusCode() : $e->getCode();
    // 404.html, or 40x.html, or 4xx.html, or error.html

    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});