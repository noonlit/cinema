<?php

// configure your app for the production environment

$app['twig.path'] = array(__DIR__ . '/../templates');
$app['twig.options'] = array('cache' => __DIR__ . '/../var/cache/twig');

// set up repo factory and pdo-related things

/* all things database-related */
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

/*
 * Repositories
 */

$app['user_repository'] = Repository\RepositoryFactory::getRepository('user', $app['db'], $app['config']['tables']['user']);
$app['movie_repository'] = Repository\RepositoryFactory::getRepository('movie', $app['db'], $app['config']['tables']['movie']);
$app['genre_repository'] = Repository\RepositoryFactory::getRepository('genre', $app['db'], $app['config']['tables']['genre']);
$app['room_repository'] = Repository\RepositoryFactory::getRepository('room', $app['db'], $app['config']['tables']['room']);
$app['schedule_repository'] = Repository\RepositoryFactory::getRepository('schedule', $app['db'], $app['config']['tables']['schedule']);
$app['booking_repository'] = Repository\RepositoryFactory::getRepository('booking', $app['db'], $app['config']['tables']['booking']);

/*
 * SwiftMailer
 */

$app['swiftmailer.options'] = array(
    'host' => 'smtp.gmail.com',
    'port' => '25',
    'username' => $app['config']['mailer']['user'],
    'password' => $app['config']['mailer']['password'],
    'encryption' => 'tls',
    'auth_mode' => null
);


/* Mailer usage example

$message = \Swift_Message::newInstance()
        ->setSubject('[YourSite] Feedback')
        ->setFrom(array('cinema.village.cluj@gmail.com'))
        ->setTo(array('andrabarsoianu@gmail.com'))
        ->setBody('tis working');


    try { $app['mailer']->send($message); } catch (Exception $e) {
    var_dump($e->getMessage(), $e->getTraceAsString()); }

*/

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
echo $projectedIncome;*/

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
$validator = new \Entity\MovieValidator;
$validator->validate($movie); */
 
 
 