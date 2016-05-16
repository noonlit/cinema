<?php

namespace Controller;


class RoomController extends AbstractController
{
//    public function showAllRooms()
//    {
//        $roomRepository = $this->getRepository('room');
//        $roomList = $roomRepository->loadAll();
//        $context = [
//            'roomList' => $roomList,
//        ];
//        return $this->render('room', $context);
//
//    }
    
    
    public function showAllRooms($page = 1, $roomsPerPage = 6) {
        $page = $this->getQueryParam('page') == null ? $page : $this->getQueryParam('page');
        $roomsPerPage = $this->getQueryParam('rooms_per_page') == null ? $roomsPerPage : $this->getQueryParam('rooms_per_page');
        $roomRepository = $this->getRepository('room');
        $roomList = $roomRepository->loadPage($page, $roomsPerPage);
        $context = [
            'roomList' => $roomList,
        ];
        return $this->render('room', $context);
    }
    
    public function addRoom()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';
        $errorResponse['message'] = 'Could not add!';
        
        $roomRepository = $this->getRepository('room');
        

        
        try{
            $roomEntities = $roomRepository->loadByProperties(['name'=> $this->getPostParam('name')]);
            
        } catch (\Exception $ex) {
            return $this->application->json($errorResponse);

        }

   
        
        if(count($roomEntities) > 0)
        {
            return $this->application->json($errorResponse);
        }
        
        
        
        $properties = ['name'=> $this->getPostParam('roomName'),
            'capacity' => (int)$this->getPostParam('roomCapacity')];
        
        $room = $this->getEntity('room', $properties);

        $validate = new \Framework\Validator\RoomValidator();
        
        var_dump($room);
        try
        {
            $validate->validate($room);
            $roomRepository->save($room);
        } catch (\Exception $ex) {
            
            return $this->application->json($errorResponse);
        }
        
        $successResponse = array();
        $successResponse['message'] = 'Room added!';
        $successResponse['title'] = 'Success!';
        $successResponse['type'] = 'success'; 
        
        return $this->application->json($successResponse);
        
        
    }
    
    public function editRoom()
    {
        
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';
        $errorResponse['message'] = 'Could not update!';
        
        $repository = $this->getRepository('room');

        try{
            $roomEntities = $repository->loadByProperties(['id'=> $this->getCustomParam('id')]);
            
        } catch (Exception $ex) {
            return $this->application->json($errorResponse);

        }

        if(count($roomEntities) != 1)
        {
            return $this->application->json($errorResponse);
        }
    
        $entity = reset($roomEntities);
        $entity->setName($this->getPostParam('value'));
        $entity->setCapacity($this->getPostParam('capacity'));

        
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
    
    public function getClassName() {
        return 'Controller\\RoomController';
    }
}
