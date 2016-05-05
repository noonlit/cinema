<?php

// configure your app for the production environment

$app['config'] = require 'config.php';

$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

// set up repo factory and pdo-related things