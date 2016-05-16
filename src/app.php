<?php
require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\SwiftmailerServiceProvider;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

$app = new Application();
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new SessionServiceProvider());
$app->register(new SwiftmailerServiceProvider());


$app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
            // add options for main page search/filter/sort
            $searchOptions = require __DIR__ . '/../config/search_options.php';
            $twig->addGlobal('search_options', $searchOptions);
            return $twig;
        }));

require 'security.php';

return $app;
