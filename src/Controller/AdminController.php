<?php

namespace Controller;

use Controller\AbstractController as AbstractController;

class AdminController extends AbstractController
{

    /**
     * 
     * {@inheritDoc}
     */
    protected function getClassName()
    {
        return 'Controller\\AdminController';
    }

    /**
     * Sends a list with users to render
     * @return array
     */
    public function showUserList($page = 1, $usersPerPage = 4)
    {
        $context = [
            'userList' => '',
            'usersPerPage' => '',
            'maxPage' => '',
            'currentPage' => ''
        ];
        $userRepository = $this->getRepository('user');
        try {
            $maxUserNumber = $userRepository->getRowsCount('users');
        } catch (\Exception $ex) {
            $this->addErrorMessage('Something went wrong!');
            return $this->render('users', $context);
        }

        $newPage = $this->getQueryParam('page') == null ? $page : $this->getQueryParam('page');
        $newUsersPerPage = $this->getQueryParam('users_per_page') == null ? $usersPerPage : $this->getQueryParam('users_per_page');

        if ($newUsersPerPage == 'all') {
            $newUsersPerPage = $maxUserNumber;
        } else {
            $newUsersPerPage = $newUsersPerPage > $maxUserNumber ? $maxUserNumber : $newUsersPerPage;
        }

        try {
            $userList = $userRepository->loadPage($newPage, $newUsersPerPage);
        } catch (\Exception $ex) {
            $this->addErrorMessage('Something went wrong!');
            return $this->render('users', $context);
        }
        $context = [
            'userList' => $userList,
            'usersPerPage' => $newUsersPerPage,
            'maxPage' => $maxUserNumber / $newUsersPerPage,
            'currentPage' => $newPage
        ];
        return $this->render('users', $context);
    }

    public function changeStatus()
    {
        $userId = $this->getCustomParam('id');
        $userRepository = $this->getRepository('user');

        try {
        $userArray = $userRepository->loadByProperties(array('id' => $userId));
        } catch (\Exception $ex) {
            return 0;
        }
        
        $userObject = reset($userArray);
        $userObject->setActive((string) (1 - $userObject->getActive()));
        $userRepository->save($userObject);

        return 1;
    }

    public function removeUser()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';
        // get the repository
        $userRepository = $this->getRepository('user');
        // build properties array 
        $properties = [
            'id' => $this->getCustomParam('id')
        ];
        $user = $userRepository->loadByProperties($properties);
        //check if the id is empty
        if (empty($user)) {
            $errorResponse['message'] = 'Could not delete!';
            return $this->application->json($errorResponse);
        }
        $user = reset($user);
        try {
            $userRepository->delete($user);
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

}
