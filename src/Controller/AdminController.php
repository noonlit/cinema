<?php

namespace Controller;

use Controller\AbstractController as AbstractController;

class AdminController extends AbstractController {

    /**
     * 
     * {@inheritDoc}
     */
    protected function getClassName() {
        return 'Controller\\AdminController';
    }

    /**
     * Sends a list with users to render
     * @return array
     */
    public function showUserList($page = 1, $usersPerPage = 6) {
        $page = $this->getQueryParam('page') == null ? $page : $this->getQueryParam('page');
        $usersPerPage = $this->getQueryParam('users_per_page') == null ? $usersPerPage : $this->getQueryParam('users_per_page');
        $userRepository = $this->getRepository('user');
        $userList = $userRepository->loadPage($page, $usersPerPage);
        $context = [
            'userList' => $userList,
        ];
        return $this->render('users', $context);
    }

    public function changeStatus() {
        $userId = $this->getCustomParam('id');
        $userRepository = $this->getRepository('user');

        $userArray = $userRepository->loadByProperties(array('id' => $userId));
        $userObject = $userArray[0];
        
        $userObject->setActive((string) (1 - $userObject->getActive()));
        $userRepository->save($userObject);
        
        return 1;
    }

    public function removeUser() {
        $userId = $this->getCustomParam('id');
        $userRepository = $this->getRepository('user');

        $userRepository->deleteByProperties(array('id' => $userId));

        $this->addSuccessMessage('Account succesfully deleted!');

        $urlGenerator = $this->getUrlGenerator();
        $url = $urlGenerator->generate('admin_show_all_users');

        return $this->application->redirect($url);
    }
}
