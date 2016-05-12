<?php

namespace Controller;

use Exception;

class GenreController extends AbstractController
{

    /**
     * Shows genre list
     * @return array
     */
    public function ShowGenreList()
    {

        $genreRepository = $this->getRepository('genre');
        $genreList = $genreRepository->loadAll();
        $context = [
            'genreList' => $genreList,
        ];
        return $this->render('genre', $context);
    }

    /*
     * add  new genre name in genre list
     */

    public function addGenre()
    {
        return $this->redirectRoute('genre');
        $context = [
            'last_name' => $nav,
        ];

        return $this->render('genre');
    }

    /*
     * delete a genre name from genre list
     */

    public function deleteGenre()
    {
        
    }

    /*
     * edit a genre name from genr elist
     */

    public function editGenre()
    {

        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';
        $errorResponse['message'] = 'Could not update!';

        $repository = $this->getRepository('genre');

        try {
            $genreEntities = $repository->loadByProperties(['id' => $this->getCustomParam('id')]);
        } catch (Exception $ex) {
            return $this->application->json($errorResponse);
        }


        if (count($genreEntities) != 1) {
            return $this->application->json($errorResponse);

        }


        $entity = reset($genreEntities);
        $entity->setName($this->getPostParam('value'));
        try {
            $repository->save($entity);
        } catch (Exception $ex) {
            return $this->application->json($errorResponse);
        }


        $successResponse = array();
        $successResponse['message'] = 'Updated!';
        $successResponse['title'] = 'Success!';
        $successResponse['type'] = 'success';
        return $this->application->json($successResponse);
    }

    public function getClassName()
    {
        return 'Controller\\GenreController';
    }

}
