<?php

use Framework\Validator\GenreValidator;
use Framework\Validator\RoomValidator;
use Framework\Validator\MovieValidator;
use Framework\Validator\ScheduleValidator;

// configure your app for the production environment
$app['twig.path'] = array(__DIR__ . '/../templates');
$app['twig.options'] = array('cache' => __DIR__ . '/../var/cache/twig');


// db config 
$app['config'] = require __DIR__ . '/../config/config.php';
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

// mappings
$app['mappings'] = require __DIR__ . '/../config/mappings.php';
$app['repository_factory'] = $app->share(function () use ($app) {
    return new Repository\RepositoryFactory($app['db'], $app['mappings']['repositories']);
});

// // SwiftMailer
// $app['swiftmailer.options'] = array(
//     'host' => 'smtp.gmail.com',
//     'port' => '25',
//     'username' => $app['config']['mailer']['user'],
//     'password' => $app['config']['mailer']['password'],
//     'encryption' => 'tls',
//     'auth_mode' => null
// );

/* Projected income query test
  $firstDate = new \DateTime();
  $firstDate->setDate(2016, 5, 10);
  $secondDate = new \DateTime();
  $secondDate->setDate(2016, 5, 10);
  $projectedIncome = $app['schedule_repository']->getProjectedIncomeBetween($firstDate, $secondDate);
  echo $projectedIncome; */

/* Second projected income query test 
  $firstDate = new \DateTime();
  $firstDate->setDate(2016, 5, 7);
  $secondDate = new \DateTime();
  $secondDate->setDate(2016, 5, 10);
  $projectedIncome = $app['schedule_repository']->getProjectedIncomeForMovieBetween($firstDate, $secondDate, "Warcraft");
  echo $projectedIncome; */

/* Booking query test 
  try {
  $booking = new \Entity\BookingEntity(array('seats' => 1, 'user_id' => 1, 'schedule_id' => 1));
  $app['booking_repository']->makeBooking($booking);
  } catch (Exception $ex) {
  echo $ex->getMessage();
  } */


/*
$genre = new \Entity\GenreEntity(array('name' => 'dradddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'));
$validator = new GenreValidator;
$validator->verification($genre);
*/


/*Genre validation test
$genre= new \Entity\GenreEntity(array('name' => 'dradddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd' ));
$validator = new GenreValidator;
try{
$validator->validate($genre);
}catch (\Exception $ex) {
    echo $ex->getMessage();
<<<<<<< HEAD
}*/

/*Movie validator test 
$movieInfo = array('id' => 'florin salam', 
    'title' => 'inima de tigan',
    'genreID' => 2,
    'year' => 2017,
    'cast' => 'jean de la craiova',
    'duration' => 2,
    'poster' => '/var/www/html/cinema/leaves-1-1487874.jpg',
    'link_imdb' => 'http://imdb.com');
$movie = new \Entity\MovieEntity($movieInfo);
var_dump($movie);
//$errors = $app['validator']->validate($movie);
//var_dump($errors);
$validator = new MovieValidator;
$validator->validate($movie); */
 

 /* Room validator test 
$roomInfo = array('id' => 1, 
    'name' => 'Salut',
    'capacity' => 0
    );

$room = new RoomEntity($roomInfo);
$valid = new RoomValidator();

try{
    $valid->validate($room);
    
} catch (Exception $ex) {
    echo $ex->getMessage();
}
*/

// movies pagination filter stuff
$test = new Repository\MovieRepository($app['db'], 'schedules');
$test->searchMoviesWhere(['genre' => 'all', 'year' => 'all', 'date' => 'all', 'time' => 'all', 'sort' => 'title']);
var_dump($test);
die;