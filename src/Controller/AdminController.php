<?php

namespace Controller;

use Controller\AbstractController;
use Framework\Helper\Paginator;

class AdminController extends AbstractController
{

    /**
     * @return string
     */
    public function showUserList()
    {
        $context = [
            'paginator' => '',
            'userList' => ''
        ];
        try {
            $userRepository = $this->getRepository('user');
            $totalUsers = $userRepository->getRowsCount();

            $currentPage = $this->getQueryParam('page');
            $usersPerPage = $this->getQueryParam('users_per_page');

            $paginator = new Paginator($currentPage, $totalUsers, $usersPerPage);

            $userList = $userRepository->loadPage($paginator->getCurrentPage(), $paginator->getResultsPerPage());

            $context = [
                'paginator' => $paginator,
                'userList' => $userList
            ];
            return $this->render('users', $context);
        } catch (Exception $ex) {
            $this->addErrorMessage('Something went wrong!');
            return $this->render('users', $context);
        }
    }

    /**
     * Changes a user's status (active/inactive).
     *
     * @return int
     */
    public function changeStatus()
    {
        $userId = $this->getCustomParam('id');
        $userRepository = $this->getRepository('user');

        try {
            $userArray = $userRepository->loadByProperties(array('id' => $userId));
            $userObject = reset($userArray);
            $userObject->setActive((string) (1 - $userObject->getActive()));
            $userRepository->save($userObject);
            return 1;
        } catch (\Exception $ex) {
            return 0;
        }
    }

    /**
     * Removes a user.
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function removeUser()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';

        $userRepository = $this->getRepository('user');
        $properties = [
            'id' => $this->getCustomParam('id')
        ];

        try {
            $user = $userRepository->loadByProperties($properties);
            //check if the id is empty
            if (empty($user)) {
                $errorResponse['message'] = 'Could not delete!';
                return $this->application->json($errorResponse);
            }
            
            $user = reset($user);
            $userRepository->delete($user);

            $successResponse = array();
            $successResponse['type'] = 'success';
            $successResponse['title'] = 'Deleted!';
            $successResponse['message'] = 'The item was successfully deleted!';
            
            return $this->application->json($successResponse);
        } catch (\Exception $ex) {
            $errorResponse['message'] = 'Could not delete!';
            return $this->application->json($errorResponse);
        }
    }

}
