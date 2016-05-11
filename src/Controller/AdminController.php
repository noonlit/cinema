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
    public function showUserList() {
        $userRepository = $this->getRepository('user');
        $userList = $userRepository->loadPage(1, 3);
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
        
        $this->addSuccessMessage('Account status succesfully changed!');
        
        $urlGenerator = $this->getUrlGenerator();
        $url = $urlGenerator->generate('admin_show_all_users');
        
        return $this->application->redirect($url);
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
