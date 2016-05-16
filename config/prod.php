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
$app['movie_poster_dir'] = '/var/www/html/cinema/web/img/movie/poster/';
$app['mappings'] = require __DIR__ . '/../config/mappings.php';
$app['repository_factory'] = $app->share(function() use ($app) {
    return new Repository\RepositoryFactory($app['db'], $app['mappings']['repositories']);
});


// entity factory
$app['entity_factory'] = $app->share(function() {
    return new Entity\EntityFactory();
});


// SwiftMailer
$app['swiftmailer.options'] = array(
    'host' => 'smtp.gmail.com',
    'port' => '25',
    'username' => $app['config']['mailer']['user'],
    'password' => $app['config']['mailer']['password'],
    'encryption' => 'tls',
    'auth_mode' => null

);



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
 

/* Testing funny function of funniness */
/*$test = new Repository\MovieRepository($app['db'], 'movies');
$result = $test->loadCurrentMovies(array('pagination' => array('page' => '1', 'per_page' => '5'),
                    'filters' => array('genre' => 'all', 'year' => 'all', 'date' => 'all', 'time' => 'all'),
                    'sort' => array('title' => 'ASC')));
$result = $test->loadByProperties(['id' => 1]);
var_dump($result);*/


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

