<?php

namespace Controller;

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
    
    /*
     * add  new genre name in genre list
     */
    public function addGenre() {
        return $this->redirectRoute('genre');
        $context = [
            'last_name' => $nav,
        ];

        return $this->render('genre');
    }
    /*
    * delete a genre name from genre list
    */
    public function deleteGenre() {
        
    }

    /*
     * edit a genre name from genr elist
     */
    public function editGenre() {
        
        $data = array();
        $data['title'] = 'Error!';
        $data['type'] = 'error';
        $data['message'] = 'Could not update!';
        
        $repository = $this->getRepository('genre');
        
        try {
            $genreEntities = $repository->loadByProperties(['id' => $this->getCustomParam('id')]);
        } catch (Exception $ex) {
            return $this->application->json($data);
        }
        
        
        if(count($genreEntities) != 1) {
            return $this->application->json($data);
        }
        $data['message'] = 'Updated!';
        $data['title'] = 'Success!';
        $data['type'] = 'success';
        
        $entity = reset($genreEntities);
        $entity->setName($this->getCustomParam('value'));
        
        $repository->save($entity);
        
        return $this->application->json($data);
    }

    public function getClassName() {
        return 'Controller\\GenreController';
    }

}