<?php
// Настраивает фильтры для отображения
$app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...
    $app['locale']=strtolower($app['locale']);

    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use ($app) {
        return $app['request_stack']->getMasterRequest()->getBasepath().'/'.ltrim($asset, '/');
    }));

    $twig->addFunction(new \Twig_SimpleFunction('js', function ($asset) use ($app) {
        $realpath="assets/js";
        return $app['request_stack']->getMasterRequest()->getBasepath().'/'.$realpath.'/'.ltrim($asset, '/');
    }));
    $twig->addFunction(new \Twig_SimpleFunction('css', function ($asset) use ($app) {
        $realpath="assets/css";
        return $app['request_stack']->getMasterRequest()->getBasepath().'/'.$realpath.'/'.ltrim($asset, '/');
    }));
    $twig->addFunction(new \Twig_SimpleFunction('plugins', function ($asset) use ($app) {
        $realpath="assets/plugins";
        return $app['request_stack']->getMasterRequest()->getBasepath().'/'.$realpath.'/'.ltrim($asset, '/');
    }));
    $twig->addFunction(new \Twig_SimpleFunction('img', function ($asset) use ($app) {
        $realpath="assets/img";
        return $app['request_stack']->getMasterRequest()->getBasepath().'/'.$realpath.'/'.ltrim($asset, '/');
    }));
    $twig->addFunction(new \Twig_SimpleFunction('ajax', function ($asset) use ($app) {
        $realpath="assets/ajax";
        return $app['request_stack']->getMasterRequest()->getBasepath().'/'.$realpath.'/'.ltrim($asset, '/');
    }));

    $twig->addFunction(new \Twig_SimpleFunction('interface', function ($str) use ($app){
        $locale=$app['locale'];
        if (isset($app['user.options']['interface.strings'][$locale][$str]))
            return $app['user.options']['interface.strings'][$locale][$str];
        return "«" . $str . "» not found in your locale!";
    }));
    $twig->addFunction(new \Twig_SimpleFunction('menu', function () use ($app){
        return $app['menu'];
    }));
    $twig->addFunction(new \Twig_SimpleFunction('file_count', function ($str) use ($app){
        if (!file_exists('../'.$str))return 0;
        $fi = new FilesystemIterator('../'.$str, FilesystemIterator::SKIP_DOTS);
        return iterator_count($fi);
    }));

    return $twig;
}));