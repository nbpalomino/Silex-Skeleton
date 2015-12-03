<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

$app = new Application();
//$app->register(new DoctrineServiceProvider());
//$app->register(new SessionServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new TwigServiceProvider(), array(
    'twig.path'    => array(__DIR__.'/views/'),
    'twig.options' => array('cache' => __DIR__.'/../cache/twig'),
));
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    
    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) {
        // implement whatever logic you need to determine the asset path

        return sprintf('https://frontend-nbpalomino.c9users.io/public/%s', ltrim($asset, '/'));
    }));
    
    return $twig;
});


return $app;
