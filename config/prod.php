<?php

// configure your app for the production environment

$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

// set up repo factory and pdo-related things


/* all things database-related */
$app['config'] = require __DIR__.'/../config/config.php';
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
		'dbname' => 'cinemadatabase',
		'user' => $app['config']['database']['user'],
		'password' => $app['config']['database']['password'],
		'host' => 'localhost',
		'port' => 3306,
		'charset' => 'utf8',
		'driver' => 'pdo_mysql',
    ),
));

/* store repositories on descriptively named keys.
 * each repository will have a Doctrine\DBAL\Connection in it, which we'll use to make queries
 * note: we could, in theory, insert things into the db from anywhere using something like $app['db']->insert('tablename', array('tablecolumn'=> 'value'));
 * but we won't.
 */

$app['user_repository'] = Repository\RepositoryFactory::getRepository('user', $app['db'], 'users');
$app['movie_repository'] = Repository\RepositoryFactory::getRepository('movie', $app['db'], 'movies');
$app['room_repository'] = Repository\RepositoryFactory::getRepository('room', $app['db'], 'rooms');


// is it working? it is working. this has the correct instance.
$test = $app['user_repository'];

// right, so this query works
// $app['db']->insert('users', array('name' => 'Rob'));

// this also works, thank whoever
// $test->save();