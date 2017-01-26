<?php

use Framework\Validator\GenreValidator;
use Framework\Validator\RoomValidator;
use Framework\Validator\MovieValidator;
use Framework\Validator\ScheduleValidator;

// configure your app for the production environment
$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');


// db config 
$app['config'] = require __DIR__.'/../config/config.php';
$app->register(
    new Silex\Provider\DoctrineServiceProvider(),
    array(
        'db.options' => array(
            'host'     => $app['config']['database']['host'],
            'port'     => $app['config']['database']['port'],
            'dbname'   => $app['config']['database']['dbname'],
            'user'     => $app['config']['database']['user'],
            'password' => $app['config']['database']['password'],
            'charset'  => 'utf8',
            'driver'   => 'pdo_mysql',
        ),
    )
);

// mappings
$app['mappings'] = require __DIR__.'/../config/mappings.php';
$app['repository_factory'] = $app->share(
    function () use ($app) {
        return new Repository\RepositoryFactory($app['db'], $app['mappings']['repositories']);
    }
);


// entity factory
$app['entity_factory'] = $app->share(
    function () {
        return new Entity\EntityFactory();
    }
);


// SwiftMailer
$app['swiftmailer.options'] = array(
    'host'       => 'smtp.gmail.com',
    'port'       => '25',
    'username'   => $app['config']['mailer']['user'],
    'password'   => $app['config']['mailer']['password'],
    'encryption' => 'tls',
    'auth_mode'  => null,
);
