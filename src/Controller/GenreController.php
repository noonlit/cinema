<?php

namespace Controller;

use Framework\Helper\Paginator;

class GenreController extends AbstractController
{

    /**
     * Shows genres paginated
     * 
     * @return string
     */
    public function showGenresPaginated()
    {
        try {
            $genreRepository = $this->getRepository('genre');
            $totalGenres = $genreRepository->getRowsCount();

            $currentPage = $this->getQueryParam('page');
            $genresPerPage = $this->getQueryParam('genres_per_page');

            $paginator = new Paginator($currentPage, $totalGenres, $genresPerPage);

            $genreList = $genreRepository->loadPage($paginator->getCurrentPage(), $paginator->getResultsPerPage());

            $context = [
                'paginator' => $paginator,
                'genreList' => $genreList
            ];
            return $this->render('genre', $context);
        } catch (Exception $ex) {
            $this->addErrorMessage('Something went wrong!');
            return $this->render('genre', $context);
        }
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

        try {
            // build properties array 
            $properties = [
                'name' => $this->getPostParam('genreName')
            ];

            $genre = $this->getEntity('genre', $properties);
            $genreName = $genre->getName();
            $genreRepository = $this->getRepository('genre');
            $genreByName = $genreRepository->loadByProperties(['name' => $genreName]);
            //verify if the genre exist in db
            if (count($genreByName) !== 0) {
                $errorResponse['message'] = 'This Genre already exist!';
                return $this->application->json($errorResponse);
            }

            $genreRepository->save($genre);

            $successResponse = array();
            $successResponse['type'] = 'success';
            $successResponse['title'] = 'Added!';
            $successResponse['genreId'] = $genreRepository->getMaxValue('id');
            $successResponse['genreName'] = $properties['name'];
            $successResponse['message'] = 'Your item was successfully added!';

            return $this->application->json($successResponse);
        } catch (\Exception $ex) {
            $errorResponse['message'] = 'Oops! Something went wrong!';
            return $this->application->json($errorResponse);
        }
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

        try {
            $genreRepository = $this->getRepository('genre');
            $idGenre = $this->getCustomParam('id');
            $genres = $genreRepository->loadByProperties(['id' => $idGenre]);

            // check if the result is empty
            if (empty($genres)) {
                $errorResponse['message'] = 'Could not delete!';
                return $this->application->json($errorResponse);
            }
            
            //check if the genre id is used
            if($genreRepository->checkGenreIsUsed($idGenre)){
                $errorResponse['message'] = 'Could not delete because this genre is used!';
                return $this->application->json($errorResponse);
            }

            $genre = reset($genres);
            $genreRepository->delete($genre);

            $successResponse = array();
            $successResponse['type'] = 'success';
            $successResponse['title'] = 'Deleted!';
            $successResponse['message'] = 'The item was successfully deleted!';

            return $this->application->json($successResponse);
        } catch (\Exception $ex) {
            $errorResponse['message'] = 'Could not delete due to table dependcies. Try deleting manualy!';
            return $this->application->json($errorResponse);
        }
    }

    /**
     * Edits a genre.
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function editGenre()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';
        $errorResponse['message'] = 'Could not update!';

        try {
            $repository = $this->getRepository('genre');
            $genreEntities = $repository->loadByProperties(['id' => $this->getCustomParam('id')]);

            if (count($genreEntities) != 1) {
                return $this->application->json($errorResponse);
            }
            $entity = reset($genreEntities);
            $entity->setName($this->getPostParam('value'));

            $repository->save($entity);

            $successResponse = array();
            $successResponse['message'] = 'Updated!';
            $successResponse['title'] = 'Success!';
            $successResponse['type'] = 'success';

            return $this->application->json($successResponse);
        } catch (Exception $ex) {
            return $this->application->json($errorResponse);
        }
    }
}
