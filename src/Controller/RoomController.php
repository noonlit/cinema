<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Repository\RoomRepository;

class RoomController extends AbstractController
{
    public function showAllPaginated()
    {
        
    }
    
    public function getClassName() {
        return 'Controller\\RoomController';
    }
}
