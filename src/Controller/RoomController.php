<?php

namespace Controller;


class RoomController extends AbstractController
{
    public function showAllRooms()
    {
        $roomRepository = $this->getRepository('room');
        $roomList = $roomRepository->loadAll();
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
            
        } catch (Exception $ex) {
            return $this->application->json($errorResponse);

        }


        if(count($roomEntities) == 1)
        {
            return $this->application->json($errorResponse);
        }
        
        $properties = ['name'=> $this->getPostParam('name'),
            'capacity' => (int)$this->getPostParam('capacity')];
        
        $room = new \Entity\RoomEntity($properties);
        $validate = new \Framework\Validator\RoomValidator();
        
        
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
    
    
    public function deleteRoom() {
         
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';
        $errorResponse['message'] = 'Could not update!';
        
        $roomRepository = $this->getRepository('room');

        try{
            $rooms=$roomRepository->loadByProperties(['id'=> $this->getCustomParam('id')]);
        } catch (\Exception $ex) {
            return $this->application->json($errorResponse);
        }

        $entity = reset($rooms);
        try{
            $roomRepository->delete($entity);
        } catch (\Exception $ex) {
            return $this->application->json($errorResponse);
        }

        
        $successResponse = array();
        $successResponse['message'] = 'Deleted!';
        $successResponse['title'] = 'Success!';
        $successResponse['type'] = 'success'; 
        
        return $this->application->json($successResponse);

     }
    
     
     
     
    
    public function getClassName() {
        return 'Controller\\RoomController';
    }
}
