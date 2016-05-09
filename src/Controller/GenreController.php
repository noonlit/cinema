<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Controller\AbstractController;
use Repository\GenreRepository;
use Entity\GenreEntity;
use Silex\Provider\TranslationServiceProvider as TranslationServiceProvider;
use Silex\Provider\FormServiceProvider;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Description of GenreController
 *
 * @author bogdanhaidu
 */
class GenreController extends \Controller\AbstractController
{

    public function showGenre(Application $app, Request $request)
    {
        $this->setApplication($app);
        echo "varza";
        
        return $app['twig']->render('admin_test.html', array());
    }

    public function insertGenre(Application $app, Request $request)
    {
        $app->register(new FormServiceProvider());

//        $this->setApplication($app);
//
//        $genre_repo = $app['genre_repository'];
//        $data = $genre_repo->loadAll();
//        $data_input = array("name" => "");
//        $app->match('admin/genre', function (Request $request) use ($app) {
//            $data_input = array("name" => "");
//            $this->createForm($data_input);
//            $this->addFormInputs($data_input, $options = array());
//            $this->getForm();
//            $this->handleRequest($request);
//
//            echo "Insert genre";
//            $data = $genre_repo->loadAll();
//
//            if ($this->formIsValid()) {
//                return $this->redirect('genre', 302);
//            }
////        $genre = array("name"=>"Test");
////        $genre_entity = new GenreEntity ($genre);
////        var_dump($genre_entity);
////        $genre_repo->save($genre_entity);
////        var_dump($genre_repo->loadAll());
////        $data = ['email' => $request->get('email')];
//            return $app['twig']->render('admin_test.html', $this->createFormView());
//        });
//        $this->createForm($data_input);
//        $this->addFormInputs($data_input, $options = array());
//        $this->getForm();
//        return $app['twig']->render('admin_test.html', $this->createFormView());
        return $this->redirect('genre', 302);
    }

}
