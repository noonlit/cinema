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

/* 
 * Repositories
 */

$app['user_repository'] = Repository\RepositoryFactory::getRepository('user', $app['db'], $app['config']['tables']['user']);
$app['movie_repository'] = Repository\RepositoryFactory::getRepository('movie', $app['db'], $app['config']['tables']['movie']);
$app['genre_repository'] = Repository\RepositoryFactory::getRepository('genre', $app['db'], $app['config']['tables']['genre']);
$app['room_repository'] = Repository\RepositoryFactory::getRepository('room', $app['db'], $app['config']['tables']['room']);
$app['schedule_repository'] = Repository\RepositoryFactory::getRepository('schedule', $app['db'], $app['config']['tables']['schedule']);
$app['booking_repository'] = Repository\RepositoryFactory::getRepository('booking', $app['db'], $app['config']['tables']['booking']);


// is it working? it is working. this has the correct instance.
$test = $app['user_repository'];

// right, so this query works
// $app['db']->insert('users', array('name' => 'Rob'));

// this also works, thank whoever
// $test->loadPageOrdered(1, 3, array('name' => 'asc'));
// $test->loadPage(1, 3);
// $test->loadById(3);
// $test->loadAll();
// $test->deleteById(1);
// $test->loadByProperties(array('id' => 3, 'cats' => 5));