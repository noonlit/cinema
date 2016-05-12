<?php

namespace Controller;

use Framework\Validator\GenreValidator;
use Entity\GenreEntity;

class GenreController extends AbstractController {
    /**
     * Shows genre list
     * @return array
     */
    public function ShowGenreList() {
        $genreRepository = $this->getRepository('genre');
        $genreList = $genreRepository->loadAll();
        $context = [
            'genreList' => $genreList,
        ];
        return $this->render('genre', $context);
    }
    /**
     * add a new genre name in genre list
     */
    public function addGenre() {
        $validator = new GenreValidator;
        // build properties array 
        $properties = [
            'name' => $this->getPostParam('genreName')
        ];
        // build an entity 
        $genre = new \Entity\GenreEntity($properties);
        $genreName = $genre->getName();
        $errors = $validator->validate($genre);
        if (!empty($errors)) {
            $this->addErrorMessage($errors);
            return $this->render('genre', ['last_name' => $this->request->get('name')]);
        }
        // get the repository
        $genreRepository = $this->getRepository('genre');
        // check if genre name exists in db
        try {
            $genreByName = $genreRepository->loadByProperties(['name' => $genreName]);
            //$genreByName = $genreRepository->loadByProperties( $genre->getName());
        } catch (Exception $ex) {
            $this->addErrorMessage('We\'re sorry, something went terribly wrong while trying to add the genre name. Please try again later.'); // ? 
            return $this->render('genre');
        }
        if (count($genreByName) !== 0) {
            $this->addErrorMessage('This genre name is already associated with another name.');
            return $this->render('genre', ['last_name' => $this->request->get('name')]);
        }
        // add to db
        try {
            $genreRepository->save($genre);
        } catch (\Exception $ex) {
            $this->addErrorMessage('We\'re sorry, something went terribly wrong while trying to add the genre name. Please try again later.'); // ??
            return $this->render('genre');
        }
        $this->addSuccessMessage('Genre name succesfully addeed!');
        return $this->redirectRoute('admin_genre_show_all');
    }
    /*
     * delete a genre name from genre list
     */
    public function deleteGenre() {
        
         // get the repository
        $genreRepository = $this->getRepository('genre');
     
          // build properties array 
        $properties = [
            'name' => $this->getPostParam('name')
          
        ];
        
        $idGenre=$this->getCustomParam('id');
        $genres=$genreRepository->loadByProperties(['id'=>$idGenre]);
        
        //check if the id is empty
        if (empty($genres)){
             
            $this->addErrorMessage('The id doesn\'t exist');
            return $this->render('genre');
        
        }
        
        $genre = reset($genres);
       
         try {
            $genreRepository->delete($genre);
        } catch (\Exception $ex) {
            $this->addErrorMessage('We\'re sorry, something went terribly wrong while trying to delete the genre name. Please try again later.'); // ??
            return $this->render('genre');
        }
        $this->addSuccessMessage('Genre name succesfully deleted!');
        return $this->redirectRoute('admin_genre_show_all');
        
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

    public function getClassName() {
        return 'Controller\\GenreController';
    }
}