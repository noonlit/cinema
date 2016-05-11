<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Repository\RoomRepository;

class RoomController extends AbstractController
{
    public function showPaginated()
    {
        $per_page = $this->getCustomParam('per_page');
        $page = $this->getCustomParam('page');
        
        $rooms = $this->getRepository('room');
        
       
    }
    
    public function getClassName() {
        return 'Controller\\RoomController';
    }
}
