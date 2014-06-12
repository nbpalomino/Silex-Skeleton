<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Quipulabz\Controller\CursosController;

$app->get('/', function () use ($app) {

	$data['title'] = "Portada de estreno";
    return $app['twig']->render('index.html', $data);
})
->bind('homepage');

$app->get('/cursos', 'Quipulabz\Controller\CursosController::index')
->bind('cursos.index');

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html' : '500.html';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
