<?php

//use Symfony\Component\Debug\Debug;
//
//// This check prevents access to debug front controllers that are deployed by accident to production servers.
//// Feel free to remove this, extend it, or make something more sophisticated.
//if (isset($_SERVER['HTTP_CLIENT_IP'])
//    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
//    || !in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1'))
//) {
//    header('HTTP/1.0 403 Forbidden');
//    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
//}
//
//require_once __DIR__.'/../vendor/autoload.php';
//
//Debug::enable();
//
//$app = require __DIR__.'/../src/app.php';
//require __DIR__.'/../config/dev.php';
//require __DIR__.'/../src/controllers.php';
//$app->run();

require_once __DIR__.'/../vendor/autoload.php';
use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/views',
));

$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use ($app) {
        return sprintf('%s/%s', trim($app['request']->getBasePath()), ltrim($asset, '/'));
    }));
    return $twig;
}));

$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new FormServiceProvider());

$app->register(new Silex\Provider\SwiftmailerServiceProvider());


$app->before(function (Request $request) use ($app) {
    $app['twig']->addGlobal('active', $request->get("_route"));
});

$app->get('/', function() use ($app) {
	return $app['twig']->render('layout.twig');
})->bind('home');

$app->get('/about', function() use ($app) {
	return $app['twig']->render('pages/about.twig');
})->bind('about');

$app->match('/contact', function(Request $request) use ($app) {

	$sent = false;

	//Could use short array [] but have used long arrays in other parts
	$default = array(
		'name' => '',
		'email' => '',
		'message' => '',
	);

	$form = $app['form.factory']->createBuilder('form', $default)
		->add('name', 'text', array(
			'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 3))),
			'attr' => array('class' => 'form-control', 'placeholder' => 'Your Name')
		))
		->add('email', 'email', array(
			'constraints' => new Assert\Email(),
			'attr' => array('class' => 'form-control', 'placeholder' => 'Your@email.com')
		))
		->add('message', 'textarea', array(
			'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 20))),
			'attr' => array('class' => 'form-control', 'placeholder' => 'Enter Your Message')
		))
		->add('send', 'submit', array(
			'attr' => array('class' => 'btn btn-default')
		))
		->getForm();

	$form->handleRequest($request);

	if($form->isValid()) {
		$data = $form->getData();

		$message = \Swift_Message::newInstance()
		->setSubject('Llama Feedback')
		->setFrom(array($data['email'] => $data['name']))
		->setTo(array('feedback@lilyandlarryllamafarmers.com'))
		->setBody($data['message']);

		$app['mailer']->send($message);

		$sent = true;
	}

	return $app['twig']->render('pages/contact.twig', array('form' => $form->createView(), 'sent' => $sent));
})->bind('contact');

/* This is a hidden page for those who clicked the Send It button on the demo contact page */
$app->get('/road-to-nowhere', function() use ($app) {
	return $app['twig']->render('pages/road.twig');
})->bind('road');

$app->run();