<?php

namespace Controller;

class MainController extends AbstractController
{
    private function getFormFilterData()
    {
        if ($this->request->isMethod('POST')) {
            $conditions = $this->getPostParam('conditions');
            $this->session->set('filter_form_movie', $conditions);
            return $conditions;
        }
        $lastForm = $this->session->get('filter_form_movie');
        if (is_null($lastForm)) {
            return [];
        } else {
            return $lastForm;
        }
    }

    public function showMainPage()
    {
        $page = $this->getQueryParam('page'); // repo will fix it if null
        $consditions = $this->getFormFilterData();
//        if (is_null($postData)) {
//            // set default values for context
//        } else {
//        
//        $context = [
//            'filters' => [],
//            ];
//        }
//            
//        // call repo method
//        
//       
//        $result = ''; // array of movies
       
        return $this->render('index'); // context so you can 
    }

    protected function getClassName()
    {
        return 'Controller\MainController';
    }

}
