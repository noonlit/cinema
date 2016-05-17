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
    
    
    public function showAllRooms($page = 1, $roomsPerPage = 4) {
        $context = [
            'roomList' => '',
            'roomsPerPage' => '',
            'maxPage' => '',
            'currentPage' => ''
        ];
        $roomRepository = $this->getRepository('room');
        
        try {
            $maxRoomsNumber = $roomRepository->getRowsCount();
        } catch (\Exception $ex) {
            $this->addErrorMessage('Something went wrong!');
            return $this->render('room', $context);
        }

        $newPage = $this->getQueryParam('page') == null ? $page : $this->getQueryParam('page');
        $newRoomsPerPage = $this->getQueryParam('rooms_per_page') == null ? $roomsPerPage : $this->getQueryParam('rooms_per_page');

        if ($newRoomsPerPage == 'all') {
            $newRoomsPerPage = $maxRoomsNumber;
        } else {
            if($newRoomsPerPage > $maxRoomsNumber)
            {
                $maxRoomsNumber=$maxRoomsNumber;
            }
            
        }

        try {
            $roomList = $roomRepository->loadPage($newPage, $newRoomsPerPage);
        } catch (\Exception $ex) {
            $this->addErrorMessage('Something went wrong!');
            return $this->render('room', $context);
        }

        $context = [
            'roomList' => $roomList,
            'roomsPerPage' => $newRoomsPerPage,
            'maxPage' => ceil($maxRoomsNumber / $newRoomsPerPage),
            'currentPage' => $newPage
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

        $validate = new \Framework\Validator\RoomValidator;

        try{
            $roomEntities = $roomRepository->loadByProperties(['name'=> $this->getPostParam('roomName')]);
            
        } catch (\Exception $ex) {

            return $this->application->json($errorResponse);

        }
 
        if(count($roomEntities) != 0)
        {
            return $this->application->json($errorResponse);
        }
        
        $properties = ['name'=> $this->getPostParam('roomName'),
            'capacity' => (int)$this->getPostParam('roomCapacity')];
        
        $room = $this->getEntity('room', $properties);

        try
        {
            $validate->validate($room);
            $roomRepository->save($room);
        } catch (\Exception $ex) {
            
            return $this->application->json($errorResponse);
        }
        
        $successResponse = array();
        $successResponse['roomId'] = $roomRepository->getMaxValue('id');
        $successResponse['roomName'] = $properties['name'];
        $successResponse['roomCapacity'] = $properties['capacity'];
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
