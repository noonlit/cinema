<?php
namespace Controller;
use Framework\Validator\GenreValidator;
use Entity\GenreEntity;

class GenreController extends AbstractController
{

    /**
     * Shows genres.
     * 
     * @return html
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
     * Adds a genre.
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addGenre()
    {
        
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';
        $successResponse = array();
        $successResponse['type'] = 'success';
        $successResponse['title'] = 'Added!';

        
        $validator = new GenreValidator;
        // build properties array 
        $properties = [
            'name' => $this->getPostParam('genreName')
        ];
        // build an entity 
        $genre = $this->getEntity('genre', $properties);
        $genreName = $genre->getName();
        try {
            $validator->validate($genre);
        } catch (\Exception $ex) {
            $errorResponse['message'] = 'Oops! Something went wrong!';
            return $this->application->json($errorResponse);
        }
        // get the repository
        $genreRepository = $this->getRepository('genre');
        //check if genre name exists in db
        try {
            $genreByName = $genreRepository->loadByProperties(['name' => $genreName]);
        } catch (Exception $ex) {
            $errorResponse['message'] = 'Oops! Something went wrong!';
            return $this->application->json($errorResponse);
        }
        if (count($genreByName) !== 0) {
            $errorResponse['message'] = 'This Genre already exist!';
            return $this->application->json($errorResponse);
        }
        // add to db
        try {
            $genreRepository->save($genre);
        } catch (\Exception $ex) {
            $errorResponse['message'] = 'Oops! Something went wrong!';
            return $this->application->json($errorResponse);
        }   
        $successResponse['genreId'] = $genreRepository->getMaxValue('id');
        $successResponse['genreName'] = $properties['name'];
        $successResponse['message'] = 'Your item was successfully added!';
        return $this->application->json($successResponse);
    }
    
    /**
     * Deletes a genre.
     * 
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function deleteGenre()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';

        // get the repository and ask for genre with this id
        $genreRepository = $this->getRepository('genre');
        $idGenre = $this->getCustomParam('id');
        $genres = $genreRepository->loadByProperties(['id' => $idGenre]);

        // check if the result is empty
        if (empty($genres)) {
            $errorResponse['message'] = 'Could not delete!';
            return $this->application->json($errorResponse);
        }

        // get the first result and delete it
        $genre = reset($genres);
        try {
            $genreRepository->delete($genre);
        } catch (\Exception $ex) {
            $errorResponse['message'] = 'Could not delete!';
            return $this->application->json($errorResponse);
        }

        $successResponse = array();
        $successResponse['type'] = 'success';
        $successResponse['title'] = 'Deleted!';
        $successResponse['message'] = 'The item was successfully deleted!';
        return $this->application->json($successResponse);
    }

    /**
     * Edits a genre.
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function editGenre() {
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
